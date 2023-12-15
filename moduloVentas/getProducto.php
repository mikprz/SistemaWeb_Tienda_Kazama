<?php
function validarImagen($imagen)
{

    if (($imagen["type"] == "image/pjpeg") || ($imagen["type"] == "image/jpeg") || ($imagen["type"] == "image/png") || ($imagen["type"] == "image/gif")) {
        return (1);
    } else {
        return (0);
    }
}


function validarCampos($producto, $precio, $stock)
{
    if (strlen($producto) > 3 and $precio > 0 and $stock > 0) {
        return (1);
    } else {
        return (0);
    }
}
if (isset($_POST['NProducto'])) {
    $producto = $_POST['NProducto'];
    $precio = $_POST['PrecioU'];
    $stock = $_POST['StockP'];
    $categoria = $_POST['CategoriaP'];
    //$imagen = $_POST['ImagenP'];
    $resultado_validar_campos_productos = ValidarCampos($producto, $precio, $stock);
    if ($resultado_validar_campos_productos == 0) {
        echo "Hay valores NO Validos";
    } else {
        include_once("controllerGestionarProducto.php");
        $objController = new controllerGestionarProducto();

        if (isset($_FILES['ImagenP'])) {
            $imagen = $_FILES['ImagenP'];
            $valiImagen = validarImagen($imagen);

            if ($valiImagen == 0) {
                echo "El formato de la imagen no es valido";
            } else {
                $objController->insertarProducto($producto, $precio, $stock, $imagen, $categoria);
            }
        } else {
            $imagen = null;
            $objController->insertarProducto($producto, $precio, $stock, $imagen, $categoria);
        }
    }
} else if (isset($_POST['extraerProductos'])) {
    include_once("controllerGestionarProducto.php");
    $objController = new controllerGestionarProducto();
    $objController->ExtraerProductos();
} else if (isset($_POST['idpro'])) {
    include_once("controllerGestionarProducto.php");
    $objController = new controllerGestionarProducto();
    $objController->EliminarProducto($_POST['idpro']);
} else if (isset($_POST['BProducto'])) {
    include_once("controllerGestionarProducto.php");
    $objController = new controllerGestionarProducto();
    $objController->BuscarProducto($_POST['BProducto']);
} else if (isset($_POST['ideditar'])) {
    include_once("controllerGestionarProducto.php");
    $objController = new controllerGestionarProducto();
    $objController->BuscarProductoKasama($_POST['ideditar']);
} else if (isset($_POST['idmoficarKasama'])) {
    $idEditarKasamito = $_POST['idmoficarKasama'];
    $producto = $_POST['ProductoEdi'];
    $precio = $_POST['PrecioEdi'];
    $stock = $_POST['StockEdi'];
    $categoria = $_POST['CategoriaEdi'];
    //$imagen = $_POST['ImagenEdi'];
    $resultado_validar_camposKasama = ValidarCampos($producto, $precio, $stock);
    if ($resultado_validar_camposKasama == 0) {
        echo "Hay valores NO Validos en la modificacion";
    } else {
        include_once("controllerGestionarProducto.php");
        $objController = new controllerGestionarProducto();
        if (isset($_FILES['ImagenEdi'])) {
            $imagen = $_FILES['ImagenEdi'];
            $valiImagen = validarImagen($imagen);

            if ($valiImagen == 0) {
                echo "El formato de la imagen no es valido";
            } else {
                $objController->modificarProducto($idEditarKasamito, $producto, $precio, $stock, $imagen, $categoria);
            }
        } else {
            $imagen = null;
            $objController->modificarProducto($idEditarKasamito, $producto, $precio, $stock, $imagen, $categoria);
        }
    }
} else {
    include_once("../shared/formMensajeSistema.php");
    $objMensaje = new formMensajeSistema;
    $objMensaje->formMensajeSistemaShow("Se ha detectado un acceso no permitido", "<a href='../index.php'>Ingrese adecuadamente</a>");
}
