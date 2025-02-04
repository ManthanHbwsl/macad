define(function () {
    'use strict';

    var mixin = {
        /**
         *
         * @param {Column} elem
         */
        isDisabled: function (elem) {
            return elem.blockVisibility || this._super();
        }
    };

    return function (target) {
        return target.extend(mixin); // Extend target component with the mixin
    };
});
