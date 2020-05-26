<?php 
  require '../php/conexion2.php';
  require '../php/cEmpleado.php';
  $sql = "SELECT * FROM puesto";
  $statement = $conn->prepare($sql);
  $statement->execute();
  $puestos = $statement->fetchAll(PDO::FETCH_OBJ);

  $sql2 = "SELECT * FROM tienda";
  $statement2 = $conn->prepare($sql2);
  $statement2->execute();
  $tiendas = $statement2->fetchAll(PDO::FETCH_OBJ);

  $sql3 = "SELECT * FROM estatus";
  $statement3 = $conn->prepare($sql3);
  $statement3->execute();
  $status = $statement3->fetchAll(PDO::FETCH_OBJ);

  $sql4 = "SELECT * FROM seccion";
  $statement4 = $conn->prepare($sql4);
  $statement4->execute();
  $secciones = $statement4->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Creando Empleado</title>
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
        <h2> Nuevo Empleado</h2>  
        <div class="form-group">
            <div class="center">
                <label for="campoNombre">Nombre Empleado</label>
            </div>
            <div class="less">
                <input 
                  type="text" 
                  class="form-control" 
                  id="nombre" 
                  name="nombre" 
                  placeholder="Ejem: Denis" 
                  required
                >
            </div>
        </div>
        <div class="form-group">
            <div class="center">
                <label for="campoDescripcion">Apellido Empleado</label>
            </div>
            <div class="less">
                <input 
                  type="text" 
                  class="form-control" 
                  id="descripcion" 
                  name="apellido" 
                  placeholder="Ejem: Bances" 
                  required
                >
            </div>
        </div>
        <div class="form-group">
            <div class="center">
                <label for="campoFecha">Fecha de Alta</label>
            </div>
            <div class="less">
                <input 
                  type="date" 
                  class="form-control" 
                  id="fecha" 
                  name="fecha" 
                  required
                >
            </div>
        </div>
        <div class="form-group">
            <div class="center">
                <label for="campoCosto">Salario Base</label>
            </div>
            <div class="less">
                <input 
                  type="number" 
                  class="form-control" 
                  id="costo" 
                  name="salario" 
                  required
                >
            </div>
        </div>
        <div class="form-group">
            <div class="center">
                <label for="campoDescripcion">Puesto</label>
            </div>
            <div class="less">
            <select name="puesto" 
                id="desarrollador" 
                class="form-control">
                <?php foreach($puestos as $puesto): ?>
                  <option value="<?= $puesto->id_puesto; ?>" class="form-control"><?= $puesto->Nombre_puesto; ?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>
        <div class="form-group">
            <div class="center">
                <label for="campoDescripcion">Tienda</label>
            </div>
            <div class="less">
                <select name="tienda" 
                id="proveedor" 
                class="form-control">
                <?php foreach($tiendas as $tienda): ?>
                  <option value="<?= $tienda->id_tienda; ?>" class="form-control"><?= $tienda->Nombre_tienda; ?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>
        <div class="form-group">
            <div class="center">
                <label for="campoDescripcion">Estatus</label>
            </div>
            <div class="less">
                <select name="status" 
                id="plataforma" 
                class="form-control">
                <?php foreach($status as $statu): ?>
                  <option value="<?= $statu->id_estatus; ?>" class="form-control"><?= $statu->Descripcion; ?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>
        <div class="form-group">
            <div class="center">
                <label for="campoDescripcion">Seccion</label>
            </div>
            <div class="less">
                <select name="seccion" 
                id="plataforma" 
                class="form-control">
                <?php foreach($secciones as $seccion): ?>
                  <option value="<?= $seccion->id_seccion; ?>" class="form-control"><?= $seccion->Descripcion; ?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>
        <div class="form-group">
            <div class="center">
          <!-- Boton para enviar los datos na la base de datos -->
              <a onclick="return confirm('Esta seguro de registrar al Empleado')">
                <button type="submit" 
                value="Registrar Videojuego" 
                name ="send" 
                class="btn btn-info">Registrar Empleado </button>
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