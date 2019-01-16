var DICTIONARY = DICTIONARY || {};

jQuery(document).ready(function ($) {

    DICTIONARY.utilities = (function () {

        var colums = [

            {title: 'Nombre', data: 'name', name: 'name'},

            {title: 'Departamento', data: 'departament', name: 'departament'},

            {title: 'Localidad', data: 'location', name: 'location'},

            {title: 'Municipio', data: 'municipality', name: 'municipality'},

            {title: 'Años Activo', data: 'active_years', name: 'active_years'},

            {title: 'Tipo de Persona', data: 'person_type', name: 'person_type'},

            {title: 'Tipo de Trabajo', data: 'type_job', name: 'type_job'},
            {
                mRender: function (data, type, row) {
                    return '<a href="#" class="edit" onclick="DICTIONARY.utilities.edit(\'' + row.id + '\')" data-id="' + row.id + '"><i class="icon-edit"></i>Edit</a>'
                }
            }

        ];
        var modalAdd = $('#modal-add');
        var table = $('#dictionary');

        return {
            filter: function () {
            },
            save: function () {
                var self = DICTIONARY.utilities;
                var action = $('#action').val();
                var data = {
                    name: $('#nameForm').val(),
                    departament: $('#departament').val(),
                    location: $('#location').val(),
                    municipality: $('#municipality').val(),
                    active_years: $('#active_years').val(),
                    person_type: $('#person_type').val(),
                    type_job: $('#type_job').val(),
                };

                if (action === 'add') {
                    DICTIONARY.interfaz.requestApi('/api/dictionary', 'POST', data, function (response) {
                        self.getAlert(response);
                        if (self.canCloseModalSave(response)) {
                            self.closeModalSave();
                        }
                    })
                } else if (action === 'edit') {
                    DICTIONARY.interfaz.requestApi('/api/dictionary/' + $('#id').val(), 'PUT', data, function (response) {
                        self.getAlert(response);
                        if (self.canCloseModalSave(response)) {
                            self.closeModalSave();
                        }
                    })
                }
            },
            getTable: function () {
                return table;
            },
            getColums: function () {
                return colums;
            },
            getAlert: function (response) {
                alertify.set('notifier', 'position', 'top-right');
                if (response.success) {
                    alertify.success(response.message);
                }
                else {
                    alertify.error(response.message);
                }
            },
            edit: function (id) {
                var self = DICTIONARY.utilities;
                DICTIONARY.interfaz.requestApi('/api/dictionary/' + id, 'GET', '', function (data) {
                    self.openModalSave();
                    $('.modal-title').text("Editar");
                    $('#action').val("edit");
                    $('#operation').val("edit");

                    self.setModalSaveInputs(data.data);
                });
            },
            openModalSave: function () {
                modalAdd.modal('show');
            },
            canCloseModalSave: function (response) {
                if (response.success) {
                    return true;
                }
                return false;
            },
            closeModalSave: function () {
                var self = DICTIONARY.utilities;

                modalAdd.modal('hide');
                $('#dictionarySave')[0].reset();
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                self.dataTableReload();
            },
            setModalSaveInputs: function (data) {
                $('#id').val(data.id);
                $('#nameForm').val(data.name);
                $('#departament').val(data.departament);
                $('#location').val(data.location);
                $('#municipality').val(data.municipality);
                $('#active_years').val(data.active_years);
                $('#person_type').val(data.person_type);
                $('#type_job').val(data.type_job);
            },
            dataTableReload: function () {
                table.DataTable().ajax.reload();
            },

        }
    })();

    var utilities = DICTIONARY.utilities;
    DICTIONARY.interfaz.filterTable(utilities.getTable(), 'dictionaryList', 'GET', '', utilities.getColums(), function () {
    });
});
