<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * 新規登録画面表示
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * 新規登録処理
     */
    public function store(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'username' => 'required|min:2|max:12',
            'email' => 'required|email|min:5|max:40|unique:users,email',
            'password' => 'required|alpha_num|min:8|max:20',
            'password_confirmation' => 'required|same:password',
        ]);

        // ユーザー作成
        $user = User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // 自動ログインはしない
        // Auth::login($user);

        // ユーザー名だけを flash セッションで渡す
        return redirect()
            ->route('added')
            ->with('username', $user->username);
    }

    /**
     * 登録完了画面
     */
    public function added(): View
    {
        return view('auth.added', [
            'username' => session('username'),
        ]);
    }
}
