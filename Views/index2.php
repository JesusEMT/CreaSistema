<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<title>VLP VENTAS</title>
<link rel="shortcut icon" href="../creacosmetica.png">
<style>
* {margin: 0;padding: 0;box-sizing: border-box;color: #ddd;font-family: "Helvetica";}
body {min-height: 100vh;font-size: 16px;background: url(../public/img/fondo_web1.jpg) no-repeat center;background-size: cover;display: flex;justify-content: center;align-items: center;}
input, button {width: 100%;height: 52px;border: none;background-color: rgba(255, 255, 255, 0.15);outline: none;border-radius: 50px;}
.container {position: relative;width: 400px;padding: 24px;display: flex;flex-direction: column;align-items: center;}
.title {font-size: 1.8em;letter-spacing: 1px;margin-bottom: 30px;}
.social-login,
.social-login button,
.social-login i {display: flex;justify-content: center;align-items: center;}
.social-login button {justify-content: flex-start;width: 160px;margin: 4px;text-transform: uppercase;letter-spacing: 0.3px;
cursor: pointer;transition: background-color 0.3s;}
.social-login button:hover {background-color: rgba(255, 255, 255, 0.3);}
.social-login i {width: 36px;height: 36px;background-color: #fff;border-radius: 50%;font-size: 1.4em;margin: 10px;}
i.fa-facebook-f { color: #3b5998; }
i.fa-whatsapp { color: #40c351; }
.or {width: 100%;display: flex;justify-content: center;align-items: center;}
.or span {width: 100%;border-top: 1px dashed;margin: 24px;}
form {width: 100%;margin: 0 auto;}
.form-control { margin-bottom: 24px; }
.form-control label {display: block;letter-spacing: 0.5px;margin-bottom: 5px;}
.form-control input {letter-spacing: 0.5px;font-size: 1.1em;padding: 0 24px;text-align:center;}
.form-control input::placeholder {color: #ddd;}
button[type="submit"] {background-color:#f09f1f;color: #fff;font-size: 1.3em;font-weight: bolder;letter-spacing: 1px;
    cursor: pointer;margin: 0;transition: background-color 0.3s;}
button[type="submit"]:hover {background-color:#f09f1f;}
.additional-act {width: 100%;text-align: center;letter-spacing: 0.7px;margin: 8px;}
.additional-act span {color: #f09f1f;cursor: pointer;}
</style>
</head>

<body>

<div class="container">

<div class="loginBox">
<center><img src="../public/img/logo_ac.png" width="320"></center>
<script src="<?php echo base_url; ?>logo crea.png"></script>

<br>
<form id="frmLogin">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="usuario" name="usuario" type="text" placeholder="Ingrese usuario" />
                                                <label for="usuario">Usuario</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="pass" name="pass" type="password" placeholder="Ingrese contraseña" />
                                                <label for="pass">Contraseña</label>
                                            </div>
                                            <div class="alert alert-danger text-center d-none" id="alerta" role="alert">                                                
                                            </div>
                                            <div class="form group d-flex align-items-center justify-content-between mt-4 mb-0">                                            
                                               <button class="btn btn-primary" type="submit" onclick="frmLogin(event);">Entrar</button>
                                            </div>
                                        </form>
</div>

<!--<p class="or"> <span></span> Síguenos <span></span> </p>

<div class="social-login">
<button><i class="fab fa-facebook-f"></i>facebook</button>
<button><i class="fab fa-whatsapp"></i> Whatsapp</button>
</div>

<p class="additional-act">Dise&ntilde;o & Desarrollo: <span> Área Sistemas</span></p>
-->
</div>

<script src="<?php echo base_url; ?>Assets/js/jquery-3.6.1.min.js"crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
        <!-- <script src="<?php echo base_url; ?>Assets/js/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url; ?>Assets/demo/chart-bar-demo.js"></script> -->
        <script src="<?php echo base_url; ?>Assets/js/jquery.dataTables.min.js"></script>
        <!-- <script src="<?php echo base_url; ?>Assets/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script> -->
        <!-- <script src="<?php echo base_url; ?>Assets/demo/datatables-demo.js"></script> -->

        <script>
            const base_url = '<?php echo base_url; ?>';                             //Almacenamos el base_url para poder acceder desde funcion.ccs 
        </script>
        <script src="<?php echo base_url; ?>Assets/js/login.js"></script>

        
        
    </body>
</html>