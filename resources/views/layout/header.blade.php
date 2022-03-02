@section('header')
<nav class="bg-slate-800 flex justify-between px-10 items-center pt-4">
    <div>
        <a href="{{ url('/') }}" class="flex items-center space-x-2">
            <h1 class="text-white font-bold text-48px cursor-pointer font-kingdom">Zeus</h1>
        </a>
    </div>
    <div class="flex items-center space-x-8 font-bold text-white">
        @if(!empty($user))
        <span><a href="{{ url('profile') }}">{{ $user->email() }} でログイン中</a></span>
        <a href="{{ url('logout') }}">ログアウト</a>
        @endif
        <!--span class="cursor-pointer text-lg">Hone</span-->
        <!--span class="cursor-pointer text-lg">About</span-->
    </div>
</nav>
@endsection
