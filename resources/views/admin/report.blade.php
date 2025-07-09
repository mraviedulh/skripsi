@include('admin.layout.header')
@include('admin.layout.sidebar')

<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
  @include('admin.layout.navbar')

  <div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
      <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
          <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <div class="flex items-center justify-between">
              <h6 class="text-lg font-semibold text-slate-700">Riwayat Kelola Saldo</h6>
            </div>
          </div>

          <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto">
              <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
                <thead class="bg-slate-100 text-slate-600">
                  <tr>
                    <th class="px-4 py-2 text-xs font-semibold text-center uppercase">#</th>
                    <th class="px-4 py-2 text-xs font-semibold text-center uppercase">Tanggal</th>
                    <th class="px-4 py-2 text-xs font-semibold text-left uppercase">Nama Santri</th>
                    <th class="px-4 py-2 text-xs font-semibold text-left uppercase">NIS</th>
                    <th class="px-4 py-2 text-xs font-semibold text-right uppercase">Nominal</th>
                    <th class="px-4 py-2 text-xs font-semibold text-center uppercase">Aksi</th>
                    <th class="px-4 py-2 text-xs font-semibold text-center uppercase">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  @isset($transaksis)
                  @foreach ($transaksis as $index => $transaksi)
                  <tr class="border-b">
                    <td class="px-4 py-2 text-center text-xs">{{ $index + 1 }}</td>
                    <td class="px-4 py-2 text-center text-xs">{{ $transaksi->created_at->format('d/m/Y') }}</td>
                    <td class="px-4 py-2 text-sm">{{ $transaksi->santri->user->name ?? '-' }}</td>
                    <td class="px-4 py-2 text-sm">{{ $transaksi->santri->nis ?? '-' }}</td>
                    <td class="px-4 py-2 text-sm text-right">Rp {{ number_format($transaksi->nominal, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 text-center text-sm">
                      <span class="inline-block px-3 py-1 text-xs font-semibold text-white {{ $transaksi->tipe === 'setor' ? 'bg-gradient-to-tl from-green-600 to-lime-400' : 'bg-gradient-to-tl from-red-600 to-rose-400' }} rounded-full">
                        {{ ucfirst($transaksi->tipe) }}
                      </span>
                    </td>
                    <td class="px-4 py-2 text-center text-xs text-slate-500">{{ $transaksi->keterangan ?? '-' }}</td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td colspan="7" class="text-center text-sm py-4">Data transaksi tidak ditemukan.</td>
                  </tr>
                  @endisset
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
    @include('admin.layout.footer')
  </div>
</main>

@include('admin.layout.setting')
@include('admin.layout.script')