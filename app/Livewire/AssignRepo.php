<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Livewire\Component;

class AssignRepo extends Component
{

    public Collection $results;

    public string $query;
    public Collection $searchResults;

    public function render(): View
    {
        return view('livewire.assign-repo', [
            'hasToken' => auth()->user()->github_token ? true : false,
        ]);
    }

    public function init(): void
    {
        $result = Http::withHeaders([
            'Authorization' => 'Bearer ' . auth()->user()->github_token,
        ])
            ->get('https://api.github.com/user/repos')
            ->json();

        $this->results = collect($result)->map(function ($repo) {

            if (isset($repo['name'])) {

                return [
                    'name' => $repo['name'],
                    'url' => $repo['html_url'],
                ];

            }
        });
    }

    public function search(): void
    {
        $results = $this->results->filter(function ($repo) {
            return str_contains($repo['name'], $this->query);
        });

        $this->searchResults = $results;

        $this->render();
    }

    public function setRepo(string $repo): void
    {
        $this->query = $repo;

        $this->render();
    }
}
