@extends('web.layout')
@section('content')
    <h1>Post</h1>
    <x-web.blog.post.show :post="$post" />
@endsection