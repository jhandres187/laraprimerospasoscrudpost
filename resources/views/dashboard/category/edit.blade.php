@extends('dashboard.layout')
@section('content')
    <div class="col-12">
        <h1>Actualizar Category #{{  $category->id  }} {{  $category->title  }}</h1>
        @include('dashboard.fragment._errors-form')
        <form action="{{  route('category.update', $category->id)  }}" method="post">
            @method('PATCH')
            @include('dashboard.category._form')
        </form>
    </div>
@endsection