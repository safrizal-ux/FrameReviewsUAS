@extends('layout.content')

@section('content')
<h1>Dashboard Admin</h1>
<p>Selamat datang, {{ $userName }}!</p>
<p>Anda memiliki akses sebagai: {{ $role }}</p>
@endsection
