@include('santri.layout.header')
@include('santri.layout.sidebar')

<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
    @include('santri.layout.navbar')

    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="dark:text-white">Riwayat Pengajuan Top-Up Saldo</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Pengajuan</th>
                                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Jumlah</th>
                                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Keterangan Admin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($topups as $topup)
                                    <tr>
                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <div class="px-4 py-1">
                                                <h6 class="mb-0 text-sm leading-normal">
                                                    {{ \Carbon\Carbon::parse($topup->tanggal_transfer)->translatedFormat('d F Y') }}
                                                </h6>
                                            </div>
                                        </td>
                                        <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span class="text-sm font-semibold leading-tight text-slate-700">
                                                Rp {{ number_format($topup->jumlah_transfer, 0, ',', '.') }}
                                            </span>
                                        </td>
                                        <td class="p-2 text-sm text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            @if($topup->status == 'disetujui')
                                            <span class="bg-gradient-to-tl from-green-600 to-lime-400 px-2.5 text-xs rounded-1.8 py-1.4 text-white font-bold uppercase">Berhasil</span>
                                            @elseif($topup->status == 'ditolak')
                                            <span class="bg-gradient-to-tl from-red-600 to-rose-400 px-2.5 text-xs rounded-1.8 py-1.4 text-white font-bold uppercase">Ditolak</span>
                                            @elseif($topup->status == 'pending')
                                            <span class="bg-gradient-to-tl from-orange-500 to-yellow-500 px-2.5 text-xs rounded-1.8 py-1.4 text-white font-bold uppercase">Menunggu</span>
                                            @endif
                                        </td>
                                        <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span class="text-xs font-semibold leading-tight text-slate-400">
                                                {{ $topup->keterangan ?? ($topup->status == 'pending' ? 'Sedang diproses admin' : '-') }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('santri.layout.footer')
    </div>
</main>

@include('santri.layout.script')