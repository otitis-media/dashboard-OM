@extends('layouts.app')

@section('content')
<div class="flex">
  @include('layouts.sidebar')
  <div class="w-full">
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
      {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
      {{ session('error') }}
    </div>
    @endif
    @yield('contentdashboard')
  </div>
  <!-- <h1>Home Page</h1>
  <p>Welcome to the home page!</p> -->
</div>
@endsection