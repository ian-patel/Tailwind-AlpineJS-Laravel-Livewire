<div x-show="flyoutMenuOpen" x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-1"
    class="absolute w-full px-2 mt-2 -ml-4 transform sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
    <div class="rounded-lg rounded-t-none shadow-2xl">
        <div class="bg-gray-100 ">
            @if($posts->isEmpty())
            <div class="relative z-20 flex grid justify-center gap-6 px-5 py-6 text-center sm:gap-8 sm:p-8">
                <svg class="h-10 m-auto" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p>No result found for query <strong>{{ $q }}</strong></p>
            </div>
            @else
            <div class="relative z-20 grid gap-6 px-5 py-6 sm:gap-8 sm:p-8">
                @foreach ($posts as $post)
                <a href="{{ $post->URL }}"
                    class="flex items-start p-3 -m-3 space-x-4 transition duration-150 ease-in-out border-b border-gray-200 hover:bg-gray-200">
                    <img src="{{ $post->image }}" alt="{{ $post->title }}" class="hidden w-20 md:block">
                    <div class="space-y-1">
                        <p class="text-base font-medium leading-6 text-gray-900">
                            {{ $post->title }}
                        </p>
                        <p class="text-xs leading-5 text-gray-500">
                            {!! Str::limit($post->description, 70) !!}
                        </p>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="flex justify-between px-5 py-5 sm:flex sm:space-y-0 sm:space-x-10 sm:px-8">
                <div class="text-center">
                    <p class="text-xs text-gray-500">Please enter to see all results</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>