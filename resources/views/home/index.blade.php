@extends('dashboard')

@section('contentdashboard')
<div class="w-full flex flex-col gap-8 p-12 shadow-xl bg-white rounded-xl min-h-screen">
  <div class="flex justify-center">
    <img src="{{ asset('images/logo.jpg') }}" alt="Home" class="w-32 h-32 rounded-lg">
  </div>
  <div>
    <h1 class="text-3xl font-bold">Omedscope Dashboard</h1>
    <p class="text-2xl">Selamat Datang, {{ Auth::user()->name }}!</p>
  </div>
  <div class="">
    <a href="{{ url('history') }}" class="bg-primary_btn hover:bg-hover_btn text-white font-semibold py-2 px-4 rounded-lg">Lihat Riwayat</a>
  </div>
</div>
@endsection