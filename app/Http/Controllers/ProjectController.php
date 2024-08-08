<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects')->with('projects', $projects);
    }

    public function create_view()
    {
        return view('create_project');
    }

    public function create(Request $request)
    {
        $validate = $request->validate(
            [
                'title'=> 'required|max:100',
                'description'=> 'required|string|max:255',
                'stack' => 'required|string',
                'link_repo' => 'required|string',
                'activity'=> 'required|max:255|string',
                'user_id' => 'required'
                ]
            );
        $data= Project::create($validate);

        return redirect('/projects');
    }


    public function edit(Request $request,string $id)
    {

        $project = Project::find($id);
        dd($project);
        $project->update($request->all());
        return redirect()->route('project.view');
    }

    public function update(Request $request, $id)
    {
        $project = Project::find($id);

        if (isset($project)){
            $project->title = $request->title;
            $project->description = $request->description;
            $project->stack = $request->stack;
            $project->link = $request->link;
            $project->activities = $request->activities;
            $project->save();
            return redirect()->route('project.view');
        }else{
            return redirect('/projects');
        }
    }

    public function delete(Request $request,Project $id)
    {
        dd($id);
        $id->delete();
        return redirect()->route('project.view');
    }
}
