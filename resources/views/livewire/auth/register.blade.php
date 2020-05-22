<div class="flex max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg lg:max-w-4xl">
    <div class="hidden bg-cover lg:block lg:w-1/2"
        style="background-image: url('https://source.unsplash.com/Kt-E_Qq8DW4/896x1016');">
    </div>
    <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">
        <form wire:submit.prevent="register" action="#" method="POST">
            <h2 class="text-2xl font-semibold text-center text-gray-700">TALL</h2>
            <p class="text-xl text-center text-gray-600">Register with us!</p>

            <div class="mt-8">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">Email Address</label>
                <input type="email" wire:model.lazy="email" id="email" autofocus
                    class="@error('email') border-red-500 @enderror block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded appearance-none focus:outline-none focus:bg-gray-100">
                @error('email') <div class="mt-1 text-sm text-red-500">{{ $message }}</div> @enderror
            </div>
            <div class="mt-4">
                <div class="flex justify-between">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="password">Password</label>
                </div>
                <input type="password" wire:model.lazy="password" id="password"
                    class="@error('password') border-red-500 @enderror block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded appearance-none focus:outline-none focus:bg-gray-100">
                @error('password') <div class="mt-1 text-sm text-red-500">{{ $message }}</div> @enderror
            </div>
            <div class="mt-2">
                <div class="flex justify-between">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="passwordConfirmation">Confirm
                        Password</label>
                </div>
                <input type="password" wire:model.lazy="passwordConfirmation" id="passwordConfirmation"
                    class="@error('passwordConfirmation') border-red-500 @enderror block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded appearance-none focus:outline-none focus:bg-gray-100">
            </div>
            <div class="mt-8">
                <button
                    class="w-full px-4 py-2 font-bold text-white bg-gray-700 rounded hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                    Register
                </button>
            </div>
            <div class="flex items-center justify-between mt-4">
                <span class="w-1/5 border-b md:w-1/4"></span>
                <a href="{{ route('auth.login') }}" class="text-xs text-gray-500 uppercase hover:underline">
                    or login
                </a>
                <span class="w-1/5 border-b md:w-1/4"></span>
            </div>
        </form>
    </div>
</div>