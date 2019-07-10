@extends('layout.main')
@section('content')

{{-- // navbar --}}
@include('partials.navbar')



{{-- // promos --}}
@include('partials.promos')



{{-- // slider --}}
@include('partials.slider')



{{-- // productospaginaincio --}}

@include('partials.productos-inicio')

@include('partials.script')

@endsection()