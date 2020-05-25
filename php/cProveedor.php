<?php 
require ("conexion_sql_server.php");

if(isset($_POST['nombre_proveedor'])){
    $nombre = $_POST['nombre_proveedor'];
    $direccion = $_POST['direccion_proveedor'];
    $numero = $_POST['numero_proveedor'];

    $sql = "INSERT INTO proveedor(Nombre, Direccion, Telefono)
            VALUES('".$nombre."','".$direccion."','".$numero."')";
    $statement = $conn->prepare($sql);

    if($statement->execute()){
        $mensaje = "Proveedor Agregado Correctamente";
        echo '<div class="alert alert-success">';
        echo $mensaje;
        echo '</div>';
    } else{
        echo "ERROR!!!!";
    }
}

?>