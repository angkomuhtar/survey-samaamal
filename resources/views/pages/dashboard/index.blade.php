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
                <div class="lg:col-span-4 col-span-12 space-y-5">
                    <div class="card">
                        <header class="card-header">
                            <h4 class="card-title">
                                Employee
                            </h4>
                            <div>
                            </div>
                        </header>
                        <div class="card-body p-6">
                            <ul class="divide-y divide-slate-100 dark:divide-slate-700">

                                <li
                                    class="first:text-xs text-sm first:text-slate-600 text-slate-600 dark:text-slate-300 py-2 first:uppercase">
                                    <div class="flex justify-between">
                                        <span>Departement</span>
                                        <span>tot</span>
                                    </div>
                                </li>

                                @php
                                    $count = 0;
                                @endphp

                                @foreach ($division_count as $item)
                                    <li
                                        class="first:text-xs text-sm first:text-slate-600 text-slate-600 dark:text-slate-300 py-2 first:uppercase">
                                        <div class="flex justify-between">
                                            <span>{{ $item->division->division }}</span>
                                            <span>{{ $item->post_count }}</span>
                                            @php
                                                $count += $item->post_count;
                                            @endphp
                                        </div>
                                    </li>
                                @endforeach
                                <li
                                    class="first:text-xs text-sm first:text-slate-600 text-slate-600 dark:text-slate-300 py-2 first:uppercase">
                                    <div class="flex justify-between">
                                        <span class="text-sm font-bold">Total</span>
                                        <span class="text-sm font-bold">{{ $count }}</span>
                                    </div>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-8 col-span-12 space-y-5">
                    <div class="card">
                        <div class="card-body flex flex-col p-6">
                            <header
                                class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                <div class="flex-1">
                                    <div class="card-title text-slate-900 dark:text-white">Karyawan Hadir</div>
                                </div>
                            </header>
                            <div class="card-text h-full">
                                <div>
                                    <div class="grid grid-cols-7 gap-3 pb-4">
                                        <div class="input-area col-span-2">
                                            <label for="shift" class="form-label">Shift</label>
                                            <select id="shift" class="form-control" name="shift">
                                                <option value="Day Shift" class="dark:bg-slate-700" selected>Day Shift
                                                </option>
                                                <option value="Night Shift" class="dark:bg-slate-700">Night Shift
                                                </option>
                                                <option value="Day Office" class="dark:bg-slate-700">Day Office
                                                </option>
                                            </select>
                                        </div>
                                        <div class="input-area col-span-2">
                                            <label for="project" class="form-label">Site</label>
                                            <select id="project" class="form-control" name="project">
                                                <option value="A9" class="dark:bg-slate-700" selected>A9</option>
                                                <option value="Jongkang" class="dark:bg-slate-700">Jongkang
                                                </option>
                                            </select>
                                        </div>
                                        <div class="input-area col-span-2">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input class="form-control py-2 flatpickr flatpickr-input active"
                                                name="tanggal" id="tanggal" value="" type="text"
                                                readonly="readonly">
                                            <div class="font-Inter text-sm text-danger-500 pt-2 error-message"
                                                style="display: none">This is
                                                invalid state.</div>
                                        </div>
                                    </div>
                                    <div class="overflow-x-auto mx-0">
                                        <div class="inline-block min-w-full align-middle">
                                            <div class="overflow-hidden ">
                                                <table
                                                    class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                                                    <thead class=" bg-slate-200 dark:bg-slate-700">
                                                        <tr>
                                                            <th scope="col" class=" table-th ">
                                                                Site
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                                Departement
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                                Type
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                                Jumlah
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <ul class="nav nav-pills flex items-center flex-wrap list-none pl-0 mb-6 space-x-4 "
                                        id="pills-tabHorizontal" role="tablist">
                                        <li class="nav-item text-center" role="presentation">
                                            <a href="#pills-day"
                                                class="nav-link block font-medium font-Inter text-sm leading-tight capitalize rounded-md px-6 py-3 focus:outline-none focus:ring-0 active dark:bg-slate-900 dark:text-slate-300"
                                                id="pills-home-tabHorizontal" data-bs-toggle="pill"
                                                data-bs-target="#pills-day" role="tab" aria-controls="pills-day"
                                                aria-selected="true">Shift Pagi</a>
                                        </li>
                                        <li class="nav-item text-center" role="presentation">
                                            <a href="#pills-night"
                                                class="nav-link block font-medium font-Inter text-sm leading-tight capitalize rounded-md px-6 py-3 focus:outline-none focus:ring-0 dark:bg-slate-900 dark:text-slate-300"
                                                id="pills-profile-tabHorizontal" data-bs-toggle="pill"
                                                data-bs-target="#pills-night" role="tab" aria-controls="pills-night"
                                                aria-selected="false">Shift
                                                Malam</a>
                                        </li>
                                        <li class="nav-item text-center" role="presentation">
                                            <a href="#pills-office"
                                                class="nav-link block font-medium font-Inter text-sm leading-tight capitalize rounded-md px-6 py-3 focus:outline-none focus:ring-0 dark:bg-slate-900 dark:text-slate-300"
                                                id="pills-profile-tabHorizontal" data-bs-toggle="pill"
                                                data-bs-target="#pills-office" role="tab"
                                                aria-controls="pills-office" aria-selected="false">Office</a>
                                        </li>
                                    </ul> --}}

                                    <div class="tab-content" id="pills-tabContentHorizontal">
                                        <div class="tab-pane fade show active" id="pills-day" role="tabpanel"
                                            aria-labelledby="pills-home-tabHorizontal">
                                        </div>

                                        <div class="tab-pane fade" id="pills-night" role="tabpanel"
                                            aria-labelledby="pills-home-tabHorizontal">
                                            <div class="overflow-x-auto -mx-6">
                                                <div class="inline-block min-w-full align-middle">
                                                    <div class="overflow-hidden ">
                                                        <table
                                                            class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                                            <thead class="  bg-slate-200 dark:bg-slate-700">
                                                                <tr>

                                                                    <th scope="col" class=" table-th ">
                                                                        Departement
                                                                    </th>

                                                                    <th scope="col" class=" table-th ">
                                                                        Kategori
                                                                    </th>

                                                                    <th scope="col" class=" table-th ">
                                                                        Total
                                                                    </th>

                                                                </tr>
                                                            </thead>
                                                            <tbody
                                                                class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                                                @foreach ($night_count as $item)
                                                                    <tr>
                                                                        <td class="table-td">
                                                                            <div class="flex items-center">
                                                                                <h4
                                                                                    class="text-sm font-medium text-slate-600 whitespace-nowrap">
                                                                                    {{ $item->division }}
                                                                                </h4>
                                                                            </div>
                                                                        </td>
                                                                        <td class="table-td">
                                                                            <div class="flex items-center">
                                                                                <h4
                                                                                    class="text-sm font-medium text-slate-600 whitespace-nowrap">
                                                                                    {{ $item->value }}
                                                                                </h4>
                                                                            </div>
                                                                        </td>
                                                                        <td class="table-td ">
                                                                            <div
                                                                                class="flex space-x-6 items-center rtl:space-x-reverse">
                                                                                <span>{{ $item->total }}</span>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="pills-office" role="tabpanel"
                                            aria-labelledby="pills-home-tabHorizontal">
                                            <div class="overflow-x-auto -mx-6">
                                                <div class="inline-block min-w-full align-middle">
                                                    <div class="overflow-hidden ">
                                                        <table
                                                            class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                                            <thead class="  bg-slate-200 dark:bg-slate-700">
                                                                <tr>

                                                                    <th scope="col" class=" table-th ">
                                                                        Departement
                                                                    </th>

                                                                    <th scope="col" class=" table-th ">
                                                                        Kategori
                                                                    </th>

                                                                    <th scope="col" class=" table-th ">
                                                                        Total
                                                                    </th>

                                                                </tr>
                                                            </thead>
                                                            <tbody
                                                                class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                                                @foreach ($office_count as $item)
                                                                    <tr>
                                                                        <td class="table-td">
                                                                            <div class="flex items-center">
                                                                                <h4
                                                                                    class="text-sm font-medium text-slate-600 whitespace-nowrap">
                                                                                    {{ $item->division }}
                                                                                </h4>
                                                                            </div>
                                                                        </td>
                                                                        <td class="table-td">
                                                                            <div class="flex items-center">
                                                                                <h4
                                                                                    class="text-sm font-medium text-slate-600 whitespace-nowrap">
                                                                                    {{ $item->value }}
                                                                                </h4>
                                                                            </div>
                                                                        </td>
                                                                        <td class="table-td ">
                                                                            <div
                                                                                class="flex space-x-6 items-center rtl:space-x-reverse">
                                                                                <span>{{ $item->total }}</span>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
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


    </div>


    @push('scripts')
        @vite(['resources/js/plugins/flatpickr.js'])
        <script type="module">
            $("#tanggal").flatpickr({
                dateFormat: "Y-m-d",
                defaultDate: "today",
            });
            var table = $("#data-table, .data-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{!! route('dashboard.rekap_hadir') !!}',
                    data: function(d) {
                        return $.extend({}, d, {
                            tanggal: $('#tanggal').val(),
                            project: $('#project').val(),
                            shift: $('#shift').val()
                        })
                    },
                },
                dom: "<'grid grid-cols-12 gap-5 px-6 mt-6'<'col-span-4'l><'col-span-8 flex justify-end'f><'#pagination.flex items-center'>><'min-w-full't><'flex justify-end items-center'p>",
                paging: false,
                ordering: true,
                info: false,
                searching: true,
                // pagingType: 'full_numbers',
                lengthChange: true,
                // lengthMenu: [10, 25, 50, 100],
                language: {
                    lengthMenu: "Show _MENU_",
                    paginate: {
                        previous: `<iconify-icon icon="heroicons:chevron-left-20-solid"></iconify-icon>`,
                        next: `<iconify-icon icon="heroicons:chevron-right-20-solid"></iconify-icon>`,
                        first: `<iconify-icon icon="heroicons:chevron-double-left-20-solid"></iconify-icon>`,
                        last: `<iconify-icon icon="heroicons:chevron-double-right-20-solid"></iconify-icon>`,
                    },
                    search: "Search:",
                },
                "columnDefs": [{
                        "searchable": false,
                        "targets": [1, 2]
                    },
                    {
                        "orderable": false,
                        "targets": [1, 2]
                    },
                    {
                        'className': 'table-td',
                        "targets": "_all"
                    }
                ],
                columns: [{
                        data: 'site'
                    },
                    {
                        data: 'division',
                    },

                    {
                        data: 'value',
                    },

                    {
                        data: 'total',
                    },
                ],
            });
            table.tables().body().to$().addClass('bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700');

            $('#tanggal,#shift,#project').bind('change', function() {
                table.draw()
            })
            // $(document).on('submit', '#sending_form', (e) => {
            //     e.preventDefault();
            //     var type = $("#sending_form").data('type');
            //     var data = $('#sending_form').serializeArray();
            //     var id = $("#sending_form").find("input[name='id']").val()
            //     var url = type == 'submit' ? '{!! route('masters.division.store') !!}' : '{!! route('masters.division.update', ['id' => ':id']) !!}';

            //     $.post(url.replace(':id', id), data)
            //         .done(function(msg) {
            //             if (!msg.success) {
            //                 Swal.fire({
            //                     title: 'Error',
            //                     text: 'data belum lengkap',
            //                     icon: 'error',
            //                     confirmButtonText: 'Oke'
            //                 })
            //             } else {
            //                 Swal.fire({
            //                     title: 'success',
            //                     text: msg.message,
            //                     icon: 'success',
            //                     confirmButtonText: 'Oke'
            //                 }).then(() => {
            //                     table.draw()
            //                     $("#btn_cancel").click();
            //                 })
            //             }
            //         })
            //         .fail(function(xhr, status, error) {
            //             Swal.fire({
            //                 title: 'Error!',
            //                 text: 'Internal Error',
            //                 icon: 'error',
            //                 confirmButtonText: 'OK'
            //             })
            //         });
            // })

            // $(document).on('click', '#btn-add', () => {
            //     $("#sending_form").data("type", "submit");
            // })

            // $('#data-table').on('draw.dt', function() {
            //     $('[data-toggle="tooltip"]').tooltip();
            // });

            // table.on('draw', function() {
            //     tippy(".onTop", {
            //         content: "Tooltip On Top!",
            //         placement: "top",
            //     });
            // });

            // $(document).on('click', '#btn-edit', (e) => {
            //     $("#sending_form").data("type", "update");
            //     var id = $(e.currentTarget).data('id');
            //     var url = '{!! route('masters.division.edit', ['id' => ':id']) !!}';
            //     url = url.replace(':id', id);

            //     $.ajax({
            //         type: 'GET',
            //         url: url,
            //         success: (msg) => {
            //             // $('#default_modal').modal();
            //             $("#sending_form").find("input[name='division']").val(msg.data.division)
            //             $("#sending_form").find("input[name='id']").val(id)
            //         }
            //     })
            // })

            // $(document).on('click', '#btn-delete', (e) => {
            //     var id = $(e.currentTarget).data('id');
            //     Swal.fire({
            //         title: 'Are you sure?',
            //         text: "You won't be able to revert this!",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Yes, delete it!'
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             var url = '{!! route('masters.division.destroy', ['id' => ':id']) !!}';
            //             url = url.replace(':id', id);
            //             $.ajax({
            //                 url: url,
            //                 type: 'DELETE',
            //                 data: {
            //                     "_token": "{{ csrf_token() }}"
            //                 },
            //                 success: (msg) => {
            //                     if (msg.success) {
            //                         Swal.fire(
            //                             'Deleted!',
            //                             'Your file has been deleted.',
            //                             'success'
            //                         ).then(() => {
            //                             table.draw()
            //                         })
            //                     }
            //                 }
            //             })
            //         }
            //     })
            // })
        </script>
    @endpush
</x-appLayout>
