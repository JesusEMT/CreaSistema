
// tablas para listar datos
let tblUsuarios, tblClientes, tblCajas, tblMedidas, tblCategorias, tblProductos, tblIngredientes, tblCompras, tbl_historial_ventas;

document.addEventListener("DOMContentLoaded", function(){       //Verica si documento ya se cargo
    
    $('#SelectCliente').select2();  

    // $(document).on('change', '#SelectCliente', function() {
    //     var r = $('select.form-control option[value="'+$(this).val()+'"]').attr("data-typeid")
    //     $("direccion_VCli").val(r)
    //     });

        // const nombreCliVen = document.querySelector('#SelectCliente');
        // // console.log(nombreCliVen);

        // nombreCliVen.addEventListener('change', () =>{
        //     let valorOption = nombreCliVen.value;
        //     console.log(valorOption);
            
        //     // var optionSelect = nombreCliVen.options[nombreCliVen.selectedIndex];
            
        //     // console.log("ID:", optionSelect.value);
        //     // console.log("telefono:", optionSelect.text);


        //     // let inputResult  = document.querySelector('#direccion_VCli').value =(optionSelect.text)+'-'+optionSelect.value ;


        // });






   

    // $("#SelectCliente").select2({
    // //     tags: true
    // // theme: 'bootstrap',
    // // placeholder: "Buscar proveedor",
    // // minimumInputLength: 1
    //   }) 
  
   //tabla usuarios
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
           {'data': 'paterno_usuario'},
           {'data': 'materno_usuario'},
           {'data': 'direccion_usuario'},
           {'data': 'num_dir'},
           {'data': 'telefono_usuario'},
           {'data': 'email_usuario'},
        //    {'data': 'nombre_caja'},
           {'data': 'estado_usuario'},
           {'data': 'acciones'}     
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
            //Bot??n para Excel
            extend: 'excelHtml5',
            footer: true,
            title: 'Archivo',
            filename: 'Export_File',

            //Aqu?? es donde generas el bot??n personalizado
            text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
        },
        //Bot??n para PDF
        {
            extend: 'pdfHtml5',
            download: 'open',
            footer: true,
            title: 'Reporte de usuarios',
            filename: 'Reporte de usuarios',
            text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
            exportOptions: {
                columns: [0, ':visible']
            }
        },
        //Bot??n para copiar
        {
            extend: 'copyHtml5',
            footer: true,
            title: 'Reporte de usuarios',
            filename: 'Reporte de usuarios',
            text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
            exportOptions: {
                columns: [0, ':visible']
            }
        },
        //Bot??n para print
        {
            extend: 'print',
            footer: true,
            filename: 'Export_File_print',
            text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
        },
        //Bot??n para cvs
        {
            extend: 'csvHtml5',
            footer: true,
            filename: 'Export_File_csv',
            text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
        },
        {
            extend: 'colvis',
            text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
            // postfixButtons: ['colvisRestore']
        }
        ]
    } );

    //tabla clientes   
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
           {'data': 'paterno_cli'},
           {'data': 'materno_cli'},
           {'data': 'email'},
           {'data': 'direccion'},
           {'data': 'num_dir_cli'},
           {'data': 'estado'},
           {'data': 'acciones'}     
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
            //Bot??n para Excel
            extend: 'excelHtml5',
            footer: true,
            title: 'Archivo',
            filename: 'Export_File',

            //Aqu?? es donde generas el bot??n personalizado
            text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
        },
        //Bot??n para PDF
        {
            extend: 'pdfHtml5',
            download: 'open',
            footer: true,
            title: 'Reporte de usuarios',
            filename: 'Reporte de usuarios',
            text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
            exportOptions: {
                columns: [0, ':visible']
            }
        },
        //Bot??n para copiar
        {
            extend: 'copyHtml5',
            footer: true,
            title: 'Reporte de usuarios',
            filename: 'Reporte de usuarios',
            text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
            exportOptions: {
                columns: [0, ':visible']
            }
        },
        //Bot??n para print
        {
            extend: 'print',
            footer: true,
            filename: 'Export_File_print',
            text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
        },
        //Bot??n para cvs
        {
            extend: 'csvHtml5',
            footer: true,
            filename: 'Export_File_csv',
            text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
        },
        {
            extend: 'colvis',
            text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
            //postfixButtons: ['colvisRestore']
        }
        ]
    } );

    //tabla Medidas
    tblMedidas = $('#tblMedidas').DataTable( {
        ajax: {
            url: base_url + "Medidas/listar",
            dataSrc: ''
        },
        columns: 
        [
           {'data': 'ID'},
           {'data': 'nombre'},
           {'data': 'nombre_corto'},
           {'data': 'estado'},
           {'data': 'acciones'}     
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
            //Bot??n para Excel
            extend: 'excelHtml5',
            footer: true,
            title: 'Archivo',
            filename: 'Export_File',

            //Aqu?? es donde generas el bot??n personalizado
            text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
        },
        //Bot??n para PDF
        {
            extend: 'pdfHtml5',
            download: 'open',
            footer: true,
            title: 'Reporte de usuarios',
            filename: 'Reporte de usuarios',
            text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
            exportOptions: {
                columns: [0, ':visible']
            }
        },
        //Bot??n para copiar
        {
            extend: 'copyHtml5',
            footer: true,
            title: 'Reporte de usuarios',
            filename: 'Reporte de usuarios',
            text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
            exportOptions: {
                columns: [0, ':visible']
            }
        },
        //Bot??n para print
        {
            extend: 'print',
            footer: true,
            filename: 'Export_File_print',
            text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
        },
        //Bot??n para cvs
        {
            extend: 'csvHtml5',
            footer: true,
            filename: 'Export_File_csv',
            text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
        },
        {
            extend: 'colvis',
            text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
            //postfixButtons: ['colvisRestore']
        }
        ]
    } );

    //tabla Categorias
    tblCategorias = $('#tblCategorias').DataTable( {
        ajax: {
            url: base_url + "Categorias/listar",
            dataSrc: ''
        },
        columns: 
        [
           {'data': 'ID'},
           {'data': 'nombre'},
           {'data': 'estado'},
           {'data': 'acciones'}     
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
            //Bot??n para Excel
            extend: 'excelHtml5',
            footer: true,
            title: 'Archivo',
            filename: 'Export_File',

            //Aqu?? es donde generas el bot??n personalizado
            text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
        },
        //Bot??n para PDF
        {
            extend: 'pdfHtml5',
            download: 'open',
            footer: true,
            title: 'Reporte de usuarios',
            filename: 'Reporte de usuarios',
            text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
            exportOptions: {
                columns: [0, ':visible']
            }
        },
        //Bot??n para copiar
        {
            extend: 'copyHtml5',
            footer: true,
            title: 'Reporte de usuarios',
            filename: 'Reporte de usuarios',
            text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
            exportOptions: {
                columns: [0, ':visible']
            }
        },
        //Bot??n para print
        {
            extend: 'print',
            footer: true,
            filename: 'Export_File_print',
            text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
        },
        //Bot??n para cvs
        {
            extend: 'csvHtml5',
            footer: true,
            filename: 'Export_File_csv',
            text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
        },
        {
            extend: 'colvis',
            text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
            //postfixButtons: ['colvisRestore']
        }
        ]
    } );

    //tabla Productos
    tblProductos = $('#tblProductos').DataTable( {
        ajax: {
            url: base_url + "Productos/listar",
            dataSrc: ''
        },
        columns: 
        [
           {'data': 'ID'},
           {'data': 'codigo'},
           {'data': 'nombre'},
           {'data': 'categoria'},
           {'data': 'precio_venta'},
           {'data': 'cantidad'},
           {'data': 'estado'},
           {'data': 'acciones'}     
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
            //Bot??n para Excel
            extend: 'excelHtml5',
            footer: true,
            title: 'Archivo',
            filename: 'Export_File',

            //Aqu?? es donde generas el bot??n personalizado
            text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
        },
        //Bot??n para PDF
        {
            extend: 'pdfHtml5',
            download: 'open',
            footer: true,
            title: 'Reporte de usuarios',
            filename: 'Reporte de usuarios',
            text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
            exportOptions: {
                columns: [0, ':visible']
            }
        },
        //Bot??n para copiar
        {
            extend: 'copyHtml5',
            footer: true,
            title: 'Reporte de usuarios',
            filename: 'Reporte de usuarios',
            text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
            exportOptions: {
                columns: [0, ':visible']
            }
        },
        //Bot??n para print
        {
            extend: 'print',
            footer: true,
            filename: 'Export_File_print',
            text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
        },
        //Bot??n para cvs
        {
            extend: 'csvHtml5',
            footer: true,
            filename: 'Export_File_csv',
            text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
        },
        {
            extend: 'colvis',
            text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
            //postfixButtons: ['colvisRestore']
        }
        ]
    } );

    //tabla Ingredientes
    tblIngredientes = $('#tblIngredientes').DataTable( {
        ajax: {
            url: base_url + "Ingredientes/listar",
            dataSrc: ''
        },
        columns: 
        [
           {'data': 'ID'},
           {'data': 'codigo'},
           {'data': 'nombre'},
           {'data': 'cantidad'},
           {'data': 'Abreviatura'},
           {'data': 'estado'},
           {'data': 'acciones'}     
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
            //Bot??n para Excel
            extend: 'excelHtml5',
            footer: true,
            title: 'Archivo',
            filename: 'Export_File',

            //Aqu?? es donde generas el bot??n personalizado
            text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
        },
        //Bot??n para PDF
        {
            extend: 'pdfHtml5',
            download: 'open',
            footer: true,
            title: 'Reporte de usuarios',
            filename: 'Reporte de usuarios',
            text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
            exportOptions: {
                columns: [0, ':visible']
            }
        },
        //Bot??n para copiar
        {
            extend: 'copyHtml5',
            footer: true,
            title: 'Reporte de usuarios',
            filename: 'Reporte de usuarios',
            text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
            exportOptions: {
                columns: [0, ':visible']
            }
        },
        //Bot??n para print
        {
            extend: 'print',
            footer: true,
            filename: 'Export_File_print',
            text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
        },
        //Bot??n para cvs
        {
            extend: 'csvHtml5',
            footer: true,
            filename: 'Export_File_csv',
            text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
        },
        {
            extend: 'colvis',
            text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
            //postfixButtons: ['colvisRestore']
        }
        ]
    } );

    //tabla Compras/a??adir producto a stock
    tblCompras = $('#tblCompras').DataTable( {
        ajax: {
            url: base_url + "IngresarProducto/listar",
            dataSrc: ''
        },
        columns: 
        [
        //    {'data': 'ID'},
           {'data': 'codigo'},
           {'data': 'nombre'},
           {'data': 'cantidad'},
           {'data': 'estado'} 
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        }
    } );

    //tabla Historial_compras
    $('#tbl_historial_compras').DataTable( {
        ajax: {
            url: base_url + "IngresarProducto/listar_historial",
            dataSrc: ''
        },
        columns: 
        [
           {'data': 'ID'},
           {'data': 'codigo'},
           {'data': 'Nom_pro'},
           {'data': 'cantidad'},
           {'data': 'fecha'},
           {'data': 'estado'},            
           {'data': 'acciones'}  
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
            //Bot??n para Excel
            extend: 'excelHtml5',
            footer: true,
            title: 'Archivo',
            filename: 'Export_File',

            //Aqu?? es donde generas el bot??n personalizado
            text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
        },
        //Bot??n para PDF
        {
            extend: 'pdfHtml5',
            download: 'open',
            footer: true,
            title: 'Reporte de usuarios',
            filename: 'Reporte de usuarios',
            text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
            exportOptions: {
                columns: [0, ':visible']
            }
        },
        //Bot??n para copiar
        {
            extend: 'copyHtml5',
            footer: true,
            title: 'Reporte de usuarios',
            filename: 'Reporte de usuarios',
            text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
            exportOptions: {
                columns: [0, ':visible']
            }
        },
        //Bot??n para print
        {
            extend: 'print',
            footer: true,
            filename: 'Export_File_print',
            text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
        },
        //Bot??n para cvs
        {
            extend: 'csvHtml5',
            footer: true,
            filename: 'Export_File_csv',
            text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
        },
        {
            extend: 'colvis',
            text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
            //postfixButtons: ['colvisRestore']
        }
        ]
    } );

    //tabla Historial Ventas
    tbl_historial_ventas= $('#tbl_historial_ventas').DataTable( {
        ajax: {
            url: base_url + "Ventas/listar_historial",
            dataSrc: ''
        },
        columns: 
        [
           {'data': 'ID'},
           {'data': 'nombre_cli'},
           {'data': 'total'},
           {'data': 'fecha'}, 
           {'data': 'estado'},          
           {'data': 'acciones'}  
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
            //Bot??n para Excel
            extend: 'excelHtml5',
            footer: true,
            title: 'Archivo',
            filename: 'Export_File',

            //Aqu?? es donde generas el bot??n personalizado
            text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
        },
        //Bot??n para PDF
        {
            extend: 'pdfHtml5',
            download: 'open',
            footer: true,
            title: 'Reporte de usuarios',
            filename: 'Reporte de usuarios',
            text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
            exportOptions: {
                columns: [0, ':visible']
            }
        },
        //Bot??n para copiar
        {
            extend: 'copyHtml5',
            footer: true,
            title: 'Reporte de usuarios',
            filename: 'Reporte de usuarios',
            text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
            exportOptions: {
                columns: [0, ':visible']
            }
        },
        //Bot??n para print
        {
            extend: 'print',
            footer: true,
            filename: 'Export_File_print',
            text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
        },
        //Bot??n para cvs
        {
            extend: 'csvHtml5',
            footer: true,
            filename: 'Export_File_csv',
            text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
        },
        {
            extend: 'colvis',
            text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
            //postfixButtons: ['colvisRestore']
        }
        ]
    } );

})

