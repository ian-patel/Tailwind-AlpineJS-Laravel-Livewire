<nav x-data="{ open: false }" @keydown.window.escape="open = false"
    class="fixed inset-x-0 top-0 z-40 flex items-center bg-white border-b border-gray-200">
    <div class="relative w-full max-w-screen-xl px-6 py-6 mx-auto bg-white">
        <div class="flex items-center">
            <div class="pr-6 lg:w-1/4 xl:w-1/5 lg:pr-8">
                <div class="flex items-center">
                    <a href="/">
                        <img class="hidden w-auto h-8 md:block" src="/images/logos/logo.svg" alt="One Read logo">
                        <img class="w-auto h-8 md:hidden" src="/images/logos/logomark.svg" alt="One Read logo">
                    </a>
                </div>
            </div>
            <div class="flex flex-grow lg:w-3/4 xl:w-4/5">
                <div class="w-full lg:px-6 xl:w-3/4 xl:px-12">
                    @livewire('search-posts')
                </div>

                <div class="justify-end hidden px-6 lg:flex lg:items-center xl:w-1/4 md:flex md:flex-1">
                    <div class="flex ml-4 space-x-4 font-medium md:ml-6">
                        @guest
                        <a href="{{ route('auth.login') }}"
                            class="text-base leading-6 text-gray-700 whitespace-no-wrap hover:text-gray-900 focus:outline-none focus:text-gray-900">
                            Sign in/up
                        </a>
                        @endguest

                        @auth
                        <div @click.away="open = false" class="relative ml-3" x-data="{ open: false }">
                            <div>
                                <button @click="open = !open"
                                    class="flex items-center max-w-xs text-sm text-white rounded-full focus:outline-none focus:shadow-solid"
                                    id="user-menu" aria-label="User menu" aria-haspopup="true"
                                    x-bind:aria-expanded="open">
                                    <img class="w-8 border-l border-r border-gray-300 border-solid rounded-full hover:border-gray-900 hover:border-l-3 hover:border-r-3"
                                        src="{{ Auth::user()->avatar }}" alt="Avatar of {{ Auth::user()->name }}">
                                </button>
                            </div>
                            <div x-show="open"
                                x-description="Profile dropdown panel, show/hide based on dropdown state."
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
                                    <div class="flex items-center px-4 py-2">
                                        <img class="w-10 h-10 mr-4 rounded-full" src="{{ Auth::user()->avatar }}"
                                            alt="Avatar of {{ Auth::user()->name }}">
                                        <div class="text-sm">
                                            <p class="leading-none text-gray-900">{{ Auth::user()->name }}</p>
                                            @if (Auth::user()->username)
                                            <p class="mt-1 text-xs text-gray-400 ">{{ '@' . Auth::user()->username }}
                                            </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="border-t border-gray-100"></div>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">
                                        <span class="inline-flex ">
                                            <svg fill="none" viewBox="0 0 20 20" class="w-5 h-5 mr-2 text-gray-400"
                                                stroke="currentColor">
                                                <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"></path>
                                            </svg>
                                            Reading list
                                        </span>
                                    </a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">
                                        <span class="inline-flex">
                                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1" viewBox="0 0 24 24" stroke="currentColor"
                                                class="w-5 h-5 mr-2 text-gray-400">
                                                <path
                                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                                </path>
                                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            Settings
                                        </span>
                                    </a>
                                    <div class="border-t border-gray-100"></div>
                                    <a href="{{ route('logout') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <span class="inline-flex">
                                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1" viewBox="0 0 24 24" stroke="currentColor"
                                                class="w-5 h-5 mr-2 text-gray-400">
                                                <path
                                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                                </path>
                                            </svg>
                                            Sign out
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endauth
                    </div>
                </div>

                <div class="flex ml-4 -mr-2 md:hidden">
                    <!-- Mobile menu button -->
                    <button @click="open = !open"
                        class="inline-flex items-center justify-center p-2 text-gray-800 hover:text-cool-gray-900 focus:outline-none"
                        x-bind:aria-label="open ? 'Close main menu' : 'Main menu'" x-bind:aria-expanded="open"
                        aria-label="Main menu">
                        <svg x-state:on="Menu open" x-state:off="Menu closed"
                            :class="{ 'hidden': open, 'block': !open }" class="block w-6 h-6" stroke="currentColor"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16">
                            </path>
                        </svg>
                        <svg x-state:on="Menu open" x-state:off="Menu closed"
                            :class="{ 'hidden': !open, 'block': open }" class="hidden w-6 h-6" stroke="currentColor"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div x-description="Mobile menu, toggle classes based on menu state." x-state:on="Open" x-state:off="closed"
            :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden">
            <div class="pt-4 pb-3">
                @guest
                <a href="{{ route('auth.login') }}"
                    class="text-base leading-6 text-gray-700 whitespace-no-wrap hover:text-gray-900 focus:outline-none focus:text-gray-900">
                    Sign in/up
                </a>
                @endguest

                @auth
                <div class="flex items-center px-4 py-2">
                    <img class="w-10 h-10 mr-4 rounded-full" src="{{ Auth::user()->avatar }}"
                        alt="Avatar of {{ Auth::user()->name }}">
                    <div class="text-sm">
                        <p class="leading-none text-gray-900">{{ Auth::user()->name }}</p>
                        @if (Auth::user()->username)
                        <p class="mt-1 text-xs text-gray-400 ">{{ '@' . Auth::user()->username }}
                        </p>
                        @endif
                    </div>
                </div>
                <div class="px-2 mt-3">
                    <div class="border-t border-gray-100"></div>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                        <span class="inline-flex ">
                            <svg fill="none" viewBox="0 0 20 20" class="w-5 h-5 mr-2 text-gray-400"
                                stroke="currentColor">
                                <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"></path>
                            </svg>
                            Reading list
                        </span>
                    </a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                        <span class="inline-flex">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2 text-gray-400">
                                <path
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>
                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Settings
                        </span>
                    </a>
                    <div class="border-t border-gray-100"></div>
                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                        role="menuitem"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="inline-flex">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2 text-gray-400">
                                <path
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                </path>
                            </svg>
                            Sign out
                        </span>
                    </a>
                </div>
                @endauth
            </div>
        </div>
    </div>
    </div>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>