@include('head')
<header class="bg-blue-800 p-4 flex justify-between items-center text-center mb-10">
   @if(auth()->user())
    <x-app-layout>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-app-layout>
    @endif
</header>
