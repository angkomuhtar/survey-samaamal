<x-appLayout>

    {{-- table --}}
    <div class="space-y-8">
        <div class="space-y-5">
            <div class="card">
                <div class="card-header noborder !pb-0">
                    <h4 class="card-title">Absensi</h4>
                    <a href="{{ route('absensi.attendance.export') }}" target="_blank"
                        class="btn inline-flex justify-center btn-outline-primary rounded-[25px]">
                        <span class="flex items-center">
                            <iconify-icon class="text-xl mr-2" icon="mi:filter"></iconify-icon>
                            <span>filter</span>
                        </span>
                    </a>
                </div>
                <div class="h-auto grid grid-cols-4 px-5 gap-4 mb-4">
                    <div class="input-area">
                        <label for="tanggal" class="form-label">Tanggal Lahir</label>
                        <input class="form-control py-2 flatpickr flatpickr-input active" name="tanggal"
                            id="default-picker" value="" type="text" readonly="readonly">
                        <div class="font-Inter text-sm text-danger-500 pt-2 error-message" style="display: none">This is
                            invalid state.</div>
                    </div>
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
                                                Nama
                                            </th>
                                            <th scope="col" class="table-th">
                                                Departement
                                            </th>
                                            <th scope="col" class="table-th">
                                                Absen Masuk
                                            </th>
                                            <th scope="col" class="table-th">
                                                Absen Pulang
                                            </th>
                                            <th scope="col" class="table-th">
                                                telat masuk
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
            $(".flatpickr").flatpickr({
                dateFormat: "Y-m-d",
                defaultDate: "today",
            });
            // table
            var table = $("#data-table, .data-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    'url': '{!! route('absensi.attendance') !!}',
                    'data': function(data) {
                        data.tanggal = $("input[name=tanggal]").val()
                    }
                },
                dom: "<'#pagination.flex items-center'><'min-w-full't><'flex justify-center items-center'p>",
                paging: true,
                ordering: true,
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
                    render: (data, type, row) => {
                        return row.profile?.name ?? ''
                    }
                }, {
                    render: (data, type, row) => {
                        return row.employee?.division.division ?? ''
                    }
                }, {
                    render: (data, type, row) => {
                        return row.absen[0]?.clock_in ?? ''
                    }
                }, {
                    render: (data, type, row) => {
                        return row.absen[0]?.clock_out ?? ''
                    }
                }, {
                    render: (data, type, row, meta) => {
                        var startTime = moment(row?.absen[0]?.clock_in, "hh:mm:ss");
                        var start = moment(row?.absen[0]?.shift?.start, "hh:mm:ss");
                        var seconds = startTime.diff(start, 's')

                        if (seconds < 0 || isNaN(seconds)) {
                            return '-'
                        } else {
                            const hours = Math.floor(seconds / 3600)
                            const minutes = Math.floor((seconds % 3600) / 60)
                            return `${hours} hours : ${minutes} minutes`;
                        }
                    }
                }, {
                    render: (data, type, row, meta) => {
                        var clock = moment(row?.absen[0]?.clock_out, "hh:mm:ss");
                        var end = moment(row?.absen[0]?.shift?.end, "hh:mm:ss");
                        var seconds = end.diff(clock, 's');
                        if (seconds < 0 || isNaN(seconds)) {
                            return '-'
                        } else {
                            const hours = Math.floor(seconds / 3600)
                            const minutes = Math.floor((seconds % 3600) / 60)
                            return `${hours} hours : ${minutes} minutes`;
                        }
                    }
                }, {
                    render: (data, type, row, meta) => {
                        return row?.absen[0]?.shift ?
                            `${row?.absen[0]?.shift?.name} (${row?.absen[0]?.shift?.start} - ${row?.absen[0]?.shift?.end})` :
                            '-';
                    }
                }, ],
            });

            // submit data
            $(document).on('submit', '#sending_form', (e) => {
                e.preventDefault();
                var type = $("#sending_form").data('type');
                var data = $('#sending_form').serializeArray();
                var id = $("#sending_form").find("input[name='id']").val()
                var url = type == 'submit' ? '{!! route('masters.position.store') !!}' : '{!! route('masters.position.update', ['id' => ':id']) !!}';

                $.post(url.replace(':id', id), data)
                    .done(function(msg) {
                        if (!msg.success) {
                            Swal.fire({
                                title: 'Error',
                                text: 'data belum lengkap',
                                icon: 'error',
                                confirmButtonText: 'Oke'
                            })
                        } else {
                            Swal.fire({
                                title: 'success',
                                text: msg.message,
                                icon: 'success',
                                confirmButtonText: 'Oke'
                            }).then(() => {
                                table.draw()
                                $("#btn_cancel").click();
                            })
                        }
                    })
                    .fail(function(xhr, status, error) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Internal Error',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        })
                    });
            })

            $(document).on('change', 'input[name=tanggal]', (e) => {
                table.draw()
            })

            $(document).on('click', '#btn-add', () => {
                $("select[name='company']").val("").change();
                $("#sending_form")[0].reset();
                $("#sending_form").data("type", "submit");
            })

            table.on('draw', function() {
                tippy(".onTop", {
                    content: "Tooltip On Top!",
                    placement: "top",
                });
            });

            $(document).on('click', '#btn-edit', (e) => {
                $("#sending_form").data("type", "update");
                var id = $(e.currentTarget).data('id');
                var url = '{!! route('masters.position.edit', ['id' => ':id']) !!}';
                url = url.replace(':id', id);

                $.ajax({
                    type: 'GET',
                    url: url,
                    success: (msg) => {
                        // $('#default_modal').modal();
                        console.log(msg);
                        $("#sending_form").find("select[name='company']").val(msg.data.company_id);
                        var url = '{!! route('ajax.division', ['id' => ':id']) !!}';
                        url = url.replace(':id', msg.data.company_id);
                        $.ajax({
                            type: 'GET',
                            url: url,
                            success: (res) => {
                                var dataOption =
                                    '<option selected disabled class="dark:bg-slate-700 text-slate-300">Pilih Data</option>';
                                if (res.data.length > 0) {
                                    res.data.map((data) => {
                                        dataOption +=
                                            `<option value="${data.id}" class="dark:bg-slate-700">${data.division}</option>`
                                    })
                                }
                                $('select[name="division"]').html(dataOption)
                            },
                            complete: () => {
                                $("select[name='division']").val(msg.data.division_id);
                            }
                        })
                        $("#sending_form").find("input[name='position']").val(msg.data.position);
                        $("#sending_form").find("input[name='id']").val(id)
                    }
                })
            })

            $(document).on('click', '#btn-delete', (e) => {
                var id = $(e.currentTarget).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = '{!! route('masters.position.destroy', ['id' => ':id']) !!}';
                        url = url.replace(':id', id);
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: (msg) => {
                                if (msg.success) {
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    ).then(() => {
                                        table.draw()
                                    })
                                }
                            }
                        })
                    }
                })
            })
        </script>
    @endpush
</x-appLayout>
