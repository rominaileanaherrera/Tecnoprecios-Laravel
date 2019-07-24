@extends('layout.main')
@section('content')
{{-- // navbar --}}
@include('partials.navbar')
<main>
        @admin()
       <h2>Administrar Productos</h2>

       
         <div class="d-flex card col-12" style="width: 35rem;">
         <br>
         <a href="/subirproductos/new">Incluir Producto</a>
         <table class="table">
           <thead>
               <tr>
                   <th>Id</th>
                   <th>Nombre del Producto</th>
                   <th>Ver</th>
                   <th>Editar</th>
                   <th>Eliminar</th>
               </tr>
           </thead>
           <tbody>
               @foreach ($products as $product)
               <tr>
                   <td>{{$product->id}}</td>
                   <td>{{$product->tittle}}</td>
                   <td><a href="/show/{{$product->id}}">Ver</a> </td>
                   <td><a href="/update/{{$product->id}}">Modificar</a> </td>
                   <td><a href="/delete/{{$product->id}}">Eliminar</a> </td>
               
               </tr>
               @endforeach()
           </tbody>

        </table>

         </div>
       
    
         @endadmin
     </main>
     @endsection()