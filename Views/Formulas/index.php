<?php include "Views/Templates/header.php"; ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Nueva Compra</li>
</ol>

<div class="card">
    <div class="card-body">
        <form id="frmCompra">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="codigo">Código de producto</label>
                        <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Código de producto">
                    </div>
                </div>
                
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input id="precio" class="form-control" type="number" name="precio" placeholder="Precio de prodcción" disabled>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="sub_total">Sub total</label>
                        <input id="sub_total" class="form-control" type="number" name="sub_total" placeholder="Sub total" disabled>
                    </div>
                </div>

            </div>            
        </form>
    </div>
</div>

<table class="table table-light" id= "tblProductos">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Código</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Estado</th>
            <th></th>
            <!-- <th></th> -->
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<?php include "Views/Templates/footer.php"; ?>