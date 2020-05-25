<?php 
  require '../php/conexion_sql_server.php';
  require '../php/cVenta.php';
  $sql = "SELECT * FROM video_juegos";
  $statement = $conn->prepare($sql);
  $statement->execute();
  $videojuegos = $statement->fetchAll(PDO::FETCH_OBJ);

  $sql2 = "SELECT * FROM cliente";
  $statement2 = $conn->prepare($sql2);
  $statement2->execute();
  $clientes = $statement2->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro Nueva Venta</title>
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
      <!-- Formulario para registro de nuevo Viodejuego -->
      <form method="post" name="crearVideojuego" enctype="multipart/form-data">
        <h2> Nueva Venta</h2>  
        <div class="form-group">
            <div class="center">
                <label for="campoNombre">Fecha Venta</label>
            </div>
            <div class="less">
                <input 
                  type="date" 
                  class="form-control" 
                  id="nombre" 
                  name="fecha" 
                  required
                >
            </div>
        </div>
        <div class="form-group">
            <div class="center">
                <label for="campoDescripcion">Cantidad</label>
            </div>
            <div class="less">
                <input 
                  type="number" 
                  class="form-control" 
                  id="descripcion" 
                  name="cantidad" 
                  required
                >
            </div>
        </div>
        <div class="form-group">
            <div class="center">
                <label for="campoDescripcion">Videojuego</label>
            </div>
            <div class="less">
            <select name="videojuego" 
                id="desarrollador" 
                class="form-control">
                <?php foreach($videojuegos as $videojuego): ?>
                  <option value="<?= $videojuego->id_videojuegos; ?>" class="form-control"><?= $videojuego->Nombre; ?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>
        <div class="form-group">
            <div class="center">
                <label for="campoDescripcion">Cliente</label>
            </div>
            <div class="less">
                <select name="cliente" 
                id="proveedor" 
                class="form-control">
                <?php foreach($clientes as $cliente): ?>
                  <option value="<?= $cliente->id_cliente; ?>" class="form-control"><?= $cliente->Nombre_cliente; ?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>
       
        <div class="form-group">
            <div class="center">
          <!-- Boton para enviar los datos a la base de datos -->
              <a onclick="return confirm('Esta seguro de registrar la venta')">
                <button type="submit" 
                value="Registrar Venta" 
                name ="send" 
                class="btn btn-info">Registrar Venta </button>
              </a>
            </div>
        </div>
      </form>
    <!-- Final formulario de Videojuego-->
    </main>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/export.js"></script>
 </body>
</html>