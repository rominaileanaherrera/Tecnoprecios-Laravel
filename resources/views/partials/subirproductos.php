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
//include_once('navbar.php');


// poner el mensaje que luego guardo para ver si estoy subiendo bien 
$msg = "";

  // si aprietan el boton de upload
  if (isset($_POST['upload'])) {
		
  	// agarrar el nombre de la imagen 
		$image = $_FILES['image']['name'];
		
  	// agarrar el texto 
		$title = $_POST['title'];

			// agarrar el texto 
			$price = $_POST['price'];

  	// donde guardamos la imagen 
		$target = "img/products".basename($image);
 

		$sql = "INSERT INTO products (image, title, price) VALUES ('$image', '$title', '$price')";
		$query= $pdo ->prepare($sql);
		$query -> execute();

		

		// var_dump ($query);
		// exit;
	

// var_dump ($sql); 
// exit;

		
//  chequeo que todos los datos esten subidos con el tmp que es el nombre temporario en el que se encuentra 
		
		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			$msg = "Imagen subida con exito";
		}else{
			$msg = "Imagen no subida";
		}
	}
	// var_dump ($msg);



// ejecuta el querry en la base de datos 


	$sql= "SELECT *  FROM products";
	$consulta = $pdo->query($sql);
	$producto = $consulta->fetchAll(PDO::FETCH_ASSOC);

	 ?> 

<!doctype html>
<html lang="es">
<head>
<title>productos tecno precios</title>
<link rel="stylesheet" href="css/styles_subirproductos.css" />
</head>
<body>

<div id="content">

<div class="container-fluid p-0">
 <!-- Productos -->

<section class= "productos" id="wrap">
<div id="columns" class="columns_4">

<?php foreach ($producto as $key => $value)  :?>
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

  
  <form method="POST" action="subirproductos.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="1" 
      	name="title" 
      	placeholder="titulo del producto"></textarea>
  	</div>
		<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="1" 
      	name="price" 
      	placeholder="precio"></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">SUBIR</button>
  	</div>
  </form>
</div>
</body>
</html>


<?php
//footer
include_once('footer.php');
?>