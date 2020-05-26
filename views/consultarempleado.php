<?php 
  require '../php/conexion2.php';
  $sql = "SELECT * FROM empleado";
  $statement = $conn->prepare($sql);
  $statement->execute();
  $empleados = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultando Empleados</title>
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
      <th>Código de Empleado</th>
      <th>Nombres</th>
      <th>Apellidos</th>
      <th>Fecha Alta</th>
      <th>Salario Base</th>
      <th>Estado</th>
      <th>Codigo Tienda</th>
      <th>Eliminar</th>
    </tr>
    <?php foreach($empleados as $empleado): ?>
    <tr>
      <td><?= $empleado->id_empleado; ?></td>
      <td><?= $empleado->Nombres; ?></td>
      <td><?= $empleado->Apellidos; ?></td>
      <td><?= $empleado->Fecha_alta; ?></td>
      <td><?= number_format($empleado->Salario_base , 2); ?></td>
      <td><?= $empleado->id_estatus; ?></td>
      <td><?= $empleado->id_tienda; ?></td>
      <td> <button type="button" class="btn btn-danger"><a onclick="return confirm('Esta seguro de eliminar al Videojuego?')" href="../php/dEmpleado.php?borrar=<?php echo $empleado->id_empleado ?>"> Eliminar </button>  </td></a>
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