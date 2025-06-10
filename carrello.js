document.addEventListener("DOMContentLoaded", () => {
    fetch("get_carrello.php")
        
        .then(response => {
            if (!response.ok) throw new Error("Errore nel caricamento del carrello");
            return response.json();
        })
        .then(data => {
                console.log("Risposta dal server:", data); 

                const container = document.getElementById("carrello");

                if (!container) {
                    console.error("Elemento #carrello non trovato nella pagina");
                    return;
                }

                if (data.length === 0) {
                    container.innerHTML = '<p class="carrello-vuoto" >Il carrello è vuoto.</p>';
                    // Rimuovi anche il riepilogo totale
                    const riepilogo = document.querySelector(".carrello-riepilogo");
                    if (riepilogo) riepilogo.remove();
                    return;
                }

                data.forEach(product => {
                    const div = document.createElement("div");
                    div.classList.add("product");
                    const prezzoEuro = (parseFloat(product.prezzo) * product.quantita).toFixed(2);

                    div.innerHTML = `
                        <img src="${product.immagine}" alt="${product.nome}">
                        <h2>${product.nome}</h2>
                        <p>Quantità: ${product.quantita}</p>
                        <p class="price" data-eur="${product.prezzo}">€${prezzoEuro}</p>
                        <button class="btn-rimuovi" data-id="${product.id}">Rimuovi</button>
                    `;

                    container.appendChild(div);
                });
            })
    .catch(error => {
        document.getElementById("carrello").innerHTML = "<p>Errore nel caricamento del carrello.</p>";
        console.error("Errore:", error);
    });
});




document.addEventListener("click", function (e) {
    if (e.target.classList.contains("btn-rimuovi")) {
        const id = e.target.dataset.id;
        const prodottoDiv = e.target.closest(".product");
        const prezzoText = prodottoDiv.querySelector(".price").dataset.eur;
        const quantitaText = prodottoDiv.querySelector("p").innerText.match(/\d+/); // estrae numero da "Quantità: X"

        const prezzo = parseFloat(prezzoText);
        const quantita = parseInt(quantitaText);

        const subtotale = prezzo * quantita;

        fetch("rimuovi_prodotto.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: `id=${encodeURIComponent(id)}`,
            credentials: "include"
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                // Rimuovi elemento dal DOM
                prodottoDiv.remove();
                aggiornaContatoreCarrello(); 


                // Scala il totale
                const totaleElem = document.getElementById("totale-carrello");
                if (totaleElem) {
                    const totaleCorrente = parseFloat(totaleElem.textContent.replace("Totale: €", ""));

                    const nuovoTotale = (totaleCorrente - subtotale).toFixed(2);
                    totaleElem.textContent = `Totale: €${nuovoTotale}`;
                    
                }
                    // SE NON CI SONO PIÙ PRODOTTI, MOSTRA MESSAGGIO
                const container = document.getElementById("carrello");
                const prodottiRimasti = container.querySelectorAll(".product");

                if (prodottiRimasti.length === 0) {
                    container.innerHTML = '<p class="carrello-vuoto">Il carrello è vuoto.</p>';
                    
                    // Rimuovi anche il riepilogo totale
                    const riepilogo = document.querySelector(".carrello-riepilogo");
                    if (riepilogo) riepilogo.remove();
                }
                
            } else {
                alert("Errore: " + data.error);
            }
        })
        .catch(err => {
            console.error("Errore durante la rimozione:", err);
        });
    }
});
