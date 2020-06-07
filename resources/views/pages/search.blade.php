@extends('layouts.app')

@section('content')
@section('page-header')
<div class="border border-gray-500 bg-gray-50">
    <div class="max-w-screen-xl px-4 py-12 mx-auto text-center sm:px-6 lg:py-10 lg:px-8">
        <h1 class="text-3xl font-extrabold text-gray-900">
            {{ $q }}
        </h1>
    </div>
</div>
@overwrite
<x-cards :posts="$posts" />
@overwrite