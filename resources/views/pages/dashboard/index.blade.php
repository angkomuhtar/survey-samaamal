<x-appLayout>


    <div>
        <div class="flex justify-between flex-wrap items-center mb-6">
            <h4
                class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-1 sm:mb-0">
                CRM</h4>
            <div class="flex sm:space-x-4 space-x-2 sm:justify-end items-center rtl:space-x-reverse">
                <button
                    class="btn inline-flex justify-center bg-white text-slate-700 dark:bg-slate-700 !font-normal dark:text-white ">
                    <span class="flex items-center">
                        <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2 font-light"
                            icon="heroicons-outline:calendar"></iconify-icon>
                        <span>Weekly</span>
                    </span>
                </button>
                <button
                    class="btn inline-flex justify-center bg-white text-slate-700 dark:bg-slate-700 !font-normal dark:text-white ">
                    <span class="flex items-center">
                        <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2 font-light"
                            icon="heroicons-outline:filter"></iconify-icon>
                        <span>Select Date</span>
                    </span>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-5 mb-5">
            <div class="2xl:col-span-3 lg:col-span-4 col-span-12">
                <div class="bg-no-repeat bg-cover bg-center p-4 rounded-[6px] relative"
                    style="background-image: url({{ asset('images/all-img/widget-bg-1.png') }})">
                    <div class="max-w-[180px]">
                        <div class="text-xl font-medium text-slate-900 mb-2">
                            Upgrade your Dashcode
                        </div>
                        <p class="text-sm text-slate-800">
                            Pro plan for better results
                        </p>
                    </div>
                    <div
                        class="absolute top-1/2 -translate-y-1/2 ltr:right-6 rtl:left-6 mt-2 h-12 w-12 bg-white rounded-full text-xs font-medium
                            flex flex-col items-center justify-center">
                        Now
                    </div>
                </div>
            </div>
            <div class="2xl:col-span-9 lg:col-span-8 col-span-12">
                <div class="p-4 card">
                    <div class="grid md:grid-cols-3 col-span-1 gap-4">

                        <!-- Revenue -->
                        <div class="py-[18px] px-4 rounded-[6px] bg-[#E5F9FF] dark:bg-slate-900">
                            <div class="flex items-center space-x-6 rtl:space-x-reverse">
                                <div class="flex-none">
                                    <span class="no-icon text-4xl text-primary-500">
                                        <iconify-icon icon="bx:check-double"></iconify-icon>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <div class="text-slate-800 dark:text-slate-300 text-sm mb-1 font-medium">
                                        {{ __('Total DPT') }}
                                    </div>
                                    <div class="text-slate-900 dark:text-white text-lg font-medium">
                                        {{ $data['yearlyRevenue']['total'] }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Products sold -->
                        <div class="py-[18px] px-4 rounded-[6px] bg-[#FFEDE5] dark:bg-slate-900">
                            <div class="flex items-center space-x-6 rtl:space-x-reverse">
                                <div class="flex-none">
                                    <div id="wline2"></div>
                                </div>
                                <div class="flex-1">
                                    <div class="text-slate-800 dark:text-slate-300 text-sm mb-1 font-medium">
                                        {{ __('Survey DPT') }}
                                    </div>
                                    <div class="text-slate-900 dark:text-white text-lg font-medium">
                                        {{ 240 }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Growth -->
                        <div class="py-[18px] px-4 rounded-[6px] bg-[#EAE5FF] dark:bg-slate-900">
                            <div class="flex items-center space-x-6 rtl:space-x-reverse">
                                <div class="flex-none">
                                    <div id="wline3"></div>
                                </div>
                                <div class="flex-1">
                                    <div class="text-slate-800 dark:text-slate-300 text-sm mb-1 font-medium">
                                        {{ __(' Survey Verified') }}
                                    </div>
                                    <div class="text-slate-900 dark:text-white text-lg font-medium">
                                        {{ $data['growth']['total'] . $data['growth']['postSymbol'] }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>




    </div>


    @push('scripts')
        @vite(['resources/js/plugins/jquery-jvectormap-2.0.5.min.js'])
        @vite(['resources/js/plugins/jquery-jvectormap-world-mill-en.js'])
        @vite(['resources/js/custom/chart-active.js'])
        <script type="module">
            $("#world-map").vectorMap({
                map: "world_mill_en",
                normalizeFunction: "polynomial",
                hoverOpacity: 0.7,
                hoverColor: false,

                regionStyle: {
                    initial: {
                        fill: "#8092FF"
                    },
                    hover: {
                        fill: "#4669fa",
                        "fill-opacity": 1
                    },
                },

                backgroundColor: "transparent",
            });
        </script>
    @endpush


</x-appLayout>
