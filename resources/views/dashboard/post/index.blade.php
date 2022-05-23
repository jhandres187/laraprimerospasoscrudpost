@extends('dashboard.layout')
@section('content')
    <div class="col-12">
        <a href="{{  route('post.create')  }}" class="btn btn-primary">Crear</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Categoria</th>
                    <th>Posted</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $p)
                    <tr>
                        <td scope="row">{{  $p->title  }}</td>
                        <td>{{  $p->category->title  }}</td>
                        <td>{{  $p->posted  }}</td>
                        <td>
                            <a href="{{  route('post.show', $p)  }}" class="btn btn-success">ver</a>
                            <a href="{{  route('post.edit', $p)  }}" class="btn btn-info">Editar</a>
                            <form action="{{  route('post.destroy', $p)  }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{  $posts->links()  }}
@endsection
