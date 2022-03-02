@extends('layout.common')

@section('title', 'ログイン')

@include('layout.header')

@section('content')
<div class="flex justify-center flex-col">
    <div class="flex justify-center font-kingdom text-256px">
        Zeus
    </div>
    <div class="flex justify-center text-24px">
        <p>
            マルチタスクワーカーのための総合タスク管理ツール
        </p>
    </div>
    <div class="flex justify-center  mt-16">
        <button class="bg-gray-300 hover:bg-gray-800 text-gray-800 hover:text-white font-bold py-2 px-4 rounded inline-flex items-center" onclick="location.href='{{ url('login') }}'">
            <svg class="h-8 w-8 text-red-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M17.788 5.108A9 9 0 1021 12h-8" /></svg>
            <span> でログイン</span>
        </button>
    </div>
</div>
@endsection

@include('layout.footer')
