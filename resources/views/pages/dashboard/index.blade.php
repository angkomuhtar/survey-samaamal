<x-appLayout>


    <div class="space-y-6">
        <div class="flex justify-between flex-wrap items-center mb-6">
            <h4
                class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-1 sm:mb-0">
                DASHBOARD</h4>
        </div>

        <div class="grid sm:grid-cols-2 xl:grid-cols-9 gap-7">
            <div class="dasboardCard bg-white dark:bg-slate-800 rounded-md px-5 py-4 flex items-center justify-between bg-center bg-cover bg-no-repeat xl:col-span-3 sm:col-span-2"
                style="background-image: url({{ asset('/images/all-img/widget-bg-4.png') }})">
                <div class="flex-1">
                    <div class="max-w-[180px]">
                        <div class="text-xl font-medium text-slate-900 mb-2">
                            <span class="block font-normal">{{ __('Hello') }},</span>
                            <span class="block capitalize">{{ auth()->guard('web')->user()->profile->name }}</span>
                        </div>
                        <p class="text-sm text-slate-900 font-normal"> Welcome to SAMA AMAL </p>
                    </div>
                </div>
                <div class="flex-none"> <img src="{{ asset('/images/svg/widgetvector.svg') }}" alt=""
                        class="ml-auto"> </div>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-md px-5 py-4 xl:col-span-2  self-center">
                <div class="pl-14 relative">
                    <div
                        class="w-10 h-10 rounded-full bg-sky-100 text-sky-800 text-base flex items-center justify-center absolute left-0 top-2">
                        <iconify-icon icon="heroicons:user-group-20-solid"></iconify-icon>
                    </div>
                    <h4 class="font-Interfont-normal text-sm text-textColor dark:text-white pb-1">
                        {{ __('Total DPT') }}
                    </h4>
                    <p class="font-Intertext-xl text-black dark:text-white font-medium">
                        {{ $data['countDpt']['total'] }}
                    </p>
                </div>
                <div class="ml-auto w-24">
                    <div id="EChart"></div>
                </div>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-md px-5 py-4 xl:col-span-2 self-center">
                <div class="pl-14 relative">
                    <div
                        class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-800 text-base flex items-center justify-center absolute left-0 top-2">
                        <iconify-icon icon="heroicons:check-badge-20-solid"></iconify-icon>
                    </div>
                    <h4 class="font-Interfont-normal text-sm text-textColor dark:text-white pb-1">
                        {{ __('Terverifikasi') }}
                    </h4>
                    <p class="font-Intertext-xl text-black dark:text-white font-medium">
                        {{ $data['countDpt']['verified'] }}
                    </p>
                </div>
                <div class="ml-auto w-24">
                    <div id="EChart2"></div>
                </div>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-md px-5 py-4 xl:col-span-2  self-center">
                <div class="pl-14 relative">
                    <div
                        class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-800 text-base flex items-center justify-center absolute left-0 top-2">
                        <iconify-icon icon="carbon:growth"></iconify-icon>
                    </div>
                    <h4 class="font-Interfont-normal text-sm text-textColor dark:text-white pb-1">
                        {{ __('Tersurvey') }}
                    </h4>
                    <p class="font-Intertext-xl text-black dark:text-white font-medium">
                        {{ $data['countDpt']['survey'] }}
                    </p>
                </div>
                <div class="ml-auto w-24">
                    <div id="EChart3"></div>
                </div>
            </div>
        </div>

        <div class="xl:flex gap-y-8 xl:gap-8 overflow-hidden">
            <div class="xl:w-8/12 bg-white dark:bg-slate-800 overflow-hidden p-6 rounded-md">
                <div id="barChartOne"></div>
            </div>
            <div class="xl:w-4/12  bg-white dark:bg-slate-800 overflow-hidden p-6 rounded-md">
                <div id="chartCount"></div>
            </div>
        </div>
    </div>


    @push('scripts')
        @vite(['resources/js/plugins/jquery-jvectormap-2.0.5.min.js'])
        @vite(['resources/js/plugins/jquery-jvectormap-world-mill-en.js'])
        @vite(['resources/js/custom/chart-active.js'])
        <script type="module">
            let byGenrationConfig = {
                series: [{
                        name: '{{ $data['byGeneration']['genZ']['title'] }}',
                        data: {{ Js::from($data['byGeneration']['genZ']['data']) }},
                    },
                    {
                        name: '{{ $data['byGeneration']['millenial']['title'] }}',
                        data: {{ Js::from($data['byGeneration']['millenial']['data']) }},
                    },
                    {
                        name: '{{ $data['byGeneration']['genX']['title'] }}',
                        data: {{ Js::from($data['byGeneration']['genX']['data']) }},
                    },
                    {
                        name: '{{ $data['byGeneration']['boomer']['title'] }}',
                        data: {{ Js::from($data['byGeneration']['boomer']['data']) }},
                    },
                ],
                chart: {
                    type: "bar",
                    height: 350,
                    width: "100%",
                    toolbar: {
                        show: false,
                    },
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "45%",
                        endingShape: "rounded",
                    },
                },
                legend: {
                    show: true,
                    position: "top",
                    horizontalAlign: "right",
                    fontSize: "13px",
                    fontFamily: "Inter",
                    offsetY: -30,
                    markers: {
                        width: 12,
                        height: 12,
                        radius: 12,
                    },
                    itemMargin: {
                        horizontal: 8,
                        vertical: 0,
                    },
                    onItemClick: {
                        toggleDataSeries: true,
                    },
                    onItemHover: {
                        highlightDataSeries: true,
                    },
                },
                title: {
                    text: "Perolehan Suara per Generasi",
                    align: "left",
                    offsetX: 0,
                    offsetY: 13,
                    floating: false,
                    style: {
                        fontSize: "20px",
                        fontWeight: "medium",
                        fontFamily: "Inter",
                        color: "##111112",
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ["transparent"],
                },
                yaxis: {
                    labels: {
                        style: {
                            fontFamily: "Inter",
                        },
                    },
                },
                xaxis: {
                    categories: {{ Js::from($data['byGeneration']['paslon']) }},
                    labels: {
                        style: {
                            fontFamily: "Inter",
                        },
                    },
                },
                fill: {
                    opacity: 1,
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " Suara";
                        },
                    },
                },
                colors: ["#4669FA", "#0CE7FA", "#FA916B"],
                grid: {
                    show: true,
                    borderColor: "#E2E8F0",
                    strokeDashArray: 10,
                    position: "back",
                },
                responsive: [{
                    breakpoint: 600,
                    options: {
                        legend: {
                            position: "bottom",
                            offsetY: 0,
                            horizontalAlign: "center",
                        },
                        plotOptions: {
                            bar: {
                                columnWidth: "80%",
                            },
                        },
                    },
                }, ],
            };
            const revenueReportSelector = document.querySelector("#barChartOne");
            const chartCount = document.querySelector("#chartCount");
            const chartDelay = setTimeout(delayChart, 50);
            let byGenration = new ApexCharts(
                revenueReportSelector,
                byGenrationConfig
            );

            var options = {
                series: [{
                    name: 'Memilih',
                    data: [44, 55, 20, 21]
                }, {
                    name: 'Abu-Abu',
                    data: [53, 32, 30, 0]
                }],
                chart: {
                    type: 'bar',
                    height: 350,
                    stacked: true,
                },
                colors: ['#4769fa', '#a1a1a1'],
                plotOptions: {
                    bar: {
                        horizontal: true,
                        dataLabels: {
                            total: {
                                enabled: true,
                                offsetX: 0,
                                style: {
                                    fontSize: '13px',
                                    fontWeight: 900
                                }
                            }
                        }
                    },
                },
                stroke: {
                    width: 1,
                    colors: ['#fff']
                },
                title: {
                    text: 'Jumlah Suara'
                },
                xaxis: {
                    categories: ['Paslon 1', 'Paslon 2', 'Paslon 3', 'Netral'],
                    labels: {
                        formatter: function(val) {
                            return val
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: undefined
                    },
                },
                tooltip: {
                    x: {
                        formatter: function(val) {
                            return val + " Suara"
                        }
                    }
                },
                fill: {
                    opacity: 1
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'left',
                    offsetX: 40
                }
            };

            var chart = new ApexCharts(document.querySelector("#chartCount"), options);
            chart.render();

            function delayChart() {
                byGenration.render();
            }




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
