"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["adminUser"],{

/***/ "./assets/js/user.js":
/*!***************************!*\
  !*** ./assets/js/user.js ***!
  \***************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _styles_pages_admin_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../styles/pages/admin.scss */ "./assets/styles/pages/admin.scss");

document.addEventListener('DOMContentLoaded', function () {
  var modalDialog = document.querySelector('.modal-dialog');
  modalDialog.classList.add("modal-dialog-centered");
  var tsControl = document.querySelector('.ts-control');
  if (tsControl !== null) {
    // Fonction pour vérifier la sélection des rôles
    var checkSelection = function checkSelection() {
      var vrpSelected = tsControl.querySelector('div[data-value="VRP"]');
      var sfSelected = tsControl.querySelector('div[data-value="SF"]');
      // Sélectionne la div enfant de #flash-messages avec la classe .alert
      var addFlash = document.querySelector("#flash-messages > .alert");

      // Vérifie si l'élément a été trouvé avant de manipuler ses classes et son texte
      if (addFlash) {
        addFlash.classList.remove("alert-success");
        addFlash.classList.add("alert-danger");
        addFlash.innerText = "Une erreur est apparue lors de la soumission du formulaire";
      }

      // Vérification de la sélection des rôles SF et VRP ou VRP et SF
      if (sfSelected && vrpSelected || vrpSelected && sfSelected) {
        // Les deux rôles sont sélectionnés, donc afficher un message d'erreur et empêcher la soumission du formulaire
        role.classList.add('errorRole');
        var errorMessage = "Vous ne pouvez pas sélectionner SF et VRP pour un utilisateur.";
        tsControl.style.cssText += 'color:red;border: 1px solid red !important; box-shadow: 0 0 0 3 red !important;';
        errorMessageContainer.innerText = errorMessage;
        errorMessageContainer.classList.add('pulse', 'circle', 'mt-2', 'errorRole');
      } else {
        // Réinitialisation du style et du comportement du bouton de soumission
        tsControl.style.cssText = ''; // Réinitialisation du style
        errorMessageContainer.innerText = ''; // Réinitialisation du message d'erreur
        role.classList.remove('errorRole'); // Suppression de la classe d'erreur
      }
    }; // Exécuter la fonction checkSelection chaque fois que le contenu de tsControl est modifié
    var formFieldsetBody = document.querySelector(".field-select");
    var role = tsControl;

    // Création de l'élément pour le message d'erreur
    var errorMessageContainer = document.createElement("div");
    errorMessageContainer.id = "error-message-container";
    errorMessageContainer.style.color = "red";
    tsControl.addEventListener('change', checkSelection);

    // Appeler la fonction checkSelection une première fois pour vérifier l'état initial
    checkSelection();

    // Ajouter le conteneur du message d'erreur au document
    formFieldsetBody.appendChild(errorMessageContainer);
  }
});

/***/ }),

