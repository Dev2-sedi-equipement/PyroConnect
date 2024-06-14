(self["webpackChunk"] = self["webpackChunk"] || []).push([["beforeUnload"],{

/***/ "./assets/js/beforeUnload.js":
/*!***********************************!*\
  !*** ./assets/js/beforeUnload.js ***!
  \***********************************/
/***/ (() => {

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

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ var __webpack_exports__ = (__webpack_exec__("./assets/js/beforeUnload.js"));
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiYmVmb3JlVW5sb2FkLmpzIiwibWFwcGluZ3MiOiI7Ozs7Ozs7O0FBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL2JlZm9yZVVubG9hZC5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyIvLyBsZXQgc29ja2V0ID0gbmV3IFdlYlNvY2tldChcIndzczovL2phdmFzY3JpcHQuaW5mby9hcnRpY2xlL3dlYnNvY2tldC9kZW1vL2hlbGxvXCIpO1xuLy8gbGV0IHJlZGlyZWN0aW5nID0gZmFsc2U7IC8vIFZhcmlhYmxlIGRlIGNvbnRyw7RsZSBwb3VyIGxhIHJlZGlyZWN0aW9uXG4vLyBsZXQgc3VibWl0QnV0dG9ucyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJ2J1dHRvblt0eXBlPVwic3VibWl0XCJdJyk7XG4vLyBsZXQgZG9zc2llcnMgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCdhLmRvc3NpZXItaXRlbSwgYS5uYXYtbGluaycpO1xuLy8gbGV0IGJhY2tCdXR0b25Gcm9tRG9zc2llcnMgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnYmFja0J1dHRvbkZyb21Eb3NzaWVycycpO1xuLy8gbGV0IGJhY2tIb21lID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2JhY2tIb21lRHVkZScpO1xuLy8gbGV0IGxlYXZpbmcgPSBmYWxzZTsgLy8gVmFyaWFibGUgcG91ciBzdWl2cmUgc2kgbCd1dGlsaXNhdGV1ciBxdWl0dGUgbGEgcGFnZVxuLy8gbGV0IGRvc3NpZXJMb2NrZWQgPSBmYWxzZTsgLy8gVmFyaWFibGUgcG91ciBzdWl2cmUgbCfDqXRhdCBkdSB2ZXJyb3VpbGxhZ2UgZHUgZG9zc2llclxuLy8gbGV0IGRvc3NpZXJJZDsgLy8gVmFyaWFibGUgcG91ciBzdG9ja2VyIGwnSUQgZHUgZG9zc2llclxuXG4vLyAvLyBGb25jdGlvbiBwb3VyIHLDqWN1cMOpcmVyIGwnSUQgZHUgZG9zc2llciDDoCBwYXJ0aXIgZGUgbCdVUkxcbi8vIGZ1bmN0aW9uIGdldERvc3NpZXJJZEZyb21VcmwoKSB7XG4vLyAgICAgY29uc3QgdXJsID0gd2luZG93LmxvY2F0aW9uLmhyZWY7XG4vLyAgICAgY29uc3QgbWF0Y2ggPSB1cmwubWF0Y2goL1xcL2Rvc3NpZXJzXFwvKFxcZCspXFwvZWRpdC8pO1xuLy8gICAgIGlmIChtYXRjaCAmJiBtYXRjaFsxXSkge1xuLy8gICAgICAgICByZXR1cm4gbWF0Y2hbMV07XG4vLyAgICAgfVxuLy8gICAgIHJldHVybiBudWxsO1xuLy8gfVxuXG4vLyAvLyBGb25jdGlvbiBwb3VyIGTDqXZlcnJvdWlsbGVyIGxlIGRvc3NpZXJcbi8vIGZ1bmN0aW9uIHVubG9ja0Rvc3NpZXIoKSB7XG4vLyAgICAgaWYgKGRvc3NpZXJJZCkge1xuLy8gICAgICAgICBjb25zdCB4aHIgPSBuZXcgWE1MSHR0cFJlcXVlc3QoKTtcbi8vICAgICAgICAgeGhyLm9wZW4oJ0dFVCcsYC9kb3NzaWVycy91bmxvY2stZG9zc2llcnMvJHtkb3NzaWVySWR9YCwgdHJ1ZSk7XG4vLyAgICAgICAgIHhoci5zZW5kKCk7XG4vLyAgICAgfVxuLy8gfVxuXG4vLyAvLyBGb25jdGlvbiBwb3VyIHZlcnJvdWlsbGVyIGxlIGRvc3NpZXJcbi8vIGZ1bmN0aW9uIGxvY2tEb3NzaWVyKCkge1xuLy8gICAgIGlmIChkb3NzaWVySWQpIHtcbi8vICAgICAgICAgY29uc3QgeGhyID0gbmV3IFhNTEh0dHBSZXF1ZXN0KCk7XG4vLyAgICAgICAgIHhoci5vcGVuKCdHRVQnLCAnL2Rvc3NpZXJzLycgKyBkb3NzaWVySWQrXCIvbG9ja2VkXCIsIHRydWUpO1xuLy8gICAgICAgICB4aHIuc2VuZCgpO1xuLy8gICAgIH1cbi8vIH1cblxuLy8gLy8gRMOpZmluaXRpb24gZGUgbGEgZm9uY3Rpb24gYmVmb3JlVW5sb2FkSGFuZGxlclxuLy8gZnVuY3Rpb24gYmVmb3JlVW5sb2FkSGFuZGxlcihlKSB7XG4vLyAgICAgc29ja2V0LnNlbmQoXCJNeSBuYW1lIGlzIEpvaG5cIik7XG5cbi8vICAgICB1bmxvY2tEb3NzaWVyKCk7XG4vLyAgICAgaWYgKHNvY2tldC5yZWFkeVN0YXRlID09PSBXZWJTb2NrZXQuT1BFTikge1xuLy8gICAgICAgICBzb2NrZXQuc2VuZChcIkNsb3NlZFwiKTtcbi8vICAgICB9XG4vLyAgICAgdmFyIGNvbmZpcm1hdGlvbk1lc3NhZ2UgPSBcIlxcXFxvL1wiO1xuLy8gICAgIGUucmV0dXJuVmFsdWUgPSBjb25maXJtYXRpb25NZXNzYWdlOyAvLyBHZWNrbywgVHJpZGVudCwgQ2hyb21lIDM0K1xuLy8gICAgIHNldFRpbWVvdXQoZnVuY3Rpb24oKSB7XG4vLyAgICAgICAgIHdpbmRvdy5jbG9zZSgpOyAvLyBGZXJtZXIgbGEgZmVuw6p0cmUgYXByw6hzIDEwIHNlY29uZGVzXG4vLyAgICAgfSwgMTAwMDApOyAvLyAxMDAwMCBtaWxsaXNlY29uZGVzID0gMTAgc2Vjb25kZXNcbi8vICAgICByZXR1cm4gY29uZmlybWF0aW9uTWVzc2FnZTsgLy8gR2Vja28sIFdlYktpdCwgQ2hyb21lIDwzNFxuLy8gfVxuXG4vLyAvLyBSw6ljdXDDqXJlciBsJ0lEIGR1IGRvc3NpZXJcbi8vIGRvc3NpZXJJZCA9IGdldERvc3NpZXJJZEZyb21VcmwoKTtcblxuLy8gLy8gQWpvdXQgZGUgbCfDqXbDqW5lbWVudCBiZWZvcmV1bmxvYWQgZXQgc29uIGdlc3Rpb25uYWlyZSBkJ8OpdsOpbmVtZW50c1xuLy8gd2luZG93LmFkZEV2ZW50TGlzdGVuZXIoXCJiZWZvcmV1bmxvYWRcIiwgYmVmb3JlVW5sb2FkSGFuZGxlcik7XG5cbi8vIC8vIEFqb3V0IGRlIGwnw6l2w6luZW1lbnQgdW5sb2FkIHBvdXIgZW52b3llciBsYSByZXF1w6p0ZSBkZSBkw6l2ZXJyb3VpbGxhZ2Vcbi8vIHdpbmRvdy5hZGRFdmVudExpc3RlbmVyKFwidW5sb2FkXCIsIGZ1bmN0aW9uKCkge1xuLy8gICAgIGlmICghbGVhdmluZykge1xuLy8gICAgICAgICB1bmxvY2tEb3NzaWVyKCk7XG4vLyAgICAgfVxuLy8gfSk7XG5cbi8vIC8vIFdlYlNvY2tldCBjb25maWd1cmF0aW9uXG4vLyBzb2NrZXQub25vcGVuID0gZnVuY3Rpb24oZSkge1xuLy8gICAgIGNvbnNvbGUubG9nKFwiW29wZW5dIENvbm5lY3Rpb24gZXN0YWJsaXNoZWRcIik7XG4vLyB9O1xuXG4vLyBzb2NrZXQub25tZXNzYWdlID0gZnVuY3Rpb24oZXZlbnQpIHtcbi8vICAgICBjb25zb2xlLmxvZyhgW21lc3NhZ2VdIERhdGEgcmVjZWl2ZWQgZnJvbSBzZXJ2ZXI6ICR7ZXZlbnQuZGF0YX1gKTtcbi8vICAgICBpZiAoZXZlbnQuZGF0YSA9PT0gXCJDbG9zZWRcIikge1xuLy8gICAgICAgICB1bmxvY2tEb3NzaWVyKCk7XG4vLyAgICAgfVxuLy8gfTtcblxuLy8gc29ja2V0Lm9uY2xvc2UgPSBmdW5jdGlvbihldmVudCkge1xuLy8gICAgIGlmIChldmVudC53YXNDbGVhbikge1xuLy8gICAgICAgICB3aW5kb3cuY2xvc2UoKSAgO1xuLy8gICAgICAgICBjb25zb2xlLmxvZyhgW2Nsb3NlXSBDb25uZWN0aW9uIGNsb3NlZCBjbGVhbmx5LCBjb2RlPSR7ZXZlbnQuY29kZX0gcmVhc29uPSR7ZXZlbnQucmVhc29ufWApO1xuLy8gICB9IGVsc2Uge1xuLy8gICAgICAgICB1bmxvY2tEb3NzaWVyKCk7XG4vLyAgICAgfVxuXG4vLyAgICAgLy8gVsOpcmlmaWNhdGlvbiBww6lyaW9kaXF1ZSB0b3V0ZXMgbGVzIDEwIHNlY29uZGVzXG4vLyAgICAgaWYgKCFkb3NzaWVyTG9ja2VkKSB7XG4vLyAgICAgICAgIHNldEludGVydmFsKGZ1bmN0aW9uKCkge1xuLy8gICAgICAgICAgICAgaWYgKGRvY3VtZW50LnZpc2liaWxpdHlTdGF0ZSA9PT0gJ3Zpc2libGUnKSB7XG4vLyAgICAgICAgICAgICAgICAgbG9ja0Rvc3NpZXIoKTtcbi8vICAgICAgICAgICAgIH1cbi8vICAgICAgICAgfSwgMTAwMDApO1xuLy8gICAgIH1cbi8vIH07XG4vLyBzb2NrZXQuY2xvc2UoMTAwMCxcIkplIHF1aXR0ZVwiKTtcblxuLy8gc29ja2V0Lm9uZXJyb3IgPSBmdW5jdGlvbihlcnJvcikge1xuLy8gICAgIGNvbnNvbGUubG9nKGBbZXJyb3JdICR7ZXJyb3IubWVzc2FnZX1gKTtcbi8vIH07XG4iXSwibmFtZXMiOltdLCJzb3VyY2VSb290IjoiIn0=