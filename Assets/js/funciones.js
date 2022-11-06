function frmLogin(e){
    e.preventDefault();
    const usuario = document.getElementById("usuario");
    const pass = document.getElementById("pass");
    
    if (usuario.value == "") {
        pass.classList.remove("is-invalid");
        usuario.classList.add("is-invalid");
        usuario.focus();
    } else if (clave.value == "") {
        usuario.classList.remove("is-invalid");
        pass.classList.add("is-invalid");
        pass.focus()
    }
    

}