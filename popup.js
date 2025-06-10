document.addEventListener('DOMContentLoaded', () => {
  const popup = document.getElementById('popup');
  const overlay = document.getElementById('overlay');
  const closeBtn = document.getElementById('popup-close');
  const descToggle = document.getElementById('desc-toggle');
  const desc = document.getElementById('popup-desc');

  // Listener bottone "Acquista"
  document.querySelectorAll('.btn-acquista').forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      const id = this.dataset.id;

      fetch('get_prodotto.php?id=' + id)
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      document.getElementById('popup-img').src = data.prodotto.immagine;
      document.getElementById('popup-nome').textContent = data.prodotto.nome;
      desc.textContent = data.prodotto.descrizione || 'Nessuna descrizione disponibile';
      document.getElementById('popup-prezzo').textContent = parseFloat(data.prodotto.prezzo).toFixed(2);
      document.getElementById('popup-quantita').value = 1;

      // ✅ IMPOSTA L'ID SUL BOTTONE "AGGIUNGI AL CARRELLO"
      document.querySelector('.btn-aggiungi-carrello').dataset.id = data.prodotto.id;
      

      // Reset descrizione
      desc.classList.remove('active');
      desc.style.display = 'none';
      descToggle.innerHTML = '&#x25BC;';

      popup.style.display = 'block';
      overlay.style.display = 'block';
    } else {
      alert('Prodotto non trovato.');
    }
        }).catch(err => {
          console.error("Errore nella fetch:", err);
        });
    });
  });

  // Toggle descrizione
  descToggle.addEventListener('click', () => {
    desc.classList.toggle('active');
    const attiva = desc.classList.contains('active');
    desc.style.display = attiva ? 'block' : 'none';
    descToggle.innerHTML = attiva ? '&#x25B2;' : '&#x25BC;';
  });

  // X per chiudere
  closeBtn.addEventListener('click', () => {
    popup.style.display = 'none';
    overlay.style.display = 'none';
  });

  // Chiudi cliccando sull'overlay
  overlay.addEventListener('click', () => {
    popup.style.display = 'none';
    overlay.style.display = 'none';
  });
});



document.addEventListener("click", function (e) {
    if (e.target.classList.contains("btn-aggiungi-carrello")) {
        const id = e.target.dataset.id;
        const quantitaInput = document.getElementById("popup-quantita");
        const quantita = quantitaInput ? parseInt(quantitaInput.value) : 1;

        console.log("ID prodotto:", id);
        console.log("Quantità selezionata:", quantita);

        fetch("aggiungi_carrello.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: `id=${encodeURIComponent(id)}&quantita=${encodeURIComponent(quantita)}`,
            credentials: "include" 
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert("Prodotto aggiunto al carrello!");
                aggiornaContatoreCarrello(); 
            } else {
                alert("Errore: " + data.error);
            }
        })
        .catch(err => {
            console.error("Errore nella richiesta:", err);
        });
    }
});
