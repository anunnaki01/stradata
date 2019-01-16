@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Diccionario</div>
                    <br>

                    <div class="row" id="formFilter">
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
                                <div class="form-group">
                                    <br>
                                    <button type="button" name="filter" id="filter" class="btn btn-success"
                                            onclick="DICTIONARY.main.search()">
                                        Buscar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <select class="form-control" name="export_type" id="export_type">
                                <option value="excel">Excel</option>
                                <option value="pdf">Pdf</option>
                            </select>
                            <button class="btn btn-dark" id="export" onclick="DICTIONARY.main.fileExport()">
                                Exportar
                            </button>
                            <button class="btn btn-dark" id="sendEmail" onclick="DICTIONARY.main.sendFileEmail()">
                                Enviar al correo
                            </button>
                        </div>
                        <div class="col-md-6">

                            <button class="btn btn-primary float-right" id="add"
                                    onclick="DICTIONARY.main.openModalSave()">
                                Nuevo
                            </button>
                            <button class="btn btn-secondary float-right" id="import"
                                    onclick="DICTIONARY.main.openModalImport()">
                                Importar
                            </button>
                        </div>

                    </div>
                    <hr>
                    <br>
                    <div id="table">
                        <div class="table-responsive">
                            <table id="dictionary" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dictionary.add')
    @include('dictionary.import')
@endsection
