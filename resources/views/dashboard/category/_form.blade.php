@csrf
<div class="mb-3">
    <label for="titleInput" class="form-label">Titulo</label>
    <input type="text" class="form-control" name="title" id="titleInput" placeholder="Escribe el titulo del post..." value="{{  old("title", $category->title)  }}">
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
    <input type="text" class="form-control" name="slug" id="slugInput" placeholder="Escribe el titulo del post..." value="{{  old("slug", $category->slug)  }}">
    @if ($errors->has('slug'))
        <small id="helpId" class="form-text text-danger">
            @foreach ($errors->get('slug') as $e)
                {{  $e  }}
            @endforeach
        </small>
    @endif
</div>
<button type="submit" class="btn btn-primary">Enviar</button>