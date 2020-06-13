<div class="w-full min-h-screen lg:static lg:max-h-full lg:overflow-visible">
    <div class="flex">
        <div class="w-full py-6">
            <div class="flex">
                {{-- <div class="hidden md:text-sm md:block md:w-1/4 md:px-6">
                    <div
                        class="flex flex-col justify-between overflow-y-auto sticky top-16 max-h-(screen-16) pt-12 pb-4 -mt-12">
                        <div class="h-screen">
                            @yield('left-sidebar')
                        </div>
                    </div>
                </div> --}}
                <div class="w-full max-w-4xl px-6 mx-auto xl:px-6 lg:ml-0 lg:mr-auto xl:mx-0">
                    @yield('content')
                </div>
                <div class="hidden xl:text-sm xl:block xl:w-1/4 xl:px-6">
                    <div
                        class="flex flex-col justify-between overflow-y-auto sticky top-16 max-h-(screen-16) pt-12 pb-4 -mt-12">
                        <div class="h-screen bg-red-800">
                            @yield('right-sidebar')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>