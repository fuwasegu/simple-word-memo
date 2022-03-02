@extends('layout.common')

@section('title', 'プロフィール')

@include('layout.header', ['user' => $user])

@section('content')
<table class="table-auto">
    <tbody>
    <tr>
        <td class="border px-4 py-2">Name</td>
        <td class="border px-4 py-2">{{ $user->name() }}</td>
    </tr>
    <tr class="bg-gray-100">
        <td class="border px-4 py-2">Email</td>
        <td class="border px-4 py-2">{{ $user->email() }}</td>
    </tr>
    </tbody>
</table>
@endsection

@include('layout.footer')
