@extends('dashboard.layout')
@section('content')
<div class="col-12">
    <h1>Actualizar Post #{{  $post->id  }} {{  $post->title  }}</h1>
    @include('dashboard.fragment._errors-form')
    <form action="{{  route('post.update', $post->id)  }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titleInput" class="form-label">Titulo</label>
            <input type="text" class="form-control" name="title" id="titleInput" placeholder="Escribe el titulo del post...">
            @if ($errors->has('title'))
                <small id="helpId" class="form-text text-danger">
                    @foreach ($errors->get('title') as $e)
                        {{  $e  }}
                    @endforeach
                </small>
            @endif
        </div>
        <div class="mb-3">
            <label for="slugInput" class="form-label">Slug</label>
            <input type="text" class="form-control" name="slug" id="slugInput" placeholder="Escribe el titulo del post...">
            @if ($errors->has('slug'))
                <small id="helpId" class="form-text text-danger">
                    @foreach ($errors->get('slug') as $e)
                        {{  $e  }}
                    @endforeach
                </small>
            @endif
        </div>
        <div class="mb-3">
            <label for="categoriesInput" class="form-label">Categoria</label>
            <select class="form-control" name="category_id" id="categoriesInput">
                <option value="-1" disabled selected>Select Option</option>
                @foreach ($categories as $id => $title)
                    <option value="{{  $id  }}">{{  $title  }}</option>
                @endforeach
            </select>
            @if ($errors->has('category_id'))
                <small id="helpId" class="form-text text-danger">
                    @foreach ($errors->get('category_id') as $e)
                        {{  $e  }}
                    @endforeach
                </small>
            @endif
        </div>
        <div class="mb-3">
            <label for="postedInput" class="form-label">Posted</label>
            <select class="form-control" name="posted" id="postedInput">
                <option value="-1" disabled selected>Select Option</option>
                <option value="yes">Si</option>
                <option value="not">No</option>
            </select>
            @if ($errors->has('posted'))
                <small id="helpId" class="form-text text-danger">
                    @foreach ($errors->get('posted') as $e)
                        {{  $e  }}
                    @endforeach
                </small>
            @endif
        </div>
        <div class="mb-3">
            <label for="contenidoInput" class="form-label">Contenido</label>
            <textarea class="form-control" name="content" id="contenidoInput" rows="3"></textarea>
            @if ($errors->has('content'))
                <small id="helpId" class="form-text text-danger">
                    @foreach ($errors->get('content') as $e)
                        {{  $e  }}
                    @endforeach
                </small>
            @endif
        </div>
        <div class="mb-3">
            <label for="descriptionInput" class="form-label">Descripción</label>
            <textarea class="form-control" name="description" id="descriptionInput" rows="3"></textarea>
            @if ($errors->has('description'))
                <small id="helpId" class="form-text text-danger">
                    @foreach ($errors->get('description') as $e)
                        {{  $e  }}
                    @endforeach
                </small>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
@endsection