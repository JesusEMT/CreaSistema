<?php include "Views/Templates/header.php"; ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Usuarios</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmUsuario();">Nuevo</button>

<table class="table table-light" id= "tblUsuarios">
    <thead class="thead-dark">
        <tr>
            <th>ID_usuario</th>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Estado</th>
            <th>Acciones</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<div id="nuevo_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Nuevo Usuario</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmUsuario">  
                    <div class="form-group">
                        <label for="usuario">Usuario *</label>
                        <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario">
                    </div>                 
                    <div class="form-group">
                        <label for="nombre">Nombre *</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre del usuario">
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección *</label>
                        <input id="direccion" class="form-control" type="text" name="direccion" placeholder="Direccion">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono *</label>
                        <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Teléfono">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electronico *</label>
                        <input id="email" class="form-control" type="text" name="email" placeholder="Correo electronico">
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pass">Contraseña *</label>
                                <input id="pass" class="form-control" type="password" name="pass" placeholder="Contraseña">
                            </div>                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="confirmar">Confirmar Contraseña *</label>
                                <input id="confirmar" class="form-control" type="password" name="confirmar" placeholder="Confirmar contraseña">
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="caja">Caja</label>
                        <select id="caja" class="form-control" name="caja">                            
                            <?php foreach ($data['cajas'] as $row) { ?>
                                <option value="<?php echo $row['ID_caja']; ?>"><?php echo $row['nombre_caja']; ?></option>
                            <?php } ?>
                        </select>
                    </div>  
                    <button class="btn btn-primary" type="button" onclick="registrarUser(event);">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>