<?php 
require ("conexion_sql_server.php");

if(isset($_POST['stock'])){
    $stock = $_POST['stock'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $videojuego = $_POST['videojuego'];

    $sql = "INSERT INTO inventario(stock, direccion, telefono, id_videojuegos)
            VALUES(".$stock.",'".$direccion."',".$telefono.",".$videojuego.")";
    $statement = $conn->prepare($sql);

    if($statement->execute()){
        $mensaje = "Inventario Agregado Correctamente";
        echo '<div class="alert alert-success">';
        echo $mensaje;
        echo '</div>';
    } else{
        echo "ERROR!!!!";
    }
}

?>