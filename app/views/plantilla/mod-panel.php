<div class="col-md-8">

    <h1> Modificar Registro PACO`S GARDENS</h1>
    <form class="form-signin" action="" method="POST">
        <h2 class="form-signin-heading">Introduzca los nuevos datos del usuario</h2>
        <label for="inputEmail" class="sr-only">Nuevo email</label>
        <input type="email" name="email" value="" class="form-control" placeholder="Email address" required autofocus>
        <?php if(isset($array_errores['campos_vacios']))
        {
             VerError('campos_vacios');
        }
        ?>
        <label for="inputPassword" class="sr-only">Nueva contraseña</label>
        <input type="password" name="password" value="" class="form-control" placeholder="Password" required>
        <?php if(isset($array_errores['campos_vacios']))
        {
             VerError('campos_vacios');
        }
        ?>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="nuevo_usu" >REGISTRAR</button>
      </form>
echo '<a href="mostrar_usuarios.php">Pulsa para ver la lista de usuarios</a>';
    </div> <!-- /container -->