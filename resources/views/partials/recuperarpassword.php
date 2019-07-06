
<?php
include_once('head.php');
?>

<?php
include_once('searchbar2.php');
?>

<?php
require_once("autoload.php");
if($_POST){
  $usuario = new Usuario($_POST["email"],$_POST["password"],$_POST["repassword"]);
  $errores= $validar->validacionOlvide($usuario);
  if(count($errores)==0){
    $usuarioEncontrado = $Json->buscarEmail($usuario->getEmail());
    if($usuarioEncontrado == null){
      $errores["email"]="Usuario no existe en nuestra base de datos";
    }else{
        $registro = $Json->jsonRegistroOlvide($usuario->getEmail(),$usuario->getPassword());
          redirect("nuevacontrasenia.php");
    }
  }
}
?>


  <title>Recuperar Contraseña</title>
</head>

<body>
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

      <section class="formulario row">

<article class="formulario1 articulo1 col-12 col-md-12 col-lg-6">
    <h1 class="__h1form">Recuperar Contraseña</h1>
    <br>

    <form class="form1 mt-1" action="" method="post" enctype= "multipart/form-data">
        
        <label>Email:</label>
         <input  class="formatoform btn btn-outline-primary"  name="email" type="text" id="email" value="<?=isset($errores["email"])? "":persistir("email") ;?>" placeholder="Ingrese su email"/>
        <br>
        <label>Nueva contraseña:</label>
          
        <input  class="formatoform btn btn-outline-primary"  name="password" type="password" id="password" value="" placeholder="Cree su contraseña" />
        <br>
        <label>Confirmar nueva contraseña:</label>
            
        <input  class="formatoform btn btn-outline-primary"  name="repassword" type="password" id="repassword" value="" placeholder="Repita su contraseña" />
         <br>
        <button class="formatoform btn btn-primary btn-lg"  type="submit" name="button">Enviar</button>


    </form>

</article>

<article class="logoformulario articulo1 col-12 col-md-12 col-lg-6">

    <img class="imglateral"  width="100%" id="imgform" src="img/tecnolog.png" alt="">

</article>

</section>

    </div>
