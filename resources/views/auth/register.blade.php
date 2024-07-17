@extends('layouts.app')

@section('content')
<div class="flex w-full pl-60 my-8 gap-8 max-md:hidden">
  <div class="bg-secondary-default p-12 pt-4 rounded-xl shadow-xl ">
    <h2 class="text-3xl my-4">Register</h2>
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div>
        <label for="nama" class="block font-medium text-sm text-gray-700">Nama</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
      </div>
      <div class="mt-4">
        <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
      </div>
      <div class="mt-4">
        <label for="username" class="block font-medium text-sm text-gray-700">Username</label>
        <input type="text" id="username" name="username" value="{{ old('username') }}" required class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
      </div>
      <div class="mt-4">
        <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
        <input type="password" id="password" name="password" required class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
      </div>
      <div class="mt-4">
        <label for="password_confirmation" class="block font-medium text-sm text-gray-700">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
      </div>
      @if ($errors->has('nama') || $errors->has('email') || $errors->has('username') || $errors->has('password') || $errors->has('password_confirmation'))
      <div class="mt-4 text-red-500">
        Invalid credentials. Please try again.
      </div>
      @endif
      <div class="mt-6">
        <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary_btn hover:bg-hover_btn focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary_btn">Register</button>
      </div>
      <div class=" mt-4">
        <span>
          Already have an account? <a href="{{ route('login') }}" class="text-primary_btn font-medium text-center">Login here</a>
        </span>
      </div>
    </form>
  </div>
  <div class="flex p-12 bg-white items-center rounded-xl shadow-xl">
    <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="w-64 h-64 rounded-lg">
  </div>
</div>
<div class="flex flex-col w-full my-8 gap-8 md:hidden">
  <div class="bg-secondary-default p-12 pt-8 rounded-xl shadow-xl ">
    <div class="flex p-12 pt-0 bg-white justify-center">
      <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="w-32 h-32 rounded-lg">
    </div>
    <h2 class="text-3xl my-4">Register</h2>
    <form method="POST" action="{{ route('register') }}" class="mt-8">
      @csrf
      <div>
        <label for="nama" class="block font-medium text-sm text-gray-700">Nama</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
      </div>
      <div class="mt-4">
        <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
      </div>
      <div class="mt-4">
        <label for="username" class="block font-medium text-sm text-gray-700">Username</label>
        <input type="text" id="username" name="username" value="{{ old('username') }}" required class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
      </div>
      <div class="mt-4">
        <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
        <input type="password" id="password" name="password" required class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
      </div>
      <div class="mt-4">
        <label for="password_confirmation" class="block font-medium text-sm text-gray-700">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
      </div>
      @if ($errors->has('nama') || $errors->has('email') || $errors->has('username') || $errors->has('password') || $errors->has('password_confirmation'))
      <div class="mt-4 text-red-500">
        Invalid credentials. Please try again.
      </div>
      @endif
      <div class="mt-6">
        <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary_btn hover:bg-hover_btn focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary_btn">Register</button>
      </div>
      <div class=" mt-4">
        <span>
          Already have an account? <a href="{{ route('login') }}" class="text-primary_btn font-medium text-center">Login here</a>
        </span>
      </div>
    </form>
  </div>

</div>
@endsection