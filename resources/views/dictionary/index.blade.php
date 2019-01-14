@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Diccionario</div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <labe for="name">Nombre:</labe>
                                <input type="text" name="name" id="name" class="form-control"></div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <labe for="name">Porcentaje:</labe>
                                        <input type="number" min="0" max="100" name="percentage" id="percentage"
                                               class="form-control"></div>
                                </div>
                                <div class="form-group" align="center">
                                    <br>
                                    <button type="button" name="filter" id="filter" class="btn btn-success">Buscar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div id="table">
                        <div class="table-responsive">
                            <table id="dictionary" class="table table-bordered table-striped" style="width:100%">
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
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            var dictionary = $('#dictionary');

            var colums = [

                {data: 'name', name: 'name', width: '30%'},

                {data: 'departament', name: 'departament', width: '5%'},

                {data: 'location', name: 'location', width: '10%'},

                {data: 'municipality', name: 'municipality', width: '5%'},

                {data: 'active_years', name: 'active_years', width: '20%'},

                {data: 'person_type', name: 'person_type', width: '20%'},

                {data: 'type_job', name: 'type_job', width: '20%'},
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

        });

    </script>
@endsection
