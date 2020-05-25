<?php 
  require '../php/conexion_sql_server.php';
  require '../php/cVideojuego.php';
  $sql = "SELECT * FROM desarrollador";
  $statement = $conn->prepare($sql);
  $statement->execute();
  $desarrolladores = $statement->fetchAll(PDO::FETCH_OBJ);

  $sql2 = "SELECT * FROM proveedor";
  $statement2 = $conn->prepare($sql2);
  $statement2->execute();
  $proveedores = $statement2->fetchAll(PDO::FETCH_OBJ);

  $sql3 = "SELECT * FROM plataforma";
  $statement3 = $conn->prepare($sql3);
  $statement3->execute();
  $plataformas = $statement3->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Creando Videojuego</title>
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
        <h2> Nuevo Videojuego</h2>  
        <div class="form-group">
            <div class="center">
                <label for="campoNombre">Nombre Videojuego</label>
            </div>
            <div class="less">
                <input 
                  type="text" 
                  class="form-control" 
                  id="nombre" 
                  name="nombre_videojuego" 
                  placeholder="Ejem: Fifa 2020" 
                  required
                >
            </div>
        </div>
        <div class="form-group">
            <div class="center">
                <label for="campoDescripcion">Descripción</label>
            </div>
            <div class="less">
                <input 
                  type="text" 
                  class="form-control" 
                  id="descripcion" 
                  name="descripcion_videojuego" 
                  placeholder="Ejem: Videojuego de accion" 
                  required
                >
            </div>
        </div>
        <div class="form-group">
            <div class="center">
                <label for="campoFecha">Fecha de Lanzamiento</label>
            </div>
            <div class="less">
                <input 
                  type="date" 
                  class="form-control" 
                  id="fecha" 
                  name="fecha_lanzamiento" 
                  required
                >
            </div>
        </div>
        <div class="form-group">
            <div class="center">
                <label for="campoCosto">Costo</label>
            </div>
            <div class="less">
                <input 
                  type="number" 
                  class="form-control" 
                  id="costo" 
                  name="costo_videojuego" 
                  required
                >
            </div>
        </div>
        <div class="form-group">
            <div class="center">
                <label for="campoDescripcion">Desarrollador</label>
            </div>
            <div class="less">
            <select name="desarrollador" 
                id="desarrollador" 
                class="form-control">
                <?php foreach($desarrolladores as $desarrollador): ?>
                  <option value="<?= $desarrollador->id_desarrollador; ?>" class="form-control"><?= $desarrollador->Nombre; ?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>
        <div class="form-group">
            <div class="center">
                <label for="campoDescripcion">Proveedor</label>
            </div>
            <div class="less">
                <select name="proveedor" 
                id="proveedor" 
                class="form-control">
                <?php foreach($proveedores as $proveedor): ?>
                  <option value="<?= $proveedor->id_proveedor; ?>" class="form-control"><?= $proveedor->Nombre; ?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>
        <div class="form-group">
            <div class="center">
                <label for="campoDescripcion">Plataforma</label>
            </div>
            <div class="less">
                <select name="plataforma" 
                id="plataforma" 
                class="form-control">
                <?php foreach($plataformas as $plataforma): ?>
                  <option value="<?= $plataforma->id_plataforma; ?>" class="form-control"><?= $plataforma->Nombre; ?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>
        <div class="form-group">
            <div class="center">
          <!-- Boton para enviar los datos a la base de datos -->
              <a onclick="return confirm('Esta seguro de registrar el viodejuego')">
                <button type="submit" 
                value="Registrar Videojuego" 
                name ="send" 
                class="btn btn-info">Registrar Videojuego </button>
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