{{-- 

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
		$target = "img/".basename($image);
 

		$sql = "INSERT INTO products (image, title, price,id_class) VALUES ('$image', '$title', '$price','$categoria')";
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
 --}}


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
@foreach ($products as $product ) 
{{-- $pi={{$product->image}} --}}
<figure>
          <img src="/img/{{$product->image}}">

          <figcaption>{{$product->tittle}}</figcaption>
          <span class="price">${{$product->price}}</span>
          <a class="button" href="#">Comprar ahora</a>
 </figure>

@endforeach 

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
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="1" 
      	name="categoria" 
      	placeholder="categoria"></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">SUBIR</button>
  	</div>
  </form>
</div>


</body>
</html>