@extends('dashboard.layout')
@section('content')
    <div class="col-12">
        <h1>Actualizar Post #{{  $post->id  }} {{  $post->title  }}</h1>
        @include('dashboard.fragment._errors-form')
        <form action="{{  route('post.update', $post->id)  }}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @include('dashboard.post._form', ["page" => "edit"])
        </form>
    </div>
@endsection