<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(5);
        $types = Type::all();
        return view('admin.projects.index', compact('projects', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $projects = Project::all();
        return view('admin.projects.create', compact('types', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->validated();
        $form_data['slug'] = Project::generateSlug($form_data['title']);
        if($request->hasFile('image')) {
            $name= $request->file('image')->getClientOriginalName();
            $path = Storage::putFileAs('post_images', $request->image, $name);
            $form_data['image'] = $path;
            
        }
        $newProject = Project::create($form_data);
        if ($request->has('technologies')) {
            $newProject->technologies()->attach($request->technologies);
        }
        return redirect()->route('admin.projects.show', $newProject->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $types = Type::all();
        $project = Project::where('slug', $slug)->firstOrFail();
        return view("admin.projects.edit", compact("project",  "types"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $form_data = $request->all();
        if ($project->title != $form_data["title"]) {
            $form_data["slug"] =  Project::generateSlug($form_data["title"]);
        }
        if ($request->hasFile('image_url')) {
            if ($project->image_url) {
                Storage::delete($project->image_url);
            }
            $img_path = Storage::put('my_images', $request->image_url);
            $form_data['image_url'] = $img_path;
        }
        $project->fill($form_data);
        $project->update();
        return redirect()->route("admin.projects.index")->with('message', "Project (id:{$project->id}): {$project->title} edit with success");
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', $project->title . ' è stato eliminato');
    }
}
