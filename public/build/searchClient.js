(self["webpackChunk"] = self["webpackChunk"] || []).push([["searchClient"],{

/***/ "./assets/js/searchClient.js":
/*!***********************************!*\
  !*** ./assets/js/searchClient.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

__webpack_require__(/*! core-js/modules/es.array.for-each.js */ "./node_modules/core-js/modules/es.array.for-each.js");
__webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
__webpack_require__(/*! core-js/modules/web.dom-collections.for-each.js */ "./node_modules/core-js/modules/web.dom-collections.for-each.js");
__webpack_require__(/*! core-js/modules/es.string.trim.js */ "./node_modules/core-js/modules/es.string.trim.js");
__webpack_require__(/*! core-js/modules/web.timers.js */ "./node_modules/core-js/modules/web.timers.js");
__webpack_require__(/*! core-js/modules/es.object.keys.js */ "./node_modules/core-js/modules/es.object.keys.js");
var timeoutId;
var searchCache = {}; // Objet pour stocker les résultats en cache

// Fonction pour effacer le contenu des autres champs de recherche
function clearOtherSearchFields(currentFieldId) {
  var fieldIds = ['searchVille', 'searchName', 'searchCodeClient'];
  fieldIds.forEach(function (fieldId) {
    if (fieldId !== currentFieldId) {
      document.getElementById(fieldId).value = '';
    }
  });
}

// Fonction pour sélectionner les éléments du dropdown
function selectDropdownItems() {
  var dropdownItems = document.querySelectorAll('#searchClientUl .dropdown-item');
  dropdownItems.forEach(function (item) {
    item.addEventListener('click', function () {
      var clientId = item.getAttribute('data-id');
      var dataName = item.getAttribute('data-name');
      var dataDpt = item.getAttribute('data-dpt');
      var dataInsee = item.getAttribute('data-insee');
      var dataVrp = item.getAttribute('data-vrp');
      var dossiersClientId = document.getElementById('dossiers_clientId');
      var dossiersDpt = document.getElementById('dossiers_dpt');
      var selectClient = document.getElementById('selectClient');
      var dossiersNomVrp = document.getElementById('dossiers_nomVrp');
      var dossiersDataName = document.getElementById('dossiers_data_name');
      var dossiersUserId = document.getElementById('dossiers_userId');
      var dossiersAssignVrp = document.getElementById('dossiers_assignVrp');
      dossiersClientId.value = clientId;
      dossiersDpt.value = dataDpt;
      dossiersDpt.classList.add("success-style");
      selectClient.innerHTML = "Client sélectionné : " + dataName + " | Code Insee : " + dataInsee;
      dossiersNomVrp.value = dossiersAssignVrp.options[dossiersAssignVrp.selectedIndex].text;
      dossiersDataName.value = dataName;
      dossiersUserId.value = dataVrp;
      dossiersAssignVrp.value = dataVrp.trim();
      dossiersAssignVrp.classList.add("success-style");
    });
  });
}

// Fonction pour effectuer une requête AJAX et mettre à jour le dropdown
function handleInput(inputId, endpoint) {
  clearOtherSearchFields(inputId);
  clearTimeout(timeoutId);
  timeoutId = setTimeout(function () {
    var searchTerm = document.getElementById(inputId).value.trim();

    // Vérifier si le résultat est en cache
    var cacheKey = endpoint + '?' + searchTerm;
    if (searchCache[cacheKey]) {
      updateDropdown(searchCache[cacheKey]);
    } else {
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            searchCache[cacheKey] = data; // Stocker les résultats en cache
            updateDropdown(data);
          } else {
            console.error('Une erreur est survenue lors de la requête AJAX');
          }
        }
      };
      xhr.open('GET', endpoint + '?search_term=' + encodeURIComponent(searchTerm), true);
      xhr.send();
    }
  }, 800);
}

// Fonction pour mettre à jour le dropdown
function updateDropdown(data) {
  var options = '';
  if (data.length === 0) {
    options += '<li class="p-3" style="max-width: 524px;"><span class="" href="#">Aucun client trouvé</span></li>';
  } else {
    data.forEach(function (client) {
      var nomClient = client.nom !== '' ? client.nom + ' - Département : ' + client.codeDpt : 'Aucun client trouvé';
      var ville = " | Ville : " + client.ville;
      options += '<li style="max-width: 524px;"><a style="text-wrap: wrap;" class="dropdown-item" href="#" data-id="' + client.id + '" data-name="' + client.nom + '" data-dpt="' + client.codeDpt + '" data-insee="' + client.codeInsee + '" data-vrp="' + client.userId + '" data-ville="' + client.ville + '">' + nomClient + ville + '</a></li>';
    });
  }
  var dropdownList = document.querySelector('#searchClientUl');
  if (dropdownList) {
    dropdownList.innerHTML = options;
  }
  selectDropdownItems();
  var dropdown = document.querySelector('.dropdown');
  dropdown.classList.add('show');
}

// Récupérer le rôle de l'utilisateur
var roleUser = document.getElementById("roleUser");
if (roleUser.innerHTML === "Vrp") {
  // Routes pour les autres rôles
  document.getElementById('searchVille').addEventListener('input', function () {
    handleInput('searchVille', '/searchVille');
  });
  document.getElementById('searchName').addEventListener('input', function () {
    handleInput('searchName', '/searchClient');
  });
  document.getElementById('searchCodeClient').addEventListener('input', function () {
    handleInput('searchCodeClient', '/searchC0');
  });
  document.getElementById('dropdownSelectClient').addEventListener('click', function () {
    handleInput('searchVille', '/searchVille');
  });
} else {
  // Routes pour le rôle de Vrp
  document.getElementById('searchName').addEventListener('input', function () {
    handleInput('searchName', '/searchClientSf');
  });
  document.getElementById('searchVille').addEventListener('input', function () {
    handleInput('searchVille', '/searchVilleSf');
  });
  document.getElementById('searchCodeClient').addEventListener('input', function () {
    handleInput('searchCodeClient', '/searchC0Sf');
  });
  document.getElementById('dropdownSelectClient').addEventListener('click', function () {
    handleInput('searchVille', '/searchVilleSf');
  });
}

/***/ }),

/***/ "./node_modules/core-js/internals/array-slice.js":
/*!*******************************************************!*\
  !*** ./node_modules/core-js/internals/array-slice.js ***!
  \*******************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";

var uncurryThis = __webpack_require__(/*! ../internals/function-uncurry-this */ "./node_modules/core-js/internals/function-uncurry-this.js");

module.exports = uncurryThis([].slice);


/***/ }),

/***/ "./node_modules/core-js/internals/engine-is-bun.js":
/*!*********************************************************!*\
  !*** ./node_modules/core-js/internals/engine-is-bun.js ***!
  \*********************************************************/
/***/ ((module) => {

"use strict";

/* global Bun -- Bun case */
module.exports = typeof Bun == 'function' && Bun && typeof Bun.version == 'string';


/***/ }),

/***/ "./node_modules/core-js/internals/function-apply.js":
/*!**********************************************************!*\
  !*** ./node_modules/core-js/internals/function-apply.js ***!
  \**********************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";

var NATIVE_BIND = __webpack_require__(/*! ../internals/function-bind-native */ "./node_modules/core-js/internals/function-bind-native.js");

