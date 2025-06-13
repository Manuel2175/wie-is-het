<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="max-w-xl mx-auto mt-10 p-8 bg-white rounded-xl shadow-lg space-y-6">
        @csrf

        {{-- Profielfoto --}}
        <div>
            <x-input-label for="profilePic" :value="__('Profielfoto')" />
            <x-text-input id="profilePic" type="file" name="profilePic" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('profilePic')" class="mt-2" />
        </div>

        {{-- Naam --}}
        <div>
            <x-input-label for="name" :value="__('Naam')" />
            <x-text-input id="name" class="mt-1 block w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Gebruikersnaam --}}
        <div>
            <x-input-label for="username" :value="__('Gebruikersnaam')" />
            <x-text-input id="username" class="mt-1 block w-full" type="text" name="username" :value="old('username')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        {{-- Email --}}
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Wachtwoord --}}
        <div>
            <x-input-label for="password" :value="__('Wachtwoord')" />
            <x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Bevestig wachtwoord --}}
        <div>
            <x-input-label for="password_confirmation" :value="__('Bevestig wachtwoord')" />
            <x-text-input id="password_confirmation" class="mt-1 block w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        {{-- Acties --}}
        <div class="flex items-center justify-between pt-4">
            <a class="text-sm text-gray-600 hover:text-gray-900 underline" href="{{ route('login') }}">
                {{ __('Al geregistreerd?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Registreren') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