//+++++cambiar password++++

function frmCambiarPass(e) {

    e.preventDefault();

    const pass_actual = document.getElementById('actual_pass').value;
    const nueva_pass = document.getElementById('nueva_pass').value;
    const confirmar_pass = document.getElementById('confirmar_pass').value;

    if (pass_actual == '' || nueva_pass == '' || confirmar_pass == '') {
        Swal.fire({
            position: 'top-end',
            icon: 'warning',
            title: 'Llena todos los campos obligatorios',
            showConfirmButton: false,
            timer: 3000
          })        
    }else{
        if (nueva_pass != confirmar_pass) {
            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                title: 'Contrase??as no coinciden',
                showConfirmButton: false,
                timer: 3000
              })  
        }else{
            const url = base_url + "Usuarios/cambiarPass";                
            const frm = document.getElementById("frmCambiarPass");
            const http = new XMLHttpRequest();                            //instancia objeto XMLHTTPRequest
            http.open("POST", url, true);                                 //Por metodo post enviamos url con true indicamos que de manera asincrona
            http.send(new FormData(frm));                                 //se envia al formulario
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // console.log(this.responseText);
                    const res = JSON.parse(this.responseText);             //parseamos 
                    if (res=="modificado") {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Usuario modificado con ??xito',
                            showConfirmButton: false,
                            timer: 3000
                          })
                          $("#cambiarPass").modal("hide"); 
                          frm.reset();
                    }else{
                        Swal.fire({
                            position: 'top-end',
                            icon: 'warning',
                            title: res,
                            showConfirmButton: false,
                            timer: 3000
                        }) 
                    }
                
                }
            }

        }
         

    }
    
}


