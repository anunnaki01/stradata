<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

</head>
<body>
<h1>Registros</h1>
<table>
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Deparatamento</th>
        <th>Localidad</th>
        <th>Municipio</th>
        <th>Años Activo</th>
        <th>Tipo de Persona</th>
        <th>Tipo de Trabajo</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $datum)
        <tr>
            <td>{{ $datum['name'] }}</td>
            <td>{{ $datum['departament']  }}</td>
            <td>{{ $datum['location']  }}</td>
            <td>{{ $datum['municipality']  }}</td>
            <td>{{ $datum['active_years']  }}</td>
            <td>{{ $datum['person_type']  }}</td>
            <td>{{ $datum['type_job']  }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
