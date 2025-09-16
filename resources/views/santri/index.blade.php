@include('santri.layout.header')
<!-- sidenav  -->
@include('santri.layout.sidebar')
<!-- end sidenav -->

<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
  <!-- Navbar -->
  @include('santri.layout.navbar')
  <!-- end Navbar -->

  <!-- cards -->
  <div class="w-full px-6 py-6 mx-auto">
    <!-- row 1 -->
    <div class="flex flex-wrap -mx-3">
      <!-- card1 -->
      <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div
          class="relative flex flex-col min-w-0 min-h-[180px] h-full break-words bg-white shadow-xl rounded-2xl bg-clip-border">
          <div class="flex-auto p-4 min-h-[180px]">
            <div class="flex flex-row -mx-3">
              <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                  <p
                    class="mb-0 font-sans text-sm font-semibold leading-normal uppercase">
                    Saldo Terkini</p>
                  <h5 class="mb-2 font-bold">{{ 'Rp ' . number_format($saldoTerkini, 0, ',', '.') }}</h5>
                </div>
              </div>
              <div class="px-3 text-right basis-1/3">
                <div
                  class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                  <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- card2 -->
      <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div
          class="relative flex flex-col min-w-0 min-h-[180px] h-full break-words bg-white shadow-xl rounded-2xl bg-clip-border">
          <div class="flex-auto p-4 min-h-[180px]">
            <div class="flex flex-row -mx-3">
              <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                  <p
                    class="mb-0 font-sans text-sm font-semibold leading-normal uppercase">
                    Pemasukan</p>
                  <h5 class="mb-2 font-bold">{{ 'Rp ' . number_format($pemasukanHariIni, 0, ',', '.') }}</h5>
                </div>
              </div>
              <div class="px-3 text-right basis-1/3">
                <div
                  class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
                  <i class="ni leading-none ni-cloud-download-95 text-lg relative top-3.5 text-white"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- card3 -->
      <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div
          class="relative flex flex-col min-w-0 min-h-[180px] h-full break-words bg-white shadow-xl rounded-2xl bg-clip-border">
          <div class="flex-auto p-4 min-h-[180px]">
            <div class="flex flex-row -mx-3">
              <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                  <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase">Pengeluaran</p>
                  <h5 class="mb-2 font-bold">{{ 'Rp ' . number_format($pengeluaranHariIni, 0, ',', '.') }}</h5>
                </div>
              </div>
              <div class="px-3 text-right basis-1/3">
                <div
                  class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
                  <i class="ni leading-none ni-cloud-upload-96 text-lg relative top-3.5 text-white"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- card4 -->
      <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
        <div class="relative flex flex-col min-w-0 min-h-[180px] h-full break-words bg-white shadow-xl rounded-2xl bg-clip-border">
          <div class="flex-auto p-4 min-h-[180px]">
            <div class="flex flex-row -mx-3">
              <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                  <p
                    class="mb-0 font-sans text-sm font-semibold leading-normal uppercase">
                    Transaksi Hari Ini</p>
                  <h5 class="mb-2 font-bold">{{ 'Rp ' . number_format($totalTransaksiHariIni, 0, ',', '.') }}</h5>
                </div>
              </div>
              <div class="px-3 text-right basis-1/3">
                <div
                  class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-500 to-yellow-500">
                  <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    @include('santri.layout.footer')

  </div>
  <!-- end cards -->
</main>
@include('santri.layout.script')