@extends('layouts.dashboard')
@section('content')
    <div class="col-12">
        <a href="{{  route('category.create')  }}" class="btn btn-primary">Crear</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Slug</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $c)
                    <tr>
                        <td scope="row">{{  $c->title  }}</td>
                        <td>{{  $c->slug  }}</td>
                        <td>
                            <a href="{{  route('category.show', $c)  }}" class="btn btn-success">ver</a>
                            <a href="{{  route('category.edit', $c)  }}" class="btn btn-info">Editar</a>
                            <form action="{{  route('category.destroy', $c)  }}" method="post">
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
    {{  $categories->links()  }}
@endsection
