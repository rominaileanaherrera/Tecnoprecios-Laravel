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
                            <li> <a href="{{ url('/removeItem',$product['product']['id']) }}"> Remover todos</a></li>
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
        
        {{-- <a href="/checkout" type="button" class="btn btn-primary active">Chekout</a> --}}
        {{-- <a mp-mode="dftl" href="https://www.mercadopago.com.ar/checkout/v1/redirect?preference-id=48407809-7ef2e50a-902a-4693-bdd6-44bf61a09149" name="MP-payButton" class='blue-ar-m-rn-aron'>Pagar</a>
        <script type="text/javascript">
        (function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
        </script> --}}
       
     <?php  MercadoPago\SDK::setAccessToken('TEST-8787171978525568-072317-e2a6b95941b537a9d9fef9906cec9d26-48407809');
     

    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();

    // Crea un ítem en la preferencia
    foreach ($products as $product) {
    $item = new MercadoPago\Item();
    $item->title = $product['product']['tittle'];
    $item->quantity = $product['qty'];
    $item->unit_price = $totalprice;
    $preference->items = array($item);
    $preference->save();
    }
   
     ?>
        
        <a class="btn btn-primary active" href="<?php echo $preference->init_point; ?>">Pagar con Mercado Pago</a>

        <br>
        <br>
                     
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