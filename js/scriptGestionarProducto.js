ExtraerProductos();
$('.btnOculto').hide();
var ListaProductos = new Array();
function editarProducto(ideditar) {
    $('.btnmostrar').hide();
    $('.btnOculto').show();
    $('#idmoficarKasama').val("");
    $.post("../moduloVentas/getProducto.php", { ideditar: ideditar }, function (data) {
        var ProductoEncontrado = JSON.parse(data);
        $('#idmoficarKasama').val(ProductoEncontrado.id);
        $('#nProducto').val(ProductoEncontrado.producto);
        $('#pUnitario').val(ProductoEncontrado.precioU);
        $('#stock').val(ProductoEncontrado.stock);
        //$('#imagen').val(ProductoEncontrado.imagen);
        document.getElementById("categoria").value = ProductoEncontrado.categoria;
    });
}
function modificaproducto() {
    var formData = new FormData();
    var idmoficarKasama = $('#idmoficarKasama').val();
    var ProductoEdi = $('#nProducto').val();
    var PrecioEdi = $('#pUnitario').val();
    var StockEdi = $('#stock').val();
    var CategoriaEdi = $('#categoria').val();
    var ImagenEdi = $('#imagen')[0].files[0];

    formData.append('idmoficarKasama',idmoficarKasama);
    formData.append('ProductoEdi',ProductoEdi);
    formData.append('PrecioEdi',PrecioEdi);
    formData.append('StockEdi',StockEdi);
    formData.append('CategoriaEdi',CategoriaEdi);
    formData.append('ImagenEdi',ImagenEdi);


    $.ajax({
        url: 'getProducto.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {

            if (data != "1") {
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
                $('#idmoficarKasama').val("");
                $('#nProducto').val("");
                $('#pUnitario').val("");
                $('#stock').val("");
                $('#imagen').val("");
                $('.btnOculto').hide();
                $('.btnmostrar').show();
                ExtraerProductos();
            }
        }
    });
}
function eliminarProducto(idpro) {
    Swal.fire({
        title: '¿Estas seguro de Eliminar Producto?',
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
                'El Producto ha sido Eliminado.',
                'success'
            )
            $.post("../moduloVentas/getProducto.php", { idpro: idpro }, function (data) {
                ExtraerProductos();
            });
        }
    })

}

function Buscarpro() {
    var BProducto = $('#BProducto').val();
    $.post("../moduloVentas/getProducto.php", { BProducto: BProducto }, function (data) {
        var ListaProductos = JSON.parse(data);
        var resultado = "";
        for (var i = 0; i < ListaProductos.length; i++) {
            resultado+="<tr><td>"+ListaProductos[i].producto+"</td><td>"+ListaProductos[i].precioU+"</td><td>"+ListaProductos[i].stock+"<td><button class='btn btn-warning' onclick='editarProducto("+ListaProductos[i].id+")'><i class='far fa-edit'></i></button></td><td><button class='btn btn-danger' onclick='eliminarProducto("+ListaProductos[i].id+")'><i class='far fa-trash-alt'></i></button></td></tr>";
        }
        document.getElementById("lista_productos").innerHTML = resultado;
    });
}
function guardaproducto() {

    var formData = new FormData();
    var NProducto = $('#nProducto').val();
    var PrecioU = $('#pUnitario').val();
    var StockP = $('#stock').val();
    var CategoriaP = $('#categoria').val();
    var ImagenP = $('#imagen')[0].files[0];

    formData.append('NProducto',NProducto);
    formData.append('PrecioU',PrecioU);
    formData.append('StockP',StockP);
    formData.append('CategoriaP',CategoriaP);
    formData.append('ImagenP',ImagenP);

    $.ajax({
        url: 'getProducto.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {

            if (data != "1") {
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
                    title: 'Añadido exitosamente',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('#nProducto').val("");
                $('#pUnitario').val("");
                $('#stock').val("");
                $('#imagen').val("");
                ExtraerProductos();
            }
        }
    });
}
function ExtraerProductos() {
    var extraerProductos = 1;
    $.post("../moduloVentas/getProducto.php", { extraerProductos: extraerProductos }, function (data) {
        var ListaProductos = JSON.parse(data);
        var resultado = "";
        for (var i = 0; i < ListaProductos.length; i++) {
            resultado+="<tr><td>"+ListaProductos[i].producto+"</td><td>"+ListaProductos[i].precioU+"</td><td>"+ListaProductos[i].stock+"<td><button class='btn btn-warning' onclick='editarProducto("+ListaProductos[i].id+")'><i class='far fa-edit'></i></button></td><td><button class='btn btn-danger' onclick='eliminarProducto("+ListaProductos[i].id+")'><i class='far fa-trash-alt'></i></button></td></tr>";
        }
        document.getElementById("lista_productos").innerHTML = resultado;
    });
}

