<?php 
require ("conexion2.php");


if (isset($_POST['nombre_tienda'])){
$nom = $_POST['nombre_tienda'];
$dir = $_POST['direccion_tienda'];
$tel = $_POST['numero_tienda'];
$cap = $_POST['capacidad'];
$dep = $_POST['departamento'];
$id = $_POST['id'];

$sql = "UPDATE tienda SET Nombre_tienda = '".$nom."', Direccion = '".$dir."', Telefono = '".$tel."', Capacidad = '".$cap."', id_departamento = '".$dep."'
        WHERE id_tienda = '".$id."' ";

$statement = $conn->prepare($sql);


if($statement->execute()){
    $mensaje = "Editado correctamente";
    echo '<div class="alert alert-success">';
    echo $mensaje;
    echo '</div>';
}

}