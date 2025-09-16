@include('santri.layout.header')



@include('santri.layout.sidebar')

<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
    <!-- Navbar -->
    @include('santri.layout.navbar')

    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex items-center justify-between">
                            <div>
                                <h6 class="text-lg font-semibold">Nama: Muhammad Raviedul Huda</h6>
                                <h6 class="mb-4 text-lg font-semibold">Nomor HP: 089654464668</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('santri.layout.footer')
</main>


@include('santri.layout.script')