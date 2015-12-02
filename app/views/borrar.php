<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop Item - Start Bootstrap Template</title>
    <?php require_once('\\..\\models\\funciones.php');?>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <!-- Versión compilada y comprimida del JavaScript de Bootstrap -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

    <style>
        .well { /*ocultamos la barra izquierda*/
            overflow: hidden;
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
                <a class="navbar-brand" href="../../index.html">Inicio</a>
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

            <div class="col-md-3"><br>
                <p class="lead">Menú</p>
                <div class="list-group">
                    <a class="list-group-item active">Pulsa sobre una acción</a>
                    <a href="../controllers/mostrar_tarea.php" class="list-group-item">Mostrar Tareas</a>
                    <a href="../controllers/nueva_tarea.php" class="list-group-item">Añadir Tarea</a>
                </div>
            </div><br><br><br>
            <!--         cabecera        -->          
                <p><h2>Borrar Tarea</h2></p>                           
                    <hr>          
                 <div class="row">
                    <div class="col-md-8">                        
                    <!-- FORMULARIO -->
                    <form name="nuevo_usuario" class="form" method="POST" action="borrar_tarea.php">  
                        <span class="label label-danger">Esta seguro de querer borrar la tarea?</span>
			<input type="submit" class="btn btn-danger" name="borrar" value="BORRAR" />	
                        <span class="label label-primary">Pulsa volver para elegir otra tarea</span>
                        <a role="button" href="../controllers/mostrar_tarea.php" class="btn btn-primary"> VOLVER</a>	
			</form>                       
                    </div>
                 </div> <!-- Se cierra div formulario -->
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
                                        <td><b>Anotaciones anteriores</b></td>
                                </tr>
                                        <tbody>
                                    <tr>                                                                     
                                    <tr>
                                    <td> <?php echo $tarea['descripcion'];?> </td>
                                    <td> <?php echo $tarea['operario'];?> </td>
                                    <td> <?php echo $tarea['nombre'];?> </td>
                                    <td> <?php echo $tarea['cod_postal'];?> </td>
                                    <td> <?php echo $tarea['telefono'];?> </td>
                                    <!-- sacamos el id de la provincia el cual nos sirve para preguntar por su nombre  -->                         
                                    <td> <?php echo getProvincia($tarea['idprovincia']);?> </td>             
                                            
                                    <td> <?php echo $tarea['direccion'];?> </td>
                                    <td> <?php echo $tarea['poblacion'];?> </td>
                                    <td> <?php echo getEstado($tarea['estado']);?> </td>
                                    <td> <?php echo $tarea['fecha_creacion'];?> </td>
                                    <td> <?php echo $tarea['fecha_realizacion'];?> </td>  
                                    <td> <?php echo $tarea['anotaciones_anteriores'];?></td>
                                </tr>
                        
            				</tbody>
            		</table>                         
                                                         
                        </div>

                    </div>
                

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
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

	




