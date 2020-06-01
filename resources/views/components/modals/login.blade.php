<div x-show="loginmodal"
    class="fixed inset-x-0 bottom-0 z-50 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center">
    <div x-show="loginmodal" x-description="Background overlay, show/hide based on modal state."
        x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75" @click="loginmodal = false"></div>
    </div>

    <div x-show="loginmodal" x-description="Modal panel, show/hide based on modal state."
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="overflow-hidden transform bg-white rounded-lg shadow-xl transition-al sm:max-w-4xl sm:w-full"
        role="dialog" aria-modal="true" aria-labelledby="modal-headline">

        <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <span class="flex w-full mt-3 rounded-md shadow-sm sm:mt-0 sm:w-auto">
                <button @click="loginmodal = false" type="button"
                    class="inline-flex justify-center w-full text-base font-medium leading-6 text-gray-700 transition duration-150 ease-in-out hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue sm:text-sm sm:leading-5">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </span>
        </div>
        <div class="pb-4 bg-white sm:p-6 sm:pb-4">
            <x-login />
        </div>
    </div>
</div>