<?php 
  require '../php/conexion_sql_server.php';
  $sql = "SELECT * FROM proveedor";
  $statement = $conn->prepare($sql);
  $statement->execute();
  $proveedores = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultar Proveedor</title>
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
      <th>Código de Proveedor</th>
      <th>Nombre Proveedor</th>
      <th>Direccion Proveedor</th>
      <th>Telefono Proveedor</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </tr>
    <?php foreach($proveedores as $proveedor): ?>
    <tr>
      <td><?= $proveedor->id_proveedor; ?></td>
      <td><?= $proveedor->Nombre; ?></td>
      <td><?= $proveedor->Direccion; ?></td>
      <td><?= $proveedor->Telefono; ?></td>
      <td> <button type="button" class="btn btn-warning"><a href="editarProveedor.php?editar=<?php echo $proveedor->id_proveedor ?>"> Editar </button></td></a>
      <td> <button type="button" class="btn btn-danger"><a onclick="return confirm('Esta seguro de eliminar al Proveedor?')" href="../php/dProveedor.php?borrar=<?php echo $proveedor->id_proveedor ?>"> Eliminar </button>  </td></a>
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