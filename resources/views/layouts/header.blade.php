<nav class="bg-white text-red-400 drop-shadow-lg z-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">
      <div class="flex items-center">
        <a class="text-primary_btn font-bold text-xl" href="{{ url('/') }}">
          <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="h-8 w-8">
        </a>
      </div>
      <div class="hidden md:block">
        <div class="ml-10 flex items-baseline space-x-4">
          @guest
          <a href="{{ route('login') }}" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->is('login') ? 'bg-primary_btn text-white' : 'text-gray-800 hover:bg-hover_btn hover:text-white' }}">Login</a>
          <a href="{{ route('register') }}" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->is('register') ? 'bg-primary_btn text-white' : 'text-gray-800 hover:bg-hover_btn hover:text-white' }}">Register</a>
          @else
          <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="px-3 py-2 rounded-md text-sm font-medium text-gray-800 hover:bg-hover_btn hover:text-white">Logout</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          @endguest
        </div>
      </div>
      <!-- Mobile menu button -->
      <div class="md:hidden">
        <button class="bg-primary_btn hover:bg-hover_btn text-white font-bold py-2 px-4 rounded-md" type="button" data-toggle="mobile-menu" data-target="#mobile-menu">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
    </div>
  </div>
  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="md:hidden hidden" id="mobile-menu">
    <div class="px-2 pt-2 pb-3 space-y-1">
      @guest
      <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('login') ? 'bg-primary_btn text-white' : 'text-gray-800 hover:bg-hover_btn hover:text-white' }}">Login</a>
      <a href="{{ route('register') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('register') ? 'bg-primary_btn text-white' : 'text-gray-800 hover:bg-hover_btn hover:text-white' }}">Register</a>
      @else
      <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:bg-hover_btn hover:text-white">Logout</a>
      @endguest
    </div>
  </div>
</nav>

<script>
  // Toggle mobile menu
  const mobileMenuButton = document.querySelector('[data-toggle="mobile-menu"]');
  const mobileMenu = document.getElementById('mobile-menu');
  mobileMenuButton.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
</script>