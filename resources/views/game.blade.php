@include('head')

<form method="POST" action="{{ route('game.store') }}" onsubmit="return validateSelection()">
    @csrf
    <select id="person" name="player1Choice" size="24" required>
        @foreach ($characters as $character)
            <option value="{{ $character->id }}">{{ $character->name }}</option>
        @endforeach
    </select>
    <button type="submit">Start game</button>
</form>

<script>
    function validateSelection() {
        const select = document.getElementById('person');
        return select.value !== "";
    }
</script>
