@extends('layouts.admin')

@section('title', 'Create Types')

@section('content')
    <section class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card w-75 p-4">
            <h2>Create a new type</h2>
            <form action="{{ route('admin.types.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name') }}" minlength="3" maxlength="255">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div id="titleHelp" class="form-text text-white">Inserire minimo 3 caratteri e massimo 255</div>
                </div>
                <div class="mb-3">
                    <button type="submit">Crea</button>
                    <button type="reset">Svuota campi</button>
                </div>
            </form>
        </div>
    </section>

@endsection
