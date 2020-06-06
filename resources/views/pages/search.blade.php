@extends('layouts.app')

@section('content')
<x-cards :posts="$posts" />
@overwrite