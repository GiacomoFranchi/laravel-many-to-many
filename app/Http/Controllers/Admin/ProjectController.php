<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Tecnology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Mostro 5 project per pagina
        $perPage = 5;
        if($request->per_page){
            $perPage= $request->per_page;
        }
        
        $projects = Project::all(); //
        $projects=Project::paginate($perPage);
        
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $tecnologies=Tecnology::all();
        return view('admin.projects.create', compact('types', 'tecnologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->validated();
        $project = new Project();
        $project->fill($form_data);

        //controllo se c'è img e aggiungo al db
        if($request->hasFile('img')){
            $path = Storage::put('image', $request->img);
            $project->img = $path;   
        }

        $project->save();

        if($request->has('tecnologies')){
            $project->tecnologies()->attach($request->tecnologies);
        }
        return redirect()->route('admin.projects.show', ['project' => $project->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //$project = Project::where('slug', $project->slug)->first();
        $types= Type::all();
        $tecnologies= Tecnology::all();
        return view('admin.projects.edit', compact('project', 'types', 'tecnologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Project $project               
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->validated();
        //$project_to_update = Project::where('slug', $project->slug)->first();

        if($request->hasFile('img')) {
            if($project->img) {
                Storage::delete($project->img);
            }

            $path = Storage::put('image', $request->img);
            $form_data['img'] = $path;
        }


        $project->update($form_data);

        if($request->has('tecnologies')){
            $project->tecnologies()->sync($request->tecnologies);
        } else{
            $project->tecnologies()->sync([]);
        }

        return redirect()->route('admin.projects.show', ['project' => $project->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //$project = Project::where('slug', $project->slug)->first();
        $project->delete();
        Storage::delete($project->img);

        return redirect()->route('admin.projects.index')->with('message', 'Il progetto "' . $project->title .'" è stato rimosso');
    }
}
