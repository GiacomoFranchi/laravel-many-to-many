@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="card my-4" style="width: 18rem;">
            <div class="card-body">

                {{-- Titolo --}}
                <h5 class="card-title">{{$project->title}}</h5>

                {{-- Tipologia --}}
                <div>
                    Tipologia: {{$project->type ? $project->type->tipologia : 'nessuna tipologia associata'}}
                </div>

                {{-- Controllo se esiste img --}}
                @if ($project->img)
                    <div>
                        <img style="width: 250px"  src="{{asset('storage/' .$project->img)}}" alt="">
                    </div>
                 @else
                 <p>Nessuna immagine caricata</p>
                @endif

                {{-- Data Creazione --}}
                <h6 class="card-subtitle mb-2 text-muted">Creato il: {{$project->created_at}}</h6>

                {{-- Slug --}}
                <h6 class="card-subtitle mb-2 text-muted">Slug: {{$project->slug}}</h6>

                {{-- Descrizione --}}
                <p class="card-text">Descrizione: {{$project->content}}</p>
            </div>
        </div>


        <a class="btn btn-primary my-2" href="{{ route('admin.projects.index') }}">Indietro</a>
        @include('admin.projects.partials.delete_button')
    </div>
@endsection
