<nav x-data="{ open: false }" @keydown.window.escape="open = false" class="relative bg-white">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center justify-between py-6 border-b-2 border-gray-100 md:justify-start md:space-x-10">
            <div class="lg:w-0 lg:flex-1">
                <div class="flex-shrink-0">
                    <a href="/">
                        <img class="hidden w-auto h-8 md:block" src="/images/logos/logo.svg" alt="One Read logo">
                        <img class="w-auto h-8 md:hidden" src="/images/logos/logomark.svg" alt="One Read logo">
                    </a>
                </div>

            </div>

            <div class="flex">
                <div class="w-full">
                    <div class="relative">
                        <input
                            class="block w-full py-2 pl-10 pr-4 mt-1 leading-normal appearance-none form-input focus:outline-0"
                            placeholder="Search the articels">

                        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none ">
                            <svg class="w-4 h-4 text-gray-400 pointer-events-none fill-current"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="items-center justify-end hidden space-x-8 md:flex md:flex-1 lg:w-0">
                <div class="flex items-center ml-4 space-x-3 font-medium md:ml-6">
                    <a href="{{ route('auth.login') }}"
                        class="text-base leading-6 text-gray-500 whitespace-no-wrap hover:text-gray-900 focus:outline-none focus:text-gray-900">
                        Sign in
                    </a>
                    <a href="{{ route('auth.register') }}"
                        class="text-base leading-6 text-gray-500 whitespace-no-wrap hover:text-gray-900 focus:outline-none focus:text-gray-900">
                        Register
                    </a>

                    @auth
                    <!-- Profile dropdown -->
                    <div @click.away="open = false" class="relative ml-3" x-data="{ open: false }">
                        <div>
                            <button @click="open = !open"
                                class="flex items-center max-w-xs text-sm text-white rounded-full focus:outline-none focus:shadow-solid"
                                id="user-menu" aria-label="User menu" aria-haspopup="true" x-bind:aria-expanded="open">
                                <img class="w-8 h-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                    alt="">
                            </button>
                        </div>
                        <div x-show="open" x-description="Profile dropdown panel, show/hide based on dropdown state."
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 w-48 mt-2 origin-top-right rounded-md shadow-lg"
                            style="display: none;">
                            <div class="py-1 bg-white rounded-md shadow-xs" role="menu" aria-orientation="vertical"
                                aria-labelledby="user-menu">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Your Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Settings</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Sign out</a>
                            </div>
                        </div>
                    </div>
                    @endauth
                </div>
            </div>
            <div class="flex -mr-2 md:hidden">
                <!-- Mobile menu button -->
                <button @click="open = !open"
                    class="inline-flex items-center justify-center p-2 text-gray-800 rounded-md hover:text-white hover:bg-gray-400 focus:outline-none focus:bg-gray-700 focus:text-white"
                    x-bind:aria-label="open ? 'Close main menu' : 'Main menu'" x-bind:aria-expanded="open"
                    aria-label="Main menu">
                    <svg x-state:on="Menu open" x-state:off="Menu closed" :class="{ 'hidden': open, 'block': !open }"
                        class="block w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16">
                        </path>
                    </svg>
                    <svg x-state:on="Menu open" x-state:off="Menu closed" :class="{ 'hidden': !open, 'block': open }"
                        class="hidden w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-description="Mobile menu, toggle classes based on menu state." x-state:on="Open" x-state:off="closed"
        :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden">
        <div class="px-2 pt-2 pb-3 sm:px-3">
            <a href="#"
                class="block px-3 py-2 text-base font-medium text-white bg-gray-900 rounded-md focus:outline-none focus:text-white focus:bg-gray-700">Dashboard</a>
            <a href="#"
                class="block px-3 py-2 mt-1 text-base font-medium text-gray-300 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Team</a>
            <a href="#"
                class="block px-3 py-2 mt-1 text-base font-medium text-gray-300 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Projects</a>
            <a href="#"
                class="block px-3 py-2 mt-1 text-base font-medium text-gray-300 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Calendar</a>
            <a href="#"
                class="block px-3 py-2 mt-1 text-base font-medium text-gray-300 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Reports</a>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-700">
            <div class="flex items-center px-5">
                <div class="flex-shrink-0">
                    <img class="w-10 h-10 rounded-full"
                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                        alt="">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium leading-none text-white">Tom Cook</div>
                    <div class="mt-1 text-sm font-medium leading-none text-gray-400">tom@example.com</div>
                </div>
            </div>
            <div class="px-2 mt-3">
                <a href="#"
                    class="block px-3 py-2 text-base font-medium text-gray-400 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Your
                    Profile</a>
                <a href="#"
                    class="block px-3 py-2 mt-1 text-base font-medium text-gray-400 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Settings</a>
                <a href="#"
                    class="block px-3 py-2 mt-1 text-base font-medium text-gray-400 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Sign
                    out</a>
            </div>
        </div>
    </div>
</nav>