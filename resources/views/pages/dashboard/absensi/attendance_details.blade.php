<x-appLayout>

    {{-- table --}}
    <div class="space-y-8">
        <div class="space-y-5">
            <div class="card">
                <div class="card-header noborder !pb-0">
                    <div class="grid pb-5 gap-2">
                        <span class="font-semibold text-xl">{{ $user->profile->name }}</span>
                        <span class="font-semibold text-xs">{{ $user->employee->division->division }} -
                            {{ $user->employee->position->position }}</span>
                    </div>
                    <button class="btn btn-sm inline-flex justify-center btn-outline-primary rounded-[25px]"
                        onclick="{ $('#form_Export').submit()}">
                        <span class="flex items-center">
                            <iconify-icon class="text-xl mr-2"
                                icon="material-symbols-light:export-notes"></iconify-icon>
                            <span>Export Data</span>
                        </span>
                    </button>
                </div>
                <div class="h-auto grid grid-cols-4 px-5 gap-4 mb-4">
                    <form action="{{ route('absensi.attendance.export_details', ['id' => $user->id]) }}" target="_blank"
                        id="form_Export">
                        <div class="input-area">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input class="form-control py-2 flatpickr flatpickr-input active" name="tanggal"
                                id="tanggal" value="" type="text" readonly="readonly">
                            <div class="font-Inter text-sm text-danger-500 pt-2 error-message" style="display: none">
                                This
                                is
                                invalid state.</div>
                        </div>
                    </form>
                </div>
                <div class="card-body px-6 pb-6">
                    <div class="overflow-x-auto -mx-6 dashcode-data-table">
                        <span class="col-span-8 hidden"></span>
                        <span class="col-span-4 hidden"></span>
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden">
                                <table
                                    class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                                    <thead class="bg-slate-200 dark:bg-slate-700">
                                        <tr>
                                            <th scope="col" class="table-th">
                                                Tanggal
                                            </th>
                                            <th scope="col" class="table-th">
                                                Hari
                                            </th>
                                            <th scope="col" class="table-th">
                                                Absen Masuk
                                            </th>
                                            <th scope="col" class="table-th">
                                                telat masuk
                                            </th>
                                            <th scope="col" class="table-th">
                                                Absen Pulang
                                            </th>
                                            <th scope="col" class="table-th">
                                                pulang cepat
                                            </th>
                                            <th scope="col" class="table-th">
                                                Shift
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                    </tbody>
                                </table>
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
                mode: "range",
                dateFormat: "Y-m-d",
            });
            // table
            var detail_url = '{!! route('absensi.attendance.details', ['id' => $user->id]) !!}';
            var table = $("#data-table, .data-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    'url': detail_url,
                    data: function(d) {
                        return $.extend({}, d, {
                            tanggal: $('#tanggal').val(),
                        })
                    },
                },
                dom: "<'#pagination.flex items-center'><'min-w-full't><'flex justify-center items-center'p>",
                paging: false,
                ordering: false,
                autoWidth: false,
                info: false,
                searching: false,
                pagingType: 'full_numbers',
                lengthChange: false,
                lengthMenu: [10, 25, 50, 100],
                language: {
                    lengthMenu: "Show _MENU_",
                    paginate: {
                        previous: `<iconify-icon icon="heroicons:chevron-left-20-solid"></iconify-icon>`,
                        next: `<iconify-icon icon="heroicons:chevron-right-20-solid"></iconify-icon>`,
                        first: `<iconify-icon icon="heroicons:chevron-double-left-20-solid"></iconify-icon>`,
                        last: `<iconify-icon icon="heroicons:chevron-double-right-20-solid"></iconify-icon>`,
                    },
                    search: "Search:",
                    'loadingRecords': '&nbsp;',
                    'processing': 'Loading...'
                },
                "columnDefs": [
                    // { "searchable": false, "targets": [-1] },
                    {
                        "orderable": false,
                        "targets": [-1]
                    },
                    {
                        'className': 'table-td',
                        "targets": "_all"
                    }
                ],
                columns: [{
                    data: 'tanggal'
                }, {
                    data: 'hari'
                }, {
                    data: 'masuk'
                }, {
                    data: 'telat'
                }, {
                    data: 'pulang'
                }, {
                    data: 'cepat'
                }, {
                    data: 'shift'
                }],
            });

            $(document).on('click', "#submit", function(e) {
                $('#dept_err').hide()
                var data = $(':checkbox:checked');
                if (data.length <= 0) {
                    $('#dept_err').show()
                } else {
                    $("#submit_forrm").click()
                }
            });

            $('#tanggal').bind('change', function() {
                table.ajax.reload()
            })
        </script>
    @endpush
</x-appLayout>
