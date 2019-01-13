<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel DataTables Tutorial Example</title>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

</head>

<body>

<div class="container">

    <br/>

    <h1 class="text-center">HDTuto - Laravel DataTables Tutorial Example</h1>

    <br/>

    <table class="table table-bordered" id="users-table">

        <thead>

        <tr>

            <th>Nombre</th>

            <th>Departamento</th>

            <th>Localidad</th>

            <th>Municipio</th>

            <th>Años activo</th>

            <th>Tipo de Persona</th>

            <th>Tipo de Cargo</th>

        </tr>

        </thead>

    </table>

</div>

<script src="//code.jquery.com/jquery.js"></script>

<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script>

    $(function() {

        $('#users-table').DataTable({

            //processing: true,

            //serverSide: true,

            ajax: {
                'url': '/api/dictionary',
                'type': 'GET',
                "headers": {
                    "authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjRmYTNkYWUzMmQ0NjA0YjJjNGRkZTViZDQ4M2EyOGEyMTM5YWQ1OTZhYzYzZWY2OTVlYTJhOTJmZmVjNTNjZTY3ZjEzYmQ1MGIyN2QzMTVhIn0.eyJhdWQiOiIyIiwianRpIjoiNGZhM2RhZTMyZDQ2MDRiMmM0ZGRlNWJkNDgzYTI4YTIxMzlhZDU5NmFjNjNlZjY5NWVhMmE5MmZmZWM1M2NlNjdmMTNiZDUwYjI3ZDMxNWEiLCJpYXQiOjE1NDcyNDI3MDgsIm5iZiI6MTU0NzI0MjcwOCwiZXhwIjoxNTc4Nzc4NzA4LCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.iAktnIq-AAQyA_nJfucER5-feCzdENnmqNRWWa_Cm8Tdr5vYdhMcddSEfPYa3xBfspvG0fecYY_oa2JKF35cIE8k8gNJLT-sDskOaNMiC7lIygo0YjcfFMtCLxlLaacNIjjt20rRWtnkoZXol6rEpB2CNVvI8pZpgjZGCszM01QV4mOpXh2xjEazh9BmGh6zXQbOpknFMHMi0v9BGwSdT3NrBTz00vsgLlDaysXXqtSx86FpMiiOTeHad4tw6eH8cX8lekyD7K4ACMAW2eBSCTqzH6yVkfZS0eD5oVtO1kijjeIKLQiKck5v2F1Vy16aoGS9iOLqsA_cfIJkrBlu9nuU17qCqH5bVIZc0SPkKLWE444F6LpfhbtFxg8FQ3TRj7pzy4RFi_u-_Kqo8c2cfJ53ACcQE4D8RC_eiOcY-hnu5osVzfw5bNpAjQiE8Galm_SjEpDZO8Xfn6drbrr3vrlX_xmgnB0ljUoMnF0RRNm1vIBacZRO_GhrNOyFlRGcbN3vaba0Mp1JR7ytxfV7ymVYmNZnoEbGp9GAxNG6IpVUrL3Gca_rQIo9Xmar3wnhFvFuzlFgH2rb3oy8NfDYXx7jD-sKybtpCy5LrE4uNyaFYIjMYzwU-iqBDZLf707otgN8tKfPWu1CqrFoOkv1TBCJP0O1eOAwaFRBZ4B4cUo",
                    "accept": "application/json",
                },
            },

            columns: [

                { data: 'name', name: 'name' },

                { data: 'departament', name: 'departament' },

                { data: 'location', name: 'location' },

                { data: 'municipality', name: 'municipality' },

                { data: 'active_years', name: 'active_years' },

                { data: 'person_type', name: 'person_type' },

                { data: 'type_job', name: 'type_job' },

            ]

        });

    });

</script>

@stack('scripts')

</body>

</html>