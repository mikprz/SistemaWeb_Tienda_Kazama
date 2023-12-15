<?php
class controllerGestionarProducto
{

    public function insertarProducto($producto, $precio, $stock, $imagen, $categoria)
    {
        include_once("../model/producto.php");
        $objProducto = new Producto;
        $retorno = $objProducto->insertarProducto($producto, $precio, $stock, $imagen, $categoria);
        if ($retorno = 0) {
            echo "Error al insertar producto";
        } else {
            echo "1";
        }
    }
    public function ExtraerProductos()
    {
        include_once("../model/producto.php");
        $objProductoq = new producto;
        $ListaProductos = $objProductoq->ExtraerProductos();
        $filas = count($ListaProductos);
        $arr = array();
        for ($i = 0; $i < $filas; $i++) {
            $arr[$i] = array(
                'id' => $ListaProductos[$i]['id'],
                'producto' => $ListaProductos[$i]['producto'],
                'stock' => $ListaProductos[$i]['stock'],
                'precioU' => $ListaProductos[$i]['precioU'],
                'imagen' => $ListaProductos[$i]['imagen']
            );
        }
        echo json_encode($arr);
    }
    public function BuscarProductoKasama($ideditar)
    {
        include_once("../model/producto.php");
        $objProductoq = new producto;
        $Producto = $objProductoq->BuscarProductoKasama($ideditar);
        $arr =  array(
            'id' => $Producto[0]['id'],
            'producto' => $Producto[0]['producto'],
            'stock' => $Producto[0]['stock'],
            'precioU' => $Producto[0]['precioU'],
            'imagen' => $Producto[0]['imagen'],
            'categoria' => $Producto[0]['categoria']
        );
        echo json_encode($arr);
    }

    public function EliminarProducto($id)
    {
        include_once("../model/producto.php");
        $objProductoq = new producto;
        $objProductoq->EliminarProducto($id);
    }
    public function BuscarProducto($id)
    {
        include_once("../model/producto.php");
        $objProductoq = new producto;
        $ListaProductos = $objProductoq->BuscarProductoNombre($id);
        $filas = count($ListaProductos);
        $arr = array();
        for ($i = 0; $i < $filas; $i++) {
            $arr[$i] = array(
                'id' => $ListaProductos[$i]['id'],
                'producto' => $ListaProductos[$i]['producto'],
                'stock' => $ListaProductos[$i]['stock'],
                'precioU' => $ListaProductos[$i]['precioU'],
                'imagen' => $ListaProductos[$i]['imagen']
            );
        }
        echo json_encode($arr);
    }
    public function modificarProducto($idEditarKasamito, $producto, $precio, $stock, $imagen, $categoria)
    {
        include_once("../model/producto.php");
        $objProducto = new Producto;
        $objProducto->modificarProducto($idEditarKasamito, $producto, $precio, $stock, $imagen, $categoria);
        if ($retorno = 0) {
            echo "Error al actualizar producto";
        } else {
            echo "1";
        }
    }
}
