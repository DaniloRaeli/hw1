// Seleziona l'elemento che rappresenta il trigger per generare il div
const triggerElement = document.querySelector('.Bottom');

function onJson(json) {
  console.log('JSON ricevuto');
  const library = document.querySelector('#album-view');
  library.innerHTML = '';
  const results = json.albums.items;
  let num_results = results.length;
  if(num_results > 10) num_results = 10;
  for(let i=0; i<num_results; i++) {
    const album_data = results[i];
    const title = album_data.name;
    const selected_image = album_data.images[0].url;
    const album = document.createElement('div');
    album.classList.add('album');
    const img = document.createElement('img');
    img.src = selected_image;
    const caption = document.createElement('span');
    caption.textContent = title;
    album.appendChild(img);
    album.appendChild(caption);
    library.appendChild(album);
  }
}

function onResponse(response) {
  console.log('Risposta ricevuta');
  return response.json();
}

function search(event) {
  event.preventDefault();
  const album_input = document.querySelector('#album');
  const album_value = encodeURIComponent(album_input.value);
  console.log('Eseguo ricerca: ' + album_value);
  fetch("https://api.spotify.com/v1/search?type=album&q=" + album_value, {
    headers: {
      'Authorization': 'Bearer ' + token
    }
  }).then(onResponse).then(onJson);
}

function onTokenJson(json) {
  token = json.access_token;
}

function onTokenResponse(response) {
  return response.json();
}

const client_id = '515aac2f84a64561ae3e4fa3eafb108e';
const client_secret = 'c3b4bffabb944960a23bc024d4c4b9a2';
let token;

fetch("https://accounts.spotify.com/api/token", {
  method: "post",
  body: 'grant_type=client_credentials',
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded',
    'Authorization': 'Basic ' + btoa(client_id + ':' + client_secret)
  }
}).then(onTokenResponse).then(onTokenJson);

const sub = document.querySelector("#submit");
sub.addEventListener("click", search);

let divIsVisible = false;

triggerElement.addEventListener('click', function(event) {
  if (divIsVisible) {
    const existingDiv = document.querySelector('.dynamic-div');
    if (existingDiv) {
      existingDiv.remove();
    }
    divIsVisible = false;
  } else {
    const newDivElement = document.createElement('div');
    newDivElement.classList.add('dynamic-div');
    newDivElement.textContent = 'Questo è un nuovo div generato dinamicamente!';
    triggerElement.parentNode.insertBefore(newDivElement, triggerElement.nextSibling);
    divIsVisible = true;
  }
  event.preventDefault();
});

function changeImage() {
  const imageElement = document.getElementById('HOME_ICON');
  imageElement.src = 'image/KFC_Twister_Gamma_Website_slider_dekstop_3840x1866px_5280551392.webp';
}

function resetImage() {
  const imageElement = document.getElementById('HOME_ICON');
  imageElement.src = 'image/KFC_Promo_Calcio_Website_3840x1866_c2a626196e.webp';
}

function toggleDropdownLogin() {
  const dropdownMenu = document.getElementById('menu_tendina');
  dropdownMenu.classList.toggle('nascosto');
}

function toggleDropdownNovita() {
  var menu = document.getElementById("menunovita");
  menu.classList.toggle("nascosto");
}

function toggleDropdownProdotti() {
  var menu = document.getElementById("menuprodotti");
  menu.classList.toggle("nascosto");
}

document.addEventListener('DOMContentLoaded', function() {
  var navLinks = document.querySelectorAll('.nav-link');
  navLinks.forEach(function(link) {
    link.addEventListener('click', function(event) {
      event.preventDefault();
      navLinks.forEach(function(link) {
        link.classList.remove('active');
      });
      this.classList.add('active');
    });
  });
});

function showRegistration() {
  document.getElementById('registrationMenu').style.display = 'block';
}

function toggleDropdown(elementId) {
  var menu = document.getElementById(elementId);
  menu.classList.toggle("nascosto");
}

document.addEventListener("DOMContentLoaded", function() {
  var buttons = document.querySelectorAll("[data-action]");
  buttons.forEach(function(button) {
    var action = button.getAttribute("data-action");
    button.addEventListener("click", function() {
      if (action === "mostra_registrazione") {
        showRegistration();
      } else {
        toggleDropdown(action);
      }
    });
  });
});

const url = "https://foodish-api.com/api/images/burger";

function onJsonImg(json) {
  const img_url = json.image;
  const img = document.createElement("img");
  img.src = img_url;
  const div = document.querySelector(".rand");
  div.appendChild(img);
}

function onResponseImg(response) {
  if (!response.ok) console.log("Errore");
  else return response.json();
}

fetch(url).then(onResponseImg).then(onJsonImg);
fetch(url).then(onResponseImg).then(onJsonImg);
fetch(url).then(onResponseImg).then(onJsonImg);
fetch(url).then(onResponseImg).then(onJsonImg);

document.addEventListener("DOMContentLoaded", function() {
  console.log("Documento caricato correttamente");

  const menuItems = document.querySelectorAll('.menu-item');
  const contentImage = document.getElementById('content-image');
  const contentText = document.getElementById('content-text');

  console.log(menuItems);
  console.log(contentImage);
  console.log(contentText);

  const contents = {
    1: {
      image: 'image1.jpg',
      text: ''
    },
    2: {
      image: 'image2.jpg',
      text: 'Testo per Scritta 2'
    },
    3: {
      image: 'image3.jpg',
      text: 'Testo per Scritta 3'
    }
  };
});
