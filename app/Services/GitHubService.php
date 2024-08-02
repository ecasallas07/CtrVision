<?php


namespace App\Services;
use Illuminate\Support\Facades\Http;


class GitHubService
{
    // TODO: repair variables enviorement
    // protected $token= env('TOKEN_GIT');


    public function show_repositories($username)
    {
        $data = Http::get("https://api.github.com/users/{$username}/repos",[
            'headers'=> [
                'Authorization' => "token {$this->token}",
                'Accept'        => 'application/vnd.github.v3+json',
            ]
        ]);
        $info = $data->json();
        return $info;
    }







}
