<div x-data="{ flyoutMenuOpen: false }" class="relative">
    <div class="relative">
        <form method="GET" action="{{ route('search') }}">
            <input
                class="block w-full py-2 pl-10 pr-4 mt-1 leading-normal appearance-none searchbox form-input focus:outline-0"
                placeholder='Search the articels (Press "/" to focus)' name="q" wire:model.debounce.500ms="q"
                @focus="flyoutMenuOpen = true" @blur="flyoutMenuOpen = false">
            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none ">
                <svg class="w-4 h-4 text-gray-400 pointer-events-none fill-current" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <path
                        d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z">
                    </path>
                </svg>
            </div>
        </form>
    </div>
    @if ($this->q and Str::length($this->q) > 3)
    <x-search-autocomplete :posts="$posts" :q="$this->q" />
    @endif
</div>