//----------------------------------------------------------------------------------------------------

//Usuarios
function frmUsuario() {
    document.getElementById("title_modal").innerHTML = "Nuevo usuario";
    document.getElementById("btnAccionModel").innerHTML = "Registrar";
    document.getElementById("passYconf").classList.remove("d-none");            //remueve la funcion bootstrap de esconder 
    document.getElementById("frmUsuario").reset();                              //limpia formulario de registros de la funcion editar
    $("#nuevo_usuario").modal("show");    
    document.getElementById("id").value=""; 
}

function registrarUser(e){
    e.preventDefault();
    const usuario = document.getElementById("usuario");         //Guarda en variables datos modal body frmUsuario de view/usuarios/index
    const nombre = document.getElementById("nombre");
    const paterno = document.getElementById("paterno");
    const materno = document.getElementById("materno");
    const direccion = document.getElementById("direccion");
    const num = document.getElementById("num");
    const telefono = document.getElementById("telefono");
    const email = document.getElementById("email");    
    const pass = document.getElementById("pass");
    const confirmar = document.getElementById("confirmar");                     //Campo confirmar contrase??a de formualrio de index
    const caja = document.getElementById("caja");  
    

    if ( usuario.value == "" || nombre.value == "" || paterno.value == "" || materno.value == "" || direccion.value == "" || num.value == ""|| telefono.value == "" || email.value == "" ||
        caja.value == "") {        
            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                title: 'Llena todos los campos obligatorios',
                showConfirmButton: false,
                timer: 3000
              })
        }else if (pass.value != confirmar.value) {
            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                title: 'Las contrase??as no coinciden',
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
            document.getElementById("paterno").value = res.paterno_usuario;
            document.getElementById("materno").value = res.materno_usuario;
            document.getElementById("direccion").value = res.direccion_usuario;
            document.getElementById("num").value = res.num_dir;
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
        title: '??Esta seguro de dar de baja a usuario?',
        text: "El usuario no se eliminara de forma permanente, solo cambiar?? a Inactivo",
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
                            'Usuario dado de baja con ??xito',
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
        title: '??Esta seguro de reingresar?',
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
                            'Usuario reingresado con ??xito',
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
// Fin de Usuarios-----------------------------------------------------------

// Clientes
function frmCliente() {
    document.getElementById("title_modal").innerHTML = "Nuevo Cliente";
    document.getElementById("btnAccionModel").innerHTML = "Registrar";
    document.getElementById("frmCliente").reset();                              //limpia formulario de registros de la funcion editar
    document.getElementById("id").value=""; 
    $("#nuevo_cliente").modal("show");    
}

function registrarCli(e){
    e.preventDefault();
    const telefono = document.getElementById("telefono");         //Guarda en variables datos modal body frmUsuario de view/usuarios/index
    const nombre = document.getElementById("nombre");
    const paterno = document.getElementById("paterno");
    const materno = document.getElementById("materno");
    const email = document.getElementById("email");
    const direccion = document.getElementById("direccion");
    const num = document.getElementById("num");
    

    if ( telefono.value == "" || nombre.value == "" || paterno.value == "" || materno.value == "") {        
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Llena todos los campos obligatorios',
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
                // console.log(this.responseText);
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
            document.getElementById("paterno").value = res.paterno_cli; 
            document.getElementById("materno").value = res.materno_cli; 
            document.getElementById("email").value = res.email;
            document.getElementById("direccion").value = res.direccion;
            document.getElementById("num").value = res.num_dir_cli; 
            $('#nuevo_cliente').modal('show');
        }
    }
}

