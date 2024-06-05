   // Aggiungi event listeners ai pulsanti di rimozione
   document.querySelectorAll('.remove-button').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const form = this.closest('form');
        const id = form.querySelector('input[name="id"]').value;
        const item = form.closest('.cart-item');
        const price = parseFloat(item.dataset.price);
        
        // Rimuovi l'elemento dal DOM
        item.remove();
        
        // Aggiorna il totale
        const totalElement = document.getElementById('total-price');
        let total = parseFloat(totalElement.innerText);
        total -= price;
        totalElement.innerText = total.toFixed(2);

        // Invia la richiesta per rimuovere il prodotto dal database
        fetch('carrello.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'rimuovi=1&id=' + id
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error('Errore:', error);
        });
    });
});