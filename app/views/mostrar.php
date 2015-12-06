<!DOCTYPE html>
<html lang="en">
<?php require_once('\\..\\models\\funciones.php');?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop Item - Start Bootstrap Template</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <!-- Versión compilada y comprimida del JavaScript de Bootstrap -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <style>
            .inp
            {
                border: 1px solid #DBE1EB;
                font-size: 12px;
                font-family: Arial, Verdana;
                padding-left: 15px;
                padding-right: 7px;
                padding-top: 8px;
                padding-bottom: 8px;
                border-radius: 2px;
                -moz-border-radius: 2px;
                -webkit-border-radius: 2px;
                -o-border-radius: 2px;
                background: #FFFFFF;
                background: linear-gradient(left, #FFFFFF, #F7F9FA);
                background: -moz-linear-gradient(left, #FFFFFF, #F7F9FA);
                background: -webkit-linear-gradient(left, #FFFFFF, #F7F9FA);
                background: -o-linear-gradient(left, #FFFFFF, #F7F9FA);
                color: #2E3133;
            }
            .inp:focus
            {
                color: #2E3133;
                border-color: #FBFFAD;
            }
        </style>
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../../index.php">Inicio</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Sobre nosotros</a>
                    </li>
                    <li>
                        <a href="#">Que ofrecemos</a>
                    </li>
                    <li>
                        <a href="#">Contacto</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3"><br><br><br>
                <p class="lead"><h1>Menú</h1></p>
                <div class="list-group">
                    <a class="list-group-item active">Pulsa sobre una acción</a>
                    <a href="../controllers/mostrar_tarea.php" class="list-group-item">Mostrar Tareas</a>
                    <a href="../controllers/nueva_tarea.php" class="list-group-item">Añadir Tarea</a>
                </div>
            </div>
            
                <div class="well"><br><br>
                        <p><h3>Resultado de Tareas:</h3></p>
                            <p><span class="pull-right"><h5>Lista actualizada a <?php echo date("F j, Y, g:i a");?></h5></span></p>						
                    <hr>
                    <div class="row"><!--ROW DEL FORMULARIO-->
                        <form name="buscar" class="form" method="POST" action="../controllers/mostrar_tarea.php">
                            <label>Para una busqueda personalizada introduce la condicion y el campo afectado</label><br>
                                <div class="col-md-2">
                                    Operario: <input type="text" class="inp" name="operario">
                                    <select name="condicion_operario" class="inp">
                                      <option></option>
                                      <option value="="> IGUAL </option>
                                      <option value="!="> DIFERENTE </option>
                                      <option value="like"> Que empieze </option>
                                    </select>
                                </div><div class="col-md-2">
                                    Fecha Creacion: <input class="inp" type="text" name="creacion">
                                    <select name="condicion_creacion" class="inp" >
                                        <option></option>
                                        <option value=">"> MAYOR </option>
                                        <option value="<"> MENOR </option>
                                        <option value="="> IGUAL </option>
                                    </select>
                                </div><div class="col-md-2">
                                    Email: <input type="text" name="ema" class="inp">
                                    <select name="condicion_email" class="inp">
                                        <option></option>
                                        <option value="="> IGUAL </option>
                                        <option value="like"> Que contenga </option>
                                    </select>
                                </div>
                    </div> 
                <!-- AQUI TERMINAN LOS CAMPOS Y SE ENCUENTRA EL BOTON DEL FORMULARIO-->  
                    <div class="row"> <br>         
                            <center><input type="submit" class="btn btn-success" name="busca" value="FILTRAR"></center>   
                    </div><br>
                    <div class="row">
                        <div class="col-md-3 .col-md-offset-3">
                     <table class="table table-striped">
            			<thead>
            				<tr><!--tabla de tareas-->
            					<td><b>Descripcion</b></td>
            					<td><b>Operario</b></td>
                                                <td><b>Nombre</b></td>
                                                <td><b>Codigo Postal</b></td>
                                                <td><b>Telefono</b></td>
                                                <td><b>Provincia</b></td>
                                                <td><b>Direccion</b></td>
                                                <td><b>Poblacion</b></td>
                                                <td><b>Estado</b></td>
                                                <td><b>Fecha Creacion</b></td>
                                                <td><b>Fecha Finalizacion</b></td>
            					<td><b>Acciones</b></td>
                			</tr>
                                    <tbody>
                                    <tr>
                                <?php foreach ($tarea as $row) : ?>                                      
                                    <tr>
                                    <td> <?php echo $row['descripcion'];?> </td>
                                    <td> <?php echo $row['operario'];?> </td>
                                    <td> <?php echo $row['nombre'];?> </td>
                                    <td> <?php echo $row['cod_postal'];?> </td>
                                    <td> <?php echo $row['telefono'];?> </td>
                                    <!-- sacamos el id de la provincia el cual nos sirve para preguntar por su nombre  -->                         
                                    <td> <?php echo getProvincia($row['idprovincia']);?> </td>             
                                            
                                    <td> <?php echo $row['direccion'];?> </td>
                                    <td> <?php echo $row['poblacion'];?> </td>
                                    <td> <?php echo getEstado($row['estado']);?> </td>
                                    <td> <?php echo $row['fecha_creacion'];?> </td>
                                    <td> <?php echo $row['fecha_realizacion'];?> </td>
                                    <td>
                                    <a href="../controllers/modificar_tarea.php?id=<?php echo $row['idtarea'];?>">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>&nbsp;&nbsp;<a href="../controllers/completar_tarea.php?id=<?php echo $row['idtarea'];?>">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </a>&nbsp;&nbsp;<a href="borrar_tarea.php?id=<?php echo $row['idtarea'];?>">
                                        <span class="glyphicon glyphicon-remove"></span></a>
                                    
                                    </td>
                                <?php endforeach; ?> 
                                </tr>
                        
            				</tbody>
            		</table>                         
                                                         
                        </div>

                    </div>
                </div>
                <P>
                <?php if ($pag>1): ?>
                    <a href="?pag=<?=$pag-1?>">  Anterior</a>
                <?php endif; ?>
                <?php echo 'Pagina '.$pag?>
                <?php if ($pag<$maxPag-1) :?> 
                    <a href="?pag=<?=$pag+1?>">  Siguiente</a>
                <?php endif;?>
                    </P>
            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Carrasco Bueno Domingo 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
