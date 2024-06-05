document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.product-form').forEach(function(form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(form);
            
            fetch('prodotti.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showNotification('Prodotto aggiunto al carrello', 'success');
                } else {
                    showNotification('Errore: ' + data.error, 'error');
                }
            })
            .catch(error => {
                showNotification('Errore: ' + error, 'error');
            });
        });
    });
});

