<!-- Modal -->
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modal-add" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Agregar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="post" id="dictionary_form" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="nameForm">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="departament">Departamento</label>
                            <input type="text" class="form-control" id="departament">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="location">Localidad</label>
                            <input type="text" class="form-control" id="location">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="municipality">Municipio</label>
                            <input type="text" class="form-control" id="municipality">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="active_years">Años Activo</label>
                            <input type="number" min="0" class="form-control" id="active_years">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="person_type">Tipo de Persona</label>
                            <input type="text" class="form-control" id="person_type">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Tipo de Cargo</label>
                            <input type="text" class="form-control" id="type_job">
                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>

                <div class="modal-footer">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="operation" id="operation">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="action" value="Add">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>