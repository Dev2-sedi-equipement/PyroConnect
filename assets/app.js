/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';


import 'tarteaucitronjs';








const $ = require('jquery');

// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
// require('bootstrap');

// // or you can include specific pieces
// require('bootstrap/js/dist/tooltip');
// require('bootstrap/js/dist/popover');
// require('bootstrap/js/dist/collapse');
// require('bootstrap/js/dist/offcanvas');


// $(document).ready(function() {
//     $('[data-toggle="popover"]').popover();
// });

$(document).ready(function() {
    // Supprimer l'attribut 'type' du champ 'codeVrp'
    $('#User_codeVrp').removeAttr('type');
});


// Cliquez sur le bouton de retour
function handleGoBackClick() {
history.back();
window.location.reload();
}
        


document.addEventListener('turbo:before-fetch-response', function() {
    // Sélectionner toutes les alertes à l'intérieur de #formRegister
    const alerts = document.querySelectorAll('#formRegister .alert-danger');
    
    // Boucle sur chaque alerte, en commençant par le deuxième
    for (const i = 1; i < alerts.length; i++) {
        // Appliquer la classe 'd-none' pour masquer l'alerte
        alerts[i].classList.add("d-none");
    }
});

document.addEventListener('turbo:load', () => {
    const flashMessageAdmin = document.querySelector(".flash-messages");
    if (flashMessageAdmin !== null) { 

        if (flashMessageAdmin.hasChildNodes()) {
            // Récupérer tous les enfants de flashMessageAdmin
            const children = flashMessageAdmin.children;

            // Masquer tous les enfants sauf le premier
            for (let i = 1; i < children.length; i++) {
                children[i].classList.add('d-none');
            }
        }
    }
});




  // onoffline version
  const wifiOff = document.querySelector('.wifiOff');
  const navbar = document.querySelector('.navbar');

  window.onoffline = (event) => {
  wifiOff.firstChild.nextSibling.classList.remove("animate__bounceOut");
  wifiOff.firstChild.nextSibling.classList.add("animate__bounceIn");
 
  wifiOff.firstChild.nextSibling.classList.add("d-block");
  navbar.style="z-index:0;"
 

  };
  window.ononline = (event) => {
  wifiOff.firstChild.nextSibling.classList.remove("animate__bounceIn");

  wifiOff.firstChild.nextSibling.classList.add("animate__bounceOut");
  setTimeout(() => {
      wifiOff.firstChild.nextSibling.classList.remove("d-block");
      navbar.style="z-index:1;"
  }, "700");
  

   
  };

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
