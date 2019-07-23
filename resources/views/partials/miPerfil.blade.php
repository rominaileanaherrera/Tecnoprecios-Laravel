<title>Mi Cuenta</title>
</head>
<body>


<div class="container">
  
  <section class="row  text-center ">
    <article class="col-12  " >
    <h1 class="__h1form">Bienvenido: {{Auth::User()->name}} </h1>
    <h2>Tu email registrado es:</h2>
    <h2>{{Auth::User()->email}}</h2>

    <br>
    <p>
    <img  id="sesion" src="{{asset('storage/avatars/'.Auth::User()->avatar)}}" alt="Avatar" >
    </p>
    
   <br>
    
    
    </article> 
  </section>
</div>