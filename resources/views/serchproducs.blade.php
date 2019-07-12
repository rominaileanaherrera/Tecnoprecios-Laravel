@extends('layout.main')
@section('content')

{{-- // navbar --}}
@include('partials.navbar')

{{-- // productos--}}

@include('partials.productos-serch')

@include('partials.script')

@endsection()