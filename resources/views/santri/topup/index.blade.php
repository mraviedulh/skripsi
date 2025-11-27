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
                                <input type="text" id="jumlah_transfer" name="jumlah_transfer" placeholder="Contoh: 50000" min="0" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" required />
                            </div>

                            <div class="mb-4">
                                <label for="tanggal_transfer" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Tanggal Transfer</label>
                                <input type="date" id="tanggal_transfer" name="tanggal_transfer" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" required />
                                <p class="mt-1 text-xs text-gray-500" id="info-tanggal">Info: Hari ini adalah tanggal <span class="font-semibold">{{ date('d F Y') }}</span>.</p>
                            </div>

                            <div class="mb-4">
                                <label for="bukti_transfer" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Upload Bukti Transfer</label>
                                <input type="file" id="bukti_transfer" name="bukti_transfer" accept=".jpg,.jpeg,.png,.pdf" onchange="previewFile(event)" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" required />
                                <p class="mt-1 text-xs text-gray-500">Format file: JPG, JPEG, PNG, PDF. Maks 2MB.</p>

                                {{-- Preview File --}}
                                <div id="preview-container" class="mt-3 hidden">
                                    <label class="block text-xs text-slate-700 font-semibold mb-1">Preview:</label>
                                    <img id="image-preview" class="border border-gray-300 rounded-md" style="max-height: 200px; max-width: 100%; object-fit: contain;" />
                                    <div id="pdf-preview" class="border border-gray-300 rounded-md p-4 text-center bg-gray-50 hidden">
                                        <i class="fas fa-file-pdf text-red-500 text-4xl mb-2"></i>
                                        <p class="text-sm text-gray-600">File PDF terpilih</p>
                                        <p id="pdf-filename" class="text-xs text-gray-500 mt-1"></p>
                                    </div>
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

@include('santri.layout.script')
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.10.5/dist/autoNumeric.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const an = new AutoNumeric('#jumlah_transfer', {
        currencySymbol: 'Rp ',
        currencySymbolPlacement: 'p', // <- penting, p = prefix (di depan)
        decimalPlaces: 0,
        digitGroupSeparator: '.', // gunakan titik untuk ribuan
        decimalCharacter: ',', // koma untuk desimal (standar Indonesia)
        unformatOnSubmit: true
    });
</script>
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session("success") }}',
        confirmButtonColor: '#3b82f6',
        confirmButtonText: 'OK',
        customClass: {
            confirmButton: 'swal2-confirm-custom'
        }
    });
</script>
<style>
    .swal2-confirm-custom {
        background-color: #3b82f6 !important;
        border: none !important;
        border-radius: 8px !important;
        padding: 12px 24px !important;
        font-weight: 600 !important;
        font-size: 16px !important;
        width: 100% !important;
        max-width: 120px !important;
        box-shadow: none !important;
    }

    .swal2-confirm-custom:hover {
        background-color: #3b82f6 !important;
        transform: none !important;
    }

    .swal2-confirm-custom:focus {
        box-shadow: none !important;
        outline: none !important;
    }
</style>
@endif

<script>
    function previewFile(event) {
        const input = event.target;
        const previewContainer = document.getElementById('preview-container');
        const imagePreview = document.getElementById('image-preview');
        const pdfPreview = document.getElementById('pdf-preview');
        const pdfFilename = document.getElementById('pdf-filename');

        if (input.files && input.files[0]) {
            const file = input.files[0];

            // Validasi ukuran file
            if (file.size > 2 * 1024 * 1024) { // 2MB
                alert("Ukuran file maksimal 2MB.");
                input.value = "";
                previewContainer.classList.add('hidden');
                return;
            }

            // Validasi tipe file
            const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf'];
            if (!allowedTypes.includes(file.type)) {
                alert("Format file tidak didukung. Gunakan JPG, JPEG, PNG, atau PDF.");
                input.value = "";
                previewContainer.classList.add('hidden');
                return;
            }

            previewContainer.classList.remove('hidden');

            if (file.type === 'application/pdf') {
                // Tampilkan preview PDF
                imagePreview.classList.add('hidden');
                pdfPreview.classList.remove('hidden');
                pdfFilename.textContent = file.name;
            } else {
                // Tampilkan preview gambar
                pdfPreview.classList.add('hidden');
                imagePreview.classList.remove('hidden');

                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }
    }
</script>