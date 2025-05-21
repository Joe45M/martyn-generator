<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class AssignRepo extends Component
{

    public $repositories;
    public $results;

    public $query;
    public $searchResults;

    public function render()
    {
        return view('livewire.assign-repo', [
            'hasToken' => auth()->user()->github_token ? true : false,
        ]);
    }

    public function init()
    {
        $result = Http::withHeaders([
            'Authorization' => 'Bearer ' . auth()->user()->github_token,
        ])
            ->get('https://api.github.com/user/repos')
            ->json();

        $this->results = collect($result)->map(function ($repo) {
            return [
                'name' => $repo['name'],
                'url' => $repo['html_url'],
            ];
        });
    }

    public function search()
    {
        $results = $this->results->filter(function ($repo) {
            return str_contains($repo['name'], $this->query);
        });

        $this->searchResults = $results;

        $this->render();
    }

    public function setRepo(string $repo)
    {
        $this->query = $repo;

        $this->render();
    }
}
