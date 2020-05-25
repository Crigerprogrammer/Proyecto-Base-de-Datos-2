<?php 
require ("conexion_sql_server.php");

if(isset($_POST['nombre_videojuego'])){
    $nombre = $_POST['nombre_videojuego'];
    $descripcion = $_POST['descripcion_videojuego'];
    $fecha = $_POST['fecha_lanzamiento'];
    $costo = $_POST['costo_videojuego'];
    $desarollador = $_POST['desarrollador'];
    $proveedor = $_POST['proveedor'];
    $plataforma = $_POST['plataforma'];

    $sql = "INSERT INTO video_juegos(Nombre, Descripcion, Fecha_lanzamiento, Costo, id_desarrollador, id_proveedor, id_plataforma)
            VALUES('".$nombre."','".$descripcion."','".$fecha."',".$costo.",'".$desarollador."','".$proveedor."','".$plataforma."')";
    $statement = $conn->prepare($sql);

    if($statement->execute()){
        $mensaje = "Videojuego Agregado Correctamente";
        echo '<div class="alert alert-success">';
        echo $mensaje;
        echo '</div>';
    } else{
    	echo "Error";
    }
}

?>