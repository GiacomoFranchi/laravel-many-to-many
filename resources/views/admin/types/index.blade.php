@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>Lista delle Tiplologie di progetti</h2>


        @if (count($types) > 0)
            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Tipologia</th>
                        <th scope="col">Data</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                        <tr>
                            <th scope="row">{{ $type->id }}</th>
                            <td>{{ $type->tipologia }}</td>
                            <td>{{ $type->created_at }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('admin.types.show',['type' => $type->slug])}}">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-warning mt-5 text-center">
                Aggiungi le tipologie di progetto!
            </div>
        @endif

    </div>
@endsection
