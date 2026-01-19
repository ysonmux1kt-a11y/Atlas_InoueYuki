<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd('login POST OK', $request->all());

        $request->validate([
            'username' => 'required|min:2|max:12',
            'email' => 'required|min:6|max:40|unique:users,email',
            'password' => 'required|alpha_num|min:2|max:20',
            'password_confirmation' => 'required|alpha_num|min:2|max:20|same:password',
        ]);

        //  dd('validation OK');

        $user=User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);//登録完了ページでAuth::user()を使えるようにする

        return redirect('added');
    }

    public function added(): View
    {
        return view('auth.added',[
            'user' => Auth::user(),
        ]);
        //現在ログインしているユーザーを取得 $userとしてViewに渡す
    }
}
