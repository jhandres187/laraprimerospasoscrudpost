@extends('layouts.dashboard')
@section('content')
    <div class="col-12">
        <h1>Actualizar Category #{{  $category->id  }} {{  $category->title  }}</h1>
        @include('layouts.fragment._errors-form')
        <form action="{{  route('category.update', $category->id)  }}" method="post">
            @method('PATCH')
            @include('layouts.category._form')
        </form>
    </div>
@endsection