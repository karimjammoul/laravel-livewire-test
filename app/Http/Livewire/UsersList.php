<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;

    public function render()
    {
        $data = [];
        $users = User::paginate(10);
        $data['users'] = $users;

        return view('livewire.users-list', $data);
    }
}
