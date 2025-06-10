@include("head")
@include("header")
@if(!auth()->user())
<a class="m-6 p-5 text-5xl border-black border-solid border-2 rounded-3xl shadow-sm" href="/login">
    Login
</a>
<a class="p-5 text-5xl border-black border-solid border-2 rounded-3xl shadow-sm" href="/register">
    Register
</a>
@else
    <a class="p-5 text-5xl border-black border-solid border-2 rounded-3xl shadow-sm" href="/dashboard">
        Account
    </a>
@endif
@include("footer")
