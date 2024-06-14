(self["webpackChunk"] = self["webpackChunk"] || []).push([["personnelTirArchive"],{

/***/ "./assets/js/personnelTirArchive.js":
/*!******************************************!*\
  !*** ./assets/js/personnelTirArchive.js ***!
  \******************************************/
/***/ (() => {



// // Récupérer les éléments du DOM
// const personnelInput = document.getElementById("dossiers_edit_archive_nomPersonnel");
// const personnelValueInput = document.getElementById("personnelValue");
// const personnelBtnSubmit = document.getElementById("personnelBtnSubmit");
// const iconDelete = document.getElementById("icon-delete");
// const nbPersonnelInput = document.getElementById("dossiers_edit_archive_nbPersonnel");

// // Fonction pour mettre à jour le nombre de personnels
// function updateNbPersonnel() {
//     // Séparer les valeurs actuelles par une virgule
//     const personnelValues = personnelInput.value.split(", ");
//     // Mettre à jour le champ de nombre de personnels avec la longueur du tableau
//     nbPersonnelInput.value = personnelValues.length;
// }

// // Ajouter un écouteur d'événements sur le bouton de soumission
// personnelBtnSubmit.addEventListener("click", function(event) {
//     event.preventDefault();
//     const value = personnelValueInput.value.trim();
//     if (value !== "") {
//         // Ajouter la valeur à l'input readonly
//         personnelInput.value += (personnelInput.value ? ", " : "") + value;
//         // Effacer la valeur saisie
//         personnelValueInput.value = "";
//         // Mettre à jour le nombre de personnels
//         updateNbPersonnel();
//         // Empêcher la propagation de l'événement de clic pour éviter la fermeture du dropdown
//         event.stopPropagation();
//     }
// });

// // Ajouter un écouteur d'événements sur l'icône de suppression
// iconDelete.addEventListener("click", function(event) {
//     // Récupérer les valeurs actuelles dans l'input readonly
//     let currentValues = personnelInput.value.split(", ");
//     // Supprimer la dernière valeur ajoutée
//     currentValues.pop();
//     // Mettre à jour l'input readonly avec les valeurs restantes
//     personnelInput.value = currentValues.join(", ");
//     // Mettre à jour le nombre de personnels
//     updateNbPersonnel();
//     // Si la liste des valeurs personnelles est vide, mettre à jour nbPersonnelInput à 0
//     if (currentValues.length === 0) {
//         nbPersonnelInput.value = 0;
//     }
//     // Empêcher la propagation de l'événement de clic pour éviter la fermeture du dropdown
//     event.stopPropagation();
// });

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ var __webpack_exports__ = (__webpack_exec__("./assets/js/personnelTirArchive.js"));
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoicGVyc29ubmVsVGlyQXJjaGl2ZS5qcyIsIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7O0FBR0k7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL3BlcnNvbm5lbFRpckFyY2hpdmUuanMiXSwic291cmNlc0NvbnRlbnQiOlsiXG5cblxuICAgIC8vIC8vIFLDqWN1cMOpcmVyIGxlcyDDqWzDqW1lbnRzIGR1IERPTVxuICAgIC8vIGNvbnN0IHBlcnNvbm5lbElucHV0ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJkb3NzaWVyc19lZGl0X2FyY2hpdmVfbm9tUGVyc29ubmVsXCIpO1xuICAgIC8vIGNvbnN0IHBlcnNvbm5lbFZhbHVlSW5wdXQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcInBlcnNvbm5lbFZhbHVlXCIpO1xuICAgIC8vIGNvbnN0IHBlcnNvbm5lbEJ0blN1Ym1pdCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwicGVyc29ubmVsQnRuU3VibWl0XCIpO1xuICAgIC8vIGNvbnN0IGljb25EZWxldGUgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcImljb24tZGVsZXRlXCIpO1xuICAgIC8vIGNvbnN0IG5iUGVyc29ubmVsSW5wdXQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcImRvc3NpZXJzX2VkaXRfYXJjaGl2ZV9uYlBlcnNvbm5lbFwiKTtcblxuICAgIC8vIC8vIEZvbmN0aW9uIHBvdXIgbWV0dHJlIMOgIGpvdXIgbGUgbm9tYnJlIGRlIHBlcnNvbm5lbHNcbiAgICAvLyBmdW5jdGlvbiB1cGRhdGVOYlBlcnNvbm5lbCgpIHtcbiAgICAvLyAgICAgLy8gU8OpcGFyZXIgbGVzIHZhbGV1cnMgYWN0dWVsbGVzIHBhciB1bmUgdmlyZ3VsZVxuICAgIC8vICAgICBjb25zdCBwZXJzb25uZWxWYWx1ZXMgPSBwZXJzb25uZWxJbnB1dC52YWx1ZS5zcGxpdChcIiwgXCIpO1xuICAgIC8vICAgICAvLyBNZXR0cmUgw6Agam91ciBsZSBjaGFtcCBkZSBub21icmUgZGUgcGVyc29ubmVscyBhdmVjIGxhIGxvbmd1ZXVyIGR1IHRhYmxlYXVcbiAgICAvLyAgICAgbmJQZXJzb25uZWxJbnB1dC52YWx1ZSA9IHBlcnNvbm5lbFZhbHVlcy5sZW5ndGg7XG4gICAgLy8gfVxuXG4gICAgLy8gLy8gQWpvdXRlciB1biDDqWNvdXRldXIgZCfDqXbDqW5lbWVudHMgc3VyIGxlIGJvdXRvbiBkZSBzb3VtaXNzaW9uXG4gICAgLy8gcGVyc29ubmVsQnRuU3VibWl0LmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCBmdW5jdGlvbihldmVudCkge1xuICAgIC8vICAgICBldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIC8vICAgICBjb25zdCB2YWx1ZSA9IHBlcnNvbm5lbFZhbHVlSW5wdXQudmFsdWUudHJpbSgpO1xuICAgIC8vICAgICBpZiAodmFsdWUgIT09IFwiXCIpIHtcbiAgICAvLyAgICAgICAgIC8vIEFqb3V0ZXIgbGEgdmFsZXVyIMOgIGwnaW5wdXQgcmVhZG9ubHlcbiAgICAvLyAgICAgICAgIHBlcnNvbm5lbElucHV0LnZhbHVlICs9IChwZXJzb25uZWxJbnB1dC52YWx1ZSA/IFwiLCBcIiA6IFwiXCIpICsgdmFsdWU7XG4gICAgLy8gICAgICAgICAvLyBFZmZhY2VyIGxhIHZhbGV1ciBzYWlzaWVcbiAgICAvLyAgICAgICAgIHBlcnNvbm5lbFZhbHVlSW5wdXQudmFsdWUgPSBcIlwiO1xuICAgIC8vICAgICAgICAgLy8gTWV0dHJlIMOgIGpvdXIgbGUgbm9tYnJlIGRlIHBlcnNvbm5lbHNcbiAgICAvLyAgICAgICAgIHVwZGF0ZU5iUGVyc29ubmVsKCk7XG4gICAgLy8gICAgICAgICAvLyBFbXDDqmNoZXIgbGEgcHJvcGFnYXRpb24gZGUgbCfDqXbDqW5lbWVudCBkZSBjbGljIHBvdXIgw6l2aXRlciBsYSBmZXJtZXR1cmUgZHUgZHJvcGRvd25cbiAgICAvLyAgICAgICAgIGV2ZW50LnN0b3BQcm9wYWdhdGlvbigpO1xuICAgIC8vICAgICB9XG4gICAgLy8gfSk7XG5cbiAgICAvLyAvLyBBam91dGVyIHVuIMOpY291dGV1ciBkJ8OpdsOpbmVtZW50cyBzdXIgbCdpY8O0bmUgZGUgc3VwcHJlc3Npb25cbiAgICAvLyBpY29uRGVsZXRlLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCBmdW5jdGlvbihldmVudCkge1xuICAgIC8vICAgICAvLyBSw6ljdXDDqXJlciBsZXMgdmFsZXVycyBhY3R1ZWxsZXMgZGFucyBsJ2lucHV0IHJlYWRvbmx5XG4gICAgLy8gICAgIGxldCBjdXJyZW50VmFsdWVzID0gcGVyc29ubmVsSW5wdXQudmFsdWUuc3BsaXQoXCIsIFwiKTtcbiAgICAvLyAgICAgLy8gU3VwcHJpbWVyIGxhIGRlcm5pw6hyZSB2YWxldXIgYWpvdXTDqWVcbiAgICAvLyAgICAgY3VycmVudFZhbHVlcy5wb3AoKTtcbiAgICAvLyAgICAgLy8gTWV0dHJlIMOgIGpvdXIgbCdpbnB1dCByZWFkb25seSBhdmVjIGxlcyB2YWxldXJzIHJlc3RhbnRlc1xuICAgIC8vICAgICBwZXJzb25uZWxJbnB1dC52YWx1ZSA9IGN1cnJlbnRWYWx1ZXMuam9pbihcIiwgXCIpO1xuICAgIC8vICAgICAvLyBNZXR0cmUgw6Agam91ciBsZSBub21icmUgZGUgcGVyc29ubmVsc1xuICAgIC8vICAgICB1cGRhdGVOYlBlcnNvbm5lbCgpO1xuICAgIC8vICAgICAvLyBTaSBsYSBsaXN0ZSBkZXMgdmFsZXVycyBwZXJzb25uZWxsZXMgZXN0IHZpZGUsIG1ldHRyZSDDoCBqb3VyIG5iUGVyc29ubmVsSW5wdXQgw6AgMFxuICAgIC8vICAgICBpZiAoY3VycmVudFZhbHVlcy5sZW5ndGggPT09IDApIHtcbiAgICAvLyAgICAgICAgIG5iUGVyc29ubmVsSW5wdXQudmFsdWUgPSAwO1xuICAgIC8vICAgICB9XG4gICAgLy8gICAgIC8vIEVtcMOqY2hlciBsYSBwcm9wYWdhdGlvbiBkZSBsJ8OpdsOpbmVtZW50IGRlIGNsaWMgcG91ciDDqXZpdGVyIGxhIGZlcm1ldHVyZSBkdSBkcm9wZG93blxuICAgIC8vICAgICBldmVudC5zdG9wUHJvcGFnYXRpb24oKTtcbiAgICAvLyB9KTtcblxuIl0sIm5hbWVzIjpbXSwic291cmNlUm9vdCI6IiJ9