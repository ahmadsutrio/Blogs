<?php

namespace App\Livewire;

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class Login extends Component
{
    public $email,$password;
    public function render()
    {
        return view('livewire.login');
    }

    public function rules()
    {
        return [
            'email' => ['required'],
            'password' => ['required']
        ];
    }

    public function showPassword(){
        
    }

    public function login(){
        $validate = $this->validate();
        $cekUser = LoginController::store($validate);
        if(!$cekUser){
            return $this->redirectRoute('login.index',navigate:true);
        }
         return $this->redirectRoute('home.index',navigate:true);

    }
}
