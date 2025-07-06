@include('admin.layout.header')
@include('admin.layout.sidebar')

<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
    @include('admin.layout.navbar')

    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="dark:text-white">Daftar Pengajuan Top-Up Menunggu Verifikasi</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Info Santri</th>
                                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Detail Transfer</th>
                                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Contoh data pengajuan 1 --}}
                                    <tr>
                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div class="mr-3">
                                                    <div class="inline-block w-10 h-10 text-center rounded-lg bg-zinc-100">
                                                        <i class="relative top-2.5 text-lg text-slate-700 ni ni-single-02"></i>
                                                    </div>
                                                </div>
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-0 text-sm leading-normal">Aisyah Nur Kholifah</h6>
                                                    <p class="mb-0 text-xs leading-tight text-slate-400">Wali: Bapak Fulan</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <h6 class="mb-0 text-sm leading-normal">Rp 150.000</h6>
                                            <p class="mb-0 text-xs leading-tight text-slate-400">Tgl Transfer: 05 Juli 2025</p>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
                                            <a href="#" class="text-xs font-semibold leading-tight text-slate-400"> Lihat Bukti </a>
                                            <a href="#" class="inline-block px-4 py-2 ml-4 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-green-600 to-lime-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">Setujui</a>
                                            <a href="javascript:void(0)" onclick="openModal('#')" class="inline-block px-4 py-2 ml-2 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-red-600 to-rose-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">Tolak</a>
                                        </td>
                                    </tr>
                                    {{-- Contoh data pengajuan 2 --}}
                                    <tr>
                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div class="mr-3">
                                                    <div class="inline-block w-10 h-10 text-center rounded-lg bg-zinc-100">
                                                        <i class="relative top-2.5 text-lg text-slate-700 ni ni-single-02"></i>
                                                    </div>
                                                </div>
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-0 text-sm leading-normal">Intan Berlian</h6>
                                                    <p class="mb-0 text-xs leading-tight text-slate-400">Wali: Ibu Fulanah</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <h6 class="mb-0 text-sm leading-normal">Rp 200.000</h6>
                                            <p class="mb-0 text-xs leading-tight text-slate-400">Tgl Transfer: 04 Juli 2025</p>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
                                            <a href="#" class="text-xs font-semibold leading-tight text-slate-400"> Lihat Bukti </a>
                                            <a href="#" class="inline-block px-4 py-2 ml-4 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-green-600 to-lime-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">Setujui</a>
                                            <a href="#" class="inline-block px-4 py-2 ml-2 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-red-600 to-rose-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">Tolak</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal-tolak" class="fixed top-0 left-0 z-50 items-center justify-center w-full h-full bg-black bg-opacity-50 hidden">
            <div class="w-auto max-w-md mx-auto bg-white rounded-lg shadow-lg">
                <div class="px-6 py-4 border-b">
                    <h3 class="text-lg font-semibold">Konfirmasi Penolakan</h3>
                </div>
                <div class="p-6">
                    <p class="mb-4 text-sm">Anda akan menolak permintaan top-up ini. Mohon berikan alasan penolakan di bawah ini.</p>
                    <form id="form-tolak" action="/" method="POST">
                        {{-- @csrf --}}
                        {{-- @method('PUT') --}}
                        <label for="alasan_penolakan" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Alasan Penolakan (Wajib Diisi)</label>
                        <textarea name="alasan_penolakan" id="alasan_penolakan" rows="4" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" placeholder="Contoh: Bukti transfer tidak valid atau jumlah tidak sesuai." required></textarea>
                    </form>
                </div>
                <div class="flex justify-end px-6 py-4 bg-gray-50 rounded-b-lg">
                    <button onclick="closeModal()" class="px-4 py-2 mr-4 font-bold text-gray-700 bg-transparent border border-gray-300 rounded-lg hover:bg-gray-100">
                        Batal
                    </button>
                    <button type="submit" form="form-tolak" class="px-4 py-2 font-bold text-white bg-gradient-to-tl from-red-600 to-rose-400 rounded-lg hover:bg-red-600">
                        Kirim Penolakan
                    </button>
                </div>
            </div>
        </div>
        @include('admin.layout.footer')
    </div>
</main>

@include('admin.layout.setting')
@include('admin.layout.script')
<script>
    const modal = document.getElementById('modal-tolak');
    const formTolak = document.getElementById('form-tolak');

    function openModal(actionUrl) {
        // Baris ini akan berguna saat kita menghubungkan ke backend
        // untuk mengatur tujuan form secara dinamis
        formTolak.action = actionUrl;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModal() {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>