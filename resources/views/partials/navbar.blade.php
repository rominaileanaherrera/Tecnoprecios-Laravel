<body>
  <div class="container-fluid p-0">
 
 <!-- navbar -->
 <section class="seccion_nav">
      <nav class="navbar navbar-expand-lg navbar-dark flex_del_nav">
        <a class="navbar-brand flecdh" href="#"></a>
        <span class="dhrestnav">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ">

            <li class="nav-item active">
              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
           <!--  <li class="nav-item">
              <a class="nav-link" href="subirproductos.php">Subir-Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="modificar_productos.php">modificar_productos</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="/tv">Tv´s</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/telefono">Telefonos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/horno"> Hornos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/camara">Camaras</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contactanos">Contactanos</a>
              </span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/productsCart"><i class="fas fa-shopping-cart">
              <span class="badge"> {{Session::has('cart') ? Session::get('cart')->totalitems:'' }}</span></i></a>
            </li>
          </ul>

        </div>
      </nav>
    </section>


    </div>
