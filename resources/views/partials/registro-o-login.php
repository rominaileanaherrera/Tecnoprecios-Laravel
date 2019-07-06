
<?php
require_once('autoload.php');

if (isset($_SESSION["email"])){
    redirect("miCuenta.php");
  }

include_once('head.php');
?>

<title>Ingresar a Mi Cuenta</title>
</head>

<body>

<?php
include_once('searchbar2.php');
?>

    <div class="container-fluid p-0 __divregistro">

            <section class="miCuenta row ">

            <article class="formulario1 articulo1 col-12  col-md-12 col-lg-6">
                <h1 class="__h1form">Ingresar a Mi Cuenta</h1>
                <br>
                <br>
                <h4 class="__h4login">¿Aún no tiene cuenta? Cree una.</h4>
                <br>
                <button type="button" class="formatoform btn btn-outline-primary btn-lg registro"><a href="registro.php" >Registrarse</a></button>
                <br>
                <br>
                <h4 class="__h4login">¿Ya tiene Cuenta?</h4>
                <br>
                <button type="button" class=" formatoform btn btn-outline-primary btn-lg login"><a href="login.php" > Login </a></button>
                <br>

            </article>

            <article class="logoformulario articulo2  col-12 col-md-12 col-lg-6">

                <img  class="imglateral"  width="100%" id="imgform" src="img/tecnolog.png" alt="">

            </article>

        </section>
    </div>

    
<?php
include_once('script.php');
?>