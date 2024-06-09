@extends('layouts.admin')

@section('title', 'Create Project')

@section('content')
    <section class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card w-75 p-4">
            <h2>Create a new project</h2>
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name') }}" minlength="3" maxlength="255">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div id="titleHelp" class="form-text text-white">Inserire minimo 3 caratteri e massimo 255</div>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title') }}" minlength="3" maxlength="255">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div id="titleHelp" class="form-text text-white">Inserire minimo 3 caratteri e massimo 255</div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">
                {{ old('description') }}
              </textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="create_at" class="form-label">Creato il</label>
                    <input type="datetime-local" class="form-control @error('create_at') is-invalid @enderror"
                        id="create_at" name="create_at" value="{{ old('create_at') }}">
                    @error('create_at')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div id="titleHelp" class="form-text text-white">Inserire un valore</div>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">immagine</label>
                    <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror"
                        id="image" name="image" value="{{ old('image') }}">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div id="titleHelp" class="form-text text-white">Inserire un valore</div>
                </div>
                <div class="mb-3">
                    <label for="type_id" class="form-label text-white">Select Type</label>
                    <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                        <option value="">Select Type</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('type_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit">Crea</button>
                    <button type="reset">Svuota campi</button>
                </div>
            </form>
        </div>
    </section>

@endsection
