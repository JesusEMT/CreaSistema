<?php include "Views/Templates/header.php"; ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Ingredientes</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmIngrediente();"> <i class= "fas fa-plus">  </i></button>

<div class="table-responsive">
<table class="table table-light" id= "tblIngredientes">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Código</th>
            <th>Nombre</th>
            <th>Stock</th>
            <th>Medida</th>
            
            <th>Estado</th>
            <th></th>
            <!-- <th></th> -->
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

</div>
<div id="nuevo_ingrediente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title_modal">Nuevo Ingrediente</h5>                
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmIngrediente">                      
                    <div class="form-group">
                        <input type="hidden" id="id" name="id">
                        <label for="codigo">Código *</label>
                        <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Código">
                    </div>                 
                    <div class="form-group">
                        <label for="nombre">Nombre *</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre del ingrediente">
                    </div>                 
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="medida">Medidas</label>
                            <select id="medida" class="form-control" name="medida">                            
                            <?php foreach ($data['medidas'] as $row) { ?>
                                    <option value="<?php echo $row['ID']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php } ?>
                            </select>
                            </div>  
                        </div>
                        <div class="form-group">
                        <label for="cantidad">Cantidad *</label>
                        <input id="cantidad" class="form-control" type="text" name="cantidad" placeholder="Cantidad">
                    </div> 
                        <!-- <div class="col-md12"></div>
                        <div class="form-group">
                            <label>Imagen</label>
                            <div class="card border-primary">
                                <div class="card-body">
                                <label for="imagen" class="btn btn-primary"><i class="fas fa-image"></i></label>
                                    <input id="imagen" class="d-none" type="file" name="imagen" onchange= "previsualizar(event)">
                                </div>
                            </div>
                        </div> -->
                    </div>                 
                    <button class="btn btn-primary" type="button" onclick="registrarIngre(event);" id="btnAccionModel">Registrar</button>
                    <button class="btn btn-danger" type="button"data-bs-dismiss="modal">Cancelar</button> 
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>