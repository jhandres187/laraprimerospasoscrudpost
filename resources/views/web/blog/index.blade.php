@extends('web.layout')
@section('content')
    <x-web.blog.post.index :posts="$posts">
        <h1>listado principal de post</h1>
    </x-web.blog.post.index>
@endsection