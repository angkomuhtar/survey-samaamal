<!-- BEGIN: Sidebar -->
<div class="sidebar-wrapper group w-0 hidden xl:w-[248px] xl:block">
    <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden">
    </div>
    <div class="logo-segment">
        <x-application-logo />
        <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
            <iconify-icon class="sidebarDotIcon extend-icon text-slate-900 dark:text-slate-200"
                icon="fa-regular:dot-circle"></iconify-icon>
            <iconify-icon class="sidebarDotIcon collapsed-icon text-slate-900 dark:text-slate-200"
                icon="material-symbols:circle-outline"></iconify-icon>
        </div>
        <button class="sidebarCloseIcon text-2xl inline-block md:hidden">
            <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
        </button>
    </div>
    <div id="nav_shadow"
        class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
      opacity-0">
    </div>
    <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] z-50" id="sidebar_menus">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-title">{{ __('MENU') }}</li>
            @if (Auth::guard('web')->user()->profile->level > 0)
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="navItem {{ \Request::route()->getName() == 'dashboard' ? 'active' : '' }}">
                        <span class="flex items-center">
                            <iconify-icon class="nav-icon" icon="heroicons-outline:home"></iconify-icon>
                            <span class="uppercase">Dashboard</span>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('survey') }}"
                        class="navItem {{ \Request::route()->getName() == 'survey' ? 'active' : '' }}">
                        <span class="flex items-center">
                            <iconify-icon class="nav-icon" icon="heroicons-outline:clipboard-list"></iconify-icon>
                            <span class="uppercase">Survey DPT</span>
                        </span>
                    </a>
                </li>
            @endif
            @if (Auth::guard('web')->user()->profile->level > 1)
                <li>
                    <a href="{{ route('verify') }}"
                        class="navItem {{ \Request::route()->getName() == 'verify' ? 'active' : '' }}">
                        <span class="flex items-center">
                            <iconify-icon class="nav-icon" icon="heroicons-outline:qrcode"></iconify-icon>
                            <span class="uppercase">Verifikasi Kecamatan</span>
                        </span>
                    </a>
                </li>
            @endif
            @if (Auth::guard('web')->user()->profile->level > 1)
                <li class="{{ \Request::route()->getName() == 'absensi*' ? 'active' : '' }}">
                    <a href="#" class="navItem">
                        <span class="flex items-center">
                            <iconify-icon class=" nav-icon" icon="heroicons:finger-print-20-solid"></iconify-icon>
                            <span>MASTER</span>
                        </span>
                        <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{ route('master.users') }}"
                                class="navItem {{ stripos(\Request::route()->getName(), 'master.users') !== false ? 'active' : '' }}">User</a>
                        </li>
                        <li>
                            <a href="{{ route('master.dpt') }}"
                                class="navItem {{ stripos(\Request::route()->getName(), 'master.dpt') !== false ? 'active' : '' }}">Daftar
                                Pemilih</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
        {{-- <div class="bg-slate-700 mb-10 mt-36 p-4 relative text-center rounded-2xl text-white"
            id="sidebar_bottom_wizard">
            <img src="{{ asset('images/worker.png') }}" alt="" class="mx-auto relative -mt-[110px] h-48">
            <div class="max-w-[160px] mx-auto mt-6">
                <div class="widget-title font-Inter mb-1">Unlimited Access</div>
                <div class="text-xs font-light font-Inter">
                    Upgrade your system to business plan
                </div>
            </div>
        </div> --}}
    </div>
</div>
