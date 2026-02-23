<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Http\RedirectResponse;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Redirect;
// use Illuminate\View\View;

class ProfileController extends Controller
{
    public function profile(){
        $user = Auth::user();
        return view('profiles.profile',compact('user'));
    }

    public function edit(){
        $user = Auth::user();
        return view('profiles.edit',compact('user'));
    }

    public function update(ProfileUpdateRequest $request)
{
    // dd($request->file('icon_image'));

    $user = $request->user();

    $user->username = $request->username;
    $user->email = $request->email;
    $user->bio = $request->bio;
    $user->password = Hash::make($request->password);

    // 画像アップロード処理
    if ($request->hasFile('icon_image')) {
        $path = $request->file('icon_image')->store('icons', 'public');
        $user->icon_image = $path;
    }

    $user->save();

    return redirect()->route('profile.edit')
        ->with('success', 'プロフィールを更新しました。');
}
}
