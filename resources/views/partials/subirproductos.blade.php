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
		  {{-- <img src="/storage/img/{{$product->image}}"> --}}
		  <img src="{{  asset("/storage/img/" . $product->image) }}">
          <figcaption>{{$product->tittle}}</figcaption>
          <span class="price">${{$product->price}}</span>
          <a class="button" href="{{ url('/add-to-cart',$product->id) }}">Comprar ahora</a>
 </figure>

@endforeach 

</div>
</section>


{{-- @if {{$product->id_class}} == 2  {
@foreach ($products as $product ) 
 <figure>
          <img src="/storage/img/{{$product->image}}">

          <figcaption>{{$product->tittle}}</figcaption>
          <span class="price">${{$product->price}}</span>
          <a class="button" href="#">Comprar ahora</a>
 </figure>
@endforeach 
} --}}

</div>

  
  <form method="POST" action="{{ url('/subirproductos') }}" enctype="multipart/form-data">
  	
		 @csrf    
  	<div>   
  	  <input type="file" name="image"  value="{{ old('image') }}">
  	</div>
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="1" 
      	name="tittle" 
			  value="{{ old('tittle') }}"
      	placeholder="titulo del producto"></textarea>
  	</div>
		<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="1" 
				value="{{ old('price') }}"
      	name="price" 
      	placeholder="precio"></textarea>
  	</div>
<div >
        <select name="category_id">
            @foreach($categories as $category )
                <option value="{{ $category->id }}" {{ old('category_id') === $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
		
    </div>
		<br>
  	<div>
  		<button type="submit" name="upload">SUBIR</button>
  	</div>
  </form>
</div>
<br>
<a href="/editar" >Editar Productos</a>
<br>

</body>
</html>
