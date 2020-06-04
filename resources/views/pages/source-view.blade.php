@extends('layouts.app')

@section('page-header')
<div class="border border-{{ $source->colour }}-500 bg-{{ $source->colour }}-50">
    <div class="max-w-screen-xl px-4 py-12 mx-auto sm:px-6 lg:py-10 lg:px-8 lg:flex lg:items-center lg:justify-between">

        <h1 class="text-3xl font-extrabold text-gray-900">
            <img class="inline-block w-8 h-8 mr-2 rounded-full"
                src="https://res.cloudinary.com/madewithlove/image/upload/v1524027194/{{ $source->code }}.png"
                alt="{{ $source->name }}"> {{ $source->name }}
        </h1>
        <div class="flex mt-8 lg:flex-shrink-0 lg:mt-0">
            <div class="inline-flex rounded-md shadow">
                <a href="#"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-{{ $source->colour }}-600 border border-transparent rounded-md hover:bg-{{ $source->colour }}-500 focus:outline-none focus:shadow-outline">
                    Follow //
                </a>
            </div>
        </div>
    </div>
</div>
@overwrite
@section('content')
<x-cards :posts="$posts" />
@overwrite