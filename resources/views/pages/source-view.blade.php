@extends('layouts.app')

@section('content')
<x-infinite-scroll :posts="$posts" />
@overwrite