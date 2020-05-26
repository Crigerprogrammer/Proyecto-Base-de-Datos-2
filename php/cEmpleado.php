<?php 
require ("conexion2.php");

if(isset($_POST['nombre'])){
    $nom = $_POST['nombre'];
    $ape = $_POST['apellido'];
    $fec = $_POST['fecha'];
    $sal = $_POST['salario'];
    $pue = $_POST['puesto'];
    $tie = $_POST['tienda'];
    $est = $_POST['status'];
    $sec = $_POST['seccion'];

    $sql = "INSERT INTO empleado(Nombres, Apellidos, Fecha_alta, Salario_base, id_puesto, id_tienda, id_estatus, id_seccion)
            VALUES('".$nom."','".$ape."','".$fec."',".$sal.",'".$pue."','".$tie."','".$est."','".$sec."')";
    $statement = $conn->prepare($sql);

    if($statement->execute()){
        $mensaje = "Empleado Agregado Correctamente";
        echo '<div class="alert alert-success">';
        echo $mensaje;
        echo '</div>';
    } else{
    	echo "Error";
    }
}

?>