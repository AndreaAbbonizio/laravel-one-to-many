<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request);

        $formData = $request->all();

        $newProject =  new Project();

        $newProject->title = $formData['title'];
        $newProject->description = $formData['description'];
        $newProject->link_repository = $formData['link_repository'];
        $newProject->link_image = $formData['link_image'];
        $newProject->developers = $formData['developers'];
        $newProject->slug =  Str::slug($newProject->title, '-');


        $newProject->save();

        return redirect()->route('admin.projects.show', $newProject->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validation($request);

        $formData = $request->all();



        $project->update($formData);

        $project->slug =  Str::slug($project->title, '-');





        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();


        return redirect()->route('admin.projects.index');
    }

    private function validation($request)
    {

        $formData = $request->all();

        $validator = Validator::make($formData, [
            'title' => 'required|min:3',
            'description' => 'required',
            'link_repository' => 'required',
            'link_image' => 'nullable',
            'developers' => 'required',
        ], [
            'title.required' => 'Il titolo deve essere inserito',
            'title.min' => 'Il titolo deve avere :min caratteri',
            'description.required' => 'La descrizione deve essere inserita',
            'link_repository.required' => 'Questo campo non può rimanere vuoto',
            'developers.required' => 'Questo campo non può rimanere vuoto',

        ])->validate();

        return $validator;
    }
}
