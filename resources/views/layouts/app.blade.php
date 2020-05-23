@extends('layouts.base')
@section('content')
<x-topbar />
<div class="w-full max-w-screen-xl px-6 pt-24 pb-16 mx-auto lg:pt-28">
    <div class="-mx-6 lg:flex">
        <x-sidebar />
        <x-content-wrapper />
    </div>
</div>
@overwrite