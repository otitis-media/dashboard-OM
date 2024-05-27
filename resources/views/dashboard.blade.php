@extends('layouts.app')

@section('content')
<div class="flex">
  @include('layouts.sidebar')
  <div class="w-full">
    @yield('contentdashboard')
  </div>
  <!-- <h1>Home Page</h1>
  <p>Welcome to the home page!</p> -->
</div>
@endsection