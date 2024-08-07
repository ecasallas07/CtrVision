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
        // dd($request);
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
        // dd($data);
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

    public function delete($id)
    {
        $project = Project::deleted($id);
        return $project;
    }
}
