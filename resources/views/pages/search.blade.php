@extends('layouts.app')

@section('page-header')
<div class="border border-gray-500 bg-gray-50">
    <div class="max-w-screen-xl px-4 py-12 mx-auto text-center sm:px-6 lg:py-10 lg:px-8">
        <h1 class="text-2xl">
            You're searching for <span class="text-3xl font-extrabold text-gray-900">{{ $q }}</span>
        </h1>
    </div>
</div>
@overwrite

@section('content')
@if ($posts->isNotEmpty())
<x-cards :posts="$posts" />
@else
<p class="mt-10 text-center">
    <svg class="h-10 m-auto mb-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
        viewBox="0 0 24 24" stroke="currentColor">
        <path d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
    </svg>
    No results match that query
</p>
@endif
@overwrite