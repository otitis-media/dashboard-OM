@extends('layouts.app')

@section('content')
<div class="flex w-full pl-60 mt-8 gap-8 h-fit max-md:hidden">
  <div class="bg-secondary-default p-12 rounded-xl shadow-xl">
    <h2 class='text-3xl'>Login</h2>
    <form method="POST" action="{{ route('login') }}" class="mt-8">
      @csrf
      <div>
        <label for="username" class="block font-medium text-sm text-gray-700">Username</label>
        <input type="text" id="username" name="username" value="{{ old('username') }}" required class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
      </div>
      <div class="mt-4">
        <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
        <input type="password" id="password" name="password" required class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
      </div>
      @if ($errors->has('username') || $errors->has('password'))
      <div class="mt-4 text-red-500">
        Invalid credentials. Please try again.
      </div>
      @endif
      <div class="mt-6">
        <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary_btn hover:bg-hover_btn focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary_btn">
          Login
        </button>
        <div class="mt-4">
          <span>
            Don't have an account? <a href="{{ route('register') }}" class="mt-4 text-primary_btn font-medium text-center">Register here</a>
          </span>
        </div>
      </div>
    </form>
  </div>
  <div class="flex p-12 bg-white items-center rounded-xl shadow-xl">
    <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="w-64 h-64 rounded-lg">
  </div>

</div>
<div class="flex flex-col w-full mt-8 h-fit md:hidden mb-12">
  <div class="bg-secondary-default flex flex-col justify-center p-12 pt-0 rounded-xl shadow-xl">
    <div class="flex p-12 bg-white justify-center">
      <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="w-32 h-32 rounded-lg">
    </div>
    <div class="flex gap-4 flex-col">
      <h2 class='text-3xl'>Login</h2>
      <form method="POST" action="{{ route('login') }}" class="">
        @csrf
        <div>
          <label for="username" class="block font-medium text-sm text-gray-700">Username</label>
          <input type="text" id="username" name="username" value="{{ old('username') }}" required class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
        </div>
        <div class="mt-4">
          <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
          <input type="password" id="password" name="password" required class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
        </div>
        @if ($errors->has('username') || $errors->has('password'))
        <div class="mt-4 text-red-500">
          Invalid credentials. Please try again.
        </div>
        @endif
        <div class="mt-6">
          <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary_btn hover:bg-hover_btn focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary_btn">
            Login
          </button>
        </div>
        <div class="mt-4">
          <span>
            Don't have an account? <a href="{{ route('register') }}" class="mt-4 text-primary_btn font-medium text-center">Register here</a>
          </span>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection