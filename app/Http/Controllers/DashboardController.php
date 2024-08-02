<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GitHubService;

class DashboardController extends Controller
{
    public function index()
    {
        $github = new GitHubService();
        $count = 0;
        foreach ($github->show_repositories('ecasallas07') as $i)
        {
            $count+=1;
        }
        return view('dashboard')->with('count', $count);
    }
}
