<?php 
require ("conexion_sql_server.php");


if(isset($_GET['borrar'])){
    $id = $_GET['borrar'];

    $sql = "DELETE FROM inventario WHERE id_inventario = '$id'";
    $statement = $conn->prepare($sql);
    $statement->execute();
}

if($statement->execute()){
    $mensaje = "Eliminado correctamente";
    echo '<div class="alert alert-danger">';
    echo $mensaje;
    echo '</div>';
    header("location:../views/consultarinventario.php");
}

