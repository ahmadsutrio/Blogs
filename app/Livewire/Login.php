<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\LoginController;

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
            Alert::error('Gagal', 'Gagal Login');
            return $this->redirectRoute('login.index',navigate:true);
        }
        Alert::success('Berhasil', 'Berhasil Login');
         return $this->redirectRoute('home.index',navigate:true);

    }
}