function btnEliminarCli(ID){
    Swal.fire({
        title: '??Esta seguro de eliminar?',
        text: "El Cliente no se eliminara de forma permanente, solo cambiar?? a Inactivo",
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
                            'Cliente eliminado con ??xito',
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
        title: '??Esta seguro de reingresar?',
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
                            'Cliente reingresado con ??xito',
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
// Fin de Cliente--------------------------------------------------------------


//Medidas---------------
function frmMedida() {
    document.getElementById("title_modal").innerHTML = "Nueva medida";
    document.getElementById("btnAccionModel").innerHTML = "Registrar";
    document.getElementById("frmMedida").reset();                              //limpia formulario de registros de la funcion editar
    $("#nuevo_medida").modal("show");    
    document.getElementById("id").value=""; 
}

function registrarMedida(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    const nombre_corto = document.getElementById("nombre_corto");    

    if ( nombre.value == "" || nombre_corto.value == "" ) {        
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Llena todos los campos obligatorios',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url = base_url + "Medidas/registrar";                
        const frm = document.getElementById("frmMedida");
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
                        title: 'Medida registrada con exito',
                        showConfirmButton: false,
                        timer: 3000
                      })
                      frm.reset();                                      //borramos formualrio
                      $("#nuevo_medida").modal("hide");                //oculatmos el modal(nuevo_usuario) esta en view/index
                      tblMedidas.ajax.reload();                        //actuliza automaticamente la vista
                }else if (res=="modificado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Medida modificada con exito',
                        showConfirmButton: false,
                        timer: 3000
                      })
                      $("#nuevo_medida").modal("hide"); 
                      tblMedidas.ajax.reload();
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

function btnEditarMedida(ID) {
    document.getElementById("title_modal").innerHTML = "Actualizar Medida";  //cambia el titulo del modal con id=title_modal 
    document.getElementById("btnAccionModel").innerHTML = "Modificar";
    const url = base_url + "Medidas/editar/"+ ID;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.ID;                       //"id" esta oculto en el modal es input hidden
            document.getElementById("nombre").value = res.nombre;               //nombre de campo modal -- nombre de arg en base de datos
            document.getElementById("nombre_corto").value = res.nombre_corto;
            $('#nuevo_medida').modal('show');
        }
    }
}

function btnEliminarMedida(ID){
    Swal.fire({
        title: '??Esta seguro de eliminar?',
        text: "La medida no se eliminara de forma permanente, solo cambiar?? a Inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Medidas/eliminar/"+ ID;
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
                            'Medida eliminada con ??xito',
                            'success'
                        )
                        tblMedidas.ajax.reload();                                          //recarga la tabla para ver cambios
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

function btnReingresarMedida(ID){
    Swal.fire({
        title: '??Esta seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Medidas/reingresar/"+ ID;
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
                            'Medida reingresada con ??xito',
                            'success'
                        )
                        tblMedidas.ajax.reload();                                          //recarga la tabla para ver cambios
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
// Fin medidas

//Categorias---------------
function frmCategoria() {
    document.getElementById("title_modal").innerHTML = "Nueva Categoria";
    document.getElementById("btnAccionModel").innerHTML = "Registrar";
    document.getElementById("frmCategoria").reset();                              //limpia formulario de registros de la funcion editar
    document.getElementById("id").value=""; 
    $("#nuevo_categoria").modal("show");    
}

function registrarCat(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");    

    if ( nombre.value == "") {        
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Llena todos los campos obligatorios',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url = base_url + "Categorias/registrar";                
        const frm = document.getElementById("frmCategoria");
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
                        title: 'Categoria registrada con exito',
                        showConfirmButton: false,
                        timer: 3000
                      })
                      frm.reset();                                      //borramos formualrio
                      $("#nuevo_categoria").modal("hide");                //oculatmos el modal(nuevo_usuario) esta en view/index
                      tblCategorias.ajax.reload();                        //actuliza automaticamente la vista
                }else if (res=="modificado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Categoria modificada con exito',
                        showConfirmButton: false,
                        timer: 3000
                      })
                      $("#nuevo_categoria").modal("hide"); 
                      tblCategorias.ajax.reload();
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

function btnEditarCat(ID) {
    document.getElementById("title_modal").innerHTML = "Actualizar Categoria";  //cambia el titulo del modal con id=title_modal 
    document.getElementById("btnAccionModel").innerHTML = "Modificar";
    const url = base_url + "Categorias/editar/"+ ID;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.ID;                       //"id" esta oculto en el modal es input hidden
            document.getElementById("nombre").value = res.nombre;               //nombre de campo modal -- nombre de arg en base de datos

            $('#nuevo_categoria').modal('show');
        }
    }
}

