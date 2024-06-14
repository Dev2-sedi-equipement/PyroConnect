(self["webpackChunk"] = self["webpackChunk"] || []).push([["personnelTir"],{

/***/ "./assets/js/personnelTir.js":
/*!***********************************!*\
  !*** ./assets/js/personnelTir.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

__webpack_require__(/*! core-js/modules/es.string.trim.js */ "./node_modules/core-js/modules/es.string.trim.js");
__webpack_require__(/*! core-js/modules/es.array.join.js */ "./node_modules/core-js/modules/es.array.join.js");
//const personnelInput = document.getElementById("dossiers_edit_nomPersonnel");

var personnelValueInput = document.getElementById("personnelValue");
var personnelBtnSubmit = document.getElementById("personnelBtnSubmit");
var iconDelete = document.getElementById("icon-delete");
var nbPersonnelInput = document.getElementById("dossiers_edit_nbPersonnel");

// Fonction pour mettre à jour le nombre de personnels
function updateNbPersonnel() {
  // Séparer les valeurs actuelles par une virgule
  var personnelValues = nbPersonnelInput.value.split(", ");
  // Mettre à jour le champ de nombre de personnels avec la longueur du tableau
  nbPersonnelInput.value = personnelValues.length;
}

// Ajouter un écouteur d'événements sur le bouton de soumission
personnelBtnSubmit.addEventListener("click", function (event) {
  event.preventDefault();
  var value = personnelValueInput.value.trim();
  if (value !== "") {
    // Ajouter la valeur à l'input readonly
    nbPersonnelInput.value += (nbPersonnelInput.value ? ", " : "") + value;
    // Effacer la valeur saisie
    personnelValueInput.value = "";
    // Mettre à jour le nombre de personnels
    updateNbPersonnel();
    // Empêcher la propagation de l'événement de clic pour éviter la fermeture du dropdown
    event.stopPropagation();
  }
});

// Ajouter un écouteur d'événements sur l'icône de suppression
iconDelete.addEventListener("click", function (event) {
  // Récupérer les valeurs actuelles dans l'input readonly
  var currentValues = nbPersonnelInput.value.split(", ");
  // Supprimer la dernière valeur ajoutée
  currentValues.pop();
  // Mettre à jour l'input readonly avec les valeurs restantes
  nbPersonnelInput.value = currentValues.join(", ");
  // Mettre à jour le nombre de personnels
  updateNbPersonnel();
  // Si la liste des valeurs personnelles est vide, mettre à jour nbPersonnelInput à 0
  if (currentValues.length === 0) {
    nbPersonnelInput.value = 0;
  }
  // Empêcher la propagation de l'événement de clic pour éviter la fermeture du dropdown
  event.stopPropagation();
});

/***/ }),

/***/ "./node_modules/core-js/internals/array-method-is-strict.js":
/*!******************************************************************!*\
  !*** ./node_modules/core-js/internals/array-method-is-strict.js ***!
  \******************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";

var fails = __webpack_require__(/*! ../internals/fails */ "./node_modules/core-js/internals/fails.js");

