<?php
include 'conexion.php';
class Producto
{

    private $nombre;
    private $precio;
    private $stock;
    private $db;

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }
    public function getPrecio()
    {
        return $this->precio;
    }
    public function setStock($stock)
    {
        $this->stock = $stock;
    }
    public function getStock()
    {
        return $this->stock;
    }

    public static function obtenerProducto()
    {
        $db = new Db;
        $query = $db->connect()->query('SELECT * FROM producto');
        $datos = array();

        if ($query->rowCount()) {
            while($row=$query->fetch()){

                $item=array(
                    'id'=>$row['id'],
                    'nombre'=>$row['nombre'],
                    'precio'=>$row['precio'],
                    'stock'=>$row['stock']

                );
                array_push($datos,$item);
                
            }
            return $datos;

        }

        // return $query->fetchAll();

    }
    public static function obtenerXid($id)
    {

        $db = new Db;
        $query = $db->connect()->query("SELECT * FROM producto WHERE id='" . $id . "'");
        $datos = array();
        if ($query->rowCount()) {
            while($row=$query->fetch()){

                $item=array(
                    'id'=>$row['id'],
                    'nombre'=>$row['nombre'],
                    'precio'=>$row['precio'],
                    'stock'=>$row['stock']

                );
                array_push($datos,$item);
                
            }
            return $datos;

        }
        // return $query->fetch();

    }

    public static function ingresarProducto($nombre, $precio, $stock)
    {

        $query = "INSERT INTO producto (nombre,precio,stock) VALUES ('" . $nombre . "', '" . $precio . "','" . $stock . "')";
        $db = new Db;

        $respuesta = $db->connect()->prepare($query);
        $respuesta->execute();
    }

    public static function modificarProducto($id, $nombre, $precio, $stock)
    {
        $db = new Db;
        $query = $db->connect()->query("UPDATE producto SET nombre='" . $nombre . "',precio='" . $precio . "',stock='" . $stock . "' WHERE id=$id");

    }

    public static function eliminarProducto($id)
    {
        $db = new Db;
        $query = $db->connect()->query("DELETE FROM producto WHERE id='" . $id . "' ");
    }

    public function guardar()
    {

        // echo json_encode(array('message' => 'datos recibidos  y guardados', 'data' => $data));

    }

}
//  $producto=new Producto;
//  $item=$producto->eliminarProducto(2);

// print_r($item->fetchAll());
