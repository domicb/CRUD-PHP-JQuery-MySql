<div class="col-md-8">

    <h1> Acceso PACO`S GARDENS</h1>
    <form class="form-signin" action="" method="POST">
        <h2 class="form-signin-heading">Introduzca los datos del administrador u operario</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" value="domic@hotmail.es" class="form-control" placeholder="Email address" required autofocus>
        <?php if(isset($array_errores['email']))
        {
             VerError('email');
        }
        ?>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" value="123" class="form-control" placeholder="Password" required>
        <?php if(isset($array_errores['password']))
        {
             VerError('password');
        }
        ?>
    
        <button class="btn btn-lg btn-primary btn-block" type="submit" >Sign in</button>
      </form>

    </div> <!-- /container -->