function btnEliminarCat(ID){
    Swal.fire({
        title: '??Esta seguro de eliminar?',
        text: "La categoria no se eliminara de forma permanente, solo cambiar?? a Inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Categorias/eliminar/"+ ID;
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
                            'Categoria eliminada con ??xito',
                            'success'
                        )
                        tblCategorias.ajax.reload();                                          //recarga la tabla para ver cambios
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

function btnReingresarCat(ID){
    Swal.fire({
        title: '??Esta seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Categorias/reingresar/"+ ID;
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
                            'Categoria reingresada con ??xito',
                            'success'
                        )
                        tblCategorias.ajax.reload();                                          //recarga la tabla para ver cambios
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
// Fin categorias

//Producto----------------------------------------
function frmProducto() {
    document.getElementById("title_modal").innerHTML = "Nuevo Producto";
    document.getElementById("btnAccionModel").innerHTML = "Registrar";
    document.getElementById("frmProducto").reset();                              //limpia formulario de registros de la funcion editar
    document.getElementById("id").value=""; 
    $("#nuevo_producto").modal("show");    
}

function registrarPro(e){
    e.preventDefault();
    const codigo = document.getElementById("codigo");         //Guarda en variables datos modal body frmProducto de view/usuarios/index
    const nombre = document.getElementById("nombre");
    // const descripcion = document.getElementById("descripcion");
    const precio_creacion = document.getElementById("precio_creacion");
    const precio_venta = document.getElementById("precio_venta");    
    // const medida = document.getElementById("medida");
    const categoria = document.getElementById("categoria");   
                   
    

    if ( codigo.value == "" || nombre.value == "" || precio_creacion.value == "" || precio_venta.value == "" ||
        categoria.value == "") {        
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Llena todos los campos obligatorios',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url = base_url + "Productos/registrar";                
        const frm = document.getElementById("frmProducto");
        const http = new XMLHttpRequest();                            //instancia objeto XMLHTTPRequest
        http.open("POST", url, true);                                 //Por metodo post enviamos url con true indicamos que de manera asincrona
        http.send(new FormData(frm));                                 //se envia al formulario

        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // console.log(this.responseText);
                const res = JSON.parse(this.responseText);             //parseamos 
                if (res =="si") {                                     //Si la respuesta es si 
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Producto registrado con exito',
                        showConfirmButton: false,
                        timer: 3000
                      })
                      frm.reset();                                      //borramos formualrio
                      $("#nuevo_producto").modal("hide");                //oculatmos el modal(nuevo_usuario) esta en view/index
                      tblProductos.ajax.reload();                        //actuliza automaticamente la vista
                }else if (res=="modificado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Producto modificado con exito',
                        showConfirmButton: false,
                        timer: 3000
                      })
                      $("#nuevo_producto").modal("hide"); 
                      tblProductos.ajax.reload();
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

function btnEditarPro(ID) {
    document.getElementById("title_modal").innerHTML = "Actualizar Producto";  //cambia el titulo del modal con id=title_modal 
    document.getElementById("btnAccionModel").innerHTML = "Modificar";
    const url = base_url + "Productos/editar/"+ ID;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.ID;                       //"id" esta oculto en el modal es input hidden
            document.getElementById("codigo").value = res.codigo;               //se cargan en el modal los elementos obtenidos de la base de datos
            document.getElementById("nombre").value = res.nombre;               //nombre de campo modal -- nombre de arg en base de datos
            // document.getElementById("descripcion").value = res.descripcion;
            document.getElementById("precio_creacion").value = res.precio_creacion;            
            document.getElementById("precio_venta").value = res.precio_venta;
            // document.getElementById("medida").value = res.id_medida;
            document.getElementById("categoria").value = res.id_categoria;
            $('#nuevo_producto').modal('show');
        }
    }
}

function btnEliminarPro(ID){
    Swal.fire({
        title: '??Esta seguro de eliminar?',
        text: "El Producto no se eliminara de forma permanente, solo cambiar?? a Inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Productos/eliminar/"+ ID;
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
                            'Producto eliminado con ??xito',
                            'success'
                        )
                        tblProductos.ajax.reload();                                          //recarga la tabla para ver cambios
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

function btnReingresarPro(ID){
    Swal.fire({
        title: '??Esta seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Productos/reingresar/"+ ID;
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
                            'Producto reingresado con ??xito',
                            'success'
                        )
                        tblProductos.ajax.reload();                                          //recarga la tabla para ver cambios
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

function previsualizar(e) {
    const url= e.target.files;    
}
//Fin Productos-------------------------------------------------------------

//Ingredientes----------------------------------------
function frmIngrediente() {
    document.getElementById("title_modal").innerHTML = "Nuevo Ingrediente";
    document.getElementById("btnAccionModel").innerHTML = "Registrar";
    document.getElementById("frmIngrediente").reset();                              //limpia formulario de registros de la funcion editar
    document.getElementById("id").value=""; 
    $("#nuevo_ingrediente").modal("show");    
}

function registrarIngre(e){
    e.preventDefault();
    const codigo = document.getElementById("codigo");         //Guarda en variables datos modal body frmProducto de view/usuarios/index
    const nombre = document.getElementById("nombre");
    // const medida = document.getElementById("medida");
    const cantidad = document.getElementById("cantidad");                
    

    if ( codigo.value == "" || nombre.value == "" || cantidad.value == "" ) {        
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Llena todos los campos obligatorios',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url = base_url + "Ingredientes/registrar";                
        const frm = document.getElementById("frmIngrediente");
        const http = new XMLHttpRequest();                            //instancia objeto XMLHTTPRequest
        http.open("POST", url, true);                                 //Por metodo post enviamos url con true indicamos que de manera asincrona
        http.send(new FormData(frm));                                 //se envia al formulario

        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // console.log(this.responseText);
                const res = JSON.parse(this.responseText);             //parseamos 
                if (res =="si") {                                     //Si la respuesta es si 
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Ingrediente registrado con exito',
                        showConfirmButton: false,
                        timer: 3000
                      })
                      frm.reset();                                      //borramos formualrio
                      $("#nuevo_ingrediente").modal("hide");                //oculatmos el modal(nuevo_usuario) esta en view/index
                      tblIngredientes.ajax.reload();                        //actuliza automaticamente la vista
                }else if (res=="modificado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Ingrediente modificado con exito',
                        showConfirmButton: false,
                        timer: 3000
                      })
                      $("#nuevo_ingrediente").modal("hide"); 
                      tblIngredientes.ajax.reload();
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

function btnEditarIngre(ID) {
    
    document.getElementById("title_modal").innerHTML = "Actualizar Ingrediente";  //cambia el titulo del modal con id=title_modal 
    document.getElementById("btnAccionModel").innerHTML = "Modificar";
    const url = base_url + "Ingredientes/editar/"+ ID;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.ID;                       //"id" esta oculto en el modal es input hidden
            document.getElementById("codigo").value = res.codigo;               //se cargan en el modal los elementos obtenidos de la base de datos
            document.getElementById("nombre").value = res.nombre;               //nombre de campo modal -- nombre de arg en base de datos
            // document.getElementById("medida").value = res.id_medida;
            document.getElementById("cantidad").value = res.cantidad;
            $('#nuevo_ingrediente').modal('show');
        }
    }
}

function btnEliminarIngre(ID){
    Swal.fire({
        title: '??Esta seguro de eliminar?',
        text: "El Ingrediente no se eliminara de forma permanente, solo cambiar?? a Inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Ingredientes/eliminar/"+ ID;
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
                            'Ingrediente eliminado con ??xito',
                            'success'
                        )
                        tblIngredientes.ajax.reload();                                          //recarga la tabla para ver cambios
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

function btnReingresarIngre(ID){
    Swal.fire({
        title: '??Esta seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Ingredientes/reingresar/"+ ID;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res=="ok") {
                        
                        
                        tblIngredientes.ajax.reload();                                          //recarga la tabla para ver cambios
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

//Fin Ingredientes -------------------------------------------------------------


//****************  Agregar prodcto a stock /compras ************************************

function frmCompra() {
    document.getElementById("title_modal").innerHTML = "Nueva";
    document.getElementById("btnAgregar").innerHTML = "Agregar";
    document.getElementById("frmCompra").reset();                              //limpia formulario de registros de la funcion editar
    document.getElementById("id").value=""; 
    // $("#nuevo_producto").modal("show");    
}

function buscarCodigo(e) {
    e.preventDefault();

    // if (e.which == 13 ) {                                                //al presionar tecla enter
        const cod = document.getElementById("codigo").value;
        const url = base_url + "IngresarProducto/buscar/"+ cod;                  // controlador/metodo/argumentos

        const http = new XMLHttpRequest();                            //instancia objeto XMLHTTPRequest
        http.open("GET", url, true);                                 //Por metodo post enviamos url con true indicamos que de manera asincrona
        http.send();                                                 //se envia al formulario
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res) {                                                        //Si existe res carga los valores en el documento
                        document.getElementById("nombre").value = res.nombre;         
                        document.getElementById("id").value = res.ID;   
                        document.getElementById("precio_creacion").value = res.precio_creacion;      
                        document.getElementById("cantidad_ingresar").focus();
                    }else{
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: "Producto no existe",
                            showConfirmButton: false,
                            timer: 1500
                        })
                        document.getElementById("codigo").value='';
                        document.getElementById("nombre").value='';
                        document.getElementById("cantidad_ingresar").value= null;
                        document.getElementById("codigo").focus();    

                    }            
                }
            }
}

function AgregarPro(e, opc) {
    e.preventDefault(); 
    
    let url="";
    const cant = document.getElementById("cantidad_ingresar");
    const precio_creacion = document.getElementById("precio_creacion");    
    const codigo = document.getElementById("codigo").value;
    const descripcion = document.getElementById("descripcion");

    document.getElementById("costo_total").value = cant* precio_creacion;

    // console.log(codigo,cant, precio_creacion, descripcion);

    if (opc == 1) {
        mensaje= "agregar";
        mensaje2= "agregados"
    }
    if (opc == -1) {
        mensaje= "eliminar";
        mensaje2= "eliminados";
    }


    // if (e.which == 13 ) { 
        if ( codigo.value == "" || cant.value == "" || descripcion.value == "" ) {        
            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                title: 'Llena todos los campos',
                showConfirmButton: false,
                timer: 3000
              })
        }
        else{
            if (cant.value >0) {                   
                Swal.fire({
                    title: '??Esta seguro de ' + mensaje + ' productos al almac??n?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                        if (opc == 1) {
                           url = base_url + "IngresarProducto/ingresar";              
                            
                        }
                        if (opc == -1) {
                            url = base_url + "IngresarProducto/eliminar";              
                             
                         }                      
                        
                        const frm = document.getElementById("frmCompra");
                        const http = new XMLHttpRequest();                            //instancia objeto XMLHTTPRequest
                        http.open("POST", url, true);                                 //Por metodo post enviamos url con true indicamos que de manera asincrona
                        http.send(new FormData(frm));                                 //se envia al formulario
                        http.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {
                                // console.log(this.responseText);
                                const res = JSON.parse(this.responseText);
                                if (res.msg =="ok") {
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'success',
                                        title: 'Productos ' + mensaje2 + ' con ??xito',
                                        showConfirmButton: false,
                                        timer: 3000
                                    })
                                    tblCompras.ajax.reload();
                                    document.getElementById("frmCompra").reset();       //limpia formulario de registros de la funcion editar
                                    //   $("#nuevo_ingrediente").modal("hide"); 
                                    const ruta = base_url + 'IngresarProducto/generarPdf/'+ res.id_compra;
                                    window.open(ruta);
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
                }) 
            }else{
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Cantidad debe ser mayor a cero',
                    showConfirmButton: false,
                    timer: 3000
                  })
            }              
        }
    // } 
    
}

