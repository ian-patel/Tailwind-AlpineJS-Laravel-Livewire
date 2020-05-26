@extends('layouts.app')

@section('content')
<iframe src="{{ $post->link }}" class="w-full h-screen" frameborder="0"></iframe>
@overwrite