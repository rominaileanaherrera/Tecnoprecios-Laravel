

<?php
require_once("autoload.php");
if(!isset($_SESSION["email"])) {
    redirect("registro.php");
}
?>

<?php
include_once('searchbar3.php');
?>
 <?php
if($_SESSION["role"]==9){
    include_once('navbarAdmin.php');
}
 
 ?>


<?php
include_once('head.php');
?>

    <title>Mi Cuenta</title>
</head>
<body>


<div class="container">
  
  <section class="row  text-center ">
    <article class="col-12  " >
    <h1 class="__h1form">Bienvenido: <?=$_SESSION["name"];?> </h1>
    <br>
    <p>
    <img  id="sesion" src="img/users/imagenesUsuarios<?=$_SESSION["avatar"];?>" alt="Avatar" >
    </p>
    <p>
    <?php if($_SESSION["role"]==9):?>
        <a href="listadoUsuariosAdmin.php"></a>
     <?php endif;?>

    </p>
   <br>
    <button type="button" class=" formatoform btn btn-outline-primary btn-lg login"> <a href="logout.php"> Cerrar Sesión</a> </button>
    
    </article> 
  </section>
</div>

<?php include_once('script.php'); ?>