function btnEliminarProducccion(e) {
    e.preventDefault();    
    
    const cant = document.getElementById("cantidad_ingresar");
    const precio_creacion = document.getElementById("precio_creacion");    
    const codigo = document.getElementById("codigo").value;
    const descripcion = document.getElementById("descripcion");
    document.getElementById("costo_total").value = cant* precio_creacion;

    // console.log(codigo,cant, precio_creacion, descripcion);


    // if (e.which == 13 ) { 
        if ( codigo.value == "" || cant.value == "" || descripcion.value == "" ) {        
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Llena todos los campos',
                showConfirmButton: false,
                timer: 3000
              })
        }
        else{
            if (cant.value >0) {                   
                Swal.fire({
                    title: '??Esta seguro de eliminar productos al almac??n?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const url = base_url + "IngresarProducto/eliminar";                
                        const frm = document.getElementById("frmCompra");
                        const http = new XMLHttpRequest();                            //instancia objeto XMLHTTPRequest
                        http.open("POST", url, true);                                 //Por metodo post enviamos url con true indicamos que de manera asincrona
                        http.send(new FormData(frm));                                 //se envia al formulario
                        http.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {
                                // console.log(this.responseText);
                                const res = JSON.parse(this.responseText);
                                if (res=="ok") {
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'success',
                                        title: 'Productos eliminados del almac??n con ??xito',
                                        showConfirmButton: false,
                                        timer: 3000
                                    })
                                    //   $("#nuevo_ingrediente").modal("hide"); 
                                    tblCompras.ajax.reload();
                                    document.getElementById("frmCompra").reset();       //limpia formulario de registros de la funcion editar
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
                }) 
            }else{
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Cantidad debe ser mayor a cero',
                    showConfirmButton: false,
                    timer: 3000
                  })
            }              
        }
    // }    
}

