@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Projects</h2>
        <a href="{{ route('projects.create') }}" class="btn btn-primary">+ New Project</a>
    </div>

    @if($projects->isEmpty())
        <p>No projects found.</p>
    @else
        <div class="row">
            @foreach($projects as $project)
                <div class="col-md-4">
                    <div class="card mb-3">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}"  class="card-img-top project-img"  alt="{{ $project->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="card-text">
                                <small class="text-muted">{{ $project->status }}</small>
                            </p>
                            <a href="{{ route('projects.show', $project) }}" class="btn btn-sm btn-outline-primary">View</a>
                            <a href="{{ route('projects.edit', $project) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Are you sure you want to delete this project?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $projects->links() }}
    @endif
@endsection
