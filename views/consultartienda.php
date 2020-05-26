<?php 
  require '../php/conexion2.php';
  $sql = "SELECT t.id_tienda as id, t.Nombre_tienda as Nombre_Tienda, t.Direccion as Direccion_Tienda, t.Telefono as Telefono, t.Capacidad as Capacidad, d.Departamento as Departamento FROM tienda t, departamento d WHERE t.id_departamento = d.id_departamento";
  $statement = $conn->prepare($sql);
  $statement->execute();
  $tiendas = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultar Tiendas</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<header>
	<?php
		require 'navbar2.php';
	?>
</header>
<main>
    <table class="table table-bordered" style="width: 75% !important; margin:3% auto;">
    <tr>
      <th>Codigo </th>
      <th>Nombre </th>
      <th>Direccion </th>
      <th>Telefono </th>
      <th>Capacidad </th>
      <th>Departamento</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </tr>
    <?php foreach($tiendas as $tienda): ?>
    <tr>
    	<td><?= $tienda->id; ?></td>
      <td><?= $tienda->Nombre_Tienda; ?></td>
      <td><?= $tienda->Direccion_Tienda; ?></td>
      <td><?= $tienda->Telefono; ?></td>
      <td><?= $tienda->Capacidad; ?></td>
      <td><?= $tienda->Departamento; ?></td>
      <td> <button type="button" class="btn btn-warning"><a href="editarTienda.php?editar=<?php echo $tienda->id ?>"> Editar </button></td></a>
      <td> <button type="button" class="btn btn-danger"><a onclick="return confirm('Esta seguro de eliminar la Tienda?')" href="../php/dTienda.php?borrar=<?php echo $tienda->id ?>"> Eliminar </button>  </td></a>
    </tr>
    <?php endforeach; ?>
  </table>
</main>


<body>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/export.js"></script>
 </body>
</html>