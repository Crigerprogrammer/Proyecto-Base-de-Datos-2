<?php 
  require '../php/conexion2.php';
  require '../php/eTienda.php';
  $sql = "SELECT * FROM departamento";
  $statement = $conn->prepare($sql);
  $statement->execute();
  $departamentos = $statement->fetchAll(PDO::FETCH_OBJ);

      if(isset($_GET['editar'])){
      $id_editar = $_GET['editar'];

      $sql = "SELECT * FROM tienda WHERE id_tienda = '$id_editar'";
      $statement = $conn->prepare($sql);
      $statement->execute();
      $tiendas = $statement->fetchAll(PDO::FETCH_OBJ);
  }
  foreach($tiendas as $tienda):
    $id = $tienda->id_tienda;
    $nombre = $tienda->Nombre_tienda;
    $direccion = $tienda->Direccion;
    $telefono = $tienda->Telefono;
    $cap = $tienda->Capacidad;
    endforeach;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Tienda</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<header>
	<?php
		require 'navbar2.php';
	?>
</header>
 <!-- Formulario para registro de nuevo Proveedor -->
      <form method="post" name="crearVideojuego" enctype="multipart/form-data">
        <h2> Editar Tienda</h2>  
        <div class="form-group">
            <div class="center">
                <label for="campoNombre">Nombre Tienda</label>
            </div>
            <div class="less">
                <input 
                  type="text" 
                  class="form-control" 
                  id="proveedor" 
                  name="nombre_tienda" 
                  value="<?php echo $nombre; ?>" 
                  required
                >
            </div>
        </div>
        <div class="form-group">
            <div class="center">
                <label for="campoNombre">Direccion Tienda</label>
            </div>
            <div class="less">
                <input 
                  type="text" 
                  class="form-control" 
                  id="proveedor" 
                  name="direccion_tienda" 
                  value="<?php echo $direccion; ?>"
                  required
                >
            </div>
        </div>
        <div class="form-group">
            <div class="center">
                <label for="campoNombre">Numero Tienda</label>
            </div>
            <div class="less">
                <input 
                  type="number" 
                  class="form-control" 
                  id="proveedor" 
                  name="numero_tienda" 
                  value="<?php echo $telefono; ?>"
                  required
                >
            </div>
        </div>
        <div class="form-group">
            <div class="center">
                <label for="campoNombre">Capacidad Tienda</label>
            </div>
            <div class="less">
                <input 
                  type="number" 
                  class="form-control" 
                  id="proveedor" 
                  name="capacidad" 
                  value="<?php echo $cap; ?>"
                  required
                >
            </div>
        </div>
        <div class="form-group">
            <div class="center">
                <label for="campoDescripcion">Departamento</label>
            </div>
            <div class="less">
            <select name="departamento" 
                id="desarrollador" 
                class="form-control">
                <?php foreach($departamentos as $departamento): ?>
                  <option value="<?= $departamento->id_departamento; ?>" class="form-control"><?= $departamento->Departamento; ?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>
        <div class="form-group ocultar">
            <input 
              type="text" 
              class="form-control ocultar" 
              id="telefonoCliente" 
              name="id"
              value="<?php echo $id; ?>"
            >
          </div>
        <div class="form-group">
            <div class="center">
          <!-- Boton para enviar los datos a la base de datos -->
              <a onclick="return confirm('Esta seguro de Editar la Tienda')">
                <button type="submit" 
                value="Registrar Proveedor" 
                name ="send" 
                class="btn btn-info">Editar Tienda </button>
              </a>
            </div>


    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/export.js"></script>
 </body>
</html>