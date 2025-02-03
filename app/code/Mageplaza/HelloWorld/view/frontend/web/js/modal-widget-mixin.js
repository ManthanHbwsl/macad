define(['jquery'], function ($) {
    var modalWidgetMixin = {
        options: {
            confirmMessage: "Please, confirm modal closing."
        },

        /**
         * Added confirmation for modal closing
         *
         * @returns {Element}
         */
        closeModal: function () {
            if (!confirm(this.options.confirmMessage)) {
                return this.element;
            }

            return this._super();
        }
    };

    return function (targetWidget) {
        $.widget('mage.modal', targetWidget, modalWidgetMixin);
        return $.mage.modal;
    };
});
