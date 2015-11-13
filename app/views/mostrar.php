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

        <div class="row">

            <div class="col-md-3"><br><br>
                <p class="lead"><h1>Menú</h1></p>
                <div class="list-group">
                    <a class="list-group-item active">Pulsa sobre una acción</a>
                    <a href="../controllers/mostrar_tarea.php" class="list-group-item">Mostrar Tareas</a>
                    <a href="../controllers/nueva_tarea.php" class="list-group-item">Añadir Tarea</a>
                    <a href="final.php" class="list-group-item">Finalizar Tarea</a>
                    <a href="borrar.php" class="list-group-item">Borrar Tarea</a>
                </div>
            </div>
            
                <div class="well"><br><br>
                        <p><h3>Resultado de Tareas:</h3></p>
                            <p><span class="pull-right"><h5>Lista actualizada a <?php echo date("F j, Y, g:i a");?></h5></span></p>						
                    <hr>
                    <div class="row">
                        <form name="buscar" class="form" method="POST" action="buscar_tarea.php">
                            <div class="form-group">
                                <label>Para una busqueda personalizada introduce la condicion y el campo afectado</label>
                               	<br><br>
                                <p>
                                Condicion: <select name="condicion">
								<option></option>
								<option value=">">Mayor que</option>
								<option value="<">Menor que</option>
								<option value="=">Igual que</option>
								</select>
                                Campo a filtrar: <select name="campo">
								  <option></option>
								  <option value="operario">operario</option>
								  <option value="fecha_creacion">fecha de creacion</option>
								  <option value="descripcion">descripcion</option>
								</select>
								</p>
                            </div>
                            <input type="submit" class="btn btn-success" name="busca" value="FILTRAR">
                    </div>                  
                    <div class="row">
                        <div class="col-md-3 .col-md-offset-3">
                     <table class="table table-striped">
            			<thead>
            				<tr><!--tabla de tareas-->
            					<td><b>Descripcion</b></td>
            					<td><b>Operario</b></td>
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
                                    <?php

            						echo mostrarTareas($posIni,PROXPAG);

                                    ?>

                                    <tr>
            					</tbody>
            		</table>                         
                                                         
                        </div>

                    </div>
                </div>
                <P>
                <?php if ($pag>1): ?>
                    <a href="?pag=<?=$pag-1?>">Anterior</a>
                <?php endif; ?>
                <?php if ($pag<$maxPag-1) :?> 
                    <a href="?pag=<?=$pag+1?>">Siguiente</a>
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
