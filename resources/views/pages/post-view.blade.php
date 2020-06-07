@extends('layouts.app')

@section('content')
<nav class="w-full mt-5 mb-10">
    <ol class="flex list-reset text-grey-dark">
        <li><a onclick="goBack()" class="font-bold cursor-pointer">Posts</a></li>
        <li><span class="mx-2">/</span></li>
        <li>{{ $post->title }}</li>
    </ol>
</nav>
<iframe src="{{ $post->link }}" class="w-full h-screen" frameborder="0"></iframe>

<script>
    function goBack() {
        if (history.length > 2) {
            window.history.back();
        } else {
            window.location.href = "/";
        }
    }
</script>
@overwrite