@extends('layouts.login')

@section('page_css')
<link rel="stylesheet" href="{{ asset('css/pages/follow-list.css') }}">
@endsection

@section('content')
  @include('follows._list', [
    'title' => 'フォロワーリスト',
    'users' => $followers,
    'posts' => $posts
  ])
@endsection
