@extends('layouts.base')

@section('content')
<div class="flex items-center justify-center min-h-screen">
    <div class="w-full">
        <div>
            @yield('content')
        </div>
    </div>
</div>
@overwrite