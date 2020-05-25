<?php 
require ("conexion_sql_server.php");


if (isset($_POST['stock'])){
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$stock = $_POST['stock'];
$videojuego = $_POST['videojuego'];
$id = $_POST['inventario'];

$sql = "UPDATE inventario SET stock = '".$stock."', direccion = '".$direccion."', telefono = '".$telefono."', id_videojuegos = '".$videojuego."'
        WHERE id_inventario = '".$id."' ";

$statement = $conn->prepare($sql);


if($statement->execute()){
    $mensaje = "Editado correctamente";
    echo '<div class="alert alert-success">';
    echo $mensaje;
    echo '</div>';
}

}