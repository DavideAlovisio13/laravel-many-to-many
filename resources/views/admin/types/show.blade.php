@extends('layouts.admin')
@section('title', $type->name)

@section('content')
<section class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card text-white">
        <div class="card-body">
          <h5 class="card-title">{{ $type->name }}</h5>
          <h6 class="card-subtitle mb-2">{{ $type->slug }}</h6>
          <p class="card-text">{{ $type->description }}</p>
          <a href="{{ route('admin.types.index') }}" class="btn btn-danger">Torna ai progetti</a>
        </div>
      </div>
</section>
@endsection