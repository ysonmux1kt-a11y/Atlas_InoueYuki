<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => ['required','string', 'min:2','max:12'],
            'email' => ['required','string', 'email', 'min:5','max:40', Rule::unique(User::class)->ignore($this->user()->id)],
            'password' => ['required','alpha_num','min:8','max:20', 'confirmed'],
            // 自己紹介
            'bio' => ['nullable', 'string', 'max:150'],
            'icon_image' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,bmp,gif,svg',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'ユーザー名は必須です。',
            'username.min' => 'ユーザー名は2文字以上で入力してください。',
            'username.max' => 'ユーザー名は12文字以内で入力してください。',

            'email.required' => 'メールアドレスは必須です。',
            'email.email' => 'メールアドレスの形式が正しくありません。',
            'email.unique' => 'そのメールアドレスは既に使用されています。',
            'email.min' => 'メールアドレスは5文字以上で入力してください。',
            'email.max' => 'メールアドレスは40文字以内で入力してください。',

            'password.required' => 'パスワードは必須です。',
            'password.alpha_num' => 'パスワードは英数字のみで入力してください。',
            'password.min' => 'パスワードは8文字以上で入力してください。',
            'password.max' => 'パスワードは20文字以内で入力してください。',
            'password.confirmed' => 'パスワード確認が一致しません。',

            'bio.max' => '自己紹介は150文字以内で入力してください。',

            'icon_image.mimes' => '画像は jpg / png / bmp / gif / svg のみアップロード可能です。',
        ];

        // return redirect()->route('profile.edit')->with('success', 'プロフィールを更新しました。');
    }





}
