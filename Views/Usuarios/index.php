<?php include "Views/Templates/header.php"; ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Usuarios</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmUsuario();"> <i class= "fas fa-plus">  </i></button>

<div class="table-responsive">
<table class="table table-light" id= "tblUsuarios">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>A. Paterno.</th>
            <th>A. Materno</th>
            <th>Dirección</th>
            <th>Num</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Estado</th>
            <th></th>
            <!-- <th></th> -->
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

</div>

<div id="nuevo_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title_modal">Nuevo Usuario</h5>                
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmUsuario">                      
                    <div class="form-group">
                        <label for="usuario">Usuario *</label>
                        <input type="hidden" id="id" name="id">
                        <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario">
                    </div>                 
                    <div class="form-group ">
                        <label for="nombre">Nombre *</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group ">
                        <label for="paterno">Apellido paterno *</label>
                        <input id="paterno" class="form-control" type="text" name="paterno" placeholder="Apellido paterno">
                    </div>
                    <div class="form-group ">
                        <label for="materno">Apellido materno *</label>
                        <input id="materno" class="form-control" type="text" name="materno" placeholder="Apellido materno">
                    </div>

                    <div class="row" id="dirYnum">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="direccion">Dirección *</label>
                                <textarea id="direccion" class="form-control" name="direccion" placeholder="Dirección" rows="2"></textarea>

                            </div>                           
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="num">Número *</label>
                                <input id="num" class="form-control" type="number" name="num" placeholder="Núm.">
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="telefono">Telefono *</label>
                        <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Teléfono">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electronico *</label>
                        <input id="email" class="form-control" type="text" name="email" placeholder="Correo electronico">
                    </div>                    
                    <div class="row" id="passYconf">
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
                    <button class="btn btn-primary mt-2" type="button" onclick="registrarUser(event);" id="btnAccionModel">Registrar</button>
                    <button class="btn btn-danger mt-2" type="button"data-bs-dismiss="modal">Cancelar</button> 
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>