
   document.querySelectorAll('.remove-button').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const form = this.closest('form');
        const id = form.querySelector('input[name="id"]').value;
        const item = form.closest('.cart-item');
        const price = parseFloat(item.dataset.price);
        
    
        item.remove();
        
       
        const totalElement = document.getElementById('total-price');
        let total = parseFloat(totalElement.innerText);
        total -= price;
        totalElement.innerText = total.toFixed(2);

    
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