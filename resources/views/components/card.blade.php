<div class="w-full overflow-hidden border border-gray-200 rounded lg:flex hover:shadow-sm group">
    <div class="flex flex-col justify-between w-full p-4 leading-normal">
        <div class="">
            <div class="mb-2">
                <a href="{{ $post->URL }}" target="new"
                    class="text-2xl text-gray-900 leading-tight font-semibold hover:text-{{ $post->source->colour ?? 'purple' }}-600">
                    {{ $post->title }}
                </a>
                <p class="my-3 text-xs text-gray-500">{!! Str::limit($post->description, 120) !!}</p>
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
    <div class="flex-none hidden h-48 overflow-hidden text-center bg-center bg-cover filter-grayscale group-hover:filter-none lg:block lg:h-auto lg:w-48"
        style="background-image: url('{{ $post->image }}')" title="Image for {{ $post->title }}">
    </div>
</div>