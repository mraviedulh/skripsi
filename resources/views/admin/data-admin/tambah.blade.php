@include('admin.layout.header')
@include('admin.layout.sidebar')

<div class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68">

    @include('admin.layout.navbar')
    <!-- <div class="relative w-full mx-auto mt-60 "> -->
    <div class="w-full p-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
                    <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                        <div class="flex items-center">
                            <p class="mb-0">Tambah Data Admin</p>
                        </div>
                    </div>
                    <div class="flex-auto p-6">
                        <p class="leading-normal uppercase text-sm">Detail Admin</p>
                        <form action="{{ route('admin.data-admin.store') }}" method="POST">
                            @csrf
                            <div class="flex flex-wrap -mx-3">
                                <!-- Nama -->
                                <div class="w-full max-w-full px-3 md:w-6/12">
                                    <div class="mb-4">
                                        <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Nama</label>
                                        <input type="text" name="nama" value="{{ old('nama') }}"
                                            class="focus:shadow-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-700 outline-none transition-all placeholder-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>

                                <!-- NIS -->
                                <div class="w-full max-w-full px-3 md:w-6/12">
                                    <div class="mb-4">
                                        <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">NIP</label>
                                        <input type="text" name="nip" value="{{ old('nip') }}"
                                            class="focus:shadow-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-700 outline-none transition-all placeholder-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>

                                <!-- Tanggal Lahir -->
                                <div class="w-full max-w-full px-3 md:w-6/12">
                                    <div class="mb-4">
                                        <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}"
                                            class="focus:shadow-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-700 outline-none transition-all placeholder-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>

                                <!-- No HP -->
                                <div class="w-full max-w-full px-3 md:w-6/12">
                                    <div class="mb-4">
                                        <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">No HP</label>
                                        <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                                            class="focus:shadow-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-700 outline-none transition-all placeholder-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 text-right">
                                <button type="submit"
                                    class="inline-block px-6 py-2 font-bold text-white uppercase transition-all bg-blue-500 rounded-lg shadow-md hover:shadow-lg hover:-translate-y-1 active:opacity-85 text-sm">
                                    Simpan
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <footer class="pt-4">
            <div class="w-full px-6 mx-auto">
                <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                    <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                        <div class="leading-normal text-center text-sm text-slate-500 lg:text-left">
                            ©
                            <script>
                                document.write(new Date().getFullYear() + ",");
                            </script>
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-semibold text-slate-700"
                                target="_blank">Creative Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                        <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com"
                                    class="block px-4 pt-0 pb-1 font-normal transition-colors ease-in-out text-sm text-slate-500"
                                    target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation"
                                    class="block px-4 pt-0 pb-1 font-normal transition-colors ease-in-out text-sm text-slate-500"
                                    target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://creative-tim.com/blog"
                                    class="block px-4 pt-0 pb-1 font-normal transition-colors ease-in-out text-sm text-slate-500"
                                    target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license"
                                    class="block px-4 pt-0 pb-1 pr-0 font-normal transition-colors ease-in-out text-sm text-slate-500"
                                    target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<div fixed-plugin>
    <a fixed-plugin-button
        class="fixed px-4 py-2 bg-white shadow-lg cursor-pointer bottom-8 right-8 text-xl z-990 rounded-circle text-slate-700">
        <i class="py-2 pointer-events-none fa fa-cog"> </i>
    </a>
    <!-- -right-90 in loc de 0-->
    <div fixed-plugin-card
        class="z-sticky backdrop-blur-2xl backdrop-saturate-200 shadow-3xl w-90 ease -right-90 fixed top-0 left-auto flex h-full min-w-0 flex-col break-words rounded-none border-0 bg-white/80 bg-clip-border px-2.5 duration-200">
        <div class="px-6 pt-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
            <div class="float-left">
                <h5 class="mt-4 mb-0">Argon Configurator</h5>
                <p class="dark:text-white">See our dashboard options.</p>
            </div>
            <div class="float-right mt-6">
                <button fixed-plugin-close-button
                    class="inline-block p-0 mb-4 font-bold leading-normal text-center uppercase align-middle transition-all ease-in bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:-translate-y-px text-sm tracking-tight-rem bg-150 bg-x-25 active:opacity-85 text-slate-700">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr
            class="h-px mx-0 my-1 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
        <div class="flex-auto p-6 pt-0 overflow-auto sm:pt-4">
            <!-- Sidebar Backgrounds -->
            <div>
                <h6 class="mb-0">Sidebar Colors</h6>
            </div>
            <a href="javascript:void(0)">
                <div class="my-2 text-left" sidenav-colors>
                    <span
                        class="py-2.2 text-xs rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-blue-500 to-violet-500 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-slate-700 text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
                        active-color data-color="blue" onclick="sidebarColor(this)"></span>
                    <span
                        class="py-2.2 text-xs rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-zinc-800 to-zinc-700 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
                        data-color="gray" onclick="sidebarColor(this)"></span>
                    <span
                        class="py-2.2 text-xs rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-blue-700 to-cyan-500 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
                        data-color="cyan" onclick="sidebarColor(this)"></span>
                    <span
                        class="py-2.2 text-xs rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-emerald-500 to-teal-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
                        data-color="emerald" onclick="sidebarColor(this)"></span>
                    <span
                        class="py-2.2 text-xs rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-orange-500 to-yellow-500 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
                        data-color="orange" onclick="sidebarColor(this)"></span>
                    <span
                        class="py-2.2 text-xs rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-red-600 to-orange-600 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
                        data-color="red" onclick="sidebarColor(this)"></span>
                </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-4">
                <h6 class="mb-0">Sidenav Type</h6>
                <p class="leading-normal text-sm">Choose between 2 different sidenav types.
                </p>
            </div>
            <div class="flex">
                <button transparent-style-btn
                    class="inline-block w-full px-4 py-2.5 mb-2 font-bold leading-normal text-center text-white capitalize align-middle transition-all bg-blue-500 border border-transparent border-solid rounded-lg cursor-pointer text-sm xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-blue-500 xl-max:to-violet-500 xl-max:text-white xl-max:border-0 hover:-translate-y-px hover:shadow-xs active:opacity-85 ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 bg-gradient-to-tl from-blue-500 to-violet-500 hover:border-blue-500"
                    data-class="bg-transparent" active-style>White</button>
                <button white-style-btn
                    class="inline-block w-full px-4 py-2.5 mb-2 ml-2 font-bold leading-normal text-center text-blue-500 capitalize align-middle transition-all bg-transparent border border-blue-500 border-solid rounded-lg cursor-pointer text-sm xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-blue-500 xl-max:to-violet-500 xl-max:text-white xl-max:border-0 hover:-translate-y-px hover:shadow-xs active:opacity-85 ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 bg-none hover:border-blue-500"
                    data-class="bg-white">Dark</button>
            </div>
            <p class="block mt-2 leading-normal text-sm xl:hidden">You can change the
                sidenav type just on desktop view.</p>
            <!-- Navbar Fixed -->
            <div class="flex my-4">
                <h6 class="mb-0">Navbar Fixed</h6>
                <div class="block pl-0 ml-auto min-h-6">
                    <input navbarFixed
                        class="rounded-10 duration-250 ease-in-out after:rounded-circle after:shadow-2xl after:duration-250 checked:after:translate-x-5.3 h-5 relative float-left mt-1 ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right"
                        type="checkbox" />
                </div>
            </div>
            <hr
                class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent " />
            <div class="flex mt-2 mb-12">
                <h6 class="mb-0">Light / Dark</h6>
                <div class="block pl-0 ml-auto min-h-6">
                    <input dark-toggle
                        class="rounded-10 duration-250 ease-in-out after:rounded-circle after:shadow-2xl after:duration-250 checked:after:translate-x-5.3 h-5 relative float-left mt-1 ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right"
                        type="checkbox" />
                </div>
            </div>
            <a target="_blank"
                class="dark:border inline-block w-full px-6 py-2.5 mb-4 font-bold leading-normal text-center text-white align-middle transition-all bg-transparent border border-solid border-transparent rounded-lg cursor-pointer text-sm ease-in hover:shadow-xs hover:-translate-y-px active:opacity-85 tracking-tight-rem shadow-md bg-150 bg-x-25 bg-gradient-to-tl from-zinc-800 to-zinc-700"
                href="https://www.creative-tim.com/product/argon-dashboard-tailwind">Free Download</a>
            <a target="_blank"
                class="dark:border inline-block w-full px-6 py-2.5 mb-4 font-bold leading-normal text-center align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer active:shadow-xs hover:-translate-y-px active:opacity-85 text-sm ease-in tracking-tight-rem bg-150 bg-x-25 border-slate-700 text-slate-700 hover:bg-transparent hover:text-slate-700 hover:shadow-none active:bg-slate-700 active:text-white active:hover:bg-transparent active:hover:text-slate-700 active:hover:shadow-none"
                href="https://www.creative-tim.com/learning-lab/tailwind/html/quick-start/argon-dashboard/">View
                documentation</a>
            <div class="w-full text-center">
                <a class="github-button" href="https://github.com/creativetimofficial/argon-dashboard-tailwind"
                    data-icon="octicon-star" data-size="large" data-show-count="true"
                    aria-label="Star creativetimofficial/argon-dashboard on GitHub">Star</a>
                <h6 class="mt-4">Thank you for sharing!</h6>
                <a href="https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23tailwindcss&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard-tailwind"
                    class="inline-block px-5 py-2.5 mb-0 mr-2 font-bold text-center text-white align-middle transition-all border-0  rounded-lg cursor-pointer hover:shadow-xs hover:-translate-y-px active:opacity-85 leading-normal text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 me-2 border-slate-700 bg-slate-700"
                    target="_blank"> <i class="mr-1 fab fa-twitter"></i> Tweet </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard-tailwind"
                    class="inline-block px-5 py-2.5 mb-0 mr-2 font-bold text-center text-white align-middle transition-all border-0  rounded-lg cursor-pointer hover:shadow-xs hover:-translate-y-px active:opacity-85 leading-normal text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 me-2 border-slate-700 bg-slate-700"
                    target="_blank"> <i class="mr-1 fab fa-facebook-square"></i> Share </a>
            </div>
        </div>
    </div>
</div>
</body>
<!-- plugin for scrollbar  -->
<script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="../assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>

</html>