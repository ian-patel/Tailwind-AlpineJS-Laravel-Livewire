<div class="mb-4 space-y-4">
    @foreach ($posts as $post)
    <x-card :post="$post" />
    @endforeach
</div>