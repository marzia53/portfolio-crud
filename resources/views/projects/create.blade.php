@extends('layouts.app')

@section('content')
    <h2 class="mb-3">Add New Project</h2>

    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Title --}}
        <div class="mb-3">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                class="form-control @error('title') is-invalid @enderror" 
                value="{{ old('title') }}"
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
            >{{ old('description') }}</textarea>
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
                value="{{ old('project_url') }}"
            >
            @error('project_url')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Image --}}
        <div class="mb-3">
            <label for="image" class="form-label">Project Image <span class="text-danger">*</span></label>
            <input 
                type="file" 
                name="image" 
                id="image" 
                class="form-control @error('image') is-invalid @enderror"
                accept="image/*"
                required
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
                <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Submit --}}
        <button type="submit" class="btn btn-success">Create Project</button>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary ms-2">Cancel</a>
    </form>
@endsection
