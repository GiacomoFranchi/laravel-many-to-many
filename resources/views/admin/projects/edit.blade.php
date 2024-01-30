@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Modifica Dati Progetto</h1>

        @include('admin.projects.partials.btn_indietro')

        <div class="row justify-content-center mt-5">
            <div class="col-6 mb-5">

                 {{-- Messaggi errore di Validazione --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Inizio Form --}}
                <form action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    {{-- Titolo --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo:</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ old('title', $project->title) }}">
                    </div>

                    {{--Tecnologia--}}
                    <div class="mb-3">
                        @foreach ($tecnologies as $tecnology)
                            <label for="tecnology.{{$tecnology->id}}">{{$tecnology->tecnologia}}</label>
                            <input type="checkbox" @checked($project->tecnologies->contains($tecnology)) id="tecnology.{{$tecnology->id}}" value="{{$tecnology->id}}" name="tecnologies[]">
                        @endforeach
                    </div>
                    {{-- Immagine --}}
                    <div class="mb-3">
                        <label for="img">Immagine</label>
                        <input type="file" class="form-control" id="img" name="img">
                    </div>

                    {{-- Tipologia --}}
                    <div class="mb-2">
                        <label for="type">Seleziona tipologia</label>
                        <select class="form-select" name="type_id" id="type">
                            <option @selected(!old('type_id', $project->type_id)) value="">Nessuna categoria</option>
                            @foreach ($types as $type)
                                <option @selected(old('type_id', $project->type_id) == $type->id) value="{{ $type->id }}">{{ $type->tipologia }}</option>
                            @endforeach
                        </select>
                    </div>
        
                    {{-- Descrizione --}}
                    <div class="mb-3">
                        <label for="content" class="form-label">Descrizione:</label>
                        <textarea class="form-control" id="content" rows="3" name="content">{{ old('content', $project->content) }}</textarea>
                    </div>

                    <button class="btn btn-success" type="submit">Modifica</button>

                </form>
            </div>
        </div>
    </div>


@endsection
