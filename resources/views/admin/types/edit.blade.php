@extends('layouts.admin')
@section('title', 'Modifica Type')
@section('content')
    <section class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card p-4 w-25">
            <h1>Edit</h1>
            <form action="{{ route('admin.types.update', $type->slug) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label @error('name') is-invalid @enderror">Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="titleHelp" name="name"
                        value="{{ old('name', $type->name) }}" required>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-danger">Modifica</button>
                <button type="reset" class="btn btn-dark">Annulla</button>
            </form>
        </div>
    </section>
@endsection
