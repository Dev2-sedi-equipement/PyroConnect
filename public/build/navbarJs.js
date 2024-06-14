(self["webpackChunk"] = self["webpackChunk"] || []).push([["navbarJs"],{

/***/ "./assets/js/navbar.js":
/*!*****************************!*\
  !*** ./assets/js/navbar.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

__webpack_require__(/*! core-js/modules/es.array.for-each.js */ "./node_modules/core-js/modules/es.array.for-each.js");
__webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
__webpack_require__(/*! core-js/modules/web.dom-collections.for-each.js */ "./node_modules/core-js/modules/web.dom-collections.for-each.js");
document.addEventListener('DOMContentLoaded', function () {
  var noNotif = document.querySelector(".noNotif");
  var filterButtons = document.querySelectorAll('.filter-notification');
  var toasts = document.querySelectorAll(".toast");

  // Tri des notification en fonctions du type 
  // Fonction pour gérer l'affichage des notifications en fonction du type sélectionné
  function filterNotifications(type) {
    var hasVisibleNotifications = false;
    toasts.forEach(function (notification) {
      if (notification.classList.contains(type)) {
        notification.classList.remove('d-none');
        hasVisibleNotifications = true;
      } else {
        notification.classList.add('d-none');
        hasVisibleNotifications = false;
      }
    });
  }

  // Ajouter des écouteurs d'événements pour les boutons de filtrage
  filterButtons.forEach(function (button) {
    button.addEventListener('click', function (e) {
      e.preventDefault(); // Empêcher le comportement par défaut du lien

      // Récupérer le type de notification à afficher
      var type = this.getAttribute('data-type');
      if (this.classList.contains('btnToutesNotifs')) {
        // Sélectionner toutes les notifications
        var notifications = document.querySelectorAll('.toast');

        // Supprimer la classe d-none de toutes les notifications
        notifications.forEach(function (notification) {
          notification.classList.remove('d-none');
        });
      } else {
        // Filtrer les notifications
        filterNotifications(type);
      }
      // Mettre à jour l'état actif des boutons
      filterButtons.forEach(function (btn) {
        return btn.classList.remove('active');
      });
      this.classList.add('active');
    });
  });
  function checkedSort() {
    var ascButton = document.getElementById('ASC');
    var descButton = document.getElementById('DESC');
    if (ascButton) {
      // Ajouter des écouteurs d'événements pour les boutons ASC et DESC
      ascButton.addEventListener('click', function () {
        this.checked = true;
        this.classList.add('active');
        descButton.checked = false;
        descButton.classList.remove("active");
        descButton.style.border = ""; // Supprimer la bordure
      });
    }
    if (descButton) {
      descButton.addEventListener('click', function () {
        this.checked = true;
        this.classList.add('active');
        ascButton.checked = false;
        ascButton.classList.remove("active");
        ascButton.style.border = ""; // Supprimer la bordure
      });
    }
  }

  // Appelez la fonction
  checkedSort();
});

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_core-js_internals_define-built-in_js","vendors-node_modules_core-js_internals_classof_js-node_modules_core-js_internals_export_js","vendors-node_modules_core-js_modules_es_array_for-each_js-node_modules_core-js_modules_es_obj-7bb33f"], () => (__webpack_exec__("./assets/js/navbar.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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QUFVLENBQUN4QixnQkFBZ0IsQ0FBQyxPQUFPLEVBQUUsWUFBVztRQUM1QyxJQUFJLENBQUN5QixPQUFPLEdBQUcsSUFBSTtRQUNuQixJQUFJLENBQUNkLFNBQVMsQ0FBQ0csR0FBRyxDQUFDLFFBQVEsQ0FBQztRQUU1QlEsU0FBUyxDQUFDRyxPQUFPLEdBQUcsS0FBSztRQUN6QkgsU0FBUyxDQUFDWCxTQUFTLENBQUNFLE1BQU0sQ0FBQyxRQUFRLENBQUM7UUFDcENTLFNBQVMsQ0FBQ0ksS0FBSyxDQUFDQyxNQUFNLEdBQUcsRUFBRSxDQUFDLENBQUM7TUFHakMsQ0FBQyxDQUFDO0lBQ047RUFDSjs7RUFFQTtFQUNBTixXQUFXLENBQUMsQ0FBQztBQUdqQixDQUFDLENBQUMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvbmF2YmFyLmpzIl0sInNvdXJjZXNDb250ZW50IjpbImRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ0RPTUNvbnRlbnRMb2FkZWQnLCBmdW5jdGlvbigpIHtcbiAgICBjb25zdCBub05vdGlmID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIi5ub05vdGlmXCIpO1xuICAgIGNvbnN0IGZpbHRlckJ1dHRvbnMgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcuZmlsdGVyLW5vdGlmaWNhdGlvbicpO1xuICAgIGNvbnN0IHRvYXN0cyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXCIudG9hc3RcIik7XG5cbiAgICAvLyBUcmkgZGVzIG5vdGlmaWNhdGlvbiBlbiBmb25jdGlvbnMgZHUgdHlwZSBcbiAgICAvLyBGb25jdGlvbiBwb3VyIGfDqXJlciBsJ2FmZmljaGFnZSBkZXMgbm90aWZpY2F0aW9ucyBlbiBmb25jdGlvbiBkdSB0eXBlIHPDqWxlY3Rpb25uw6lcbiAgICBmdW5jdGlvbiBmaWx0ZXJOb3RpZmljYXRpb25zKHR5cGUpIHtcbiAgICAgICAgbGV0IGhhc1Zpc2libGVOb3RpZmljYXRpb25zID0gZmFsc2U7XG5cbiAgICAgICAgdG9hc3RzLmZvckVhY2gobm90aWZpY2F0aW9uID0+IHtcbiAgICAgICAgICAgIGlmIChub3RpZmljYXRpb24uY2xhc3NMaXN0LmNvbnRhaW5zKHR5cGUpKSB7XG4gICAgICAgICAgICAgICAgbm90aWZpY2F0aW9uLmNsYXNzTGlzdC5yZW1vdmUoJ2Qtbm9uZScpO1xuICAgICAgICAgICAgICAgIGhhc1Zpc2libGVOb3RpZmljYXRpb25zID0gdHJ1ZTtcbiAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgbm90aWZpY2F0aW9uLmNsYXNzTGlzdC5hZGQoJ2Qtbm9uZScpO1xuICAgICAgICAgICAgICAgIGhhc1Zpc2libGVOb3RpZmljYXRpb25zID0gZmFsc2U7XG5cbiAgICAgICAgICAgIH1cbiAgICAgICAgfSk7XG5cbiAgICAgIFxuICAgIH1cblxuICAgIC8vIEFqb3V0ZXIgZGVzIMOpY291dGV1cnMgZCfDqXbDqW5lbWVudHMgcG91ciBsZXMgYm91dG9ucyBkZSBmaWx0cmFnZVxuICAgIGZpbHRlckJ1dHRvbnMuZm9yRWFjaChidXR0b24gPT4ge1xuICAgICAgICBidXR0b24uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbihlKSB7XG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7IC8vIEVtcMOqY2hlciBsZSBjb21wb3J0ZW1lbnQgcGFyIGTDqWZhdXQgZHUgbGllblxuXG4gICAgICAgICAgICAvLyBSw6ljdXDDqXJlciBsZSB0eXBlIGRlIG5vdGlmaWNhdGlvbiDDoCBhZmZpY2hlclxuICAgICAgICAgICAgY29uc3QgdHlwZSA9IHRoaXMuZ2V0QXR0cmlidXRlKCdkYXRhLXR5cGUnKTtcbiAgICAgICAgICAgIGlmICh0aGlzLmNsYXNzTGlzdC5jb250YWlucygnYnRuVG91dGVzTm90aWZzJykpIHtcbiAgICAgICAgICAgICAgICAvLyBTw6lsZWN0aW9ubmVyIHRvdXRlcyBsZXMgbm90aWZpY2F0aW9uc1xuICAgICAgICAgICAgICAgIGNvbnN0IG5vdGlmaWNhdGlvbnMgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcudG9hc3QnKTtcbiAgICBcbiAgICAgICAgICAgICAgICAvLyBTdXBwcmltZXIgbGEgY2xhc3NlIGQtbm9uZSBkZSB0b3V0ZXMgbGVzIG5vdGlmaWNhdGlvbnNcbiAgICAgICAgICAgICAgICBub3RpZmljYXRpb25zLmZvckVhY2gobm90aWZpY2F0aW9uID0+IHtcbiAgICAgICAgICAgICAgICAgICAgbm90aWZpY2F0aW9uLmNsYXNzTGlzdC5yZW1vdmUoJ2Qtbm9uZScpO1xuICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAvLyBGaWx0cmVyIGxlcyBub3RpZmljYXRpb25zXG4gICAgICAgICAgICAgICAgZmlsdGVyTm90aWZpY2F0aW9ucyh0eXBlKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIC8vIE1ldHRyZSDDoCBqb3VyIGwnw6l0YXQgYWN0aWYgZGVzIGJvdXRvbnNcbiAgICAgICAgICAgIGZpbHRlckJ1dHRvbnMuZm9yRWFjaChidG4gPT4gYnRuLmNsYXNzTGlzdC5yZW1vdmUoJ2FjdGl2ZScpKTtcbiAgICAgICAgICAgIHRoaXMuY2xhc3NMaXN0LmFkZCgnYWN0aXZlJyk7XG4gICAgICAgIH0pO1xuICAgIH0pO1xuICAgIFxuXG5cbiAgICBmdW5jdGlvbiBjaGVja2VkU29ydCgpIHtcbiAgICAgICAgY29uc3QgYXNjQnV0dG9uID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ0FTQycpO1xuICAgICAgICBjb25zdCBkZXNjQnV0dG9uID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ0RFU0MnKTtcbiAgICAgICAgaWYoYXNjQnV0dG9uKXtcbiAgICAgICAgICAgIC8vIEFqb3V0ZXIgZGVzIMOpY291dGV1cnMgZCfDqXbDqW5lbWVudHMgcG91ciBsZXMgYm91dG9ucyBBU0MgZXQgREVTQ1xuICAgICAgICAgICAgYXNjQnV0dG9uLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICAgICAgdGhpcy5jaGVja2VkID0gdHJ1ZTtcbiAgICAgICAgICAgICAgICB0aGlzLmNsYXNzTGlzdC5hZGQoJ2FjdGl2ZScpO1xuICAgICAgICAgICAgICAgIFxuICAgICAgICAgICAgICAgIGRlc2NCdXR0b24uY2hlY2tlZCA9IGZhbHNlO1xuICAgICAgICAgICAgICAgIGRlc2NCdXR0b24uY2xhc3NMaXN0LnJlbW92ZShcImFjdGl2ZVwiKTsgXG4gICAgICAgICAgICAgICAgZGVzY0J1dHRvbi5zdHlsZS5ib3JkZXIgPSBcIlwiOyAvLyBTdXBwcmltZXIgbGEgYm9yZHVyZVxuICAgICAgICAgICAgICAgIFxuICAgICAgICAgICAgfSk7XG4gICAgICAgIH1cbiAgICAgICAgaWYoZGVzY0J1dHRvbil7XG5cbiAgICAgICAgICAgIGRlc2NCdXR0b24uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICAgICB0aGlzLmNoZWNrZWQgPSB0cnVlO1xuICAgICAgICAgICAgICAgIHRoaXMuY2xhc3NMaXN0LmFkZCgnYWN0aXZlJyk7XG4gICAgICAgICAgICBcbiAgICAgICAgICAgICAgICBhc2NCdXR0b24uY2hlY2tlZCA9IGZhbHNlO1xuICAgICAgICAgICAgICAgIGFzY0J1dHRvbi5jbGFzc0xpc3QucmVtb3ZlKFwiYWN0aXZlXCIpOyBcbiAgICAgICAgICAgICAgICBhc2NCdXR0b24uc3R5bGUuYm9yZGVyID0gXCJcIjsgLy8gU3VwcHJpbWVyIGxhIGJvcmR1cmVcbiAgICAgICAgICAgIFxuICAgICAgICAgICAgXG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfVxuICAgIH1cblxuICAgIC8vIEFwcGVsZXogbGEgZm9uY3Rpb25cbiAgICBjaGVja2VkU29ydCgpO1xuICAgIFxuICAgIFxufSk7XG4iXSwibmFtZXMiOlsiZG9jdW1lbnQiLCJhZGRFdmVudExpc3RlbmVyIiwibm9Ob3RpZiIsInF1ZXJ5U2VsZWN0b3IiLCJmaWx0ZXJCdXR0b25zIiwicXVlcnlTZWxlY3RvckFsbCIsInRvYXN0cyIsImZpbHRlck5vdGlmaWNhdGlvbnMiLCJ0eXBlIiwiaGFzVmlzaWJsZU5vdGlmaWNhdGlvbnMiLCJmb3JFYWNoIiwibm90aWZpY2F0aW9uIiwiY2xhc3NMaXN0IiwiY29udGFpbnMiLCJyZW1vdmUiLCJhZGQiLCJidXR0b24iLCJlIiwicHJldmVudERlZmF1bHQiLCJnZXRBdHRyaWJ1dGUiLCJub3RpZmljYXRpb25zIiwiYnRuIiwiY2hlY2tlZFNvcnQiLCJhc2NCdXR0b24iLCJnZXRFbGVtZW50QnlJZCIsImRlc2NCdXR0b24iLCJjaGVja2VkIiwic3R5bGUiLCJib3JkZXIiXSwic291cmNlUm9vdCI6IiJ9