<nav
    class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
    navbar-main navbar-scroll="false">
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
        <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="text-white opacity-50" href="javascript:;">Pages</a>
                </li>
                <li
                    class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">
                    @if(request()->is('dashboard') || request()->is('admin'))
                    Dashboard
                    @elseif(request()->is('admin/data-santri*'))
                    Data Santri
                    @elseif(request()->is('admin/data-admin*'))
                    Data Admin
                    @elseif(request()->is('admin/kelola*'))
                    Kelola Saldo
                    @elseif(request()->is('admin/verifikasi*'))
                    Verifikasi Transfer
                    @elseif(request()->is('admin/report*'))
                    Riwayat Kelola Saldo
                    @else
                    Dashboard
                    @endif
                </li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">
                @if(request()->is('admin/dashboard') || request()->is('admin'))
                Dashboard
                @elseif(request()->is('admin/data-santri*'))
                Data Santri
                @elseif(request()->is('admin/data-admin*'))
                Data Admin
                @elseif(request()->is('admin/kelola'))
                Kelola Saldo
                @elseif(request()->is('admin/verifikasi'))
                Verifikasi Transfer
                @elseif(request()->is('admin/report'))
                Riwayat Kelola Saldo
                @else
                Dashboard
                @endif
            </h6>
        </nav>

        <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto justify-end">
            <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                <li class="flex items-center">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="block px-0 py-2 text-sm font-semibold text-white transition-all ease-nav-brand">
                            <i class="fa fa-user sm:mr-1"></i>
                            <span class="hidden sm:inline">Sign Out</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>