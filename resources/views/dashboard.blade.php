@include('head')
@include('header')

@if(auth()->user())
    <section class="flex flex-col items-center gap-8 py-10 min-w-96">

        <div class="p-6 bg-yellow-500 bg-opacity-[30%] border-4 border-black rounded-2xl shadow-xl text-center font-bold text-white w-full max-w-xl">

            <h2 class="text-5xl font-extrabold text-white mb-6">
                {{ $user->username }}
            </h2>

            <div class="text-lg mb-4">
                <p class="text-white drop-shadow-md">Email</p>
                <p class="text-xl text-black">{{ $user->email }}</p>
            </div>

            <div class="text-lg mb-4">
                <p class="text-white drop-shadow-md">Matches Played</p>
                <p class="text-xl text-black">{{ $user->wins + $user->losses }}</p>
            </div>

            <div class="text-lg mb-4">
                <p class="text-white drop-shadow-md">Wins</p>
                <p class="text-xl text-black">{{ $user->wins }}</p>
            </div>

            <div class="text-lg mb-6">
                <p class="text-white drop-shadow-md">Losses</p>
                <p class="text-xl text-black">{{ $user->losses }}</p>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white py-2 px-6 rounded-full text-lg border-2 border-black shadow-md transition duration-200">
                    Logout
                </button>
            </form>
        </div>

        <a
            href="/game"
            onclick="localStorage.clear();"
            class="bg-green-600 hover:bg-green-700 text-white py-3 px-10 rounded-full text-xl font-semibold border-2 border-black shadow-lg transition duration-200"
        >
            Game
        </a>

    </section>
@endif

@include('footer')
