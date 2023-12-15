ExtraerMontoComprobante();
ExtraerMontoReembolso();
inicio();
function ActualizarRecuento() {
    var monto_Total = parseFloat($('#Total_venta').val());
    var doscientosS = parseInt($('#200s').val());
    var cienS = parseInt($('#100s').val());
    var cincuentaS = parseInt($('#50s').val());
    var veinteS = parseInt($('#20s').val());
    var diezS = parseInt($('#10s').val());
    var cincoS = parseInt($('#5s').val());
    var dosS = parseInt($('#2s').val());
    var unS = parseInt($('#1s').val());
    var cincuentaC = parseInt($('#50c').val());
    var veinteC = parseInt($('#20c').val());
    var diezC = parseInt($('#10c').val());
    var cincoC = parseInt($('#5c').val());
    var AeaRecuento = (doscientosS * 200) + (cienS * 100) + (cincuentaS * 50)
        + (veinteS * 20) + (diezS * 10) + (cincoS * 5) + (dosS * 2) + (unS * 1) + (cincuentaC * .5) + (veinteC * .2) + (diezC * 1) + (cincoC * .05);
    $('#Recuento').val(AeaRecuento);
    $('#Descuadre').val((($('#Total_caja').val()) * (-1)) + AeaRecuento);
}
function ExtraerMontoComprobante() {
    var extraerMontoComprobante = 1;
    $.post("../moduloCaja/getCaja.php", { extraerMontoComprobante: extraerMontoComprobante }, function (data) {
        $('#Total_venta').val(data);
        $('.efectivo').html("+ " + data);
        $('.cobrado').html("+ " + data);
    });
}
function ExtraerMontoReembolso() {
    var extraerMontoReembolso = 1;
    $.post("../moduloCaja/getCaja.php", { extraerMontoReembolso: extraerMontoReembolso }, function (data) {
        var respuesta = data;
        if ($.isEmptyObject(respuesta)) {
            var Caja = $('#Total_venta').val();
            $('.ReembolsoAJAX').html(0);
            $('#Total_caja').val(Caja);
        } else {
            var monto_Total = parseFloat($('#Total_venta').val());
            var MontoRe = parseFloat(data);
            $('.ReembolsoAJAX').html("- " + data);
            $('#Total_caja').val(monto_Total - MontoRe);
        }

    });
}
function guardaRegistro() {
    var RecuentoAJAX = $('#Recuento').val();
    var monto_TotalAJAX = $('#Total_venta').val();
    $.post("../moduloCaja/getCaja.php", { RecuentoAJAX: RecuentoAJAX, monto_TotalAJAX: monto_TotalAJAX }, function (data) {
        var respuesta = data;
        if ($.isEmptyObject(respuesta)) {
            print();
            location.reload();
        } else {
            Swal.fire({
                title: respuesta,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        }
    });

}
function mostrar() {
    $('#btncon').hide();
    $('#btnindex').hide();
    $('#caja').show();
    $('#btnf').show();
    $('#btnvolver').show();
}
function tapar() {
    $('#caja').hide();
    $('#btnf').hide();
    $('#btnvolver').hide();
    $('#btncon').show();
    $('#btnindex').show();
}
function inicio() {
    $('#caja').hide();
    $('#btnf').hide();
    $('#btnvolver').hide();
}