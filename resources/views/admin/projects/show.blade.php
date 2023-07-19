@extends("layouts.admin")

@section('content')

    <h2 class="text-center">{{ $project->title }}</h2>
    <h5>Tipo: {{ ($project->type) ? $project->type->name : "Nessuno" }}</h5>
    <h6>Tecnologie:

        @forelse ($project["technologies"] as $technology)
            <span class="badge text-bg-info">{{$technology->name}}</span>
        @empty
            <span class="badge text-bg-danger">Nessuna</span>
        @endforelse
        
    </h6>
    <div class="w-50 my-2">
        <img src="{{ asset("storage/" . $project->image) }}" class="card-img-top" alt="{{ $project->title }}">
    </div>
    <p>{{ $project->content }}</p>

    <a class="btn btn-primary my-2" href="{{ route("admin.projects.index") }}">Torna indietro</a>
    <a class="btn btn-secondary" href="{{ route("admin.projects.edit", $project->id) }}">
        <i class="fa-solid fa-wrench"></i>
    </a>
@endsection