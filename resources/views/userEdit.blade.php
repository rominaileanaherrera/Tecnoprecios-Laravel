@extends('layout.main')
@section('content')
{{-- // navbar --}}
@include('partials.navbar')
<main>
       <h2>Administrar Usuarios</h2>

       
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
                   <td>{{$user->id}}</td>
                   <td>{{$user->name}}</td>
                   <td><a href="/show/{{$user->id}}">Ver</a> </td>
                   <td><a href="/update/{{$user->id}}">Modificar</a> </td>
                   <td><a href="/delete/{{$user->id}}">Eliminar</a> </td>
               
               </tr>
               @endforeach()
           </tbody>

        </table>

         </div>

     </main>
     @endsection()