@props(['characters'])

<!-- Verborgen input in component opnemen -->
<input type="hidden" name="player1Choice" id="player1Choice" required />

<div id="characterGrid" class="grid grid-cols-6 gap-4">
    @foreach ($characters as $character)
        <button
            type="button"
            class="character-tile border p-2 rounded hover:bg-yellow-100 focus:outline-none"
            data-id="{{ $character->id }}"
            onclick="selectCharacter(this)"
        >
            <img
                src="{{ asset('storage/' . $character->img) }}"
                alt="{{ $character->name }}"
                class="w-24 h-24 object-cover mx-auto mb-2 rounded"
            />
            <p class="text-sm text-center">{{ $character->name }}</p>
        </button>
    @endforeach
</div>

<script>
    function selectCharacter(button) {
        document.querySelectorAll('.character-tile').forEach(btn =>
            btn.classList.remove('ring', 'ring-4', 'ring-green-500')
        );
        button.classList.add('ring', 'ring-4', 'ring-green-500');
        const characterId = button.getAttribute('data-id');
        document.getElementById('player1Choice').value = characterId;
    }
</script>
