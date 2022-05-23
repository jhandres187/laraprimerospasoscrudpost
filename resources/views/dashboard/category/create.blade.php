@extends('dashboard.layout')
@section('content')
    <div class="col-12">
        <h1>Create Category</h1>
        @include('dashboard.fragment._errors-form')
        <form action="{{  route('category.store')  }}" method="post">
            @include('dashboard.category._form')
        </form>
    </div>
@endsection