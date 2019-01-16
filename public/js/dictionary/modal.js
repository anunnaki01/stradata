var DICTIONARY = DICTIONARY || {};

DICTIONARY.modal = (function () {

    return {
        open: function (modal) {
            modal.modal('show');
            return false;
        },
        close: function (modal) {
            modal.modal('hide');
            return false;
        },
        getValuesInputs: function () {
            return {
                name: $('#nameForm').val(),
                departament: $('#departament').val(),
                location: $('#location').val(),
                municipality: $('#municipality').val(),
                active_years: $('#active_years').val(),
                person_type: $('#person_type').val(),
                type_job: $('#type_job').val(),
            };

        },
        closeModalForm: function (form, modal) {

            DICTIONARY.modal.close(modal);
            form.reset();
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();

            return false;
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

            return false;
        },
    }
})();