@include('santri.layout.header')
@include('santri.layout.sidebar')

<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
    @include('santri.layout.navbar')

    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">

            <div class="w-full max-w-full px-3 mb-6 md:w-1/2 md:flex-none">
                <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="dark:text-white">Informasi Rekening Tujuan</h6>
                    </div>
                    <div class="flex-auto p-6">
                        <p class="mb-2 text-sm leading-normal">Silakan lakukan transfer ke rekening di bawah ini:</p>
                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                            <li class="relative flex p-4 mb-2 border-0 rounded-t-lg rounded-xl bg-gray-50">
                                <div class="flex flex-col">
                                    <h6 class="mb-1 text-sm leading-normal text-slate-700">Bank Syariah Indonesia (BSI)</h6>
                                    <span class="text-xs">Nomor Rekening: <span class="font-semibold text-slate-700">7500750752</span></span>
                                    <span class="text-xs">Atas Nama: <span class="font-semibold text-slate-700">Yayasan Daar Al Fawwaaz</span></span>
                                </div>
                            </li>
                        </ul>
                        <p class="mt-4 text-xs leading-normal">Setelah melakukan transfer, mohon isi formulir konfirmasi di samping dan unggah bukti transfer Anda. Saldo akan diperbarui setelah diverifikasi oleh Admin.</p>
                    </div>
                </div>
            </div>

            <div class="w-full max-w-full px-3 md:w-1/2 md:flex-none">
                <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex items-center justify-between">
                            <div>
                                <h6 class="dark:text-white">Formulir Konfirmasi Top-Up</h6>
                            </div>
                            <div class="ml-auto text-right">
                                <a href="/santri/topup/history" class="inline-block px-4 py-2 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-blue-500 to-violet-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md hover:scale-102 hover:shadow-soft-xs active:opacity-85">
                                    Lihat Riwayat
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="flex-auto p-6">
                        @if (session('success'))
                        <div class="mb-4 rounded-lg bg-green-100 px-4 py-3 text-sm text-green-800 border border-green-300">
                            {{ session('success') }}
                        </div>
                        @endif
                        <form role="form" action="{{ route('santri.topup.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="jumlah_transfer" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Jumlah Transfer</label>
                                <input type="number" id="jumlah_transfer" name="jumlah_transfer" placeholder="Contoh: 50000" min="0" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" required />
                            </div>

                            <div class="mb-4">
                                <label for="tanggal_transfer" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Tanggal Transfer</label>
                                <input type="date" id="tanggal_transfer" name="tanggal_transfer" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" required />
                                <p class="mt-1 text-xs text-gray-500" id="info-tanggal">Info: Hari ini adalah tanggal <span class="font-semibold">{{ date('d F Y') }}</span>.</p>
                            </div>

                            <div class="mb-4">
                                <label for="bukti_transfer" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Upload Bukti Transfer</label>
                                <input type="file" id="bukti_transfer" name="bukti_transfer" accept="image/*" onchange="previewImage(event)" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" required />
                                <p class="mt-1 text-xs text-gray-500">Format gambar: JPG, PNG. Maks 2MB.</p>

                                {{-- Preview Image --}}
                                <div id="preview-container" class="mt-3 hidden">
                                    <label class="block text-xs text-slate-700 font-semibold mb-1">Preview:</label>
                                    <img id="image-preview" class="border border-gray-300 rounded-md" style="max-height: 200px; max-width: 100%; object-fit: contain;" />
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="inline-block w-full px-16 py-3.5 mt-6 mb-0 font-bold leading-normal text-center text-white align-middle transition-all bg-blue-500 border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25">
                                    Kirim Konfirmasi
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        @include('santri.layout.footer')
    </div>
</main>

@include('santri.layout.setting')
@include('santri.layout.script')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session("success") }}',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    });
</script>
@endif

<script>
    function previewImage(event) {
        const input = event.target;
        const previewContainer = document.getElementById('preview-container');
        const imagePreview = document.getElementById('image-preview');

        if (input.files && input.files[0]) {
            if (input.files[0].size > 2 * 1024 * 1024) { // 2MB
                alert("Ukuran gambar maksimal 2MB.");
                input.value = "";
                previewContainer.classList.add('hidden');
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                previewContainer.classList.remove('hidden');
                imagePreview.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>