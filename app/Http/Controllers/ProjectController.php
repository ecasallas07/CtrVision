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
                'title'=> 'required|string|max:100',
                'description'=> 'required|string|255',
                'stack' => 'required|string',
                'link' => 'required|string',
                'activities'=> 'required|255|string'
            ]
        );

        Project::create($validate);
        return redirect('/projects');
    }


    public function modal_edit($id)
    {
        $project_specific = Project::find($id);
        return view('project.edit.modal')->with('project_specific', $project_specific);
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
}
