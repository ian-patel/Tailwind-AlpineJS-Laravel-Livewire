<div class="flex justify-end flex-1 w-1/2">
    @guest
    <span class="w-5 text-gray-400 cursor-pointer hover:text-gray-700" @click="loginmodal = true">
        <svg fill="none" class="w-5 h-5" viewBox="0 0 20 20" stroke="currentColor">
            <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"></path>
        </svg>
    </span>
    @else

    @if ($post->favorite)
    <span class="w-5 text-gray-500 cursor-pointer hover:text-gray-700" wire:click="unfavorite">
        <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5" stroke="currentColor">
            <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"></path>
        </svg>
    </span>
    @else
    <span class="w-5 text-gray-400 cursor-pointer hover:text-gray-700" wire:click="favorite">
        <svg fill="none" viewBox="0 0 20 20" class="w-5 h-5" stroke="currentColor">
            <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"></path>
        </svg>
    </span>
    @endif
    @endguest
</div>