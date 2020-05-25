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
    $id = $_POST['id_videojuego'];

$sql = "UPDATE video_juegos SET Nombre = '".$nombre."', Descripcion = '".$descripcion."', Fecha_lanzamiento = '".$fecha."', Costo = ".$costo.", id_desarrollador = '".$desarollador."', id_proveedor = '".$proveedor."', id_plataforma = '".$plataforma."'
        WHERE id_videojuegos = '".$id."' ";

$statement = $conn->prepare($sql);


if($statement->execute()){
    $mensaje = "Editado correctamente";
    echo '<div class="alert alert-success">';
    echo $mensaje;
    echo '</div>';
}

}