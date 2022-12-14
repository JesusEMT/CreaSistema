<?php include "Views/Templates/header.php"; ?>
<!-- <ol class="breadcrumb mb-4 ">
<li class="breadcrumb-item active">Productos</li>
</ol> -->
<div class="card-header text-white" style="background-color: #F08080;">
        <h4>Productos </h4>
    </div>
<button class="btn btn-primary mb-2 mt-3" type="button" onclick="frmProducto();"> <i class= "fas fa-plus">  </i></button>

<div class="table-responsive">
    <table class="table table-light" id= "tblProductos">
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Precio</th>
                <th>Almacén</th>
                <th>Estado</th>
                <th></th>
                <!-- <th></th> -->
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div id="nuevo_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title_modal">Nuevo Producto</h5>                
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmProducto">                      
                    <div class="form-group">
                        <label for="Producto">Código *</label>
                        <input type="hidden" id="id" name="id">
                        <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Código">
                    </div>                 
                    <div class="form-group">
                        <label for="nombre">Nombre *</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre del producto">
                    </div>
                    <!-- <div class="form-group">
                        <label for="descripcion">Descripción *</label>
                        <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripción">
                    </div>                    -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="precio_creacion">Precio Creación *</label>
                                <input id="precio_creacion" class="form-control" type="number" maxlength="5" min="0" name="precio_creacion" placeholder= "Precio Creación" onKeypress="if (event.keyCode < 46 || event.keyCode > 57 || event.keyCode == 47 ) event.returnValue = false;">
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                                <label for="precio_venta">Precio Venta *</label>
                                <input id="precio_venta" class="form-control" type="number" maxlength="5" min="0" name="precio_venta" placeholder= "Precio Venta" onKeypress="if (event.keyCode < 46 || event.keyCode > 57 || event.keyCode == 47 ) event.returnValue = false;">
                            </div>
                        </div>
                    </div> 
                      <div class="row">
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                            <label for="medida">Medidas</label>
                            <select id="medida" class="form-control" name="medida">                            
                            <?php foreach ($data['medidas'] as $row) { ?>
                                    <option value="<?php echo $row['ID']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php } ?>
                            </select>
                            </div>  
                        </div> -->
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="categoria">Categorias</label>
                            <select id="categoria" class="form-control" name="categoria">                            
                                <?php foreach ($data['categorias'] as $row) { ?>
                                    <option value="<?php echo $row['ID']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php } ?>
                            </select>
                            </div>  
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
                    <button class="btn btn-primary mt-2" type="button" onclick="registrarPro(event);" id="btnAccionModel">Registrar</button>
                    <button class="btn btn-danger mt-2" type="button"data-bs-dismiss="modal">Cancelar</button> 
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>