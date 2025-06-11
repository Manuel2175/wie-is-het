@include('head')
@include('header')
@if(auth()->user())
    <section>
        <div class=" p-6 bg-yellow-500 bg-opacity-[30%] border-4 border-black rounded-2xl shadow-xl text-center font-bold text-white">

            <h2 class="text-outline text-5xl font-extrabold text-white">
                {{ $user->username }}
            </h2>


            <div class="text-lg text-white drop-shadow-md mb-2">
                Email<br>
                <span class="text-xl text-black">{{ $user->email }}</span>
            </div>

            <div class="text-lg text-white drop-shadow-md mb-2">
                Matches played<br>
                <span class="text-xl text-black">{{ $user->wins + $user->losses }}</span>
            </div>

            <div class="text-lg text-white drop-shadow-md mb-2">
                Wins<br>
                <span class="text-xl text-black">{{ $user->wins }}</span>
            </div>

            <div class="text-lg text-white drop-shadow-md mb-6">
                Loses<br>
                <span class="text-xl text-black">{{ $user->losses }}</span>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white py-2 px-6 rounded-full text-lg border-2 border-black shadow-md">
                    Logout
                </button>
            </form>
        </div>
    </section>
@endif
@include('footer')
