@include('admin.layout.header')
@include('admin.layout.sidebar')

<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
    @include('admin.layout.navbar')

    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="dark:text-white">Formulir Tambah Data Santri Baru</h6>
                    </div>
                    <div class="flex-auto p-6">
                        <form role="form" action="{{ route('admin.users.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="role" value="{{ $role }}">

                            <p class="mb-4 text-sm leading-normal">Data login akan dibuat secara otomatis berdasarkan informasi di bawah ini.</p>

                            {{-- ================== DATA UMUM ================== --}}
                            <div class="mb-4">
                                <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Nama Lengkap</label>
                                <input type="text" name="nama" placeholder="Masukkan nama lengkap" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" required />
                            </div>
                            <div class="mb-4">
                                <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Tanggal Lahir (Password Otomatis)</label>
                                <input type="date" name="tgl_lahir" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" required />
                            </div>

                            @if($role == 'santri')
                            <hr class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
                            <h6 class="mb-4 font-bold text-slate-700">Data Spesifik Santri</h6>
                            <div class="mb-4">
                                <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">NIS (Username Otomatis)</label>
                                <input type="text" name="nis" placeholder="Masukkan Nomor Induk Santri" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                            </div>
                            <div class="mb-4">
                                <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Alamat</label>
                                <textarea name="alamat" rows="3" placeholder="Masukkan alamat lengkap santri" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none"></textarea>
                            </div>
                            <div class="mb-4">
                                <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">No. HP Orang Tua</label>
                                <input type="text" name="no_hp_ortu" placeholder="Contoh: 08123456789" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                            </div>

                            @elseif($role == 'admin')
                            <hr class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
                            <h6 class="mb-4 font-bold text-slate-700">Data Spesifik Admin</h6>
                            <div class="mb-4">
                                <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">NIP (Username Otomatis)</label>
                                <input type="text" name="nip" placeholder="Masukkan Nomor Induk Pegawai" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                            </div>
                            @endif

                            <div class="text-center">
                                <button type="submit" class="inline-block w-full px-6 py-3 mt-6 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">
                                    Simpan Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.layout.footer')
    </div>
</main>

@include('admin.layout.setting')
@include('admin.layout.script')