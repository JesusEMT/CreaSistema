<?php include "Views/Templates/header.php"; ?>
<!-- <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Ingresar Producto</li>
</ol> -->

<div class="card">
    <div class="card-header text-white" style="background-color: #F08080;">
        <h4>Ingresar productos </h4>
    </div>
    <div class="card-body">
        <form id="frmCompra">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="hidden" id= "id" name="id">
                        <input type="hidden" id= "precio_creacion" name="precio_creacion">
                        <input type="hidden" id= "costo_total" name="costo_total">
                        <label for="codigo">Código de producto *</label>
                        <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Código de producto">
                    </div>
                </div>
                <div class="col-md-1 mt-4">
                    <div class="form-group">
                        <button class="btn btn-primary" type="button" onclick="buscarCodigo(event);" id="btnAgregar"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <!-- <button class="btn btn-primary" type="button" onclick="registrarCli(event);" id="btnAccionModel">Registrar</button> -->

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" disabled>
                    </div>
                </div>
                
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="cantidad_ingresar">Cantidad *</label>
                        <input id="cantidad_ingresar" class="form-control" type="number" name="cantidad_ingresar" placeholder="Cantidad" >
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="descripcion">Descripcion *</label>
                        <textarea id="descripcion" class="form-control" name="descripcion" placeholder="descripcion" rows="2"></textarea>
                    </div> 
                </div>
                <div class="col-md-1 mt-4 ml-auto">
                    <div class="form-group">
                        <button class="btn btn-primary" type="button" onclick="AgregarPro(event,1);"><i class= "fas fa-plus"></i></button>
                        <button class="btn btn-danger" type="button" onclick="AgregarPro(event,-1);"><i class= "fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <!-- <div class="col-md-2">
                    <div class="form-group">
                        <label for="costo">Costo producción</label>
                        <input id="costo" class="form-control" type="number" name="costo" placeholder="Costo Producción" >
                    </div>
                </div> -->
            </div>            
        </form>
    </div>
</div>
<div class="card">
    <div class="card-body">
</div>

<table class="table table-light" id= "tblCompras">
    <thead class="thead-dark">
        <tr>
            <!-- <th>ID</th> -->
            <th>Código</th>
            <th>Nombre</th>
            <th>Almacen</th>
            <th>Estado</th>
            <!-- <th>Costo Producción</th> -->
            <!-- <th></th> -->
            <!-- <th></th> -->
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<?php include "Views/Templates/footer.php"; ?>