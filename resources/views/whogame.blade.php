@include('head')

@if(session('message'))
    <div class="bg-yellow-300 text-yellow-900 rounded-md p-3 mb-4">
        {{ session('message') }}
    </div>
@endif


@if(!$game)
    <h1>Er is geen game gevonden.</h1>
@elseif($game->player2Choice_id === null)
    <h1>waiting for players.</h1>
    <script>
        setTimeout(() => location.reload(), 3000);
    </script>
@else
    <h2>player found</h2>

    <form method="POST" action="{{ route('guess') }}">
        @csrf
        <select id="person" name="player1Choice" size="24" required>
            @foreach ($characters as $character)
                <option value="{{ $character->id }}">{{ $character->name }}</option>
            @endforeach
        </select>
        <button type="submit">guess</button>
    </form>
@endif
