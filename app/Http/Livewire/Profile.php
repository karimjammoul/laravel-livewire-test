<?php

namespace App\Http\Livewire;

use App\Models\Department;
use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Profile extends Component
{
    public User $user;

    protected $rules = [
        'user.name' => ['required'],
        'user.email' => ['required', 'email'],
        'user.phone_number' => ['required'],
        'user.gender_id' => ['required'],
        'user.department_id' => ['required'],
        'user.role_id' => ['required'],
    ];

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        $data = [];

        $genders = Gender::all();
        $data['genders'] = $genders;

        $departments = Department::all();
        $data['departments'] = $departments;

        $roles = Role::all();
        $data['roles'] = $roles;

        return view('livewire.profile', $data);
    }

    public function save()
    {

        if (! Gate::allows('edit-profile', $this->user) ) {
            abort(404);
        }

        $this->validate();

        $this->user->save();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Success!',
            'text' => 'Profile updated successfully!',
            'icon' => 'success',
        ]);
    }
}
