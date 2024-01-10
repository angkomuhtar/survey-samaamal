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
        <div class=" space-y-5">
            <div class="grid grid-cols-12 gap-5">
                <div class="lg:col-span-8 col-span-12 space-y-5">
                    <div class="card p-6">
                        <div class="grid xl:grid-cols-4 lg:grid-cols-2 col-span-1 gap-3">

                            <!-- BEGIN: Group Chart4 -->


                            <div
                                class="bg-warning-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-25 relative z-[1]">
                                <div class="overlay absolute left-0 top-0 w-full h-full z-[-1]">
                                    <img src="assets/images/all-img/shade-1.png" alt="" draggable="false"
                                        class="w-full h-full object-contain">
                                </div>
                                <span class="block mb-6 text-sm text-slate-900 dark:text-white font-medium">
                                    Sales
                                </span>
                                <span class="block mb- text-2xl text-slate-900 dark:text-white font-medium mb-6">
                                    354
                                </span>
                                <div class="flex space-x-2 rtl:space-x-reverse">
                                    <div class="flex-none text-xl  text-primary-500">
                                        <iconify-icon icon="heroicons:arrow-trending-up"></iconify-icon>
                                    </div>
                                    <div class="flex-1 text-sm">
                                        <span class="block mb-[2px] text-primary-500">
                                            25.67%
                                        </span>
                                        <span class="block mb-1 text-slate-600 dark:text-slate-300">
                                            From last week
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-info-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-25 relative z-[1]">
                                <div class="overlay absolute left-0 top-0 w-full h-full z-[-1]">
                                    <img src="assets/images/all-img/shade-2.png" alt="" draggable="false"
                                        class="w-full h-full object-contain">
                                </div>
                                <span class="block mb-6 text-sm text-slate-900 dark:text-white font-medium">
                                    Revenue
                                </span>
                                <span class="block mb- text-2xl text-slate-900 dark:text-white font-medium mb-6">
                                    $86,954
                                </span>
                                <div class="flex space-x-2 rtl:space-x-reverse">
                                    <div class="flex-none text-xl  text-primary-500">
                                        <iconify-icon icon="heroicons:arrow-trending-up"></iconify-icon>
                                    </div>
                                    <div class="flex-1 text-sm">
                                        <span class="block mb-[2px] text-primary-500">
                                            8.67%
                                        </span>
                                        <span class="block mb-1 text-slate-600 dark:text-slate-300">
                                            From last week
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="bg-primary-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-25 relative z-[1]">
                                <div class="overlay absolute left-0 top-0 w-full h-full z-[-1]">
                                    <img src="assets/images/all-img/shade-3.png" alt="" draggable="false"
                                        class="w-full h-full object-contain">
                                </div>
                                <span class="block mb-6 text-sm text-slate-900 dark:text-white font-medium">
                                    Conversion
                                </span>
                                <span class="block mb- text-2xl text-slate-900 dark:text-white font-medium mb-6">
                                    15%
                                </span>
                                <div class="flex space-x-2 rtl:space-x-reverse">
                                    <div class="flex-none text-xl  text-danger-500">
                                        <iconify-icon icon="heroicons:arrow-trending-down"></iconify-icon>
                                    </div>
                                    <div class="flex-1 text-sm">
                                        <span class="block mb-[2px] text-danger-500">
                                            1.67%
                                        </span>
                                        <span class="block mb-1 text-slate-600 dark:text-slate-300">
                                            From last week
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="bg-success-500 rounded-md p-4 bg-opacity-[0.15] dark:bg-opacity-25 relative z-[1]">
                                <div class="overlay absolute left-0 top-0 w-full h-full z-[-1]">
                                    <img src="assets/images/all-img/shade-4.png" alt="" draggable="false"
                                        class="w-full h-full object-contain">
                                </div>
                                <span class="block mb-6 text-sm text-slate-900 dark:text-white font-medium">
                                    Leads
                                </span>
                                <span class="block mb- text-2xl text-slate-900 dark:text-white font-medium mb-6">
                                    654
                                </span>
                                <div class="flex space-x-2 rtl:space-x-reverse">
                                    <div class="flex-none text-xl  text-primary-500">
                                        <iconify-icon icon="heroicons:arrow-trending-up"></iconify-icon>
                                    </div>
                                    <div class="flex-1 text-sm">
                                        <span class="block mb-[2px] text-primary-500">
                                            11.67%
                                        </span>
                                        <span class="block mb-1 text-slate-600 dark:text-slate-300">
                                            From last week
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- END: Group Chart3 -->
                        </div>
                    </div>
                    <div class="card p-6">
                        <header class="md:flex md:space-y-0 space-y-4">
                            <h6 class="flex-1 text-slate-900 dark:text-white capitalize">
                                Deal distribution by stage
                            </h6>
                        </header>
                        <div class="legend-ring">
                            <div id="stack-bar-chart" style="min-height: 425px;">
                                <div id="apexchartst3m1pp3n"
                                    class="apexcharts-canvas apexchartst3m1pp3n apexcharts-theme-light"
                                    style="width: 685px; height: 410px;"><svg id="SvgjsSvg1205" width="685"
                                        height="410" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                        class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                        style="background: transparent;">
                                        <foreignObject x="0" y="0" width="685" height="410">
                                            <div class="apexcharts-legend apexcharts-align-center apx-legend-position-bottom"
                                                xmlns="http://www.w3.org/1999/xhtml"
                                                style="inset: auto 0px 5px; position: absolute; max-height: 205px;">
                                                <div class="apexcharts-legend-series" rel="1"
                                                    seriesname="Salesxqualified" data:collapsed="false"
                                                    style="margin: 0px 18px;"><span class="apexcharts-legend-marker"
                                                        rel="1" data:collapsed="false"
                                                        style="background: rgb(70, 105, 250) !important; color: rgb(70, 105, 250); height: 6px; width: 6px; left: -5px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                        class="apexcharts-legend-text" rel="1" i="0"
                                                        data:default-text="Sales%20qualified" data:collapsed="false"
                                                        style="color: rgb(71, 85, 105); font-size: 12px; font-weight: 400; font-family: Inter;">Sales
                                                        qualified</span></div>
                                                <div class="apexcharts-legend-series" rel="2"
                                                    seriesname="Meeting" data:collapsed="false"
                                                    style="margin: 0px 18px;"><span class="apexcharts-legend-marker"
                                                        rel="2" data:collapsed="false"
                                                        style="background: rgb(12, 231, 250) !important; color: rgb(12, 231, 250); height: 6px; width: 6px; left: -5px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                        class="apexcharts-legend-text" rel="2" i="1"
                                                        data:default-text="Meeting" data:collapsed="false"
                                                        style="color: rgb(71, 85, 105); font-size: 12px; font-weight: 400; font-family: Inter;">Meeting</span>
                                                </div>
                                                <div class="apexcharts-legend-series" rel="3"
                                                    seriesname="Inxnegotiation" data:collapsed="false"
                                                    style="margin: 0px 18px;"><span class="apexcharts-legend-marker"
                                                        rel="3" data:collapsed="false"
                                                        style="background: rgb(250, 145, 107) !important; color: rgb(250, 145, 107); height: 6px; width: 6px; left: -5px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                        class="apexcharts-legend-text" rel="3" i="2"
                                                        data:default-text="In%20negotiation" data:collapsed="false"
                                                        style="color: rgb(71, 85, 105); font-size: 12px; font-weight: 400; font-family: Inter;">In
                                                        negotiation</span></div>
                                            </div>
                                            <style type="text/css">
                                                .apexcharts-legend {
                                                    display: flex;
                                                    overflow: auto;
                                                    padding: 0 10px;
                                                }

                                                .apexcharts-legend.apx-legend-position-bottom,
                                                .apexcharts-legend.apx-legend-position-top {
                                                    flex-wrap: wrap
                                                }

                                                .apexcharts-legend.apx-legend-position-right,
                                                .apexcharts-legend.apx-legend-position-left {
                                                    flex-direction: column;
                                                    bottom: 0;
                                                }

                                                .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                .apexcharts-legend.apx-legend-position-right,
                                                .apexcharts-legend.apx-legend-position-left {
                                                    justify-content: flex-start;
                                                }

                                                .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                    justify-content: center;
                                                }

                                                .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                    justify-content: flex-end;
                                                }

                                                .apexcharts-legend-series {
                                                    cursor: pointer;
                                                    line-height: normal;
                                                }

                                                .apexcharts-legend.apx-legend-position-bottom .apexcharts-legend-series,
                                                .apexcharts-legend.apx-legend-position-top .apexcharts-legend-series {
                                                    display: flex;
                                                    align-items: center;
                                                }

                                                .apexcharts-legend-text {
                                                    position: relative;
                                                    font-size: 14px;
                                                }

                                                .apexcharts-legend-text *,
                                                .apexcharts-legend-marker * {
                                                    pointer-events: none;
                                                }

                                                .apexcharts-legend-marker {
                                                    position: relative;
                                                    display: inline-block;
                                                    cursor: pointer;
                                                    margin-right: 3px;
                                                    border-style: solid;
                                                }

                                                .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series,
                                                .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series {
                                                    display: inline-block;
                                                }

                                                .apexcharts-legend-series.apexcharts-no-click {
                                                    cursor: auto;
                                                }

                                                .apexcharts-legend .apexcharts-hidden-zero-series,
                                                .apexcharts-legend .apexcharts-hidden-null-series {
                                                    display: none !important;
                                                }

                                                .apexcharts-inactive-legend {
                                                    opacity: 0.45;
                                                }
                                            </style>
                                        </foreignObject>
                                        <g id="SvgjsG1208" class="apexcharts-annotations"></g>
                                        <g id="SvgjsG1337" class="apexcharts-yaxis" rel="0"
                                            transform="translate(17.421875, 0)">
                                            <g id="SvgjsG1338" class="apexcharts-yaxis-texts-g"><text
                                                    id="SvgjsText1340" font-family="Inter" x="20" y="31.4"
                                                    text-anchor="end" dominant-baseline="auto" font-size="11px"
                                                    font-weight="400" fill="#475569"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Inter;">
                                                    <tspan id="SvgjsTspan1341">240</tspan>
                                                    <title>240</title>
                                                </text><text id="SvgjsText1343" font-family="Inter" x="20"
                                                    y="113.23700000000001" text-anchor="end" dominant-baseline="auto"
                                                    font-size="11px" font-weight="400" fill="#475569"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Inter;">
                                                    <tspan id="SvgjsTspan1344">180</tspan>
                                                    <title>180</title>
                                                </text><text id="SvgjsText1346" font-family="Inter" x="20" y="195.074"
                                                    text-anchor="end" dominant-baseline="auto" font-size="11px"
                                                    font-weight="400" fill="#475569"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Inter;">
                                                    <tspan id="SvgjsTspan1347">120</tspan>
                                                    <title>120</title>
                                                </text><text id="SvgjsText1349" font-family="Inter" x="20" y="276.911"
                                                    text-anchor="end" dominant-baseline="auto" font-size="11px"
                                                    font-weight="400" fill="#475569"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Inter;">
                                                    <tspan id="SvgjsTspan1350">60</tspan>
                                                    <title>60</title>
                                                </text><text id="SvgjsText1352" font-family="Inter" x="20" y="358.748"
                                                    text-anchor="end" dominant-baseline="auto" font-size="11px"
                                                    font-weight="400" fill="#475569"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Inter;">
                                                    <tspan id="SvgjsTspan1353">0</tspan>
                                                    <title>0</title>
                                                </text></g>
                                        </g>
                                        <g id="SvgjsG1207" class="apexcharts-inner apexcharts-graphical"
                                            transform="translate(47.421875, 30)">
                                            <defs id="SvgjsDefs1206">
                                                <linearGradient id="SvgjsLinearGradient1211" x1="0"
                                                    y1="0" x2="0" y2="1">
                                                    <stop id="SvgjsStop1212" stop-opacity="0.4"
                                                        stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                                    <stop id="SvgjsStop1213" stop-opacity="0.5"
                                                        stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                    <stop id="SvgjsStop1214" stop-opacity="0.5"
                                                        stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                </linearGradient>
                                                <clipPath id="gridRectMaskt3m1pp3n">
                                                    <rect id="SvgjsRect1216" width="633.578125" height="329.348"
                                                        x="-3" y="-1" rx="0" ry="0" opacity="1"
                                                        stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="forecastMaskt3m1pp3n"></clipPath>
                                                <clipPath id="nonForecastMaskt3m1pp3n"></clipPath>
                                                <clipPath id="gridRectMarkerMaskt3m1pp3n">
                                                    <rect id="SvgjsRect1217" width="631.578125" height="331.348"
                                                        x="-2" y="-2" rx="0" ry="0" opacity="1"
                                                        stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="#fff"></rect>
                                                </clipPath>
                                            </defs>
                                            <rect id="SvgjsRect1215" width="38.35199652777777" height="327.348" x="0"
                                                y="0" rx="0" ry="0" opacity="1" stroke-width="0"
                                                stroke-dasharray="3" fill="url(#SvgjsLinearGradient1211)"
                                                class="apexcharts-xcrosshairs" y2="327.348" filter="none"
                                                fill-opacity="0.9"></rect>
                                            <g id="SvgjsG1282" class="apexcharts-grid">
                                                <g id="SvgjsG1283" class="apexcharts-gridlines-horizontal">
                                                    <line id="SvgjsLine1297" x1="0" y1="81.837"
                                                        x2="627.578125" y2="81.837" stroke="#e2e8f0"
                                                        stroke-dasharray="10" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1298" x1="0" y1="163.674"
                                                        x2="627.578125" y2="163.674" stroke="#e2e8f0"
                                                        stroke-dasharray="10" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1299" x1="0" y1="245.51100000000002"
                                                        x2="627.578125" y2="245.51100000000002" stroke="#e2e8f0"
                                                        stroke-dasharray="10" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                </g>
                                                <g id="SvgjsG1284" class="apexcharts-gridlines-vertical">
                                                    <line id="SvgjsLine1286" x1="0" y1="0"
                                                        x2="0" y2="327.348" stroke="#e2e8f0"
                                                        stroke-dasharray="10" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1287" x1="69.73090277777777" y1="0"
                                                        x2="69.73090277777777" y2="327.348" stroke="#e2e8f0"
                                                        stroke-dasharray="10" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1288" x1="139.46180555555554" y1="0"
                                                        x2="139.46180555555554" y2="327.348" stroke="#e2e8f0"
                                                        stroke-dasharray="10" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1289" x1="209.19270833333331" y1="0"
                                                        x2="209.19270833333331" y2="327.348" stroke="#e2e8f0"
                                                        stroke-dasharray="10" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1290" x1="278.9236111111111" y1="0"
                                                        x2="278.9236111111111" y2="327.348" stroke="#e2e8f0"
                                                        stroke-dasharray="10" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1291" x1="348.65451388888886" y1="0"
                                                        x2="348.65451388888886" y2="327.348" stroke="#e2e8f0"
                                                        stroke-dasharray="10" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1292" x1="418.38541666666663" y1="0"
                                                        x2="418.38541666666663" y2="327.348" stroke="#e2e8f0"
                                                        stroke-dasharray="10" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1293" x1="488.1163194444444" y1="0"
                                                        x2="488.1163194444444" y2="327.348" stroke="#e2e8f0"
                                                        stroke-dasharray="10" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1294" x1="557.8472222222222" y1="0"
                                                        x2="557.8472222222222" y2="327.348" stroke="#e2e8f0"
                                                        stroke-dasharray="10" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1295" x1="627.578125" y1="0"
                                                        x2="627.578125" y2="327.348" stroke="#e2e8f0"
                                                        stroke-dasharray="10" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                </g>
                                                <line id="SvgjsLine1302" x1="0" y1="327.348"
                                                    x2="627.578125" y2="327.348" stroke="transparent"
                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                <line id="SvgjsLine1301" x1="0" y1="1"
                                                    x2="0" y2="327.348" stroke="transparent"
                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                            </g>
                                            <g id="SvgjsG1285" class="apexcharts-grid-borders">
                                                <line id="SvgjsLine1296" x1="0" y1="0"
                                                    x2="627.578125" y2="0" stroke="#e2e8f0"
                                                    stroke-dasharray="10" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1300" x1="0" y1="327.348"
                                                    x2="627.578125" y2="327.348" stroke="#e2e8f0"
                                                    stroke-dasharray="10" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                            </g>
                                            <g id="SvgjsG1218" class="apexcharts-bar-series apexcharts-plot-series">
                                                <g id="SvgjsG1219" class="apexcharts-series"
                                                    seriesName="Salesxqualified" rel="1" data:realIndex="0">
                                                    <path id="SvgjsPath1223"
                                                        d="M 15.689453125 327.349 L 15.689453125 267.3352 L 52.04144965277777 267.3352 L 52.04144965277777 327.349 Z"
                                                        fill="rgba(70,105,250,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 15.689453125 327.349 L 15.689453125 267.3352 L 52.04144965277777 267.3352 L 52.04144965277777 327.349 Z"
                                                        pathFrom="M 15.689453125 327.349 L 15.689453125 327.349 L 52.04144965277777 327.349 L 52.04144965277777 327.349 L 52.04144965277777 327.349 L 52.04144965277777 327.349 L 52.04144965277777 327.349 L 15.689453125 327.349 Z"
                                                        cy="267.3342" cx="84.42035590277777" j="0" val="44"
                                                        barHeight="60.013799999999996" barWidth="38.35199652777777">
                                                    </path>
                                                    <path id="SvgjsPath1225"
                                                        d="M 85.42035590277777 327.349 L 85.42035590277777 252.33175000000003 L 121.77235243055554 252.33175000000003 L 121.77235243055554 327.349 Z"
                                                        fill="rgba(70,105,250,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 85.42035590277777 327.349 L 85.42035590277777 252.33175000000003 L 121.77235243055554 252.33175000000003 L 121.77235243055554 327.349 Z"
                                                        pathFrom="M 85.42035590277777 327.349 L 85.42035590277777 327.349 L 121.77235243055554 327.349 L 121.77235243055554 327.349 L 121.77235243055554 327.349 L 121.77235243055554 327.349 L 121.77235243055554 327.349 L 85.42035590277777 327.349 Z"
                                                        cy="252.33075000000002" cx="154.15125868055554" j="1"
                                                        val="55" barHeight="75.01725"
                                                        barWidth="38.35199652777777"></path>
                                                    <path id="SvgjsPath1227"
                                                        d="M 155.15125868055554 327.349 L 155.15125868055554 249.60385000000002 L 191.50325520833331 249.60385000000002 L 191.50325520833331 327.349 Z"
                                                        fill="rgba(70,105,250,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 155.15125868055554 327.349 L 155.15125868055554 249.60385000000002 L 191.50325520833331 249.60385000000002 L 191.50325520833331 327.349 Z"
                                                        pathFrom="M 155.15125868055554 327.349 L 155.15125868055554 327.349 L 191.50325520833331 327.349 L 191.50325520833331 327.349 L 191.50325520833331 327.349 L 191.50325520833331 327.349 L 191.50325520833331 327.349 L 155.15125868055554 327.349 Z"
                                                        cy="249.60285000000002" cx="223.88216145833331" j="2"
                                                        val="57" barHeight="77.74515"
                                                        barWidth="38.35199652777777"></path>
                                                    <path id="SvgjsPath1229"
                                                        d="M 224.88216145833331 327.349 L 224.88216145833331 250.96780000000004 L 261.2341579861111 250.96780000000004 L 261.2341579861111 327.349 Z"
                                                        fill="rgba(70,105,250,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 224.88216145833331 327.349 L 224.88216145833331 250.96780000000004 L 261.2341579861111 250.96780000000004 L 261.2341579861111 327.349 Z"
                                                        pathFrom="M 224.88216145833331 327.349 L 224.88216145833331 327.349 L 261.2341579861111 327.349 L 261.2341579861111 327.349 L 261.2341579861111 327.349 L 261.2341579861111 327.349 L 261.2341579861111 327.349 L 224.88216145833331 327.349 Z"
                                                        cy="250.96680000000003" cx="293.6130642361111" j="3"
                                                        val="56" barHeight="76.38119999999999"
                                                        barWidth="38.35199652777777"></path>
                                                    <path id="SvgjsPath1231"
                                                        d="M 294.6130642361111 327.349 L 294.6130642361111 244.14805 L 330.96506076388886 244.14805 L 330.96506076388886 327.349 Z"
                                                        fill="rgba(70,105,250,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 294.6130642361111 327.349 L 294.6130642361111 244.14805 L 330.96506076388886 244.14805 L 330.96506076388886 327.349 Z"
                                                        pathFrom="M 294.6130642361111 327.349 L 294.6130642361111 327.349 L 330.96506076388886 327.349 L 330.96506076388886 327.349 L 330.96506076388886 327.349 L 330.96506076388886 327.349 L 330.96506076388886 327.349 L 294.6130642361111 327.349 Z"
                                                        cy="244.14705" cx="363.34396701388886" j="4" val="61"
                                                        barHeight="83.20095" barWidth="38.35199652777777"></path>
                                                    <path id="SvgjsPath1233"
                                                        d="M 364.34396701388886 327.349 L 364.34396701388886 248.2399 L 400.69596354166663 248.2399 L 400.69596354166663 327.349 Z"
                                                        fill="rgba(70,105,250,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 364.34396701388886 327.349 L 364.34396701388886 248.2399 L 400.69596354166663 248.2399 L 400.69596354166663 327.349 Z"
                                                        pathFrom="M 364.34396701388886 327.349 L 364.34396701388886 327.349 L 400.69596354166663 327.349 L 400.69596354166663 327.349 L 400.69596354166663 327.349 L 400.69596354166663 327.349 L 400.69596354166663 327.349 L 364.34396701388886 327.349 Z"
                                                        cy="248.2389" cx="433.07486979166663" j="5" val="58"
                                                        barHeight="79.1091" barWidth="38.35199652777777"></path>
                                                    <path id="SvgjsPath1235"
                                                        d="M 434.07486979166663 327.349 L 434.07486979166663 241.42015 L 470.4268663194444 241.42015 L 470.4268663194444 327.349 Z"
                                                        fill="rgba(70,105,250,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 434.07486979166663 327.349 L 434.07486979166663 241.42015 L 470.4268663194444 241.42015 L 470.4268663194444 327.349 Z"
                                                        pathFrom="M 434.07486979166663 327.349 L 434.07486979166663 327.349 L 470.4268663194444 327.349 L 470.4268663194444 327.349 L 470.4268663194444 327.349 L 470.4268663194444 327.349 L 470.4268663194444 327.349 L 434.07486979166663 327.349 Z"
                                                        cy="241.41915" cx="502.8057725694444" j="6" val="63"
                                                        barHeight="85.92885" barWidth="38.35199652777777"></path>
                                                    <path id="SvgjsPath1237"
                                                        d="M 503.8057725694444 327.349 L 503.8057725694444 245.51200000000003 L 540.1577690972222 245.51200000000003 L 540.1577690972222 327.349 Z"
                                                        fill="rgba(70,105,250,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 503.8057725694444 327.349 L 503.8057725694444 245.51200000000003 L 540.1577690972222 245.51200000000003 L 540.1577690972222 327.349 Z"
                                                        pathFrom="M 503.8057725694444 327.349 L 503.8057725694444 327.349 L 540.1577690972222 327.349 L 540.1577690972222 327.349 L 540.1577690972222 327.349 L 540.1577690972222 327.349 L 540.1577690972222 327.349 L 503.8057725694444 327.349 Z"
                                                        cy="245.51100000000002" cx="572.5366753472222" j="7"
                                                        val="60" barHeight="81.837"
                                                        barWidth="38.35199652777777"></path>
                                                    <path id="SvgjsPath1239"
                                                        d="M 573.5366753472222 327.349 L 573.5366753472222 237.3283 L 609.888671875 237.3283 L 609.888671875 327.349 Z"
                                                        fill="rgba(70,105,250,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 573.5366753472222 327.349 L 573.5366753472222 237.3283 L 609.888671875 237.3283 L 609.888671875 327.349 Z"
                                                        pathFrom="M 573.5366753472222 327.349 L 573.5366753472222 327.349 L 609.888671875 327.349 L 609.888671875 327.349 L 609.888671875 327.349 L 609.888671875 327.349 L 609.888671875 327.349 L 573.5366753472222 327.349 Z"
                                                        cy="237.3273" cx="642.267578125" j="8" val="66"
                                                        barHeight="90.0207" barWidth="38.35199652777777"></path>
                                                    <g id="SvgjsG1221" class="apexcharts-bar-goals-markers"
                                                        style="pointer-events: none">
                                                        <g id="SvgjsG1222" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1224" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1226" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1228" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1230" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1232" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1234" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1236" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1238" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1240" class="apexcharts-series" seriesName="Meeting"
                                                    rel="2" data:realIndex="1">
                                                    <path id="SvgjsPath1244"
                                                        d="M 15.689453125 267.33619999999996 L 15.689453125 163.676 L 52.04144965277777 163.676 L 52.04144965277777 267.33619999999996 Z"
                                                        fill="rgba(12,231,250,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 15.689453125 267.33619999999996 L 15.689453125 163.676 L 52.04144965277777 163.676 L 52.04144965277777 267.33619999999996 Z"
                                                        pathFrom="M 15.689453125 267.33619999999996 L 15.689453125 267.33619999999996 L 52.04144965277777 267.33619999999996 L 52.04144965277777 267.33619999999996 L 52.04144965277777 267.33619999999996 L 52.04144965277777 267.33619999999996 L 52.04144965277777 267.33619999999996 L 15.689453125 267.33619999999996 Z"
                                                        cy="163.67499999999998" cx="84.42035590277777" j="0"
                                                        val="76" barHeight="103.6602"
                                                        barWidth="38.35199652777777"></path>
                                                    <path id="SvgjsPath1246"
                                                        d="M 85.42035590277777 252.33275000000003 L 85.42035590277777 136.39700000000002 L 121.77235243055554 136.39700000000002 L 121.77235243055554 252.33275000000003 Z"
                                                        fill="rgba(12,231,250,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 85.42035590277777 252.33275000000003 L 85.42035590277777 136.39700000000002 L 121.77235243055554 136.39700000000002 L 121.77235243055554 252.33275000000003 Z"
                                                        pathFrom="M 85.42035590277777 252.33275000000003 L 85.42035590277777 252.33275000000003 L 121.77235243055554 252.33275000000003 L 121.77235243055554 252.33275000000003 L 121.77235243055554 252.33275000000003 L 121.77235243055554 252.33275000000003 L 121.77235243055554 252.33275000000003 L 85.42035590277777 252.33275000000003 Z"
                                                        cy="136.39600000000002" cx="154.15125868055554" j="1"
                                                        val="85" barHeight="115.93575"
                                                        barWidth="38.35199652777777"></path>
                                                    <path id="SvgjsPath1248"
                                                        d="M 155.15125868055554 249.60485000000003 L 155.15125868055554 111.84590000000003 L 191.50325520833331 111.84590000000003 L 191.50325520833331 249.60485000000003 Z"
                                                        fill="rgba(12,231,250,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 155.15125868055554 249.60485000000003 L 155.15125868055554 111.84590000000003 L 191.50325520833331 111.84590000000003 L 191.50325520833331 249.60485000000003 Z"
                                                        pathFrom="M 155.15125868055554 249.60485000000003 L 155.15125868055554 249.60485000000003 L 191.50325520833331 249.60485000000003 L 191.50325520833331 249.60485000000003 L 191.50325520833331 249.60485000000003 L 191.50325520833331 249.60485000000003 L 191.50325520833331 249.60485000000003 L 155.15125868055554 249.60485000000003 Z"
                                                        cy="111.84490000000002" cx="223.88216145833331" j="2"
                                                        val="101" barHeight="137.75895"
                                                        barWidth="38.35199652777777"></path>
                                                    <path id="SvgjsPath1250"
                                                        d="M 224.88216145833331 250.96880000000004 L 224.88216145833331 117.30170000000004 L 261.2341579861111 117.30170000000004 L 261.2341579861111 250.96880000000004 Z"
                                                        fill="rgba(12,231,250,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 224.88216145833331 250.96880000000004 L 224.88216145833331 117.30170000000004 L 261.2341579861111 117.30170000000004 L 261.2341579861111 250.96880000000004 Z"
                                                        pathFrom="M 224.88216145833331 250.96880000000004 L 224.88216145833331 250.96880000000004 L 261.2341579861111 250.96880000000004 L 261.2341579861111 250.96880000000004 L 261.2341579861111 250.96880000000004 L 261.2341579861111 250.96880000000004 L 261.2341579861111 250.96880000000004 L 224.88216145833331 250.96880000000004 Z"
                                                        cy="117.30070000000003" cx="293.6130642361111" j="3"
                                                        val="98" barHeight="133.6671"
                                                        barWidth="38.35199652777777"></path>
                                                    <path id="SvgjsPath1252"
                                                        d="M 294.6130642361111 244.14905000000002 L 294.6130642361111 125.48540000000001 L 330.96506076388886 125.48540000000001 L 330.96506076388886 244.14905000000002 Z"
                                                        fill="rgba(12,231,250,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 294.6130642361111 244.14905000000002 L 294.6130642361111 125.48540000000001 L 330.96506076388886 125.48540000000001 L 330.96506076388886 244.14905000000002 Z"
                                                        pathFrom="M 294.6130642361111 244.14905000000002 L 294.6130642361111 244.14905000000002 L 330.96506076388886 244.14905000000002 L 330.96506076388886 244.14905000000002 L 330.96506076388886 244.14905000000002 L 330.96506076388886 244.14905000000002 L 330.96506076388886 244.14905000000002 L 294.6130642361111 244.14905000000002 Z"
                                                        cy="125.48440000000001" cx="363.34396701388886" j="4"
                                                        val="87" barHeight="118.66365"
                                                        barWidth="38.35199652777777"></path>
                                                    <path id="SvgjsPath1254"
                                                        d="M 364.34396701388886 248.2409 L 364.34396701388886 105.02615 L 400.69596354166663 105.02615 L 400.69596354166663 248.2409 Z"
                                                        fill="rgba(12,231,250,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 364.34396701388886 248.2409 L 364.34396701388886 105.02615 L 400.69596354166663 105.02615 L 400.69596354166663 248.2409 Z"
                                                        pathFrom="M 364.34396701388886 248.2409 L 364.34396701388886 248.2409 L 400.69596354166663 248.2409 L 400.69596354166663 248.2409 L 400.69596354166663 248.2409 L 400.69596354166663 248.2409 L 400.69596354166663 248.2409 L 364.34396701388886 248.2409 Z"
                                                        cy="105.02515" cx="433.07486979166663" j="5" val="105"
                                                        barHeight="143.21475" barWidth="38.35199652777777"></path>
                                                    <path id="SvgjsPath1256"
                                                        d="M 434.07486979166663 241.42115 L 434.07486979166663 117.30170000000001 L 470.4268663194444 117.30170000000001 L 470.4268663194444 241.42115 Z"
                                                        fill="rgba(12,231,250,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 434.07486979166663 241.42115 L 434.07486979166663 117.30170000000001 L 470.4268663194444 117.30170000000001 L 470.4268663194444 241.42115 Z"
                                                        pathFrom="M 434.07486979166663 241.42115 L 434.07486979166663 241.42115 L 470.4268663194444 241.42115 L 470.4268663194444 241.42115 L 470.4268663194444 241.42115 L 470.4268663194444 241.42115 L 470.4268663194444 241.42115 L 434.07486979166663 241.42115 Z"
                                                        cy="117.3007" cx="502.8057725694444" j="6" val="91"
                                                        barHeight="124.11945" barWidth="38.35199652777777"></path>
                                                    <path id="SvgjsPath1258"
                                                        d="M 503.8057725694444 245.51300000000003 L 503.8057725694444 90.02270000000004 L 540.1577690972222 90.02270000000004 L 540.1577690972222 245.51300000000003 Z"
                                                        fill="rgba(12,231,250,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 503.8057725694444 245.51300000000003 L 503.8057725694444 90.02270000000004 L 540.1577690972222 90.02270000000004 L 540.1577690972222 245.51300000000003 Z"
                                                        pathFrom="M 503.8057725694444 245.51300000000003 L 503.8057725694444 245.51300000000003 L 540.1577690972222 245.51300000000003 L 540.1577690972222 245.51300000000003 L 540.1577690972222 245.51300000000003 L 540.1577690972222 245.51300000000003 L 540.1577690972222 245.51300000000003 L 503.8057725694444 245.51300000000003 Z"
                                                        cy="90.02170000000004" cx="572.5366753472222" j="7"
                                                        val="114" barHeight="155.4903"
                                                        barWidth="38.35199652777777"></path>
                                                    <path id="SvgjsPath1260"
                                                        d="M 573.5366753472222 237.32930000000002 L 573.5366753472222 109.11800000000002 L 609.888671875 109.11800000000002 L 609.888671875 237.32930000000002 Z"
                                                        fill="rgba(12,231,250,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 573.5366753472222 237.32930000000002 L 573.5366753472222 109.11800000000002 L 609.888671875 109.11800000000002 L 609.888671875 237.32930000000002 Z"
                                                        pathFrom="M 573.5366753472222 237.32930000000002 L 573.5366753472222 237.32930000000002 L 609.888671875 237.32930000000002 L 609.888671875 237.32930000000002 L 609.888671875 237.32930000000002 L 609.888671875 237.32930000000002 L 609.888671875 237.32930000000002 L 573.5366753472222 237.32930000000002 Z"
                                                        cy="109.11700000000002" cx="642.267578125" j="8"
                                                        val="94" barHeight="128.2113"
                                                        barWidth="38.35199652777777"></path>
                                                    <g id="SvgjsG1242" class="apexcharts-bar-goals-markers"
                                                        style="pointer-events: none">
                                                        <g id="SvgjsG1243" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1245" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1247" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1249" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1251" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1253" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1255" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1257" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1259" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1261" class="apexcharts-series"
                                                    seriesName="Inxnegotiation" rel="3" data:realIndex="2">
                                                    <path id="SvgjsPath1265"
                                                        d="M 15.689453125 163.677 L 15.689453125 115.93875 L 52.04144965277777 115.93875 L 52.04144965277777 163.677 Z"
                                                        fill="rgba(250,145,107,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 15.689453125 163.677 L 15.689453125 115.93875 L 52.04144965277777 115.93875 L 52.04144965277777 163.677 Z"
                                                        pathFrom="M 15.689453125 163.677 L 15.689453125 163.677 L 52.04144965277777 163.677 L 52.04144965277777 163.677 L 52.04144965277777 163.677 L 52.04144965277777 163.677 L 52.04144965277777 163.677 L 15.689453125 163.677 Z"
                                                        cy="115.93775" cx="84.42035590277777" j="0" val="35"
                                                        barHeight="47.73825" barWidth="38.35199652777777"></path>
                                                    <path id="SvgjsPath1267"
                                                        d="M 85.42035590277777 136.39800000000002 L 85.42035590277777 80.47605000000001 L 121.77235243055554 80.47605000000001 L 121.77235243055554 136.39800000000002 Z"
                                                        fill="rgba(250,145,107,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 85.42035590277777 136.39800000000002 L 85.42035590277777 80.47605000000001 L 121.77235243055554 80.47605000000001 L 121.77235243055554 136.39800000000002 Z"
                                                        pathFrom="M 85.42035590277777 136.39800000000002 L 85.42035590277777 136.39800000000002 L 121.77235243055554 136.39800000000002 L 121.77235243055554 136.39800000000002 L 121.77235243055554 136.39800000000002 L 121.77235243055554 136.39800000000002 L 121.77235243055554 136.39800000000002 L 85.42035590277777 136.39800000000002 Z"
                                                        cy="80.47505000000001" cx="154.15125868055554" j="1"
                                                        val="41" barHeight="55.92195"
                                                        barWidth="38.35199652777777"></path>
                                                    <path id="SvgjsPath1269"
                                                        d="M 155.15125868055554 111.84690000000003 L 155.15125868055554 62.74470000000003 L 191.50325520833331 62.74470000000003 L 191.50325520833331 111.84690000000003 Z"
                                                        fill="rgba(250,145,107,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 155.15125868055554 111.84690000000003 L 155.15125868055554 62.74470000000003 L 191.50325520833331 62.74470000000003 L 191.50325520833331 111.84690000000003 Z"
                                                        pathFrom="M 155.15125868055554 111.84690000000003 L 155.15125868055554 111.84690000000003 L 191.50325520833331 111.84690000000003 L 191.50325520833331 111.84690000000003 L 191.50325520833331 111.84690000000003 L 191.50325520833331 111.84690000000003 L 191.50325520833331 111.84690000000003 L 155.15125868055554 111.84690000000003 Z"
                                                        cy="62.74370000000003" cx="223.88216145833331" j="2"
                                                        val="36" barHeight="49.102199999999996"
                                                        barWidth="38.35199652777777"></path>
                                                    <path id="SvgjsPath1271"
                                                        d="M 224.88216145833331 117.30270000000004 L 224.88216145833331 81.84000000000005 L 261.2341579861111 81.84000000000005 L 261.2341579861111 117.30270000000004 Z"
                                                        fill="rgba(250,145,107,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 224.88216145833331 117.30270000000004 L 224.88216145833331 81.84000000000005 L 261.2341579861111 81.84000000000005 L 261.2341579861111 117.30270000000004 Z"
                                                        pathFrom="M 224.88216145833331 117.30270000000004 L 224.88216145833331 117.30270000000004 L 261.2341579861111 117.30270000000004 L 261.2341579861111 117.30270000000004 L 261.2341579861111 117.30270000000004 L 261.2341579861111 117.30270000000004 L 261.2341579861111 117.30270000000004 L 224.88216145833331 117.30270000000004 Z"
                                                        cy="81.83900000000004" cx="293.6130642361111" j="3"
                                                        val="26" barHeight="35.4627"
                                                        barWidth="38.35199652777777"></path>
                                                    <path id="SvgjsPath1273"
                                                        d="M 294.6130642361111 125.48640000000002 L 294.6130642361111 64.10865000000001 L 330.96506076388886 64.10865000000001 L 330.96506076388886 125.48640000000002 Z"
                                                        fill="rgba(250,145,107,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 294.6130642361111 125.48640000000002 L 294.6130642361111 64.10865000000001 L 330.96506076388886 64.10865000000001 L 330.96506076388886 125.48640000000002 Z"
                                                        pathFrom="M 294.6130642361111 125.48640000000002 L 294.6130642361111 125.48640000000002 L 330.96506076388886 125.48640000000002 L 330.96506076388886 125.48640000000002 L 330.96506076388886 125.48640000000002 L 330.96506076388886 125.48640000000002 L 330.96506076388886 125.48640000000002 L 294.6130642361111 125.48640000000002 Z"
                                                        cy="64.10765" cx="363.34396701388886" j="4" val="45"
                                                        barHeight="61.37775" barWidth="38.35199652777777"></path>
                                                    <path id="SvgjsPath1275"
                                                        d="M 364.34396701388886 105.02715 L 364.34396701388886 39.55755 L 400.69596354166663 39.55755 L 400.69596354166663 105.02715 Z"
                                                        fill="rgba(250,145,107,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 364.34396701388886 105.02715 L 364.34396701388886 39.55755 L 400.69596354166663 39.55755 L 400.69596354166663 105.02715 Z"
                                                        pathFrom="M 364.34396701388886 105.02715 L 364.34396701388886 105.02715 L 400.69596354166663 105.02715 L 400.69596354166663 105.02715 L 400.69596354166663 105.02715 L 400.69596354166663 105.02715 L 400.69596354166663 105.02715 L 364.34396701388886 105.02715 Z"
                                                        cy="39.55655" cx="433.07486979166663" j="5" val="48"
                                                        barHeight="65.4696" barWidth="38.35199652777777"></path>
                                                    <path id="SvgjsPath1277"
                                                        d="M 434.07486979166663 117.30270000000002 L 434.07486979166663 46.37730000000001 L 470.4268663194444 46.37730000000001 L 470.4268663194444 117.30270000000002 Z"
                                                        fill="rgba(250,145,107,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 434.07486979166663 117.30270000000002 L 434.07486979166663 46.37730000000001 L 470.4268663194444 46.37730000000001 L 470.4268663194444 117.30270000000002 Z"
                                                        pathFrom="M 434.07486979166663 117.30270000000002 L 434.07486979166663 117.30270000000002 L 470.4268663194444 117.30270000000002 L 470.4268663194444 117.30270000000002 L 470.4268663194444 117.30270000000002 L 470.4268663194444 117.30270000000002 L 470.4268663194444 117.30270000000002 L 434.07486979166663 117.30270000000002 Z"
                                                        cy="46.376300000000015" cx="502.8057725694444" j="6"
                                                        val="52" barHeight="70.9254"
                                                        barWidth="38.35199652777777"></path>
                                                    <path id="SvgjsPath1279"
                                                        d="M 503.8057725694444 90.02370000000005 L 503.8057725694444 17.734350000000045 L 540.1577690972222 17.734350000000045 L 540.1577690972222 90.02370000000005 Z"
                                                        fill="rgba(250,145,107,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 503.8057725694444 90.02370000000005 L 503.8057725694444 17.734350000000045 L 540.1577690972222 17.734350000000045 L 540.1577690972222 90.02370000000005 Z"
                                                        pathFrom="M 503.8057725694444 90.02370000000005 L 503.8057725694444 90.02370000000005 L 540.1577690972222 90.02370000000005 L 540.1577690972222 90.02370000000005 L 540.1577690972222 90.02370000000005 L 540.1577690972222 90.02370000000005 L 540.1577690972222 90.02370000000005 L 503.8057725694444 90.02370000000005 Z"
                                                        cy="17.733350000000044" cx="572.5366753472222" j="7"
                                                        val="53" barHeight="72.28935"
                                                        barWidth="38.35199652777777"></path>
                                                    <path id="SvgjsPath1281"
                                                        d="M 573.5366753472222 109.11900000000003 L 573.5366753472222 53.19705000000002 L 609.888671875 53.19705000000002 L 609.888671875 109.11900000000003 Z"
                                                        fill="rgba(250,145,107,1)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="2" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskt3m1pp3n)"
                                                        pathTo="M 573.5366753472222 109.11900000000003 L 573.5366753472222 53.19705000000002 L 609.888671875 53.19705000000002 L 609.888671875 109.11900000000003 Z"
                                                        pathFrom="M 573.5366753472222 109.11900000000003 L 573.5366753472222 109.11900000000003 L 609.888671875 109.11900000000003 L 609.888671875 109.11900000000003 L 609.888671875 109.11900000000003 L 609.888671875 109.11900000000003 L 609.888671875 109.11900000000003 L 573.5366753472222 109.11900000000003 Z"
                                                        cy="53.19605000000002" cx="642.267578125" j="8"
                                                        val="41" barHeight="55.92195"
                                                        barWidth="38.35199652777777"></path>
                                                    <g id="SvgjsG1263" class="apexcharts-bar-goals-markers"
                                                        style="pointer-events: none">
                                                        <g id="SvgjsG1264" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1266" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1268" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1270" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1272" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1274" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1276" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1278" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1280" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1220" class="apexcharts-datalabels" data:realIndex="0">
                                                </g>
                                                <g id="SvgjsG1241" class="apexcharts-datalabels" data:realIndex="1">
                                                </g>
                                                <g id="SvgjsG1262" class="apexcharts-datalabels" data:realIndex="2">
                                                </g>
                                            </g>
                                            <line id="SvgjsLine1303" x1="0" y1="0" x2="627.578125"
                                                y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                                                stroke-width="1" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine1304" x1="0" y1="0"
                                                x2="627.578125" y2="0" stroke-dasharray="0"
                                                stroke-width="0" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs-hidden"></line>
                                            <g id="SvgjsG1305" class="apexcharts-yaxis-annotations"></g>
                                            <g id="SvgjsG1306" class="apexcharts-xaxis-annotations"></g>
                                            <g id="SvgjsG1307" class="apexcharts-point-annotations"></g>
                                            <g id="SvgjsG1308" class="apexcharts-xaxis"
                                                transform="translate(0, 0)">
                                                <g id="SvgjsG1309" class="apexcharts-xaxis-texts-g"
                                                    transform="translate(0, -7)"><text id="SvgjsText1311"
                                                        font-family="Inter" x="34.865451388888886" y="353.348"
                                                        text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" font-weight="400" fill="#475569"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Inter;">
                                                        <tspan id="SvgjsTspan1312">Feb</tspan>
                                                        <title>Feb</title>
                                                    </text><text id="SvgjsText1314" font-family="Inter"
                                                        x="104.59635416666666" y="353.348" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#475569"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Inter;">
                                                        <tspan id="SvgjsTspan1315">Mar</tspan>
                                                        <title>Mar</title>
                                                    </text><text id="SvgjsText1317" font-family="Inter"
                                                        x="174.32725694444443" y="353.348" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#475569"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Inter;">
                                                        <tspan id="SvgjsTspan1318">Apr</tspan>
                                                        <title>Apr</title>
                                                    </text><text id="SvgjsText1320" font-family="Inter"
                                                        x="244.0581597222222" y="353.348" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#475569"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Inter;">
                                                        <tspan id="SvgjsTspan1321">May</tspan>
                                                        <title>May</title>
                                                    </text><text id="SvgjsText1323" font-family="Inter"
                                                        x="313.7890625" y="353.348" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#475569"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Inter;">
                                                        <tspan id="SvgjsTspan1324">Jun</tspan>
                                                        <title>Jun</title>
                                                    </text><text id="SvgjsText1326" font-family="Inter"
                                                        x="383.5199652777777" y="353.348" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#475569"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Inter;">
                                                        <tspan id="SvgjsTspan1327">Jul</tspan>
                                                        <title>Jul</title>
                                                    </text><text id="SvgjsText1329" font-family="Inter"
                                                        x="453.25086805555554" y="353.348" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#475569"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Inter;">
                                                        <tspan id="SvgjsTspan1330">Aug</tspan>
                                                        <title>Aug</title>
                                                    </text><text id="SvgjsText1332" font-family="Inter"
                                                        x="522.9817708333333" y="353.348" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#475569"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Inter;">
                                                        <tspan id="SvgjsTspan1333">Sep</tspan>
                                                        <title>Sep</title>
                                                    </text><text id="SvgjsText1335" font-family="Inter"
                                                        x="592.7126736111111" y="353.348" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#475569"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Inter;">
                                                        <tspan id="SvgjsTspan1336">Oct</tspan>
                                                        <title>Oct</title>
                                                    </text></g>
                                            </g>
                                        </g>
                                    </svg>
                                    <div class="apexcharts-tooltip apexcharts-theme-light">
                                        <div class="apexcharts-tooltip-title"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        </div>
                                        <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(70, 105, 250);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                        class="apexcharts-tooltip-text-y-value"></span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                        <div class="apexcharts-tooltip-series-group" style="order: 2;"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(12, 231, 250);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                        class="apexcharts-tooltip-text-y-value"></span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                        <div class="apexcharts-tooltip-series-group" style="order: 3;"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(250, 145, 107);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                        class="apexcharts-tooltip-text-y-value"></span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                        <div class="apexcharts-yaxistooltip-text"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-4 col-span-12 space-y-5">
                    <div class="lg:col-span-4 col-span-12 space-y-5">
                        <div class="card">
                            <header class="card-header">
                                <h4 class="card-title">
                                    Campaigns
                                </h4>
                                <div>
                                    <!-- BEGIN: Card Dropdown -->
                                    <div class="relative">
                                        <div class="dropdown relative">
                                            <button class="text-xl text-center block w-full " type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <span
                                                    class="text-lg inline-flex h-6 w-6 flex-col items-center justify-center border border-slate-200 dark:border-slate-700
              rounded dark:text-slate-400">
                                                    <iconify-icon
                                                        icon="heroicons-outline:dots-horizontal"></iconify-icon>
                                                </span>
                                            </button>
                                            <ul
                                                class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
          shadow z-[2] overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                <li>
                                                    <a href="#"
                                                        class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                  dark:hover:text-white">
                                                        Last 28 Days</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                  dark:hover:text-white">
                                                        Last Month</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                  dark:hover:text-white">
                                                        Last Year</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- END: Card Droopdown -->
                                </div>
                            </header>
                            <div class="card-body p-6">
                                <ul class="divide-y divide-slate-100 dark:divide-slate-700">

                                    <li
                                        class="first:text-xs text-sm first:text-slate-600 text-slate-600 dark:text-slate-300 py-2 first:uppercase">
                                        <div class="flex justify-between">
                                            <span>Channel</span>
                                            <span>roi</span>
                                        </div>
                                    </li>

                                    <li
                                        class="first:text-xs text-sm first:text-slate-600 text-slate-600 dark:text-slate-300 py-2 first:uppercase">
                                        <div class="flex justify-between">
                                            <span>Email</span>
                                            <span>40%</span>
                                        </div>
                                    </li>

                                    <li
                                        class="first:text-xs text-sm first:text-slate-600 text-slate-600 dark:text-slate-300 py-2 first:uppercase">
                                        <div class="flex justify-between">
                                            <span>Website</span>
                                            <span>28%</span>
                                        </div>
                                    </li>

                                    <li
                                        class="first:text-xs text-sm first:text-slate-600 text-slate-600 dark:text-slate-300 py-2 first:uppercase">
                                        <div class="flex justify-between">
                                            <span>Facebook</span>
                                            <span>34%</span>
                                        </div>
                                    </li>

                                    <li
                                        class="first:text-xs text-sm first:text-slate-600 text-slate-600 dark:text-slate-300 py-2 first:uppercase">
                                        <div class="flex justify-between">
                                            <span>Offline</span>
                                            <span>17%</span>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <header class="card-header">
                                <h4 class="card-title">
                                    trends calcultation
                                </h4>
                                <div>
                                    <!-- BEGIN: Card Dropdown -->
                                    <div class="relative">
                                        <div class="dropdown relative">
                                            <button class="text-xl text-center block w-full " type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <span
                                                    class="text-lg inline-flex h-6 w-6 flex-col items-center justify-center border border-slate-200 dark:border-slate-700
              rounded dark:text-slate-400">
                                                    <iconify-icon
                                                        icon="heroicons-outline:dots-horizontal"></iconify-icon>
                                                </span>
                                            </button>
                                            <ul
                                                class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
          shadow z-[2] overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                <li>
                                                    <a href="#"
                                                        class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                  dark:hover:text-white">
                                                        Last 28 Days</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                  dark:hover:text-white">
                                                        Last Month</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                  dark:hover:text-white">
                                                        Last Year</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- END: Card Droopdown -->
                                </div>
                            </header>
                            <div class="card-body p-6">
                                <div class="legend-ring3">
                                    <div id="pie-chart-cal" style="min-height: 302.2px;">
                                        <div id="apexchartskafiy3vv"
                                            class="apexcharts-canvas apexchartskafiy3vv apexcharts-theme-light"
                                            style="width: 309px; height: 302.2px;"><svg id="SvgjsSvg1354"
                                                width="309" height="302.2" xmlns="http://www.w3.org/2000/svg"
                                                version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                style="background: transparent;">
                                                <foreignObject x="0" y="0" width="309" height="302.2">
                                                    <div class="apexcharts-legend apexcharts-align-center apx-legend-position-bottom"
                                                        xmlns="http://www.w3.org/1999/xhtml"
                                                        style="inset: auto 0px 1px; position: absolute; max-height: 167.5px;">
                                                        <div class="apexcharts-legend-series" rel="1"
                                                            seriesname="70xxSent" data:collapsed="false"
                                                            style="margin: 0px 10px;"><span
                                                                class="apexcharts-legend-marker" rel="1"
                                                                data:collapsed="false"
                                                                style="background: rgb(80, 199, 147) !important; color: rgb(80, 199, 147); height: 6px; width: 6px; left: -5px; top: -1px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                                class="apexcharts-legend-text" rel="1" i="0"
                                                                data:default-text="70%25%20Sent"
                                                                data:collapsed="false"
                                                                style="color: rgb(71, 85, 105); font-size: 12px; font-weight: 400; font-family: Inter;">70%
                                                                Sent</span></div>
                                                        <div class="apexcharts-legend-series" rel="2"
                                                            seriesname="18xxOpend" data:collapsed="false"
                                                            style="margin: 0px 10px;"><span
                                                                class="apexcharts-legend-marker" rel="2"
                                                                data:collapsed="false"
                                                                style="background: rgb(250, 145, 107) !important; color: rgb(250, 145, 107); height: 6px; width: 6px; left: -5px; top: -1px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                                class="apexcharts-legend-text" rel="2" i="1"
                                                                data:default-text="18%25%20Opend"
                                                                data:collapsed="false"
                                                                style="color: rgb(71, 85, 105); font-size: 12px; font-weight: 400; font-family: Inter;">18%
                                                                Opend</span></div>
                                                        <div class="apexcharts-legend-series" rel="3"
                                                            seriesname="12xxRejected" data:collapsed="false"
                                                            style="margin: 0px 10px;"><span
                                                                class="apexcharts-legend-marker" rel="3"
                                                                data:collapsed="false"
                                                                style="background: rgb(163, 161, 251) !important; color: rgb(163, 161, 251); height: 6px; width: 6px; left: -5px; top: -1px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                                class="apexcharts-legend-text" rel="3" i="2"
                                                                data:default-text="12%25%20Rejected"
                                                                data:collapsed="false"
                                                                style="color: rgb(71, 85, 105); font-size: 12px; font-weight: 400; font-family: Inter;">12%
                                                                Rejected</span></div>
                                                    </div>
                                                    <style type="text/css">
                                                        .apexcharts-legend {
                                                            display: flex;
                                                            overflow: auto;
                                                            padding: 0 10px;
                                                        }

                                                        .apexcharts-legend.apx-legend-position-bottom,
                                                        .apexcharts-legend.apx-legend-position-top {
                                                            flex-wrap: wrap
                                                        }

                                                        .apexcharts-legend.apx-legend-position-right,
                                                        .apexcharts-legend.apx-legend-position-left {
                                                            flex-direction: column;
                                                            bottom: 0;
                                                        }

                                                        .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                        .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                        .apexcharts-legend.apx-legend-position-right,
                                                        .apexcharts-legend.apx-legend-position-left {
                                                            justify-content: flex-start;
                                                        }

                                                        .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                        .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                            justify-content: center;
                                                        }

                                                        .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                        .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                            justify-content: flex-end;
                                                        }

                                                        .apexcharts-legend-series {
                                                            cursor: pointer;
                                                            line-height: normal;
                                                        }

                                                        .apexcharts-legend.apx-legend-position-bottom .apexcharts-legend-series,
                                                        .apexcharts-legend.apx-legend-position-top .apexcharts-legend-series {
                                                            display: flex;
                                                            align-items: center;
                                                        }

                                                        .apexcharts-legend-text {
                                                            position: relative;
                                                            font-size: 14px;
                                                        }

                                                        .apexcharts-legend-text *,
                                                        .apexcharts-legend-marker * {
                                                            pointer-events: none;
                                                        }

                                                        .apexcharts-legend-marker {
                                                            position: relative;
                                                            display: inline-block;
                                                            cursor: pointer;
                                                            margin-right: 3px;
                                                            border-style: solid;
                                                        }

                                                        .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series,
                                                        .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series {
                                                            display: inline-block;
                                                        }

                                                        .apexcharts-legend-series.apexcharts-no-click {
                                                            cursor: auto;
                                                        }

                                                        .apexcharts-legend .apexcharts-hidden-zero-series,
                                                        .apexcharts-legend .apexcharts-hidden-null-series {
                                                            display: none !important;
                                                        }

                                                        .apexcharts-inactive-legend {
                                                            opacity: 0.45;
                                                        }
                                                    </style>
                                                </foreignObject>
                                                <g id="SvgjsG1356" class="apexcharts-inner apexcharts-graphical"
                                                    transform="translate(12, 0)">
                                                    <defs id="SvgjsDefs1355">
                                                        <clipPath id="gridRectMaskkafiy3vv">
                                                            <rect id="SvgjsRect1358" width="293" height="277"
                                                                x="-3" y="-1" rx="0" ry="0"
                                                                opacity="1" stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                        </clipPath>
                                                        <clipPath id="forecastMaskkafiy3vv"></clipPath>
                                                        <clipPath id="nonForecastMaskkafiy3vv"></clipPath>
                                                        <clipPath id="gridRectMarkerMaskkafiy3vv">
                                                            <rect id="SvgjsRect1359" width="291" height="279"
                                                                x="-2" y="-2" rx="0" ry="0"
                                                                opacity="1" stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                        </clipPath>
                                                        <filter id="SvgjsFilter1367" filterUnits="userSpaceOnUse"
                                                            width="200%" height="200%" x="-50%" y="-50%">
                                                            <feFlood id="SvgjsFeFlood1368" flood-color="#000000"
                                                                flood-opacity="0.45" result="SvgjsFeFlood1368Out"
                                                                in="SourceGraphic">
                                                            </feFlood>
                                                            <feComposite id="SvgjsFeComposite1369"
                                                                in="SvgjsFeFlood1368Out" in2="SourceAlpha"
                                                                operator="in" result="SvgjsFeComposite1369Out">
                                                            </feComposite>
                                                            <feOffset id="SvgjsFeOffset1370" dx="1"
                                                                dy="1" result="SvgjsFeOffset1370Out"
                                                                in="SvgjsFeComposite1369Out"></feOffset>
                                                            <feGaussianBlur id="SvgjsFeGaussianBlur1371"
                                                                stdDeviation="1 "
                                                                result="SvgjsFeGaussianBlur1371Out"
                                                                in="SvgjsFeOffset1370Out"></feGaussianBlur>
                                                            <feMerge id="SvgjsFeMerge1372"
                                                                result="SvgjsFeMerge1372Out" in="SourceGraphic">
                                                                <feMergeNode id="SvgjsFeMergeNode1373"
                                                                    in="SvgjsFeGaussianBlur1371Out"></feMergeNode>
                                                                <feMergeNode id="SvgjsFeMergeNode1374"
                                                                    in="[object Arguments]"></feMergeNode>
                                                            </feMerge>
                                                            <feBlend id="SvgjsFeBlend1375" in="SourceGraphic"
                                                                in2="SvgjsFeMerge1372Out" mode="normal"
                                                                result="SvgjsFeBlend1375Out"></feBlend>
                                                        </filter>
                                                        <filter id="SvgjsFilter1380" filterUnits="userSpaceOnUse"
                                                            width="200%" height="200%" x="-50%" y="-50%">
                                                            <feFlood id="SvgjsFeFlood1381" flood-color="#000000"
                                                                flood-opacity="0.45" result="SvgjsFeFlood1381Out"
                                                                in="SourceGraphic">
                                                            </feFlood>
                                                            <feComposite id="SvgjsFeComposite1382"
                                                                in="SvgjsFeFlood1381Out" in2="SourceAlpha"
                                                                operator="in" result="SvgjsFeComposite1382Out">
                                                            </feComposite>
                                                            <feOffset id="SvgjsFeOffset1383" dx="1"
                                                                dy="1" result="SvgjsFeOffset1383Out"
                                                                in="SvgjsFeComposite1382Out"></feOffset>
                                                            <feGaussianBlur id="SvgjsFeGaussianBlur1384"
                                                                stdDeviation="1 "
                                                                result="SvgjsFeGaussianBlur1384Out"
                                                                in="SvgjsFeOffset1383Out"></feGaussianBlur>
                                                            <feMerge id="SvgjsFeMerge1385"
                                                                result="SvgjsFeMerge1385Out" in="SourceGraphic">
                                                                <feMergeNode id="SvgjsFeMergeNode1386"
                                                                    in="SvgjsFeGaussianBlur1384Out"></feMergeNode>
                                                                <feMergeNode id="SvgjsFeMergeNode1387"
                                                                    in="[object Arguments]"></feMergeNode>
                                                            </feMerge>
                                                            <feBlend id="SvgjsFeBlend1388" in="SourceGraphic"
                                                                in2="SvgjsFeMerge1385Out" mode="normal"
                                                                result="SvgjsFeBlend1388Out"></feBlend>
                                                        </filter>
                                                        <filter id="SvgjsFilter1393" filterUnits="userSpaceOnUse"
                                                            width="200%" height="200%" x="-50%" y="-50%">
                                                            <feFlood id="SvgjsFeFlood1394" flood-color="#000000"
                                                                flood-opacity="0.45" result="SvgjsFeFlood1394Out"
                                                                in="SourceGraphic">
                                                            </feFlood>
                                                            <feComposite id="SvgjsFeComposite1395"
                                                                in="SvgjsFeFlood1394Out" in2="SourceAlpha"
                                                                operator="in" result="SvgjsFeComposite1395Out">
                                                            </feComposite>
                                                            <feOffset id="SvgjsFeOffset1396" dx="1"
                                                                dy="1" result="SvgjsFeOffset1396Out"
                                                                in="SvgjsFeComposite1395Out"></feOffset>
                                                            <feGaussianBlur id="SvgjsFeGaussianBlur1397"
                                                                stdDeviation="1 "
                                                                result="SvgjsFeGaussianBlur1397Out"
                                                                in="SvgjsFeOffset1396Out"></feGaussianBlur>
                                                            <feMerge id="SvgjsFeMerge1398"
                                                                result="SvgjsFeMerge1398Out" in="SourceGraphic">
                                                                <feMergeNode id="SvgjsFeMergeNode1399"
                                                                    in="SvgjsFeGaussianBlur1397Out"></feMergeNode>
                                                                <feMergeNode id="SvgjsFeMergeNode1400"
                                                                    in="[object Arguments]"></feMergeNode>
                                                            </feMerge>
                                                            <feBlend id="SvgjsFeBlend1401" in="SourceGraphic"
                                                                in2="SvgjsFeMerge1398Out" mode="normal"
                                                                result="SvgjsFeBlend1401Out"></feBlend>
                                                        </filter>
                                                    </defs>
                                                    <g id="SvgjsG1360" class="apexcharts-pie">
                                                        <g id="SvgjsG1361" transform="translate(0, 0) scale(1)">
                                                            <g id="SvgjsG1362" class="apexcharts-slices">
                                                                <g id="SvgjsG1363"
                                                                    class="apexcharts-series apexcharts-pie-series"
                                                                    seriesName="70xxSent" rel="1"
                                                                    data:realIndex="0">
                                                                    <path id="SvgjsPath1364"
                                                                        d="M 143.5 9.353658536585357 A 128.14634146341464 128.14634146341464 0 0 1 251.22680400580555 206.90043608762716 L 143.5 137.5 L 143.5 9.353658536585357"
                                                                        fill="rgba(80,199,147,1)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="butt"
                                                                        stroke-width="2" stroke-dasharray="0"
                                                                        class="apexcharts-pie-area apexcharts-pie-slice-0"
                                                                        index="0" j="0"
                                                                        data:angle="122.79069767441861"
                                                                        data:startAngle="0" data:strokeWidth="2"
                                                                        data:value="44"
                                                                        data:pathOrig="M 143.5 9.353658536585357 A 128.14634146341464 128.14634146341464 0 0 1 251.22680400580555 206.90043608762716 L 143.5 137.5 L 143.5 9.353658536585357"
                                                                        stroke="#ffffff"></path>
                                                                </g>
                                                                <g id="SvgjsG1376"
                                                                    class="apexcharts-series apexcharts-pie-series"
                                                                    seriesName="18xxOpend" rel="2"
                                                                    data:realIndex="1">
                                                                    <path id="SvgjsPath1377"
                                                                        d="M 251.22680400580555 206.90043608762716 A 128.14634146341464 128.14634146341464 0 0 1 16.12241161193471 123.48447978494269 L 143.5 137.5 L 251.22680400580555 206.90043608762716"
                                                                        fill="rgba(250,145,107,1)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="butt"
                                                                        stroke-width="2" stroke-dasharray="0"
                                                                        class="apexcharts-pie-area apexcharts-pie-slice-1"
                                                                        index="0" j="1"
                                                                        data:angle="153.48837209302326"
                                                                        data:startAngle="122.79069767441861"
                                                                        data:strokeWidth="2" data:value="55"
                                                                        data:pathOrig="M 251.22680400580555 206.90043608762716 A 128.14634146341464 128.14634146341464 0 0 1 16.12241161193471 123.48447978494269 L 143.5 137.5 L 251.22680400580555 206.90043608762716"
                                                                        stroke="#ffffff"></path>
                                                                </g>
                                                                <g id="SvgjsG1389"
                                                                    class="apexcharts-series apexcharts-pie-series"
                                                                    seriesName="12xxRejected" rel="3"
                                                                    data:realIndex="2">
                                                                    <path id="SvgjsPath1390"
                                                                        d="M 16.12241161193471 123.48447978494269 A 128.14634146341464 128.14634146341464 0 0 1 143.4776342442843 9.353660488365733 L 143.5 137.5 L 16.12241161193471 123.48447978494269"
                                                                        fill="rgba(163,161,251,1)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="butt"
                                                                        stroke-width="2" stroke-dasharray="0"
                                                                        class="apexcharts-pie-area apexcharts-pie-slice-2"
                                                                        index="0" j="2"
                                                                        data:angle="83.72093023255815"
                                                                        data:startAngle="276.27906976744185"
                                                                        data:strokeWidth="2" data:value="30"
                                                                        data:pathOrig="M 16.12241161193471 123.48447978494269 A 128.14634146341464 128.14634146341464 0 0 1 143.4776342442843 9.353660488365733 L 143.5 137.5 L 16.12241161193471 123.48447978494269"
                                                                        stroke="#ffffff"></path>
                                                                </g>
                                                                <g id="SvgjsG1365" class="apexcharts-datalabels">
                                                                    <text id="SvgjsText1366"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="233.50426089656514" y="88.4186052362385"
                                                                        text-anchor="middle"
                                                                        dominant-baseline="auto" font-size="12px"
                                                                        font-weight="600" fill="#ffffff"
                                                                        class="apexcharts-text apexcharts-pie-label"
                                                                        filter="url(#SvgjsFilter1367)"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">34.1%</text>
                                                                </g>
                                                                <g id="SvgjsG1378" class="apexcharts-datalabels">
                                                                    <text id="SvgjsText1379"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="109.22026816270716" y="234.11599389674802"
                                                                        text-anchor="middle"
                                                                        dominant-baseline="auto" font-size="12px"
                                                                        font-weight="600" fill="#ffffff"
                                                                        class="apexcharts-text apexcharts-pie-label"
                                                                        filter="url(#SvgjsFilter1380)"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">42.6%</text>
                                                                </g>
                                                                <g id="SvgjsG1391" class="apexcharts-datalabels">
                                                                    <text id="SvgjsText1392"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="75.08842860172393" y="61.148135646130186"
                                                                        text-anchor="middle"
                                                                        dominant-baseline="auto" font-size="12px"
                                                                        font-weight="600" fill="#ffffff"
                                                                        class="apexcharts-text apexcharts-pie-label"
                                                                        filter="url(#SvgjsFilter1393)"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">23.3%</text>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                    <line id="SvgjsLine1402" x1="0" y1="0"
                                                        x2="287" y2="0" stroke="#b6b6b6"
                                                        stroke-dasharray="0" stroke-width="1"
                                                        stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                    </line>
                                                    <line id="SvgjsLine1403" x1="0" y1="0"
                                                        x2="287" y2="0" stroke-dasharray="0"
                                                        stroke-width="0" stroke-linecap="butt"
                                                        class="apexcharts-ycrosshairs-hidden"></line>
                                                </g>
                                                <g id="SvgjsG1357" class="apexcharts-annotations"></g>
                                            </svg>
                                            <div class="apexcharts-tooltip apexcharts-theme-dark">
                                                <div class="apexcharts-tooltip-series-group" style="order: 1;">
                                                    <span class="apexcharts-tooltip-marker"
                                                        style="background-color: rgb(80, 199, 147);"></span>
                                                    <div class="apexcharts-tooltip-text"
                                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                        <div class="apexcharts-tooltip-y-group"><span
                                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                                class="apexcharts-tooltip-text-y-value"></span>
                                                        </div>
                                                        <div class="apexcharts-tooltip-goals-group"><span
                                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                                class="apexcharts-tooltip-text-goals-value"></span>
                                                        </div>
                                                        <div class="apexcharts-tooltip-z-group"><span
                                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                                class="apexcharts-tooltip-text-z-value"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="apexcharts-tooltip-series-group" style="order: 2;">
                                                    <span class="apexcharts-tooltip-marker"
                                                        style="background-color: rgb(250, 145, 107);"></span>
                                                    <div class="apexcharts-tooltip-text"
                                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                        <div class="apexcharts-tooltip-y-group"><span
                                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                                class="apexcharts-tooltip-text-y-value"></span>
                                                        </div>
                                                        <div class="apexcharts-tooltip-goals-group"><span
                                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                                class="apexcharts-tooltip-text-goals-value"></span>
                                                        </div>
                                                        <div class="apexcharts-tooltip-z-group"><span
                                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                                class="apexcharts-tooltip-text-z-value"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="apexcharts-tooltip-series-group" style="order: 3;">
                                                    <span class="apexcharts-tooltip-marker"
                                                        style="background-color: rgb(163, 161, 251);"></span>
                                                    <div class="apexcharts-tooltip-text"
                                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                        <div class="apexcharts-tooltip-y-group"><span
                                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                                class="apexcharts-tooltip-text-y-value"></span>
                                                        </div>
                                                        <div class="apexcharts-tooltip-goals-group"><span
                                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                                class="apexcharts-tooltip-text-goals-value"></span>
                                                        </div>
                                                        <div class="apexcharts-tooltip-z-group"><span
                                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                                class="apexcharts-tooltip-text-z-value"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BEGIN: Advanced Table 2 -->


            <div class="card">
                <header class=" card-header noborder">
                    <h4 class="card-title">Advanced Table Two
                    </h4>
                </header>
                <div class="card-body px-6 pb-6">
                    <div class="overflow-x-auto -mx-6 dashcode-data-table">
                        <span class=" col-span-8  hidden"></span>
                        <span class="  col-span-4 hidden"></span>
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden ">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                                    <div class="grid grid-cols-12 gap-5 px-6 mt-6">
                                        <div class="col-span-4">
                                            <div class="dataTables_length" id="DataTables_Table_0_length">
                                                <label>Show <select name="DataTables_Table_0_length"
                                                        aria-controls="DataTables_Table_0" class="">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select> entries</label>
                                            </div>
                                        </div>
                                        <div class="col-span-8 flex justify-end">
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                <label>Search:<input type="search" class="" placeholder=""
                                                        aria-controls="DataTables_Table_0"></label>
                                            </div>
                                        </div>
                                        <div id="pagination" class="flex items-center"></div>
                                    </div>
                                    <div class="min-w-full">
                                        <table
                                            class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table dataTable no-footer"
                                            id="DataTables_Table_0">
                                            <thead class=" bg-slate-200 dark:bg-slate-700">
                                                <tr>
                                                    <th scope="col" class="table-th sorting sorting_asc"
                                                        tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="
                              Id
                            : activate to sort column descending"
                                                        style="width: 28.3359px;">
                                                        Id
                                                    </th>
                                                    <th scope="col" class="table-th sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1"
                                                        colspan="1"
                                                        aria-label="
                              Order
                            : activate to sort column ascending"
                                                        style="width: 54.852px;">
                                                        Order
                                                    </th>
                                                    <th scope="col" class="table-th sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1"
                                                        colspan="1"
                                                        aria-label="
                              Customer
                            : activate to sort column ascending"
                                                        style="width: 154.898px;">
                                                        Customer
                                                    </th>
                                                    <th scope="col" class="table-th sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1"
                                                        colspan="1"
                                                        aria-label="
                              Date
                            : activate to sort column ascending"
                                                        style="width: 93.922px;">
                                                        Date
                                                    </th>
                                                    <th scope="col" class="table-th sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1"
                                                        colspan="1"
                                                        aria-label="
                              Quantity
                            : activate to sort column ascending"
                                                        style="width: 80.727px;">
                                                        Quantity
                                                    </th>
                                                    <th scope="col" class="table-th sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1"
                                                        colspan="1"
                                                        aria-label="
                              Amount
                            : activate to sort column ascending"
                                                        style="width: 83px;">
                                                        Amount
                                                    </th>
                                                    <th scope="col" class="table-th sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1"
                                                        colspan="1"
                                                        aria-label="
                              Status
                            : activate to sort column ascending"
                                                        style="width: 111.648px;">
                                                        Status
                                                    </th>
                                                    <th scope="col" class="table-th sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1"
                                                        colspan="1"
                                                        aria-label="
                              Action
                            : activate to sort column ascending"
                                                        style="width: 118.617px;">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody
                                                class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">





































































































                                                <tr class="odd">
                                                    <td class="table-td sorting_1">1</td>
                                                    <td class="table-td ">#951</td>
                                                    <td class="table-td">
                                                        <span class="flex">
                                                            <span
                                                                class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                                <img src="assets/images/all-img/customer_1.png"
                                                                    alt="1"
                                                                    class="object-cover w-full h-full rounded-full">
                                                            </span>
                                                            <span
                                                                class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny
                                                                Wilson</span>
                                                        </span>
                                                    </td>
                                                    <td class="table-td ">3/26/2022</td>
                                                    <td class="table-td ">
                                                        <div>
                                                            13
                                                        </div>
                                                    </td>
                                                    <td class="table-td ">
                                                        <div>
                                                            $1779.53
                                                        </div>
                                                    </td>
                                                    <td class="table-td ">

                                                        <div
                                                            class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                              bg-success-500">
                                                            paid
                                                        </div>

                                                    </td>
                                                    <td class="table-td ">
                                                        <div class="flex space-x-3 rtl:space-x-reverse">
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                            </button>
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon
                                                                    icon="heroicons:pencil-square"></iconify-icon>
                                                            </button>
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="table-td sorting_1">2</td>
                                                    <td class="table-td ">#238</td>
                                                    <td class="table-td">
                                                        <span class="flex">
                                                            <span
                                                                class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                                <img src="assets/images/all-img/customer_1.png"
                                                                    alt="2"
                                                                    class="object-cover w-full h-full rounded-full">
                                                            </span>
                                                            <span
                                                                class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny
                                                                Wilson</span>
                                                        </span>
                                                    </td>
                                                    <td class="table-td ">2/6/2022</td>
                                                    <td class="table-td ">
                                                        <div>
                                                            13
                                                        </div>
                                                    </td>
                                                    <td class="table-td ">
                                                        <div>
                                                            $2215.78
                                                        </div>
                                                    </td>
                                                    <td class="table-td ">

                                                        <div
                                                            class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
                                              bg-warning-500">
                                                            due
                                                        </div>

                                                    </td>
                                                    <td class="table-td ">
                                                        <div class="flex space-x-3 rtl:space-x-reverse">
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                            </button>
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon
                                                                    icon="heroicons:pencil-square"></iconify-icon>
                                                            </button>
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="table-td sorting_1">3</td>
                                                    <td class="table-td ">#339</td>
                                                    <td class="table-td">
                                                        <span class="flex">
                                                            <span
                                                                class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                                <img src="assets/images/all-img/customer_1.png"
                                                                    alt="3"
                                                                    class="object-cover w-full h-full rounded-full">
                                                            </span>
                                                            <span
                                                                class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny
                                                                Wilson</span>
                                                        </span>
                                                    </td>
                                                    <td class="table-td ">9/6/2021</td>
                                                    <td class="table-td ">
                                                        <div>
                                                            1
                                                        </div>
                                                    </td>
                                                    <td class="table-td ">
                                                        <div>
                                                            $3183.60
                                                        </div>
                                                    </td>
                                                    <td class="table-td ">

                                                        <div
                                                            class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
                                              bg-warning-500">
                                                            due
                                                        </div>

                                                    </td>
                                                    <td class="table-td ">
                                                        <div class="flex space-x-3 rtl:space-x-reverse">
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                            </button>
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon
                                                                    icon="heroicons:pencil-square"></iconify-icon>
                                                            </button>
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="table-td sorting_1">4</td>
                                                    <td class="table-td ">#365</td>
                                                    <td class="table-td">
                                                        <span class="flex">
                                                            <span
                                                                class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                                <img src="assets/images/all-img/customer_1.png"
                                                                    alt="4"
                                                                    class="object-cover w-full h-full rounded-full">
                                                            </span>
                                                            <span
                                                                class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny
                                                                Wilson</span>
                                                        </span>
                                                    </td>
                                                    <td class="table-td ">11/7/2021</td>
                                                    <td class="table-td ">
                                                        <div>
                                                            13
                                                        </div>
                                                    </td>
                                                    <td class="table-td ">
                                                        <div>
                                                            $2587.86
                                                        </div>
                                                    </td>
                                                    <td class="table-td ">

                                                        <div
                                                            class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-danger-500
                                              bg-danger-500">
                                                            cancled
                                                        </div>

                                                    </td>
                                                    <td class="table-td ">
                                                        <div class="flex space-x-3 rtl:space-x-reverse">
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                            </button>
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon
                                                                    icon="heroicons:pencil-square"></iconify-icon>
                                                            </button>
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="table-td sorting_1">5</td>
                                                    <td class="table-td ">#513</td>
                                                    <td class="table-td">
                                                        <span class="flex">
                                                            <span
                                                                class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                                <img src="assets/images/all-img/customer_1.png"
                                                                    alt="5"
                                                                    class="object-cover w-full h-full rounded-full">
                                                            </span>
                                                            <span
                                                                class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny
                                                                Wilson</span>
                                                        </span>
                                                    </td>
                                                    <td class="table-td ">5/6/2022</td>
                                                    <td class="table-td ">
                                                        <div>
                                                            12
                                                        </div>
                                                    </td>
                                                    <td class="table-td ">
                                                        <div>
                                                            $3840.73
                                                        </div>
                                                    </td>
                                                    <td class="table-td ">

                                                        <div
                                                            class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                              bg-success-500">
                                                            paid
                                                        </div>

                                                    </td>
                                                    <td class="table-td ">
                                                        <div class="flex space-x-3 rtl:space-x-reverse">
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                            </button>
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon
                                                                    icon="heroicons:pencil-square"></iconify-icon>
                                                            </button>
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="table-td sorting_1">6</td>
                                                    <td class="table-td ">#534</td>
                                                    <td class="table-td">
                                                        <span class="flex">
                                                            <span
                                                                class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                                <img src="assets/images/all-img/customer_1.png"
                                                                    alt="6"
                                                                    class="object-cover w-full h-full rounded-full">
                                                            </span>
                                                            <span
                                                                class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny
                                                                Wilson</span>
                                                        </span>
                                                    </td>
                                                    <td class="table-td ">2/14/2022</td>
                                                    <td class="table-td ">
                                                        <div>
                                                            12
                                                        </div>
                                                    </td>
                                                    <td class="table-td ">
                                                        <div>
                                                            $4764.18
                                                        </div>
                                                    </td>
                                                    <td class="table-td ">

                                                        <div
                                                            class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-danger-500
                                              bg-danger-500">
                                                            cancled
                                                        </div>

                                                    </td>
                                                    <td class="table-td ">
                                                        <div class="flex space-x-3 rtl:space-x-reverse">
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                            </button>
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon
                                                                    icon="heroicons:pencil-square"></iconify-icon>
                                                            </button>
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="table-td sorting_1">7</td>
                                                    <td class="table-td ">#77</td>
                                                    <td class="table-td">
                                                        <span class="flex">
                                                            <span
                                                                class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                                <img src="assets/images/all-img/customer_1.png"
                                                                    alt="7"
                                                                    class="object-cover w-full h-full rounded-full">
                                                            </span>
                                                            <span
                                                                class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny
                                                                Wilson</span>
                                                        </span>
                                                    </td>
                                                    <td class="table-td ">7/30/2022</td>
                                                    <td class="table-td ">
                                                        <div>
                                                            6
                                                        </div>
                                                    </td>
                                                    <td class="table-td ">
                                                        <div>
                                                            $2875.05
                                                        </div>
                                                    </td>
                                                    <td class="table-td ">

                                                        <div
                                                            class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                              bg-success-500">
                                                            paid
                                                        </div>

                                                    </td>
                                                    <td class="table-td ">
                                                        <div class="flex space-x-3 rtl:space-x-reverse">
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                            </button>
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon
                                                                    icon="heroicons:pencil-square"></iconify-icon>
                                                            </button>
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="table-td sorting_1">8</td>
                                                    <td class="table-td ">#238</td>
                                                    <td class="table-td">
                                                        <span class="flex">
                                                            <span
                                                                class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                                <img src="assets/images/all-img/customer_1.png"
                                                                    alt="8"
                                                                    class="object-cover w-full h-full rounded-full">
                                                            </span>
                                                            <span
                                                                class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny
                                                                Wilson</span>
                                                        </span>
                                                    </td>
                                                    <td class="table-td ">6/30/2022</td>
                                                    <td class="table-td ">
                                                        <div>
                                                            9
                                                        </div>
                                                    </td>
                                                    <td class="table-td ">
                                                        <div>
                                                            $2491.02
                                                        </div>
                                                    </td>
                                                    <td class="table-td ">

                                                        <div
                                                            class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
                                              bg-warning-500">
                                                            due
                                                        </div>

                                                    </td>
                                                    <td class="table-td ">
                                                        <div class="flex space-x-3 rtl:space-x-reverse">
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                            </button>
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon
                                                                    icon="heroicons:pencil-square"></iconify-icon>
                                                            </button>
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="table-td sorting_1">9</td>
                                                    <td class="table-td ">#886</td>
                                                    <td class="table-td">
                                                        <span class="flex">
                                                            <span
                                                                class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                                <img src="assets/images/all-img/customer_1.png"
                                                                    alt="9"
                                                                    class="object-cover w-full h-full rounded-full">
                                                            </span>
                                                            <span
                                                                class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny
                                                                Wilson</span>
                                                        </span>
                                                    </td>
                                                    <td class="table-td ">8/9/2022</td>
                                                    <td class="table-td ">
                                                        <div>
                                                            8
                                                        </div>
                                                    </td>
                                                    <td class="table-td ">
                                                        <div>
                                                            $3006.95
                                                        </div>
                                                    </td>
                                                    <td class="table-td ">

                                                        <div
                                                            class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
                                              bg-warning-500">
                                                            due
                                                        </div>

                                                    </td>
                                                    <td class="table-td ">
                                                        <div class="flex space-x-3 rtl:space-x-reverse">
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                            </button>
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon
                                                                    icon="heroicons:pencil-square"></iconify-icon>
                                                            </button>
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="table-td sorting_1">10</td>
                                                    <td class="table-td ">#3</td>
                                                    <td class="table-td">
                                                        <span class="flex">
                                                            <span
                                                                class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                                <img src="assets/images/all-img/customer_1.png"
                                                                    alt="10"
                                                                    class="object-cover w-full h-full rounded-full">
                                                            </span>
                                                            <span
                                                                class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny
                                                                Wilson</span>
                                                        </span>
                                                    </td>
                                                    <td class="table-td ">8/4/2022</td>
                                                    <td class="table-td ">
                                                        <div>
                                                            12
                                                        </div>
                                                    </td>
                                                    <td class="table-td ">
                                                        <div>
                                                            $2160.32
                                                        </div>
                                                    </td>
                                                    <td class="table-td ">

                                                        <div
                                                            class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                              bg-success-500">
                                                            paid
                                                        </div>

                                                    </td>
                                                    <td class="table-td ">
                                                        <div class="flex space-x-3 rtl:space-x-reverse">
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                            </button>
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon
                                                                    icon="heroicons:pencil-square"></iconify-icon>
                                                            </button>
                                                            <button class="action-btn" type="button">
                                                                <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="flex justify-end items-center">
                                        <div class="dataTables_paginate paging_simple_numbers"
                                            id="DataTables_Table_0_paginate"><a
                                                class="paginate_button previous disabled"
                                                aria-controls="DataTables_Table_0" aria-disabled="true"
                                                aria-role="link" data-dt-idx="previous" tabindex="-1"
                                                id="DataTables_Table_0_previous"><iconify-icon
                                                    icon="ic:round-keyboard-arrow-left"></iconify-icon></a><span><a
                                                    class="paginate_button current"
                                                    aria-controls="DataTables_Table_0" aria-role="link"
                                                    aria-current="page" data-dt-idx="0" tabindex="0">1</a><a
                                                    class="paginate_button " aria-controls="DataTables_Table_0"
                                                    aria-role="link" data-dt-idx="1" tabindex="0">2</a><a
                                                    class="paginate_button " aria-controls="DataTables_Table_0"
                                                    aria-role="link" data-dt-idx="2" tabindex="0">3</a><a
                                                    class="paginate_button " aria-controls="DataTables_Table_0"
                                                    aria-role="link" data-dt-idx="3" tabindex="0">4</a><a
                                                    class="paginate_button " aria-controls="DataTables_Table_0"
                                                    aria-role="link" data-dt-idx="4" tabindex="0">5</a></span><a
                                                class="paginate_button next" aria-controls="DataTables_Table_0"
                                                aria-role="link" data-dt-idx="next" tabindex="0"
                                                id="DataTables_Table_0_next"><iconify-icon
                                                    icon="ic:round-keyboard-arrow-right"></iconify-icon></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Advanced Table -->
        </div>
    </div>
</x-appLayout>
