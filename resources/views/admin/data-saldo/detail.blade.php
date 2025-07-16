@include('admin.layout.header')



@include('admin.layout.sidebar')

<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
  <!-- Navbar -->
  @include('admin.layout.navbar')

  <div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
      <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <div class="flex items-center justify-between">
              <div>
                <h6 class="text-lg font-semibold">Nama: {{ $santri->nama }}</h6>
                <h6 class="mb-4 text-lg font-semibold">NIS: {{ $santri->nis }}</h6>
              </div>
              <div>
                <a href="{{ route('admin.data-santri.create') }}" class="inline-block px-4 py-2 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-blue-500 to-violet-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md hover:scale-102 hover:shadow-soft-xs active:opacity-85">
                  <i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Data
                </a>
              </div>
            </div>
          </div>
          <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto">
              <table class="w-full text-sm text-left border">
                <thead class="bg-gray-100">
                  <tr>
                    <th class="p-2 text-center">No</th>
                    <th class="p-2">Tanggal</th>
                    <th class="p-2">Pemasukan</th>
                    <th class="p-2">Pengeluaran</th>
                    <th class="p-2">Total Saldo</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($dataRiwayat as $i => $trx)
                  <tr class="border-b">
                    <td class="p-2 text-center">{{ $i + 1 }}</td>
                    <td class="p-2">{{ $trx['tanggal'] }}</td>
                    <td class="p-2">
                      {{ $trx['pemasukan'] ? 'Rp ' . number_format($trx['pemasukan'], 0, ',', '.') : '-' }}
                    </td>
                    <td class="p-2">
                      {{ $trx['pengeluaran'] ? 'Rp ' . number_format($trx['pengeluaran'], 0, ',', '.') : '-' }}
                    </td>
                    <td class="p-2">Rp {{ number_format($trx['total'], 0, ',', '.') }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{-- Link Paginasi --}}
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('admin.layout.footer')
</main>


@include('admin.layout.script')