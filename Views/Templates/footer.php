</div>
</main>
<footer class="py-3 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
        <div class="text-muted">Copyright &copy; Crea Sistema <?php echo date("Y") ?></div>
            <!-- <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div> -->
        </div>
    </div>
</footer>
        </div>
        </div>
        <div id="cambiarPass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title">Modificar contraseña</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id=frmCambiarPass onsubmit = "frmCambiarPass(event);">
                            <div class="form-group">
                                <label for="actual_pass">Contraseña actual</label>
                                <input id="actual_pass" class="form-control" type="password" name="actual_pass" placeholder= "Nueva actual">
                            </div>
                            <div class="form-group">
                                <label for="nueva_pass">Nueva Contraseña</label>
                                <input id="nueva_pass" class="form-control" type="password" name="nueva_pass" placeholder= "Nueva contraseña">
                            </div>
                            <div class="form-group">
                                <label for="confirmar_pass">Confirmar Contraseña</label>
                                <input id="confirmar_pass" class="form-control" type="password" name="confirmar_pass" placeholder= "Confirmar contraseña">
                            </div>
                            <button class="btn btn-primary" type="submit">Modificar</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url; ?>Assets/js/jquery-3.6.0.min.js"crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
        <script src="<?php echo base_url; ?>Assets/DataTables/datatables.min.js" crossorigin="anonymous"></script>       
        <script>
            const base_url = "<?php echo base_url; ?>";           //Almacenamos el base_url para poder acceder desde funcion.ccs 
        </script>    
        <script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
        <script src="<?php echo base_url; ?>Assets/js/select2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
        <!-- <script src="<?php echo base_url; ?>Assets/js/chart.umd.js"></script> -->

        
        <script src="<?php echo base_url; ?>Assets/js/funcion.js"></script>
    </body>
</html>