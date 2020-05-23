<div class="w-full min-h-screen lg:static lg:max-h-full lg:overflow-visible lg:w-3/4 xl:w-4/5">
    <div class="flex">
        <div class="w-full pt-16 pb-16">
            <div class="flex">
                <div class="w-full max-w-3xl px-6 mx-auto markdown xl:px-12 lg:ml-0 lg:mr-auto xl:mx-0 xl:w-3/4">
                    @yield('content')
                </div>
                <div class="hidden xl:text-sm xl:block xl:w-1/4 xl:px-6">
                    <div
                        class="flex flex-col justify-between overflow-y-auto sticky top-16 max-h-(screen-16) pt-12 pb-4 -mt-12">
                        <div class="h-screen bg-green-100">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>