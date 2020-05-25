<?php 
  require '../php/conexion_sql_server.php';
  $sql = "SELECT * FROM video_juegos";
  $statement = $conn->prepare($sql);
  $statement->execute();
  $videojuegos = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultando Videojuego</title>
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
      <th>Código de Viodejuego</th>
      <th>Nombre Videojuego</th>
      <th>Descripcion Videojuego</th>
      <th>Fecha de Lanzamiento</th>
      <th>Costo</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </tr>
    <?php foreach($videojuegos as $videojuego): ?>
    <tr>
      <td><?= $videojuego->id_videojuegos; ?></td>
      <td><?= $videojuego->Nombre; ?></td>
      <td><?= $videojuego->Descripcion; ?></td>
      <td><?= $videojuego->Fecha_lanzamiento; ?></td>
      <td>Q <?= number_format($videojuego->Costo , 2); ?></td>
      <td> <button type="button" class="btn btn-warning"><a href="editarVideojuego.php?editar=<?php echo $videojuego->id_videojuegos ?>"> Editar </button></td></a>
      <td> <button type="button" class="btn btn-danger"><a onclick="return confirm('Esta seguro de eliminar al Videojuego?')" href="../php/dVideojuego.php?borrar=<?php echo $videojuego->id_videojuegos ?>"> Eliminar </button>  </td></a>
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