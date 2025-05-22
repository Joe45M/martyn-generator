<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminUsers extends Component
{
    public function render()
    {

        $query = User::query();

        return view('livewire.admin.admin-users', [
            'users' => $query->paginate(10),
        ]);
    }
}
