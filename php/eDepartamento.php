<?php 
require ("conexion2.php");


if (isset($_POST['departamento'])){
$nombre = $_POST['departamento'];
$id = $_POST['id'];

$sql = "UPDATE departamento SET Departamento = '".$nombre."'
        WHERE id_departamento = '".$id."' ";

$statement = $conn->prepare($sql);


if($statement->execute()){
    $mensaje = "Editado correctamente";
    echo '<div class="alert alert-success">';
    echo $mensaje;
    echo '</div>';
}

}