<!-- sidenav -->
<aside
    class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-hidden antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
    aria-expanded="false">
    <div class="h-19">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden"
            sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700"
            href="/">
            <img src="{{ asset('assets/img/logo-ct.png') }}"
                class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8"
                alt="main_logo" />
            <img src="{{ asset('assets/img/logo-ct.png') }}"
                class="hidden h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8"
                alt="main_logo" />
            <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">KUAS Al Fawwaaz</span>
        </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

    <div class="items-center block w-auto max-h-screen h-sidenav grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">

            <!-- Dashboard -->
            <li class="mt-0.5 w-full">
                <a class="py-2.7 {{ request()->is('home') ? 'bg-blue-500/13 font-semibold' : '' }} text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 text-slate-700 transition-colors"
                    href="/home">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg xl:p-2.5">
                        <i class="ni ni-tv-2 text-blue-500 text-sm leading-normal"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                </a>
            </li>

            <!-- Konfirmasi Top-Up -->
            <li class="mt-0.5 w-full">
                <a class="py-2.7 {{ request()->is('santri/topup') ? 'bg-blue-500/13 font-semibold' : '' }} text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 text-slate-700 transition-colors"
                    href="/santri/topup">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg xl:p-2.5">
                        <i class="ni ni-money-coins text-emerald-500 text-sm leading-normal"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Konfirmasi Top-Up</span>
                </a>
            </li>

            <!-- Riwayat Kelola Saldo -->
            <li class="mt-0.5 w-full">
                <a class="py-2.7 {{ request()->is('santri/riwayat*') ? 'bg-blue-500/13 font-semibold' : '' }} text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 text-slate-700 transition-colors"
                    href="/santri/riwayat">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg xl:p-2.5">
                        <i class="ni ni-archive-2 text-orange-500 text-sm leading-normal"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Riwayat Kelola Saldo</span>
                </a>
            </li>

            <!-- Profile -->
            <li class="mt-0.5 w-full">
                <a class="py-2.7 {{ request()->is('profile') ? 'bg-blue-500/13 font-semibold' : '' }} text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 text-slate-700 transition-colors"
                    href="/profile">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg xl:p-2.5">
                        <i class="ni ni-single-02 text-slate-700 text-sm leading-normal"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Profile</span>
                </a>
            </li>

        </ul>
    </div>
</aside>
<!-- end sidenav -->