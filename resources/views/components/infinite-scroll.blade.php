<div class="mb-5 el-posts-container"
    data-infinite-scroll='{ "path": ".el-next-link", "append": ".el-posts-container", "history": false, "status": ".el-scroll-loading"}'>
    <x-cards :posts="$posts" />
</div>
<div class="my-4 text-center el-scroll-loading">
    <div class="infinite-scroll-request">
        Loading...
    </div>
</div>
@if ($posts->hasMorePages())
<a class="hidden el-next-link" href="{{ $posts->nextPageUrl() }}">Next</a>
@endif