<?php 
require ("conexion2.php");

if(isset($_POST['departamento'])){
    $departamento2 = $_POST['departamento'];

    $sql = "INSERT INTO departamento(Departamento)
            VALUES('".$departamento2."')";
    $statement = $conn->prepare($sql);

    if($statement->execute()){
        $mensaje = "Departamento Agregado Correctamente";
        echo '<div class="alert alert-success">';
        echo $mensaje;
        echo '</div>';
    } else{
        echo "ERROR!!!!";
    }
}

?>