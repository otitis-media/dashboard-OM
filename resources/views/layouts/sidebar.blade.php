<div class="flex flex-col bg-white drop-shadow-xl z-0 min-h-screen w-1/5 p-4 gap-4 max-md:hidden">
  <a href="{{ url('/') }}" class="py-2 px-4 font-semibold rounded-lg {{ request()->is('/') ? 'bg-primary_btn text-white' : 'text-gray-800 hover:bg-hover_btn hover:text-white' }}">Home</a>
  <a href="{{ url('/history') }}" class="py-2 px-4 font-semibold rounded-lg {{ request()->is('history') ? 'bg-primary_btn text-white' : 'text-gray-800 hover:bg-hover_btn hover:text-white' }}">History</a>
</div>