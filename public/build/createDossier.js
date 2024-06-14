(self["webpackChunk"] = self["webpackChunk"] || []).push([["createDossier"],{

/***/ "./assets/js/createDossier.js":
/*!************************************!*\
  !*** ./assets/js/createDossier.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

__webpack_require__(/*! core-js/modules/es.string.trim.js */ "./node_modules/core-js/modules/es.string.trim.js");
__webpack_require__(/*! core-js/modules/es.array.join.js */ "./node_modules/core-js/modules/es.array.join.js");
__webpack_require__(/*! core-js/modules/es.array.for-each.js */ "./node_modules/core-js/modules/es.array.for-each.js");
__webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
__webpack_require__(/*! core-js/modules/web.dom-collections.for-each.js */ "./node_modules/core-js/modules/web.dom-collections.for-each.js");
var btnBack = document.querySelector(".btnBack");
btnBack.addEventListener("click", function () {
  var audio = document.getElementById("audio");
  audio.play();
  btnBack.classList.add("animatePress");
});
var dossiers_assignVrp = document.getElementById("dossiers_assignVrp");
var dossiers_dpt = document.getElementById("dossiers_dpt");
dossiers_assignVrp.addEventListener("mousedown", function (e) {
  e.preventDefault();
});
dossiers_dpt.addEventListener("mousedown", function (e) {
  e.preventDefault();
});

//Après la soumission du form refresh le formulaire
document.addEventListener('turbo:submit-end', function () {
  // Réinitialisez le formulaire
  var dossierGenerer = document.querySelector('.dossier-generated');
  dossierGenerer.reset();
  var dossiers_dpt = document.getElementById("dossiers_dpt");
  var dossiers_typeFeu = document.getElementById("dossiers_typeFeu");
  var dossiers_dateTir = document.getElementById("dossiers_dateTir");
  var dossiers_montant = document.getElementById("dossiers_montant");
  var assignVrp = document.getElementById("dossiers_assignVrp");
  var selectClient = document.getElementById("selectClient");
  dossiers_dpt.classList.remove("success-style");
  dossiers_typeFeu.classList.remove("success-style");
  dossiers_dateTir.classList.remove("success-style");
  dossiers_montant.classList.remove("success-style");
  assignVrp.classList.remove("success-style");
  selectClient.innerText = "";
});

//Récupérer les éléments du DOM 
var personnelInput = document.getElementById("dossiers_nomPersonnel");
var personnelValueInput = document.getElementById("personnelValue");
var personnelBtnSubmit = document.getElementById("personnelBtnSubmit");
var iconDelete = document.getElementById("icon-delete");
var nbPersonnelInput = document.getElementById("dossiers_nbPersonnel");

//Fonction pour mettre à jour le nombre de personnels 
function updateNbPersonnel() {
  // Séparer les valeurs actuelles par une virgule
  var personnelValues = personnelInput.value.split(", ");
  // Mettre à jour le champ de nombre de personnels avec la longueur du tableau
  nbPersonnelInput.value = personnelValues.length;
}

//Ajouter un écouteur d'événements sur le bouton de soumission 
personnelBtnSubmit.addEventListener("click", function (event) {
  event.preventDefault();
  var value = personnelValueInput.value.trim();
  if (value !== "") {
    // Ajouter la valeur à l'input readonly
    personnelInput.value += (personnelInput.value ? ", " : "") + value;
    // Effacer la valeur saisie
    personnelValueInput.value = "";
    // Mettre à jour le nombre de personnels
    updateNbPersonnel();
    // Empêcher la propagation de l'événement de clic pour éviter la fermeture du dropdown
    event.stopPropagation();
  }
});

// Evenement pour supprimer les elements dans le input nbPersonnel 
iconDelete.addEventListener("click", function (event) {
  // Récupérer les valeurs actuelles dans l'input readonly
  var currentValues = personnelInput.value.split(", ");
  // Supprimer la dernière valeur ajoutée
  currentValues.pop();
  // Mettre à jour l'input readonly avec les valeurs restantes
  personnelInput.value = currentValues.join(", ");
  // Mettre à jour le nombre de personnels
  updateNbPersonnel();
  // Si la liste des valeurs personnelles est vide, mettre à jour nbPersonnelInput à 0
  if (currentValues.length === 0) {
    nbPersonnelInput.value = 0;
  }
  // Empêcher la propagation de l'événement de clic pour éviter la fermeture du dropdown
  event.stopPropagation();
});
document.addEventListener('DOMContentLoaded', function () {
  var form = document.querySelector('.dossier-generated');
  var feu = document.getElementById('dossiers_nbPersonnel');
  var assignVrpField = document.getElementById('dossiers_assignVrp');
  var typeFeuField = document.getElementById('dossiers_typeFeu');
  var dateTirField = document.getElementById('dossiers_dateTir');
  var departementField = document.getElementById('dossiers_dpt');

  //Applique du style lors du changement dans les select
  [assignVrpField, typeFeuField, dateTirField, departementField].forEach(function (field) {
    field.addEventListener('change', function () {
      // Supprimez le tooltip s'il existe
      if (field.hasAttribute('data-bs-original-title')) {
        field.removeAttribute('data-bs-toggle');
        field.removeAttribute('data-bs-placement');
        field.removeAttribute('title');
        var tooltip = bootstrap.Tooltip.getInstance(field);
        if (tooltip) {
          tooltip.dispose();
        }
      }
      if (field.value !== '') {
        // Appliquez le style de succès si le champ est rempli
        field.classList.remove("error-style");
        field.classList.add("success-style");
      } else {
        // Sinon, appliquez le style d'erreur
        field.classList.remove("success-style");
        field.classList.add("error-style");
      }
    });
  });

  //Contraintes de validations si les elements sont vides
  form.addEventListener('submit', function (event) {
    var fields = [{
      field: assignVrpField,
      errorMessage: 'Vous devez assigner ce dossier à un VRP.'
    }, {
      field: typeFeuField,
      errorMessage: 'Le type feu doit être sélectionné.'
    }, {
      field: dateTirField,
      errorMessage: 'Veuillez remplir la date de tir du feu.'
    }, {
      field: departementField,
      errorMessage: 'Veuillez remplir le departement.'
    }];
    fields.forEach(function (_ref) {
      var field = _ref.field,
        errorMessage = _ref.errorMessage;
      if (field.offsetParent !== null && (field.value === '' || field.selectedIndex === 0)) {
        field.classList.add("error-style");
        field.setAttribute('data-bs-toggle', 'tooltip');
        field.setAttribute('data-bs-placement', 'bottom');
        field.setAttribute('title', errorMessage);
        event.preventDefault();
        // Initialisation du tooltip Bootstrap
        new bootstrap.Tooltip(field);
      } else {
        field.classList.add("success-style");
        field.classList.remove("error-style");
      }
    });
  });
  var assignVrp = document.getElementById('dossiers_assignVrp');
  var nomVrp = document.getElementById('dossiers_nomVrp');
  var montantField = document.getElementById('dossiers_montant');
  assignVrp.addEventListener('change', function () {
    var selectedOption = assignVrp.options[assignVrp.selectedIndex];
    nomVrp.setAttribute('value', selectedOption.innerHTML);
  });

  // Fonction pour mettre à jour la box shadow en vert si le champ est rempli ou sélectionné
  function updateBoxShadow(field) {
    if (field.value !== '' && field.selectedIndex !== 0) {
      field.classList.add("success-style");
    } else {
      field.classList.remove("success-style");
    }
  }

  // Écouter les événements de changement pour chaque champ de formulaire
  assignVrpField.addEventListener('change', function () {
    updateBoxShadow(assignVrpField);
  });
  typeFeuField.addEventListener('change', function () {
    updateBoxShadow(typeFeuField);
  });
  dateTirField.addEventListener('change', function () {
    updateBoxShadow(dateTirField);
  });
  montantField.addEventListener('change', function () {
    updateBoxShadow(montantField);
  });
  departementField.addEventListener('change', function () {
    updateBoxShadow(departementField);
  });
});

/***/ }),

