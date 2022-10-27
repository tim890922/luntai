<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showLoginPage()
    {
        return view('login');
    }

    public function login(Request $request)
    {

        $userData = Employee::where("account", $request->account)->get();
        // dd($userData[0]->pass_word);
        if (!isset($userData[0]->name)) {

            return view('login', ['err' => "使用不存在"]);
        } elseif (password_verify($request->pass_word, $userData[0]->pass_word)) {
            session(['username' => $userData[0]->name]);
            return redirect('/');
        } else {

            return view('login', ['err' => "密碼錯誤"]);
        }
    }

    public function logout()
    {
        session()->forget('username');
        return redirect('/');
    }
}
