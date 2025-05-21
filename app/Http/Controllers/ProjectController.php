<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // 1. List all projects
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('projects.index', compact('projects'));
    }

    // 2. Show a form to create a new project
    public function create()
    {
        return view('projects.create');
    }

    // 3. Persist a new project
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_url' => 'nullable|url',
            'image'       => 'required|image',
            'status'      => 'required|in:draft,published',
        ]);

        // store image on "public" disk, get path
        $data['image'] = $request->file('image')->store('projects','public');

        Project::create($data);

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project created successfully.');
    }

    // 4. Show a single project
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    // 5. Show a form to edit an existing project
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    // 6. Persist updates to a project
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_url' => 'nullable|url',
            'image'       => 'nullable|image',
            'status'      => 'required|in:draft,published',
        ]);

        if ($request->hasFile('image')) {
            // delete old image? \Storage::disk('public')->delete($project->image);
            $data['image'] = $request->file('image')->store('projects','public');
        }

        $project->update($data);

        return redirect()
            ->route('projects.show', $project)
            ->with('success', 'Project updated successfully.');
    }

    // 7. Delete a project
    public function destroy(Project $project)
    {
        // optionally delete image: \Storage::disk('public')->delete($project->image);
        $project->delete();

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}
