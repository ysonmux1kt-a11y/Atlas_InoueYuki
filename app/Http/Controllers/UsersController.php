<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function search(Request $request){
        $keyword = $request->input('keyword');

        $query = User::query()
            ->where('id','!=',Auth::id()); // 自分を除外
        // keywordが空でなければ部分一致検索
        if(!empty($keyword)){
            $query->where('username','like','%'.$keyword.'%');
        }
        // 取得
        $users = $query->orderBy('username','asc')->get();

        return view('users.search',[
            'users' => $users,
            'keyword' => $keyword,
        ]);
    }

    public function follow(User $user){
        // 自分自身をフォローさせない
        if($user->id === Auth::id()){
            return back();
        }

        // 二重登録防止
        Auth::user()->follows()->syncWithoutDetaching([$user->id]);
            return back();
    }

    public function unfollow(User $user){
        Auth::user()->follows()->detach($user->id);
            return back();
    }
}
