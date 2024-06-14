(self["webpackChunk"] = self["webpackChunk"] || []).push([["modifyDossier"],{

/***/ "./assets/js/modifyDossier.js":
/*!************************************!*\
  !*** ./assets/js/modifyDossier.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }
function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
__webpack_require__(/*! core-js/modules/es.regexp.exec.js */ "./node_modules/core-js/modules/es.regexp.exec.js");
__webpack_require__(/*! core-js/modules/es.string.replace.js */ "./node_modules/core-js/modules/es.string.replace.js");
__webpack_require__(/*! core-js/modules/web.timers.js */ "./node_modules/core-js/modules/web.timers.js");
__webpack_require__(/*! core-js/modules/es.array.for-each.js */ "./node_modules/core-js/modules/es.array.for-each.js");
__webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
__webpack_require__(/*! core-js/modules/web.dom-collections.for-each.js */ "./node_modules/core-js/modules/web.dom-collections.for-each.js");
__webpack_require__(/*! core-js/modules/es.string.trim.js */ "./node_modules/core-js/modules/es.string.trim.js");
__webpack_require__(/*! core-js/modules/es.promise.js */ "./node_modules/core-js/modules/es.promise.js");
__webpack_require__(/*! core-js/modules/es.json.stringify.js */ "./node_modules/core-js/modules/es.json.stringify.js");
__webpack_require__(/*! core-js/modules/es.error.cause.js */ "./node_modules/core-js/modules/es.error.cause.js");
__webpack_require__(/*! core-js/modules/es.error.to-string.js */ "./node_modules/core-js/modules/es.error.to-string.js");
__webpack_require__(/*! core-js/modules/es.array.slice.js */ "./node_modules/core-js/modules/es.array.slice.js");
__webpack_require__(/*! core-js/modules/es.object.keys.js */ "./node_modules/core-js/modules/es.object.keys.js");
__webpack_require__(/*! core-js/modules/es.array.concat.js */ "./node_modules/core-js/modules/es.array.concat.js");
__webpack_require__(/*! core-js/modules/es.date.to-string.js */ "./node_modules/core-js/modules/es.date.to-string.js");
__webpack_require__(/*! core-js/modules/es.array.map.js */ "./node_modules/core-js/modules/es.array.map.js");
__webpack_require__(/*! core-js/modules/es.array.is-array.js */ "./node_modules/core-js/modules/es.array.is-array.js");
__webpack_require__(/*! core-js/modules/es.symbol.js */ "./node_modules/core-js/modules/es.symbol.js");
__webpack_require__(/*! core-js/modules/es.symbol.description.js */ "./node_modules/core-js/modules/es.symbol.description.js");
__webpack_require__(/*! core-js/modules/es.symbol.iterator.js */ "./node_modules/core-js/modules/es.symbol.iterator.js");
__webpack_require__(/*! core-js/modules/es.array.iterator.js */ "./node_modules/core-js/modules/es.array.iterator.js");
__webpack_require__(/*! core-js/modules/es.string.iterator.js */ "./node_modules/core-js/modules/es.string.iterator.js");
__webpack_require__(/*! core-js/modules/web.dom-collections.iterator.js */ "./node_modules/core-js/modules/web.dom-collections.iterator.js");
__webpack_require__(/*! core-js/modules/es.array.from.js */ "./node_modules/core-js/modules/es.array.from.js");
__webpack_require__(/*! core-js/modules/es.regexp.to-string.js */ "./node_modules/core-js/modules/es.regexp.to-string.js");
__webpack_require__(/*! core-js/modules/es.function.name.js */ "./node_modules/core-js/modules/es.function.name.js");
__webpack_require__(/*! core-js/modules/es.regexp.test.js */ "./node_modules/core-js/modules/es.regexp.test.js");
document.addEventListener('DOMContentLoaded', function () {
  var countdownDuration = 2 * 60; // 5 minutes
  var redirecting = false;
  var timerElement = document.getElementById('timerSpan');
  function updateCountdown() {
    var minutes = Math.floor(countdownDuration / 60);
    var seconds = countdownDuration % 60;
    if (timerElement) {
      timerElement.textContent = minutes + ' minutes : ' + (seconds < 10 ? '0' : '') + seconds + ' secondes';
      countdownDuration--;
    }
    if (countdownDuration < 0) {
      clearInterval(timerInterval);
      if (timerElement) {
        timerElement.textContent = 'Terminé!';
      }
      if (!redirecting) {
        // Vérifier si la redirection n'a pas déjà été déclenchée
        redirecting = true; // Marquer la redirection comme déclenchée
        window.onbeforeunload = null;
        window.location.replace("http://127.0.0.1:8000/");
      }
    }
  }
  var timerInterval = setInterval(updateCountdown, 1000);
  var modifyButtons = document.querySelectorAll('.modifyComment');
  var deleteButtons = document.querySelectorAll('.deleteComment');
  var sendCommentButton = document.getElementById('sendCommentButton');

  // Fonction pour attacher les gestionnaires d'événements pour les boutons de modification et de suppression
  function attachEventHandlers() {
    // Sélectionner tous les boutons de modification et de suppression
    var modifyButtons = document.querySelectorAll('.modifyComment');
    var deleteButtons = document.querySelectorAll('.deleteComment');

    // Attacher les gestionnaires d'événements aux boutons de modification
    modifyButtons.forEach(function (button) {
      button.addEventListener('click', function (event) {
        var commentId = button.parentElement.parentElement.querySelector('#commentId').textContent;
        var containerDiv = document.getElementById("p-".concat(commentId)).parentNode;

        // Check if the container div already contains an input element
        if (!containerDiv.querySelector('input[type="text"]')) {
          // Create an input element with the class form-control
          var inputElement = document.createElement('input');
          inputElement.type = 'text';
          inputElement.value = containerDiv.querySelector('p').textContent;
          inputElement.classList.add('form-control');

          // Create a sibling button element with the classes btn and btn-primary
          var buttonSendModifyElement = document.createElement('button');
          buttonSendModifyElement.type = 'button';
          buttonSendModifyElement.classList.add('btn', 'btn-primary');
          buttonSendModifyElement.textContent = 'Envoyer';

          // Append the input and button elements to the container div
          containerDiv.appendChild(inputElement);
          containerDiv.appendChild(buttonSendModifyElement);

          // Hide the original paragraph element
          containerDiv.querySelector('p').style.display = 'none';

          // Add event listener to the button to send the modified comment
          buttonSendModifyElement.addEventListener('click', function () {
            // Get the modified comment message
            var modifiedMessage = inputElement.value.trim();
            // Validate the input field
            if (modifiedMessage === '') {
              // Prevent default action and show error styles
              event.preventDefault();
              inputElement.style.border = '2px solid red';
              inputElement.placeholder = 'Vous devez renseigner un commentaire';
              inputElement.classList.add('comment-placeholder'); // Optionally add a class to style the placeholder with CSS
              return;
            } else {
              // Update the paragraph element with the new message
              var paragraphElement = containerDiv.querySelector('p');
              paragraphElement.textContent = modifiedMessage;

              // Show the updated paragraph element
              paragraphElement.style.display = 'block';

              // Remove the input and button elements
              inputElement.remove();
              buttonSendModifyElement.remove();

              // Send the modified comment message via AJAX
              fetch("/dossiers/modifyCommentaire/".concat(commentId), {
                method: 'POST',
                // Use POST to send the modified data
                headers: {
                  'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                  message: modifiedMessage
                }) // Send the modified message in the request body
              }).then(function (response) {
                if (!response.ok) {
                  throw new Error('Network response was not ok');
                }
                return response.json();
              }).then(function (data) {
                // Optionally, update the UI to reflect the changes
                var newParagraph = document.createElement('p');
                newParagraph.id = "p-".concat(commentId);
                newParagraph.textContent = modifiedMessage;
                var buttonElement = containerDiv.querySelector('button');
                if (buttonElement) {
                  buttonElement.remove();
                }
              });
            }
          });
        } else {
          // Remove the input element and button element, and show the original paragraph element
          containerDiv.querySelector('input[type="text"]').remove();
          containerDiv.querySelector('button').remove();
          containerDiv.querySelector('p').style.display = 'block';
        }
      });
    });
    deleteButtons.forEach(function (button) {
      button.addEventListener('click', function (event) {
        var commentId = button.parentElement.parentElement.querySelector('#commentId').textContent;
        var containerDiv = document.getElementById("p-".concat(commentId));
        var parentCommentaire = document.querySelector(".id_cardCommentaire-".concat(commentId)).parentElement;

        // Envoi de la requête AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/dossiers/deleteCommentaire/".concat(commentId), true);
        xhr.onreadystatechange = function () {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              // Actualiser la page ou mettre à jour l'interface utilisateur si nécessaire
              parentCommentaire.remove();
            } else {
              console.error('Une erreur s\'est produite lors de la suppression du commentaire');
              // Gérer les erreurs
            }
          }
        };
        xhr.send();
      });
    });
  }
  attachEventHandlers();
  if (sendCommentButton) {
    sendCommentButton.addEventListener('click', function (e) {
      // Extract the dossier ID from the form's data attribute
      var form = document.getElementById('dossierModified');
      var dossierId = form.getAttribute('data-dossier-id');
      var commentInput = document.getElementById('dossiers_edit_dossier_commentaire_message');
      var commentMessage = commentInput.value.trim();

      // Vérifie si le commentaire est vide
      if (commentMessage === '') {
        e.preventDefault();
        // Affiche une erreur visuelle
        commentInput.style.border = '2px solid red';
        commentInput.placeholder = 'Veuillez saisir un commentaire (minimum 1 caractère)';

        // Efface le champ de commentaire
        commentInput.value = '';

        // Empêche l'envoi du formulaire
      } else {
        var capitalize = function capitalize(str) {
          return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase();
        };
        // Affiche une erreur visuelle
        commentInput.style.border = '1px solid #dee2e6';
        commentInput.placeholder = 'Ajouter un commentaire';
        var xhr = new XMLHttpRequest();
        xhr.open('POST', "/dossiers/submit-comment/".concat(dossierId), true);
        xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4) {
            if (xhr.status === 200) {
              var response = JSON.parse(xhr.responseText);
              if (response.comment) {
                var newComment = response.comment;
                var newCommentDiv = document.createElement('div');
                newCommentDiv.classList.add('card', 'mb-4');
                newCommentDiv.style = "height: fit-content !important;";
                newCommentDiv.innerHTML = "\n                                    <div class=\"card-body id_cardCommentaire-".concat(newComment.id, "\">\n                                        <div class=\"d-flex flex-column justify-content-between\">\n                                            <div class=\"d-flex flex-row align-items-center justify-content-between\">\n                                                <p class=\"text-muted fs-4 mb-0\">").concat(capitalize(newComment.userName), " ").concat(capitalize(newComment.userLastName), "</p>\n                                                <p class=\"text-muted fs-4 mb-0\">").concat(new Date(newComment.dateCommentaire).toLocaleString(), "</p>\n                                            </div>\n                                            <p class=\"invisible\" id=\"commentId\">").concat(newComment.id, "</p>\n                                            <div>\n                                                <p class=\"fs-5 text-black\" id=\"p-").concat(newComment.id, "\">").concat(newComment.message, "</p>\n                                            </div>\n                                        </div>\n                                        <div class=\"d-flex justify-content-end\">\n                                            <button type=\"button\" class=\"btn btn-primary btn-md modifyComment\">Modifier</button>\n                                            \n                                        </div>\n                                    </div>\n                                ");
                document.getElementById('editComments').appendChild(newCommentDiv);
                document.getElementById('dossiers_edit_dossier_commentaire_message').value = ''; // Clear the textarea
                attachEventHandlers();
              } else {
                alert('Error: ' + response.message);
              }
            } else {
              alert('Error: ' + xhr.statusText);
            }
          }
        };
        xhr.send(JSON.stringify({
          message: commentMessage
        }));
      }
    });
  }
  var popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
  var popoverList = _toConsumableArray(popoverTriggerList).map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl);
  });
});

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_core-js_internals_define-built-in_js","vendors-node_modules_core-js_internals_classof_js-node_modules_core-js_internals_export_js","vendors-node_modules_core-js_modules_es_array_for-each_js-node_modules_core-js_modules_es_obj-7bb33f","vendors-node_modules_core-js_internals_add-to-unscopables_js-node_modules_core-js_modules_es_-eb8fb3","vendors-node_modules_core-js_internals_a-constructor_js-node_modules_core-js_internals_string-24650e","vendors-node_modules_core-js_modules_es_array_concat_js-node_modules_core-js_modules_es_objec-022dc4"], () => (__webpack_exec__("./assets/js/modifyDossier.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoibW9kaWZ5RG9zc2llci5qcyIsIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7OztBQUFBQSxRQUFRLENBQUNDLGdCQUFnQixDQUFDLGtCQUFrQixFQUFFLFlBQVk7RUFHdEQsSUFBSUMsaUJBQWlCLEdBQUcsQ0FBQyxHQUFHLEVBQUUsQ0FBQyxDQUFDO0VBQ2hDLElBQUlDLFdBQVcsR0FBRyxLQUFLO0VBQ3ZCLElBQU1DLFlBQVksR0FBR0osUUFBUSxDQUFDSyxjQUFjLENBQUMsV0FBVyxDQUFDO0VBRXpELFNBQVNDLGVBQWVBLENBQUEsRUFBRztJQUN2QixJQUFJQyxPQUFPLEdBQUdDLElBQUksQ0FBQ0MsS0FBSyxDQUFDUCxpQkFBaUIsR0FBRyxFQUFFLENBQUM7SUFDaEQsSUFBSVEsT0FBTyxHQUFHUixpQkFBaUIsR0FBRyxFQUFFO0lBQ3BDLElBQUdFLFlBQVksRUFBQztNQUNaQSxZQUFZLENBQUNPLFdBQVcsR0FBR0osT0FBTyxHQUFHLGFBQWEsSUFBSUcsT0FBTyxHQUFHLEVBQUUsR0FBRyxHQUFHLEdBQUcsRUFBRSxDQUFDLEdBQUdBLE9BQU8sR0FBRSxXQUFXO01BQ3JHUixpQkFBaUIsRUFBRTtJQUV2QjtJQUVBLElBQUlBLGlCQUFpQixHQUFHLENBQUMsRUFBRTtNQUN2QlUsYUFBYSxDQUFDQyxhQUFhLENBQUM7TUFDNUIsSUFBR1QsWUFBWSxFQUFDO1FBQ1pBLFlBQVksQ0FBQ08sV0FBVyxHQUFHLFVBQVU7TUFDekM7TUFDQSxJQUFJLENBQUNSLFdBQVcsRUFBRTtRQUFFO1FBQ2hCQSxXQUFXLEdBQUcsSUFBSSxDQUFDLENBQUM7UUFDcEJXLE1BQU0sQ0FBQ0MsY0FBYyxHQUFHLElBQUk7UUFDNUJELE1BQU0sQ0FBQ0UsUUFBUSxDQUFDQyxPQUFPLENBQUMsd0JBQXdCLENBQUM7TUFDckQ7SUFDSjtFQUNKO0VBRUEsSUFBTUosYUFBYSxHQUFHSyxXQUFXLENBQUNaLGVBQWUsRUFBRSxJQUFJLENBQUM7RUFFeEQsSUFBTWEsYUFBYSxHQUFHbkIsUUFBUSxDQUFDb0IsZ0JBQWdCLENBQUMsZ0JBQWdCLENBQUM7RUFDakUsSUFBTUMsYUFBYSxHQUFHckIsUUFBUSxDQUFDb0IsZ0JBQWdCLENBQUMsZ0JBQWdCLENBQUM7RUFDakUsSUFBTUUsaUJBQWlCLEdBQUd0QixRQUFRLENBQUNLLGNBQWMsQ0FBQyxtQkFBbUIsQ0FBQzs7RUFHdEU7RUFDQSxTQUFTa0IsbUJBQW1CQSxDQUFBLEVBQUc7SUFDM0I7SUFDQSxJQUFNSixhQUFhLEdBQUduQixRQUFRLENBQUNvQixnQkFBZ0IsQ0FBQyxnQkFBZ0IsQ0FBQztJQUNqRSxJQUFNQyxhQUFhLEdBQUdyQixRQUFRLENBQUNvQixnQkFBZ0IsQ0FBQyxnQkFBZ0IsQ0FBQzs7SUFFakU7SUFDQUQsYUFBYSxDQUFDSyxPQUFPLENBQUMsVUFBQUMsTUFBTSxFQUFJO01BQzVCQSxNQUFNLENBQUN4QixnQkFBZ0IsQ0FBQyxPQUFPLEVBQUUsVUFBVXlCLEtBQUssRUFBRTtRQUM5QyxJQUFNQyxTQUFTLEdBQUdGLE1BQU0sQ0FBQ0csYUFBYSxDQUFDQSxhQUFhLENBQUNDLGFBQWEsQ0FBQyxZQUFZLENBQUMsQ0FBQ2xCLFdBQVc7UUFDNUYsSUFBTW1CLFlBQVksR0FBRzlCLFFBQVEsQ0FBQ0ssY0FBYyxNQUFBMEIsTUFBQSxDQUFNSixTQUFTLENBQUUsQ0FBQyxDQUFDSyxVQUFVOztRQUV6RTtRQUNBLElBQUksQ0FBQ0YsWUFBWSxDQUFDRCxhQUFhLENBQUMsb0JBQW9CLENBQUMsRUFBRTtVQUNuRDtVQUNBLElBQU1JLFlBQVksR0FBR2pDLFFBQVEsQ0FBQ2tDLGFBQWEsQ0FBQyxPQUFPLENBQUM7VUFDcERELFlBQVksQ0FBQ0UsSUFBSSxHQUFHLE1BQU07VUFDMUJGLFlBQVksQ0FBQ0csS0FBSyxHQUFHTixZQUFZLENBQUNELGFBQWEsQ0FBQyxHQUFHLENBQUMsQ0FBQ2xCLFdBQVc7VUFDaEVzQixZQUFZLENBQUNJLFNBQVMsQ0FBQ0MsR0FBRyxDQUFDLGNBQWMsQ0FBQzs7VUFFMUM7VUFDQSxJQUFNQyx1QkFBdUIsR0FBR3ZDLFFBQVEsQ0FBQ2tDLGFBQWEsQ0FBQyxRQUFRLENBQUM7VUFDaEVLLHVCQUF1QixDQUFDSixJQUFJLEdBQUcsUUFBUTtVQUN2Q0ksdUJBQXVCLENBQUNGLFNBQVMsQ0FBQ0MsR0FBRyxDQUFDLEtBQUssRUFBRSxhQUFhLENBQUM7VUFDM0RDLHVCQUF1QixDQUFDNUIsV0FBVyxHQUFHLFNBQVM7O1VBRS9DO1VBQ0FtQixZQUFZLENBQUNVLFdBQVcsQ0FBQ1AsWUFBWSxDQUFDO1VBQ3RDSCxZQUFZLENBQUNVLFdBQVcsQ0FBQ0QsdUJBQXVCLENBQUM7O1VBRWpEO1VBQ0FULFlBQVksQ0FBQ0QsYUFBYSxDQUFDLEdBQUcsQ0FBQyxDQUFDWSxLQUFLLENBQUNDLE9BQU8sR0FBRyxNQUFNOztVQUV0RDtVQUNBSCx1QkFBdUIsQ0FBQ3RDLGdCQUFnQixDQUFDLE9BQU8sRUFBRSxZQUFXO1lBQ3pEO1lBQ0EsSUFBTTBDLGVBQWUsR0FBR1YsWUFBWSxDQUFDRyxLQUFLLENBQUNRLElBQUksQ0FBQyxDQUFDO1lBQ2pEO1lBQ0EsSUFBSUQsZUFBZSxLQUFLLEVBQUUsRUFBRTtjQUN4QjtjQUNBakIsS0FBSyxDQUFDbUIsY0FBYyxDQUFDLENBQUM7Y0FDdEJaLFlBQVksQ0FBQ1EsS0FBSyxDQUFDSyxNQUFNLEdBQUcsZUFBZTtjQUMzQ2IsWUFBWSxDQUFDYyxXQUFXLEdBQUcsc0NBQXNDO2NBQ2pFZCxZQUFZLENBQUNJLFNBQVMsQ0FBQ0MsR0FBRyxDQUFDLHFCQUFxQixDQUFDLENBQUMsQ0FBQztjQUNuRDtZQUNKLENBQUMsTUFBSTtjQUNEO2NBQ0EsSUFBTVUsZ0JBQWdCLEdBQUdsQixZQUFZLENBQUNELGFBQWEsQ0FBQyxHQUFHLENBQUM7Y0FDeERtQixnQkFBZ0IsQ0FBQ3JDLFdBQVcsR0FBR2dDLGVBQWU7O2NBRTlDO2NBQ0FLLGdCQUFnQixDQUFDUCxLQUFLLENBQUNDLE9BQU8sR0FBRyxPQUFPOztjQUV4QztjQUNBVCxZQUFZLENBQUNnQixNQUFNLENBQUMsQ0FBQztjQUNyQlYsdUJBQXVCLENBQUNVLE1BQU0sQ0FBQyxDQUFDOztjQUUvQjtjQUNEQyxLQUFLLGdDQUFBbkIsTUFBQSxDQUFnQ0osU0FBUyxHQUFJO2dCQUM5Q3dCLE1BQU0sRUFBRSxNQUFNO2dCQUFFO2dCQUNoQkMsT0FBTyxFQUFFO2tCQUNMLGNBQWMsRUFBRTtnQkFDcEIsQ0FBQztnQkFDREMsSUFBSSxFQUFFQyxJQUFJLENBQUNDLFNBQVMsQ0FBQztrQkFBRUMsT0FBTyxFQUFFYjtnQkFBZ0IsQ0FBQyxDQUFDLENBQUM7Y0FDdkQsQ0FBQyxDQUFDLENBQ0RjLElBQUksQ0FBQyxVQUFBQyxRQUFRLEVBQUk7Z0JBQ2QsSUFBSSxDQUFDQSxRQUFRLENBQUNDLEVBQUUsRUFBRTtrQkFDZCxNQUFNLElBQUlDLEtBQUssQ0FBQyw2QkFBNkIsQ0FBQztnQkFDbEQ7Z0JBQ0EsT0FBT0YsUUFBUSxDQUFDRyxJQUFJLENBQUMsQ0FBQztjQUMxQixDQUFDLENBQUMsQ0FDREosSUFBSSxDQUFDLFVBQUFLLElBQUksRUFBSTtnQkFDVjtnQkFDQSxJQUFNQyxZQUFZLEdBQUcvRCxRQUFRLENBQUNrQyxhQUFhLENBQUMsR0FBRyxDQUFDO2dCQUNoRDZCLFlBQVksQ0FBQ0MsRUFBRSxRQUFBakMsTUFBQSxDQUFRSixTQUFTLENBQUU7Z0JBQ2xDb0MsWUFBWSxDQUFDcEQsV0FBVyxHQUFHZ0MsZUFBZTtnQkFJMUMsSUFBTXNCLGFBQWEsR0FBR25DLFlBQVksQ0FBQ0QsYUFBYSxDQUFDLFFBQVEsQ0FBQztnQkFDMUQsSUFBSW9DLGFBQWEsRUFBRTtrQkFDZkEsYUFBYSxDQUFDaEIsTUFBTSxDQUFDLENBQUM7Z0JBQzFCO2NBQ0osQ0FBQyxDQUFDO1lBR047VUFFSixDQUFDLENBQUM7UUFHTixDQUFDLE1BQU07VUFDSDtVQUNBbkIsWUFBWSxDQUFDRCxhQUFhLENBQUMsb0JBQW9CLENBQUMsQ0FBQ29CLE1BQU0sQ0FBQyxDQUFDO1VBQ3pEbkIsWUFBWSxDQUFDRCxhQUFhLENBQUMsUUFBUSxDQUFDLENBQUNvQixNQUFNLENBQUMsQ0FBQztVQUM3Q25CLFlBQVksQ0FBQ0QsYUFBYSxDQUFDLEdBQUcsQ0FBQyxDQUFDWSxLQUFLLENBQUNDLE9BQU8sR0FBRyxPQUFPO1FBQzNEO01BQ0osQ0FBQyxDQUFDO0lBQ04sQ0FBQyxDQUFDO0lBRUZyQixhQUFhLENBQUNHLE9BQU8sQ0FBQyxVQUFBQyxNQUFNLEVBQUk7TUFDNUJBLE1BQU0sQ0FBQ3hCLGdCQUFnQixDQUFDLE9BQU8sRUFBRSxVQUFVeUIsS0FBSyxFQUFFO1FBQzlDLElBQU1DLFNBQVMsR0FBR0YsTUFBTSxDQUFDRyxhQUFhLENBQUNBLGFBQWEsQ0FBQ0MsYUFBYSxDQUFDLFlBQVksQ0FBQyxDQUFDbEIsV0FBVztRQUU1RixJQUFNbUIsWUFBWSxHQUFHOUIsUUFBUSxDQUFDSyxjQUFjLE1BQUEwQixNQUFBLENBQU1KLFNBQVMsQ0FBRSxDQUFDO1FBQzlELElBQUl1QyxpQkFBaUIsR0FBR2xFLFFBQVEsQ0FBQzZCLGFBQWEsd0JBQUFFLE1BQUEsQ0FBd0JKLFNBQVMsQ0FBRSxDQUFDLENBQUNDLGFBQWE7O1FBRWhHO1FBQ0EsSUFBTXVDLEdBQUcsR0FBRyxJQUFJQyxjQUFjLENBQUMsQ0FBQztRQUNoQ0QsR0FBRyxDQUFDRSxJQUFJLENBQUMsS0FBSyxpQ0FBQXRDLE1BQUEsQ0FBaUNKLFNBQVMsR0FBSSxJQUFJLENBQUM7UUFDakV3QyxHQUFHLENBQUNHLGtCQUFrQixHQUFHLFlBQVk7VUFDakMsSUFBSUgsR0FBRyxDQUFDSSxVQUFVLEtBQUtILGNBQWMsQ0FBQ0ksSUFBSSxFQUFFO1lBQ3hDLElBQUlMLEdBQUcsQ0FBQ00sTUFBTSxLQUFLLEdBQUcsRUFBRTtjQUNwQjtjQUNBUCxpQkFBaUIsQ0FBQ2pCLE1BQU0sQ0FBQyxDQUFDO1lBQzlCLENBQUMsTUFBTTtjQUNIeUIsT0FBTyxDQUFDQyxLQUFLLENBQUMsa0VBQWtFLENBQUM7Y0FDakY7WUFDSjtVQUNKO1FBQ0osQ0FBQztRQUNEUixHQUFHLENBQUNTLElBQUksQ0FBQyxDQUFDO01BQ2QsQ0FBQyxDQUFDO0lBQ04sQ0FBQyxDQUFDO0VBQ047RUFFQXJELG1CQUFtQixDQUFDLENBQUM7RUFDckIsSUFBR0QsaUJBQWlCLEVBQUM7SUFDakJBLGlCQUFpQixDQUFDckIsZ0JBQWdCLENBQUMsT0FBTyxFQUFFLFVBQVM0RSxDQUFDLEVBQUU7TUFDcEQ7TUFDQSxJQUFNQyxJQUFJLEdBQUc5RSxRQUFRLENBQUNLLGNBQWMsQ0FBQyxpQkFBaUIsQ0FBQztNQUN2RCxJQUFNMEUsU0FBUyxHQUFHRCxJQUFJLENBQUNFLFlBQVksQ0FBQyxpQkFBaUIsQ0FBQztNQUN0RCxJQUFNQyxZQUFZLEdBQUdqRixRQUFRLENBQUNLLGNBQWMsQ0FBQywyQ0FBMkMsQ0FBQztNQUN6RixJQUFNNkUsY0FBYyxHQUFHRCxZQUFZLENBQUM3QyxLQUFLLENBQUNRLElBQUksQ0FBQyxDQUFDOztNQUVoRDtNQUNBLElBQUlzQyxjQUFjLEtBQUssRUFBRSxFQUFFO1FBQ3ZCTCxDQUFDLENBQUNoQyxjQUFjLENBQUMsQ0FBQztRQUNsQjtRQUNBb0MsWUFBWSxDQUFDeEMsS0FBSyxDQUFDSyxNQUFNLEdBQUcsZUFBZTtRQUUzQ21DLFlBQVksQ0FBQ2xDLFdBQVcsR0FBRyxzREFBc0Q7O1FBRWpGO1FBQ0FrQyxZQUFZLENBQUM3QyxLQUFLLEdBQUcsRUFBRTs7UUFFdkI7TUFDSixDQUFDLE1BQUk7UUFBQSxJQUtRK0MsVUFBVSxHQUFuQixTQUFTQSxVQUFVQSxDQUFDQyxHQUFHLEVBQUU7VUFDckIsT0FBT0EsR0FBRyxDQUFDQyxNQUFNLENBQUMsQ0FBQyxDQUFDLENBQUNDLFdBQVcsQ0FBQyxDQUFDLEdBQUdGLEdBQUcsQ0FBQ0csS0FBSyxDQUFDLENBQUMsQ0FBQyxDQUFDQyxXQUFXLENBQUMsQ0FBQztRQUNuRSxDQUFDO1FBTkQ7UUFDQVAsWUFBWSxDQUFDeEMsS0FBSyxDQUFDSyxNQUFNLEdBQUcsbUJBQW1CO1FBQy9DbUMsWUFBWSxDQUFDbEMsV0FBVyxHQUFHLHdCQUF3QjtRQU1uRCxJQUFNb0IsR0FBRyxHQUFHLElBQUlDLGNBQWMsQ0FBQyxDQUFDO1FBQ2hDRCxHQUFHLENBQUNFLElBQUksQ0FBQyxNQUFNLDhCQUFBdEMsTUFBQSxDQUE4QmdELFNBQVMsR0FBSSxJQUFJLENBQUM7UUFDL0RaLEdBQUcsQ0FBQ3NCLGdCQUFnQixDQUFDLGNBQWMsRUFBRSxnQ0FBZ0MsQ0FBQztRQUN0RXRCLEdBQUcsQ0FBQ0csa0JBQWtCLEdBQUcsWUFBWTtVQUNqQyxJQUFJSCxHQUFHLENBQUNJLFVBQVUsS0FBSyxDQUFDLEVBQUU7WUFDdEIsSUFBSUosR0FBRyxDQUFDTSxNQUFNLEtBQUssR0FBRyxFQUFFO2NBQ3BCLElBQU1mLFFBQVEsR0FBR0osSUFBSSxDQUFDb0MsS0FBSyxDQUFDdkIsR0FBRyxDQUFDd0IsWUFBWSxDQUFDO2NBQzdDLElBQUlqQyxRQUFRLENBQUNrQyxPQUFPLEVBQUU7Z0JBQ2xCLElBQU1DLFVBQVUsR0FBR25DLFFBQVEsQ0FBQ2tDLE9BQU87Z0JBQ25DLElBQU1FLGFBQWEsR0FBRzlGLFFBQVEsQ0FBQ2tDLGFBQWEsQ0FBQyxLQUFLLENBQUM7Z0JBQ25ENEQsYUFBYSxDQUFDekQsU0FBUyxDQUFDQyxHQUFHLENBQUMsTUFBTSxFQUFFLE1BQU0sQ0FBQztnQkFDM0N3RCxhQUFhLENBQUNyRCxLQUFLLEdBQUMsaUNBQWlDO2dCQUNyRHFELGFBQWEsQ0FBQ0MsU0FBUyxzRkFBQWhFLE1BQUEsQ0FDd0I4RCxVQUFVLENBQUM3QixFQUFFLHlUQUFBakMsTUFBQSxDQUdWb0QsVUFBVSxDQUFDVSxVQUFVLENBQUNHLFFBQVEsQ0FBQyxPQUFBakUsTUFBQSxDQUFJb0QsVUFBVSxDQUFDVSxVQUFVLENBQUNJLFlBQVksQ0FBQyw4RkFBQWxFLE1BQUEsQ0FDdEUsSUFBSW1FLElBQUksQ0FBQ0wsVUFBVSxDQUFDTSxlQUFlLENBQUMsQ0FBQ0MsY0FBYyxDQUFDLENBQUMsb0pBQUFyRSxNQUFBLENBRXJEOEQsVUFBVSxDQUFDN0IsRUFBRSxtSkFBQWpDLE1BQUEsQ0FFWjhELFVBQVUsQ0FBQzdCLEVBQUUsU0FBQWpDLE1BQUEsQ0FBSzhELFVBQVUsQ0FBQ3JDLE9BQU8sbWZBUXRGO2dCQUNEeEQsUUFBUSxDQUFDSyxjQUFjLENBQUMsY0FBYyxDQUFDLENBQUNtQyxXQUFXLENBQUNzRCxhQUFhLENBQUM7Z0JBQ2xFOUYsUUFBUSxDQUFDSyxjQUFjLENBQUMsMkNBQTJDLENBQUMsQ0FBQytCLEtBQUssR0FBRyxFQUFFLENBQUMsQ0FBQztnQkFDakZiLG1CQUFtQixDQUFDLENBQUM7Y0FFekIsQ0FBQyxNQUFNO2dCQUNIOEUsS0FBSyxDQUFDLFNBQVMsR0FBRzNDLFFBQVEsQ0FBQ0YsT0FBTyxDQUFDO2NBQ3ZDO1lBQ0osQ0FBQyxNQUFNO2NBQ0g2QyxLQUFLLENBQUMsU0FBUyxHQUFHbEMsR0FBRyxDQUFDbUMsVUFBVSxDQUFDO1lBQ3JDO1VBQ0o7UUFDSixDQUFDO1FBQ0RuQyxHQUFHLENBQUNTLElBQUksQ0FBQ3RCLElBQUksQ0FBQ0MsU0FBUyxDQUFDO1VBQUVDLE9BQU8sRUFBRTBCO1FBQWUsQ0FBQyxDQUFDLENBQUM7TUFDekQ7SUFFSixDQUFDLENBQUM7RUFDTjtFQUVBLElBQU1xQixrQkFBa0IsR0FBR3ZHLFFBQVEsQ0FBQ29CLGdCQUFnQixDQUFDLDRCQUE0QixDQUFDO0VBQ2xGLElBQU1vRixXQUFXLEdBQUdDLGtCQUFBLENBQUlGLGtCQUFrQixFQUFFRyxHQUFHLENBQUMsVUFBQUMsZ0JBQWdCO0lBQUEsT0FBSSxJQUFJQyxTQUFTLENBQUNDLE9BQU8sQ0FBQ0YsZ0JBQWdCLENBQUM7RUFBQSxFQUFDO0FBSWhILENBQUMsQ0FBQyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL2Fzc2V0cy9qcy9tb2RpZnlEb3NzaWVyLmpzIl0sInNvdXJjZXNDb250ZW50IjpbImRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ0RPTUNvbnRlbnRMb2FkZWQnLCBmdW5jdGlvbiAoKSB7XG5cblxuICAgIGxldCBjb3VudGRvd25EdXJhdGlvbiA9IDIgKiA2MDsgLy8gNSBtaW51dGVzXG4gICAgbGV0IHJlZGlyZWN0aW5nID0gZmFsc2U7XG4gICAgY29uc3QgdGltZXJFbGVtZW50ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3RpbWVyU3BhbicpO1xuXG4gICAgZnVuY3Rpb24gdXBkYXRlQ291bnRkb3duKCkge1xuICAgICAgICBsZXQgbWludXRlcyA9IE1hdGguZmxvb3IoY291bnRkb3duRHVyYXRpb24gLyA2MCk7XG4gICAgICAgIGxldCBzZWNvbmRzID0gY291bnRkb3duRHVyYXRpb24gJSA2MDtcbiAgICAgICAgaWYodGltZXJFbGVtZW50KXtcbiAgICAgICAgICAgIHRpbWVyRWxlbWVudC50ZXh0Q29udGVudCA9IG1pbnV0ZXMgKyAnIG1pbnV0ZXMgOiAnICsgKHNlY29uZHMgPCAxMCA/ICcwJyA6ICcnKSArIHNlY29uZHMrICcgc2Vjb25kZXMnO1xuICAgICAgICAgICAgY291bnRkb3duRHVyYXRpb24tLTtcblxuICAgICAgICB9XG5cbiAgICAgICAgaWYgKGNvdW50ZG93bkR1cmF0aW9uIDwgMCkge1xuICAgICAgICAgICAgY2xlYXJJbnRlcnZhbCh0aW1lckludGVydmFsKTtcbiAgICAgICAgICAgIGlmKHRpbWVyRWxlbWVudCl7XG4gICAgICAgICAgICAgICAgdGltZXJFbGVtZW50LnRleHRDb250ZW50ID0gJ1Rlcm1pbsOpISc7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICBpZiAoIXJlZGlyZWN0aW5nKSB7IC8vIFbDqXJpZmllciBzaSBsYSByZWRpcmVjdGlvbiBuJ2EgcGFzIGTDqWrDoCDDqXTDqSBkw6ljbGVuY2jDqWVcbiAgICAgICAgICAgICAgICByZWRpcmVjdGluZyA9IHRydWU7IC8vIE1hcnF1ZXIgbGEgcmVkaXJlY3Rpb24gY29tbWUgZMOpY2xlbmNow6llXG4gICAgICAgICAgICAgICAgd2luZG93Lm9uYmVmb3JldW5sb2FkID0gbnVsbDtcbiAgICAgICAgICAgICAgICB3aW5kb3cubG9jYXRpb24ucmVwbGFjZShcImh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9cIik7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICB9XG5cbiAgICBjb25zdCB0aW1lckludGVydmFsID0gc2V0SW50ZXJ2YWwodXBkYXRlQ291bnRkb3duLCAxMDAwKTtcbiAgICBcbiAgICBjb25zdCBtb2RpZnlCdXR0b25zID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnLm1vZGlmeUNvbW1lbnQnKTtcbiAgICBjb25zdCBkZWxldGVCdXR0b25zID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnLmRlbGV0ZUNvbW1lbnQnKTtcbiAgICBjb25zdCBzZW5kQ29tbWVudEJ1dHRvbiA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdzZW5kQ29tbWVudEJ1dHRvbicpO1xuICAgIFxuXG4gICAgLy8gRm9uY3Rpb24gcG91ciBhdHRhY2hlciBsZXMgZ2VzdGlvbm5haXJlcyBkJ8OpdsOpbmVtZW50cyBwb3VyIGxlcyBib3V0b25zIGRlIG1vZGlmaWNhdGlvbiBldCBkZSBzdXBwcmVzc2lvblxuICAgIGZ1bmN0aW9uIGF0dGFjaEV2ZW50SGFuZGxlcnMoKSB7XG4gICAgICAgIC8vIFPDqWxlY3Rpb25uZXIgdG91cyBsZXMgYm91dG9ucyBkZSBtb2RpZmljYXRpb24gZXQgZGUgc3VwcHJlc3Npb25cbiAgICAgICAgY29uc3QgbW9kaWZ5QnV0dG9ucyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJy5tb2RpZnlDb21tZW50Jyk7XG4gICAgICAgIGNvbnN0IGRlbGV0ZUJ1dHRvbnMgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcuZGVsZXRlQ29tbWVudCcpO1xuXG4gICAgICAgIC8vIEF0dGFjaGVyIGxlcyBnZXN0aW9ubmFpcmVzIGQnw6l2w6luZW1lbnRzIGF1eCBib3V0b25zIGRlIG1vZGlmaWNhdGlvblxuICAgICAgICBtb2RpZnlCdXR0b25zLmZvckVhY2goYnV0dG9uID0+IHtcbiAgICAgICAgICAgIGJ1dHRvbi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uIChldmVudCkge1xuICAgICAgICAgICAgICAgIGNvbnN0IGNvbW1lbnRJZCA9IGJ1dHRvbi5wYXJlbnRFbGVtZW50LnBhcmVudEVsZW1lbnQucXVlcnlTZWxlY3RvcignI2NvbW1lbnRJZCcpLnRleHRDb250ZW50O1xuICAgICAgICAgICAgICAgIGNvbnN0IGNvbnRhaW5lckRpdiA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKGBwLSR7Y29tbWVudElkfWApLnBhcmVudE5vZGU7XG5cbiAgICAgICAgICAgICAgICAvLyBDaGVjayBpZiB0aGUgY29udGFpbmVyIGRpdiBhbHJlYWR5IGNvbnRhaW5zIGFuIGlucHV0IGVsZW1lbnRcbiAgICAgICAgICAgICAgICBpZiAoIWNvbnRhaW5lckRpdi5xdWVyeVNlbGVjdG9yKCdpbnB1dFt0eXBlPVwidGV4dFwiXScpKSB7XG4gICAgICAgICAgICAgICAgICAgIC8vIENyZWF0ZSBhbiBpbnB1dCBlbGVtZW50IHdpdGggdGhlIGNsYXNzIGZvcm0tY29udHJvbFxuICAgICAgICAgICAgICAgICAgICBjb25zdCBpbnB1dEVsZW1lbnQgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KCdpbnB1dCcpO1xuICAgICAgICAgICAgICAgICAgICBpbnB1dEVsZW1lbnQudHlwZSA9ICd0ZXh0JztcbiAgICAgICAgICAgICAgICAgICAgaW5wdXRFbGVtZW50LnZhbHVlID0gY29udGFpbmVyRGl2LnF1ZXJ5U2VsZWN0b3IoJ3AnKS50ZXh0Q29udGVudDtcbiAgICAgICAgICAgICAgICAgICAgaW5wdXRFbGVtZW50LmNsYXNzTGlzdC5hZGQoJ2Zvcm0tY29udHJvbCcpO1xuICAgICAgICAgICAgICAgIFxuICAgICAgICAgICAgICAgICAgICAvLyBDcmVhdGUgYSBzaWJsaW5nIGJ1dHRvbiBlbGVtZW50IHdpdGggdGhlIGNsYXNzZXMgYnRuIGFuZCBidG4tcHJpbWFyeVxuICAgICAgICAgICAgICAgICAgICBjb25zdCBidXR0b25TZW5kTW9kaWZ5RWxlbWVudCA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ2J1dHRvbicpO1xuICAgICAgICAgICAgICAgICAgICBidXR0b25TZW5kTW9kaWZ5RWxlbWVudC50eXBlID0gJ2J1dHRvbic7XG4gICAgICAgICAgICAgICAgICAgIGJ1dHRvblNlbmRNb2RpZnlFbGVtZW50LmNsYXNzTGlzdC5hZGQoJ2J0bicsICdidG4tcHJpbWFyeScpO1xuICAgICAgICAgICAgICAgICAgICBidXR0b25TZW5kTW9kaWZ5RWxlbWVudC50ZXh0Q29udGVudCA9ICdFbnZveWVyJztcblxuICAgICAgICAgICAgICAgICAgICAvLyBBcHBlbmQgdGhlIGlucHV0IGFuZCBidXR0b24gZWxlbWVudHMgdG8gdGhlIGNvbnRhaW5lciBkaXZcbiAgICAgICAgICAgICAgICAgICAgY29udGFpbmVyRGl2LmFwcGVuZENoaWxkKGlucHV0RWxlbWVudCk7XG4gICAgICAgICAgICAgICAgICAgIGNvbnRhaW5lckRpdi5hcHBlbmRDaGlsZChidXR0b25TZW5kTW9kaWZ5RWxlbWVudCk7XG5cbiAgICAgICAgICAgICAgICAgICAgLy8gSGlkZSB0aGUgb3JpZ2luYWwgcGFyYWdyYXBoIGVsZW1lbnRcbiAgICAgICAgICAgICAgICAgICAgY29udGFpbmVyRGl2LnF1ZXJ5U2VsZWN0b3IoJ3AnKS5zdHlsZS5kaXNwbGF5ID0gJ25vbmUnO1xuXG4gICAgICAgICAgICAgICAgICAgIC8vIEFkZCBldmVudCBsaXN0ZW5lciB0byB0aGUgYnV0dG9uIHRvIHNlbmQgdGhlIG1vZGlmaWVkIGNvbW1lbnRcbiAgICAgICAgICAgICAgICAgICAgYnV0dG9uU2VuZE1vZGlmeUVsZW1lbnQuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIC8vIEdldCB0aGUgbW9kaWZpZWQgY29tbWVudCBtZXNzYWdlXG4gICAgICAgICAgICAgICAgICAgICAgICBjb25zdCBtb2RpZmllZE1lc3NhZ2UgPSBpbnB1dEVsZW1lbnQudmFsdWUudHJpbSgpOyAgICAgICAgXG4gICAgICAgICAgICAgICAgICAgICAgICAvLyBWYWxpZGF0ZSB0aGUgaW5wdXQgZmllbGRcbiAgICAgICAgICAgICAgICAgICAgICAgIGlmIChtb2RpZmllZE1lc3NhZ2UgPT09ICcnKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgLy8gUHJldmVudCBkZWZhdWx0IGFjdGlvbiBhbmQgc2hvdyBlcnJvciBzdHlsZXNcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlucHV0RWxlbWVudC5zdHlsZS5ib3JkZXIgPSAnMnB4IHNvbGlkIHJlZCc7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaW5wdXRFbGVtZW50LnBsYWNlaG9sZGVyID0gJ1ZvdXMgZGV2ZXogcmVuc2VpZ25lciB1biBjb21tZW50YWlyZSc7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaW5wdXRFbGVtZW50LmNsYXNzTGlzdC5hZGQoJ2NvbW1lbnQtcGxhY2Vob2xkZXInKTsgLy8gT3B0aW9uYWxseSBhZGQgYSBjbGFzcyB0byBzdHlsZSB0aGUgcGxhY2Vob2xkZXIgd2l0aCBDU1NcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICByZXR1cm47XG4gICAgICAgICAgICAgICAgICAgICAgICB9ZWxzZXtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAvLyBVcGRhdGUgdGhlIHBhcmFncmFwaCBlbGVtZW50IHdpdGggdGhlIG5ldyBtZXNzYWdlXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uc3QgcGFyYWdyYXBoRWxlbWVudCA9IGNvbnRhaW5lckRpdi5xdWVyeVNlbGVjdG9yKCdwJyk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgcGFyYWdyYXBoRWxlbWVudC50ZXh0Q29udGVudCA9IG1vZGlmaWVkTWVzc2FnZTtcbiAgICBcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAvLyBTaG93IHRoZSB1cGRhdGVkIHBhcmFncmFwaCBlbGVtZW50XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgcGFyYWdyYXBoRWxlbWVudC5zdHlsZS5kaXNwbGF5ID0gJ2Jsb2NrJztcbiAgICBcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAvLyBSZW1vdmUgdGhlIGlucHV0IGFuZCBidXR0b24gZWxlbWVudHNcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpbnB1dEVsZW1lbnQucmVtb3ZlKCk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgYnV0dG9uU2VuZE1vZGlmeUVsZW1lbnQucmVtb3ZlKCk7XG5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgLy8gU2VuZCB0aGUgbW9kaWZpZWQgY29tbWVudCBtZXNzYWdlIHZpYSBBSkFYXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgZmV0Y2goYC9kb3NzaWVycy9tb2RpZnlDb21tZW50YWlyZS8ke2NvbW1lbnRJZH1gLCB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIG1ldGhvZDogJ1BPU1QnLCAvLyBVc2UgUE9TVCB0byBzZW5kIHRoZSBtb2RpZmllZCBkYXRhXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGhlYWRlcnM6IHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICdDb250ZW50LVR5cGUnOiAnYXBwbGljYXRpb24vanNvbidcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgYm9keTogSlNPTi5zdHJpbmdpZnkoeyBtZXNzYWdlOiBtb2RpZmllZE1lc3NhZ2UgfSkgLy8gU2VuZCB0aGUgbW9kaWZpZWQgbWVzc2FnZSBpbiB0aGUgcmVxdWVzdCBib2R5XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSlcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAudGhlbihyZXNwb25zZSA9PiB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlmICghcmVzcG9uc2Uub2spIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRocm93IG5ldyBFcnJvcignTmV0d29yayByZXNwb25zZSB3YXMgbm90IG9rJyk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgcmV0dXJuIHJlc3BvbnNlLmpzb24oKTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9KVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC50aGVuKGRhdGEgPT4ge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAvLyBPcHRpb25hbGx5LCB1cGRhdGUgdGhlIFVJIHRvIHJlZmxlY3QgdGhlIGNoYW5nZXNcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uc3QgbmV3UGFyYWdyYXBoID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgncCcpO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBuZXdQYXJhZ3JhcGguaWQgPSBgcC0ke2NvbW1lbnRJZH1gO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBuZXdQYXJhZ3JhcGgudGV4dENvbnRlbnQgPSBtb2RpZmllZE1lc3NhZ2U7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIFxuICAgICAgICAgICAgICAgICAgICAgICBcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uc3QgYnV0dG9uRWxlbWVudCA9IGNvbnRhaW5lckRpdi5xdWVyeVNlbGVjdG9yKCdidXR0b24nKTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYgKGJ1dHRvbkVsZW1lbnQpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGJ1dHRvbkVsZW1lbnQucmVtb3ZlKCk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9KVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgXG5cbiAgICAgICAgICAgICAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgICAgICBcbiAgICAgICAgICAgICAgICBcbiAgICAgICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgICAgICAvLyBSZW1vdmUgdGhlIGlucHV0IGVsZW1lbnQgYW5kIGJ1dHRvbiBlbGVtZW50LCBhbmQgc2hvdyB0aGUgb3JpZ2luYWwgcGFyYWdyYXBoIGVsZW1lbnRcbiAgICAgICAgICAgICAgICAgICAgY29udGFpbmVyRGl2LnF1ZXJ5U2VsZWN0b3IoJ2lucHV0W3R5cGU9XCJ0ZXh0XCJdJykucmVtb3ZlKCk7XG4gICAgICAgICAgICAgICAgICAgIGNvbnRhaW5lckRpdi5xdWVyeVNlbGVjdG9yKCdidXR0b24nKS5yZW1vdmUoKTtcbiAgICAgICAgICAgICAgICAgICAgY29udGFpbmVyRGl2LnF1ZXJ5U2VsZWN0b3IoJ3AnKS5zdHlsZS5kaXNwbGF5ID0gJ2Jsb2NrJztcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfSk7XG5cbiAgICAgICAgZGVsZXRlQnV0dG9ucy5mb3JFYWNoKGJ1dHRvbiA9PiB7XG4gICAgICAgICAgICBidXR0b24uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbiAoZXZlbnQpIHtcbiAgICAgICAgICAgICAgICBjb25zdCBjb21tZW50SWQgPSBidXR0b24ucGFyZW50RWxlbWVudC5wYXJlbnRFbGVtZW50LnF1ZXJ5U2VsZWN0b3IoJyNjb21tZW50SWQnKS50ZXh0Q29udGVudDtcblxuICAgICAgICAgICAgICAgIGNvbnN0IGNvbnRhaW5lckRpdiA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKGBwLSR7Y29tbWVudElkfWApO1xuICAgICAgICAgICAgICAgIGxldCBwYXJlbnRDb21tZW50YWlyZSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoYC5pZF9jYXJkQ29tbWVudGFpcmUtJHtjb21tZW50SWR9YCkucGFyZW50RWxlbWVudDtcbiAgICAgICAgICAgICAgICBcbiAgICAgICAgICAgICAgICAvLyBFbnZvaSBkZSBsYSByZXF1w6p0ZSBBSkFYXG4gICAgICAgICAgICAgICAgY29uc3QgeGhyID0gbmV3IFhNTEh0dHBSZXF1ZXN0KCk7XG4gICAgICAgICAgICAgICAgeGhyLm9wZW4oXCJHRVRcIiwgYC9kb3NzaWVycy9kZWxldGVDb21tZW50YWlyZS8ke2NvbW1lbnRJZH1gLCB0cnVlKTtcbiAgICAgICAgICAgICAgICB4aHIub25yZWFkeXN0YXRlY2hhbmdlID0gZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgICAgICBpZiAoeGhyLnJlYWR5U3RhdGUgPT09IFhNTEh0dHBSZXF1ZXN0LkRPTkUpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIGlmICh4aHIuc3RhdHVzID09PSAyMDApIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAvLyBBY3R1YWxpc2VyIGxhIHBhZ2Ugb3UgbWV0dHJlIMOgIGpvdXIgbCdpbnRlcmZhY2UgdXRpbGlzYXRldXIgc2kgbsOpY2Vzc2FpcmVcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBwYXJlbnRDb21tZW50YWlyZS5yZW1vdmUoKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uc29sZS5lcnJvcignVW5lIGVycmV1ciBzXFwnZXN0IHByb2R1aXRlIGxvcnMgZGUgbGEgc3VwcHJlc3Npb24gZHUgY29tbWVudGFpcmUnKTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAvLyBHw6lyZXIgbGVzIGVycmV1cnNcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIH07XG4gICAgICAgICAgICAgICAgeGhyLnNlbmQoKTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBhdHRhY2hFdmVudEhhbmRsZXJzKCk7XG4gICAgaWYoc2VuZENvbW1lbnRCdXR0b24pe1xuICAgICAgICBzZW5kQ29tbWVudEJ1dHRvbi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uKGUpIHtcbiAgICAgICAgICAgIC8vIEV4dHJhY3QgdGhlIGRvc3NpZXIgSUQgZnJvbSB0aGUgZm9ybSdzIGRhdGEgYXR0cmlidXRlXG4gICAgICAgICAgICBjb25zdCBmb3JtID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2Rvc3NpZXJNb2RpZmllZCcpO1xuICAgICAgICAgICAgY29uc3QgZG9zc2llcklkID0gZm9ybS5nZXRBdHRyaWJ1dGUoJ2RhdGEtZG9zc2llci1pZCcpO1xuICAgICAgICAgICAgY29uc3QgY29tbWVudElucHV0ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2Rvc3NpZXJzX2VkaXRfZG9zc2llcl9jb21tZW50YWlyZV9tZXNzYWdlJyk7XG4gICAgICAgICAgICBjb25zdCBjb21tZW50TWVzc2FnZSA9IGNvbW1lbnRJbnB1dC52YWx1ZS50cmltKCk7XG4gICAgICAgIFxuICAgICAgICAgICAgLy8gVsOpcmlmaWUgc2kgbGUgY29tbWVudGFpcmUgZXN0IHZpZGVcbiAgICAgICAgICAgIGlmIChjb21tZW50TWVzc2FnZSA9PT0gJycpIHtcbiAgICAgICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgICAgICAgICAgLy8gQWZmaWNoZSB1bmUgZXJyZXVyIHZpc3VlbGxlXG4gICAgICAgICAgICAgICAgY29tbWVudElucHV0LnN0eWxlLmJvcmRlciA9ICcycHggc29saWQgcmVkJztcbiAgICBcbiAgICAgICAgICAgICAgICBjb21tZW50SW5wdXQucGxhY2Vob2xkZXIgPSAnVmV1aWxsZXogc2Fpc2lyIHVuIGNvbW1lbnRhaXJlIChtaW5pbXVtIDEgY2FyYWN0w6hyZSknO1xuICAgICAgICAgICAgICAgIFxuICAgICAgICAgICAgICAgIC8vIEVmZmFjZSBsZSBjaGFtcCBkZSBjb21tZW50YWlyZVxuICAgICAgICAgICAgICAgIGNvbW1lbnRJbnB1dC52YWx1ZSA9ICcnO1xuICAgICAgICBcbiAgICAgICAgICAgICAgICAvLyBFbXDDqmNoZSBsJ2Vudm9pIGR1IGZvcm11bGFpcmVcbiAgICAgICAgICAgIH1lbHNle1xuICAgICAgICAgICAgICAgIC8vIEFmZmljaGUgdW5lIGVycmV1ciB2aXN1ZWxsZVxuICAgICAgICAgICAgICAgIGNvbW1lbnRJbnB1dC5zdHlsZS5ib3JkZXIgPSAnMXB4IHNvbGlkICNkZWUyZTYnO1xuICAgICAgICAgICAgICAgIGNvbW1lbnRJbnB1dC5wbGFjZWhvbGRlciA9ICdBam91dGVyIHVuIGNvbW1lbnRhaXJlJztcbiAgICBcbiAgICAgICAgICAgICAgICBmdW5jdGlvbiBjYXBpdGFsaXplKHN0cikge1xuICAgICAgICAgICAgICAgICAgICByZXR1cm4gc3RyLmNoYXJBdCgwKS50b1VwcGVyQ2FzZSgpICsgc3RyLnNsaWNlKDEpLnRvTG93ZXJDYXNlKCk7XG4gICAgICAgICAgICAgICAgfVxuICAgIFxuICAgICAgICAgICAgICAgIGNvbnN0IHhociA9IG5ldyBYTUxIdHRwUmVxdWVzdCgpO1xuICAgICAgICAgICAgICAgIHhoci5vcGVuKCdQT1NUJywgYC9kb3NzaWVycy9zdWJtaXQtY29tbWVudC8ke2Rvc3NpZXJJZH1gLCB0cnVlKTtcbiAgICAgICAgICAgICAgICB4aHIuc2V0UmVxdWVzdEhlYWRlcignQ29udGVudC1UeXBlJywgJ2FwcGxpY2F0aW9uL2pzb247Y2hhcnNldD1VVEYtOCcpO1xuICAgICAgICAgICAgICAgIHhoci5vbnJlYWR5c3RhdGVjaGFuZ2UgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgICAgIGlmICh4aHIucmVhZHlTdGF0ZSA9PT0gNCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKHhoci5zdGF0dXMgPT09IDIwMCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbnN0IHJlc3BvbnNlID0gSlNPTi5wYXJzZSh4aHIucmVzcG9uc2VUZXh0KTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpZiAocmVzcG9uc2UuY29tbWVudCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb25zdCBuZXdDb21tZW50ID0gcmVzcG9uc2UuY29tbWVudDtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uc3QgbmV3Q29tbWVudERpdiA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ2RpdicpO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBuZXdDb21tZW50RGl2LmNsYXNzTGlzdC5hZGQoJ2NhcmQnLCAnbWItNCcpO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBuZXdDb21tZW50RGl2LnN0eWxlPVwiaGVpZ2h0OiBmaXQtY29udGVudCAhaW1wb3J0YW50O1wiO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBuZXdDb21tZW50RGl2LmlubmVySFRNTCA9IGBcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9XCJjYXJkLWJvZHkgaWRfY2FyZENvbW1lbnRhaXJlLSR7bmV3Q29tbWVudC5pZH1cIj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzPVwiZC1mbGV4IGZsZXgtY29sdW1uIGp1c3RpZnktY29udGVudC1iZXR3ZWVuXCI+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9XCJkLWZsZXggZmxleC1yb3cgYWxpZ24taXRlbXMtY2VudGVyIGp1c3RpZnktY29udGVudC1iZXR3ZWVuXCI+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cCBjbGFzcz1cInRleHQtbXV0ZWQgZnMtNCBtYi0wXCI+JHtjYXBpdGFsaXplKG5ld0NvbW1lbnQudXNlck5hbWUpfSAke2NhcGl0YWxpemUobmV3Q29tbWVudC51c2VyTGFzdE5hbWUpfTwvcD5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxwIGNsYXNzPVwidGV4dC1tdXRlZCBmcy00IG1iLTBcIj4ke25ldyBEYXRlKG5ld0NvbW1lbnQuZGF0ZUNvbW1lbnRhaXJlKS50b0xvY2FsZVN0cmluZygpfTwvcD5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxwIGNsYXNzPVwiaW52aXNpYmxlXCIgaWQ9XCJjb21tZW50SWRcIj4ke25ld0NvbW1lbnQuaWR9PC9wPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZGl2PlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHAgY2xhc3M9XCJmcy01IHRleHQtYmxhY2tcIiBpZD1cInAtJHtuZXdDb21tZW50LmlkfVwiPiR7bmV3Q29tbWVudC5tZXNzYWdlfTwvcD5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cImQtZmxleCBqdXN0aWZ5LWNvbnRlbnQtZW5kXCI+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzPVwiYnRuIGJ0bi1wcmltYXJ5IGJ0bi1tZCBtb2RpZnlDb21tZW50XCI+TW9kaWZpZXI8L2J1dHRvbj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgYDtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2VkaXRDb21tZW50cycpLmFwcGVuZENoaWxkKG5ld0NvbW1lbnREaXYpO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnZG9zc2llcnNfZWRpdF9kb3NzaWVyX2NvbW1lbnRhaXJlX21lc3NhZ2UnKS52YWx1ZSA9ICcnOyAvLyBDbGVhciB0aGUgdGV4dGFyZWFcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgYXR0YWNoRXZlbnRIYW5kbGVycygpO1xuICAgICAgICBcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBhbGVydCgnRXJyb3I6ICcgKyByZXNwb25zZS5tZXNzYWdlKTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGFsZXJ0KCdFcnJvcjogJyArIHhoci5zdGF0dXNUZXh0KTtcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIH07XG4gICAgICAgICAgICAgICAgeGhyLnNlbmQoSlNPTi5zdHJpbmdpZnkoeyBtZXNzYWdlOiBjb21tZW50TWVzc2FnZSB9KSk7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICAgIFxuICAgICAgICB9KTtcbiAgICB9XG4gICAgXG4gICAgY29uc3QgcG9wb3ZlclRyaWdnZXJMaXN0ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnW2RhdGEtYnMtdG9nZ2xlPVwicG9wb3ZlclwiXScpO1xuICAgIGNvbnN0IHBvcG92ZXJMaXN0ID0gWy4uLnBvcG92ZXJUcmlnZ2VyTGlzdF0ubWFwKHBvcG92ZXJUcmlnZ2VyRWwgPT4gbmV3IGJvb3RzdHJhcC5Qb3BvdmVyKHBvcG92ZXJUcmlnZ2VyRWwpKTtcblxuXG5cbn0pO1xuXG5cblxuIl0sIm5hbWVzIjpbImRvY3VtZW50IiwiYWRkRXZlbnRMaXN0ZW5lciIsImNvdW50ZG93bkR1cmF0aW9uIiwicmVkaXJlY3RpbmciLCJ0aW1lckVsZW1lbnQiLCJnZXRFbGVtZW50QnlJZCIsInVwZGF0ZUNvdW50ZG93biIsIm1pbnV0ZXMiLCJNYXRoIiwiZmxvb3IiLCJzZWNvbmRzIiwidGV4dENvbnRlbnQiLCJjbGVhckludGVydmFsIiwidGltZXJJbnRlcnZhbCIsIndpbmRvdyIsIm9uYmVmb3JldW5sb2FkIiwibG9jYXRpb24iLCJyZXBsYWNlIiwic2V0SW50ZXJ2YWwiLCJtb2RpZnlCdXR0b25zIiwicXVlcnlTZWxlY3RvckFsbCIsImRlbGV0ZUJ1dHRvbnMiLCJzZW5kQ29tbWVudEJ1dHRvbiIsImF0dGFjaEV2ZW50SGFuZGxlcnMiLCJmb3JFYWNoIiwiYnV0dG9uIiwiZXZlbnQiLCJjb21tZW50SWQiLCJwYXJlbnRFbGVtZW50IiwicXVlcnlTZWxlY3RvciIsImNvbnRhaW5lckRpdiIsImNvbmNhdCIsInBhcmVudE5vZGUiLCJpbnB1dEVsZW1lbnQiLCJjcmVhdGVFbGVtZW50IiwidHlwZSIsInZhbHVlIiwiY2xhc3NMaXN0IiwiYWRkIiwiYnV0dG9uU2VuZE1vZGlmeUVsZW1lbnQiLCJhcHBlbmRDaGlsZCIsInN0eWxlIiwiZGlzcGxheSIsIm1vZGlmaWVkTWVzc2FnZSIsInRyaW0iLCJwcmV2ZW50RGVmYXVsdCIsImJvcmRlciIsInBsYWNlaG9sZGVyIiwicGFyYWdyYXBoRWxlbWVudCIsInJlbW92ZSIsImZldGNoIiwibWV0aG9kIiwiaGVhZGVycyIsImJvZHkiLCJKU09OIiwic3RyaW5naWZ5IiwibWVzc2FnZSIsInRoZW4iLCJyZXNwb25zZSIsIm9rIiwiRXJyb3IiLCJqc29uIiwiZGF0YSIsIm5ld1BhcmFncmFwaCIsImlkIiwiYnV0dG9uRWxlbWVudCIsInBhcmVudENvbW1lbnRhaXJlIiwieGhyIiwiWE1MSHR0cFJlcXVlc3QiLCJvcGVuIiwib25yZWFkeXN0YXRlY2hhbmdlIiwicmVhZHlTdGF0ZSIsIkRPTkUiLCJzdGF0dXMiLCJjb25zb2xlIiwiZXJyb3IiLCJzZW5kIiwiZSIsImZvcm0iLCJkb3NzaWVySWQiLCJnZXRBdHRyaWJ1dGUiLCJjb21tZW50SW5wdXQiLCJjb21tZW50TWVzc2FnZSIsImNhcGl0YWxpemUiLCJzdHIiLCJjaGFyQXQiLCJ0b1VwcGVyQ2FzZSIsInNsaWNlIiwidG9Mb3dlckNhc2UiLCJzZXRSZXF1ZXN0SGVhZGVyIiwicGFyc2UiLCJyZXNwb25zZVRleHQiLCJjb21tZW50IiwibmV3Q29tbWVudCIsIm5ld0NvbW1lbnREaXYiLCJpbm5lckhUTUwiLCJ1c2VyTmFtZSIsInVzZXJMYXN0TmFtZSIsIkRhdGUiLCJkYXRlQ29tbWVudGFpcmUiLCJ0b0xvY2FsZVN0cmluZyIsImFsZXJ0Iiwic3RhdHVzVGV4dCIsInBvcG92ZXJUcmlnZ2VyTGlzdCIsInBvcG92ZXJMaXN0IiwiX3RvQ29uc3VtYWJsZUFycmF5IiwibWFwIiwicG9wb3ZlclRyaWdnZXJFbCIsImJvb3RzdHJhcCIsIlBvcG92ZXIiXSwic291cmNlUm9vdCI6IiJ9