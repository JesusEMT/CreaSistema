<?php include "Views/Templates/header.php"; ?>
<div class="card">
    <div class="card-header bg-dark text-white">
        Datos de la empresa
        <!-- <?php print_r($data); ?> -->
    </div>
    
    <div class="card-body">
        <form id="frmEmpresa">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <input id="id" class="form-control" type="hidden" name="id" value= "<?php echo $data['ID']; ?>">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" class="form-control" type="text" maxlength="30" name="nombre" value= "<?php echo $data['nombre']; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="rfc">RFC</label>
                    <input id="rfc" class="form-control" type="text" maxlength="20" name="rfc" placeholder="RFC" value="<?php echo $data['RFC']; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="telefono">Télefono</label>
                    <input id="telefono" class="form-control" maxlength="15" type="text" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;" name="telefono" placeholder="Télefono" value="<?php echo $data['telefono']; ?>">
                </div>
            </div>           
            <div class="col-md-5">
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input id="direccion" class="form-control" type="text" maxlength="20" name="direccion" placeholder="Dirección" value="<?php echo $data['direccion']; ?>">
                </div>                
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label for="num_dir_empresa">Núm.</label>
                    <input id="num_dir_empresa" class="form-control" type="text" maxlength="6" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;" name="num_dir_empresa"placeholder="Número" value="<?php echo $data['num_dir_empresa']; ?>">
                </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="correo">Email</label>
                        <input id="correo" class="form-control" type="text" maxlength="30" name="correo" placeholder="Correo electronico" value="<?php echo $data['email_empresa']; ?>">
                    </div>
                </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mensaje">Mensaje</label>
                    <textarea id="mensaje" class="form-control" maxlength="30" name="mensaje" rows="2" placeholder="Mensaje"><?php echo $data['mensaje']; ?></textarea>
                </div>
            </div>
        </div>
        
            <button class="btn btn-primary mt-4" type="button" onclick="modificarEmpresa()">Modificar</button>
        </form>
    </div>
</div>



<?php include "Views/Templates/footer.php"; ?>