@include("head")
@include("header")
@if(!auth()->user())
    <a class="m-4 inline-flex h-20 min-w-[250px] items-center justify-center px-10 text-3xl font-semibold border-2 border-black rounded-3xl shadow-md transition active:scale-95 hover:shadow-lg" href="/login">
        Login
    </a>

    <a class="m-4 inline-flex h-20 min-w-[250px] items-center justify-center px-10 text-3xl font-semibold border-2 border-black rounded-3xl shadow-md transition active:scale-95 hover:shadow-lg" href="/register">
        Register
    </a>

@else
    <a class="m-4 inline-flex h-20 min-w-[250px] items-center justify-center px-10 text-3xl font-semibold border-2 border-black rounded-3xl shadow-md transition active:scale-95 hover:shadow-lg" href="/dashboard">
        Account
    </a>
@endif


@include("footer")
