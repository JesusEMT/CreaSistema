<?php include "Views/Templates/header.php"; ?>
<div class="card-header text-white" style="background-color: #F08080;">
        <h4>Usuarios</h4>
    </div>
<button class="btn btn-primary mb-2 mt-3" type="button" onclick="frmUsuario();"> <i class= "fas fa-plus">  </i></button>

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
            <!-- <th>Rol</th> -->
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
                        <input id="usuario" class="form-control" type="text" maxlength="15" name="usuario" placeholder="Usuario">
                    </div>                 
                    <div class="form-group ">
                        <label for="nombre">Nombre *</label>
                        <input id="nombre" class="form-control" type="text" maxlength="30" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group ">
                        <label for="paterno">Apellido paterno *</label>
                        <input id="paterno" class="form-control" type="text" maxlength="30" name="paterno" placeholder="Apellido paterno">
                    </div>
                    <div class="form-group ">
                        <label for="materno">Apellido materno *</label>
                        <input id="materno" class="form-control" type="text" maxlength="30" name="materno" placeholder="Apellido materno">
                    </div>

                    <div class="row" id="dirYnum">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="direccion">Dirección *</label>
                                <textarea id="direccion" class="form-control" maxlength="30" name="direccion" placeholder="Dirección"  rows="1"></textarea>

                            </div>                           
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="num">Número *</label>
                                <input id="num" class="form-control" type="number" maxlength="10" min="1" name="num" placeholder="Núm." placeholder= "Precio Creación" onKeypress="if (event.keyCode < 48 || event.keyCode > 57 ) event.returnValue = false;">
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="telefono">Telefono *</label>
                        <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Teléfono" maxlength="15" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electronico *</label>
                        <input id="email" class="form-control" type="text" name="email" maxlength="30" placeholder="Correo electronico" >
                    </div>                    
                    <div class="row" id="passYconf">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pass">Contraseña *</label>
                                <input id="pass" class="form-control" type="password" maxlength="16" name="pass" placeholder="Contraseña" >
                            </div>                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="confirmar">Confirmar Contraseña *</label>
                                <input id="confirmar" class="form-control" type="password" maxlength="16" name="confirmar" placeholder="Confirmar contraseña">
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="caja">Rol</label>
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