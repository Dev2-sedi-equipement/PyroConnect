(self["webpackChunk"] = self["webpackChunk"] || []).push([["navbar"],{

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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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VSxDQUFDeEIsZ0JBQWdCLENBQUMsT0FBTyxFQUFFLFlBQVc7UUFDNUMsSUFBSSxDQUFDeUIsT0FBTyxHQUFHLElBQUk7UUFDbkIsSUFBSSxDQUFDZCxTQUFTLENBQUNHLEdBQUcsQ0FBQyxRQUFRLENBQUM7UUFFNUJRLFNBQVMsQ0FBQ0csT0FBTyxHQUFHLEtBQUs7UUFDekJILFNBQVMsQ0FBQ1gsU0FBUyxDQUFDRSxNQUFNLENBQUMsUUFBUSxDQUFDO1FBQ3BDUyxTQUFTLENBQUNJLEtBQUssQ0FBQ0MsTUFBTSxHQUFHLEVBQUUsQ0FBQyxDQUFDO01BR2pDLENBQUMsQ0FBQztJQUNOO0VBQ0o7O0VBRUE7RUFDQU4sV0FBVyxDQUFDLENBQUM7QUFHakIsQ0FBQyxDQUFDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL25hdmJhci5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyJkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKCdET01Db250ZW50TG9hZGVkJywgZnVuY3Rpb24oKSB7XG4gICAgY29uc3Qgbm9Ob3RpZiA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIubm9Ob3RpZlwiKTtcbiAgICBjb25zdCBmaWx0ZXJCdXR0b25zID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnLmZpbHRlci1ub3RpZmljYXRpb24nKTtcbiAgICBjb25zdCB0b2FzdHMgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKFwiLnRvYXN0XCIpO1xuXG4gICAgLy8gVHJpIGRlcyBub3RpZmljYXRpb24gZW4gZm9uY3Rpb25zIGR1IHR5cGUgXG4gICAgLy8gRm9uY3Rpb24gcG91ciBnw6lyZXIgbCdhZmZpY2hhZ2UgZGVzIG5vdGlmaWNhdGlvbnMgZW4gZm9uY3Rpb24gZHUgdHlwZSBzw6lsZWN0aW9ubsOpXG4gICAgZnVuY3Rpb24gZmlsdGVyTm90aWZpY2F0aW9ucyh0eXBlKSB7XG4gICAgICAgIGxldCBoYXNWaXNpYmxlTm90aWZpY2F0aW9ucyA9IGZhbHNlO1xuXG4gICAgICAgIHRvYXN0cy5mb3JFYWNoKG5vdGlmaWNhdGlvbiA9PiB7XG4gICAgICAgICAgICBpZiAobm90aWZpY2F0aW9uLmNsYXNzTGlzdC5jb250YWlucyh0eXBlKSkge1xuICAgICAgICAgICAgICAgIG5vdGlmaWNhdGlvbi5jbGFzc0xpc3QucmVtb3ZlKCdkLW5vbmUnKTtcbiAgICAgICAgICAgICAgICBoYXNWaXNpYmxlTm90aWZpY2F0aW9ucyA9IHRydWU7XG4gICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgIG5vdGlmaWNhdGlvbi5jbGFzc0xpc3QuYWRkKCdkLW5vbmUnKTtcbiAgICAgICAgICAgICAgICBoYXNWaXNpYmxlTm90aWZpY2F0aW9ucyA9IGZhbHNlO1xuXG4gICAgICAgICAgICB9XG4gICAgICAgIH0pO1xuXG4gICAgICBcbiAgICB9XG5cbiAgICAvLyBBam91dGVyIGRlcyDDqWNvdXRldXJzIGQnw6l2w6luZW1lbnRzIHBvdXIgbGVzIGJvdXRvbnMgZGUgZmlsdHJhZ2VcbiAgICBmaWx0ZXJCdXR0b25zLmZvckVhY2goYnV0dG9uID0+IHtcbiAgICAgICAgYnV0dG9uLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24oZSkge1xuICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpOyAvLyBFbXDDqmNoZXIgbGUgY29tcG9ydGVtZW50IHBhciBkw6lmYXV0IGR1IGxpZW5cblxuICAgICAgICAgICAgLy8gUsOpY3Vww6lyZXIgbGUgdHlwZSBkZSBub3RpZmljYXRpb24gw6AgYWZmaWNoZXJcbiAgICAgICAgICAgIGNvbnN0IHR5cGUgPSB0aGlzLmdldEF0dHJpYnV0ZSgnZGF0YS10eXBlJyk7XG4gICAgICAgICAgICBpZiAodGhpcy5jbGFzc0xpc3QuY29udGFpbnMoJ2J0blRvdXRlc05vdGlmcycpKSB7XG4gICAgICAgICAgICAgICAgLy8gU8OpbGVjdGlvbm5lciB0b3V0ZXMgbGVzIG5vdGlmaWNhdGlvbnNcbiAgICAgICAgICAgICAgICBjb25zdCBub3RpZmljYXRpb25zID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnLnRvYXN0Jyk7XG4gICAgXG4gICAgICAgICAgICAgICAgLy8gU3VwcHJpbWVyIGxhIGNsYXNzZSBkLW5vbmUgZGUgdG91dGVzIGxlcyBub3RpZmljYXRpb25zXG4gICAgICAgICAgICAgICAgbm90aWZpY2F0aW9ucy5mb3JFYWNoKG5vdGlmaWNhdGlvbiA9PiB7XG4gICAgICAgICAgICAgICAgICAgIG5vdGlmaWNhdGlvbi5jbGFzc0xpc3QucmVtb3ZlKCdkLW5vbmUnKTtcbiAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgLy8gRmlsdHJlciBsZXMgbm90aWZpY2F0aW9uc1xuICAgICAgICAgICAgICAgIGZpbHRlck5vdGlmaWNhdGlvbnModHlwZSk7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICAvLyBNZXR0cmUgw6Agam91ciBsJ8OpdGF0IGFjdGlmIGRlcyBib3V0b25zXG4gICAgICAgICAgICBmaWx0ZXJCdXR0b25zLmZvckVhY2goYnRuID0+IGJ0bi5jbGFzc0xpc3QucmVtb3ZlKCdhY3RpdmUnKSk7XG4gICAgICAgICAgICB0aGlzLmNsYXNzTGlzdC5hZGQoJ2FjdGl2ZScpO1xuICAgICAgICB9KTtcbiAgICB9KTtcbiAgICBcblxuXG4gICAgZnVuY3Rpb24gY2hlY2tlZFNvcnQoKSB7XG4gICAgICAgIGNvbnN0IGFzY0J1dHRvbiA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdBU0MnKTtcbiAgICAgICAgY29uc3QgZGVzY0J1dHRvbiA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdERVNDJyk7XG4gICAgICAgIGlmKGFzY0J1dHRvbil7XG4gICAgICAgICAgICAvLyBBam91dGVyIGRlcyDDqWNvdXRldXJzIGQnw6l2w6luZW1lbnRzIHBvdXIgbGVzIGJvdXRvbnMgQVNDIGV0IERFU0NcbiAgICAgICAgICAgIGFzY0J1dHRvbi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgICAgIHRoaXMuY2hlY2tlZCA9IHRydWU7XG4gICAgICAgICAgICAgICAgdGhpcy5jbGFzc0xpc3QuYWRkKCdhY3RpdmUnKTtcbiAgICAgICAgICAgICAgICBcbiAgICAgICAgICAgICAgICBkZXNjQnV0dG9uLmNoZWNrZWQgPSBmYWxzZTtcbiAgICAgICAgICAgICAgICBkZXNjQnV0dG9uLmNsYXNzTGlzdC5yZW1vdmUoXCJhY3RpdmVcIik7IFxuICAgICAgICAgICAgICAgIGRlc2NCdXR0b24uc3R5bGUuYm9yZGVyID0gXCJcIjsgLy8gU3VwcHJpbWVyIGxhIGJvcmR1cmVcbiAgICAgICAgICAgICAgICBcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9XG4gICAgICAgIGlmKGRlc2NCdXR0b24pe1xuXG4gICAgICAgICAgICBkZXNjQnV0dG9uLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICAgICAgdGhpcy5jaGVja2VkID0gdHJ1ZTtcbiAgICAgICAgICAgICAgICB0aGlzLmNsYXNzTGlzdC5hZGQoJ2FjdGl2ZScpO1xuICAgICAgICAgICAgXG4gICAgICAgICAgICAgICAgYXNjQnV0dG9uLmNoZWNrZWQgPSBmYWxzZTtcbiAgICAgICAgICAgICAgICBhc2NCdXR0b24uY2xhc3NMaXN0LnJlbW92ZShcImFjdGl2ZVwiKTsgXG4gICAgICAgICAgICAgICAgYXNjQnV0dG9uLnN0eWxlLmJvcmRlciA9IFwiXCI7IC8vIFN1cHByaW1lciBsYSBib3JkdXJlXG4gICAgICAgICAgICBcbiAgICAgICAgICAgIFxuICAgICAgICAgICAgfSk7XG4gICAgICAgIH1cbiAgICB9XG5cbiAgICAvLyBBcHBlbGV6IGxhIGZvbmN0aW9uXG4gICAgY2hlY2tlZFNvcnQoKTtcbiAgICBcbiAgICBcbn0pO1xuIl0sIm5hbWVzIjpbImRvY3VtZW50IiwiYWRkRXZlbnRMaXN0ZW5lciIsIm5vTm90aWYiLCJxdWVyeVNlbGVjdG9yIiwiZmlsdGVyQnV0dG9ucyIsInF1ZXJ5U2VsZWN0b3JBbGwiLCJ0b2FzdHMiLCJmaWx0ZXJOb3RpZmljYXRpb25zIiwidHlwZSIsImhhc1Zpc2libGVOb3RpZmljYXRpb25zIiwiZm9yRWFjaCIsIm5vdGlmaWNhdGlvbiIsImNsYXNzTGlzdCIsImNvbnRhaW5zIiwicmVtb3ZlIiwiYWRkIiwiYnV0dG9uIiwiZSIsInByZXZlbnREZWZhdWx0IiwiZ2V0QXR0cmlidXRlIiwibm90aWZpY2F0aW9ucyIsImJ0biIsImNoZWNrZWRTb3J0IiwiYXNjQnV0dG9uIiwiZ2V0RWxlbWVudEJ5SWQiLCJkZXNjQnV0dG9uIiwiY2hlY2tlZCIsInN0eWxlIiwiYm9yZGVyIl0sInNvdXJjZVJvb3QiOiIifQ==