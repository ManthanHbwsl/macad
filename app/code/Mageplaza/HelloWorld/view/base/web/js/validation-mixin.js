define(['jquery', 'mage/validation'], function ($) {
    'use strict';

    var mixin = {
        /**
         * Custom validation logic
         */
        validate: function () {
            console.log("Custom Validation Logic");
            return this._super(); // Call the original validation
        }
    };

    return function (target) {
        return target.extend(mixin); // Apply the mixin to the target
    };
});
