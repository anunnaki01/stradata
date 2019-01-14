jQuery(document).ready(function ($) {

    var dictionary = $('#dictionary');

    var colums = [

        {data: 'name', name: 'name'},

        {data: 'departament', name: 'departament'},

        {data: 'location', name: 'location'},

        {data: 'municipality', name: 'municipality'},

        {data: 'active_years', name: 'active_years'},

        {data: 'person_type', name: 'person_type'},

        {data: 'type_job', name: 'type_job'},
        {
            data: null,
            className: "center",
            defaultContent: '<a href="" class="editor_edit">Editar</a>'
        }
    ];

    DICTIONARY.interfaz.loadDataTableDirectory(dictionary, '/api/dictionary', colums);

    $('#filter').click(function () {
        var name = $('#name').val();
        var percentage = $('#percentage').val();
        if (name == '' || percentage == '') {
            DICTIONARY.interfaz.loadDataTableDirectory(dictionary, '/api/dictionary', colums);
        } else {
            var filters = {
                name: $('#name').val(),
                percentage: $('#percentage').val()
            };
            DICTIONARY.interfaz.filterTable(dictionary, '/api/dictionary/getList', filters, colums)
        }
    });


    $('#add').click(function () {
        $('#dictionary_form')[0].reset();
        $('.modal-title').text("Agregar");
        $('#action').val("add");
        $('#operation').val("add");
    });

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

        DICTIONARY.interfaz.store(dictionary, '/api/dictionary', data)

    });

});

