<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class UpdatePassword extends Component
{

    public User $user;
    public $current_password;
    public $password;
    public $password_confirmation;

    public function rules()
    {
        return [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ];
    }

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.update-password');
    }

    public function updatePassword()
    {
        $this->validate();

        $this->password = Hash::make($this->password);

        auth()->user()->update([
            'password' => $this->password,
        ]);

        $this->reset(['current_password', 'password', 'password_confirmation']);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Success!',
            'text' => 'Password updated successfully!',
            'icon' => 'success',
        ]);
    }
}
