@extends('layouts.dashboard')
@section('content')
    <div class="col-12">
        <h1>Create Post</h1>
        @include('layouts.fragment._errors-form')
        <form action="{{  route('post.store')  }}" method="post">
            @include('layouts.post._form')
        </form>
    </div>
@endsection