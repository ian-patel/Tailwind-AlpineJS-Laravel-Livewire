@extends('layouts.app')

@section('content')

<div class="w-full pb-5 text-gray-700">
    <div class="flex flex-col max-w-screen-xl mx-auto md:items-center md:justify-between md:flex-row">
        <nav class="flex-col flex-grow">
            <a class="px-4 py-2 mt-2 text-sm font-extrabold hover:text-pink-600 @if ($active == 'latest') text-pink-600 @endif"
                href="{{ route('welcone-latest') }}">
                Latest
            </a>
            <a class="px-4 py-2 mt-2 text-sm font-extrabold hover:text-pink-600 @if ($active == 'week') text-pink-600 @endif"
                href="{{ route('welcone-latest') }}?top=week">
                Week
            </a>
            <a class="px-4 py-2 mt-2 text-sm font-extrabold hover:text-pink-600 @if ($active == 'month') text-pink-600 @endif"
                href="{{ route('welcone-latest') }}?top=month">
                Month
            </a>
            <a class="px-4 py-2 mt-2 text-sm font-extrabold hover:text-pink-600 @if ($active == 'year') text-pink-600 @endif"
                href="{{ route('welcone-latest') }}?top=year">
                Year
            </a>
        </nav>
    </div>
</div>

<x-cards :posts="$posts" />
@overwrite