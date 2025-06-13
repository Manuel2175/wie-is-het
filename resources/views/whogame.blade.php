@include('head')

@if(session('message'))
    <div class="bg-yellow-300 text-yellow-900 rounded-md p-3 mb-4">
        {{ session('message') }}
    </div>
@endif

@if(!$game)
    <h1>Er is geen game gevonden.</h1>
@elseif($game->player2Choice_id === null)
    <h1>Waiting for players...</h1>
    <script>
        setTimeout(() => location.reload(), 3000);
    </script>
@else
    <h2>Player found!</h2>

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
