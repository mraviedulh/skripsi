@include('admin.layout.header')
@include('admin.layout.sidebar')

<div class="relative h-full transition-all duration-200 ease-in-out xl:ml-68 overflow-visible">

  @include('admin.layout.navbar')
  <div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
      <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
          <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
            <div class="flex items-center justify-between">
              <p class="mb-0 font-bold">Kelola Saldo</p>
            </div>
          </div>

          <div class="flex-auto p-6 pb-8">
            {{-- Form cari NIS --}}
            <form method="GET" action="{{ route('admin.kelola') }}" class="mb-6">
              <label for="nis" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">NIS</label>
              <div class="flex gap-2">
                <input type="number" name="nis" placeholder="Masukkan NIS"
                  class="border px-3 py-2 rounded w-full text-sm"
                  value="{{ request('nis') }}">
                <button type="submit"
                  class="px-4 py-2 text-xs font-bold text-white bg-blue-500 rounded-lg hover:shadow-md hover:-translate-y-px transition">Cari</button>
              </div>
            </form>

            {{-- Jika santri ditemukan --}}
            @if(isset($santri))
            <form method="POST" action="{{ route('admin.transaksi.proses') }}">
              @csrf
              <input type="hidden" name="santri_id" value="{{ $santri->id }}">

              <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 md:w-6/12">
                  <div class="mb-4">
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Nama</label>
                    <input type="text" value="{{ $santri->nama }}" disabled
                      class="w-full px-3 py-2 border rounded text-sm bg-gray-100">
                  </div>
                </div>
                <div class="w-full max-w-full px-3 md:w-6/12">
                  <div class="mb-4">
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">NIS</label>
                    <input type="text" value="{{ $santri->nis }}" disabled
                      class="w-full px-3 py-2 border rounded text-sm bg-gray-100">
                  </div>
                </div>
                <div class="w-full max-w-full px-3 md:w-6/12">
                  <div class="mb-4">
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Saldo Terkini</label>
                    <input type="text" value="Rp {{ number_format($santri->saldo->balance ?? 0, 0, ',', '.') }}" disabled
                      class="w-full px-3 py-2 border rounded text-sm bg-gray-100">
                  </div>
                </div>
                <div class="w-full max-w-full px-3 md:w-6/12">
                  <div class="mb-4">
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Nominal</label>
                    <!-- <input type="number" name="nominal" placeholder="Masukkan jumlah" min="0" step="1000"
                      class="w-full px-3 py-2 border rounded text-sm" required> -->
                    <input type="text" id="nominal" name="nominal" placeholder="Masukkan jumlah nominal"
                      class="w-full px-3 py-2 border rounded text-sm" required>

                    <!-- <input type="hidden" name="nominal" id="nominal_value"> -->
                  </div>
                </div>
                <input type="hidden" name="santri_id" value="{{ $santri->id }}">
                <div class="w-full max-w-full px-3 md:w-full">
                  <div class="mb-4">
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Keterangan</label>
                    <input type="text" name="keterangan" placeholder="Misal: uang jajan"
                      class="w-full px-3 py-2 border rounded text-sm" required>
                  </div>
                </div>
              </div>

              <div class="flex justify-end gap-4 mt-6 visible opacity-100 bg-white z-50 relative">
                <button
                  type="submit"
                  name="aksi"
                  value="tarik"
                  formaction="{{ route('admin.transaksi.proses') }}"
                  class="inline-block px-4 py-2 ml-2 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-red-600 to-rose-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">
                  Tarik
                </button>

                <button
                  type="submit"
                  name="aksi"
                  value="setor"
                  formaction="{{ route('admin.transaksi.proses') }}"
                  class="inline-block px-4 py-2 ml-4 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-green-600 to-lime-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">
                  Setor
                </button>
              </div>
            </form>
            @elseif(request('nis'))
            <p class="text-red-500 mt-4">Santri dengan NIS {{ request('nis') }} tidak ditemukan.</p>
            @endif
          </div>
        </div>
      </div>
    </div>
    @include('admin.layout.footer')
  </div>
</div>
<!-- <style>
  button {
    font-size: 14px !important;
    color: white !important;
  }
</style> -->

@include('admin.layout.script')
<!-- <script>
  // Ambil elemen input
  const nominalDisplay = document.getElementById('nominal_display');
  const nominalValue = document.getElementById('nominal_value');

  // Tambahkan event listener untuk 'keyup'
  nominalDisplay.addEventListener('keyup', function() {
    // 1. Ambil nilai dari input dan hapus semua karakter selain angka
    let cleanValue = this.value.replace(/[^0-9]/g, '');

    // 2. Update nilai input tersembunyi dengan angka bersih
    nominalValue.value = cleanValue;

    // 3. Format angka dengan pemisah ribuan (titik) dan tambahkan "Rp "
    if (cleanValue) {
      // Gunakan Intl.NumberFormat untuk memformat angka ke format lokal Indonesia
      let formattedValue = new Intl.NumberFormat('id-ID').format(cleanValue);
      this.value = 'Rp ' + formattedValue;
    } else {
      this.value = '';
    }
  });
</script> -->
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.10.5/dist/autoNumeric.min.js"></script>
<script>
  const an = new AutoNumeric('#nominal', {
    currencySymbol: 'Rp ',
    currencySymbolPlacement: 'p', // <- penting, p = prefix (di depan)
    decimalPlaces: 0,
    digitGroupSeparator: '.', // gunakan titik untuk ribuan
    decimalCharacter: ',', // koma untuk desimal (standar Indonesia)
    unformatOnSubmit: false,
  });

  // // Ambil nilai angka murni
  // document.querySelector('form').addEventListener('submit', function() {
  //   document.getElementById('nominal_value').value = an.getNumber();
  // });
</script>