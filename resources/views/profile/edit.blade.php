<x-layouts.app>

    <div class="max-w-7xl mx-auto space-y-6">
        
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Edit Your Profile</h2>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

        
    </div>
</x-layouts.app>