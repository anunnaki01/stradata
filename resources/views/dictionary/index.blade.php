@extends('layouts.app')
<style>
    /* Ensure that the demo table scrolls */
    th, td {
        white-space: nowrap;
        font-size: 12px;

    }

    div.table-responsive {
        margin: 0 auto;
    }

    div.container {
        width: 80%;
    }

    div#formFilter {
        margin-left: 10px;
    }
    div#dictionary_filter {
        margin-right: 15px;
    }
    div#dictionary_length {
        margin-left: 20px;
    }
    .card {
        background-color: #f1f1f1 !important;
    }

    button#add {
        margin-right: 14px;
    }

</style>

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
                                    <button type="button" name="filter" id="filter" class="btn btn-success">Buscar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 col-md-offset-2">

                            <button type="button" class="btn btn-primary float-right" id="add">
                                Nuevo
                            </button>
                        </div>

                    </div>
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
@endsection
