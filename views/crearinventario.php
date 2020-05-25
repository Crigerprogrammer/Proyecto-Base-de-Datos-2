<?php 
  require '../php/conexion_sql_server.php';
  require '../php/cInventario.php';
  $sql = "SELECT * FROM video_juegos";
  $statement = $conn->prepare($sql);
  $statement->execute();
  $videojuegos = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrando Inventario</title>
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
        <h2> Nuevo Inventario</h2>  
        <div class="form-group">
            <div class="center">
                <label for="campoNombre">Stock</label>
            </div>
            <div class="less">
                <input 
                  type="number" 
                  class="form-control" 
                  id="nombre" 
                  name="stock" 
                  required
                >
            </div>
        </div>
        <div class="form-group">
            <div class="center">
                <label for="campoDescripcion">Direccion</label>
            </div>
            <div class="less">
                <input 
                  type="text" 
                  class="form-control" 
                  id="descripcion" 
                  name="direccion" 
                  placeholder="Ejem: 7ma avenida" 
                  required
                >
            </div>
        </div>
        <div class="form-group">
            <div class="center">
                <label for="campoFecha">Telefono</label>
            </div>
            <div class="less">
                <input 
                  type="number" 
                  class="form-control" 
                  id="fecha" 
                  name="telefono" 
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
                id="plataforma" 
                class="form-control">
                <?php foreach($videojuegos as $videojuego): ?>
                  <option value="<?= $videojuego->id_videojuegos; ?>" class="form-control"><?= $videojuego->Nombre; ?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>
       
        <div class="form-group">
            <div class="center">
          <!-- Boton para enviar los datos a la base de datos -->
              <a onclick="return confirm('Esta seguro de registrar el Inventario')">
                <button type="submit" 
                value="Registrar Inventario" 
                name ="send" 
                class="btn btn-info">Registrar Inventario </button>
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