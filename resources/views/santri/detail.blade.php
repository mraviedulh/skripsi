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
                <h6 class="text-lg font-semibold">Nama: {{ $santri->nama }}</h6>
                <h6 class="mb-4 text-lg font-semibold">NIS: {{ $santri->nis }}</h6>
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
                  @foreach (array_reverse($dataRiwayat) as $i => $trx)
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
    @include('santri.layout.footer')
</main>


@include('santri.layout.script')