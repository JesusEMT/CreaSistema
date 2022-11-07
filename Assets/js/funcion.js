let tblUsuarios;
document.addEventListener("DOMContentLoaded", function(){       //Verica si documento ya se cargo
    tblUsuarios = $('#tblUsuarios').DataTable( {
        ajax: {
            url: base_url + "Usuarios/listar",
            dataSrc: ''
        },
        columns: 
        [
           {'data': 'ID_usuario'},
           {'data': 'clave_usuario'},
           {'data': 'nombre_usuario'},
           {'data': 'direccion_usuario'},
           {'data': 'telefono_usuario'},
           {'data': 'email_usuario'},
           {'data': 'nombre_caja'},
           {'data': 'estado_usuario'},
           {'data': 'acciones'}     
        ]
    } );
})

function frmLogin(e){
    e.preventDefault();

    const usuario = document.getElementById("usuario");
    const pass = document.getElementById("pass");

    if (usuario.value == "") {
        pass.classList.remove("is-invalid");
        usuario.classList.add("is-invalid");
        usuario.focus();
    }else if (pass.value == "") {
        usuario.classList.remove("is-invalid");
        pass.classList.add("is-invalid");
        pass.focus()
    }else{
        const url = base_url + "Usuarios/validar";
        const frm = document.getElementById("frmLogin");
        const http = new XMLHttpRequest();                         
        http.open("POST", url, true);
        http.send(new FormData(frm));

        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                //console.log(this.responseText);
                //const res = JSON.parse(this.responseText);             //parseamos 
                const res= JSON.parse(this.responseText);
                console.log(res);
                
                if (res =="ok") {                                     //Si la respuesta es ok abimos una vista
                    //console.log("entre");
                    window.location = base_url + "Usuarios";           //Se concatena al controlador ya que por defecto ejecuta el metodo index
                }else {
                    document.getElementById("alerta").classList.remove("d-none");
                    document.getElementById("alerta").innerHTML = res;
                }
            
            }
        }
    }
}

function frmUsuario() {
    $("#nuevo_usuario").modal("show");    
}

function registrarUser(e){
    e.preventDefault();

    const usuario = document.getElementById("usuario");         //Guarda en variables datos modal body frmUsuario de view/usuarios/index
    const nombre = document.getElementById("nombre");
    const direccion = document.getElementById("direccion");
    const telefono = document.getElementById("telefono");
    const email = document.getElementById("email");    
    const pass = document.getElementById("pass");
    const confirmar = document.getElementById("confirmar");                     //Campo confirmar contraseña de formualrio de index
    const caja = document.getElementById("caja");  

    if (usuario.value == "" || nombre.value == ""|| direccion.value == "" || telefono.value == "" || email.value == "" || pass.value == "" || confirmar.value == ""|| caja.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Llena todos los campos obligatorios',
            showConfirmButton: false,
            timer: 3000
          })
    }else if (pass.value != confirmar.value) {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Las contraseñas no coinciden',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url = base_url + "Usuarios/registrar";                
        const frm = document.getElementById("frmUsuario");
        const http = new XMLHttpRequest();                            //instancia objeto XMLHTTPRequest
        http.open("POST", url, true);                                 //Por metodo post enviamos url con true indicamos que de manera asincrona
        http.send(new FormData(frm));                                 //se envia al formulario

        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                //console.log(this.responseText);
                const res = JSON.parse(this.responseText);             //parseamos 
                if (res =="si") {                                     //Si la respuesta es si 
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Usuario registrado con exito',
                        showConfirmButton: false,
                        timer: 3000
                      })
                      frm.reset();                                      //borramos formualrio
                      $("#nuevo_usuario").modal("hide");                //oculatmos el modal(nuevo_usuario) esta en view/index
                }else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                      }) 
                }
            
            }
        }
    }
}
