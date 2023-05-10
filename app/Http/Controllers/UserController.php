<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request) {
        $inputFields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required',
        ]);

        if (auth()->attempt(['name' => $inputFields['loginname'], 'password' => $inputFields['loginpassword']])) {
            $request->session()->regenerate();
        }
         
        return redirect('/');
    }

    public function logout() {
        auth()->logout();

        return redirect('/');
    }

    public function register(Request $request) {
        $inputFields = $request -> validate([
            'name' => ['required', 'min:3', 'max: 15', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max: 50'],
        ]);

        $inputFields['password'] = bcrypt($inputFields['password']);
        $user = User::create($inputFields);
        auth()->login($user);

        return redirect('/');
    }
}
