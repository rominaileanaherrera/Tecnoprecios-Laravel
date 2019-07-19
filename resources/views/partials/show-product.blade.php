<body>
<div id="content">

<div class="container-fluid p-0">
 <!-- Productos -->

<section class= "productos" id="wrap">
<div id="columns" class="columns_4">

{{-- $pi={{$product->image}} --}}
<figure>
          <img src="/storage/img/{{$product->image}}">
          <figcaption>{{$product->tittle}}</figcaption>
          <span class="price">${{$product->price}}</span>
          <a class="button" href="{{ url('/add-to-cart',$product->id) }}">Comprar ahora</a>
 </figure>
 

</div>
</section>
 <a href="/editar" >Editar Productos</a>
 <br>

</div>