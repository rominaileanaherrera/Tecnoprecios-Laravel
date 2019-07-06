@extends('layout.main')
@section('content')

{{-- // navbar --}}
@include('partials.navbar')



{{-- // promos --}}
@include('partials.promos')



{{-- // slider --}}
@include('partials.slider')



{{-- // productospaginaincio --}}
deberiamos llamar a los productos pero tiene php y base de datos.
{{-- @include('partials.productos-inicio') --}}

@include('partials.script')

@endsection()