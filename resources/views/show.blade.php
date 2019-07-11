@extends('layout.main')

@section('content')
{{-- // navbar --}}
@include('partials.navbar')

{{-- // productospaginaincio --}}

@include('partials.show-product')

@include('partials.script')

@endsection()