var FunctionPrototype = Function.prototype;
var apply = FunctionPrototype.apply;
var call = FunctionPrototype.call;

// eslint-disable-next-line es/no-reflect -- safe
module.exports = typeof Reflect == 'object' && Reflect.apply || (NATIVE_BIND ? call.bind(apply) : function () {
  return call.apply(apply, arguments);
});


/***/ }),

/***/ "./node_modules/core-js/internals/object-keys.js":
/*!*******************************************************!*\
  !*** ./node_modules/core-js/internals/object-keys.js ***!
  \*******************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";

var internalObjectKeys = __webpack_require__(/*! ../internals/object-keys-internal */ "./node_modules/core-js/internals/object-keys-internal.js");
var enumBugKeys = __webpack_require__(/*! ../internals/enum-bug-keys */ "./node_modules/core-js/internals/enum-bug-keys.js");

// `Object.keys` method
// https://tc39.es/ecma262/#sec-object.keys
// eslint-disable-next-line es/no-object-keys -- safe
module.exports = Object.keys || function keys(O) {
  return internalObjectKeys(O, enumBugKeys);
};


/***/ }),

/***/ "./node_modules/core-js/internals/schedulers-fix.js":
/*!**********************************************************!*\
  !*** ./node_modules/core-js/internals/schedulers-fix.js ***!
  \**********************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";

var global = __webpack_require__(/*! ../internals/global */ "./node_modules/core-js/internals/global.js");
var apply = __webpack_require__(/*! ../internals/function-apply */ "./node_modules/core-js/internals/function-apply.js");
var isCallable = __webpack_require__(/*! ../internals/is-callable */ "./node_modules/core-js/internals/is-callable.js");
var ENGINE_IS_BUN = __webpack_require__(/*! ../internals/engine-is-bun */ "./node_modules/core-js/internals/engine-is-bun.js");
var USER_AGENT = __webpack_require__(/*! ../internals/engine-user-agent */ "./node_modules/core-js/internals/engine-user-agent.js");
var arraySlice = __webpack_require__(/*! ../internals/array-slice */ "./node_modules/core-js/internals/array-slice.js");
var validateArgumentsLength = __webpack_require__(/*! ../internals/validate-arguments-length */ "./node_modules/core-js/internals/validate-arguments-length.js");

var Function = global.Function;
// dirty IE9- and Bun 0.3.0- checks
var WRAP = /MSIE .\./.test(USER_AGENT) || ENGINE_IS_BUN && (function () {
  var version = global.Bun.version.split('.');
  return version.length < 3 || version[0] === '0' && (version[1] < 3 || version[1] === '3' && version[2] === '0');
})();

// IE9- / Bun 0.3.0- setTimeout / setInterval / setImmediate additional parameters fix
// https://html.spec.whatwg.org/multipage/timers-and-user-prompts.html#timers
// https://github.com/oven-sh/bun/issues/1633
module.exports = function (scheduler, hasTimeArg) {
  var firstParamIndex = hasTimeArg ? 2 : 1;
  return WRAP ? function (handler, timeout /* , ...arguments */) {
    var boundArgs = validateArgumentsLength(arguments.length, 1) > firstParamIndex;
    var fn = isCallable(handler) ? handler : Function(handler);
    var params = boundArgs ? arraySlice(arguments, firstParamIndex) : [];
    var callback = boundArgs ? function () {
      apply(fn, this, params);
    } : fn;
    return hasTimeArg ? scheduler(callback, timeout) : scheduler(callback);
  } : scheduler;
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

/***/ "./node_modules/core-js/internals/validate-arguments-length.js":
/*!*********************************************************************!*\
  !*** ./node_modules/core-js/internals/validate-arguments-length.js ***!
  \*********************************************************************/
/***/ ((module) => {

"use strict";

var $TypeError = TypeError;

module.exports = function (passed, required) {
  if (passed < required) throw new $TypeError('Not enough arguments');
  return passed;
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

/***/ "./node_modules/core-js/modules/es.object.keys.js":
/*!********************************************************!*\
  !*** ./node_modules/core-js/modules/es.object.keys.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

"use strict";

var $ = __webpack_require__(/*! ../internals/export */ "./node_modules/core-js/internals/export.js");
var toObject = __webpack_require__(/*! ../internals/to-object */ "./node_modules/core-js/internals/to-object.js");
var nativeKeys = __webpack_require__(/*! ../internals/object-keys */ "./node_modules/core-js/internals/object-keys.js");
var fails = __webpack_require__(/*! ../internals/fails */ "./node_modules/core-js/internals/fails.js");

var FAILS_ON_PRIMITIVES = fails(function () { nativeKeys(1); });

// `Object.keys` method
// https://tc39.es/ecma262/#sec-object.keys
$({ target: 'Object', stat: true, forced: FAILS_ON_PRIMITIVES }, {
  keys: function keys(it) {
    return nativeKeys(toObject(it));
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


/***/ }),

/***/ "./node_modules/core-js/modules/web.set-interval.js":
/*!**********************************************************!*\
  !*** ./node_modules/core-js/modules/web.set-interval.js ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

"use strict";

var $ = __webpack_require__(/*! ../internals/export */ "./node_modules/core-js/internals/export.js");
var global = __webpack_require__(/*! ../internals/global */ "./node_modules/core-js/internals/global.js");
var schedulersFix = __webpack_require__(/*! ../internals/schedulers-fix */ "./node_modules/core-js/internals/schedulers-fix.js");

var setInterval = schedulersFix(global.setInterval, true);

// Bun / IE9- setInterval additional parameters fix
// https://html.spec.whatwg.org/multipage/timers-and-user-prompts.html#dom-setinterval
$({ global: true, bind: true, forced: global.setInterval !== setInterval }, {
  setInterval: setInterval
});


/***/ }),

/***/ "./node_modules/core-js/modules/web.set-timeout.js":
/*!*********************************************************!*\
  !*** ./node_modules/core-js/modules/web.set-timeout.js ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

"use strict";

var $ = __webpack_require__(/*! ../internals/export */ "./node_modules/core-js/internals/export.js");
var global = __webpack_require__(/*! ../internals/global */ "./node_modules/core-js/internals/global.js");
var schedulersFix = __webpack_require__(/*! ../internals/schedulers-fix */ "./node_modules/core-js/internals/schedulers-fix.js");

var setTimeout = schedulersFix(global.setTimeout, true);

// Bun / IE9- setTimeout additional parameters fix
// https://html.spec.whatwg.org/multipage/timers-and-user-prompts.html#dom-settimeout
$({ global: true, bind: true, forced: global.setTimeout !== setTimeout }, {
  setTimeout: setTimeout
});


/***/ }),

