<?php

namespace App\Http\Livewire;

use App\Models\Department;
use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;

    public User $user;

    public bool $showModal = false;

    public string $password = '';
    public string $password_confirmation = '';

    protected $listeners = ['delete'];

    public function rules()
    {
        return [
            'user.name' => ['required'],
            'user.email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user->id)],
            'user.phone_number' => ['required'],
            'user.gender_id' => ['required'],
            'user.department_id' => ['required'],
            'user.role_id' => ['required'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ];
    }

    public function render()
    {
        $data = [];

        $users = User::paginate(10);
        $data['users'] = $users;

        $genders = Gender::all();
        $data['genders'] = $genders;

        $departments = Department::all();
        $data['departments'] = $departments;

        $roles = Role::all();
        $data['roles'] = $roles;

        return view('livewire.users-list', $data);
    }

    public function openModal()
    {
        $this->showModal = true;

        $this->user = new User();
    }

    public function save()
    {
        $this->validate();

        $this->user->password = Hash::make($this->password);
        $this->user->save();

        $this->resetValidation();
        $this->reset('showModal');

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Success!',
            'text' => 'User saved successfully!',
            'icon' => 'success',
        ]);
    }

    public function editUser(User $user)
    {
        $this->resetValidation();

        $this->showModal = true;

        $this->reset(['password', 'password_confirmation']);
        $this->user = $user;
    }

    public function deleteConfirm($method, $id = null)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type'   => 'warning',
            'title'  => 'Are you sure?',
            'text'   => '',
            'id'     => $id,
            'method' => $method,
        ]);
    }

    public function delete(User $user)
    {
        $user->delete();
    }
}
