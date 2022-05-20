@extends('dashboard.layout')
@section('content')
    <div class="col-12">
        <h1>posted: {{  $post->title  }}</h1>
        <p>{{  $post->posted  }}</p>
        <p>{{  $post->description  }}</p>
        <div>{{  $post->content  }}</div>
    </div>
@endsection