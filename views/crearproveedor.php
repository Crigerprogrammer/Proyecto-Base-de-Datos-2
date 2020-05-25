<?php require '../php/cProveedor.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Creando Proveedor</title>
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
      <!-- Formulario para registro de nuevo Proveedor -->
      <form method="post" name="crearVideojuego" enctype="multipart/form-data">
        <h2> Nuevo Proveedor</h2>  
        <div class="form-group">
            <div class="center">
                <label for="campoNombre">Nombre Proveedor</label>
            </div>
            <div class="less">
                <input 
                  type="text" 
                  class="form-control" 
                  id="proveedor" 
                  name="nombre_proveedor" 
                  placeholder="Ejem: Videojuego S.A." 
                  required
                >
            </div>
        </div>
        <div class="form-group">
            <div class="center">
                <label for="campoNombre">Direccion Proveedor</label>
            </div>
            <div class="less">
                <input 
                  type="text" 
                  class="form-control" 
                  id="proveedor" 
                  name="direccion_proveedor" 
                  placeholder="Ejem: 10ma calle, Guatemala" 
                  required
                >
            </div>
        </div>
        <div class="form-group">
            <div class="center">
                <label for="campoNombre">Numero Proveedor</label>
            </div>
            <div class="less">
                <input 
                  type="number" 
                  class="form-control" 
                  id="proveedor" 
                  name="numero_proveedor" 
                  required
                >
            </div>
        </div>
        <div class="form-group">
            <div class="center">
          <!-- Boton para enviar los datos a la base de datos -->
              <a onclick="return confirm('Esta seguro de registrar el Proveedor')">
                <button type="submit" 
                value="Registrar Proveedor" 
                name ="send" 
                class="btn btn-info">Registrar Proveedor </button>
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