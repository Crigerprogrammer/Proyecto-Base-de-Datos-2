<?php 
  require '../php/conexion_sql_server.php';
  require '../php/eInventario.php';
  $sql = "SELECT * FROM video_juegos";
  $statement = $conn->prepare($sql);
  $statement->execute();
  $videojuegos = $statement->fetchAll(PDO::FETCH_OBJ);

    if(isset($_GET['editar'])){
      $id_editar = $_GET['editar'];

      $sql = "SELECT * FROM inventario WHERE id_inventario = '$id_editar'";
      $statement = $conn->prepare($sql);
      $statement->execute();
      $inventarios = $statement->fetchAll(PDO::FETCH_OBJ);
  }
  foreach($inventarios as $inventario):
    $id = $inventario->id_inventario;
    $stock = $inventario->stock;
    $direccion = $inventario->direccion;
    $telefono = $inventario->telefono;
    endforeach;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editando Inventario</title>
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
        <h2> Editar Inventario</h2>  
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
                  value="<?php echo $stock; ?>"
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
                  value="<?php echo $direccion; ?>"
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
                  value="<?php echo $telefono; ?>"
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
        <div class="form-group ocultar">
            <input 
              type="text" 
              class="form-control ocultar" 
              id="telefonoCliente" 
              name="inventario"
              value="<?php echo $id; ?>"
            >
          </div>
       
        <div class="form-group">
            <div class="center">
          <!-- Boton para enviar los datos a la base de datos -->
              <a onclick="return confirm('Esta seguro de editar el Inventario')">
                <button type="submit" 
                value="Registrar Inventario" 
                name ="send" 
                class="btn btn-info">Editar Inventario </button>
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