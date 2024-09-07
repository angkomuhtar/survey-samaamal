<x-appLayout>
    <div class="space-y-5 profile-page">
        <div
            class="profiel-wrap px-[35px] pb-10 md:pt-[84px] pt-10 rounded-lg bg-white dark:bg-slate-800 lg:flex lg:space-y-0
                space-y-6 justify-between items-end relative z-[1]">
            <div
                class="bg-slate-900 dark:bg-slate-700 absolute left-0 top-0 md:h-1/2 h-[150px] w-full z-[-1] rounded-t-lg">
            </div>
            <div class="profile-box flex-none md:text-start text-center">
                <div class="md:flex items-end md:space-x-6 rtl:space-x-reverse">
                    <div class="flex-none">
                        <div
                            class="md:h-[186px] md:w-[186px] h-[140px] w-[140px] md:ml-0 md:mr-0 ml-auto mr-auto md:mb-0 mb-4 rounded-full ring-4
                                ring-slate-100 relative">
                            <img src="{{ Avatar::create(auth()->guard('web')->user()->profile->name)->setDimension(400)->setFontSize(200)->toBase64() }}"
                                alt="" class="w-full h-full object-cover rounded-full">
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="text-2xl font-medium text-slate-900 dark:text-slate-200 mb-[3px]">
                            {{ auth()->guard('web')->user()->profile->name }}
                        </div>
                        <div class="text-sm font-light text-slate-600 dark:text-slate-400 capitalize">
                            {{ '@' . auth()->guard('web')->user()->username }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end profile box -->
            <div class="profile-info-500 md:flex md:text-start text-center flex-1 max-w-[516px] md:space-y-0 space-y-4">
                <div class="flex-1">
                    <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                        {{ $data['countDpt']['total'] }}
                    </div>
                    <div class="text-sm text-slate-600 font-light dark:text-slate-300">
                        Total DPT
                    </div>
                </div>
                <!-- end single -->
                <div class="flex-1">
                    <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                        {{ $data['countDpt']['survey'] }}
                    </div>
                    <div class="text-sm text-slate-600 font-light dark:text-slate-300">
                        diSurvey
                    </div>
                </div>
                <!-- end single -->
                <div class="flex-1">
                    <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                        {{ $data['countDpt']['verified'] }}
                    </div>
                    <div class="text-sm text-slate-600 font-light dark:text-slate-300">
                        Terverifikasi
                    </div>
                </div>
                <!-- end single -->
            </div>
            <!-- profile info-500 -->
        </div>
        <div class="grid grid-cols-12 gap-6">
            <div class="lg:col-span-4 col-span-12">
                <div class="card h-full">
                    <header class="card-header">
                        <h4 class="card-title">Info</h4>
                    </header>
                    <div class="card-body p-6">
                        <ul class="list space-y-8">
                            <li class="flex space-x-3 rtl:space-x-reverse">
                                <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                    <iconify-icon icon="heroicons:envelope"></iconify-icon>
                                </div>
                                <div class="flex-1">
                                    <div
                                        class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                        Jenis Akun
                                    </div>
                                    {{-- <a href="mailto:{{ auth()->user()->email ?: 'N/A' }}"
                                        class="text-base text-slate-600 dark:text-slate-50">
                                    </a> --}}
                                    {{ auth()->guard('web')->user()->leveltype ?: 'N/A' }}
                                </div>
                            </li>
                            <!-- end single list -->
                            <li class="flex space-x-3 rtl:space-x-reverse">
                                <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                    <iconify-icon icon="heroicons:phone-arrow-up-right"></iconify-icon>
                                </div>
                                <div class="flex-1">
                                    <div
                                        class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                        Lokasi Kerja
                                    </div>
                                    @if (auth()->guard('web')->user()->profile->level == 1)
                                        {{ auth()->guard('web')->user()->lokasi->desa ?: 'N/A' }}
                                    @elseif(auth()->guard('web')->user()->profile->level == 2)
                                        {{ auth()->guard('web')->user()->lokasi->kecamatan ?: 'N/A' }}
                                    @else
                                        {{ 'KABUPATEN' }}
                                    @endif

                                </div>
                            </li>
                            <!-- end single list -->
                            <li class="flex space-x-3 rtl:space-x-reverse">
                                <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                    <iconify-icon icon="heroicons:map"></iconify-icon>
                                </div>
                                <div class="flex-1">
                                    <div
                                        class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                        Alamat
                                    </div>
                                    <div class="text-base text-slate-600 dark:text-slate-50 break-words">
                                        {{ auth()->guard('web')->user()->profile->alamat ?: '-' }}
                                    </div>
                                </div>
                            </li>
                            <!-- end single list -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-8 col-span-12">
                <div class="card ">
                    <header class="card-header">
                        <h4 class="card-title">Edit Profile
                        </h4>
                    </header>
                    <div class="card-body px-5 py-6">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="grid sm:grid-cols-2 gap-5">
                                <div class="input-area">
                                    <label for="name" class="form-label">
                                        {{ __('Nama') }}
                                    </label>
                                    <input name="name" type="text" id="name" class="form-control"
                                        placeholder="{{ __('Masukkan Nama') }}" required
                                        value="{{ auth()->guard('web')->user()->profile->name }}">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <div class="input-area">
                                    <label for="name" class="form-label">
                                        {{ __('Alamat') }}
                                    </label>
                                    <input name="name" type="text" id="name" class="form-control"
                                        placeholder="{{ __('Masukkan Alamat') }}" required
                                        value="{{ auth()->guard('web')->user()->profile->alamat }}">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="btn btn-dark mt-3">
                                    {{ __('Ubah Profile') }}
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="card-body px-5 py-6">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="grid sm:grid-cols-2 gap-5">
                                <div class="input-area">
                                    <label for="name" class="form-label">
                                        {{ __('Password Lama') }}
                                    </label>
                                    <input name="name" type="password" id="name" class="form-control"
                                        placeholder="{{ __('Masukkan Password Lama Anda') }}" required>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <div class="input-area">
                                    <label for="name" class="form-label">
                                        {{ __('Password Baru') }}
                                    </label>
                                    <input name="name" type="password" id="name" class="form-control"
                                        placeholder="{{ __('Masukkan Password Baru Anda') }}" required>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="btn btn-dark mt-3">
                                    {{ __('Ganti Password') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            let imagePreview = function(event, id) {
                let output = document.getElementById(id);
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                }
            };
        </script>
    @endpush
</x-appLayout>
