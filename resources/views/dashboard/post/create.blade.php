@extends('dashboard.layout')
@section('content')
    <div class="col-12">
        <h1>Create Post</h1>
        @include('dashboard.fragment._errors-form')
        <form action="{{  route('post.store')  }}" method="post">
            @include('dashboard.fragment._form')
        </form>
    </div>
@endsection