<div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="modalImport"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalImport">Impotar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="importFile" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input id="file" type="file" name="file"/>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="upload"
                                onclick="DICTIONARY.main.fileImport()">Importar
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>