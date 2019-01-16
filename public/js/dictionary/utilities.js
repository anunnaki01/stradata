var DICTIONARY = DICTIONARY || {};

DICTIONARY.utilities = (function () {

    return {

        getAlert: function (response) {
            alertify.set('notifier', 'position', 'top-right');
            if (response.success) {
                alertify.success(response.message);
            }
            else {
                alertify.error(response.message);
            }
            return false;
        },

        canCloseModalSave: function (response) {
            if (response.success) {
                return true;
            }
            return false;
        },
        processFormResponse: function (response, modal, form, table) {
            var self = DICTIONARY.utilities;

            self.getAlert(response);

            if (self.canCloseModalSave(response)) {
                DICTIONARY.modal.closeModalForm(form, modal);
                DICTIONARY.dataTable.reload(table);
            }
            return false;
        },
        fileDownload: function (url, callback) {
            $.fileDownload(url, {
                successCallback: function (url) {
                    callback(url);
                },
                failCallback: function (responseHtml, url) {
                    callback(responseHtml);
                }
            });
        }
    }
})();