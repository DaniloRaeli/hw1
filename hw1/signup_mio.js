const form = document.querySelector("#form-style");

function startAnimation() {
  const element = document.querySelector(".login-transition-left-to-right");
  element.classList.add("show-transition");
}

document.addEventListener("DOMContentLoaded", function () {
  startAnimation();
});



function repeatPasswordCheck(event) {
  const textBox = event.currentTarget;
  const errorPasswordRepeat = document.querySelector("#repeat_password-error");
  const password = form.password.value;

  if (textBox.value !== password) {
    errorPasswordRepeat.textContent = "Le due password non corrispondono.";
  } else {
    errorPasswordRepeat.textContent = "";
  }
}

const togglePswrd = document.querySelector("#toggle-pswrd");
function togglePasswordVisibility() {
  const input = document.querySelector("#password");
  if (input.type === "password") {
    input.type = "text";
  } else {
    input.type = "password";
  }
}

function termsCheck() {
  const checkbox = document.querySelector("#terms-checkbox");
  const errorTerms = document.querySelector("#terms-error");

  if (!checkbox.checked) {
    errorTerms.textContent = "Devi accettare le condizioni per procedere.";
  } else {
    errorTerms.textContent = "";
  }
}

togglePswrd.addEventListener("click", togglePasswordVisibility);

document.getElementById("username").addEventListener("blur", usernameCheck);
document.getElementById("email").addEventListener("blur", emailCheck);
document.getElementById("password").addEventListener("blur", passwordCheck);
document
  .getElementById("repeat_password")
  .addEventListener("blur", repeatPasswordCheck);
document
  .getElementById("terms-checkbox")
  .addEventListener("change", termsCheck);

function submitCheck(event) {
  const errors = document.querySelectorAll(".error-style");
  let hasError = false;

  errors.forEach(function (error) {
    if (error.textContent.trim() !== "") {
      hasError = true;
    }
  });

  if (hasError) {
    event.preventDefault();
  }
}

form.addEventListener("submit", submitCheck);