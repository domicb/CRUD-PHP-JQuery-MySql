<div class="col-md-8">

    <h1> Cuentas PACO`S GARDENS</h1>
    <form class="form-signin" action="" method="POST">
        <h2 class="form-signin-heading">Introduzca el email del usuario a borrar</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" value="" class="form-control" placeholder="Email address" required autofocus>
        <?php if(isset($array_errores['campos_vacios']))
        {
             VerError('campos_vacios');
        }
        ?>  
        <?php if(isset($array_errores['no_existe']))
        {
             VerError('no_existe');
        }
        ?>  
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="detele" >BORRAR</button>
      </form>
    <?php echo '<a href="mostrar_usuarios.php">Pulsa para ver la lista de usuarios</a>';?>

    </div> <!-- /container -->

