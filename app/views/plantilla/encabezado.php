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
                <a class="navbar-brand" href="index.php">Inicio</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav" style="float:right">
                    <li>
                        <?php if(isset($_SESSION['es_admin'])) :
                        {
                            echo '<a href="app/controllers/add.php">Añadir usuario </a>';                                                    
                        }
                        ?>
                    </li>
                    <li>
                        <?php  echo '<a href="app/controllers/delete.php">Eliminar usuario </a>';?>
                    </li>
                    <li><?php echo '<a href="app/controllers/mostrar_usuarios.php">Listar usuarios </a>';                endif;?></li>
                    <li><?php if(isset($_SESSION['es_usuario']))
                    {
                         echo '<a href="app/controllers/modify.php">Modificar usuario </a>';
                    }
                    ?></li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                    
                    <li>
                        <a href="">Logueado como: </a>
                    </li>
                    <li>
                        <a href=""><?php echo $_SESSION['valores'];?></a>
                    </li>

                    <li>
                        <a href="app/controllers/salir.php"> Cerrar Sesion</a>
                    </li>                
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
