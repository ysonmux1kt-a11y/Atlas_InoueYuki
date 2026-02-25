<?php

return [

    /*
    |-----------------------
    | バリデーションメッセージ
    |-----------------------
    */

    'required' => ':attribute は必須項目です。',
    'email'    => ':attribute の形式が正しくありません。',
    'alpha_num'=> ':attribute は英数字で入力してください。',
    'min' => [
        'string' => ':attribute は :min 文字以上で入力してください。',
    ],
    'max' => [
        'string' => ':attribute は :max 文字以内で入力してください。',
    ],
    'same' => ':attribute が一致していません。',

    /*
    |-----------------
    | 属性名の日本語化
    |-----------------
    */

    'attributes' => [
        'username' => 'ユーザー名',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'password_confirmation' => 'パスワード確認',
    ],
];
