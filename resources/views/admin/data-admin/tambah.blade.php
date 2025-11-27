@include('admin.layout.header')
@include('admin.layout.sidebar')

<div class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68">

    @include('admin.layout.navbar')
    <!-- <div class="relative w-full mx-auto mt-60 "> -->
    <div class="w-full p-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
                    <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                        <div class="flex items-center">
                            <p class="mb-0">Tambah Data Admin</p>
                        </div>
                    </div>
                    <div class="flex-auto p-6">
                        <p class="leading-normal uppercase text-sm">Detail Admin</p>
                        <form action="{{ route('admin.data-admin.store') }}" method="POST">
                            @csrf
                            <div class="flex flex-wrap -mx-3">
                                <!-- Nama -->
                                <div class="w-full max-w-full px-3 md:w-6/12">
                                    <div class="mb-4">
                                        <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Nama</label>
                                        <input type="text" name="nama" value="{{ old('nama') }}"
                                            class="focus:shadow-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-700 outline-none transition-all placeholder-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>

                                <!-- NIS -->
                                <div class="w-full max-w-full px-3 md:w-6/12">
                                    <div class="mb-4">
                                        <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">NIP</label>
                                        <input type="text" name="nip" value="{{ old('nip') }}"
                                            class="focus:shadow-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-700 outline-none transition-all placeholder-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>

                                <!-- Tanggal Lahir -->
                                <div class="w-full max-w-full px-3 md:w-6/12">
                                    <div class="mb-4">
                                        <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}"
                                            class="focus:shadow-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-700 outline-none transition-all placeholder-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>

                                <!-- No HP -->
                                <div class="w-full max-w-full px-3 md:w-6/12">
                                    <div class="mb-4">
                                        <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">No HP</label>
                                        <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                                            class="focus:shadow-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-700 outline-none transition-all placeholder-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 text-right">
                                <button type="submit"
                                    class="inline-block px-6 py-2 font-bold text-white uppercase transition-all bg-blue-500 rounded-lg shadow-md hover:shadow-lg hover:-translate-y-1 active:opacity-85 text-sm">
                                    Simpan
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        @include('admin.layout.footer')
    </div>
</div>
@include('admin.layout.script')