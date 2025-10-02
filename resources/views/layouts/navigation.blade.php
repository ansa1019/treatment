<nav x-data="{ open: false }">
    <!-- Primary Navigation Menu -->
    <div class="w-full px-4 sm:px-6 lg:px-8 bg-white border-b border-gray-200">
        <div class="flex justify-between h-16">
            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Name -->
            <p class="font-semibold text-primary self-center fs-3 mx-2 my-0">
                {{ config('app.name', 'Laravel') }}
            </p>

            <div class="shrink-0 flex items-center h-full w-auto p-1">
                <!-- Analysis -->
                <x-primary-button @click="window.location.href='{{ route('new_analysis') }}'"
                    class="px-3 py-2 mr-3 justify-center text-nowrap hidden sm:flex">
                    {{ __('new analysis') }}
                </x-primary-button>

                <!-- Image -->
                <img src="{{ asset('user.png') }}" class="block fill-current h-full" alt="">
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }"
        class="text-primary bg-light shadow-sm fw-semibold hidden sm:hidden">
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('project')" :active="request()->routeIs('project')">
            {{ __('project') }}
        </x-responsive-nav-link>

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}" class="w-full">
            @csrf
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('logout')"
                onclick="event.preventDefault();this.closest('form').submit();" id="logout">
                {{ __('Log out') }}
            </x-responsive-nav-link>
        </form>
    </div>
</nav>