<?php

require_once("autoload.php");
if($_POST){
  $tipoConexion = "MYSQL";
  if($tipoConexion == "Json"){
  $usuario = new Usuario($_POST["email"],$_POST["password"]);
  $errores= $validar->validacionLogin($usuario);
  if(count($errores)==0){
    $usuarioEncontrado = $Json->buscarEmail($usuario->getEmail());
    if($usuarioEncontrado == null){
      $errores["email"]="Usuario no existe";
    }else{
      if(Autentificador::verificarPassword($usuario->getPassword(),$usuarioEncontrado["password"])===false){
        $errores["password"]="Error en los datos, verifique";
      }else{
        Autentificador::seteoSession($usuarioEncontrado);
        if(isset($_POST["recordar"])){
          Autentificador::seteoCookies($usuarioEncontrado);
        }
        if (Autentificador::validarUsuario()){
          redirect("miCuenta.php");
          exit;
        }else{
          redirect("registro.php");
        }
      }
      
    }  
  }
  }else{
    $usuario = new Usuario($_POST["email"],$_POST["password"]);
    $errores= $validar->validacionLogin($usuario);
    if(count($errores)==0){
  
      $usuarioEncontrado = BaseMYSQL::buscarEmail($usuario->getEmail(),$pdo,'users');
      if($usuarioEncontrado == null){
        $errores["email"]="Usuario no existe";
      }else{
        if(Autentificador::verificarPassword($usuario->getPassword(),$usuarioEncontrado["password"])===false){
          $errores["password"]="Error en los datos, verifique";
        }else{
          Autentificador::seteoSession($usuarioEncontrado);
          if(isset($_POST["recordar"])){
            Autentificador::seteoCookies($usuarioEncontrado);
          }
          if (Autentificador::validarUsuario()){
            redirect("miCuenta.php");
            exit;
          }else{
            redirect("registro.php");
          }
        }
        
      }  
    }

  }

}
if (isset($_SESSION["email"])){
  redirect("miCuenta.php");
}


?>
<?php
include_once('head.php');
?>

    <title>Login</title>
</head>
<body>

<?php
include_once('searchbar2.php');
?>


    <div class="container-fluid p-0 __divregistro">
    <?php
      if(isset($errores)):?>
        <ul class="alert alert-danger">
          <?php
          foreach ($errores as $key => $value) :?>
            <li> <?=$value;?> </li>
            <?php endforeach;?>
        </ul>
      <?php endif;?>

        <section class="formulario row ">

            <article class="formulario1 articulo1 col-12  col-md-12 col-lg-6">
                <h1 class="__h1form">Login</h1>
                <br>

                <form class="form1 mt-1" action="" method="post">

                    <label for="email">E-mail:</label>
                    <input class="formatoform btn btn-outline-primary" type="email" id="email" name="email" value="<?=isset($errores["email"])? "":persistir("email") ;?>" placeholder="email">
                    <br>
                    <label class="" for="password">Contraseña:</label>
                    <input class="formatoform btn btn-outline-primary" type="password" id="password" name="password" value="" placeholder="Contaseña">
                    <br>
                    <br>
                    <label for="login"></label>
                    <input class=" b formatoform btn btn-primary login" type="submit" id="Login" name="Login" value="          Login          "> <br>
                    <div class="form-check">
                        <input class="form-check-input" name="recordar" type="checkbox" value="recordar" id="recordarme">
                        <label class="form-check-label" for="recordarme">Recordarme</label>
                    </div>



                </form>
                <br>
                <a href="recuperarpassword.php">
                    <h4 class="__h4login">¿Olvidó su contraseña?</h4>
                </a>

            </article>

            <article class="logoformulario articulo2  col-12 col-md-12 col-lg-6">

                <img class="imglateral" width="100%" id="imgform" src="img/tecnolog.png" alt="">

            </article>

        </section>
    </div>

<?php
include_once('script.php');
?>