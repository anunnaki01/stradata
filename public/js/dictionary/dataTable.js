var DICTIONARY = DICTIONARY || {};

DICTIONARY.dataTable = (function () {

    var columns = [

        {title: 'Nombre', data: 'name', name: 'name'},

        {title: 'Departamento', data: 'departament', name: 'departament'},

        {title: 'Localidad', data: 'location', name: 'location'},

        {title: 'Municipio', data: 'municipality', name: 'municipality'},

        {title: 'Años Activo', data: 'active_years', name: 'active_years'},

        {title: 'Tipo de Persona', data: 'person_type', name: 'person_type'},

        {title: 'Tipo de Trabajo', data: 'type_job', name: 'type_job'},
        {
            mRender: function (data, type, row) {
                return '<a  style="cursor:pointer;color:#007aad;" class="edit" onclick="DICTIONARY.main.edit(\'' + row.id + '\')" data-id="' + row.id + '"><i class="icon-edit"></i>Edit</a>'
            }
        }

    ];
    return {
        load: function (table, url, method, data, callback) {
            table.DataTable({
                destroy: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                },
                ajax: {
                    'url': url,
                    'type': method,
                    'data': data,
                    "dataSrc": function (json) {
                        callback(json);
                        return json.data;
                    }
                },
                columns: columns,
                scrollY: "400px",
                scrollX: true,
                columnDefs: [
                    {width: 200, targets: 0}
                ],
                fixedColumns: true,
            });
        },
        reload: function (table) {
            table.DataTable().ajax.reload();
        },

    }
})();