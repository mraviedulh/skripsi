@include('santri.layout.header')
@include('santri.layout.sidebar')

<div class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68">

  @include('santri.layout.navbar')
  <!-- <div class="relative w-full mx-auto mt-60 "> -->
  <div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
      <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
        <div
          class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
          <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
            <div class="flex items-center">
              <p class="mb-0">Update Data Profil</p>
            </div>
          </div>
          <div class="flex-auto p-6">
            <p class="leading-normal uppercase text-sm">Detail Profil</p>

            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
              {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST">
              @csrf
              @method('PATCH')
              <div class="flex flex-wrap -mx-3">
                @if($santri)
                <!-- Nama (Read Only) -->
                <div class="w-full max-w-full px-3 md:w-6/12">
                  <div class="mb-4">
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Nama</label>
                    <input type="text" value="{{ $santri->nama }}" readonly
                      class="focus:shadow-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-gray-300 bg-gray-100 px-3 py-2 text-gray-700 outline-none transition-all placeholder-gray-500 focus:border-blue-500 focus:outline-none" />
                  </div>
                </div>

                <!-- NIS (Read Only) -->
                <div class="w-full max-w-full px-3 md:w-6/12">
                  <div class="mb-4">
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">NIS</label>
                    <input type="text" value="{{ $santri->nis }}" readonly
                      class="focus:shadow-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-gray-300 bg-gray-100 px-3 py-2 text-gray-700 outline-none transition-all placeholder-gray-500 focus:border-blue-500 focus:outline-none" />
                  </div>
                </div>

                <!-- Tanggal Lahir (Read Only) -->
                <div class="w-full max-w-full px-3 md:w-6/12">
                  <div class="mb-4">
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Tanggal Lahir</label>
                    <input type="date" value="{{ $santri->tgl_lahir }}" readonly
                      class="focus:shadow-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-gray-300 bg-gray-100 px-3 py-2 text-gray-700 outline-none transition-all placeholder-gray-500 focus:border-blue-500 focus:outline-none" />
                  </div>
                </div>
                @endif

                @if($santri)
                <!-- No HP Orang Tua -->
                <div class="w-full max-w-full px-3 md:w-6/12">
                  <div class="mb-4">
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">No. HP Orang Tua</label>
                    <input type="text" name="no_hp_ortu" value="{{ old('no_hp_ortu', $santri->no_hp_ortu) }}"
                      class="focus:shadow-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-700 outline-none transition-all placeholder-gray-500 focus:border-blue-500 focus:outline-none" />
                    @error('no_hp_ortu')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <!-- Nama Orang Tua -->
                <div class="w-full max-w-full px-3 md:w-6/12">
                  <div class="mb-4">
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Nama Orang Tua</label>
                    <input type="text" name="nama_wali" value="{{ old('nama_wali', $santri->nama_wali) }}"
                      class="focus:shadow-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-700 outline-none transition-all placeholder-gray-500 focus:border-blue-500 focus:outline-none" />
                    @error('nama_wali')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <!-- Alamat -->
                <div class="w-full max-w-full px-3 md:w-6/12">
                  <div class="mb-4">
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Alamat</label>
                    <textarea name="alamat"
                      class="focus:shadow-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-700 outline-none transition-all placeholder-gray-500 focus:border-blue-500 focus:outline-none"
                      rows="3">{{ old('alamat', $santri->alamat) }}</textarea>
                    @error('alamat')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
                @endif
              </div>

              <div class="mt-6 text-right">
                <button type="submit"
                  class="inline-block px-6 py-2 font-bold text-white uppercase transition-all bg-blue-500 rounded-lg shadow-md hover:shadow-lg hover:-translate-y-1 active:opacity-85 text-sm">
                  Simpan Perubahan
                </button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
    @include('santri.layout.footer')
  </div>
</div>
@include('santri.layout.script')