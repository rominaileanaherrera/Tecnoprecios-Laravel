</div>
 <br>
{{-- {{dd($product)}} --}}
  

  <form method="POST" action="{{ url('/update',$product->id) }}" enctype="multipart/form-data">
  	
		 @csrf    
         {{ method_field('PUT') }}
  	<div>   
  	  <input type="file" name="image"  value="{{$product->image}}">
  	</div>
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="1" 
      	name="tittle" 
		value="{{$product->tittle}}"
      	placeholder="{{$product->tittle}}"></textarea>
  	</div>
		<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="1" 
		value="{{$product->price}}"
      	name="price" 
      	placeholder="{{$product->price}}"></textarea>
  	</div>
</div>
		<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="1" 
		value="{{$product->category_id}}"
      	name="category_id" 
      	placeholder="Numero de clase:{{$product->category_id}}"></textarea>
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