module.exports = function (METHOD_NAME, argument) {
  var method = [][METHOD_NAME];
  return !!method && fails(function () {
    // eslint-disable-next-line no-useless-call -- required for testing
    method.call(null, argument || function () { return 1; }, 1);
  });
};


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
/******/ __webpack_require__.O(0, ["vendors-node_modules_core-js_internals_define-built-in_js","vendors-node_modules_core-js_internals_classof_js-node_modules_core-js_internals_export_js"], () => (__webpack_exec__("./assets/js/personnelTir.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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N0M7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7Ozs7Ozs7Ozs7QUM5QmE7QUFDYixjQUFjLG1CQUFPLENBQUMseUVBQXNCOztBQUU1Qzs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7Ozs7Ozs7Ozs7O0FDUmE7QUFDYjtBQUNBO0FBQ0E7Ozs7Ozs7Ozs7OztBQ0hhO0FBQ2IsUUFBUSxtQkFBTyxDQUFDLHVFQUFxQjtBQUNyQyxrQkFBa0IsbUJBQU8sQ0FBQyxxR0FBb0M7QUFDOUQsb0JBQW9CLG1CQUFPLENBQUMsdUZBQTZCO0FBQ3pELHNCQUFzQixtQkFBTyxDQUFDLDZGQUFnQztBQUM5RCwwQkFBMEIsbUJBQU8sQ0FBQyx1R0FBcUM7O0FBRXZFOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLElBQUksOENBQThDO0FBQ2xEO0FBQ0E7QUFDQTtBQUNBLENBQUM7Ozs7Ozs7Ozs7OztBQ2xCWTtBQUNiLFFBQVEsbUJBQU8sQ0FBQyx1RUFBcUI7QUFDckMsWUFBWSw2R0FBd0M7QUFDcEQsNkJBQTZCLG1CQUFPLENBQUMsK0ZBQWlDOztBQUV0RTtBQUNBO0FBQ0EsSUFBSSx1RUFBdUU7QUFDM0U7QUFDQTtBQUNBO0FBQ0EsQ0FBQyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL2Fzc2V0cy9qcy9wZXJzb25uZWxUaXIuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2NvcmUtanMvaW50ZXJuYWxzL2FycmF5LW1ldGhvZC1pcy1zdHJpY3QuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2NvcmUtanMvaW50ZXJuYWxzL3N0cmluZy10cmltLWZvcmNlZC5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvY29yZS1qcy9pbnRlcm5hbHMvc3RyaW5nLXRyaW0uanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2NvcmUtanMvaW50ZXJuYWxzL3RvLXN0cmluZy5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvY29yZS1qcy9pbnRlcm5hbHMvd2hpdGVzcGFjZXMuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2NvcmUtanMvbW9kdWxlcy9lcy5hcnJheS5qb2luLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9jb3JlLWpzL21vZHVsZXMvZXMuc3RyaW5nLnRyaW0uanMiXSwic291cmNlc0NvbnRlbnQiOlsiXG4vL2NvbnN0IHBlcnNvbm5lbElucHV0ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJkb3NzaWVyc19lZGl0X25vbVBlcnNvbm5lbFwiKTtcblxuY29uc3QgcGVyc29ubmVsVmFsdWVJbnB1dCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwicGVyc29ubmVsVmFsdWVcIik7XG5cbmNvbnN0IHBlcnNvbm5lbEJ0blN1Ym1pdCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwicGVyc29ubmVsQnRuU3VibWl0XCIpO1xuXG5jb25zdCBpY29uRGVsZXRlID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJpY29uLWRlbGV0ZVwiKTtcblxuY29uc3QgbmJQZXJzb25uZWxJbnB1dCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwiZG9zc2llcnNfZWRpdF9uYlBlcnNvbm5lbFwiKTsgXG5cblxuXG4vLyBGb25jdGlvbiBwb3VyIG1ldHRyZSDDoCBqb3VyIGxlIG5vbWJyZSBkZSBwZXJzb25uZWxzXG5mdW5jdGlvbiB1cGRhdGVOYlBlcnNvbm5lbCgpIHtcbiAgICAvLyBTw6lwYXJlciBsZXMgdmFsZXVycyBhY3R1ZWxsZXMgcGFyIHVuZSB2aXJndWxlXG4gICAgY29uc3QgcGVyc29ubmVsVmFsdWVzID0gbmJQZXJzb25uZWxJbnB1dC52YWx1ZS5zcGxpdChcIiwgXCIpO1xuICAgIC8vIE1ldHRyZSDDoCBqb3VyIGxlIGNoYW1wIGRlIG5vbWJyZSBkZSBwZXJzb25uZWxzIGF2ZWMgbGEgbG9uZ3VldXIgZHUgdGFibGVhdVxuICAgIG5iUGVyc29ubmVsSW5wdXQudmFsdWUgPSBwZXJzb25uZWxWYWx1ZXMubGVuZ3RoO1xufVxuXG4vLyBBam91dGVyIHVuIMOpY291dGV1ciBkJ8OpdsOpbmVtZW50cyBzdXIgbGUgYm91dG9uIGRlIHNvdW1pc3Npb25cbnBlcnNvbm5lbEJ0blN1Ym1pdC5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgZnVuY3Rpb24oZXZlbnQpIHtcbiAgICBldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIGNvbnN0IHZhbHVlID0gcGVyc29ubmVsVmFsdWVJbnB1dC52YWx1ZS50cmltKCk7XG4gICAgaWYgKHZhbHVlICE9PSBcIlwiKSB7XG4gICAgICAgIC8vIEFqb3V0ZXIgbGEgdmFsZXVyIMOgIGwnaW5wdXQgcmVhZG9ubHlcbiAgICAgICAgbmJQZXJzb25uZWxJbnB1dC52YWx1ZSArPSAobmJQZXJzb25uZWxJbnB1dC52YWx1ZSA/IFwiLCBcIiA6IFwiXCIpICsgdmFsdWU7XG4gICAgICAgIC8vIEVmZmFjZXIgbGEgdmFsZXVyIHNhaXNpZVxuICAgICAgICBwZXJzb25uZWxWYWx1ZUlucHV0LnZhbHVlID0gXCJcIjtcbiAgICAgICAgLy8gTWV0dHJlIMOgIGpvdXIgbGUgbm9tYnJlIGRlIHBlcnNvbm5lbHNcbiAgICAgICAgdXBkYXRlTmJQZXJzb25uZWwoKTtcbiAgICAgICAgLy8gRW1ww6pjaGVyIGxhIHByb3BhZ2F0aW9uIGRlIGwnw6l2w6luZW1lbnQgZGUgY2xpYyBwb3VyIMOpdml0ZXIgbGEgZmVybWV0dXJlIGR1IGRyb3Bkb3duXG4gICAgICAgIGV2ZW50LnN0b3BQcm9wYWdhdGlvbigpO1xuICAgIH1cbn0pO1xuXG4vLyBBam91dGVyIHVuIMOpY291dGV1ciBkJ8OpdsOpbmVtZW50cyBzdXIgbCdpY8O0bmUgZGUgc3VwcHJlc3Npb25cbmljb25EZWxldGUuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIGZ1bmN0aW9uKGV2ZW50KSB7XG4gICAgLy8gUsOpY3Vww6lyZXIgbGVzIHZhbGV1cnMgYWN0dWVsbGVzIGRhbnMgbCdpbnB1dCByZWFkb25seVxuICAgIGxldCBjdXJyZW50VmFsdWVzID0gbmJQZXJzb25uZWxJbnB1dC52YWx1ZS5zcGxpdChcIiwgXCIpO1xuICAgIC8vIFN1cHByaW1lciBsYSBkZXJuacOocmUgdmFsZXVyIGFqb3V0w6llXG4gICAgY3VycmVudFZhbHVlcy5wb3AoKTtcbiAgICAvLyBNZXR0cmUgw6Agam91ciBsJ2lucHV0IHJlYWRvbmx5IGF2ZWMgbGVzIHZhbGV1cnMgcmVzdGFudGVzXG4gICAgbmJQZXJzb25uZWxJbnB1dC52YWx1ZSA9IGN1cnJlbnRWYWx1ZXMuam9pbihcIiwgXCIpO1xuICAgIC8vIE1ldHRyZSDDoCBqb3VyIGxlIG5vbWJyZSBkZSBwZXJzb25uZWxzXG4gICAgdXBkYXRlTmJQZXJzb25uZWwoKTtcbiAgICAvLyBTaSBsYSBsaXN0ZSBkZXMgdmFsZXVycyBwZXJzb25uZWxsZXMgZXN0IHZpZGUsIG1ldHRyZSDDoCBqb3VyIG5iUGVyc29ubmVsSW5wdXQgw6AgMFxuICAgIGlmIChjdXJyZW50VmFsdWVzLmxlbmd0aCA9PT0gMCkge1xuICAgICAgICBuYlBlcnNvbm5lbElucHV0LnZhbHVlID0gMDtcbiAgICB9XG4gICAgLy8gRW1ww6pjaGVyIGxhIHByb3BhZ2F0aW9uIGRlIGwnw6l2w6luZW1lbnQgZGUgY2xpYyBwb3VyIMOpdml0ZXIgbGEgZmVybWV0dXJlIGR1IGRyb3Bkb3duXG4gICAgZXZlbnQuc3RvcFByb3BhZ2F0aW9uKCk7XG59KTtcblxuIiwiJ3VzZSBzdHJpY3QnO1xudmFyIGZhaWxzID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2ZhaWxzJyk7XG5cbm1vZHVsZS5leHBvcnRzID0gZnVuY3Rpb24gKE1FVEhPRF9OQU1FLCBhcmd1bWVudCkge1xuICB2YXIgbWV0aG9kID0gW11bTUVUSE9EX05BTUVdO1xuICByZXR1cm4gISFtZXRob2QgJiYgZmFpbHMoZnVuY3Rpb24gKCkge1xuICAgIC8vIGVzbGludC1kaXNhYmxlLW5leHQtbGluZSBuby11c2VsZXNzLWNhbGwgLS0gcmVxdWlyZWQgZm9yIHRlc3RpbmdcbiAgICBtZXRob2QuY2FsbChudWxsLCBhcmd1bWVudCB8fCBmdW5jdGlvbiAoKSB7IHJldHVybiAxOyB9LCAxKTtcbiAgfSk7XG59O1xuIiwiJ3VzZSBzdHJpY3QnO1xudmFyIFBST1BFUl9GVU5DVElPTl9OQU1FID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2Z1bmN0aW9uLW5hbWUnKS5QUk9QRVI7XG52YXIgZmFpbHMgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZmFpbHMnKTtcbnZhciB3aGl0ZXNwYWNlcyA9IHJlcXVpcmUoJy4uL2ludGVybmFscy93aGl0ZXNwYWNlcycpO1xuXG52YXIgbm9uID0gJ1xcdTIwMEJcXHUwMDg1XFx1MTgwRSc7XG5cbi8vIGNoZWNrIHRoYXQgYSBtZXRob2Qgd29ya3Mgd2l0aCB0aGUgY29ycmVjdCBsaXN0XG4vLyBvZiB3aGl0ZXNwYWNlcyBhbmQgaGFzIGEgY29ycmVjdCBuYW1lXG5tb2R1bGUuZXhwb3J0cyA9IGZ1bmN0aW9uIChNRVRIT0RfTkFNRSkge1xuICByZXR1cm4gZmFpbHMoZnVuY3Rpb24gKCkge1xuICAgIHJldHVybiAhIXdoaXRlc3BhY2VzW01FVEhPRF9OQU1FXSgpXG4gICAgICB8fCBub25bTUVUSE9EX05BTUVdKCkgIT09IG5vblxuICAgICAgfHwgKFBST1BFUl9GVU5DVElPTl9OQU1FICYmIHdoaXRlc3BhY2VzW01FVEhPRF9OQU1FXS5uYW1lICE9PSBNRVRIT0RfTkFNRSk7XG4gIH0pO1xufTtcbiIsIid1c2Ugc3RyaWN0JztcbnZhciB1bmN1cnJ5VGhpcyA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9mdW5jdGlvbi11bmN1cnJ5LXRoaXMnKTtcbnZhciByZXF1aXJlT2JqZWN0Q29lcmNpYmxlID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL3JlcXVpcmUtb2JqZWN0LWNvZXJjaWJsZScpO1xudmFyIHRvU3RyaW5nID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL3RvLXN0cmluZycpO1xudmFyIHdoaXRlc3BhY2VzID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL3doaXRlc3BhY2VzJyk7XG5cbnZhciByZXBsYWNlID0gdW5jdXJyeVRoaXMoJycucmVwbGFjZSk7XG52YXIgbHRyaW0gPSBSZWdFeHAoJ15bJyArIHdoaXRlc3BhY2VzICsgJ10rJyk7XG52YXIgcnRyaW0gPSBSZWdFeHAoJyhefFteJyArIHdoaXRlc3BhY2VzICsgJ10pWycgKyB3aGl0ZXNwYWNlcyArICddKyQnKTtcblxuLy8gYFN0cmluZy5wcm90b3R5cGUueyB0cmltLCB0cmltU3RhcnQsIHRyaW1FbmQsIHRyaW1MZWZ0LCB0cmltUmlnaHQgfWAgbWV0aG9kcyBpbXBsZW1lbnRhdGlvblxudmFyIGNyZWF0ZU1ldGhvZCA9IGZ1bmN0aW9uIChUWVBFKSB7XG4gIHJldHVybiBmdW5jdGlvbiAoJHRoaXMpIHtcbiAgICB2YXIgc3RyaW5nID0gdG9TdHJpbmcocmVxdWlyZU9iamVjdENvZXJjaWJsZSgkdGhpcykpO1xuICAgIGlmIChUWVBFICYgMSkgc3RyaW5nID0gcmVwbGFjZShzdHJpbmcsIGx0cmltLCAnJyk7XG4gICAgaWYgKFRZUEUgJiAyKSBzdHJpbmcgPSByZXBsYWNlKHN0cmluZywgcnRyaW0sICckMScpO1xuICAgIHJldHVybiBzdHJpbmc7XG4gIH07XG59O1xuXG5tb2R1bGUuZXhwb3J0cyA9IHtcbiAgLy8gYFN0cmluZy5wcm90b3R5cGUueyB0cmltTGVmdCwgdHJpbVN0YXJ0IH1gIG1ldGhvZHNcbiAgLy8gaHR0cHM6Ly90YzM5LmVzL2VjbWEyNjIvI3NlYy1zdHJpbmcucHJvdG90eXBlLnRyaW1zdGFydFxuICBzdGFydDogY3JlYXRlTWV0aG9kKDEpLFxuICAvLyBgU3RyaW5nLnByb3RvdHlwZS57IHRyaW1SaWdodCwgdHJpbUVuZCB9YCBtZXRob2RzXG4gIC8vIGh0dHBzOi8vdGMzOS5lcy9lY21hMjYyLyNzZWMtc3RyaW5nLnByb3RvdHlwZS50cmltZW5kXG4gIGVuZDogY3JlYXRlTWV0aG9kKDIpLFxuICAvLyBgU3RyaW5nLnByb3RvdHlwZS50cmltYCBtZXRob2RcbiAgLy8gaHR0cHM6Ly90YzM5LmVzL2VjbWEyNjIvI3NlYy1zdHJpbmcucHJvdG90eXBlLnRyaW1cbiAgdHJpbTogY3JlYXRlTWV0aG9kKDMpXG59O1xuIiwiJ3VzZSBzdHJpY3QnO1xudmFyIGNsYXNzb2YgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvY2xhc3NvZicpO1xuXG52YXIgJFN0cmluZyA9IFN0cmluZztcblxubW9kdWxlLmV4cG9ydHMgPSBmdW5jdGlvbiAoYXJndW1lbnQpIHtcbiAgaWYgKGNsYXNzb2YoYXJndW1lbnQpID09PSAnU3ltYm9sJykgdGhyb3cgbmV3IFR5cGVFcnJvcignQ2Fubm90IGNvbnZlcnQgYSBTeW1ib2wgdmFsdWUgdG8gYSBzdHJpbmcnKTtcbiAgcmV0dXJuICRTdHJpbmcoYXJndW1lbnQpO1xufTtcbiIsIid1c2Ugc3RyaWN0Jztcbi8vIGEgc3RyaW5nIG9mIGFsbCB2YWxpZCB1bmljb2RlIHdoaXRlc3BhY2VzXG5tb2R1bGUuZXhwb3J0cyA9ICdcXHUwMDA5XFx1MDAwQVxcdTAwMEJcXHUwMDBDXFx1MDAwRFxcdTAwMjBcXHUwMEEwXFx1MTY4MFxcdTIwMDBcXHUyMDAxXFx1MjAwMicgK1xuICAnXFx1MjAwM1xcdTIwMDRcXHUyMDA1XFx1MjAwNlxcdTIwMDdcXHUyMDA4XFx1MjAwOVxcdTIwMEFcXHUyMDJGXFx1MjA1RlxcdTMwMDBcXHUyMDI4XFx1MjAyOVxcdUZFRkYnO1xuIiwiJ3VzZSBzdHJpY3QnO1xudmFyICQgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZXhwb3J0Jyk7XG52YXIgdW5jdXJyeVRoaXMgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZnVuY3Rpb24tdW5jdXJyeS10aGlzJyk7XG52YXIgSW5kZXhlZE9iamVjdCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9pbmRleGVkLW9iamVjdCcpO1xudmFyIHRvSW5kZXhlZE9iamVjdCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy90by1pbmRleGVkLW9iamVjdCcpO1xudmFyIGFycmF5TWV0aG9kSXNTdHJpY3QgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvYXJyYXktbWV0aG9kLWlzLXN0cmljdCcpO1xuXG52YXIgbmF0aXZlSm9pbiA9IHVuY3VycnlUaGlzKFtdLmpvaW4pO1xuXG52YXIgRVMzX1NUUklOR1MgPSBJbmRleGVkT2JqZWN0ICE9PSBPYmplY3Q7XG52YXIgRk9SQ0VEID0gRVMzX1NUUklOR1MgfHwgIWFycmF5TWV0aG9kSXNTdHJpY3QoJ2pvaW4nLCAnLCcpO1xuXG4vLyBgQXJyYXkucHJvdG90eXBlLmpvaW5gIG1ldGhvZFxuLy8gaHR0cHM6Ly90YzM5LmVzL2VjbWEyNjIvI3NlYy1hcnJheS5wcm90b3R5cGUuam9pblxuJCh7IHRhcmdldDogJ0FycmF5JywgcHJvdG86IHRydWUsIGZvcmNlZDogRk9SQ0VEIH0sIHtcbiAgam9pbjogZnVuY3Rpb24gam9pbihzZXBhcmF0b3IpIHtcbiAgICByZXR1cm4gbmF0aXZlSm9pbih0b0luZGV4ZWRPYmplY3QodGhpcyksIHNlcGFyYXRvciA9PT0gdW5kZWZpbmVkID8gJywnIDogc2VwYXJhdG9yKTtcbiAgfVxufSk7XG4iLCIndXNlIHN0cmljdCc7XG52YXIgJCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9leHBvcnQnKTtcbnZhciAkdHJpbSA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9zdHJpbmctdHJpbScpLnRyaW07XG52YXIgZm9yY2VkU3RyaW5nVHJpbU1ldGhvZCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9zdHJpbmctdHJpbS1mb3JjZWQnKTtcblxuLy8gYFN0cmluZy5wcm90b3R5cGUudHJpbWAgbWV0aG9kXG4vLyBodHRwczovL3RjMzkuZXMvZWNtYTI2Mi8jc2VjLXN0cmluZy5wcm90b3R5cGUudHJpbVxuJCh7IHRhcmdldDogJ1N0cmluZycsIHByb3RvOiB0cnVlLCBmb3JjZWQ6IGZvcmNlZFN0cmluZ1RyaW1NZXRob2QoJ3RyaW0nKSB9LCB7XG4gIHRyaW06IGZ1bmN0aW9uIHRyaW0oKSB7XG4gICAgcmV0dXJuICR0cmltKHRoaXMpO1xuICB9XG59KTtcbiJdLCJuYW1lcyI6WyJwZXJzb25uZWxWYWx1ZUlucHV0IiwiZG9jdW1lbnQiLCJnZXRFbGVtZW50QnlJZCIsInBlcnNvbm5lbEJ0blN1Ym1pdCIsImljb25EZWxldGUiLCJuYlBlcnNvbm5lbElucHV0IiwidXBkYXRlTmJQZXJzb25uZWwiLCJwZXJzb25uZWxWYWx1ZXMiLCJ2YWx1ZSIsInNwbGl0IiwibGVuZ3RoIiwiYWRkRXZlbnRMaXN0ZW5lciIsImV2ZW50IiwicHJldmVudERlZmF1bHQiLCJ0cmltIiwic3RvcFByb3BhZ2F0aW9uIiwiY3VycmVudFZhbHVlcyIsInBvcCIsImpvaW4iXSwic291cmNlUm9vdCI6IiJ9