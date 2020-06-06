<div class="mb-4 space-y-4">
    @foreach ($posts as $post)
    @if ($post->clicks > 50)
    <x-card-large :post="$post" />
    @else
    <x-card :post="$post" />
    @endif
    @endforeach
    {{ $posts->withQueryString()->links() }}
</div>