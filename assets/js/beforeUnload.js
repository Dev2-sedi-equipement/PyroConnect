// let socket = new WebSocket("wss://javascript.info/article/websocket/demo/hello");
// let redirecting = false; // Variable de contrôle pour la redirection
// let submitButtons = document.querySelectorAll('button[type="submit"]');
// let dossiers = document.querySelectorAll('a.dossier-item, a.nav-link');
// let backButtonFromDossiers = document.getElementById('backButtonFromDossiers');
// let backHome = document.getElementById('backHomeDude');
// let leaving = false; // Variable pour suivre si l'utilisateur quitte la page
// let dossierLocked = false; // Variable pour suivre l'état du verrouillage du dossier
// let dossierId; // Variable pour stocker l'ID du dossier

// // Fonction pour récupérer l'ID du dossier à partir de l'URL
// function getDossierIdFromUrl() {
//     const url = window.location.href;
//     const match = url.match(/\/dossiers\/(\d+)\/edit/);
//     if (match && match[1]) {
//         return match[1];
//     }
//     return null;
// }

// // Fonction pour déverrouiller le dossier
// function unlockDossier() {
//     if (dossierId) {
//         const xhr = new XMLHttpRequest();
//         xhr.open('GET',`/dossiers/unlock-dossiers/${dossierId}`, true);
//         xhr.send();
//     }
// }

// // Fonction pour verrouiller le dossier
// function lockDossier() {
//     if (dossierId) {
//         const xhr = new XMLHttpRequest();
//         xhr.open('GET', '/dossiers/' + dossierId+"/locked", true);
//         xhr.send();
//     }
// }

// // Définition de la fonction beforeUnloadHandler
// function beforeUnloadHandler(e) {
//     socket.send("My name is John");

//     unlockDossier();
//     if (socket.readyState === WebSocket.OPEN) {
//         socket.send("Closed");
//     }
//     var confirmationMessage = "\\o/";
//     e.returnValue = confirmationMessage; // Gecko, Trident, Chrome 34+
//     setTimeout(function() {
//         window.close(); // Fermer la fenêtre après 10 secondes
//     }, 10000); // 10000 millisecondes = 10 secondes
//     return confirmationMessage; // Gecko, WebKit, Chrome <34
// }

// // Récupérer l'ID du dossier
// dossierId = getDossierIdFromUrl();

// // Ajout de l'événement beforeunload et son gestionnaire d'événements
// window.addEventListener("beforeunload", beforeUnloadHandler);

// // Ajout de l'événement unload pour envoyer la requête de déverrouillage
// window.addEventListener("unload", function() {
//     if (!leaving) {
//         unlockDossier();
//     }
// });

// // WebSocket configuration
// socket.onopen = function(e) {
//     console.log("[open] Connection established");
// };

// socket.onmessage = function(event) {
//     console.log(`[message] Data received from server: ${event.data}`);
//     if (event.data === "Closed") {
//         unlockDossier();
//     }
// };

// socket.onclose = function(event) {
//     if (event.wasClean) {
//         window.close()  ;
//         console.log(`[close] Connection closed cleanly, code=${event.code} reason=${event.reason}`);
//   } else {
//         unlockDossier();
//     }

//     // Vérification périodique toutes les 10 secondes
//     if (!dossierLocked) {
//         setInterval(function() {
//             if (document.visibilityState === 'visible') {
//                 lockDossier();
//             }
//         }, 10000);
//     }
// };
// socket.close(1000,"Je quitte");

// socket.onerror = function(error) {
//     console.log(`[error] ${error.message}`);
// };
