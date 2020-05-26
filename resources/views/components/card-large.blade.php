<div class="max-w-2xl mx-auto overflow-hidden bg-white border border-gray-200 rounded-md hover:shadow-sm group">
    {{-- <div>
        <img src="{{ $post->image }}" alt="Article" class="object-cover w-full h-64">
</div> --}}
<div class="p-6">
    <div>
        <div class="flex items-center">
            <div class="flex items-center flex-1">
                <img class="w-5 h-5 mr-2 rounded-full"
                    src="https://res.cloudinary.com/madewithlove/image/upload/v1524027194/{{ $post->source->code }}.png"
                    alt="Avatar of Jonathan Reinink">
                <div class="text-sm">
                    <p class="leading-none text-gray-500">{{ $post->source->name }}</p>
                </div>
            </div>
            <div class="flex-1 text-right ">
                <p class="text-xs text-gray-600">
                    {{ $post->created_at->format('F j') }}
                </p>
            </div>
        </div>
        <div class="mt-2 mb-2 text-3xl font-extrabold text-gray-900 hover:text-purple-600">
            <a href="{{ $post->URL }}">
                {{ $post->title }}
            </a>
        </div>
    </div>
    <div class="flex text-gray-500">
        <div class="flex items-center flex-1 w-1/2">
            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                height="24">
                <path class=" heroicon-ui"
                    d="M17.56 17.66a8 8 0 0 1-11.32 0L1.3 12.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95zm-9.9-1.42a6 6 0 0 0 8.48 0L20.38 12l-4.24-4.24a6 6 0 0 0-8.48 0L3.4 12l4.25 4.24zM11.9 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
            </svg>
            <span class="ml-2 text-sm"> {{ $post->clicks }} views </span>
        </div>
        <div class="flex justify-end flex-1 w-1/2">
            <button
                class="px-4 py-1 text-xs font-medium text-gray-500 bg-gray-200 rounded hover:bg-gray-300 hover:text-gray-600">Save</button>
        </div>
    </div>
</div>
</div>