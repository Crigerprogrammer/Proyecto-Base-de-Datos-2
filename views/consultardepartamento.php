<?php 
  require '../php/conexion2.php';
  $sql = "SELECT * FROM departamento";
  $statement = $conn->prepare($sql);
  $statement->execute();
  $departamentos = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultar Departamentos</title>
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
      <th>Código de Departamento</th>
      <th>Nombre Departamento</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </tr>
    <?php foreach($departamentos as $departamento): ?>
    <tr>
      <td><?= $departamento->id_departamento; ?></td>
      <td><?= $departamento->Departamento; ?></td>
      <td> <button type="button" class="btn btn-warning"><a href="editarDepartamento.php?editar=<?php echo $departamento->id_departamento ?>"> Editar </button></td></a>
      <td> <button type="button" class="btn btn-danger"><a onclick="return confirm('Esta seguro de eliminar al Departamento?')" href="../php/dDepartamento.php?borrar=<?php echo $departamento->id_departamento ?>"> Eliminar </button>  </td></a>
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