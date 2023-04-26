<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Profile extends Component
{
    public User $user;

    protected $rules = [
        'user.name' => ['required'],
        'user.email' => ['required', 'email'],
        'user.phone_number' => ['required'],
    ];

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.profile');
    }

    public function save()
    {
        $this->validate();

        $this->user->save();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Success!',
            'text' => 'Profile updated successfully!',
            'icon' => 'success',
        ]);
    }
}
