<?php include "Views/Templates/header.php"; ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Medidas</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmMedida();"><i class= "fas fa-plus"></i></button>
<div class="table-responsive">
<table class="table table-light" id="tblMedidas">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Abreviatura</th>    
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

</div>

<div id="nuevo_medida" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title_modal">Nuevo Medida</h5>                
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmMedida">   
                    <div class="form-group">
                        <input type="hidden" id="id" name="id">
                        <label for="nombre">Nombre de medida *</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre medida">
                    </div>                                                  
                    <div class="form-group">
                        <label for="nombre_corto">Abreviatura *</label>
                        <input id="nombre_corto" class="form-control" type="text" name="nombre_corto" placeholder="Abrviatura">
                    </div>                            
                    <button class="btn btn-primary" margin-top: 5px; type="button" onclick="registrarMedida(event);" id="btnAccionModel">Registrar</button>
                    <button class="btn btn-danger" type="button"data-bs-dismiss="modal">Cancelar</button> 
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>