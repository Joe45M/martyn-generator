<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminUsers extends Component
{

    public $name;
    public $email;

    public function render()
    {

        $query = User::query();

        return view('livewire.admin.admin-users', [
            'users' => $this->search(),
        ]);
    }

    public function search(): \Illuminate\Pagination\LengthAwarePaginator
    {
        $query = User::query();

        if ($this->name) {
            $query->where('name', 'like', '%' . $this->name . '%');
        }

        if ($this->email) {
            $query->where('email', 'like', '%' . $this->email . '%');
        }

        return $query->orderBy('name')->paginate(10);
    }
}
