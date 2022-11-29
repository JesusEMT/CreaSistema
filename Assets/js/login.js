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
                //const res = JSON.parse(this.responseText);             
                const res= JSON.parse(this.responseText);               //parseamos 
                console.log(res);
                
                if (res =="ok") {                                     //Si la respuesta es ok abimos una vista
                    //console.log("entre");
                    window.location = base_url+ "Configurar/home";           //Se concatena al controlador, redireccion despues de login
                }else {
                    document.getElementById("alerta").classList.remove("d-none");
                    document.getElementById("alerta").innerHTML = res;
                }
            
            }
        }
    }
}