<?php 
  require '../php/conexion2.php';
  require '../php/eDepartamento.php';
    if(isset($_GET['editar'])){
      $id_editar = $_GET['editar'];

      $sql = "SELECT * FROM departamento WHERE id_departamento = '$id_editar'";
      $statement = $conn->prepare($sql);
      $statement->execute();
      $departamentos = $statement->fetchAll(PDO::FETCH_OBJ);
  }
  foreach($departamentos as $departamento):
    $id = $departamento->id_departamento;
    $nombre = $departamento->Departamento;
    endforeach;
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear Departamento</title>
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
        <h2> Editar Departamento</h2>  
        <div class="form-group">
            <div class="center">
                <label for="campoNombre">Nombre Departamento</label>
            </div>
            <div class="less">
                <input 
                  type="text" 
                  class="form-control" 
                  id="proveedor" 
                  name="departamento" 
                  value="<?php echo $nombre; ?>"
                >
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
        </div>
 
        <div class="form-group">
            <div class="center">
          <!-- Boton para enviar los datos a la base de datos -->
              <a onclick="return confirm('Esta seguro de Editar el Departamento')">
                <button type="submit" 
                value="Registrar Proveedor" 
                name ="send" 
                class="btn btn-info">Editar Departamento </button>
              </a>
            </div>
        </div>
      </form>
    <!-- Final formulario de Proveedor-->
    </main>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/export.js"></script>
 </body>
</html>