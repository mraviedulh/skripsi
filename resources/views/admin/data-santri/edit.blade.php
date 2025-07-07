@include('admin.layout.header')
@include('admin.layout.sidebar')

<div class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68">

  @include('admin.layout.navbar')
  <!-- <div class="relative w-full mx-auto mt-60 "> -->
  <div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
      <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h6 class="dark:text-white">Formulir Edit Data Santri</h6>
          </div>
          <div class="flex-auto p-6">
            <form role="form" action="{{ route('data-santri.update', $santri->id) }}" method="POST">
              @csrf
              @method('PUT') {{-- Metode PUT untuk update --}}

              {{-- Tampilkan error jika ada --}}
              @if ($errors->any())
              <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif

              <div class="mb-4">
                <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Nama Lengkap</label>
                <input type="text" name="nama" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700" value="{{ old('nama', $santri->nama) }}" required />
              </div>
              <div class="mb-4">
                <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">NIS (Tidak bisa diubah)</label>
                <input type="text" name="nis" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-gray-100 bg-clip-padding px-3 py-2 font-normal text-gray-700" value="{{ old('nis', $santri->nis) }}" disabled />
              </div>
              <div class="mb-4">
                <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700" value="{{ old('tgl_lahir', $santri->tgl_lahir) }}" required />
              </div>
              <div class="mb-4">
                <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Alamat</label>
                <textarea name="alamat" rows="3" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700">{{ old('alamat', $santri->alamat) }}</textarea>
              </div>
              <div class="mb-4">
                <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">No. HP Orang Tua</label>
                <input type="text" name="no_hp_ortu" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700" value="{{ old('no_hp_ortu', $santri->no_hp_ortu) }}" required />
              </div>
              <div class="text-center">
                <button type="submit" class="inline-block w-full px-6 py-3 mt-6 mb-0 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer shadow-soft-md bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 active:opacity-85">
                  Simpan Perubahan
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    @include('admin.layout.footer')
    </main>

    @include('admin.layout.setting')
    @include('admin.layout.script')