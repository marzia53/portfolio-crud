@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">&larr; Back to Projects</a>
        <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary ms-2">Edit Project</a>
    </div>

    <div class="card">
        @if($project->image)
            <img 
                src="{{ asset('storage/' . $project->image) }}" 
                class="card-img-top" 
                alt="{{ $project->title }}"
            >
        @endif

        <div class="card-body">
            <h3 class="card-title">{{ $project->title }}</h3>
            <p class="card-text">{{ $project->description }}</p>

            @if($project->project_url)
                <p>
                    <strong>URL:</strong>
                    <a href="{{ $project->project_url }}" target="_blank">
                        {{ $project->project_url }}
                    </a>
                </p>
            @endif

            <p>
                <strong>Status:</strong>
                <span class="badge bg-{{ $project->status === 'published' ? 'success' : 'secondary' }}">
                    {{ ucfirst($project->status) }}
                </span>
            </p>
        </div>
    </div>
@endsection
