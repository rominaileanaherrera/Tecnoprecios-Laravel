{{-- autoload.php --}}
{{-- // head --}}
@include('partials.header')


{{-- // serchbar --}}
@include('partials.serchbar')

{{-- if (isset($_SESSION["email"])){
    include_once('searchbar5.php');
}else{
    include_once('serchbar.php');
} --}}

@yield('content')

{{-- //footer --}}
@include('partials.footer')



