<?php include "Views/Templates/header.php"; ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Clientes</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmCliente();"><i class= "fas fa-plus"></i></button>
<table class="table table-light" id="tblClientes">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Telefono</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Dirección</th>       
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<div id="nuevo_cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title_modal">Nuevo Cliente</h5>                
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmCliente">   
                    <div class="form-group">
                        <input type="hidden" id="id" name="id">
                        <label for="telefono">Telefono *</label>
                        <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Teléfono">
                    </div>                                                  
                    <div class="form-group">
                        <label for="nombre">Nombre *</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre del Cliente">
                    </div>                    
                    <div class="form-group">
                        <label for="email">Correo electronico *</label>
                        <input id="email" class="form-control" type="text" name="email" placeholder="Correo electronico">
                    </div>  
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <textarea id="direccion" class="form-control" name="direccion" placeholder="Dirección" rows="3"></textarea>
                    </div>         
                    <button class="btn btn-primary" margin-top: 5px; type="button" onclick="registrarCli(event);" id="btnAccionModel">Registrar</button>
                    <button class="btn btn-danger" type="button"data-bs-dismiss="modal">Cancelar</button> 
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>