document.addEventListener("DOMContentLoaded", () => {
    function aggiornaContatoreCarrello(quantitaTotale) {
        const contatore = document.getElementById("carrello-contatore");
        if (contatore) {
            contatore.textContent = quantitaTotale;
        }
    }

    fetch("get_carrello.php")
        .then(response => response.json())
        .then(data => {
            let totaleQuantita = 0;
            data.forEach(product => {
            totaleQuantita += parseInt(product.quantita);
            });
            aggiornaContatoreCarrello(totaleQuantita);
        })
        .catch(error => {
            console.error("Errore nel caricamento del contatore carrello:", error);
        });
});


// carrello-contatore.js
window.aggiornaContatoreCarrello = function() {
    fetch("get_carrello.php")
        .then(response => response.json())
        .then(data => {
            const totaleArticoli = data.reduce((acc, item) => acc + item.quantita, 0);
            const badge = document.getElementById("carrello-contatore");
            if (badge) badge.textContent = totaleArticoli;
        })
        .catch(error => console.error("Errore nel conteggio articoli:", error));
}
