@include('head')
@include('game-head')
<form method="POST" action="{{ route('game.store') }}" onsubmit="return validateSelection()">
    @csrf



{{--allen de $characters--}}
    <x-character-grid :characters="$characters" />



    <button
        type="submit"
        class="mt-6 px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
    >
        Start game
    </button>
</form>

<script>
    function validateSelection() {
        const selected = document.getElementById('player1Choice').value;
        if (!selected) {
            alert("Selecteer eerst een personage!");
            return false;
        }
        return true;
    }
</script>
