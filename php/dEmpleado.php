<?php 
require ("conexion2.php");


if(isset($_GET['borrar'])){
    $id = $_GET['borrar'];

    $sql = "DELETE FROM empleado WHERE id_empleado = '$id'";
    $statement = $conn->prepare($sql);
    $statement->execute();
}

if($statement->execute()){
    $mensaje = "Eliminado correctamente";
    echo '<div class="alert alert-danger">';
    echo $mensaje;
    echo '</div>';
    header("location:../views/consultarempleado.php");
}

