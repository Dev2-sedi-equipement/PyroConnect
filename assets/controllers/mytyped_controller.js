// assets/controllers/mytyped_controller.js

import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    initialize() {
        this._onPreConnect = this._onPreConnect.bind(this);
        this._onConnect = this._onConnect.bind(this);
    }

    connect() {
        this.element.addEventListener('typed:pre-connect', this._onPreConnect);
        this.element.addEventListener('typed:connect', this._onConnect);
    }

    disconnect() {
        // You should always remove listeners when the controller is disconnected to avoid side-effects
        this.element.removeEventListener('typed:connect', this._onConnect);
        this.element.removeEventListener('typed:pre-connect', this._onPreConnect);
    }

    _onPreConnect(event) {
        // Typed has not been initialized - options can be changed
        event.detail.options.onBegin = (typed) => {
        };
        event.detail.options.onStop = (typed) => {
        };
    }

    _onConnect(event) {
  
    }
}