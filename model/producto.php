<?php
include_once("conexion.php");
class producto extends conexion
{
    public function ExtraerProductos()
    {
        $conn = $this->conectar();
        $SQLP = "SELECT * FROM producto LIMIT 12";
        $result = mysqli_query($conn, $SQLP);
        $this->desconectar($conn);
        $producto = array();
        $numero_filas = mysqli_num_rows($result);
        for ($i = 0; $i < $numero_filas; $i++) {
            $producto[$i] = mysqli_fetch_array($result);
        }
        return ($producto);
    }
    public function BuscarProductoKasama($ideditar)
    {
        $conn = $this->conectar();
        $SQLP = "SELECT * FROM producto WHERE id = $ideditar";
        $resulti = mysqli_query($conn, $SQLP);
        $this->desconectar($conn);
        $numero_filas = mysqli_num_rows($resulti);
        for ($i = 0; $i < $numero_filas; $i++) {
            $productoE[$i] = mysqli_fetch_array($resulti);
        }
        return ($productoE);
    }
    public function modificarProducto($idEditarKasamito, $producto, $precio, $stock, $imagen, $categoria)
    {
        $conn = $this->conectar();
        $retorno = 0;
        if ($imagen == null) {
            $SQL = "UPDATE producto SET producto='$producto',precioU=$precio,stock=$stock,categoria='$categoria' 
                WHERE id=$idEditarKasamito";
            $result = mysqli_query($conn, $SQL);
            $retorno = 1;
        } else {
            if (move_uploaded_file($imagen["tmp_name"], "../imagenes/" . $imagen['name'])) {
                $nom_imagen = $imagen['name'];
                $SQL = "UPDATE producto SET producto='$producto',precioU=$precio,stock=$stock,imagen='$nom_imagen',categoria='$categoria' 
                    WHERE id=$idEditarKasamito";
                $result = mysqli_query($conn, $SQL);
                $retorno = 1;
            } else {
                $retorno = 0;
            }
        }

        $this->desconectar($conn);
        return $retorno;
    }
    public function BuscarProducto($id)
    {
        $conn = $this->conectar();
        $SQLP = "SELECT * FROM producto WHERE id = $id";
        $resulti = mysqli_query($conn, $SQLP);
        $this->desconectar($conn);
        $numero_filas = mysqli_num_rows($resulti);
        for ($i = 0; $i < $numero_filas; $i++) {
            $productob[$i] = mysqli_fetch_array($resulti);
        }
        return ($productob);
    }
    public function BuscarProductoNombre($nombre)
    {
        $conn = $this->conectar();
        $SQLP = "SELECT * FROM producto WHERE producto LIKE '%$nombre%'";
        $resulti = mysqli_query($conn, $SQLP);
        $this->desconectar($conn);
        $ListaProductos = array();
        $numero_filas = mysqli_num_rows($resulti);
        for ($i = 0; $i < $numero_filas; $i++) {
            $ListaProductos[$i] = mysqli_fetch_array($resulti);
        }
        return ($ListaProductos);
    }

    public function ActualizarStock($DetalleComprobante)
    {

        $conn = $this->conectar();
        $filas = count($DetalleComprobante);
        $res = "0";
        for ($i = 0; $i < $filas; $i++) {
            $idproducto = $DetalleComprobante[$i]['id_producto'];
            $cantidad = $DetalleComprobante[$i]['cantidad'];
            $SQLP = "UPDATE producto 
                SET    stock = stock-$cantidad
                WHERE  id=$idproducto";
            if ($conn->query($SQLP) === TRUE) {
                $res = "1";
            } else {
                $res = "Error: " . $SQLP  . "<br>" . $conn->error;
                $i = $filas;
            }
        }
        $this->desconectar($conn);
        return $res;
    }
    public function insertarProducto($producto, $precio, $stock, $imagen, $categoria)
    {

        $conn = $this->conectar();
        $retorno = 0;
        if ($imagen == null) {
            $SQLP = "INSERT INTO producto(producto, precioU, stock, imagen, categoria) 
                VALUES ('$producto',$precio, $stock,'img_default.jpg','$categoria')";
            $result = mysqli_query($conn, $SQLP);
            $retorno = 1;
        } else {
            if (move_uploaded_file($imagen["tmp_name"], "../imagenes/" . $imagen['name'])) {
                $nom_imagen = $imagen['name'];
                $SQLP = "INSERT INTO producto(producto, precioU, stock, imagen, categoria) 
                    VALUES ('$producto',$precio, $stock,'$nom_imagen','$categoria')";
                $result = mysqli_query($conn, $SQLP);
                $retorno = 1;
            } else {
                $retorno = 0;
            }
        }
        $this->desconectar($conn);
        return $retorno;
    }
    public function EliminarProducto($id)
    {
        $conn = $this->conectar();
        $SQLP = "DELETE FROM producto WHERE id = $id";
        $result = mysqli_query($conn, $SQLP);
        $this->desconectar($conn);
    }
}
