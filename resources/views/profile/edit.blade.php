@include("head")
@include("header")
<div class="min-h-screen bg-gray -100 py-12 flex flex-col items-center">
    <h1 class="text-[40px] font-bold mb-10 text-blue-800">Profielinstellingen</h1>

    <div class="w-full  max-w-4xl flex flex-col gap-8 px-4">
        <!-- Update Profile Info -->
        <div class="bg-blue-900 p-6 rounded-2xl shadow-xl border border-blue-200">
            <h2 class="text-2xl font-semibold text-white  mb-4">Profielgegevens bijwerken</h2>
            @include('profile.partials.update-profile-information-form')
        </div>

        <!-- Update Password -->
        <div class="bg-blue-900 p-6 rounded-2xl shadow-xl border border-blue-200">
            <h2 class="text-2xl font-semibold text-white  mb-4">Wachtwoord wijzigen</h2>
            @include('profile.partials.update-password-form')
        </div>

        <!-- Delete User -->
        <div class="bg-white p-6 rounded-2xl shadow-xl border border-red-300">
            <h2 class="text-2xl font-semibold text-red-700 mb-4">Account verwijderen</h2>
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>

@include("footer")
