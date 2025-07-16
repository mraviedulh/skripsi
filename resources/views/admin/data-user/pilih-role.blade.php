@include('admin.layout.header')
@include('admin.layout.sidebar')

<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
    @include('admin.layout.navbar')

    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="dark:text-white">Tambah Pengguna Baru: Pilih Role</h6>
                        <p class="mt-1 text-sm leading-normal">Pilih jenis pengguna yang ingin Anda tambahkan.</p>
                    </div>
                    <div class="flex-auto p-6">
                        <div class="flex flex-wrap -mx-3 text-center">
                            <div class="w-full max-w-full px-3 mb-6 md:w-1/2 md:flex-none">
                                <a href="#">
                                    <div class="border-black/12.5 hover:shadow-soft-2xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border p-8">
                                        <div class="mb-4">
                                            <i class="text-5xl ni ni-hat-3 text-blue-500"></i>
                                        </div>
                                        <h5 class="mb-1 font-bold">Sebagai Santri</h5>
                                        <p class="text-sm leading-normal">Membuat user baru yang terhubung dengan data santri.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="w-full max-w-full px-3 md:w-1/2 md:flex-none">
                                <a href="#">
                                    <div class="border-black/12.5 hover:shadow-soft-2xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border p-8">
                                        <div class="mb-4">
                                            <i class="text-5xl ni ni-badge text-emerald-500"></i>
                                        </div>
                                        <h5 class="mb-1 font-bold">Sebagai Admin</h5>
                                        <p class="text-sm leading-normal">Membuat user baru yang terhubung dengan data admin.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.layout.footer')
    </div>
</main>


@include('admin.layout.script')