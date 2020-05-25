<?php 
$servername = '(localdb)\VIDEOJUEGOS';
try  
{  
    $conn = new PDO( "sqlsrv:server=$servername ; Database=info_juegos", "videojuego", "123456");  
}  catch(PDOExcepction $e) {
    echo $e;
}
