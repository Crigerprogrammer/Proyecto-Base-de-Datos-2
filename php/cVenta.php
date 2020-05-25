<?php 
require ("conexion_sql_server.php");

if(isset($_POST['fecha'])){
    $fecha = $_POST['fecha'];
    $cantidad = $_POST['cantidad'];
    $videojuego = $_POST['videojuego'];
    $cliente = $_POST['cliente'];

    $sql = "INSERT INTO ventas(Fecha, Cantidad, id_videojuegos, id_cliente)
            VALUES('".$fecha."','".$cantidad."','".$videojuego."',".$cliente.")";
    $statement = $conn->prepare($sql);

    if($statement->execute()){
        $mensaje = "Venta Agregado Correctamente";
        echo '<div class="alert alert-success">';
        echo $mensaje;
        echo '</div>';
    } else{
    	echo "Error";
    }
}

?>