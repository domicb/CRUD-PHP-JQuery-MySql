<!DOCTYPE html>
<html lang="en">
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

        <div class="row">

            <div class="col-md-3"><br>
                <p class="lead">Menú</p>
                <div class="list-group">
                    <a class="list-group-item active">Pulsa sobre una acción</a>
                    <a href="mostrar_tarea.php" class="list-group-item">Mostrar Tareas</a>
                    <a href="../controllers/nueva_tarea.php" class="list-group-item">Añadir Tarea</a>
                    <a href="final.php" class="list-group-item">Finalizar Tarea</a>
                    <a href="borrar.php" class="list-group-item">Borrar Tarea</a>
                </div>
            </div><br>
            <!--         cabecera        -->
                <div class="well">
                        <p><h2>Modificar Tarea</h2></p>                           
                    <hr> 

                    <div class="col-md-9">

                    <!-- FORMULARIO -->
                        <form name="nuevo_usuario" class="form" method="POST" action="../controllers/modificar_tarea.php">
                                  
                            <!-- AQUI EMPIEZAN LOS CAMPOS -->        
                                <div class="form-group">                                    
                                    <input class="form-control" type="text" name="nombre" value="<?php echo $tarea['nombre']; ?>" placeholder="Nombre"/>
                                    <?php if( isset($array_errores['vacio1']) )
                                    { VerError('vacio1'); }?>   
                                </div>
                                <div class="form-group">        
                                    <input type="text" class="form-control" name="apellidos" value="<?php echo $tarea['apellidos'];?>" placeholder="Apellidos"/>
                                    <?php if( isset($array_errores['vacio1']) )
                                    { VerError('vacio1'); }?>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="telefono" class="form-control" value="<?php echo $tarea['telefono'];?>" placeholder="telefono"/>
                                    <?php if( isset($array_errores['telefono']) )
                                    { VerError('telefono'); }?> 
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" value="<?php echo $tarea['email'];?>" placeholder="email"/>
                                    <?php if( isset($array_errores['email']) )
                                    { VerError('email'); }?>
                                </div>
                                <div class="form-group">                                
                                    <input type="text" name="direccion" class="form-control" value="<?php echo $tarea['direccion']?>" placeholder="direccion"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="poblacion" class="form-control" value="<?php echo $tarea['poblacion']?>" placeholder="Poblacion"/>  
                                </div>
                                <div class="form-group">
                                    <input type="text" name="cod_postal" class="form-control" value="<?php echo $tarea['cod_postal']?>" placeholder="Codigo Postal"/>
                                    <?php if( isset($array_errores['cod_postal']) )
                                    { VerError('cod_postal'); }?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" class="form-control" name="operario" value="<?php echo $tarea['operario']?>" placeholder="Operario"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="anotaciones_anteriores" value="<?php echo $tarea['anotaciones_anteriores']?>" placeholder="Anotaciones" />
                                </div>
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="descripcion" value="<?php echo $tarea['descripcion']?>" placeholder="Descripcion de la tarea" />
                                    <?php if( isset($array_errores['vacio']) )
                                    {      VerError('vacio'); }?>                       
                                </div>
                                <hr> <center><input type="submit" name="guardar" value="Guardar Cambios" /></center>
                                                                
                        </form>
                        
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

    