/***/ "./node_modules/core-js/modules/web.timers.js":
/*!****************************************************!*\
  !*** ./node_modules/core-js/modules/web.timers.js ***!
  \****************************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

"use strict";

// TODO: Remove this module from `core-js@4` since it's split to modules listed below
__webpack_require__(/*! ../modules/web.set-interval */ "./node_modules/core-js/modules/web.set-interval.js");
__webpack_require__(/*! ../modules/web.set-timeout */ "./node_modules/core-js/modules/web.set-timeout.js");


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_core-js_internals_define-built-in_js","vendors-node_modules_core-js_internals_classof_js-node_modules_core-js_internals_export_js","vendors-node_modules_core-js_modules_es_array_for-each_js-node_modules_core-js_modules_es_obj-7bb33f"], () => (__webpack_exec__("./assets/js/searchClient.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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QUNBO0FBQ0EsQ0FBQzs7Ozs7Ozs7Ozs7O0FDWFk7QUFDYixRQUFRLG1CQUFPLENBQUMsdUVBQXFCO0FBQ3JDLGFBQWEsbUJBQU8sQ0FBQyx1RUFBcUI7QUFDMUMsb0JBQW9CLG1CQUFPLENBQUMsdUZBQTZCOztBQUV6RDs7QUFFQTtBQUNBO0FBQ0EsSUFBSSxzRUFBc0U7QUFDMUU7QUFDQSxDQUFDOzs7Ozs7Ozs7Ozs7QUNYWTtBQUNiLFFBQVEsbUJBQU8sQ0FBQyx1RUFBcUI7QUFDckMsYUFBYSxtQkFBTyxDQUFDLHVFQUFxQjtBQUMxQyxvQkFBb0IsbUJBQU8sQ0FBQyx1RkFBNkI7O0FBRXpEOztBQUVBO0FBQ0E7QUFDQSxJQUFJLG9FQUFvRTtBQUN4RTtBQUNBLENBQUM7Ozs7Ozs7Ozs7OztBQ1hZO0FBQ2I7QUFDQSxtQkFBTyxDQUFDLHVGQUE2QjtBQUNyQyxtQkFBTyxDQUFDLHFGQUE0QiIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL2Fzc2V0cy9qcy9zZWFyY2hDbGllbnQuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2NvcmUtanMvaW50ZXJuYWxzL2FycmF5LXNsaWNlLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9jb3JlLWpzL2ludGVybmFscy9lbmdpbmUtaXMtYnVuLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9jb3JlLWpzL2ludGVybmFscy9mdW5jdGlvbi1hcHBseS5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvY29yZS1qcy9pbnRlcm5hbHMvb2JqZWN0LWtleXMuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2NvcmUtanMvaW50ZXJuYWxzL3NjaGVkdWxlcnMtZml4LmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9jb3JlLWpzL2ludGVybmFscy9zdHJpbmctdHJpbS1mb3JjZWQuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2NvcmUtanMvaW50ZXJuYWxzL3N0cmluZy10cmltLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9jb3JlLWpzL2ludGVybmFscy90by1zdHJpbmcuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2NvcmUtanMvaW50ZXJuYWxzL3ZhbGlkYXRlLWFyZ3VtZW50cy1sZW5ndGguanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2NvcmUtanMvaW50ZXJuYWxzL3doaXRlc3BhY2VzLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9jb3JlLWpzL21vZHVsZXMvZXMub2JqZWN0LmtleXMuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2NvcmUtanMvbW9kdWxlcy9lcy5zdHJpbmcudHJpbS5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvY29yZS1qcy9tb2R1bGVzL3dlYi5zZXQtaW50ZXJ2YWwuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2NvcmUtanMvbW9kdWxlcy93ZWIuc2V0LXRpbWVvdXQuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2NvcmUtanMvbW9kdWxlcy93ZWIudGltZXJzLmpzIl0sInNvdXJjZXNDb250ZW50IjpbImxldCB0aW1lb3V0SWQ7XG4gICAgY29uc3Qgc2VhcmNoQ2FjaGUgPSB7fTsgLy8gT2JqZXQgcG91ciBzdG9ja2VyIGxlcyByw6lzdWx0YXRzIGVuIGNhY2hlXG5cbiAgICAvLyBGb25jdGlvbiBwb3VyIGVmZmFjZXIgbGUgY29udGVudSBkZXMgYXV0cmVzIGNoYW1wcyBkZSByZWNoZXJjaGVcbiAgICBmdW5jdGlvbiBjbGVhck90aGVyU2VhcmNoRmllbGRzKGN1cnJlbnRGaWVsZElkKSB7XG4gICAgICAgIGNvbnN0IGZpZWxkSWRzID0gWydzZWFyY2hWaWxsZScsICdzZWFyY2hOYW1lJywgJ3NlYXJjaENvZGVDbGllbnQnXTtcbiAgICAgICAgZmllbGRJZHMuZm9yRWFjaChmdW5jdGlvbiAoZmllbGRJZCkge1xuICAgICAgICAgICAgaWYgKGZpZWxkSWQgIT09IGN1cnJlbnRGaWVsZElkKSB7XG4gICAgICAgICAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoZmllbGRJZCkudmFsdWUgPSAnJztcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgLy8gRm9uY3Rpb24gcG91ciBzw6lsZWN0aW9ubmVyIGxlcyDDqWzDqW1lbnRzIGR1IGRyb3Bkb3duXG4gICAgZnVuY3Rpb24gc2VsZWN0RHJvcGRvd25JdGVtcygpIHtcbiAgICAgICAgY29uc3QgZHJvcGRvd25JdGVtcyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJyNzZWFyY2hDbGllbnRVbCAuZHJvcGRvd24taXRlbScpO1xuICAgICAgICBkcm9wZG93bkl0ZW1zLmZvckVhY2goZnVuY3Rpb24oaXRlbSkge1xuICAgICAgICAgICAgaXRlbS5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgICAgIGNvbnN0IGNsaWVudElkID0gaXRlbS5nZXRBdHRyaWJ1dGUoJ2RhdGEtaWQnKTtcbiAgICAgICAgICAgICAgICBjb25zdCBkYXRhTmFtZSA9IGl0ZW0uZ2V0QXR0cmlidXRlKCdkYXRhLW5hbWUnKTtcbiAgICAgICAgICAgICAgICBjb25zdCBkYXRhRHB0ID0gaXRlbS5nZXRBdHRyaWJ1dGUoJ2RhdGEtZHB0Jyk7XG4gICAgICAgICAgICAgICAgY29uc3QgZGF0YUluc2VlID0gaXRlbS5nZXRBdHRyaWJ1dGUoJ2RhdGEtaW5zZWUnKTtcbiAgICAgICAgICAgICAgICBjb25zdCBkYXRhVnJwID0gaXRlbS5nZXRBdHRyaWJ1dGUoJ2RhdGEtdnJwJyk7XG5cbiAgICAgICAgICAgICAgICBsZXQgZG9zc2llcnNDbGllbnRJZCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdkb3NzaWVyc19jbGllbnRJZCcpO1xuICAgICAgICAgICAgICAgIGxldCBkb3NzaWVyc0RwdCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdkb3NzaWVyc19kcHQnKTtcbiAgICAgICAgICAgICAgICBsZXQgc2VsZWN0Q2xpZW50ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3NlbGVjdENsaWVudCcpO1xuICAgICAgICAgICAgICAgIGxldCBkb3NzaWVyc05vbVZycCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdkb3NzaWVyc19ub21WcnAnKTtcbiAgICAgICAgICAgICAgICBsZXQgZG9zc2llcnNEYXRhTmFtZSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdkb3NzaWVyc19kYXRhX25hbWUnKTtcbiAgICAgICAgICAgICAgICBsZXQgZG9zc2llcnNVc2VySWQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnZG9zc2llcnNfdXNlcklkJyk7XG4gICAgICAgICAgICAgICAgbGV0IGRvc3NpZXJzQXNzaWduVnJwID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2Rvc3NpZXJzX2Fzc2lnblZycCcpO1xuXG4gICAgICAgICAgICAgICAgZG9zc2llcnNDbGllbnRJZC52YWx1ZSA9IGNsaWVudElkO1xuICAgICAgICAgICAgICAgIGRvc3NpZXJzRHB0LnZhbHVlID0gZGF0YURwdDtcbiAgICAgICAgICAgICAgICBkb3NzaWVyc0RwdC5jbGFzc0xpc3QuYWRkKFwic3VjY2Vzcy1zdHlsZVwiKTtcbiAgICAgICAgICAgICAgICBzZWxlY3RDbGllbnQuaW5uZXJIVE1MID0gXCJDbGllbnQgc8OpbGVjdGlvbm7DqSA6IFwiICsgZGF0YU5hbWUgKyBcIiB8IENvZGUgSW5zZWUgOiBcIiArIGRhdGFJbnNlZTtcbiAgICAgICAgICAgICAgICBkb3NzaWVyc05vbVZycC52YWx1ZSA9IGRvc3NpZXJzQXNzaWduVnJwLm9wdGlvbnNbZG9zc2llcnNBc3NpZ25WcnAuc2VsZWN0ZWRJbmRleF0udGV4dDtcbiAgICAgICAgICAgICAgICBkb3NzaWVyc0RhdGFOYW1lLnZhbHVlID0gZGF0YU5hbWU7XG4gICAgICAgICAgICAgICAgZG9zc2llcnNVc2VySWQudmFsdWUgPSBkYXRhVnJwO1xuICAgICAgICAgICAgICAgIGRvc3NpZXJzQXNzaWduVnJwLnZhbHVlID0gZGF0YVZycC50cmltKCk7XG4gICAgICAgICAgICAgICAgZG9zc2llcnNBc3NpZ25WcnAuY2xhc3NMaXN0LmFkZChcInN1Y2Nlc3Mtc3R5bGVcIik7XG5cblxuICAgICAgICAgICAgICAgIFxuICAgICAgICAgICAgfSk7XG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIC8vIEZvbmN0aW9uIHBvdXIgZWZmZWN0dWVyIHVuZSByZXF1w6p0ZSBBSkFYIGV0IG1ldHRyZSDDoCBqb3VyIGxlIGRyb3Bkb3duXG4gICAgZnVuY3Rpb24gaGFuZGxlSW5wdXQoaW5wdXRJZCwgZW5kcG9pbnQpIHtcbiAgICAgICAgY2xlYXJPdGhlclNlYXJjaEZpZWxkcyhpbnB1dElkKTtcbiAgICAgICAgY2xlYXJUaW1lb3V0KHRpbWVvdXRJZCk7XG5cbiAgICAgICAgdGltZW91dElkID0gc2V0VGltZW91dChmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICBjb25zdCBzZWFyY2hUZXJtID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoaW5wdXRJZCkudmFsdWUudHJpbSgpO1xuXG4gICAgICAgICAgICAvLyBWw6lyaWZpZXIgc2kgbGUgcsOpc3VsdGF0IGVzdCBlbiBjYWNoZVxuICAgICAgICAgICAgY29uc3QgY2FjaGVLZXkgPSBlbmRwb2ludCArICc/JyArIHNlYXJjaFRlcm07XG4gICAgICAgICAgICBpZiAoc2VhcmNoQ2FjaGVbY2FjaGVLZXldKSB7XG4gICAgICAgICAgICAgICAgdXBkYXRlRHJvcGRvd24oc2VhcmNoQ2FjaGVbY2FjaGVLZXldKTtcbiAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgY29uc3QgeGhyID0gbmV3IFhNTEh0dHBSZXF1ZXN0KCk7XG4gICAgICAgICAgICAgICAgeGhyLm9ucmVhZHlzdGF0ZWNoYW5nZSA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICAgICAgaWYgKHhoci5yZWFkeVN0YXRlID09PSA0KSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBpZiAoeGhyLnN0YXR1cyA9PT0gMjAwKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uc3QgZGF0YSA9IEpTT04ucGFyc2UoeGhyLnJlc3BvbnNlVGV4dCk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgc2VhcmNoQ2FjaGVbY2FjaGVLZXldID0gZGF0YTsgLy8gU3RvY2tlciBsZXMgcsOpc3VsdGF0cyBlbiBjYWNoZVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHVwZGF0ZURyb3Bkb3duKGRhdGEpO1xuICAgICAgICAgICAgICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmVycm9yKCdVbmUgZXJyZXVyIGVzdCBzdXJ2ZW51ZSBsb3JzIGRlIGxhIHJlcXXDqnRlIEFKQVgnKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIH07XG4gICAgICAgICAgICAgICAgeGhyLm9wZW4oJ0dFVCcsIGVuZHBvaW50ICsgJz9zZWFyY2hfdGVybT0nICsgZW5jb2RlVVJJQ29tcG9uZW50KHNlYXJjaFRlcm0pLCB0cnVlKTtcbiAgICAgICAgICAgICAgICB4aHIuc2VuZCgpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9LCA4MDApO1xuICAgIH1cblxuICAgIC8vIEZvbmN0aW9uIHBvdXIgbWV0dHJlIMOgIGpvdXIgbGUgZHJvcGRvd25cbiAgICBmdW5jdGlvbiB1cGRhdGVEcm9wZG93bihkYXRhKSB7XG4gICAgICAgIGxldCBvcHRpb25zID0gJyc7XG4gICAgICAgIGlmIChkYXRhLmxlbmd0aCA9PT0gMCkge1xuICAgICAgICAgICAgb3B0aW9ucyArPSAnPGxpIGNsYXNzPVwicC0zXCIgc3R5bGU9XCJtYXgtd2lkdGg6IDUyNHB4O1wiPjxzcGFuIGNsYXNzPVwiXCIgaHJlZj1cIiNcIj5BdWN1biBjbGllbnQgdHJvdXbDqTwvc3Bhbj48L2xpPic7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICBkYXRhLmZvckVhY2goZnVuY3Rpb24gKGNsaWVudCkge1xuICAgICAgICAgICAgICAgIGxldCBub21DbGllbnQgPSBjbGllbnQubm9tICE9PSAnJyA/IGNsaWVudC5ub20gKyAnIC0gRMOpcGFydGVtZW50IDogJyArIGNsaWVudC5jb2RlRHB0IDogJ0F1Y3VuIGNsaWVudCB0cm91dsOpJztcbiAgICAgICAgICAgICAgICBsZXQgdmlsbGUgPSBcIiB8IFZpbGxlIDogXCIgKyBjbGllbnQudmlsbGU7XG4gICAgICAgICAgICAgICAgb3B0aW9ucyArPSAnPGxpIHN0eWxlPVwibWF4LXdpZHRoOiA1MjRweDtcIj48YSBzdHlsZT1cInRleHQtd3JhcDogd3JhcDtcIiBjbGFzcz1cImRyb3Bkb3duLWl0ZW1cIiBocmVmPVwiI1wiIGRhdGEtaWQ9XCInICsgY2xpZW50LmlkICsgJ1wiIGRhdGEtbmFtZT1cIicrIGNsaWVudC5ub20gKyAnXCIgZGF0YS1kcHQ9XCInKyBjbGllbnQuY29kZURwdCArICdcIiBkYXRhLWluc2VlPVwiJysgY2xpZW50LmNvZGVJbnNlZSArICdcIiBkYXRhLXZycD1cIicrIGNsaWVudC51c2VySWQgKyAnXCIgZGF0YS12aWxsZT1cIicrIGNsaWVudC52aWxsZSArICdcIj4nICsgbm9tQ2xpZW50ICsgdmlsbGUgKyAnPC9hPjwvbGk+JztcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9XG4gICAgICAgIGNvbnN0IGRyb3Bkb3duTGlzdCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNzZWFyY2hDbGllbnRVbCcpO1xuICAgICAgICBpZihkcm9wZG93bkxpc3Qpe1xuXG4gICAgICAgIGRyb3Bkb3duTGlzdC5pbm5lckhUTUwgPSBvcHRpb25zO1xuICAgICAgICB9XG4gICAgICAgIHNlbGVjdERyb3Bkb3duSXRlbXMoKTtcbiAgICAgICAgY29uc3QgZHJvcGRvd24gPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuZHJvcGRvd24nKTtcbiAgICAgICAgZHJvcGRvd24uY2xhc3NMaXN0LmFkZCgnc2hvdycpO1xuICAgIH1cblxuICAgIC8vIFLDqWN1cMOpcmVyIGxlIHLDtGxlIGRlIGwndXRpbGlzYXRldXJcbiAgICBjb25zdCByb2xlVXNlciA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwicm9sZVVzZXJcIik7XG5cbiAgICBpZihyb2xlVXNlci5pbm5lckhUTUwgPT09IFwiVnJwXCIpe1xuICAgICAgICAvLyBSb3V0ZXMgcG91ciBsZXMgYXV0cmVzIHLDtGxlc1xuICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnc2VhcmNoVmlsbGUnKS5hZGRFdmVudExpc3RlbmVyKCdpbnB1dCcsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgIGhhbmRsZUlucHV0KCdzZWFyY2hWaWxsZScsICcvc2VhcmNoVmlsbGUnKTtcbiAgICAgICAgfSk7XG4gICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdzZWFyY2hOYW1lJykuYWRkRXZlbnRMaXN0ZW5lcignaW5wdXQnLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICBoYW5kbGVJbnB1dCgnc2VhcmNoTmFtZScsICcvc2VhcmNoQ2xpZW50Jyk7XG4gICAgICAgIH0pO1xuXG4gICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdzZWFyY2hDb2RlQ2xpZW50JykuYWRkRXZlbnRMaXN0ZW5lcignaW5wdXQnLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICBoYW5kbGVJbnB1dCgnc2VhcmNoQ29kZUNsaWVudCcsICcvc2VhcmNoQzAnKTtcbiAgICAgICAgfSk7XG5cbiAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2Ryb3Bkb3duU2VsZWN0Q2xpZW50JykuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgIGhhbmRsZUlucHV0KCdzZWFyY2hWaWxsZScsICcvc2VhcmNoVmlsbGUnKTtcbiAgICAgICAgfSk7XG4gICAgfWVsc2V7ICAgICAgICBcblxuICAgICAgICAvLyBSb3V0ZXMgcG91ciBsZSByw7RsZSBkZSBWcnBcbiAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3NlYXJjaE5hbWUnKS5hZGRFdmVudExpc3RlbmVyKCdpbnB1dCcsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgIGhhbmRsZUlucHV0KCdzZWFyY2hOYW1lJywgJy9zZWFyY2hDbGllbnRTZicpO1xuICAgICAgICB9KTtcblxuICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnc2VhcmNoVmlsbGUnKS5hZGRFdmVudExpc3RlbmVyKCdpbnB1dCcsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgIGhhbmRsZUlucHV0KCdzZWFyY2hWaWxsZScsICcvc2VhcmNoVmlsbGVTZicpO1xuICAgICAgICB9KTtcblxuICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnc2VhcmNoQ29kZUNsaWVudCcpLmFkZEV2ZW50TGlzdGVuZXIoJ2lucHV0JywgZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgaGFuZGxlSW5wdXQoJ3NlYXJjaENvZGVDbGllbnQnLCAnL3NlYXJjaEMwU2YnKTtcbiAgICAgICAgfSk7XG5cbiAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2Ryb3Bkb3duU2VsZWN0Q2xpZW50JykuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgIGhhbmRsZUlucHV0KCdzZWFyY2hWaWxsZScsICcvc2VhcmNoVmlsbGVTZicpO1xuICAgICAgICB9KTtcbiAgICBcbiAgICB9XG4iLCIndXNlIHN0cmljdCc7XG52YXIgdW5jdXJyeVRoaXMgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZnVuY3Rpb24tdW5jdXJyeS10aGlzJyk7XG5cbm1vZHVsZS5leHBvcnRzID0gdW5jdXJyeVRoaXMoW10uc2xpY2UpO1xuIiwiJ3VzZSBzdHJpY3QnO1xuLyogZ2xvYmFsIEJ1biAtLSBCdW4gY2FzZSAqL1xubW9kdWxlLmV4cG9ydHMgPSB0eXBlb2YgQnVuID09ICdmdW5jdGlvbicgJiYgQnVuICYmIHR5cGVvZiBCdW4udmVyc2lvbiA9PSAnc3RyaW5nJztcbiIsIid1c2Ugc3RyaWN0JztcbnZhciBOQVRJVkVfQklORCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9mdW5jdGlvbi1iaW5kLW5hdGl2ZScpO1xuXG52YXIgRnVuY3Rpb25Qcm90b3R5cGUgPSBGdW5jdGlvbi5wcm90b3R5cGU7XG52YXIgYXBwbHkgPSBGdW5jdGlvblByb3RvdHlwZS5hcHBseTtcbnZhciBjYWxsID0gRnVuY3Rpb25Qcm90b3R5cGUuY2FsbDtcblxuLy8gZXNsaW50LWRpc2FibGUtbmV4dC1saW5lIGVzL25vLXJlZmxlY3QgLS0gc2FmZVxubW9kdWxlLmV4cG9ydHMgPSB0eXBlb2YgUmVmbGVjdCA9PSAnb2JqZWN0JyAmJiBSZWZsZWN0LmFwcGx5IHx8IChOQVRJVkVfQklORCA/IGNhbGwuYmluZChhcHBseSkgOiBmdW5jdGlvbiAoKSB7XG4gIHJldHVybiBjYWxsLmFwcGx5KGFwcGx5LCBhcmd1bWVudHMpO1xufSk7XG4iLCIndXNlIHN0cmljdCc7XG52YXIgaW50ZXJuYWxPYmplY3RLZXlzID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL29iamVjdC1rZXlzLWludGVybmFsJyk7XG52YXIgZW51bUJ1Z0tleXMgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZW51bS1idWcta2V5cycpO1xuXG4vLyBgT2JqZWN0LmtleXNgIG1ldGhvZFxuLy8gaHR0cHM6Ly90YzM5LmVzL2VjbWEyNjIvI3NlYy1vYmplY3Qua2V5c1xuLy8gZXNsaW50LWRpc2FibGUtbmV4dC1saW5lIGVzL25vLW9iamVjdC1rZXlzIC0tIHNhZmVcbm1vZHVsZS5leHBvcnRzID0gT2JqZWN0LmtleXMgfHwgZnVuY3Rpb24ga2V5cyhPKSB7XG4gIHJldHVybiBpbnRlcm5hbE9iamVjdEtleXMoTywgZW51bUJ1Z0tleXMpO1xufTtcbiIsIid1c2Ugc3RyaWN0JztcbnZhciBnbG9iYWwgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZ2xvYmFsJyk7XG52YXIgYXBwbHkgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZnVuY3Rpb24tYXBwbHknKTtcbnZhciBpc0NhbGxhYmxlID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2lzLWNhbGxhYmxlJyk7XG52YXIgRU5HSU5FX0lTX0JVTiA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9lbmdpbmUtaXMtYnVuJyk7XG52YXIgVVNFUl9BR0VOVCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9lbmdpbmUtdXNlci1hZ2VudCcpO1xudmFyIGFycmF5U2xpY2UgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvYXJyYXktc2xpY2UnKTtcbnZhciB2YWxpZGF0ZUFyZ3VtZW50c0xlbmd0aCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy92YWxpZGF0ZS1hcmd1bWVudHMtbGVuZ3RoJyk7XG5cbnZhciBGdW5jdGlvbiA9IGdsb2JhbC5GdW5jdGlvbjtcbi8vIGRpcnR5IElFOS0gYW5kIEJ1biAwLjMuMC0gY2hlY2tzXG52YXIgV1JBUCA9IC9NU0lFIC5cXC4vLnRlc3QoVVNFUl9BR0VOVCkgfHwgRU5HSU5FX0lTX0JVTiAmJiAoZnVuY3Rpb24gKCkge1xuICB2YXIgdmVyc2lvbiA9IGdsb2JhbC5CdW4udmVyc2lvbi5zcGxpdCgnLicpO1xuICByZXR1cm4gdmVyc2lvbi5sZW5ndGggPCAzIHx8IHZlcnNpb25bMF0gPT09ICcwJyAmJiAodmVyc2lvblsxXSA8IDMgfHwgdmVyc2lvblsxXSA9PT0gJzMnICYmIHZlcnNpb25bMl0gPT09ICcwJyk7XG59KSgpO1xuXG4vLyBJRTktIC8gQnVuIDAuMy4wLSBzZXRUaW1lb3V0IC8gc2V0SW50ZXJ2YWwgLyBzZXRJbW1lZGlhdGUgYWRkaXRpb25hbCBwYXJhbWV0ZXJzIGZpeFxuLy8gaHR0cHM6Ly9odG1sLnNwZWMud2hhdHdnLm9yZy9tdWx0aXBhZ2UvdGltZXJzLWFuZC11c2VyLXByb21wdHMuaHRtbCN0aW1lcnNcbi8vIGh0dHBzOi8vZ2l0aHViLmNvbS9vdmVuLXNoL2J1bi9pc3N1ZXMvMTYzM1xubW9kdWxlLmV4cG9ydHMgPSBmdW5jdGlvbiAoc2NoZWR1bGVyLCBoYXNUaW1lQXJnKSB7XG4gIHZhciBmaXJzdFBhcmFtSW5kZXggPSBoYXNUaW1lQXJnID8gMiA6IDE7XG4gIHJldHVybiBXUkFQID8gZnVuY3Rpb24gKGhhbmRsZXIsIHRpbWVvdXQgLyogLCAuLi5hcmd1bWVudHMgKi8pIHtcbiAgICB2YXIgYm91bmRBcmdzID0gdmFsaWRhdGVBcmd1bWVudHNMZW5ndGgoYXJndW1lbnRzLmxlbmd0aCwgMSkgPiBmaXJzdFBhcmFtSW5kZXg7XG4gICAgdmFyIGZuID0gaXNDYWxsYWJsZShoYW5kbGVyKSA/IGhhbmRsZXIgOiBGdW5jdGlvbihoYW5kbGVyKTtcbiAgICB2YXIgcGFyYW1zID0gYm91bmRBcmdzID8gYXJyYXlTbGljZShhcmd1bWVudHMsIGZpcnN0UGFyYW1JbmRleCkgOiBbXTtcbiAgICB2YXIgY2FsbGJhY2sgPSBib3VuZEFyZ3MgPyBmdW5jdGlvbiAoKSB7XG4gICAgICBhcHBseShmbiwgdGhpcywgcGFyYW1zKTtcbiAgICB9IDogZm47XG4gICAgcmV0dXJuIGhhc1RpbWVBcmcgPyBzY2hlZHVsZXIoY2FsbGJhY2ssIHRpbWVvdXQpIDogc2NoZWR1bGVyKGNhbGxiYWNrKTtcbiAgfSA6IHNjaGVkdWxlcjtcbn07XG4iLCIndXNlIHN0cmljdCc7XG52YXIgUFJPUEVSX0ZVTkNUSU9OX05BTUUgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZnVuY3Rpb24tbmFtZScpLlBST1BFUjtcbnZhciBmYWlscyA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9mYWlscycpO1xudmFyIHdoaXRlc3BhY2VzID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL3doaXRlc3BhY2VzJyk7XG5cbnZhciBub24gPSAnXFx1MjAwQlxcdTAwODVcXHUxODBFJztcblxuLy8gY2hlY2sgdGhhdCBhIG1ldGhvZCB3b3JrcyB3aXRoIHRoZSBjb3JyZWN0IGxpc3Rcbi8vIG9mIHdoaXRlc3BhY2VzIGFuZCBoYXMgYSBjb3JyZWN0IG5hbWVcbm1vZHVsZS5leHBvcnRzID0gZnVuY3Rpb24gKE1FVEhPRF9OQU1FKSB7XG4gIHJldHVybiBmYWlscyhmdW5jdGlvbiAoKSB7XG4gICAgcmV0dXJuICEhd2hpdGVzcGFjZXNbTUVUSE9EX05BTUVdKClcbiAgICAgIHx8IG5vbltNRVRIT0RfTkFNRV0oKSAhPT0gbm9uXG4gICAgICB8fCAoUFJPUEVSX0ZVTkNUSU9OX05BTUUgJiYgd2hpdGVzcGFjZXNbTUVUSE9EX05BTUVdLm5hbWUgIT09IE1FVEhPRF9OQU1FKTtcbiAgfSk7XG59O1xuIiwiJ3VzZSBzdHJpY3QnO1xudmFyIHVuY3VycnlUaGlzID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2Z1bmN0aW9uLXVuY3VycnktdGhpcycpO1xudmFyIHJlcXVpcmVPYmplY3RDb2VyY2libGUgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvcmVxdWlyZS1vYmplY3QtY29lcmNpYmxlJyk7XG52YXIgdG9TdHJpbmcgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvdG8tc3RyaW5nJyk7XG52YXIgd2hpdGVzcGFjZXMgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvd2hpdGVzcGFjZXMnKTtcblxudmFyIHJlcGxhY2UgPSB1bmN1cnJ5VGhpcygnJy5yZXBsYWNlKTtcbnZhciBsdHJpbSA9IFJlZ0V4cCgnXlsnICsgd2hpdGVzcGFjZXMgKyAnXSsnKTtcbnZhciBydHJpbSA9IFJlZ0V4cCgnKF58W14nICsgd2hpdGVzcGFjZXMgKyAnXSlbJyArIHdoaXRlc3BhY2VzICsgJ10rJCcpO1xuXG4vLyBgU3RyaW5nLnByb3RvdHlwZS57IHRyaW0sIHRyaW1TdGFydCwgdHJpbUVuZCwgdHJpbUxlZnQsIHRyaW1SaWdodCB9YCBtZXRob2RzIGltcGxlbWVudGF0aW9uXG52YXIgY3JlYXRlTWV0aG9kID0gZnVuY3Rpb24gKFRZUEUpIHtcbiAgcmV0dXJuIGZ1bmN0aW9uICgkdGhpcykge1xuICAgIHZhciBzdHJpbmcgPSB0b1N0cmluZyhyZXF1aXJlT2JqZWN0Q29lcmNpYmxlKCR0aGlzKSk7XG4gICAgaWYgKFRZUEUgJiAxKSBzdHJpbmcgPSByZXBsYWNlKHN0cmluZywgbHRyaW0sICcnKTtcbiAgICBpZiAoVFlQRSAmIDIpIHN0cmluZyA9IHJlcGxhY2Uoc3RyaW5nLCBydHJpbSwgJyQxJyk7XG4gICAgcmV0dXJuIHN0cmluZztcbiAgfTtcbn07XG5cbm1vZHVsZS5leHBvcnRzID0ge1xuICAvLyBgU3RyaW5nLnByb3RvdHlwZS57IHRyaW1MZWZ0LCB0cmltU3RhcnQgfWAgbWV0aG9kc1xuICAvLyBodHRwczovL3RjMzkuZXMvZWNtYTI2Mi8jc2VjLXN0cmluZy5wcm90b3R5cGUudHJpbXN0YXJ0XG4gIHN0YXJ0OiBjcmVhdGVNZXRob2QoMSksXG4gIC8vIGBTdHJpbmcucHJvdG90eXBlLnsgdHJpbVJpZ2h0LCB0cmltRW5kIH1gIG1ldGhvZHNcbiAgLy8gaHR0cHM6Ly90YzM5LmVzL2VjbWEyNjIvI3NlYy1zdHJpbmcucHJvdG90eXBlLnRyaW1lbmRcbiAgZW5kOiBjcmVhdGVNZXRob2QoMiksXG4gIC8vIGBTdHJpbmcucHJvdG90eXBlLnRyaW1gIG1ldGhvZFxuICAvLyBodHRwczovL3RjMzkuZXMvZWNtYTI2Mi8jc2VjLXN0cmluZy5wcm90b3R5cGUudHJpbVxuICB0cmltOiBjcmVhdGVNZXRob2QoMylcbn07XG4iLCIndXNlIHN0cmljdCc7XG52YXIgY2xhc3NvZiA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9jbGFzc29mJyk7XG5cbnZhciAkU3RyaW5nID0gU3RyaW5nO1xuXG5tb2R1bGUuZXhwb3J0cyA9IGZ1bmN0aW9uIChhcmd1bWVudCkge1xuICBpZiAoY2xhc3NvZihhcmd1bWVudCkgPT09ICdTeW1ib2wnKSB0aHJvdyBuZXcgVHlwZUVycm9yKCdDYW5ub3QgY29udmVydCBhIFN5bWJvbCB2YWx1ZSB0byBhIHN0cmluZycpO1xuICByZXR1cm4gJFN0cmluZyhhcmd1bWVudCk7XG59O1xuIiwiJ3VzZSBzdHJpY3QnO1xudmFyICRUeXBlRXJyb3IgPSBUeXBlRXJyb3I7XG5cbm1vZHVsZS5leHBvcnRzID0gZnVuY3Rpb24gKHBhc3NlZCwgcmVxdWlyZWQpIHtcbiAgaWYgKHBhc3NlZCA8IHJlcXVpcmVkKSB0aHJvdyBuZXcgJFR5cGVFcnJvcignTm90IGVub3VnaCBhcmd1bWVudHMnKTtcbiAgcmV0dXJuIHBhc3NlZDtcbn07XG4iLCIndXNlIHN0cmljdCc7XG4vLyBhIHN0cmluZyBvZiBhbGwgdmFsaWQgdW5pY29kZSB3aGl0ZXNwYWNlc1xubW9kdWxlLmV4cG9ydHMgPSAnXFx1MDAwOVxcdTAwMEFcXHUwMDBCXFx1MDAwQ1xcdTAwMERcXHUwMDIwXFx1MDBBMFxcdTE2ODBcXHUyMDAwXFx1MjAwMVxcdTIwMDInICtcbiAgJ1xcdTIwMDNcXHUyMDA0XFx1MjAwNVxcdTIwMDZcXHUyMDA3XFx1MjAwOFxcdTIwMDlcXHUyMDBBXFx1MjAyRlxcdTIwNUZcXHUzMDAwXFx1MjAyOFxcdTIwMjlcXHVGRUZGJztcbiIsIid1c2Ugc3RyaWN0JztcbnZhciAkID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2V4cG9ydCcpO1xudmFyIHRvT2JqZWN0ID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL3RvLW9iamVjdCcpO1xudmFyIG5hdGl2ZUtleXMgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvb2JqZWN0LWtleXMnKTtcbnZhciBmYWlscyA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9mYWlscycpO1xuXG52YXIgRkFJTFNfT05fUFJJTUlUSVZFUyA9IGZhaWxzKGZ1bmN0aW9uICgpIHsgbmF0aXZlS2V5cygxKTsgfSk7XG5cbi8vIGBPYmplY3Qua2V5c2AgbWV0aG9kXG4vLyBodHRwczovL3RjMzkuZXMvZWNtYTI2Mi8jc2VjLW9iamVjdC5rZXlzXG4kKHsgdGFyZ2V0OiAnT2JqZWN0Jywgc3RhdDogdHJ1ZSwgZm9yY2VkOiBGQUlMU19PTl9QUklNSVRJVkVTIH0sIHtcbiAga2V5czogZnVuY3Rpb24ga2V5cyhpdCkge1xuICAgIHJldHVybiBuYXRpdmVLZXlzKHRvT2JqZWN0KGl0KSk7XG4gIH1cbn0pO1xuIiwiJ3VzZSBzdHJpY3QnO1xudmFyICQgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZXhwb3J0Jyk7XG52YXIgJHRyaW0gPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvc3RyaW5nLXRyaW0nKS50cmltO1xudmFyIGZvcmNlZFN0cmluZ1RyaW1NZXRob2QgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvc3RyaW5nLXRyaW0tZm9yY2VkJyk7XG5cbi8vIGBTdHJpbmcucHJvdG90eXBlLnRyaW1gIG1ldGhvZFxuLy8gaHR0cHM6Ly90YzM5LmVzL2VjbWEyNjIvI3NlYy1zdHJpbmcucHJvdG90eXBlLnRyaW1cbiQoeyB0YXJnZXQ6ICdTdHJpbmcnLCBwcm90bzogdHJ1ZSwgZm9yY2VkOiBmb3JjZWRTdHJpbmdUcmltTWV0aG9kKCd0cmltJykgfSwge1xuICB0cmltOiBmdW5jdGlvbiB0cmltKCkge1xuICAgIHJldHVybiAkdHJpbSh0aGlzKTtcbiAgfVxufSk7XG4iLCIndXNlIHN0cmljdCc7XG52YXIgJCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9leHBvcnQnKTtcbnZhciBnbG9iYWwgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZ2xvYmFsJyk7XG52YXIgc2NoZWR1bGVyc0ZpeCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9zY2hlZHVsZXJzLWZpeCcpO1xuXG52YXIgc2V0SW50ZXJ2YWwgPSBzY2hlZHVsZXJzRml4KGdsb2JhbC5zZXRJbnRlcnZhbCwgdHJ1ZSk7XG5cbi8vIEJ1biAvIElFOS0gc2V0SW50ZXJ2YWwgYWRkaXRpb25hbCBwYXJhbWV0ZXJzIGZpeFxuLy8gaHR0cHM6Ly9odG1sLnNwZWMud2hhdHdnLm9yZy9tdWx0aXBhZ2UvdGltZXJzLWFuZC11c2VyLXByb21wdHMuaHRtbCNkb20tc2V0aW50ZXJ2YWxcbiQoeyBnbG9iYWw6IHRydWUsIGJpbmQ6IHRydWUsIGZvcmNlZDogZ2xvYmFsLnNldEludGVydmFsICE9PSBzZXRJbnRlcnZhbCB9LCB7XG4gIHNldEludGVydmFsOiBzZXRJbnRlcnZhbFxufSk7XG4iLCIndXNlIHN0cmljdCc7XG52YXIgJCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9leHBvcnQnKTtcbnZhciBnbG9iYWwgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZ2xvYmFsJyk7XG52YXIgc2NoZWR1bGVyc0ZpeCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9zY2hlZHVsZXJzLWZpeCcpO1xuXG52YXIgc2V0VGltZW91dCA9IHNjaGVkdWxlcnNGaXgoZ2xvYmFsLnNldFRpbWVvdXQsIHRydWUpO1xuXG4vLyBCdW4gLyBJRTktIHNldFRpbWVvdXQgYWRkaXRpb25hbCBwYXJhbWV0ZXJzIGZpeFxuLy8gaHR0cHM6Ly9odG1sLnNwZWMud2hhdHdnLm9yZy9tdWx0aXBhZ2UvdGltZXJzLWFuZC11c2VyLXByb21wdHMuaHRtbCNkb20tc2V0dGltZW91dFxuJCh7IGdsb2JhbDogdHJ1ZSwgYmluZDogdHJ1ZSwgZm9yY2VkOiBnbG9iYWwuc2V0VGltZW91dCAhPT0gc2V0VGltZW91dCB9LCB7XG4gIHNldFRpbWVvdXQ6IHNldFRpbWVvdXRcbn0pO1xuIiwiJ3VzZSBzdHJpY3QnO1xuLy8gVE9ETzogUmVtb3ZlIHRoaXMgbW9kdWxlIGZyb20gYGNvcmUtanNANGAgc2luY2UgaXQncyBzcGxpdCB0byBtb2R1bGVzIGxpc3RlZCBiZWxvd1xucmVxdWlyZSgnLi4vbW9kdWxlcy93ZWIuc2V0LWludGVydmFsJyk7XG5yZXF1aXJlKCcuLi9tb2R1bGVzL3dlYi5zZXQtdGltZW91dCcpO1xuIl0sIm5hbWVzIjpbInRpbWVvdXRJZCIsInNlYXJjaENhY2hlIiwiY2xlYXJPdGhlclNlYXJjaEZpZWxkcyIsImN1cnJlbnRGaWVsZElkIiwiZmllbGRJZHMiLCJmb3JFYWNoIiwiZmllbGRJZCIsImRvY3VtZW50IiwiZ2V0RWxlbWVudEJ5SWQiLCJ2YWx1ZSIsInNlbGVjdERyb3Bkb3duSXRlbXMiLCJkcm9wZG93bkl0ZW1zIiwicXVlcnlTZWxlY3RvckFsbCIsIml0ZW0iLCJhZGRFdmVudExpc3RlbmVyIiwiY2xpZW50SWQiLCJnZXRBdHRyaWJ1dGUiLCJkYXRhTmFtZSIsImRhdGFEcHQiLCJkYXRhSW5zZWUiLCJkYXRhVnJwIiwiZG9zc2llcnNDbGllbnRJZCIsImRvc3NpZXJzRHB0Iiwic2VsZWN0Q2xpZW50IiwiZG9zc2llcnNOb21WcnAiLCJkb3NzaWVyc0RhdGFOYW1lIiwiZG9zc2llcnNVc2VySWQiLCJkb3NzaWVyc0Fzc2lnblZycCIsImNsYXNzTGlzdCIsImFkZCIsImlubmVySFRNTCIsIm9wdGlvbnMiLCJzZWxlY3RlZEluZGV4IiwidGV4dCIsInRyaW0iLCJoYW5kbGVJbnB1dCIsImlucHV0SWQiLCJlbmRwb2ludCIsImNsZWFyVGltZW91dCIsInNldFRpbWVvdXQiLCJzZWFyY2hUZXJtIiwiY2FjaGVLZXkiLCJ1cGRhdGVEcm9wZG93biIsInhociIsIlhNTEh0dHBSZXF1ZXN0Iiwib25yZWFkeXN0YXRlY2hhbmdlIiwicmVhZHlTdGF0ZSIsInN0YXR1cyIsImRhdGEiLCJKU09OIiwicGFyc2UiLCJyZXNwb25zZVRleHQiLCJjb25zb2xlIiwiZXJyb3IiLCJvcGVuIiwiZW5jb2RlVVJJQ29tcG9uZW50Iiwic2VuZCIsImxlbmd0aCIsImNsaWVudCIsIm5vbUNsaWVudCIsIm5vbSIsImNvZGVEcHQiLCJ2aWxsZSIsImlkIiwiY29kZUluc2VlIiwidXNlcklkIiwiZHJvcGRvd25MaXN0IiwicXVlcnlTZWxlY3RvciIsImRyb3Bkb3duIiwicm9sZVVzZXIiXSwic291cmNlUm9vdCI6IiJ9