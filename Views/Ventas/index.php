<?php include "Views/Templates/header.php"; ?>
<!-- <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Ingresar Producto</li>
</ol> -->

<div class="card">
    <div class="card-header text-white" style="background-color: #F08080;">
        <h4>Nueva Venta</h4>
    </div>
    <div class="card-body">
        <form id="frmVenta">
            <div class="row">
                <div class="col-md-2 mt-3">
                    <div class="form-group">
                        <input type="hidden" id= "id" name="id">
                        <!-- <input type="hidden" id= "costo_venta" name="costo_venta"> -->
                        <!-- <input type="hidden" id= "costo_total" name="costo_total"> -->
                        <label for="codigo"><i class="fa-solid fa-barcode"></i> Código de producto</label>
                        <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Código de producto">
                    </div>
                </div>
                <div class="col-md-1 mt-5">
                    <div class="form-group">
                        <button class="btn btn-primary" type="button" onclick="buscarCodigoVenta(event);" id="btnBuscarCodV"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <!-- <button class="btn btn-primary" type="button" onclick="registrarCli(event);" id="btnAccionModel">Registrar</button> -->

                    </div>
                </div>
                <div class="col-md-3 mt-3">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" disabled>
                    </div>
                </div>
                
                <div class="col-md-2 mt-3">
                    <div class="form-group">
                        <label for="cantidad_ingresar">Cant *</label>
                        <input id="cantidad_ingresar" class="form-control" type="number" name="cantidad_ingresar" placeholder="Cantidad" >
                    </div>
                </div>                
                <div class="col-md-2 mt-3">
                    <div class="form-group">
                        <label for="precio_venta">Precio</label>
                        <input id="precio_venta" class="form-control" type="text" name="precio_venta" placeholder="Precio venta" disabled>
                    </div>
                </div>
                <div class="col-md-1 mt-5">
                    <div class="form-group">
                        <button class="btn btn-primary" type="button" onclick="calcularPrecioVenta(event);" id="calcularPrecioV"><i class="fa-sharp fa-solid fa-cart-plus"></i></button>
                        <!-- <button class="btn btn-primary" type="button" onclick="registrarCli(event);" id="btnAccionModel">Registrar</button> -->
                        </div>
                    </div>
                <div class="col-md-2 mt-3">
                    <div class="form-group">
                        <label for="sub_total">Sub Total</label>
                        <input id="sub_total" class="form-control" type="text" name="sub_total" placeholder="Sub Total" disabled>
                    </div>
                </div>
               
                
                
            </div>            
        </form>
    </div>
</div>
<div class="card">
    <div class="card-body">
</div>

<div class="table-responsive">
    <table class="table table-light table- bordered table-hover "   id= "tblVentas">
        <thead class="thead-dark">
            <tr>
                <!-- <th>ID</th> -->
                <th>ID</th>
                <!-- <th>Código</th> -->
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Sub Total</th>
                <th></th>
                <!-- <th></th> -->
            </tr>
        </thead>
        <tbody id= "tblDetalleVenta" >
        </tbody>
    </table>
</div>
<div class="row"> 
    <div class="col-md-3">
        <div class="form-group">
            <label for="SelectCliente">Seleccionar Cliente</label>
            <select id="SelectCliente" class=" form-control" name="SelectCliente" placeholder="Cliente">
                <?php foreach ($data as $row) {  ?>  
                <option value= "<?php echo $row['ID']; ?>"><?php echo $row["telefono"];?> </option>
                <!-- <option value= "<?php echo $row['ID']; ?>"><?php echo $row["nombre"]." ".$row['paterno_cli']." ".$row['materno_cli'];?> </option> -->
                <?php } ?>
            </select>
        </div> 
    </div>

    <!-- <div class="col-md-3">
        <div class="form-group">
            <label for="cliente"><i class="fas fa-users"></i> Nombre cliente</label>
            <input value= "<?php echo $data["nombre"]." ".$data['paterno_cli']." ".$data['materno_cli'];?>  ">
        </div>       
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="direccion"><i class="fas fa-home"></i> Dirección</label>
            <input id="direccion" class="form-control" type="text" name="direccion" placeholder="Dirección" disabled>
        </div>       
    </div> -->

    <div class="col-md-3 ml-auto">
            <div class="form-group">
                <label for="total_venta" class="font-weight-bold">Total a pagar</label>
                <input id="total_venta" class="form-control" type="number" name="total_venta" placeholder="Total" disabled>
                <button class="btn btn-primary mt-4 btn-block" type="button" onclick="btnGenerarVenta(event);">Generar Venta</button>
            </div>
    </div>
</div>

<?php include "Views/Templates/footer.php"; ?>


<!-- <div class="col-md-3">
        <div class="form-group">
            <label for="cliente"><i class="fas fa-users"></i> Buscar cliente</label>
            <input id="cliente" class="form-control" type="text" name="cliente">
            <input id="id_cliente" type="hidden" name="id_cliente">
        </div>       
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="telefono"><i class="fas fa-phone "></i> Telefono</label>
            <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Télefono" disabled>
        </div>       
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="direccion"><i class="fas fa-home"></i> Dirección</label>
            <input id="direccion" class="form-control" type="text" name="direccion" placeholder="Dirección" disabled>
        </div>       
    </div> -->