
//datos tabla
let tblUsuarios, tblClientes;
//tabla usuarios
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
//tabla clientes
document.addEventListener("DOMContentLoaded", function(){       //Verica si documento ya se cargo
    tblClientes = $('#tblClientes').DataTable( {
        ajax: {
            url: base_url + "Clientes/listar",
            dataSrc: ''
        },
        columns: 
        [
           {'data': 'ID'},
           {'data': 'telefono'},
           {'data': 'nombre'},
           {'data': 'email'},
           {'data': 'direccion'},
           {'data': 'estado'},
           {'data': 'acciones'}     
        ]
    } );
})



//Abre modal para registrar nuevo usuario
function frmUsuario() {
    document.getElementById("title_modal").innerHTML = "Nuevo usuario";
    document.getElementById("btnAccionModel").innerHTML = "Registrar";
    document.getElementById("passYconf").classList.remove("d-none");            //remueve la funcion bootstrap de esconder 
    document.getElementById("frmUsuario").reset();                              //limpia formulario de registros de la funcion editar
    $("#nuevo_usuario").modal("show");    
    document.getElementById("id").value=""; 
}

//Registrar Usuario
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
    

    if ( usuario.value == "" || nombre.value == "" || direccion.value == "" || telefono.value == "" || email.value == "" ||
        caja.value == "") {        
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Llena todos los campos obligatoriose',
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
                      tblUsuarios.ajax.reload();                        //actuliza automaticamente la vista
                }else if (res=="modificado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Usuario modificado con exito',
                        showConfirmButton: false,
                        timer: 3000
                      })
                      $("#nuevo_usuario").modal("hide"); 
                      tblUsuarios.ajax.reload();
                }else{
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

function editarUser(ID_usuario) {
    document.getElementById("title_modal").innerHTML = "Actualizar usuario";  //cambia el titulo del modal con id=title_modal 
    document.getElementById("btnAccionModel").innerHTML = "Modificar";
    const url = base_url + "Usuarios/editar/"+ ID_usuario;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.ID_usuario;                       //"id" esta oculto en el modal es input hidden
            document.getElementById("usuario").value = res.clave_usuario;               //se cargan en el modal los elementos obtenidos de la base de datos
            document.getElementById("nombre").value = res.nombre_usuario;               //nombre de campo modal -- nombre de arg en base de datos
            document.getElementById("direccion").value = res.direccion_usuario;
            document.getElementById("telefono").value = res.telefono_usuario;
            document.getElementById("email").value = res.email_usuario;
            //document.getElementById("pass").value = res.password_usuario;
            document.getElementById("caja").value = res.id_caja;
            document.getElementById("passYconf").classList.add("d-none");               //esconde "passYconf" es el id del row que las contienen funcion Bootstrap
            $('#nuevo_usuario').modal('show');
        }
    }
}

function btnEliminarUser(ID_usuario){
    Swal.fire({
        title: '¿Esta seguro de eliminar?',
        text: "El usuario no se eliminara de forma permanente, solo cambiará a Inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/eliminar/"+ ID_usuario;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res=="ok") {
                        Swal.fire(            
                            'Mensaje',
                            'Usuario eliminado con éxito',
                            'success'
                        )
                        tblUsuarios.ajax.reload();                                          //recarga la tabla para ver cambios
                    }else{
                        Swal.fire(            
                            'Mensaje',
                            res,
                            'error'
                        )
                    }                  
                }
            }
          
        }
      })      
}

function btnReingresarUser(ID_usuario){
    Swal.fire({
        title: '¿Esta seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/reingresar/"+ ID_usuario;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res=="ok") {
                        Swal.fire(            
                            'Mensaje',
                            'Usuario reingresado con éxito',
                            'success'
                        )
                        tblUsuarios.ajax.reload();                                          //recarga la tabla para ver cambios
                    }else{
                        Swal.fire(            
                            'Mensaje',
                            res,
                            'error'
                        )
                    }                  
                }
            }
          
        }
      })
}
// Fin de Usuarios

//Abre modal para registrar nuevo Cliente
function frmCliente() {
    document.getElementById("title_modal").innerHTML = "Nuevo Cliente";
    document.getElementById("btnAccionModel").innerHTML = "Registrar";
    document.getElementById("frmCliente").reset();                              //limpia formulario de registros de la funcion editar
    $("#nuevo_cliente").modal("show");    
    document.getElementById("id").value=""; 
}

//Registrar Cliente
function registrarCli(e){
    e.preventDefault();
    const telefono = document.getElementById("telefono");         //Guarda en variables datos modal body frmUsuario de view/usuarios/index
    const nombre = document.getElementById("nombre");
    const email = document.getElementById("email");
    const direccion = document.getElementById("direccion");  
    

    if ( telefono.value == "" || nombre.value == "" || email.value == "" || direccion.value == "") {        
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Llena todos los campos obligatoriose',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url = base_url + "Clientes/registrar";                
        const frm = document.getElementById("frmCliente");
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
                        title: 'Cliente registrado con exito',
                        showConfirmButton: false,
                        timer: 3000
                      })
                      frm.reset();                                      //borramos formualrio
                      $("#nuevo_cliente").modal("hide");                //oculatmos el modal(nuevo_usuario) esta en view/index
                      tblClientes.ajax.reload();                        //actuliza automaticamente la vista
                }else if (res=="modificado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Cliente modificado con exito',
                        showConfirmButton: false,
                        timer: 3000
                      })
                      $("#nuevo_cliente").modal("hide"); 
                      tblClientes.ajax.reload();
                }else{
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

function editarCli(ID) {
    document.getElementById("title_modal").innerHTML = "Actualizar Cliente";  //cambia el titulo del modal con id=title_modal 
    document.getElementById("btnAccionModel").innerHTML = "Modificar";
    const url = base_url + "Clientes/editar/"+ ID;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.ID;                       //"id" esta oculto en el modal es input hidden
            document.getElementById("telefono").value = res.telefono;
            document.getElementById("nombre").value = res.nombre;               //nombre de campo modal -- nombre de arg en base de datos
            document.getElementById("email").value = res.email;
            document.getElementById("direccion").value = res.direccion;
            $('#nuevo_cliente').modal('show');
        }
    }
}

function btnEliminarCli(ID){
    Swal.fire({
        title: '¿Esta seguro de eliminar?',
        text: "El Cliente no se eliminara de forma permanente, solo cambiará a Inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Clientes/eliminar/"+ ID;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res=="ok") {
                        Swal.fire(            
                            'Mensaje',
                            'Cliente eliminado con éxito',
                            'success'
                        )
                        tblClientes.ajax.reload();                                          //recarga la tabla para ver cambios
                    }else{
                        Swal.fire(            
                            'Mensaje',
                            res,
                            'error'
                        )
                    }                  
                }
            }
          
        }
      })      
}

function btnReingresarCli(ID){
    Swal.fire({
        title: '¿Esta seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Clientes/reingresar/"+ ID;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res=="ok") {
                        Swal.fire(            
                            'Mensaje',
                            'Cliente reingresado con éxito',
                            'success'
                        )
                        tblClientes.ajax.reload();                                          //recarga la tabla para ver cambios
                    }else{
                        Swal.fire(            
                            'Mensaje',
                            res,
                            'error'
                        )
                    }                  
                }
            }
          
        }
      })
}