@csrf
<div class="mb-3">
    <label for="titleInput" class="form-label">Titulo</label>
    <input type="text" class="form-control" name="title" id="titleInput" placeholder="Escribe el titulo del post..." value="{{  old("title", $post->title)  }}">
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
    <input type="text" class="form-control" name="slug" id="slugInput" placeholder="Escribe el titulo del post..." value="{{  old("slug", $post->slug)  }}">
    @if ($errors->has('slug'))
        <small id="helpId" class="form-text text-danger">
            @foreach ($errors->get('slug') as $e)
                {{  $e  }}
            @endforeach
        </small>
    @endif
</div>
<div class="mb-3">
    <label for="categoriesInput" class="form-label"></label>
    <select class="form-control" name="category_id" id="categoriesInput">
        <option value="-1" disabled selected>Select Option</option>
        @foreach ($categories as $id => $title)
            <option {{  old('category_id', $post->category_id) == $id ? 'selected' : '';  }} value="{{  $id  }}">{{  $title  }}</option>
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
        <option {{  old('posted', $post->posted) == 'yes' ? 'selected' : ''  }} value="yes">Si</option>
        <option {{  old('posted', $post->posted) == 'not' ? 'selected' : ''  }} value="not">No</option>
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
    <textarea class="form-control" name="content" id="contenidoInput" rows="3" placeholder="Escribe el Contenido ...">{{  old("content", $post->content)  }}</textarea>
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
    <textarea class="form-control" name="description" id="descriptionInput" rows="3" placeholder="Escribe la Desripción ...">{{  old("description", $post->description)  }}</textarea>
    @if ($errors->has('description'))
        <small id="helpId" class="form-text text-danger">
            @foreach ($errors->get('description') as $e)
                {{  $e  }}
            @endforeach
        </small>
    @endif
</div>
@isset($page)
    @if ($page == "edit")
        <div class="mb-3">
            <label for="ImagenInput" class="form-label">Imagen</label>
            <input class="form-control" type="file" name="image" id="ImagenInput">
            @if ($errors->has('description'))
                <small id="helpId" class="form-text text-danger">
                    @foreach ($errors->get('image') as $e)
                        {{  $e  }}
                    @endforeach
                </small>
            @endif
        </div>
    @endif
@endisset
<button type="submit" class="btn btn-primary">Enviar</button>