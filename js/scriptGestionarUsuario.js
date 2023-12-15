$('#editar').hide();
ExtraerUsuarios();
function guardarUsuario() {
    var idGuardarUsuarioM = $('#idOcultoModificar').val();
    var userM = $('#user').val();
    var contraM = $('#contra').val();
    var nombreM = $('#nombre').val();
    var dniModificar = $('#dni').val();
    var pesM = $('#pes').val();
    var resM = $('#res').val();
    var rolM = $('#rol').val();
    $.post("../moduloGestion/getGestion.php", { idGuardarUsuarioM: idGuardarUsuarioM, userM: userM, contraM: contraM, nombreM: nombreM, dniModificar: dniModificar, pesM: pesM, resM: resM, rolM: rolM }, function (data) {
        if (data == "Hay valores NO Validos") {
            Swal.fire({
                title: data,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            });
        }
        else {
            Swal.fire({
                icon: 'success',
                title: 'Modificado exitosamente',
                showConfirmButton: false,
                timer: 1500
            })
            $('#user').val("");
            $('#contra').val("");
            $('#nombre').val("");
            $('#dni').val("");
            $('#pes').val("");
            $('#res').val("");
            ExtraerUsuarios();
        }
    });
}
function ExtraerUsuarios() {
    var ExtraerUsuarios = 1;
    $.post("../moduloGestion/getGestion.php", { ExtraerUsuarios: ExtraerUsuarios }, function (data) {
        var ListaProductos = JSON.parse(data);
        var resultado = "";
        for (var i = 0; i < ListaProductos.length; i++) {
            resultado += "<tr><td>" + ListaProductos[i].idUsuario + "</td><td>" + ListaProductos[i].login + "</td><td>" + ListaProductos[i].password + "</td><td>" + ListaProductos[i].nombre + "</td><td>" + ListaProductos[i].dni + "</td><td>" + ListaProductos[i].preguntaS + "</td><td>" + ListaProductos[i].respuestaS + "</td><td>" + ListaProductos[i].rol + "</td><td><button class='btn btn-warning' onclick='editarUsuario(" + ListaProductos[i].idUsuario + ")'><i class='far fa-edit'></i></button></td><td><button class='btn btn-danger' onclick='eliminarUsuario(" + ListaProductos[i].idUsuario + ")'><i class='far fa-trash-alt'></i></button></td></tr>";

        }
        document.getElementById("lista_usuarios").innerHTML = resultado;
    });
}
function BuscarUsuarioLogin() {
    var buscar = $('#buscar').val();
    $.post("../moduloGestion/getGestion.php", { buscar: buscar }, function (data) {
        var ListaProductos = JSON.parse(data);
        var resultado = "";
        for (var i = 0; i < ListaProductos.length; i++) {
            resultado += "<tr><td>" + ListaProductos[i].idUsuario + "</td><td>" + ListaProductos[i].login + "</td><td>" + ListaProductos[i].password + "</td><td>" + ListaProductos[i].nombre + "</td><td>" + ListaProductos[i].dni + "</td><td>" + ListaProductos[i].preguntaS + "</td><td>" + ListaProductos[i].respuestaS + "</td><td>" + ListaProductos[i].rol + "</td><td><button class='btn btn-warning' onclick='editarUsuario(" + ListaProductos[i].idUsuario + ")'><i class='far fa-edit'></i></button></td><td><button class='btn btn-danger' onclick='eliminarUsuario(" + ListaProductos[i].idUsuario + ")'><i class='far fa-trash-alt'></i></button></td></tr>";

        }
        document.getElementById("lista_usuarios").innerHTML = resultado;

    });
}
function editarUsuario(id) {
    var idEditar = id;
    $('#idOcultoModificar').val("");
    $('#registrar').hide();
    $('#editar').show();
    $.post("../moduloGestion/getGestion.php", { idEditar: idEditar }, function (data) {
        var UsuarioEncontrado = JSON.parse(data);
        $('#idOcultoModificar').val(UsuarioEncontrado.idUsuario);
        $('#user').val(UsuarioEncontrado.login);
        $('#contra').val(UsuarioEncontrado.password);
        $('#nombre').val(UsuarioEncontrado.nombre);
        $('#dni').val(UsuarioEncontrado.dni);
        $('#pes').val(UsuarioEncontrado.preguntaS);
        $('#res').val(UsuarioEncontrado.respuestaS);
        document.getElementById("rol").value = UsuarioEncontrado.rol;

    });
}
function eliminarUsuario(id) {
    var idEliminar = id;
    Swal.fire({
        title: '¿Estas seguro de Eliminar Usuario?',
        text: "¡Recuerda que esto ya no se podrá revertir!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡ Sí, Eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                '¡Eliminado!',
                'El Usuario ha sido Eliminado.',
                'success'
            )
            $.post("getGestion.php", { idEliminar: idEliminar }, function (data) {
                ExtraerUsuarios();
            });
        }
    })

}
function registrarUsuario() {
    var user = $('#user').val();
    var contra = $('#contra').val();
    var nombre = $('#nombre').val();
    var dniRegistro = $('#dni').val();
    var pes = $('#pes').val();
    var res = $('#res').val();
    var rol = $('#rol').val();
    $.post("../moduloGestion/getGestion.php", { user: user, contra: contra, nombre: nombre, dniRegistro: dniRegistro, pes: pes, res: res, rol: rol }, function (data) {
        if (data == "Hay valores NO Validos") {
            Swal.fire({
                title: data,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            });
        }
        else {
            Swal.fire({
                icon: 'success',
                title: 'Registro realizado con exito',
                showConfirmButton: false,
                timer: 1500
            })
            $('#user').val("");
            $('#contra').val("");
            $('#nombre').val("");
            $('#dni').val("");
            $('#pes').val("");
            $('#res').val("");
            ExtraerUsuarios();
        }
    });
}