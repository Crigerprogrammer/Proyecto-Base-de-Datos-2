<?php 
require ("conexion2.php");

if(isset($_POST['nombre_tienda'])){
    $nombre = $_POST['nombre_tienda'];
    $direccion = $_POST['direccion_tienda'];
    $numero = $_POST['numero_tienda'];
    $cap = $_POST['capacidad'];
    $dep = $_POST['departamento'];

    $sql = "INSERT INTO tienda(Nombre_tienda, Direccion, Telefono, Capacidad, id_departamento)
            VALUES('".$nombre."','".$direccion."','".$numero."',".$cap.",".$dep.")";
    $statement = $conn->prepare($sql);

    if($statement->execute()){
        $mensaje = "Tienda Agregado Correctamente";
        echo '<div class="alert alert-success">';
        echo $mensaje;
        echo '</div>';
    } else{
    	echo "Error";
    }
}

?>