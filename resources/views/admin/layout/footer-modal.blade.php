<div id="modal-tolak" class="fixed top-0 left-0 z-50 items-center justify-center w-full h-full hidden bg-black bg-opacity-100">
    <div class="w-full max-w-md mx-auto bg-white rounded-lg shadow-lg">
        <div class="px-6 py-4 border-b">
            <h3 class="text-lg font-semibold">Konfirmasi Penolakan</h3>
        </div>
        <div class="p-6">
            <p class="mb-4 text-sm">Anda akan menolak permintaan top-up ini. Mohon berikan alasan penolakan di bawah ini.</p>
            <form id="form-tolak" action="#" method="POST">
                {{-- @csrf --}}
                {{-- @method('PUT') --}}
                <label for="alasan_penolakan" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Alasan Penolakan (Wajib Diisi)</label>
                <textarea name="alasan_penolakan" id="alasan_penolakan" rows="4" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" placeholder="Contoh: Bukti transfer tidak valid atau jumlah tidak sesuai." required></textarea>
            </form>
        </div>
        <div class="flex justify-end px-6 py-4 bg-gray-50 rounded-b-lg">
            <button onclick="closeModal()" class="px-4 py-2 mr-3 font-bold text-gray-700 bg-transparent border border-gray-300 rounded-lg hover:bg-gray-100">
                Batal
            </button>
            <button type="submit" form="form-tolak" class="px-4 py-2 font-bold text-white bg-gradient-to-tl from-red-600 to-rose-400 rounded-lg hover:bg-red-600">
                Kirim Penolakan
            </button>
        </div>
    </div>
</div>

<footer class="pt-4">
    <div class="w-full px-6 mx-auto">
        <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
            <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
                    ©
                    <script>
                        document.write(new Date().getFullYear() + ",");
                    </script>
                    made with <i class="fa fa-heart"></i> by
                    <a href="https://www.creative-tim.com" class="font-semibold text-slate-700 dark:text-white"
                        target="_blank">Creative Tim</a>
                    for a better web.
                </div>
            </div>
            <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com"
                            class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500"
                            target="_blank">Creative Tim</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/presentation"
                            class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500"
                            target="_blank">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://creative-tim.com/blog"
                            class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500"
                            target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/license"
                            class="block px-4 pt-0 pb-1 pr-0 text-sm font-normal transition-colors ease-in-out text-slate-500"
                            target="_blank">License</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>