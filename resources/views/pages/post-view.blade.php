@extends('layouts.app')

@section('content')
<nav class="w-full p-3 m-4 font-sans rounded bg-grey-light">
    <ol class="flex list-reset text-grey-dark">
        <li><button onclick="goBack()" class="font-bold cursor-pointer text-blue">Posts</button></li>
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