//FIN Agregar stock/compras----------------------------------------------------------------------------------------


//****************  VENTAS ************************************

function frmVenta() {
    document.getElementById("title_modal").innerHTML = "Nueva";
    document.getElementById("btnAgregar").innerHTML = "Agregar";
    document.getElementById("frmVenta").reset();                              //limpia formulario de registros de la funcion editar
    document.getElementById("id").value=""; 





    // $("#nuevo_producto").modal("show");    
}

function buscarCodigoVenta(e) {
    e.preventDefault();

    // if (e.which == 13 ) {                                                //al presionar tecla enter
        const cod = document.getElementById("codigo").value;
        const url = base_url + "Ventas/buscar/"+ cod;                  // controlador/metodo/argumentos

        const http = new XMLHttpRequest();                            //instancia objeto XMLHTTPRequest
        http.open("GET", url, true);                                 //Por metodo post enviamos url con true indicamos que de manera asincrona
        http.send();                                                 //se envia al formulario
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res) {                                                        //Si existe res carga los valores en el documento
                        document.getElementById("id").value = res.ID;   
                        document.getElementById("nombre").value = res.nombre;         
                        document.getElementById("precio_venta").value = res.precio_venta;      
                        document.getElementById("cantidad_ingresar").focus();
                    }else{
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: "Producto no existe",
                            showConfirmButton: false,
                            timer: 1500
                        })
                        document.getElementById("codigo").value='';
                        document.getElementById("nombre").value='';
                        document.getElementById("sub_total").value='';
                        document.getElementById("precio_venta").value='';
                        document.getElementById("cantidad_ingresar").value= null;
                        document.getElementById("codigo").focus();    

                    }            
                }
            }
}

function calcularPrecioVenta(e) 
{
    e.preventDefault(); 
    

    const codigo = document.getElementById("codigo").value;
    const cantidad_ingresar = document.getElementById("cantidad_ingresar").value;
    const precio_venta = document.getElementById("precio_venta").value;    
    // const sub_total = document.getElementById("sub_total");

    document.getElementById("sub_total").value = cantidad_ingresar * precio_venta;
  
    if (cantidad_ingresar >0) 
    { 
        const url = base_url + "Ventas/ingresar";              
        const frm = document.getElementById("frmVenta");
        const http = new XMLHttpRequest();                            //instancia objeto XMLHTTPRequest
        http.open("POST", url, true);                                 //Por metodo post enviamos url con true indicamos que de manera asincrona
        http.send(new FormData(frm));                                 //se envia al formulario
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                if (res == "ok") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Producto ingresado',
                        showConfirmButton: false,
                        timer: 2000
                      })
                    frm.reset();
                    cargarDetalleTV();
                    
                }else if (res == 'modificado') {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Producto actualizado',
                        showConfirmButton: false,
                        timer: 2000
                      })
                    frm.reset();
                    cargarDetalleTV();                    
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'warning',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                      })
                }      
            }
        }
    }
    
}

