<nav x-data="{ open: false, activeDropdown: null }" 
     class=" text-black shadow-lg"
     @keydown.escape="open = false"
     @click.away="activeDropdown = null">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex-shrink-0 flex items-center">
                    <span class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-green-400 to-blue-500">
                        Super<span class="text-[#5C8374]">Shop</span>
                    </span>
                </a>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @foreach([
                        'dashboard' => 'Accueil',
                        'article' => 'Ajouter Article',
                        'showArticle' => 'Article',
                        'adminArticle' => 'Store',
                        'adminUser' => 'Users',
                        'cart' => 'Panier'
                    ] as $route => $label)
                        @if($route == 'article' && !auth()->user()->can('is_moderator')) @continue @endif
                        @if(in_array($route, ['adminArticle', 'adminUser']) && !auth()->user()->can('is_admin')) @continue @endif
                        <a href="{{ route($route) }}" 
                           class="inline-flex items-center px-1 pt-1 border-b-2 text-lg font-medium leading-5 transition duration-150 ease-in-out transform hover:scale-105
                                  {{ request()->routeIs($route) 
                                      ? 'border-[#5C8374] text-[#5C8374]' 
                                      : 'border-transparent text-black-300 hover:text-gray-400 hover:border-gray-300' }}"
                           @mouseenter="$el.classList.add('animate-pulse')"
                           @mouseleave="$el.classList.remove('animate-pulse')">
                            {{ __($label) }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div class="ml-3 relative" x-data="{ open: false }">
                    <div>
                        <button @click="open = !open" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out transform hover:scale-105">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="{{ Auth::user()->name }}">
                        </button>
                    </div>
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5"
                         @click.away="open = false">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-150 ease-in-out">
                            {{ __('Profile') }}
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-150 ease-in-out">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @foreach([
                'dashboard' => 'Accueil',
                'article' => 'Ajouter Article',
                'showArticle' => 'Article',
                'adminArticle' => 'Store',
                'adminUser' => 'Users',
                'cart' => 'Panier'
            ] as $route => $label)
                @if($route == 'article' && !auth()->user()->can('is_moderator')) @continue @endif
                @if(in_array($route, ['adminArticle', 'adminUser']) && !auth()->user()->can('is_admin')) @continue @endif
                <a href="{{ route($route) }}" 
                   class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out
                          {{ request()->routeIs($route) 
                              ? 'border-[#5C8374] text-[#5C8374] bg-gray-700' 
                              : 'border-transparent text-gray-300 hover:text-white hover:bg-gray-700 hover:border-gray-300' }}">
                    {{ __($label) }}
                </a>
            @endforeach
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-700">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full object-cover" src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="{{ Auth::user()->name }}">
                </div>
                <div class="ml-3">
                    <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 transition duration-150 ease-in-out">
                    {{ __('Profile') }}
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 transition duration-150 ease-in-out">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<style>
    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes glow {
        0%, 100% { text-shadow: 0 0 5px rgba(92, 131, 116, 0.5); }
        50% { text-shadow: 0 0 20px rgba(92, 131, 116, 0.8); }
    }

    .sm\:flex > * {
        animation: fadeInDown 0.5s ease-out forwards;
    }

    .sm\:flex > *:nth-child(1) { animation-delay: 0.1s; }
    .sm\:flex > *:nth-child(2) { animation-delay: 0.2s; }
    .sm\:flex > *:nth-child(3) { animation-delay: 0.3s; }
    .sm\:flex > *:nth-child(4) { animation-delay: 0.4s; }
    .sm\:flex > *:nth-child(5) { animation-delay: 0.5s; }
    .sm\:flex > *:nth-child(6) { animation-delay: 0.6s; }

    .text-\[\#5C8374\] {
        animation: glow 2s ease-in-out infinite;
    }

    .hover\:scale-105:hover {
        transition: transform 0.3s ease-in-out;
    }

    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: .5; }
    }
</style>