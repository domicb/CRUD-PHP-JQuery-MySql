<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PACO`S GARDENS S.L</title>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <!-- Versión compilada y comprimida del JavaScript de Bootstrap -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</head>

<body>
    
    <?php
    if(isset($_SESSION['email'])):
        include('/app/views/plantilla/encabezado.php');
    ?>
    
<br><br><br>

    <!-- Page Content -->
    <div class="container">     
        <?php include('/app/views/plantilla/menu.php'); ?>
        <?php include('/app/views/plantilla/inicio.php'); ?>
        
    </div>
    <!-- si esta logeado mostramos la pagina sino le mandamos al login -->
    <?php include('/app/views/plantilla/pie.php'); else:  include('/app/controllers/login.php');
  endif;?>
   

</body>

</html>
