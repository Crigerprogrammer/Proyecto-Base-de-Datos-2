<?php 
  require '../php/conexion_sql_server.php';
  $sql = "SELECT c.Nombre_cliente as Nombre, c.Nit as Nit, c.Telefono as Telefono, c.Direccion as Direccion, c.Correo_Electronico as Correo_Electronico, t.Nombre as Tipo_Cliente FROM cliente c, tipo_cliente t WHERE c.id_tipocliente = t.id_tipocliente";
  $statement = $conn->prepare($sql);
  $statement->execute();
  $clientes = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultar Clientes</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<header>
	<?php
		require 'navbar2.php';
	?>
</header>
<body>
<main>    
  <table class="table table-bordered" style="width: 75% !important; margin:3% auto;">
    <tr>
      <th>Nombre Cliente</th>
      <th>Nit</th>
      <th>Telefono</th>
      <th>Direccion</th>
      <th>Correo Electronico</th>
      <th>Tipo Cliente</th>
    </tr>
    <?php foreach($clientes as $cliente): ?>
    <tr>
      <td><?= $cliente->Nombre; ?></td>
      <td><?= $cliente->Nit; ?></td>
      <td><?= $cliente->Telefono; ?></td>
      <td><?= $cliente->Direccion; ?></td>
      <td><?= $cliente->Correo_Electronico; ?></td>
      <td><?= $cliente->Tipo_Cliente; ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
    <!-- Final formulario de Proveedor-->
</main>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/export.js"></script>
 </body>
</html>