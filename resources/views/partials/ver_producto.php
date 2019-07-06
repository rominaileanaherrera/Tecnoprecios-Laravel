<?php

require_once("autoload.php");

include_once('head.php');

// serchbar

if (isset($_SESSION["email"])){
    include_once('searchbar5.php');
}else{
    include_once('serchbar.php');
}
// navbar
include_once('navbar.php'); ?>

<?php


if (isset($_GET["id"])) {
    $id_producto=$_GET["id"];
$sql= "SELECT *  FROM products where id = '$id_producto'";
$consulta = $pdo->query($sql);
$result = $consulta->fetchAll(PDO::FETCH_ASSOC);
}


 ?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Productos tecno precios</title>
<link rel="stylesheet" href="css/styles_subirproductos.css" />
</head>
<body>

<div id="content">

<div class="container-fluid p-0">
 <!-- Productos -->

<section class= "productos" id="wrap">
<div id="columns" class="columns_4">

<?php foreach ($result as $key => $value)  :?>
<figure>
          <img src="<?="img/products".$value["image"]?>">

          <figcaption><?=$value["title"]?></figcaption>
          <span class="price"><?=$value["price"]?></span>
          <a class="button" href="#">Comprar ahora</a>
        </figure>

        <?php endforeach ?>

</div>
</section>


</div>
</html>
