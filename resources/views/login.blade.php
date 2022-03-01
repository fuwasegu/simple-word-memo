@extends('layout.common')

@section('title', 'ログイン')

@include('layout.header')

@section('content')
<div class="flex justify-center">
    <h1 class="">
        シンプルな単語帳
    </h1>
    <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
        <svg class="h-8 w-8 text-red-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M17.788 5.108A9 9 0 1021 12h-8" /></svg>
        <span> でログイン</span>
    </button>
</div>
@endsection

@include('layout.footer')
