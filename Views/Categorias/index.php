<?php include "Views/Templates/header.php"; ?>
<div class="card-header text-white" style="background-color: #F08080;">
        <h4>Categorias</h4>
    </div>
<button class="btn btn-primary mb-2 mt-3" type="button" onclick="frmCategoria();"> <i class= "fas fa-plus">  </i></button>

<div class="table-responsive">
    <table class="table table-light" id= "tblCategorias">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th></th>
                <!-- <th></th> -->
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

</div>
<div id="nuevo_categoria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title_modal">Nueva categoria</h5>                
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmCategoria">                      
                    <div class="form-group">
                        <label for="nombre">Nombre *</label>
                        <input type="hidden" id="id" name="id">
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre Categoria">
                    </div>
                    <button class="btn btn-primary" type="button" onclick="registrarCat(event);" id="btnAccionModel">Registrar</button>
                    <button class="btn btn-danger" type="button"data-bs-dismiss="modal">Cancelar</button> 
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>