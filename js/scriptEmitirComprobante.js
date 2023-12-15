var ListaProformas = new Array();
var DetalleProforma = new Array();
var Proforma = new Array();
ExtraerProformas();
ObtenerCodigoNuevo();

function ExtraerProformas() {
    var ExtraerProformas = 1;
    $.post("../moduloVentas/getEmitirComprobante.php", { ExtraerProformas: ExtraerProformas }, function (data) {
        var Respuesta = JSON.parse(data);
        document.getElementById("lista_proformas").innerHTML = Respuesta.resultado;
        ListaProformas = Respuesta.ListaProformas;
    });
}

function BuscarProformaCodigo() {
    var codigoProforma = document.getElementById("txtCodigo").value;
    $.post("../moduloVentas/getEmitirComprobante.php", { codigoProforma: codigoProforma }, function (data) {
        var Respuesta = JSON.parse(data);
        document.getElementById("lista_proformas").innerHTML = Respuesta.resultado;
        ListaProformas = Respuesta.ListaProformas;
    });
}

function ObtenerCodigoNuevo() {
    var ObtenerCodigoNuevo = 1;
    $.post("../moduloVentas/getEmitirComprobante.php", { ObtenerCodigoNuevo: ObtenerCodigoNuevo }, function (data) {
        var CodigoNuevo = data;
        document.getElementById("codigo").value = CodigoNuevo;
    });
}

function BuscarProformaFecha() {
    var fecha = document.getElementById("fecha_buscar").value;
    $.post("../moduloVentas/getEmitirComprobante.php", { fecha: fecha }, function (data) {
        var Respuesta = JSON.parse(data);
        document.getElementById("lista_proformas").innerHTML = Respuesta.resultado;
        ListaProformas = Respuesta.ListaProformas;
    });
}

function SeleccionarProforma(fila) {
    var _Proforma = ListaProformas[fila];
    $.post("../moduloVentas/getEmitirComprobante.php", { Proforma: _Proforma }, function (data) {
        if (data == "0") {
            Swal.fire({
                title: "La proforma a caducado",
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })


        } else {
            Proforma = _Proforma;
            Respuesta = JSON.parse(data);
            DetalleProforma = Respuesta.DetalleProforma;
            document.getElementById("detalle_proforma").innerHTML = Respuesta.resultado;
            document.getElementById("codigo_proforma").innerHTML = "Codigo: " + Proforma.codigo;
            document.getElementById("monto_total_proforma").innerHTML = "Monto total: S/. " + Proforma.monto_total;
            $("#emitirComprobante").removeAttr("disabled");
        }
    });
}

function EmitirComprobante() {

    var _codigo = document.getElementById("codigo").value;
    var _fecha = document.getElementById("fecha").value;
    var _monto_total = Proforma.monto_total;
    var _nom_cliente = document.getElementById("nom_cliente").value;
    var _documento = document.getElementById("documento").value;
    var _tipo = document.getElementById("tipo_comprobante").value;

    var _Comprobante = {
        codigo: _codigo,
        fecha: _fecha,
        monto_total: _monto_total,
        nom_cliente: _nom_cliente,
        documento: _documento,
        tipo: _tipo
    };
    var _DetalleComprobante = new Array();

    for (var i = 0; i < DetalleProforma.length; i++) {

        var id_producto = DetalleProforma[i].id;
        var cantidad = DetalleProforma[i].cantidad;
        var monto = DetalleProforma[i].monto;
        var envases = DetalleProforma[i].envases;
        var precioU = (monto - envases) / cantidad;

        _DetalleComprobante[i] = {
            id_producto: id_producto,
            cantidad: cantidad,
            monto: monto,
            envases: envases,
            precioU: precioU
        };
    }

    $.post("../moduloVentas/getEmitirComprobante.php", { Comprobante: _Comprobante, DetalleComprobante: _DetalleComprobante }, function (data) {
        var respuesta = data;
        if (respuesta === "1") {
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