<?php
include 'producto.php';





if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $data = json_decode(file_get_contents('php://input'));
    if ($data != NULL) {
        Producto::eliminarProducto($data->id);
        echo json_encode(array('message' => 'datos borrados', 'data' => $data));
    }
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //data lo tranforma en objeto PHP
    $data = json_decode(file_get_contents('php://input'));
    // print_r($data);

    if ($data != NULL) {
        Producto::ingresarProducto($data->nombre, $data->precio, $data->stock);
    }

    header('Content-type:application/json');
    echo json_encode(array('message' => 'datos recibidos  y guardados', 'data' => $data));
    // lo trasnforma en un array asociativo
    //    $data=(array) $data;
    //     print_r($data);

    //     //lo puedo manejar de las dos maneras
    //    Producto::ingresarProducto($data['nombre'],$data['precio'],$data['stock']);




    exit();

    



}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    //data lo transforma en objeto PHP
    $data = json_decode(file_get_contents('php://input'));
    // print_r($data);

    if ($data != NULL) {
        Producto::modificarProducto($data->id, $data->nombre, $data->precio, $data->stock);
    }

   
    echo json_encode(array('message' => 'datos recibidos  y actualizados', 'data' => $data));

    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if(isset($_GET['id'])){

        echo json_encode(Producto::obtenerXid($_GET['id']));
        
    }else{
        echo json_encode(Producto::obtenerProducto());
    }
     

  



  
    exit();
}

header('Content-type:application/json');
echo json_encode(array('message' => 'Bienvenido a mi micro API clase 25'));