/***/ "./assets/styles/pages/admin.scss":
/*!****************************************!*\
  !*** ./assets/styles/pages/admin.scss ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ var __webpack_exports__ = (__webpack_exec__("./assets/js/user.js"));
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiYWRtaW5Vc2VyLmpzIiwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7O0FBQ29DO0FBQ3BDQSxRQUFRLENBQUNDLGdCQUFnQixDQUFDLGtCQUFrQixFQUFFLFlBQVk7RUFFdEQsSUFBTUMsV0FBVyxHQUFHRixRQUFRLENBQUNHLGFBQWEsQ0FBQyxlQUFlLENBQUM7RUFDM0RELFdBQVcsQ0FBQ0UsU0FBUyxDQUFDQyxHQUFHLENBQUMsdUJBQXVCLENBQUM7RUFFbkQsSUFBTUMsU0FBUyxHQUFHTixRQUFRLENBQUNHLGFBQWEsQ0FBQyxhQUFhLENBQUM7RUFDdkQsSUFBSUcsU0FBUyxLQUFLLElBQUksRUFBRTtJQVVuQjtJQUFBLElBQ1NDLGNBQWMsR0FBdkIsU0FBU0EsY0FBY0EsQ0FBQSxFQUFHO01BQ3RCLElBQU1DLFdBQVcsR0FBR0YsU0FBUyxDQUFDSCxhQUFhLENBQUMsdUJBQXVCLENBQUM7TUFDcEUsSUFBTU0sVUFBVSxHQUFHSCxTQUFTLENBQUNILGFBQWEsQ0FBQyxzQkFBc0IsQ0FBQztNQUN0RTtNQUNSLElBQU1PLFFBQVEsR0FBR1YsUUFBUSxDQUFDRyxhQUFhLENBQUMsMEJBQTBCLENBQUM7O01BRW5FO01BQ0EsSUFBSU8sUUFBUSxFQUFFO1FBQ1ZBLFFBQVEsQ0FBQ04sU0FBUyxDQUFDTyxNQUFNLENBQUMsZUFBZSxDQUFDO1FBQzFDRCxRQUFRLENBQUNOLFNBQVMsQ0FBQ0MsR0FBRyxDQUFDLGNBQWMsQ0FBQztRQUN0Q0ssUUFBUSxDQUFDRSxTQUFTLEdBQUcsNERBQTREO01BQ3JGOztNQUlZO01BQ0EsSUFBSUgsVUFBVSxJQUFJRCxXQUFXLElBQUlBLFdBQVcsSUFBSUMsVUFBVSxFQUFFO1FBQ3hEO1FBQ0FJLElBQUksQ0FBQ1QsU0FBUyxDQUFDQyxHQUFHLENBQUMsV0FBVyxDQUFDO1FBQy9CLElBQU1TLFlBQVksR0FBRyxnRUFBZ0U7UUFDckZSLFNBQVMsQ0FBQ1MsS0FBSyxDQUFDQyxPQUFPLElBQUksaUZBQWlGO1FBQzVHQyxxQkFBcUIsQ0FBQ0wsU0FBUyxHQUFHRSxZQUFZO1FBQzlDRyxxQkFBcUIsQ0FBQ2IsU0FBUyxDQUFDQyxHQUFHLENBQUMsT0FBTyxFQUFFLFFBQVEsRUFBRSxNQUFNLEVBQUUsV0FBVyxDQUFDO01BRy9FLENBQUMsTUFBTTtRQUNIO1FBQ0FDLFNBQVMsQ0FBQ1MsS0FBSyxDQUFDQyxPQUFPLEdBQUcsRUFBRSxDQUFDLENBQUM7UUFDOUJDLHFCQUFxQixDQUFDTCxTQUFTLEdBQUcsRUFBRSxDQUFDLENBQUM7UUFDdENDLElBQUksQ0FBQ1QsU0FBUyxDQUFDTyxNQUFNLENBQUMsV0FBVyxDQUFDLENBQUMsQ0FBQztNQUN4QztJQUNKLENBQUMsRUFFRDtJQTFDQSxJQUFNTyxnQkFBZ0IsR0FBR2xCLFFBQVEsQ0FBQ0csYUFBYSxDQUFDLGVBQWUsQ0FBQztJQUNoRSxJQUFNVSxJQUFJLEdBQUdQLFNBQVM7O0lBRXRCO0lBQ0EsSUFBTVcscUJBQXFCLEdBQUdqQixRQUFRLENBQUNtQixhQUFhLENBQUMsS0FBSyxDQUFDO0lBQzNERixxQkFBcUIsQ0FBQ0csRUFBRSxHQUFHLHlCQUF5QjtJQUNwREgscUJBQXFCLENBQUNGLEtBQUssQ0FBQ00sS0FBSyxHQUFHLEtBQUs7SUFxQ3pDZixTQUFTLENBQUNMLGdCQUFnQixDQUFDLFFBQVEsRUFBRU0sY0FBYyxDQUFDOztJQUVwRDtJQUNBQSxjQUFjLENBQUMsQ0FBQzs7SUFFaEI7SUFDQVcsZ0JBQWdCLENBQUNJLFdBQVcsQ0FBQ0wscUJBQXFCLENBQUM7RUFFeEQ7QUFDSCxDQUFDLENBQUM7Ozs7Ozs7Ozs7O0FDOURGIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL3VzZXIuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL3N0eWxlcy9wYWdlcy9hZG1pbi5zY3NzPzdjNmYiXSwic291cmNlc0NvbnRlbnQiOlsiXG5pbXBvcnQgJy4uL3N0eWxlcy9wYWdlcy9hZG1pbi5zY3NzJztcbmRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ0RPTUNvbnRlbnRMb2FkZWQnLCBmdW5jdGlvbiAoKSB7XG5cbiAgICBjb25zdCBtb2RhbERpYWxvZyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5tb2RhbC1kaWFsb2cnKTtcbiAgICBtb2RhbERpYWxvZy5jbGFzc0xpc3QuYWRkKFwibW9kYWwtZGlhbG9nLWNlbnRlcmVkXCIpO1xuXG4gICBjb25zdCB0c0NvbnRyb2wgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcudHMtY29udHJvbCcpO1xuICAgaWYgKHRzQ29udHJvbCAhPT0gbnVsbCkgeyBcblxuICAgICAgICBjb25zdCBmb3JtRmllbGRzZXRCb2R5ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIi5maWVsZC1zZWxlY3RcIik7XG4gICAgICAgIGNvbnN0IHJvbGUgPSB0c0NvbnRyb2w7XG4gICAgICAgIFxuICAgICAgICAvLyBDcsOpYXRpb24gZGUgbCfDqWzDqW1lbnQgcG91ciBsZSBtZXNzYWdlIGQnZXJyZXVyXG4gICAgICAgIGNvbnN0IGVycm9yTWVzc2FnZUNvbnRhaW5lciA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoXCJkaXZcIik7XG4gICAgICAgIGVycm9yTWVzc2FnZUNvbnRhaW5lci5pZCA9IFwiZXJyb3ItbWVzc2FnZS1jb250YWluZXJcIjtcbiAgICAgICAgZXJyb3JNZXNzYWdlQ29udGFpbmVyLnN0eWxlLmNvbG9yID0gXCJyZWRcIjtcbiAgICAgICAgXG4gICAgICAgIC8vIEZvbmN0aW9uIHBvdXIgdsOpcmlmaWVyIGxhIHPDqWxlY3Rpb24gZGVzIHLDtGxlc1xuICAgICAgICBmdW5jdGlvbiBjaGVja1NlbGVjdGlvbigpIHtcbiAgICAgICAgICAgIGNvbnN0IHZycFNlbGVjdGVkID0gdHNDb250cm9sLnF1ZXJ5U2VsZWN0b3IoJ2RpdltkYXRhLXZhbHVlPVwiVlJQXCJdJyk7XG4gICAgICAgICAgICBjb25zdCBzZlNlbGVjdGVkID0gdHNDb250cm9sLnF1ZXJ5U2VsZWN0b3IoJ2RpdltkYXRhLXZhbHVlPVwiU0ZcIl0nKTtcbiAgICAgICAgLy8gU8OpbGVjdGlvbm5lIGxhIGRpdiBlbmZhbnQgZGUgI2ZsYXNoLW1lc3NhZ2VzIGF2ZWMgbGEgY2xhc3NlIC5hbGVydFxuY29uc3QgYWRkRmxhc2ggPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiI2ZsYXNoLW1lc3NhZ2VzID4gLmFsZXJ0XCIpO1xuXG4vLyBWw6lyaWZpZSBzaSBsJ8OpbMOpbWVudCBhIMOpdMOpIHRyb3V2w6kgYXZhbnQgZGUgbWFuaXB1bGVyIHNlcyBjbGFzc2VzIGV0IHNvbiB0ZXh0ZVxuaWYgKGFkZEZsYXNoKSB7XG4gICAgYWRkRmxhc2guY2xhc3NMaXN0LnJlbW92ZShcImFsZXJ0LXN1Y2Nlc3NcIik7XG4gICAgYWRkRmxhc2guY2xhc3NMaXN0LmFkZChcImFsZXJ0LWRhbmdlclwiKTtcbiAgICBhZGRGbGFzaC5pbm5lclRleHQgPSBcIlVuZSBlcnJldXIgZXN0IGFwcGFydWUgbG9ycyBkZSBsYSBzb3VtaXNzaW9uIGR1IGZvcm11bGFpcmVcIjtcbn1cblxuXG4gICAgICAgICAgICBcbiAgICAgICAgICAgIC8vIFbDqXJpZmljYXRpb24gZGUgbGEgc8OpbGVjdGlvbiBkZXMgcsO0bGVzIFNGIGV0IFZSUCBvdSBWUlAgZXQgU0ZcbiAgICAgICAgICAgIGlmIChzZlNlbGVjdGVkICYmIHZycFNlbGVjdGVkIHx8IHZycFNlbGVjdGVkICYmIHNmU2VsZWN0ZWQpIHtcbiAgICAgICAgICAgICAgICAvLyBMZXMgZGV1eCByw7RsZXMgc29udCBzw6lsZWN0aW9ubsOpcywgZG9uYyBhZmZpY2hlciB1biBtZXNzYWdlIGQnZXJyZXVyIGV0IGVtcMOqY2hlciBsYSBzb3VtaXNzaW9uIGR1IGZvcm11bGFpcmVcbiAgICAgICAgICAgICAgICByb2xlLmNsYXNzTGlzdC5hZGQoJ2Vycm9yUm9sZScpOyBcbiAgICAgICAgICAgICAgICBjb25zdCBlcnJvck1lc3NhZ2UgPSBcIlZvdXMgbmUgcG91dmV6IHBhcyBzw6lsZWN0aW9ubmVyIFNGIGV0IFZSUCBwb3VyIHVuIHV0aWxpc2F0ZXVyLlwiO1xuICAgICAgICAgICAgICAgIHRzQ29udHJvbC5zdHlsZS5jc3NUZXh0ICs9ICdjb2xvcjpyZWQ7Ym9yZGVyOiAxcHggc29saWQgcmVkICFpbXBvcnRhbnQ7IGJveC1zaGFkb3c6IDAgMCAwIDMgcmVkICFpbXBvcnRhbnQ7JztcbiAgICAgICAgICAgICAgICBlcnJvck1lc3NhZ2VDb250YWluZXIuaW5uZXJUZXh0ID0gZXJyb3JNZXNzYWdlO1xuICAgICAgICAgICAgICAgIGVycm9yTWVzc2FnZUNvbnRhaW5lci5jbGFzc0xpc3QuYWRkKCdwdWxzZScsICdjaXJjbGUnLCAnbXQtMicsICdlcnJvclJvbGUnKTtcblxuXG4gICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgIC8vIFLDqWluaXRpYWxpc2F0aW9uIGR1IHN0eWxlIGV0IGR1IGNvbXBvcnRlbWVudCBkdSBib3V0b24gZGUgc291bWlzc2lvblxuICAgICAgICAgICAgICAgIHRzQ29udHJvbC5zdHlsZS5jc3NUZXh0ID0gJyc7IC8vIFLDqWluaXRpYWxpc2F0aW9uIGR1IHN0eWxlXG4gICAgICAgICAgICAgICAgZXJyb3JNZXNzYWdlQ29udGFpbmVyLmlubmVyVGV4dCA9ICcnOyAvLyBSw6lpbml0aWFsaXNhdGlvbiBkdSBtZXNzYWdlIGQnZXJyZXVyXG4gICAgICAgICAgICAgICAgcm9sZS5jbGFzc0xpc3QucmVtb3ZlKCdlcnJvclJvbGUnKTsgLy8gU3VwcHJlc3Npb24gZGUgbGEgY2xhc3NlIGQnZXJyZXVyXG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICAgICAgXG4gICAgICAgIC8vIEV4w6ljdXRlciBsYSBmb25jdGlvbiBjaGVja1NlbGVjdGlvbiBjaGFxdWUgZm9pcyBxdWUgbGUgY29udGVudSBkZSB0c0NvbnRyb2wgZXN0IG1vZGlmacOpXG4gICAgICAgIHRzQ29udHJvbC5hZGRFdmVudExpc3RlbmVyKCdjaGFuZ2UnLCBjaGVja1NlbGVjdGlvbik7XG4gICAgICAgIFxuICAgICAgICAvLyBBcHBlbGVyIGxhIGZvbmN0aW9uIGNoZWNrU2VsZWN0aW9uIHVuZSBwcmVtacOocmUgZm9pcyBwb3VyIHbDqXJpZmllciBsJ8OpdGF0IGluaXRpYWxcbiAgICAgICAgY2hlY2tTZWxlY3Rpb24oKTtcbiAgICAgICAgXG4gICAgICAgIC8vIEFqb3V0ZXIgbGUgY29udGVuZXVyIGR1IG1lc3NhZ2UgZCdlcnJldXIgYXUgZG9jdW1lbnRcbiAgICAgICAgZm9ybUZpZWxkc2V0Qm9keS5hcHBlbmRDaGlsZChlcnJvck1lc3NhZ2VDb250YWluZXIpO1xuICAgICAgICBcbiAgIH1cbn0pXG4iLCIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW5cbmV4cG9ydCB7fTsiXSwibmFtZXMiOlsiZG9jdW1lbnQiLCJhZGRFdmVudExpc3RlbmVyIiwibW9kYWxEaWFsb2ciLCJxdWVyeVNlbGVjdG9yIiwiY2xhc3NMaXN0IiwiYWRkIiwidHNDb250cm9sIiwiY2hlY2tTZWxlY3Rpb24iLCJ2cnBTZWxlY3RlZCIsInNmU2VsZWN0ZWQiLCJhZGRGbGFzaCIsInJlbW92ZSIsImlubmVyVGV4dCIsInJvbGUiLCJlcnJvck1lc3NhZ2UiLCJzdHlsZSIsImNzc1RleHQiLCJlcnJvck1lc3NhZ2VDb250YWluZXIiLCJmb3JtRmllbGRzZXRCb2R5IiwiY3JlYXRlRWxlbWVudCIsImlkIiwiY29sb3IiLCJhcHBlbmRDaGlsZCJdLCJzb3VyY2VSb290IjoiIn0=