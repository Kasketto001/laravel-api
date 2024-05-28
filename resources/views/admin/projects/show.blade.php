@extends('layouts.admin')

@section('content')

<header>
    <div class="py-5 bg-dark text-white">
        <div class="container">
            <h1>{{ $project->title }}</h1>
        </div>
    </div>
</header>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="container d-flex justify-content-center align-items-center">
                <img class="rounded" src="{{ asset(str_replace('public', 'storage', $project->thumb)) }}" width="500" alt="">
            </div>
            <h4 class="mt-4">Tipo</h4>
            @if($project->type)
                <p>Type: {{ $project->type->name }}</p>
            @endif
            <h2 class="mb-3">Descrizione</h2>
            <p>{{ $project->description }}</p>
            <hr>
            <h4 class="mt-4">Autore</h4>
            <p>{{ $project->author }}</p>

            <h4 class="mt-4">Technologies</h4>
            @forelse ($project->technologies as $technology)

            <span
                class="badge bg-light text-dark"
                >{{ $technology->name }}</span
            >
            
                
            @empty
               <span>No Technology required. </span>
            @endforelse
        </div>
    </div>
</div>

@endsection
