@extends('layouts.app')

@section('content')
    <h2 class="mb-3">Edit Project</h2>

    <form 
        action="{{ route('projects.update', $project) }}" 
        method="POST" 
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        {{-- Title --}}
        <div class="mb-3">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input 
                type="text"
                name="title"
                id="title"
                class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title', $project->title) }}"
                required
            >
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea
                name="description"
                id="description"
                class="form-control @error('description') is-invalid @enderror"
                rows="4"
            >{{ old('description', $project->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Project URL --}}
        <div class="mb-3">
            <label for="project_url" class="form-label">Project URL</label>
            <input
                type="url"
                name="project_url"
                id="project_url"
                class="form-control @error('project_url') is-invalid @enderror"
                value="{{ old('project_url', $project->project_url) }}"
            >
            @error('project_url')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Current Image Preview --}}
        @if($project->image)
            <div class="mb-3">
                <label class="form-label">Current Image:</label>
                <div>
                    <img 
                        src="{{ asset('storage/' . $project->image) }}" 
                        alt="Current project image" 
                        class="img-thumbnail" 
                        style="max-width: 200px;"
                    >
                </div>
            </div>
        @endif

        {{-- New Image --}}
        <div class="mb-3">
            <label for="image" class="form-label">Replace Image</label>
            <input 
                type="file"
                name="image"
                id="image"
                class="form-control @error('image') is-invalid @enderror"
                accept="image/*"
            >
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Status --}}
        <div class="mb-4">
            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
            <select
                name="status"
                id="status"
                class="form-select @error('status') is-invalid @enderror"
                required
            >
                <option value="draft" {{ old('status', $project->status) === 'draft' ? 'selected' : '' }}>
                    Draft
                </option>
                <option value="published" {{ old('status', $project->status) === 'published' ? 'selected' : '' }}>
                    Published
                </option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Submit --}}
        <button type="submit" class="btn btn-primary">Update Project</button>
        <a href="{{ route('projects.show', $project) }}" class="btn btn-secondary ms-2">Cancel</a>
    </form>
@endsection
