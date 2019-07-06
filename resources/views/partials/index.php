<?php
require_once("autoload.php");
// head
include_once('head.php');

// serchbar

if (isset($_SESSION["email"])){
    include_once('searchbar5.php');
}else{
    include_once('serchbar.php');
}

// navbar

include_once('navbar.php');


// promos
include_once('promos.php');


// slider
include_once('slider.php');


// productospaginaincio
include_once('productosinicio.php');

//footer
include_once('footer.php');
?>

