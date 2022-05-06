@extends('dashboard.layout')
@section('content')
    <div class="col-12">
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
                        <td>CATEGORIA</td>
                        <td>{{  $p->posted  }}</td>
                        <td>Acciones</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
