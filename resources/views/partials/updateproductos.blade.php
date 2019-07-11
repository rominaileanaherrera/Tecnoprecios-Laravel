</div>

  
  <form method="POST" action="{{ url('/update/{{$product->id}}') }}" enctype="multipart/form-data">
  	
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
      	placeholder="{{$product->tittle}}"></textarea>
  	</div>
		<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="1" 
		value="{{ old('price') }}"
      	name="price" 
      	placeholder="{{$product->price}}"></textarea>
  	</div>
</div>
		<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="1" 
		value="{{ old('id_class') }}"
      	name="id_class" 
      	placeholder="Numero de clase:{{$product->id_class}}"></textarea>
  	</div>
		<br>
  	<div>
  		<button type="submit" name="upload">SUBIR</button>
  	</div>
  </form>
</div>
<br>


</body>
</html>