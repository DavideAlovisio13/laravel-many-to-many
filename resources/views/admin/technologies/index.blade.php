@extends('layouts.admin')
@section('title', 'Projects')

@section('content')
    <section id="projects" class="container-fluid">
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session()->get('message') }}</div>
        @endif
        <div class="d-flex justify-content-between align-items-center py-4">
            <h1 class="text-danger">Technolgies</h1>
        </div>
        <div class="row">
            <div class="col-sm-8 ">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-danger bg-transparent">Id</th>
                                    <th scope="col" class="text-danger bg-transparent">Name</th>
                                    <th scope="col" class="text-danger bg-transparent">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($technologies as $technology)
                                    <tr>
                                        <td class="bg-transparent text-white border-bottom-0">{{ $technology->id }}</td>
                                        <td class="bg-transparent text-white border-bottom-0">{{ $technology->name }}</td>
                                        <td
                                            class=" bg-transparent text-white d-flex border-bottom-0 flex-column justify-content-center align-items-center">
                                            <a href="{{ route('admin.technologies.show', $technology->slug) }}"><i
                                                    class="fa-solid text-danger fa-eye"></i></a>
                                            <a href="{{ route('admin.technologies.edit', $technology->slug) }}"><i
                                                    class="fa-solid text-danger fa-pen"></i></a>
                                            <form action="{{ route('admin.technologies.destroy', $technology->slug) }}"
                                                method="POST" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="delete-button border-0 bg-transparent"
                                                    data-item-title="{{ $technology->name }}">
                                                    <i class="fa-solid text-danger fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('admin.technologies.create') }}" class="btn btn-danger">Create a new technology</a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="container text-center d-flex flex-column">
                        <div class="row">
                            <div class="col p-2">
                                <img src="/images/logo.png" class="card-img-top rounded-circle p-1"
                                    style="width: 300px height: 300px" alt="logo-profile">
                            </div>
                            <div class="col align-items-center justify-content-center d-flex">
                                <h2 class="text-white fs-1">{{ Auth::user()->name }}</h2>
                            </div>
                        </div>
                        <div class="row pt-4 fs-1 text-white">
                            <div
                                class="col social_card my-4 d-flex flex-column justify-content-center align-content-center">
                                <a href="https://github.com/DavideAlovisio13"><i class="fa-brands fa-github fa-2xl text-danger"></i></a>
                                <h4 class="pt-3">GitHub</h4>
                            </div>
                            <div
                                class="col social_card my-4 d-flex flex-column justify-content-center align-content-center">
                                <a href="https://it-it.facebook.com/index.php/"><i class="fa-brands fa-facebook fa-2xl text-danger"></i></a>
                                <h4 class="pt-3">Facebook</h4>
                            </div>
                            <div
                                class="col social_card my-4 d-flex flex-column justify-content-center align-content-center">
                                <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram fa-2xl text-danger"></i></a>
                                <h4 class="pt-3">Instagram</h4>
                            </div>
                            <div
                                class="col social_card my-4 d-flex flex-column justify-content-center align-content-center">
                                <a href="https://x.com/x."><i class="fa-brands fa-x-twitter fa-2xl text-danger"></i></a>
                                <h4 class="pt-3">Twitter</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-sm">
                <h2 class="text-danger">Total Revenue</h2>
                <canvas id="polarArea" style="width:300px height: 300px"></canvas>
            </div>
            <div class="col-sm">
                <h2 class="text-danger">Total Expenses</h2>
                <canvas id="doughnut" style="width:300px height: 300px"></canvas>
            </div>
            <div class="col-sm d-flex justify-content-center align-items-center flex-column">
                <h2 class="text-danger">Traffic stats</h2>
                <canvas id="barchart"></canvas>
            </div>
        </div>
    </section>
    @include('partials.modal-delete');
@endsection
