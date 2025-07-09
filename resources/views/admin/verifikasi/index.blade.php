@include('admin.layout.header')
@include('admin.layout.sidebar')

<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
    @include('admin.layout.navbar')

    <div class="w-full px-6 py-6 mx-auto">

        {{-- notifikasi --}}
        @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
        @endif

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
                            @forelse($topups as $t)
                            <tr>
                                {{-- Info Santri --}}
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <div class="flex px-2 py-1">
                                        <div class="mr-3">
                                            <div class="inline-block w-10 h-10 rounded-lg bg-zinc-100 text-center">
                                                <i class="relative top-2.5 text-lg text-slate-700 ni ni-single-02"></i>
                                            </div>
                                        </div>
                                        <div class="flex flex-col justify-center">
                                            <h6 class="mb-0 text-sm">{{ $t->santri->nama }}</h6>
                                            <p class="mb-0 text-xs text-slate-400">Wali: {{ $t->santri->nama_wali }}</p>
                                        </div>
                                    </div>
                                </td>

                                {{-- Detail Transfer --}}
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <h6 class="mb-0 text-sm">Rp {{ number_format($t->jumlah_transfer,0,',','.') }}</h6>
                                    <p class="mb-0 text-xs text-slate-400">Tgl: {{ $t->tanggal_transfer->format('d M Y') }}</p>
                                </td>

                                {{-- Aksi --}}
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
                                    {{-- Lihat Bukti --}}
                                    <a href="{{ asset('storage/' . $t->bukti_transfer) }}"
                                        target="_blank"
                                        class="text-xs font-semibold text-slate-400">
                                        Lihat Bukti
                                    </a>

                                    {{-- Setujui --}}
                                    <form action="{{ route('admin.verifikasi.approve', $t) }}"
                                        method="POST" class="inline-block ml-4">
                                        @csrf @method('PUT')
                                        <button type="submit"
                                            class="px-4 py-2 text-xs font-bold text-white rounded-lg bg-gradient-to-tl from-green-600 to-lime-400 hover:scale-102">
                                            Setujui
                                        </button>
                                    </form>

                                    {{-- Tolak (modal) --}}
                                    <button onclick="openModal(`{{ route('admin.verifikasi.reject', $t) }}`)"
                                        class="px-4 py-2 ml-2 text-xs font-bold text-white rounded-lg bg-gradient-to-tl from-red-600 to-rose-400">
                                        Tolak
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="p-4 text-center text-slate-500">
                                    Tidak ada top‑up pending.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Modal penolakan --}}
        <div id="modal-tolak" class="fixed top-0 left-0 items-center justify-center w-full h-full hidden">
            <div class="w-full h-full bg-black opacity-60 z-10 absolute"></div>
            <div class="max-w-md mx-auto bg-white z-50 rounded-lg shadow-lg">
                <div class="px-6 py-4 border-b">
                    <h3 class="text-lg font-semibold">Konfirmasi Penolakan</h3>
                </div>
                <div class="p-6">
                    <p class="mb-4 text-sm">
                        Anda akan menolak permintaan top‑up ini. Mohon berikan alasan:
                    </p>
                    <form id="form-tolak" method="POST">
                        @csrf @method('PUT')
                        <label for="alasan_penolakan" class="block mb-2 text-xs font-bold text-slate-700">
                            Alasan Penolakan (wajib isi)
                        </label>
                        <textarea name="alasan_penolakan" id="alasan_penolakan" rows="4"
                            class="w-full px-3 py-2 border rounded-lg placeholder-gray-500 focus:outline-none"
                            placeholder="Misal: Bukti transfer buram / jumlah tidak sesuai."
                            required></textarea>
                    </form>
                </div>
                <div class="flex justify-end px-6 py-4 bg-gray-50 rounded-b-lg">
                    <button onclick="closeModal()"
                        class="px-4 py-2 mr-4 font-bold text-gray-700 bg-transparent border rounded-lg hover:bg-gray-100">
                        Batal
                    </button>
                    <button type="submit" form="form-tolak"
                        class="px-4 py-2 font-bold text-gray-700 rounded-lg bg-red-600 hover:bg-red-700">
                        Kirim Penolakan
                    </button>
                </div>
            </div>
        </div>

        @include('admin.layout.footer')
    </div>
</main>

@include('admin.layout.script')
<script>
    const modal = document.getElementById('modal-tolak');
    const formTolak = document.getElementById('form-tolak');

    function openModal(actionUrl) {
        formTolak.action = actionUrl;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModal() {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>
@include('admin.layout.setting')