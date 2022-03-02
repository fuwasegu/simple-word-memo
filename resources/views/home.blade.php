@extends('layout.common')

@section('title', 'ホーム')

@include('layout.header', ['user' => $user])

@section('content')
<div class="flex justify-center my-64">
    <p>
        コンテンツ
    </p>
</div>
@endsection

@include('layout.footer')