if (document.getElementById('tblDetalleVenta')) {
    cargarDetalleTV();                                  //En la f cargarDetalleTV intentaba cargar tabla
}

function cargarDetalleTV(){
    const url = base_url + "Ventas/listar";              
    const http = new XMLHttpRequest();                            //instancia objeto XMLHTTPRequest
    http.open("GET", url, true);  
    http.send();                               //Por metodo post enviamos url con true indicamos que de manera asincrona
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            let html = '';
            res['detalle_tabla'].forEach(row => {                   //nombre parametrodel data nombra en el controlador
                html += `<tr>
 
                    <td>${row['nombre']}</td>
                    <td>${row['cantidad_dtv']}</td>
                    <td>${row['precio_dtv']}</td>
                    <td>${row['sub_total_dtv']}</td>
                    <td> <button class= "btn btn-danger" type="button" onclick="btnEliminarDTV(${row['ID_DTV']})"> 
                    <i class= "fas fa-trash-alt"> </i></button> </td>
                </tr>`;
                    
                
            });
            document.getElementById("tblDetalleVenta").innerHTML = html;
            document.getElementById("total_venta").value =res['total_pagar'].total;

            
        }
    }
}

function btnEliminarDTV(ID_DTV) {
    const url = base_url +"Ventas/eliminar/"+ID_DTV;              
    const http = new XMLHttpRequest();                            //instancia objeto XMLHTTPRequest
    http.open("GET", url, true);  
    http.send();                                                   //Por metodo post enviamos url con true indicamos que de manera asincrona
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            if (res== 'ok') {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Producto eliminado',
                    showConfirmButton: false,
                    timer: 3000
                })  
                cargarDetalleTV();              
            }else
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Error al eliminar el producto',
                    showConfirmButton: false,
                    timer: 3000
                })    
        }
    }
}

function btnGenerarVenta() {
    Swal.fire({
        title: '??Esta seguro realizar la venta?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const id_cliente = document.getElementById('SelectCliente').value;
            const url = base_url + "Ventas/registrarVenta/" + id_cliente;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res.msg=="ok") {
                        Swal.fire(            
                            'Mensaje',
                            'Compra generada',
                            'success'
                        )
                        const ruta = base_url + 'Ventas/generarPdf/' + res.id_ventaMax;
                        window.open(ruta);
                        setTimeout(() => {
                            window.location.reload();
                        }, 3000);
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

function btnAnularVenta($id_venta) {
    
    Swal.fire({
        title: '??Esta seguro de anular la venta?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Ventas/anularVenta/" + $id_venta;
            
            // console.log(url);

            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Venta anulada',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        tbl_historial_ventas.ajax.reload();
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
    })
}



//----------- FIN VENTAS ----------------------------------------------------------------------------------------





//*********************  Empresa *******************************

function modificarEmpresa() {
    const frm = document.getElementById("frmEmpresa");  
    const url = base_url + "Configurar/modificar";                
        const http = new XMLHttpRequest();                            //instancia objeto XMLHTTPRequest
        http.open("POST", url, true);                                 //Por metodo post enviamos url con true indicamos que de manera asincrona
        http.send(new FormData(frm));                                 //se envia al formulario

        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // console.log(this.responseText);
                const res = JSON.parse(this.responseText);             //parseamos
                if (res=="modificado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos modificados con exito',
                        showConfirmButton: false,
                        timer: 3000
                      })
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

function reporteStock(){
    const url = base_url + "Configurar/reporteStock";                
    const http = new XMLHttpRequest();                            //instancia objeto XMLHTTPRequest
    http.open("GET", url, true);                                 //Por metodo post enviamos url con true indicamos que de manera asincrona
    http.send();                                 //se envia al formulario

    http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // console.log(this.responseText);
                const res = JSON.parse(this.responseText); 
                let nombre = [];
                let cantidad = [];
                for (let i = 0; i < res.length; i++) {
                    nombre.push(res[i]['nombre']);
                    cantidad.push(res[i]['cantidad']);
                    
                }

                // doughnut Chart productos minimos
                var ctx = document.getElementById("productosMinimos");
                var myPieChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: nombre,                        
                        datasets: [{
                            label: 'En almac??n',
                            data: cantidad,
                            backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745','#FF6800','#8300FF','#FF00CD','#00FFB9','#808000', '#008080', '#808080' ],
                        }],
                    },
                });  
            }
        } 


}

function productosVendidos(){
    const url = base_url + "Configurar/productosVendidos";                
    const http = new XMLHttpRequest();                            //instancia objeto XMLHTTPRequest
    http.open("GET", url, true);                                 //Por metodo post enviamos url con true indicamos que de manera asincrona
    http.send();                                 //se envia al formulario

    http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // console.log(this.responseText);
                const res = JSON.parse(this.responseText); 
                let nombre = [];
                let cantidad = [];
                for (let i = 0; i < res.length; i++) {
                    nombre.push(res[i]['nombre']);
                    cantidad.push(res[i]['total']);
                    
                }

                // Pie Chart productos mas vendidos
                var ctx = document.getElementById("productosVendidos");
                var myPieChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: nombre,
                    datasets: [{
                    data: cantidad,
                    backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745','#FF6800','#8300FF','#FF00CD','#00FFB9','#808000', '#008080', '#808080' ],
                    
                    }],
                },
                });  
            }
        } 


}

// ****** funciones generales para optimizar c??digo

function alertas(mensaje,icono) {
    Swal.fire({
        position: 'top-end',
        icon: icono,
        title: mensaje,
        showConfirmButton: false,
        timer: 3000
    })
    
}

if (document.getElementById('productosMinimos')) {
    reporteStock();
    productosVendidos();
}
