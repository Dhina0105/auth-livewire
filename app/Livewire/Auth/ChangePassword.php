<?php


namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\PasswordHistroy;

class ChangePassword extends Component
{
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    protected $rules = [
        'current_password' => 'required',
        'new_password' => 'required|min:6|confirmed',
    ];

    public function changePassword()
    {
        $this->validate();

        $user = Auth::user();


        if (!Hash::check($this->current_password, $user->password)) {
            $this->addError('current_password', 'Current password is incorrect.');
            return;
        }


        $lastPasswords = PasswordHistroy::where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->take(3)
            ->pluck('password');

        foreach ($lastPasswords as $oldPassword) {
            if (Hash::check($this->new_password, $oldPassword)) {
                $this->addError('new_password', 'You cannot reuse your last 3 passwords.');
                return;
            }
        }

        PasswordHistroy::create([
            'user_id' => $user->id,
            'password' => $user->password,
        ]);

        $user->update([
            'password' => Hash::make($this->new_password),
        ]);

        session()->flash('message', 'Password changed successfully!');
        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
    }

    public function render()
    {
        return view('livewire.auth.change-password');
    }
}




