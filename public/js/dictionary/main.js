var DICTIONARY = DICTIONARY || {};

jQuery(document).ready(function ($) {

    DICTIONARY.main = (function () {

        var table = $('#dictionary');
        var modalAdd = $('#modal-add');
        var modalImport = $('#modalImport');
        var formImportFile = $("form#importFile");
        var buttonExport = $('#export');
        var buttonSearch = $('#filter');
        var buttonSendEmail = $('#sendEmail');

        return {
            loadTable: function () {
                DICTIONARY.dataTable.load(table, 'dictionaryList', 'GET', '', function (data) {
                });
                return false;
            },
            save: function () {

                var action = $('#action').val();
                var data = DICTIONARY.modal.getValuesInputs();
                var dictionarySave = $('#dictionarySave')[0];

                if (action === 'add') {

                    DICTIONARY.requestApi.request('/api/dictionary', 'POST', data, function (response) {
                        DICTIONARY.utilities.processFormResponse(response, modalAdd, dictionarySave, table);
                    })

                } else if (action === 'edit') {

                    DICTIONARY.requestApi.request('/api/dictionary/' + $('#id').val(), 'PUT', data, function (response) {
                        DICTIONARY.utilities.processFormResponse(response, modalAdd, dictionarySave, table);
                    })
                }
                return false;
            },
            edit: function (id) {

                DICTIONARY.requestApi.request('/api/dictionary/' + id, 'GET', '', function (data) {

                    $('.modal-title').text("Editar");
                    $('#action').val("edit");
                    $('#operation').val("edit");

                    DICTIONARY.modal.setModalSaveInputs(data.data);
                    DICTIONARY.modal.open(modalAdd);
                });

                return false;
            },
            openModalSave: function () {
                DICTIONARY.modal.open(modalAdd);
                return false;
            },
            openModalImport: function () {
                DICTIONARY.modal.open(modalImport);
                return false;
            },
            search: function () {

                var name = $('#name').val().trim();
                var percentage = $('#percentage').val().trim();

                buttonSearch.text('Buscando...').prop('disabled', true);

                var dataTableId = $('#table');
                dataTableId.hide()


                if (name === '' || percentage === '') {
                    DICTIONARY.dataTable.load(table, '/dictionaryList', 'GET', '', function (response) {
                        dataTableId.show();
                        DICTIONARY.utilities.getAlert(response);
                        buttonSearch.text('Buscar').prop('disabled', false);
                    });
                    return false;
                }

                if (percentage < 0 || percentage > 100) {
                    DICTIONARY.utilities.getAlert({
                        success: false,
                        message: 'El porcentaje debe estar entre 0 y 100...'
                    });
                    return false;
                }

                var filters = {name: name, percentage: percentage};


                DICTIONARY.dataTable.load(table, '/dictionaryListFilter', 'GET', filters, function (response) {
                    dataTableId.show();
                    DICTIONARY.utilities.getAlert(response);
                    buttonSearch.text('Buscar').prop('disabled', false);
                });

                return false;
            },
            fileExport: function () {

                var type = $('#export_type').val();
                var name = $('#name').val();
                var percentage = $('#percentage').val();
                var url = '/export/' + type + '/' + name + '/' + percentage;

                buttonExport.text('Exportando...').prop('disabled', true);

                DICTIONARY.main.fileDownload(url, function () {
                    buttonExport.text('Exportar').prop('disabled', false);
                });

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
            },
            fileImport: function () {

                var button = $('#upload');
                var formData = new FormData(jQuery(formImportFile)[0]);

                button.text('Importando...').prop('disabled', true);

                DICTIONARY.requestApi.request('/importFile', 'POST', formData, function (response) {
                    button.text('Importar').prop('disabled', false);
                    DICTIONARY.utilities.processFormResponse(response, modalImport, formImportFile[0], table);
                });
                return false;
            },
            sendFileEmail: function () {

                var type = $('#export_type').val();
                var name = $('#name').val();
                var percentage = $('#percentage').val();
                var url = '/send/' + type + '/' + name + '/' + percentage;

                buttonSendEmail.text('enviando...').prop('disabled', true);

                DICTIONARY.requestApi.request(url, 'GET', '', function (response) {
                    buttonSendEmail.text('Email').prop('disabled', false);
                    DICTIONARY.utilities.getAlert(response);
                });

                return false;
            },
        }
    })();

    DICTIONARY.main.loadTable();
});
