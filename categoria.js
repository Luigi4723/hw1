//file eliminabile

/*
document.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);
    const categoria = params.get('categoria');

    const titolo = document.getElementById('titolo-categoria');
    const contenitore = document.getElementById('products');

    if (!categoria) {
        titolo.textContent = 'Nessuna categoria selezionata';
        return;
    }

    titolo.textContent = `${categoria}`;

    fetch(`prodotti.php?categoria=${encodeURIComponent(categoria)}`)
        .then(response => response.json())
        .then(data => {
            contenitore.innerHTML = '';

            if (data.length === 0) {
                contenitore.innerHTML = '<p>Nessun prodotto trovato.</p>';
                return;
            }

            data.forEach(product => {
                const div = document.createElement('div');
                div.classList.add('product');
                div.innerHTML = `
                    <img src="${product.immagine}" alt="Immagine prodotto">
                    <h2>${product.nome}</h2>
                    <p>Quantità: ${quantita}</p>
                    <p class="price" data-eur="${prezzoTotale}">Totale: €${prezzoTotale}</p>
                    <p class="price" data-eur="${product.prezzo}">€${prezzoEuro}</p>
                    <a class="btn-acquista">Acquista</a>
                `;
                contenitore.appendChild(div);
            });
        })
        .catch(error => {
            contenitore.innerHTML = '<p>Errore nel caricamento dei prodotti.</p>';
            console.error(error);
        });
});
*/