@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="py-3 fw-bold d-inline-block pe-2">Modifica il progetto:</h1>
        <h2 class="pb-3 d-inline-block">{{ $project->title }}</h2>

        <form action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-6">

                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold">Titolo</label>
                        <input type="text"
                            class="form-control @error('title')
                            is-invalid
                        @enderror"
                            id="title" aria-describedby="title" name="title"
                            value="{{ old('title', $project->title) }}">
                        @error('title')
                            <div id="title-error" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold">Descrizione</label>
                        <textarea type="text"
                            class="form-control @error('description')
                            is-invalid
                        @enderror"
                            id="description" aria-describedby="description" name="description" rows="5">{{ old('description', $project->description) }}</textarea>
                        @error('description')
                            <div id="description-error" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- <div class="mt-3">
                        <label for="link" class="form-label fw-bold">Link</label>
                        <input type="text"
                            class="form-control @error('link')
                            is-invalid
                        @enderror"
                            id="link" aria-describedby="link" name="link" value="{{ old('link', $project->link) }}">
                    </div> --}}
                    <div class="mb-3">
                        <label for="type_id" class="form-label fw-bold">Tipo</label>
                        <select class="form-select @error('type_id') is-invalid @enderror" id="type_id" name="type_id">
                            <option value="">Seleziona un'opzione</option>
                            @foreach ($types as $type)
                                <option @selected($project->type?->id === $type->id) value="{{ $type->id }}">{{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('type_id')
                            <div id="type_id-error" class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="slug" class="form-label fw-bold">Slug</label>
                        <input type="text"
                            class="form-control bg-body-secondary @error('slug')
                            is-invalid
                        @enderror"
                            id="slug" aria-describedby="slug" name="slug" value="{{ old('slug', $project->slug) }}">
                        <div id="slugHelp" class="form-text">Lo slug non può essere modificato, si aggiorna in base al
                            titolo inserito.</div>
                    </div>
                    <div class="mb-3">
                        <label for="thumb" class="form-label fw-bold">Immagine</label>
                        <input class="form-control @error('thumb') is-invalid @enderror" type="file" id="thumb"
                            name="thumb" value="{{ old('thumb'), $project->thumb }}">
                        <div class="py-3">
                            <img class="w-25" src="{{ asset('storage/' . $project->thumb) }}" alt=""
                                id="preview">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-5 pe-3">Salva</button>

        </form>
    </div>
@endsection
