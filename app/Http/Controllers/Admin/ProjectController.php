<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


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
        $technologies = Technology::all();

        return view('admin.projects.index', compact('projects', 'technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.create', compact('types', 'technologies'));
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

        if ($request->hasFile('link_image')) {


            $path = Storage::put('project_images', $request->link_image);


            $formData['link_image'] = $path;
        }

        $newProject->title = $formData['title'];
        $newProject->type_id = $formData['type_id'];

        $newProject->description = $formData['description'];
        $newProject->link_repository = $formData['link_repository'];
        $newProject->link_image = $formData['link_image'];
        $newProject->developers = $formData['developers'];
        $newProject->slug =  Str::slug($newProject->title, '-');

        $newProject->save();

        if (array_key_exists('technologies', $formData)) {

            $newProject->technologies()->attach($formData['technologies']);
        }



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
        $technologies = Technology::all();

        return view('admin.projects.show', compact('project', 'technologies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
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


        if ($request->hasFile('link_image')) {

            if ($project->link_image) {

                Storage::delete($project->link_image);
            }

            $path = Storage::put('project_images', $request->link_image);

            $formData['link_image'] = $path;
        }



        $project->slug =  Str::slug($project->title, '-');

        $project->update($formData);


        if (array_key_exists('technologies', $formData)) {
            $project->technologies()->sync($formData['technologies']);
        } else {
            $project->technologies()->detach();
        }





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
        if ($project->link_image) {
            Storage::delete($project->link_image);
        }
        $project->delete();


        return redirect()->route('admin.projects.index');
    }

    private function validation($request)
    {

        $formData = $request->all();

        $validator = Validator::make($formData, [
            'title' => 'required|min:3',
            'type_id' => 'nullable|exists:types,id',
            'description' => 'required',
            'link_repository' => 'required',
            'link_image' => 'nullable|image|max:4096',
            'developers' => 'required',
        ], [
            'title.required' => 'Il titolo deve essere inserito',
            'title.min' => 'Il titolo deve avere :min caratteri',
            'type_id.exists' => 'Il tipo deve essere presente nel nostro sito',
            'description.required' => 'La descrizione deve essere inserita',
            'link_repository.required' => 'Questo campo non può rimanere vuoto',
            'link_image.max' => "La dimensione del file è troppo grande",
            'link_image.image' => "Il file deve essere di tipo immagine",
            'developers.required' => 'Questo campo non può rimanere vuoto',

        ])->validate();

        return $validator;
    }
}
