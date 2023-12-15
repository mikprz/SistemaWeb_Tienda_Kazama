ExtraerProductos();
ObtenerCodigoNuevo();                
var ListaProforma = new Array();
function enviarPro(idlngp){

    $.post("../moduloVentas/getProforma.php",{idlngp: idlngp}, function (data) {
            const producto = JSON.parse(data);

            if(ListaProforma.indexOf(producto.id)==-1){
                ListaProforma.push(producto.id);                        

                $('#lista-proforma').append('<tr id="elemento'+producto.id+'">'+
                '<td><input type="text" value="1" size="4" id="cant'+producto.id+
                    '" onkeyup="ActualizarMontos('+producto.id+')" /></td>'+
                '<td>'+producto.producto+'</td>'+
                '<td><input type="text" value="'+producto.precioU+'" size="4" id="prec'+producto.id+
                    '" onkeyup="ActualizarMontos('+producto.id+')"/></td>'+
                '<td><input type="text" value="0" size="4" id="env'+producto.id+
                    '" onkeyup="ActualizarMontos('+producto.id+')"/></td>'+
                '<td><input type="text" id="monto'+producto.id+'" value="'+producto.precioU+'" size="4" disabled /></td>'+
                '<td><button class="quitar btn" onclick="EliminarProductoLista('+producto.id+')"><i class="far fa-trash-alt"></i></button></td>'+
                '</tr>');
            }else{
                var valor=parseInt(document.getElementById("cant"+producto.id).value);
                valor++;
                document.getElementById("cant"+producto.id).value=valor.toString();
                ActualizarMontos(producto.id);
            }

            ActualizarMontoTotal();
    });
}
function ActualizarMontos(id){
    var cantidad=parseFloat(document.getElementById("cant"+id).value);
    var precioUnitario=parseFloat(document.getElementById("prec"+id).value);
    var envases=parseInt(document.getElementById("env"+id).value);
    var monto= (cantidad*precioUnitario)+envases;
    document.getElementById("monto"+id).value=monto.toString();
    ActualizarMontoTotal();
}
function ActualizarMontoTotal(){
    var monto_total=0;
    for(var i=0;i<ListaProforma.length;i++){
        monto_total+=parseFloat(document.getElementById("monto"+ListaProforma[i]).value);
    }
    document.getElementById("monto_total").value=monto_total.toString();
}
function EliminarProductoLista(id){
    document.getElementById("elemento"+id).remove();
    ListaProforma.splice(ListaProforma.indexOf(id.toString()), 1);
    ActualizarMontoTotal();
}
function BuscarProductoNombre(){
    var txtNombre=document.getElementById("txtNombre").value;
    $.post("../moduloVentas/getProforma.php",{txtNombre: txtNombre}, function (data) {
        var listaProductos = JSON.parse(data);
        var resultado="";
        if(listaProductos.length==0){
            $( "#lista_productos" ).removeClass( "lista_productos" )
            resultado="<div class='alert alert-danger' role='alert'>NO EXISTE PRODUCTO</div>";
        }else{
            //var listaProductos = JSON.parse(data);
            
            for(var i=0;i<listaProductos.length;i++){
                resultado+="<div class='producto' onclick='enviarPro("+listaProductos[i].id+")'>"+
                            "<img src='../imagenes/"+listaProductos[i].imagen+"' />"+
                            "<span class='nombre'>"+listaProductos[i].producto+"</span><br>"+
                            "<span class='precio'>Precio: "+listaProductos[i].precioU+"</span><br>"+
                            "<span class='stock'>Stock: "+listaProductos[i].stock+"</span>"+
                        "</div>";
            }
            $('#lista_productos').addClass("lista_productos");
        }                        
        document.getElementById("lista_productos").innerHTML=resultado;
    });
}
function ExtraerProductos(){
    var extraerProductos=1;
    $.post("../moduloVentas/getProforma.php",{extraerProductos: extraerProductos}, function (data) {
        var ListaProductos = JSON.parse(data);
        var resultado="";
        for(var i=0;i<ListaProductos.length;i++){
            resultado+="<div class='producto' onclick='enviarPro("+ListaProductos[i].id+")'>"+
                            "<img src='../imagenes/"+ListaProductos[i].imagen+"' />"+
                            "<span class='nombre'>"+ListaProductos[i].producto+"</span><br>"+
                            "<span class='precio'>Precio: "+ListaProductos[i].precioU+"</span><br>"+
                            "<span class='stock'>Stock: "+ListaProductos[i].stock+"</span>"+
                        "</div>";
            
        }
        document.getElementById("lista_productos").innerHTML=resultado;
    });
}
function ObtenerCodigoNuevo(){
    var ObtenerCodigoNuevo=1;
    $.post("../moduloVentas/getProforma.php",{ObtenerCodigoNuevo: ObtenerCodigoNuevo}, function (data) {
        var codigoNuevo = data;
        document.getElementById("codigo").value=codigoNuevo;
    });
}
function EmitirProforma(){                    
    var _codigo = document.getElementById("codigo").value;
    var _fecha = document.getElementById("fecha").value;
    var _monto_total = parseFloat(document.getElementById("monto_total").value);

    var _Proforma= {codigo:_codigo, fecha:_fecha, monto_total:_monto_total};
    var _DetalleProforma = new Array();
    for(var i=0;i<ListaProforma.length;i++){
        var _id_producto=ListaProforma[i];
        var _cantidad=parseFloat(document.getElementById("cant"+_id_producto).value);
        var _envases=parseInt(document.getElementById("env"+_id_producto).value);
        var _monto=parseFloat(document.getElementById("monto"+_id_producto).value);

        _DetalleProforma[i]={id_producto:_id_producto, cantidad:_cantidad, envases:_envases,monto:_monto};
    }


    $.post("../moduloVentas/getProforma.php",{Proforma: _Proforma,DetalleProforma: _DetalleProforma}, function (data) {
        var respuesta = data;
        if($.isEmptyObject(respuesta)){
            print();
            location.reload();
        }else{
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