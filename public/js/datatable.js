jQuery(document).ready(function ($) {

    var dictionary = $('#dictionary');

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
                return '<a href="#" class="edit" data-id="' + row.id + '"><i class="icon-edit"></i>Edit</a>'
            }
        }
    ];

    DICTIONARY.interfaz.filterTable(dictionary, '/dictionaryList', 'GET', '', colums);

    $('#filter').click(function () {

        var name = $('#name').val();
        var percentage = $('#percentage').val();

        if (name == '' || percentage == '') {
            DICTIONARY.interfaz.filterTable(dictionary, '/dictionaryList', 'GET', '', colums);
        } else {
            var filters = {
                name: $('#name').val(),
                percentage: $('#percentage').val()
            };
            DICTIONARY.interfaz.filterTable(dictionary, '/dictionaryListFilter', 'GET', filters, colums);
        }
    });

    $('#add').click(function () {
        $('#modal-add').modal('show');
        $('#dictionary_form')[0].reset();
        $('.modal-title').text("Agregar");
        $('#action').val("add");
        $('#operation').val("add");
    });

    $(document).on('click', '.edit', function () {

        var id = $(this).attr("data-id");

        DICTIONARY.interfaz.requestApi('/api/dictionary/' + id, 'GET', '', function (data) {
            $('#modal-add').modal('show');
            $('.modal-title').text("Editar");
            $('#action').val("edit");
            $('#operation').val("edit");

            $('#id').val(data.data.id);
            $('#nameForm').val(data.data.name);
            $('#departament').val(data.data.departament);
            $('#location').val(data.data.location);
            $('#municipality').val(data.data.municipality);
            $('#active_years').val(data.data.active_years);
            $('#person_type').val(data.data.person_type);
            $('#type_job').val(data.data.type_job);
        });
    });

    function validateResponse(response) {
        alertify.set('notifier', 'position', 'top-right');

        if (response.success) {

            alertify.success(response.message);
            $('#dictionary_form')[0].reset();
            $('#modal-add').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            dictionary.DataTable().ajax.reload();

        } else {
            alertify.error(response.message);
        }
    }

    $(document).on('submit', '#dictionary_form', function (event) {
        event.preventDefault();

        var data = {
            name: $('#nameForm').val(),
            departament: $('#departament').val(),
            location: $('#location').val(),
            municipality: $('#municipality').val(),
            active_years: $('#active_years').val(),
            person_type: $('#person_type').val(),
            type_job: $('#type_job').val(),
        };

        var action = $('#action').val();

        if (action == 'add') {
            DICTIONARY.interfaz.requestApi('/api/dictionary', 'POST', data, function (response) {
                validateResponse(response);
            })
        } else if (action == 'edit') {
            DICTIONARY.interfaz.requestApi('/api/dictionary/' + $('#id').val(), 'PUT', data, function (response) {
                validateResponse(response);
            })
        }
    });
});