/***/ "./node_modules/core-js/internals/string-trim-forced.js":
/*!**************************************************************!*\
  !*** ./node_modules/core-js/internals/string-trim-forced.js ***!
  \**************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";

var PROPER_FUNCTION_NAME = (__webpack_require__(/*! ../internals/function-name */ "./node_modules/core-js/internals/function-name.js").PROPER);
var fails = __webpack_require__(/*! ../internals/fails */ "./node_modules/core-js/internals/fails.js");
var whitespaces = __webpack_require__(/*! ../internals/whitespaces */ "./node_modules/core-js/internals/whitespaces.js");

var non = '\u200B\u0085\u180E';

// check that a method works with the correct list
// of whitespaces and has a correct name
module.exports = function (METHOD_NAME) {
  return fails(function () {
    return !!whitespaces[METHOD_NAME]()
      || non[METHOD_NAME]() !== non
      || (PROPER_FUNCTION_NAME && whitespaces[METHOD_NAME].name !== METHOD_NAME);
  });
};


/***/ }),

/***/ "./node_modules/core-js/internals/string-trim.js":
/*!*******************************************************!*\
  !*** ./node_modules/core-js/internals/string-trim.js ***!
  \*******************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";

var uncurryThis = __webpack_require__(/*! ../internals/function-uncurry-this */ "./node_modules/core-js/internals/function-uncurry-this.js");
var requireObjectCoercible = __webpack_require__(/*! ../internals/require-object-coercible */ "./node_modules/core-js/internals/require-object-coercible.js");
var toString = __webpack_require__(/*! ../internals/to-string */ "./node_modules/core-js/internals/to-string.js");
var whitespaces = __webpack_require__(/*! ../internals/whitespaces */ "./node_modules/core-js/internals/whitespaces.js");

var replace = uncurryThis(''.replace);
var ltrim = RegExp('^[' + whitespaces + ']+');
var rtrim = RegExp('(^|[^' + whitespaces + '])[' + whitespaces + ']+$');

// `String.prototype.{ trim, trimStart, trimEnd, trimLeft, trimRight }` methods implementation
var createMethod = function (TYPE) {
  return function ($this) {
    var string = toString(requireObjectCoercible($this));
    if (TYPE & 1) string = replace(string, ltrim, '');
    if (TYPE & 2) string = replace(string, rtrim, '$1');
    return string;
  };
};

module.exports = {
  // `String.prototype.{ trimLeft, trimStart }` methods
  // https://tc39.es/ecma262/#sec-string.prototype.trimstart
  start: createMethod(1),
  // `String.prototype.{ trimRight, trimEnd }` methods
  // https://tc39.es/ecma262/#sec-string.prototype.trimend
  end: createMethod(2),
  // `String.prototype.trim` method
  // https://tc39.es/ecma262/#sec-string.prototype.trim
  trim: createMethod(3)
};


/***/ }),

/***/ "./node_modules/core-js/internals/to-string.js":
/*!*****************************************************!*\
  !*** ./node_modules/core-js/internals/to-string.js ***!
  \*****************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";

var classof = __webpack_require__(/*! ../internals/classof */ "./node_modules/core-js/internals/classof.js");

var $String = String;

module.exports = function (argument) {
  if (classof(argument) === 'Symbol') throw new TypeError('Cannot convert a Symbol value to a string');
  return $String(argument);
};


/***/ }),

/***/ "./node_modules/core-js/internals/whitespaces.js":
/*!*******************************************************!*\
  !*** ./node_modules/core-js/internals/whitespaces.js ***!
  \*******************************************************/
/***/ ((module) => {

"use strict";

// a string of all valid unicode whitespaces
module.exports = '\u0009\u000A\u000B\u000C\u000D\u0020\u00A0\u1680\u2000\u2001\u2002' +
  '\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200A\u202F\u205F\u3000\u2028\u2029\uFEFF';


/***/ }),

/***/ "./node_modules/core-js/modules/es.array.join.js":
/*!*******************************************************!*\
  !*** ./node_modules/core-js/modules/es.array.join.js ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

"use strict";

var $ = __webpack_require__(/*! ../internals/export */ "./node_modules/core-js/internals/export.js");
var uncurryThis = __webpack_require__(/*! ../internals/function-uncurry-this */ "./node_modules/core-js/internals/function-uncurry-this.js");
var IndexedObject = __webpack_require__(/*! ../internals/indexed-object */ "./node_modules/core-js/internals/indexed-object.js");
var toIndexedObject = __webpack_require__(/*! ../internals/to-indexed-object */ "./node_modules/core-js/internals/to-indexed-object.js");
var arrayMethodIsStrict = __webpack_require__(/*! ../internals/array-method-is-strict */ "./node_modules/core-js/internals/array-method-is-strict.js");

var nativeJoin = uncurryThis([].join);

var ES3_STRINGS = IndexedObject !== Object;
var FORCED = ES3_STRINGS || !arrayMethodIsStrict('join', ',');

// `Array.prototype.join` method
// https://tc39.es/ecma262/#sec-array.prototype.join
$({ target: 'Array', proto: true, forced: FORCED }, {
  join: function join(separator) {
    return nativeJoin(toIndexedObject(this), separator === undefined ? ',' : separator);
  }
});


