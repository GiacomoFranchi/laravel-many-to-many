@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Tipologia: {{ $type->tipologia }}</h2>
        <p>Slug: {{ $type->slug }}</p>       
    </div>

    @if (count($type->projects) > 0)
        <h2>Progetti associati:</h2>
        <ul>
            @foreach ($type->projects as $project)
                <li>
                    <a href="{{route('admin.projects.show', ['project' => $project->slug])}}">{{$project->title}}</a>
                </li>          
            @endforeach
        </ul> 
    @else
        <h2>Nessun progetto associato a questa tipologia...</h2>      
    @endif
    <a class="btn btn-primary" href="{{route('admin.types.index')}}">Indietro</a>
@endsection