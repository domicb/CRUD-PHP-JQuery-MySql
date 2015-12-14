<div class="col-md-8">

    <h1> Registro PACO`S GARDENS</h1>
    <form class="form-signin" action="" method="POST">
        <h2 class="form-signin-heading">Introduzca los datos del nuevo usuario</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" value="" class="form-control" placeholder="Email address" required autofocus>
        <?php if(isset($array_errores['campos_vacios']))
        {
             VerError('campos_vacios');
        }
        ?>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" value="" class="form-control" placeholder="Password" required>
        <?php if(isset($array_errores['campos_vacios']))
        {
             VerError('campos_vacios');
        }
        ?>
        <select name="tipo">
            <option value="1">Administrador</option>
            <option value="2">Usuario</option>
          </select>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="nuevo_usu" >REGISTRAR</button>
      </form>

    </div> <!-- /container -->