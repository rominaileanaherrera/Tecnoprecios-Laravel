@extends('layout.main')
@section('content')
@include('partials.navbar')

@if(Session::has('cart'))

<div class="d-flex card col-12" style="width: 50rem;">
        <br>
        <table class="table">
          <thead>
              <tr>
                  <th>Cantidad</th>
                  <th>Producto</th>
                  <th>Precio</th>
                  <th>Editar</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($products as $product)
              <tr>
                  <td>{{$product['qty']}}</td>
                  <td>{{$product['product']['tittle']}}</td>
                  <td>${{$product['price']}}</td>
                  <td><div class="btn-group">
                        <button class="btn btn-ptimary btn-xs dropdown-toggle" data-toggle="dropdown"> Remover <span class="cart"></span></button>
                        <ul class="dropdown-menu">
                            <li> <a href="{{ url('/remove',$product['product']['id']) }}"> Remover 1</a></li>
                            <li> <a href=""> Remover todos</a></li>
                        </ul>
                    </div> </td>
                 
              </tr>
              @endforeach()
          </tbody>

       </table>

        </div>


<div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-ofset-3">
            
                         <strong class= "finaltotal"> Total: ${{$totalprice}}</strong>
                         
        </div>
    </div>
    <hr>
    <div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-ofset-3">
        
        <button type="button" class="btn btn-succes">Chekout</button>
                     
    </div>
</div>
@else
<div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-ofset-3">
            
        <h2>No tenes items</h2>
                         
        </div>
    </div>
@endif




@include('partials.script')

@endsection()