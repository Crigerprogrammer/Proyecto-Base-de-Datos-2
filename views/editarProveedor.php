<?php 
    require '../php/conexion_sql_server.php';
    require '../php/eProveedor.php';

    if(isset($_GET['editar'])){
        $id_editar = $_GET['editar'];

        $sql = "SELECT * FROM proveedor WHERE id_proveedor = '$id_editar'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $proveedores = $statement->fetchAll(PDO::FETCH_OBJ);
    }
    foreach($proveedores as $proveedor):
      $id = $proveedor->id_proveedor;
      $nombre = $proveedor->Nombre;
      $direccion = $proveedor->Direccion;
      $telefono = $proveedor->Telefono;
      endforeach;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Proveedor</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<header>
  <?php
    require 'navbar2.php';
  ?>
</header>
<body>
        <form method="POST" name="editarProveedor" enctype="multipart/form-data">
          <h2 class="text-primary"> Editar Proveedor</h2>  
          <div class="form-group">
            <label for="NombreProveedor">Nombre del Proveedor</label>
            <input 
              type="text" 
              class="form-control" 
              id="NombreProveedor" 
              name="nombre_proveedor" 
              value="<?php echo $nombre; ?>"
            >
          </div>
          <div class="form-group">
            <label for="ApellidoCliente">Direccion del Proveedor</label>
            <input 
              type="text" 
              class="form-control" 
              id="direccionProveedor" 
              name="direccion_proveedor"  
              value="<?php echo $direccion; ?>"
            >
          </div>
          <div class="form-group">
            <label for="DireccionCliente">Telefono del Proveedor</label>
            <input 
              type="text" 
              class="form-control" 
              id="telefonoProveedor" 
              name="telefono_proveedor" 
              value="<?php echo $telefono; ?>"
            >

          <div class="form-group ocultar">
            <input 
              type="text" 
              class="form-control ocultar" 
              id="telefonoCliente" 
              name="id_proveedor"
              value="<?php echo $id; ?>"
            >
          </div>
          <div class="form-group">
              <!-- Boton para enviar los datos a la base de datos -->
              <a onclick="return confirm('Esta seguro de editar al proveedor?')" >
                <button type="submit" 
                value="Editar Proveedor" 
                name ="send" 
                class="btn btn-info">Editar Proveedor </button>
              </a>
          </div>
          
        </form>
    
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>