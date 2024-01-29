@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>Lista dei Progetti</h2>

        <div class="text-end">
            <a class="btn btn-success" href="{{ route('admin.projects.create') }}">Aggiungi Progetto</a>
        </div>

        @include('admin.projects.partials.alert_message')

        @if (count($projects) > 0)
            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Data</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">{{ $project->id }}</th>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.projects.show', ['project' => $project->slug]) }}"
                                    class="btn btn-primary">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>

                                <a class="btn btn-warning"
                                    href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>

                                @include('admin.projects.partials.delete_button')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-warning mt-5 text-center">
                Aggiungi i tuoi Progetti e li visualizzerai qui!
            </div>
        @endif
        @include('admin.projects.partials.delete-modal')
        <div>
            {{ $projects->links() }}
          </div>
  
    </div>
@endsection
