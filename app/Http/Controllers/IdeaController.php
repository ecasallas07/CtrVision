<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class IdeaController extends Controller
{
    public function index()
    {
        $idea = Idea::all();
        return view('ideas')->with('idea', $idea);
    }

    public function create(Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required',
                'tag' => 'required',
                'tool' => 'required',
                'description' => 'required',
                'user_id' => 'required',
            ]
        );
        $data= Idea::create($data);

        return redirect('/ideas');
    }



    public function edit(Request $request,string $id)
    {

        $idea = Idea::find($id);
        dd($idea);
        $idea->update($request->all());
        return redirect('/ideas');
    }

    public function update(Request $request, $id)
    {
        $idea = Idea::find($id);

        if (isset($idea)){
            $idea->title = $request->title;
            $idea->description = $request->description;
            $idea->tag = $request->tag;
            $idea->tools = $request->tools;

            $idea->save();
            return redirect('/ideas');
        }else{
            return redirect('/ideas');
        }
    }

    public function delete(Request $request,Idea $id)
    {
        $id->delete();
        return redirect('/ideas');
    }


}
