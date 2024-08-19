<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GitHubService;

class GitHubController extends Controller
{
    public function show()
    {
        // dd(10);
        $github = new GitHubService();

        $data = $github->show_repositories('ecasallas07');

        return view('repositories',)->with('data', $data);
    }

}
