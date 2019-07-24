<div class="container-fluid p-0">

  <!-- serchbar -->
  <div id="arriba">
  <a href="/" class="imagen_logo">
 <img class="imagen_logo"  src="/img/Logo.png" alt="">  
  </a>
  <form class="buscar-form" action="/search" method=" GET" role="search" enctype="multipart/form-data">
  @csrf
    <div class="buscar-caja">
      <input  id="buscar" type="search" name="buscar" class="buscar-txt" placeholder="Buscar..." />
      <a class="buscar-btn" href="/search">
        <i class="fas fa-search-dollar"></i>
      </a>
    </div>
    </form>
    <!-- <span class="imagen_bag" > <a href=""><img src="img/bag.png" alt=""> </a> </span> -->
    <ul class="log_in">
      <!-- <li>  <a href=""><img src="img/bag.png" alt=""> </a>   </li> -->
      <!--  <li class="d-flex"><a href="login.php" target="_blank" class="formato btn btn-primary btn-sm ml-auto ">Login</a></li>-->
      <li class="d-flex">
        @guest
        <a href="{{ url('login') }}" class="formato btn btn-primary btn-sm ml-auto micuenta">
          <i class="far fa-user-circle"></i> Ingresar a Mi Cuenta
        </a>
        @else
          @admin()
          <a href="{{ url('/subirproductos/new') }}"  class="formato btn btn-primary btn-sm ml-auto micuenta">Subir Productos</a>
          <a href="{{ url('/editar') }}"  class="formato btn btn-primary btn-sm ml-auto micuenta">Editar Productos</a>

          @endadmin
      
          <a href="{{ url('miPerfil') }}" class="formato btn btn-primary btn-sm ml-auto micuenta">
          <i class="far fa-user-circle"></i> Mi Cuenta
        </a>


        <form method="post" action="{{ url('logout') }}">
          @csrf
          <button class="formato btn btn-primary btn-sm ml-auto micuenta">
          <i class="far fa-user-circle"></i> Cerrar Sesion
          </button>
        </form>
        @endguest
      </li>
    </ul>
    <!-- <img class="imagen_bag" src="img/bag.png" alt="">  -->

  </div>


  <div class="wrap">
    <div class="search">
      <input type="text" class="searchTerm" placeholder="Buscar...">
      <button type="submit" class="searchButton">
        <i class="fas fa-search-dollar"></i>
      </button>
    </div>
  </div>
</div>



