<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index() {
        return view("auth.login");
    }

    public function login(LoginRequest $request) {

        $data = [
            "email" => $request['email'],
            "password" => $request['password']
        ];

        if(Auth::attempt($data)) {
            return redirect()
                ->route("dashboard");
        } else {
            return back()->with("fail","Incorrect login or password");
        }
    }

    public function register_view() {
        return view("auth.register");
    }

    public function register(RegisterRequest $request) {
        $data = [
            "first_name" => $request['first_name'],
            "last_name" => $request['last_name'],
            "birth_date" => $request['birth_date'],
            "email" => strtolower($request['email']),
            "phone" => $request['phone'],
            "password" => Hash::make($request['password']),
            "isFavoriteSport" => $request['sport_favorite'] ? 1 : 0
        ];

        $register = User::create($data);
        if($register) {
            return redirect()
                ->route("index")
                ->with("success", "Account successfully created.");
        } else {
            return back()->with("fail", "Account was not created!");
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route("index");
    }
}
