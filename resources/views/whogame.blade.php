@include('head')
@include('game-head')

@if(!$game)
    <h1>No Game found</h1>
    <a class="m-4 inline-flex h-20 min-w-[250px] items-center justify-center px-10 text-3xl font-semibold border-2 border-black rounded-3xl shadow-md transition active:scale-95 hover:shadow-lg" href="/">
        Home
    </a>

@elseif($game->player2Choice_id === null)

    <div class=".loading-text-wait">
        <div class="loading-text">
            <span>Waiting for players</span>
            <span class="dot">.</span>
            <span class="dot">.</span>
            <span class="dot">.</span>
        </div>
    </div>

    <script>
        setTimeout(() => location.reload(), 3000);
    </script>
@else

    <div class="center-wrapper pb-6">
            <div class=".loading-text-found">
                <span>Player found</span>
                <span class="dot">!</span>
                <span class="dot">!</span>
                <span class="dot">!</span>
            </div>
        </div>


    @if(session('message'))
        <div class="bg-yellow-200 text-black text-center px-4 py-2 rounded mb-4 max-w-md mx-auto">
            {{ session('message') }}
        </div>
    @endif



    <form method="POST" action="{{ route('guess') }}">
        @csrf

{{--$characters grid met afstreepen--}}
        <x-character-grid :characters="$characters" :markable="true" />



        <button
            type="submit"
            class="mt-6 px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
        >
            Guess
        </button>
    </form>
@endif
