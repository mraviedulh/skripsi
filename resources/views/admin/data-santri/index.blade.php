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
                <h6 class="dark:text-white">Data Santri</h6>
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
              <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
                <thead class="align-bottom">
                  <tr>
                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Santri</th>
                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">NIS</th>
                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Saldo</th>
                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($santris as $santri)
                  <tr>
                    <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <span class="text-sm font-semibold leading-tight text-slate-700">{{ $loop->iteration + $santris->firstItem() - 1 }}</span>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <h6 class="px-4 mb-0 text-sm leading-normal">{{ $santri->nama }}</h6>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <p class="px-4 mb-0 text-sm font-semibold leading-tight">{{ $santri->nis }}</p>
                    </td>
                    <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <span class="text-sm font-semibold leading-tight text-slate-700">Rp {{ number_format($santri->saldo->balance ?? 0, 0, ',', '.') }}</span>
                    </td>
                    <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      {{-- Tombol Edit --}}
                      <a href="{{ route('admin.data-santri.edit', $santri->id) }}" class="text-xs font-semibold leading-tight text-slate-400"> Edit </a>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="5" class="p-4 text-center">Tidak ada data santri.</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
              {{-- Link Paginasi --}}
              <div class="p-4">
                {{ $santris->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('admin.layout.footer')
</main>

@include('admin.layout.setting')
@include('admin.layout.script')