@extends('layouts.base')

@section('content')
<x-topbar />
<div class="flex items-center justify-center pt-16">
    <div class="w-full">
        <div>
            @yield('content')
        </div>
    </div>
</div>
@overwrite