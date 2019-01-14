var DICTIONARY = DICTIONARY || {};

DICTIONARY.interfaz = (function () {
    return {
        loadDataTableDirectory: function (element, url, columns) {
            element.DataTable().destroy();
            element.removeAttr('width').DataTable({
                ajax: {
                    'url': url,
                    'type': 'GET',
                    "headers": {
                        "authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjRmYTNkYWUzMmQ0NjA0YjJjNGRkZTViZDQ4M2EyOGEyMTM5YWQ1OTZhYzYzZWY2OTVlYTJhOTJmZmVjNTNjZTY3ZjEzYmQ1MGIyN2QzMTVhIn0.eyJhdWQiOiIyIiwianRpIjoiNGZhM2RhZTMyZDQ2MDRiMmM0ZGRlNWJkNDgzYTI4YTIxMzlhZDU5NmFjNjNlZjY5NWVhMmE5MmZmZWM1M2NlNjdmMTNiZDUwYjI3ZDMxNWEiLCJpYXQiOjE1NDcyNDI3MDgsIm5iZiI6MTU0NzI0MjcwOCwiZXhwIjoxNTc4Nzc4NzA4LCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.iAktnIq-AAQyA_nJfucER5-feCzdENnmqNRWWa_Cm8Tdr5vYdhMcddSEfPYa3xBfspvG0fecYY_oa2JKF35cIE8k8gNJLT-sDskOaNMiC7lIygo0YjcfFMtCLxlLaacNIjjt20rRWtnkoZXol6rEpB2CNVvI8pZpgjZGCszM01QV4mOpXh2xjEazh9BmGh6zXQbOpknFMHMi0v9BGwSdT3NrBTz00vsgLlDaysXXqtSx86FpMiiOTeHad4tw6eH8cX8lekyD7K4ACMAW2eBSCTqzH6yVkfZS0eD5oVtO1kijjeIKLQiKck5v2F1Vy16aoGS9iOLqsA_cfIJkrBlu9nuU17qCqH5bVIZc0SPkKLWE444F6LpfhbtFxg8FQ3TRj7pzy4RFi_u-_Kqo8c2cfJ53ACcQE4D8RC_eiOcY-hnu5osVzfw5bNpAjQiE8Galm_SjEpDZO8Xfn6drbrr3vrlX_xmgnB0ljUoMnF0RRNm1vIBacZRO_GhrNOyFlRGcbN3vaba0Mp1JR7ytxfV7ymVYmNZnoEbGp9GAxNG6IpVUrL3Gca_rQIo9Xmar3wnhFvFuzlFgH2rb3oy8NfDYXx7jD-sKybtpCy5LrE4uNyaFYIjMYzwU-iqBDZLf707otgN8tKfPWu1CqrFoOkv1TBCJP0O1eOAwaFRBZ4B4cUo",
                        "accept": "application/json",
                    },
                },
                columns: columns,
                scrollY: "300px",
                scrollX: true,
                columnDefs: [
                    {width: 200, targets: 0}
                ],
                fixedColumns: true

            });
        },
        filterTable: function (element, url, filters, columns) {
            element.DataTable().destroy();
            element.removeAttr('width').DataTable({
                ajax: {
                    'url': url,
                    'type': 'POST',
                    data: filters,
                    "headers": {
                        "authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjRmYTNkYWUzMmQ0NjA0YjJjNGRkZTViZDQ4M2EyOGEyMTM5YWQ1OTZhYzYzZWY2OTVlYTJhOTJmZmVjNTNjZTY3ZjEzYmQ1MGIyN2QzMTVhIn0.eyJhdWQiOiIyIiwianRpIjoiNGZhM2RhZTMyZDQ2MDRiMmM0ZGRlNWJkNDgzYTI4YTIxMzlhZDU5NmFjNjNlZjY5NWVhMmE5MmZmZWM1M2NlNjdmMTNiZDUwYjI3ZDMxNWEiLCJpYXQiOjE1NDcyNDI3MDgsIm5iZiI6MTU0NzI0MjcwOCwiZXhwIjoxNTc4Nzc4NzA4LCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.iAktnIq-AAQyA_nJfucER5-feCzdENnmqNRWWa_Cm8Tdr5vYdhMcddSEfPYa3xBfspvG0fecYY_oa2JKF35cIE8k8gNJLT-sDskOaNMiC7lIygo0YjcfFMtCLxlLaacNIjjt20rRWtnkoZXol6rEpB2CNVvI8pZpgjZGCszM01QV4mOpXh2xjEazh9BmGh6zXQbOpknFMHMi0v9BGwSdT3NrBTz00vsgLlDaysXXqtSx86FpMiiOTeHad4tw6eH8cX8lekyD7K4ACMAW2eBSCTqzH6yVkfZS0eD5oVtO1kijjeIKLQiKck5v2F1Vy16aoGS9iOLqsA_cfIJkrBlu9nuU17qCqH5bVIZc0SPkKLWE444F6LpfhbtFxg8FQ3TRj7pzy4RFi_u-_Kqo8c2cfJ53ACcQE4D8RC_eiOcY-hnu5osVzfw5bNpAjQiE8Galm_SjEpDZO8Xfn6drbrr3vrlX_xmgnB0ljUoMnF0RRNm1vIBacZRO_GhrNOyFlRGcbN3vaba0Mp1JR7ytxfV7ymVYmNZnoEbGp9GAxNG6IpVUrL3Gca_rQIo9Xmar3wnhFvFuzlFgH2rb3oy8NfDYXx7jD-sKybtpCy5LrE4uNyaFYIjMYzwU-iqBDZLf707otgN8tKfPWu1CqrFoOkv1TBCJP0O1eOAwaFRBZ4B4cUo",
                        "accept": "application/json",
                    },
                },
                columns: columns,
                scrollY: "300px",
                scrollX: true,
                columnDefs: [
                    {width: 200, targets: 0}
                ],
                fixedColumns: true
            });

        },
        store: function (element, url, data) {
            $.ajax({
                url: url,
                type: "post",
                data: data,
                "headers": {
                    "authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjRmYTNkYWUzMmQ0NjA0YjJjNGRkZTViZDQ4M2EyOGEyMTM5YWQ1OTZhYzYzZWY2OTVlYTJhOTJmZmVjNTNjZTY3ZjEzYmQ1MGIyN2QzMTVhIn0.eyJhdWQiOiIyIiwianRpIjoiNGZhM2RhZTMyZDQ2MDRiMmM0ZGRlNWJkNDgzYTI4YTIxMzlhZDU5NmFjNjNlZjY5NWVhMmE5MmZmZWM1M2NlNjdmMTNiZDUwYjI3ZDMxNWEiLCJpYXQiOjE1NDcyNDI3MDgsIm5iZiI6MTU0NzI0MjcwOCwiZXhwIjoxNTc4Nzc4NzA4LCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.iAktnIq-AAQyA_nJfucER5-feCzdENnmqNRWWa_Cm8Tdr5vYdhMcddSEfPYa3xBfspvG0fecYY_oa2JKF35cIE8k8gNJLT-sDskOaNMiC7lIygo0YjcfFMtCLxlLaacNIjjt20rRWtnkoZXol6rEpB2CNVvI8pZpgjZGCszM01QV4mOpXh2xjEazh9BmGh6zXQbOpknFMHMi0v9BGwSdT3NrBTz00vsgLlDaysXXqtSx86FpMiiOTeHad4tw6eH8cX8lekyD7K4ACMAW2eBSCTqzH6yVkfZS0eD5oVtO1kijjeIKLQiKck5v2F1Vy16aoGS9iOLqsA_cfIJkrBlu9nuU17qCqH5bVIZc0SPkKLWE444F6LpfhbtFxg8FQ3TRj7pzy4RFi_u-_Kqo8c2cfJ53ACcQE4D8RC_eiOcY-hnu5osVzfw5bNpAjQiE8Galm_SjEpDZO8Xfn6drbrr3vrlX_xmgnB0ljUoMnF0RRNm1vIBacZRO_GhrNOyFlRGcbN3vaba0Mp1JR7ytxfV7ymVYmNZnoEbGp9GAxNG6IpVUrL3Gca_rQIo9Xmar3wnhFvFuzlFgH2rb3oy8NfDYXx7jD-sKybtpCy5LrE4uNyaFYIjMYzwU-iqBDZLf707otgN8tKfPWu1CqrFoOkv1TBCJP0O1eOAwaFRBZ4B4cUo",
                    "accept": "application/json",
                },
                success: function (response) {
                    $('#dictionary_form')[0].reset();
                    $('#modal-add').modal('hide');
                    element.DataTable().ajax.reload();
                }
            });
        }
    };
})();