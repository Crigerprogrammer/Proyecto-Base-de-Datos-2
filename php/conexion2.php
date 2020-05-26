<?php 
$servername = '(localdb)\VIDEOJUEGOS';
try  
{  
    $conn = new PDO( "sqlsrv:server=$servername ; Database=admin_juegos", "videojuego", "123456"); 
}  catch(PDOExcepction $e) {
    echo $e;
}
