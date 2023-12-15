function RegistrarReclamo() {
    var codigoBoleta = $('#boleta').val();
    var motivo = $('#motivo').val();
    var monto = $('#monto').val();
    var fecha = $('#fecha').val();
    $.post("../moduloReclamo/getReclamo.php", { codigoBoleta: codigoBoleta, motivo: motivo, monto: monto, fecha: fecha }, function (data) {
        if (data == "Rellene los campos con valores válidos" || data == "No existe boleta para reclamo") {
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
                title: 'Reclamo guardado exitosamente',
                showConfirmButton: false,
                timer: 1500
            })
            $('#boleta').val("");
            $('#motivo').val("");
            $('#monto').val("");
            $('#fecha').val("");
            $('#razonS').val("");
        }
    });
}
function BuscarComprobante() {
    var boleta = $('#boleta').val();
    $('#razonS').val("");
    $('#fecha').val("");
    $.post("../moduloReclamo/getReclamo.php", { boleta: boleta }, function (data) {
        if (data == "Numero de boleta Invalido" || data == "No existe boleta para reclamo") {
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
            const comprobanteAJAX = JSON.parse(data);
            $('#razonS').val(comprobanteAJAX.Cliente);
            $('#fecha').val(comprobanteAJAX.Fecha);
        }
    });
}
function BSolucionar() {
    var boletaSolu = $('#solucionarC').val();
    $('.tdestado').html("");
    $('.tdfecha').html("");
    $('.tdmonto').html("");
    $('.tdmotivo').html("");
    $('.tdestadoforAJAX').val("");
    $('.tdidforAJAX').val("");
    $.post("../moduloReclamo/getReclamo.php", { boletaSolu: boletaSolu }, function (data) {
        if (data == "Comprobante no existe" || data == "No existe comprobante en reclamo") {
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
            const comprobanteAJAX = JSON.parse(data);
            $('.tdestado').html(comprobanteAJAX.estado);
            $('.tdfecha').html(comprobanteAJAX.fecha);
            $('.tdmonto').html(comprobanteAJAX.monto);
            $('.tdmotivo').html(comprobanteAJAX.motivo);
            $('.tdestadoforAJAX').val(comprobanteAJAX.estado);
            $('.tdidforAJAX').val(comprobanteAJAX.id);
        }
    });

}
function SolucionarReclamo() {
    var hid = $('.tdestadoforAJAX').val();
    var id = $('.tdidforAJAX').val();
    $.post("../moduloReclamo/getReclamo.php", { hid: hid, id: id }, function (data) {
        if (data == "No hay nada que solucionar" || data == "Reclamo ya se soluciono antes") {
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
                title: 'Estado cambiado exitosamente',
                showConfirmButton: false,
                timer: 1500
            })
            $('.tdestado').html("");
            $('.tdfecha').html("");
            $('.tdmonto').html("");
            $('.tdmotivo').html("");
            $('.tdestadoforAJAX').val("");
            $('.tdidforAJAX').val("");
            $('#solucionarC').val("");
        }
    });
}