<div class="overflow-hidden bg-white border border-gray-200 rounded-md hover:shadow-sm group">
    <div>
        <img src="{{ $post->image }}" alt="Article" class="object-cover w-full h-64">
    </div>
    <div class="p-6">
        <div class="mb-2">
            <a href="{{ $post->URL }}"
                class="text-2xl text-gray-900 font-semibold hover:text-{{ $post->source->colour ?? 'purple' }}-600">
                {{ $post->title }}
            </a>
            <p class="mb-2 text-xs text-gray-500">{!! Str::limit($post->description, 120) !!}</p>
            <a class="text-sm text-gray-700 hover:text-{{ $post->source->colour ?? 'purple' }}-600"
                href="/s/{{ $post->source->code }}">{{ $post->source->name }}</a>
        </div>
        <div class="flex items-center">
            <div class="flex items-center flex-1">
                <div class="text-sm">
                    <p class="p-0 text-xs text-gray-600">
                        {{ $post->created_at->format('F j') }} <span class="text-gray-800 ">・</span> <span class="">
                            {{ $post->clicks }} views
                        </span>
                    </p>
                </div>
            </div>
            @livewire('favorite-post', ['post' => $post])
        </div>
    </div>
</div>