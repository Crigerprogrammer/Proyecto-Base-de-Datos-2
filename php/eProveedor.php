<?php 
require ("conexion_sql_server.php");


if (isset($_POST['nombre_proveedor'])){
$direccion = $_POST['direccion_proveedor'];
$telefono = $_POST['telefono_proveedor'];
$nombre = $_POST['nombre_proveedor'];
$id = $_POST['id_proveedor'];

$sql = "UPDATE proveedor SET Nombre = '".$nombre."', Direccion = '".$direccion."', Telefono = '".$telefono."'
        WHERE id_proveedor = '".$id."' ";

$statement = $conn->prepare($sql);


if($statement->execute()){
    $mensaje = "Editado correctamente";
    echo '<div class="alert alert-success">';
    echo $mensaje;
    echo '</div>';
}

}