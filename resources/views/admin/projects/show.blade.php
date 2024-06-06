@extends('layouts.admin')
@section('title', $project->title)

@section('content')
<section class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card text-white">
        <div class="card-body">
          <h5 class="card-title">{{ $project->title }}</h5>
          <h6 class="card-subtitle mb-2">{{ $project->name }}</h6>
          <p class="card-text">{{ $project->description }}</p>
          <a href="{{ route('admin.projects.index') }}" class="btn btn-danger">Torna ai progetti</a>
        </div>
      </div>
    
</section>
@endsection