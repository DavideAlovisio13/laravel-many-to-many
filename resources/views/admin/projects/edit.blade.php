@extends('layouts.admin')
@section('title', 'Modifica Project')
@section('content')
    <section class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card p-4 w-25">
            <h1>Edit</h1>
            <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label @error('name') is-invalid @enderror">Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="titleHelp" name="name"
                        value="{{ old('name', $project->name) }}" required>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label @error('title') is-invalid @enderror">Titolo</label>
                    <input type="text" class="form-control" id="title" aria-describedby="titleHelp" name="title"
                        value="{{ old('title', $project->title) }}" required>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">
            {{ old('description', $project->description) }}
           </textarea>
                </div>
                <div class="mb-3">
                    <label for="create_at" class="form-label">Creato il</label>
                    <input type="datetime-local" class="form-control" id="datetime-local" name="datetime-local"
                        value="{{ old('create_at', $project->create_at) }}" required>
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
                            <option value="{{ $type->id }}" {{ $type->id == $project->type_id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('type_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-danger">Modifica</button>
                <button type="reset" class="btn btn-dark">Annulla</button>
            </form>
        </div>
    </section>
@endsection
