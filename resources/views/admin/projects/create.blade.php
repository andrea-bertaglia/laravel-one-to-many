@extends('layouts.admin')

@section('title', 'Aggiungi un nuovo progetto')

@section('content')
    <div class="container">
        <h1 class="py-3 fw-bold">Aggiungi un nuovo progetto</h1>

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold">Titolo</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" value="{{ old('title') }}">
                        @error('title')
                            <div id="title-error" class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold">Descrizione</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            rows="5">{{ old('description') }}</textarea>
                        @error('description')
                            <div id="description-error" class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="mb-3">
                        <label for="technologies" class="form-label fw-bold">Tecnologie</label>
                        <select class="form-select @error('technologies') is-invalid @enderror" id="technologies"
                            name="technologies">
                            <option>Seleziona un'opzione</option>
                            <option @selected(old('technologies') === 'HTML') value="HTML">HTML</option>
                            <option @selected(old('technologies') === 'CSS') value="CSS">CSS</option>
                            <option @selected(old('technologies') === 'JavaScript') value="JavaScript">JavaScript</option>
                            <option @selected(old('technologies') === 'VUE.js') value="VUE.js">VUE.js</option>
                            <option @selected(old('technologies') === 'PHP') value="PHP">PHP</option>
                            <option @selected(old('technologies') === 'Laravel') value="Laravel">Laravel</option>
                        </select>
                        @error('technologies')
                            <div id="technologies-error" class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> --}}
                </div>
                <div class="col-6">
                    {{-- <div class="mb-3">
                        <label for="link" class="form-label fw-bold">Link</label>
                        <input type="text" class="form-control @error('link') is-invalid @enderror" id="link"
                            name="link" value="{{ old('link') }}">
                    </div> --}}

                    <div class="mb-3">
                        <label for="slug" class="form-label fw-bold">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                            name="slug" value="{{ old('slug') }}" disabled>
                        <div id="slugHelp" class="form-text">Lo slug non può essere modificato, si aggiorna in base al
                            titolo inserito.</div>
                    </div>
                    <div class="mb-3">
                        <label for="thumb" class="form-label fw-bold">Immagine</label>
                        <input class="form-control @error('thumb') is-invalid @enderror" type="file" id="thumb"
                            name="thumb" value="{{ old('thumb') }}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-5 pe-3">Salva</button>
        </form>
    </div>

@endsection