/***/ }),

/***/ "./node_modules/core-js/modules/es.string.trim.js":
/*!********************************************************!*\
  !*** ./node_modules/core-js/modules/es.string.trim.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

"use strict";

var $ = __webpack_require__(/*! ../internals/export */ "./node_modules/core-js/internals/export.js");
var $trim = (__webpack_require__(/*! ../internals/string-trim */ "./node_modules/core-js/internals/string-trim.js").trim);
var forcedStringTrimMethod = __webpack_require__(/*! ../internals/string-trim-forced */ "./node_modules/core-js/internals/string-trim-forced.js");

// `String.prototype.trim` method
// https://tc39.es/ecma262/#sec-string.prototype.trim
$({ target: 'String', proto: true, forced: forcedStringTrimMethod('trim') }, {
  trim: function trim() {
    return $trim(this);
  }
});


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_core-js_internals_define-built-in_js","vendors-node_modules_core-js_internals_classof_js-node_modules_core-js_internals_export_js","vendors-node_modules_core-js_modules_es_array_for-each_js-node_modules_core-js_modules_es_obj-7bb33f"], () => (__webpack_exec__("./assets/js/createDossier.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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QkFBeUIscUJBQXFCO0FBQzlDO0FBQ0E7QUFDQSx5QkFBeUIsb0JBQW9CO0FBQzdDO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7Ozs7Ozs7Ozs7O0FDOUJhO0FBQ2IsY0FBYyxtQkFBTyxDQUFDLHlFQUFzQjs7QUFFNUM7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7Ozs7Ozs7Ozs7OztBQ1JhO0FBQ2I7QUFDQTtBQUNBOzs7Ozs7Ozs7Ozs7QUNIYTtBQUNiLFFBQVEsbUJBQU8sQ0FBQyx1RUFBcUI7QUFDckMsa0JBQWtCLG1CQUFPLENBQUMscUdBQW9DO0FBQzlELG9CQUFvQixtQkFBTyxDQUFDLHVGQUE2QjtBQUN6RCxzQkFBc0IsbUJBQU8sQ0FBQyw2RkFBZ0M7QUFDOUQsMEJBQTBCLG1CQUFPLENBQUMsdUdBQXFDOztBQUV2RTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxJQUFJLDhDQUE4QztBQUNsRDtBQUNBO0FBQ0E7QUFDQSxDQUFDOzs7Ozs7Ozs7Ozs7QUNsQlk7QUFDYixRQUFRLG1CQUFPLENBQUMsdUVBQXFCO0FBQ3JDLFlBQVksNkdBQXdDO0FBQ3BELDZCQUE2QixtQkFBTyxDQUFDLCtGQUFpQzs7QUFFdEU7QUFDQTtBQUNBLElBQUksdUVBQXVFO0FBQzNFO0FBQ0E7QUFDQTtBQUNBLENBQUMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvY3JlYXRlRG9zc2llci5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvY29yZS1qcy9pbnRlcm5hbHMvc3RyaW5nLXRyaW0tZm9yY2VkLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9jb3JlLWpzL2ludGVybmFscy9zdHJpbmctdHJpbS5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvY29yZS1qcy9pbnRlcm5hbHMvdG8tc3RyaW5nLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9jb3JlLWpzL2ludGVybmFscy93aGl0ZXNwYWNlcy5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvY29yZS1qcy9tb2R1bGVzL2VzLmFycmF5LmpvaW4uanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2NvcmUtanMvbW9kdWxlcy9lcy5zdHJpbmcudHJpbS5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyJcbiAgICBsZXQgYnRuQmFjayA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIuYnRuQmFja1wiKTtcbiAgICBidG5CYWNrLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCgpPT57XG4gICAgICAgIHZhciBhdWRpbyA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwiYXVkaW9cIik7XG4gICAgICAgIGF1ZGlvLnBsYXkoKTtcbiAgICAgICAgYnRuQmFjay5jbGFzc0xpc3QuYWRkKFwiYW5pbWF0ZVByZXNzXCIpO1xuICAgIH0pXG5cbiAgXG4gICAgY29uc3QgZG9zc2llcnNfYXNzaWduVnJwID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJkb3NzaWVyc19hc3NpZ25WcnBcIik7XG4gICAgY29uc3QgZG9zc2llcnNfZHB0ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJkb3NzaWVyc19kcHRcIik7XG5cbiAgICBkb3NzaWVyc19hc3NpZ25WcnAuYWRkRXZlbnRMaXN0ZW5lcihcIm1vdXNlZG93blwiLCBmdW5jdGlvbihlKSB7XG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICB9KTtcblxuICAgIGRvc3NpZXJzX2RwdC5hZGRFdmVudExpc3RlbmVyKFwibW91c2Vkb3duXCIsIGZ1bmN0aW9uKGUpIHtcbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIH0pO1xuXG4gICAgLy9BcHLDqHMgbGEgc291bWlzc2lvbiBkdSBmb3JtIHJlZnJlc2ggbGUgZm9ybXVsYWlyZVxuICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ3R1cmJvOnN1Ym1pdC1lbmQnLCAoKSA9PiB7XG4gICAgICAgIC8vIFLDqWluaXRpYWxpc2V6IGxlIGZvcm11bGFpcmVcbiAgICAgICAgbGV0IGRvc3NpZXJHZW5lcmVyID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmRvc3NpZXItZ2VuZXJhdGVkJyk7XG4gICAgICAgIGRvc3NpZXJHZW5lcmVyLnJlc2V0KCk7XG4gICAgICAgIGNvbnN0IGRvc3NpZXJzX2RwdCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwiZG9zc2llcnNfZHB0XCIpO1xuICAgICAgICBjb25zdCBkb3NzaWVyc190eXBlRmV1ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJkb3NzaWVyc190eXBlRmV1XCIpO1xuICAgICAgICBjb25zdCBkb3NzaWVyc19kYXRlVGlyID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJkb3NzaWVyc19kYXRlVGlyXCIpO1xuICAgICAgICBjb25zdCBkb3NzaWVyc19tb250YW50ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJkb3NzaWVyc19tb250YW50XCIpO1xuICAgICAgICBjb25zdCBhc3NpZ25WcnAgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcImRvc3NpZXJzX2Fzc2lnblZycFwiKTtcbiAgICAgICAgY29uc3Qgc2VsZWN0Q2xpZW50ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJzZWxlY3RDbGllbnRcIik7XG5cbiAgICAgICAgZG9zc2llcnNfZHB0LmNsYXNzTGlzdC5yZW1vdmUoXCJzdWNjZXNzLXN0eWxlXCIpO1xuICAgICAgICBkb3NzaWVyc190eXBlRmV1LmNsYXNzTGlzdC5yZW1vdmUoXCJzdWNjZXNzLXN0eWxlXCIpO1xuICAgICAgICBkb3NzaWVyc19kYXRlVGlyLmNsYXNzTGlzdC5yZW1vdmUoXCJzdWNjZXNzLXN0eWxlXCIpO1xuICAgICAgICBkb3NzaWVyc19tb250YW50LmNsYXNzTGlzdC5yZW1vdmUoXCJzdWNjZXNzLXN0eWxlXCIpO1xuICAgICAgICBhc3NpZ25WcnAuY2xhc3NMaXN0LnJlbW92ZShcInN1Y2Nlc3Mtc3R5bGVcIik7XG4gICAgICAgIHNlbGVjdENsaWVudC5pbm5lclRleHQ9XCJcIjtcblxuICAgIH0pO1xuXG5cbiAgICAvL1LDqWN1cMOpcmVyIGxlcyDDqWzDqW1lbnRzIGR1IERPTSBcbiAgICBjb25zdCBwZXJzb25uZWxJbnB1dCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwiZG9zc2llcnNfbm9tUGVyc29ubmVsXCIpO1xuICAgIGNvbnN0IHBlcnNvbm5lbFZhbHVlSW5wdXQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcInBlcnNvbm5lbFZhbHVlXCIpO1xuICAgIGNvbnN0IHBlcnNvbm5lbEJ0blN1Ym1pdCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwicGVyc29ubmVsQnRuU3VibWl0XCIpO1xuICAgIGNvbnN0IGljb25EZWxldGUgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcImljb24tZGVsZXRlXCIpO1xuICAgIGNvbnN0IG5iUGVyc29ubmVsSW5wdXQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcImRvc3NpZXJzX25iUGVyc29ubmVsXCIpO1xuXG4gICAgLy9Gb25jdGlvbiBwb3VyIG1ldHRyZSDDoCBqb3VyIGxlIG5vbWJyZSBkZSBwZXJzb25uZWxzIFxuICAgIGZ1bmN0aW9uIHVwZGF0ZU5iUGVyc29ubmVsKCkge1xuICAgICAgICAvLyBTw6lwYXJlciBsZXMgdmFsZXVycyBhY3R1ZWxsZXMgcGFyIHVuZSB2aXJndWxlXG4gICAgICAgIGNvbnN0IHBlcnNvbm5lbFZhbHVlcyA9IHBlcnNvbm5lbElucHV0LnZhbHVlLnNwbGl0KFwiLCBcIik7XG4gICAgICAgIC8vIE1ldHRyZSDDoCBqb3VyIGxlIGNoYW1wIGRlIG5vbWJyZSBkZSBwZXJzb25uZWxzIGF2ZWMgbGEgbG9uZ3VldXIgZHUgdGFibGVhdVxuICAgICAgICBuYlBlcnNvbm5lbElucHV0LnZhbHVlID0gcGVyc29ubmVsVmFsdWVzLmxlbmd0aDtcbiAgICB9XG5cbiAgICAvL0Fqb3V0ZXIgdW4gw6ljb3V0ZXVyIGQnw6l2w6luZW1lbnRzIHN1ciBsZSBib3V0b24gZGUgc291bWlzc2lvbiBcbiAgICBwZXJzb25uZWxCdG5TdWJtaXQuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIGZ1bmN0aW9uKGV2ZW50KSB7XG4gICAgICAgIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgIGNvbnN0IHZhbHVlID0gcGVyc29ubmVsVmFsdWVJbnB1dC52YWx1ZS50cmltKCk7XG4gICAgICAgIGlmICh2YWx1ZSAhPT0gXCJcIikge1xuICAgICAgICAgICAgLy8gQWpvdXRlciBsYSB2YWxldXIgw6AgbCdpbnB1dCByZWFkb25seVxuICAgICAgICAgICAgcGVyc29ubmVsSW5wdXQudmFsdWUgKz0gKHBlcnNvbm5lbElucHV0LnZhbHVlID8gXCIsIFwiIDogXCJcIikgKyB2YWx1ZTtcbiAgICAgICAgICAgIC8vIEVmZmFjZXIgbGEgdmFsZXVyIHNhaXNpZVxuICAgICAgICAgICAgcGVyc29ubmVsVmFsdWVJbnB1dC52YWx1ZSA9IFwiXCI7XG4gICAgICAgICAgICAvLyBNZXR0cmUgw6Agam91ciBsZSBub21icmUgZGUgcGVyc29ubmVsc1xuICAgICAgICAgICAgdXBkYXRlTmJQZXJzb25uZWwoKTtcbiAgICAgICAgICAgIC8vIEVtcMOqY2hlciBsYSBwcm9wYWdhdGlvbiBkZSBsJ8OpdsOpbmVtZW50IGRlIGNsaWMgcG91ciDDqXZpdGVyIGxhIGZlcm1ldHVyZSBkdSBkcm9wZG93blxuICAgICAgICAgICAgZXZlbnQuc3RvcFByb3BhZ2F0aW9uKCk7XG4gICAgICAgIH1cbiAgICB9KTtcblxuICAgIC8vIEV2ZW5lbWVudCBwb3VyIHN1cHByaW1lciBsZXMgZWxlbWVudHMgZGFucyBsZSBpbnB1dCBuYlBlcnNvbm5lbCBcbiAgICBpY29uRGVsZXRlLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCBmdW5jdGlvbihldmVudCkge1xuICAgICAgICAvLyBSw6ljdXDDqXJlciBsZXMgdmFsZXVycyBhY3R1ZWxsZXMgZGFucyBsJ2lucHV0IHJlYWRvbmx5XG4gICAgICAgIGxldCBjdXJyZW50VmFsdWVzID0gcGVyc29ubmVsSW5wdXQudmFsdWUuc3BsaXQoXCIsIFwiKTtcbiAgICAgICAgLy8gU3VwcHJpbWVyIGxhIGRlcm5pw6hyZSB2YWxldXIgYWpvdXTDqWVcbiAgICAgICAgY3VycmVudFZhbHVlcy5wb3AoKTtcbiAgICAgICAgLy8gTWV0dHJlIMOgIGpvdXIgbCdpbnB1dCByZWFkb25seSBhdmVjIGxlcyB2YWxldXJzIHJlc3RhbnRlc1xuICAgICAgICBwZXJzb25uZWxJbnB1dC52YWx1ZSA9IGN1cnJlbnRWYWx1ZXMuam9pbihcIiwgXCIpO1xuICAgICAgICAvLyBNZXR0cmUgw6Agam91ciBsZSBub21icmUgZGUgcGVyc29ubmVsc1xuICAgICAgICB1cGRhdGVOYlBlcnNvbm5lbCgpO1xuICAgICAgICAvLyBTaSBsYSBsaXN0ZSBkZXMgdmFsZXVycyBwZXJzb25uZWxsZXMgZXN0IHZpZGUsIG1ldHRyZSDDoCBqb3VyIG5iUGVyc29ubmVsSW5wdXQgw6AgMFxuICAgICAgICBpZiAoY3VycmVudFZhbHVlcy5sZW5ndGggPT09IDApIHtcbiAgICAgICAgICAgIG5iUGVyc29ubmVsSW5wdXQudmFsdWUgPSAwO1xuICAgICAgICB9XG4gICAgICAgIC8vIEVtcMOqY2hlciBsYSBwcm9wYWdhdGlvbiBkZSBsJ8OpdsOpbmVtZW50IGRlIGNsaWMgcG91ciDDqXZpdGVyIGxhIGZlcm1ldHVyZSBkdSBkcm9wZG93blxuICAgICAgICBldmVudC5zdG9wUHJvcGFnYXRpb24oKTtcbiAgICB9KTtcblxuXG4gICAgZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcignRE9NQ29udGVudExvYWRlZCcsIGZ1bmN0aW9uKCkge1xuICAgICAgICBjb25zdCBmb3JtID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmRvc3NpZXItZ2VuZXJhdGVkJyk7XG4gICAgICAgIGNvbnN0IGZldSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdkb3NzaWVyc19uYlBlcnNvbm5lbCcpO1xuICAgICAgICBjb25zdCBhc3NpZ25WcnBGaWVsZCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdkb3NzaWVyc19hc3NpZ25WcnAnKTtcbiAgICAgICAgY29uc3QgdHlwZUZldUZpZWxkID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2Rvc3NpZXJzX3R5cGVGZXUnKTtcbiAgICAgICAgY29uc3QgZGF0ZVRpckZpZWxkID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2Rvc3NpZXJzX2RhdGVUaXInKTtcbiAgICAgICAgY29uc3QgZGVwYXJ0ZW1lbnRGaWVsZCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdkb3NzaWVyc19kcHQnKTtcbiAgICAgICAgXG4gICAgICAgIC8vQXBwbGlxdWUgZHUgc3R5bGUgbG9ycyBkdSBjaGFuZ2VtZW50IGRhbnMgbGVzIHNlbGVjdFxuICAgICAgICBbYXNzaWduVnJwRmllbGQsIHR5cGVGZXVGaWVsZCwgZGF0ZVRpckZpZWxkLCBkZXBhcnRlbWVudEZpZWxkXS5mb3JFYWNoKGZpZWxkID0+IHtcbiAgICAgICAgICAgIGZpZWxkLmFkZEV2ZW50TGlzdGVuZXIoJ2NoYW5nZScsIGZ1bmN0aW9uKCkge1xuICAgICAgICAgICBcbiAgICAgICAgICAgICAgICAvLyBTdXBwcmltZXogbGUgdG9vbHRpcCBzJ2lsIGV4aXN0ZVxuICAgICAgICAgICAgICAgIGlmIChmaWVsZC5oYXNBdHRyaWJ1dGUoJ2RhdGEtYnMtb3JpZ2luYWwtdGl0bGUnKSkge1xuICAgICAgICAgICAgICAgICAgICBmaWVsZC5yZW1vdmVBdHRyaWJ1dGUoJ2RhdGEtYnMtdG9nZ2xlJyk7XG4gICAgICAgICAgICAgICAgICAgIGZpZWxkLnJlbW92ZUF0dHJpYnV0ZSgnZGF0YS1icy1wbGFjZW1lbnQnKTtcbiAgICAgICAgICAgICAgICAgICAgZmllbGQucmVtb3ZlQXR0cmlidXRlKCd0aXRsZScpO1xuICAgICAgICAgICAgICAgICAgICBsZXQgdG9vbHRpcCA9IGJvb3RzdHJhcC5Ub29sdGlwLmdldEluc3RhbmNlKGZpZWxkKTtcbiAgICAgICAgICAgICAgICAgICAgaWYgKHRvb2x0aXApIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIHRvb2x0aXAuZGlzcG9zZSgpO1xuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIGlmIChmaWVsZC52YWx1ZSAhPT0gJycpIHtcbiAgICAgICAgICAgICAgICAgICAgLy8gQXBwbGlxdWV6IGxlIHN0eWxlIGRlIHN1Y2PDqHMgc2kgbGUgY2hhbXAgZXN0IHJlbXBsaVxuICAgICAgICAgICAgICAgICAgICBmaWVsZC5jbGFzc0xpc3QucmVtb3ZlKFwiZXJyb3Itc3R5bGVcIik7XG4gICAgICAgICAgICAgICAgICAgIGZpZWxkLmNsYXNzTGlzdC5hZGQoXCJzdWNjZXNzLXN0eWxlXCIpO1xuICAgICAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgIC8vIFNpbm9uLCBhcHBsaXF1ZXogbGUgc3R5bGUgZCdlcnJldXJcbiAgICAgICAgICAgICAgICAgICAgZmllbGQuY2xhc3NMaXN0LnJlbW92ZShcInN1Y2Nlc3Mtc3R5bGVcIik7XG4gICAgICAgICAgICAgICAgICAgIGZpZWxkLmNsYXNzTGlzdC5hZGQoXCJlcnJvci1zdHlsZVwiKTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfSk7XG4gICAgICAgIFxuICAgICAgICAvL0NvbnRyYWludGVzIGRlIHZhbGlkYXRpb25zIHNpIGxlcyBlbGVtZW50cyBzb250IHZpZGVzXG4gICAgICAgIGZvcm0uYWRkRXZlbnRMaXN0ZW5lcignc3VibWl0JywgZnVuY3Rpb24oZXZlbnQpIHtcbiAgICAgICAgICAgIGNvbnN0IGZpZWxkcyA9IFtcbiAgICAgICAgICAgICAgICB7IGZpZWxkOiBhc3NpZ25WcnBGaWVsZCwgZXJyb3JNZXNzYWdlOiAnVm91cyBkZXZleiBhc3NpZ25lciBjZSBkb3NzaWVyIMOgIHVuIFZSUC4nIH0sXG4gICAgICAgICAgICAgICAgeyBmaWVsZDogdHlwZUZldUZpZWxkLCBlcnJvck1lc3NhZ2U6ICdMZSB0eXBlIGZldSBkb2l0IMOqdHJlIHPDqWxlY3Rpb25uw6kuJyB9LFxuICAgICAgICAgICAgICAgIHsgZmllbGQ6IGRhdGVUaXJGaWVsZCwgZXJyb3JNZXNzYWdlOiAnVmV1aWxsZXogcmVtcGxpciBsYSBkYXRlIGRlIHRpciBkdSBmZXUuJyB9LFxuICAgICAgICAgICAgICAgIHsgZmllbGQ6IGRlcGFydGVtZW50RmllbGQsIGVycm9yTWVzc2FnZTogJ1ZldWlsbGV6IHJlbXBsaXIgbGUgZGVwYXJ0ZW1lbnQuJyB9LFxuICAgIFxuICAgICAgICAgICAgXTtcbiAgICAgICAgXG4gICAgICAgICAgICBmaWVsZHMuZm9yRWFjaCgoeyBmaWVsZCwgZXJyb3JNZXNzYWdlIH0pID0+IHtcbiAgICAgICAgICAgICAgICBpZiAoZmllbGQub2Zmc2V0UGFyZW50ICE9PSBudWxsICYmIChmaWVsZC52YWx1ZSA9PT0gJycgfHwgZmllbGQuc2VsZWN0ZWRJbmRleCA9PT0gMCkpIHtcbiAgICAgICAgICAgICAgICAgICAgZmllbGQuY2xhc3NMaXN0LmFkZChcImVycm9yLXN0eWxlXCIpO1xuICAgICAgICAgICAgICAgICAgICBmaWVsZC5zZXRBdHRyaWJ1dGUoJ2RhdGEtYnMtdG9nZ2xlJywgJ3Rvb2x0aXAnKTtcbiAgICAgICAgICAgICAgICAgICAgZmllbGQuc2V0QXR0cmlidXRlKCdkYXRhLWJzLXBsYWNlbWVudCcsICdib3R0b20nKTtcbiAgICAgICAgICAgICAgICAgICAgZmllbGQuc2V0QXR0cmlidXRlKCd0aXRsZScsIGVycm9yTWVzc2FnZSk7XG4gICAgICAgICAgICAgICAgICAgIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgICAgICAgICAgICAgIC8vIEluaXRpYWxpc2F0aW9uIGR1IHRvb2x0aXAgQm9vdHN0cmFwXG4gICAgICAgICAgICAgICAgICAgIG5ldyBib290c3RyYXAuVG9vbHRpcChmaWVsZCk7XG4gICAgICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgZmllbGQuY2xhc3NMaXN0LmFkZChcInN1Y2Nlc3Mtc3R5bGVcIik7XG4gICAgICAgICAgICAgICAgICAgIGZpZWxkLmNsYXNzTGlzdC5yZW1vdmUoXCJlcnJvci1zdHlsZVwiKTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfSk7XG5cbiAgICAgICAgY29uc3QgYXNzaWduVnJwID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2Rvc3NpZXJzX2Fzc2lnblZycCcpO1xuICAgICAgICBjb25zdCBub21WcnAgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnZG9zc2llcnNfbm9tVnJwJyk7ICAgXG4gICAgICAgIGNvbnN0IG1vbnRhbnRGaWVsZCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdkb3NzaWVyc19tb250YW50Jyk7XG5cbiAgICAgICAgYXNzaWduVnJwLmFkZEV2ZW50TGlzdGVuZXIoJ2NoYW5nZScsIGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgY29uc3Qgc2VsZWN0ZWRPcHRpb24gPSBhc3NpZ25WcnAub3B0aW9uc1thc3NpZ25WcnAuc2VsZWN0ZWRJbmRleF07XG4gICAgICAgICAgICBub21WcnAuc2V0QXR0cmlidXRlKCd2YWx1ZScsIHNlbGVjdGVkT3B0aW9uLmlubmVySFRNTCk7XG4gICAgICAgIH0pO1xuICAgICAgICBcbiAgICAgICAgLy8gRm9uY3Rpb24gcG91ciBtZXR0cmUgw6Agam91ciBsYSBib3ggc2hhZG93IGVuIHZlcnQgc2kgbGUgY2hhbXAgZXN0IHJlbXBsaSBvdSBzw6lsZWN0aW9ubsOpXG4gICAgICAgIGZ1bmN0aW9uIHVwZGF0ZUJveFNoYWRvdyhmaWVsZCkge1xuICAgICAgICAgICAgaWYgKGZpZWxkLnZhbHVlICE9PSAnJyAmJiBmaWVsZC5zZWxlY3RlZEluZGV4ICE9PSAwKSB7XG4gICAgICAgICAgICAgICAgZmllbGQuY2xhc3NMaXN0LmFkZChcInN1Y2Nlc3Mtc3R5bGVcIik7XG5cbiAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgZmllbGQuY2xhc3NMaXN0LnJlbW92ZShcInN1Y2Nlc3Mtc3R5bGVcIik7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cblxuICAgICAgICAvLyDDiWNvdXRlciBsZXMgw6l2w6luZW1lbnRzIGRlIGNoYW5nZW1lbnQgcG91ciBjaGFxdWUgY2hhbXAgZGUgZm9ybXVsYWlyZVxuICAgICAgICBhc3NpZ25WcnBGaWVsZC5hZGRFdmVudExpc3RlbmVyKCdjaGFuZ2UnLCBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgIHVwZGF0ZUJveFNoYWRvdyhhc3NpZ25WcnBGaWVsZCk7XG4gICAgICAgIH0pO1xuXG4gICAgICAgIHR5cGVGZXVGaWVsZC5hZGRFdmVudExpc3RlbmVyKCdjaGFuZ2UnLCBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgIHVwZGF0ZUJveFNoYWRvdyh0eXBlRmV1RmllbGQpO1xuICAgICAgICB9KTtcblxuICAgICAgICBkYXRlVGlyRmllbGQuYWRkRXZlbnRMaXN0ZW5lcignY2hhbmdlJywgZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICB1cGRhdGVCb3hTaGFkb3coZGF0ZVRpckZpZWxkKTtcbiAgICAgICAgfSk7XG5cbiAgICAgICAgbW9udGFudEZpZWxkLmFkZEV2ZW50TGlzdGVuZXIoJ2NoYW5nZScsIGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgdXBkYXRlQm94U2hhZG93KG1vbnRhbnRGaWVsZCk7XG4gICAgICAgIH0pO1xuXG4gICAgICAgIGRlcGFydGVtZW50RmllbGQuYWRkRXZlbnRMaXN0ZW5lcignY2hhbmdlJywgZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICB1cGRhdGVCb3hTaGFkb3coZGVwYXJ0ZW1lbnRGaWVsZCk7XG4gICAgICAgIH0pO1xuXG4gICAgfSk7XG5cblxuXG4iLCIndXNlIHN0cmljdCc7XG52YXIgUFJPUEVSX0ZVTkNUSU9OX05BTUUgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZnVuY3Rpb24tbmFtZScpLlBST1BFUjtcbnZhciBmYWlscyA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9mYWlscycpO1xudmFyIHdoaXRlc3BhY2VzID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL3doaXRlc3BhY2VzJyk7XG5cbnZhciBub24gPSAnXFx1MjAwQlxcdTAwODVcXHUxODBFJztcblxuLy8gY2hlY2sgdGhhdCBhIG1ldGhvZCB3b3JrcyB3aXRoIHRoZSBjb3JyZWN0IGxpc3Rcbi8vIG9mIHdoaXRlc3BhY2VzIGFuZCBoYXMgYSBjb3JyZWN0IG5hbWVcbm1vZHVsZS5leHBvcnRzID0gZnVuY3Rpb24gKE1FVEhPRF9OQU1FKSB7XG4gIHJldHVybiBmYWlscyhmdW5jdGlvbiAoKSB7XG4gICAgcmV0dXJuICEhd2hpdGVzcGFjZXNbTUVUSE9EX05BTUVdKClcbiAgICAgIHx8IG5vbltNRVRIT0RfTkFNRV0oKSAhPT0gbm9uXG4gICAgICB8fCAoUFJPUEVSX0ZVTkNUSU9OX05BTUUgJiYgd2hpdGVzcGFjZXNbTUVUSE9EX05BTUVdLm5hbWUgIT09IE1FVEhPRF9OQU1FKTtcbiAgfSk7XG59O1xuIiwiJ3VzZSBzdHJpY3QnO1xudmFyIHVuY3VycnlUaGlzID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2Z1bmN0aW9uLXVuY3VycnktdGhpcycpO1xudmFyIHJlcXVpcmVPYmplY3RDb2VyY2libGUgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvcmVxdWlyZS1vYmplY3QtY29lcmNpYmxlJyk7XG52YXIgdG9TdHJpbmcgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvdG8tc3RyaW5nJyk7XG52YXIgd2hpdGVzcGFjZXMgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvd2hpdGVzcGFjZXMnKTtcblxudmFyIHJlcGxhY2UgPSB1bmN1cnJ5VGhpcygnJy5yZXBsYWNlKTtcbnZhciBsdHJpbSA9IFJlZ0V4cCgnXlsnICsgd2hpdGVzcGFjZXMgKyAnXSsnKTtcbnZhciBydHJpbSA9IFJlZ0V4cCgnKF58W14nICsgd2hpdGVzcGFjZXMgKyAnXSlbJyArIHdoaXRlc3BhY2VzICsgJ10rJCcpO1xuXG4vLyBgU3RyaW5nLnByb3RvdHlwZS57IHRyaW0sIHRyaW1TdGFydCwgdHJpbUVuZCwgdHJpbUxlZnQsIHRyaW1SaWdodCB9YCBtZXRob2RzIGltcGxlbWVudGF0aW9uXG52YXIgY3JlYXRlTWV0aG9kID0gZnVuY3Rpb24gKFRZUEUpIHtcbiAgcmV0dXJuIGZ1bmN0aW9uICgkdGhpcykge1xuICAgIHZhciBzdHJpbmcgPSB0b1N0cmluZyhyZXF1aXJlT2JqZWN0Q29lcmNpYmxlKCR0aGlzKSk7XG4gICAgaWYgKFRZUEUgJiAxKSBzdHJpbmcgPSByZXBsYWNlKHN0cmluZywgbHRyaW0sICcnKTtcbiAgICBpZiAoVFlQRSAmIDIpIHN0cmluZyA9IHJlcGxhY2Uoc3RyaW5nLCBydHJpbSwgJyQxJyk7XG4gICAgcmV0dXJuIHN0cmluZztcbiAgfTtcbn07XG5cbm1vZHVsZS5leHBvcnRzID0ge1xuICAvLyBgU3RyaW5nLnByb3RvdHlwZS57IHRyaW1MZWZ0LCB0cmltU3RhcnQgfWAgbWV0aG9kc1xuICAvLyBodHRwczovL3RjMzkuZXMvZWNtYTI2Mi8jc2VjLXN0cmluZy5wcm90b3R5cGUudHJpbXN0YXJ0XG4gIHN0YXJ0OiBjcmVhdGVNZXRob2QoMSksXG4gIC8vIGBTdHJpbmcucHJvdG90eXBlLnsgdHJpbVJpZ2h0LCB0cmltRW5kIH1gIG1ldGhvZHNcbiAgLy8gaHR0cHM6Ly90YzM5LmVzL2VjbWEyNjIvI3NlYy1zdHJpbmcucHJvdG90eXBlLnRyaW1lbmRcbiAgZW5kOiBjcmVhdGVNZXRob2QoMiksXG4gIC8vIGBTdHJpbmcucHJvdG90eXBlLnRyaW1gIG1ldGhvZFxuICAvLyBodHRwczovL3RjMzkuZXMvZWNtYTI2Mi8jc2VjLXN0cmluZy5wcm90b3R5cGUudHJpbVxuICB0cmltOiBjcmVhdGVNZXRob2QoMylcbn07XG4iLCIndXNlIHN0cmljdCc7XG52YXIgY2xhc3NvZiA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9jbGFzc29mJyk7XG5cbnZhciAkU3RyaW5nID0gU3RyaW5nO1xuXG5tb2R1bGUuZXhwb3J0cyA9IGZ1bmN0aW9uIChhcmd1bWVudCkge1xuICBpZiAoY2xhc3NvZihhcmd1bWVudCkgPT09ICdTeW1ib2wnKSB0aHJvdyBuZXcgVHlwZUVycm9yKCdDYW5ub3QgY29udmVydCBhIFN5bWJvbCB2YWx1ZSB0byBhIHN0cmluZycpO1xuICByZXR1cm4gJFN0cmluZyhhcmd1bWVudCk7XG59O1xuIiwiJ3VzZSBzdHJpY3QnO1xuLy8gYSBzdHJpbmcgb2YgYWxsIHZhbGlkIHVuaWNvZGUgd2hpdGVzcGFjZXNcbm1vZHVsZS5leHBvcnRzID0gJ1xcdTAwMDlcXHUwMDBBXFx1MDAwQlxcdTAwMENcXHUwMDBEXFx1MDAyMFxcdTAwQTBcXHUxNjgwXFx1MjAwMFxcdTIwMDFcXHUyMDAyJyArXG4gICdcXHUyMDAzXFx1MjAwNFxcdTIwMDVcXHUyMDA2XFx1MjAwN1xcdTIwMDhcXHUyMDA5XFx1MjAwQVxcdTIwMkZcXHUyMDVGXFx1MzAwMFxcdTIwMjhcXHUyMDI5XFx1RkVGRic7XG4iLCIndXNlIHN0cmljdCc7XG52YXIgJCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9leHBvcnQnKTtcbnZhciB1bmN1cnJ5VGhpcyA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9mdW5jdGlvbi11bmN1cnJ5LXRoaXMnKTtcbnZhciBJbmRleGVkT2JqZWN0ID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2luZGV4ZWQtb2JqZWN0Jyk7XG52YXIgdG9JbmRleGVkT2JqZWN0ID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL3RvLWluZGV4ZWQtb2JqZWN0Jyk7XG52YXIgYXJyYXlNZXRob2RJc1N0cmljdCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9hcnJheS1tZXRob2QtaXMtc3RyaWN0Jyk7XG5cbnZhciBuYXRpdmVKb2luID0gdW5jdXJyeVRoaXMoW10uam9pbik7XG5cbnZhciBFUzNfU1RSSU5HUyA9IEluZGV4ZWRPYmplY3QgIT09IE9iamVjdDtcbnZhciBGT1JDRUQgPSBFUzNfU1RSSU5HUyB8fCAhYXJyYXlNZXRob2RJc1N0cmljdCgnam9pbicsICcsJyk7XG5cbi8vIGBBcnJheS5wcm90b3R5cGUuam9pbmAgbWV0aG9kXG4vLyBodHRwczovL3RjMzkuZXMvZWNtYTI2Mi8jc2VjLWFycmF5LnByb3RvdHlwZS5qb2luXG4kKHsgdGFyZ2V0OiAnQXJyYXknLCBwcm90bzogdHJ1ZSwgZm9yY2VkOiBGT1JDRUQgfSwge1xuICBqb2luOiBmdW5jdGlvbiBqb2luKHNlcGFyYXRvcikge1xuICAgIHJldHVybiBuYXRpdmVKb2luKHRvSW5kZXhlZE9iamVjdCh0aGlzKSwgc2VwYXJhdG9yID09PSB1bmRlZmluZWQgPyAnLCcgOiBzZXBhcmF0b3IpO1xuICB9XG59KTtcbiIsIid1c2Ugc3RyaWN0JztcbnZhciAkID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2V4cG9ydCcpO1xudmFyICR0cmltID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL3N0cmluZy10cmltJykudHJpbTtcbnZhciBmb3JjZWRTdHJpbmdUcmltTWV0aG9kID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL3N0cmluZy10cmltLWZvcmNlZCcpO1xuXG4vLyBgU3RyaW5nLnByb3RvdHlwZS50cmltYCBtZXRob2Rcbi8vIGh0dHBzOi8vdGMzOS5lcy9lY21hMjYyLyNzZWMtc3RyaW5nLnByb3RvdHlwZS50cmltXG4kKHsgdGFyZ2V0OiAnU3RyaW5nJywgcHJvdG86IHRydWUsIGZvcmNlZDogZm9yY2VkU3RyaW5nVHJpbU1ldGhvZCgndHJpbScpIH0sIHtcbiAgdHJpbTogZnVuY3Rpb24gdHJpbSgpIHtcbiAgICByZXR1cm4gJHRyaW0odGhpcyk7XG4gIH1cbn0pO1xuIl0sIm5hbWVzIjpbImJ0bkJhY2siLCJkb2N1bWVudCIsInF1ZXJ5U2VsZWN0b3IiLCJhZGRFdmVudExpc3RlbmVyIiwiYXVkaW8iLCJnZXRFbGVtZW50QnlJZCIsInBsYXkiLCJjbGFzc0xpc3QiLCJhZGQiLCJkb3NzaWVyc19hc3NpZ25WcnAiLCJkb3NzaWVyc19kcHQiLCJlIiwicHJldmVudERlZmF1bHQiLCJkb3NzaWVyR2VuZXJlciIsInJlc2V0IiwiZG9zc2llcnNfdHlwZUZldSIsImRvc3NpZXJzX2RhdGVUaXIiLCJkb3NzaWVyc19tb250YW50IiwiYXNzaWduVnJwIiwic2VsZWN0Q2xpZW50IiwicmVtb3ZlIiwiaW5uZXJUZXh0IiwicGVyc29ubmVsSW5wdXQiLCJwZXJzb25uZWxWYWx1ZUlucHV0IiwicGVyc29ubmVsQnRuU3VibWl0IiwiaWNvbkRlbGV0ZSIsIm5iUGVyc29ubmVsSW5wdXQiLCJ1cGRhdGVOYlBlcnNvbm5lbCIsInBlcnNvbm5lbFZhbHVlcyIsInZhbHVlIiwic3BsaXQiLCJsZW5ndGgiLCJldmVudCIsInRyaW0iLCJzdG9wUHJvcGFnYXRpb24iLCJjdXJyZW50VmFsdWVzIiwicG9wIiwiam9pbiIsImZvcm0iLCJmZXUiLCJhc3NpZ25WcnBGaWVsZCIsInR5cGVGZXVGaWVsZCIsImRhdGVUaXJGaWVsZCIsImRlcGFydGVtZW50RmllbGQiLCJmb3JFYWNoIiwiZmllbGQiLCJoYXNBdHRyaWJ1dGUiLCJyZW1vdmVBdHRyaWJ1dGUiLCJ0b29sdGlwIiwiYm9vdHN0cmFwIiwiVG9vbHRpcCIsImdldEluc3RhbmNlIiwiZGlzcG9zZSIsImZpZWxkcyIsImVycm9yTWVzc2FnZSIsIl9yZWYiLCJvZmZzZXRQYXJlbnQiLCJzZWxlY3RlZEluZGV4Iiwic2V0QXR0cmlidXRlIiwibm9tVnJwIiwibW9udGFudEZpZWxkIiwic2VsZWN0ZWRPcHRpb24iLCJvcHRpb25zIiwiaW5uZXJIVE1MIiwidXBkYXRlQm94U2hhZG93Il0sInNvdXJjZVJvb3QiOiIifQ==