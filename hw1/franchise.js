document.addEventListener('DOMContentLoaded', (event) => {
    const form = document.querySelector('form[name="franchisee"]');
    const name = form['name'];
    const surname = form['surname'];
    const email = form['email'];
    const telefono = form['telefono'];
    const regione = form['regione'];
    const settore = form['settore'];
    const allow = form['allow'];
    const scrollToFormButton = document.getElementById('scrollToForm');

    form.addEventListener('submit', (event) => {
        let isValid = true;

       
        if (name.value.trim() === '') {
            showError(name, "Devi inserire il tuo nome");
            isValid = false;
        } else {
            clearError(name);
        }

       
        if (surname.value.trim() === '') {
            showError(surname, "Devi inserire il tuo cognome");
            isValid = false;
        } else {
            clearError(surname);
        }

        
        if (email.value.trim() === '' || !validateEmail(email.value.trim())) {
            showError(email, "Indirizzo email non valido");
            isValid = false;
        } else {
            clearError(email);
        }

       
        if (telefono.value.trim() === '') {
            showError(telefono, "Devi inserire il tuo numero di telefono");
            isValid = false;
        } else {
            clearError(telefono);
        }

        if (regione.value.trim() === '') {
            showError(regione, "Devi inserire la tua regione");
            isValid = false;
        } else {
            clearError(regione);
        }

      
        if (settore.value.trim() === '') {
            showError(settore, "Devi inserire il tuo settore");
            isValid = false;
        } else {
            clearError(settore);
        }

        if (!allow.checked) {
            showError(allow, "Devi dichiarare di aver preso visione dell'informativa per il trattamento dei dati personali.");
            isValid = false;
        } else {
            clearError(allow);
        }

        if (!isValid) {
            event.preventDefault();
        }
    });

    function showError(input, message) {
        const errorDiv = input.nextElementSibling;
        errorDiv.querySelector('span').innerText = message;
        errorDiv.style.display = 'block';
    }

    function clearError(input) {
        const errorDiv = input.nextElementSibling;
        errorDiv.style.display = 'none';
    }

    function validateEmail(email) {
        const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        return re.test(email);
    }

    if (scrollToFormButton) {
        scrollToFormButton.addEventListener('click', () => {
            form.scrollIntoView({ behavior: 'smooth' });
        });
    }



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

