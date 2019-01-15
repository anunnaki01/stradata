var DICTIONARY = DICTIONARY || {};

DICTIONARY.interfaz = (function () {

    return {
        filterTable: function (element, url, method, data, columns) {
            element.DataTable().destroy();
            element.removeAttr('width').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                },
                ajax: {
                    'url': url,
                    'type': method,
                    'data': data
                },
                columns: columns,
                scrollY: "400px",
                scrollX: true,
                columnDefs: [
                    {width: 200, targets: 0}
                ],
                fixedColumns: true
            });
        },
        requestApi: function (url, method, data, callback) {
            if (method == 'GET') {
                axios.get(url)
                    .then(response => {
                        callback(response.data)
                    });
            } else if (method == 'POST') {
                axios.post(url, data)
                    .then(response => {
                        callback(response.data)
                    })
                    .catch(response => {
                        callback(response)
                    });
            } else if (method == 'PUT') {
                axios.put(url, data)
                    .then(response => {
                        callback(response.data);
                    })
                    .catch(response => {
                        callback(response)
                    });
            }
        }
    };
})();