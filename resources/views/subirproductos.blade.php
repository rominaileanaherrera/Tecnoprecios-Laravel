@extends('layout.main')

@section('content')
{{-- // navbar --}}
@include('partials.navbar')
@admin()
@include('partials.subirproductos')
@endadmin

@include('partials.script')

@endsection()