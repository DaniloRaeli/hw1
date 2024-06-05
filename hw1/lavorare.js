document.addEventListener('DOMContentLoaded', (event) => {
    const form = document.getElementById('candidateForm');
    const inputs = form.querySelectorAll('input[type="text"], input[type="date"], select');
    const errors = form.querySelectorAll('.error');

    form.addEventListener('submit', function(event) {
        let valid = true;

        errors.forEach(error => {
            error.style.display = 'none';
        });


        inputs.forEach(input => {
            if (!input.value.trim()) {
                const errorDiv = input.parentElement.querySelector('.error');
                if (errorDiv) {
                    errorDiv.style.display = 'flex';
                }
                valid = false;
            }
        });

      
        const allow = document.getElementById('allow');
        if (!allow.checked) {
            const errorDiv = allow.parentElement.querySelector('.error');
            if (errorDiv) {
                errorDiv.style.display = 'flex';
            }
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
        }
    });
});

function toggleDropdownNovita() {
    var menu = document.getElementById("menunovita");
    menu.classList.toggle("nascosto");
}

function toggleDropdownProdotti() {
    var menu = document.getElementById("menuprodotti");
    if (menu.classList.contains("nascosto")) {
        menu.classList.remove("nascosto");
    } else {
        menu.classList.add("nascosto");
    }
}
