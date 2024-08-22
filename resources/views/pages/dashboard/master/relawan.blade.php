<x-appLayout>

    <div class="space-y-8">
        <div class=" space-y-5">
            <div class="card">
                <header class=" card-header noborder">
                    <h4 class="card-title">Daftar Relawan</h4>

                </header>
                <div class="card-body px-6 pb-6 space-y-2">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 ">
                        <div class="input-area">
                            <label for="username" class="form-label">Nama</label>
                            <input id="name" type="text" name="name" class="form-control" placeholder="Nama"
                                required="required">
                        </div>
                        @if (Auth::guard('web')->user()->profile->level > 1)
                            <div class="input-area">
                                <label for="level" class="form-label">Kecamatan</label>
                                <select id="kec" class="form-control" name="kec">
                                    <option value="" selected class="dark:bg-slate-700 !text-slate-300">Pilih
                                        Data
                                    </option>
                                    @foreach ($kecamatan as $item)
                                        <option value="{{ $item->id }}" class="dark:bg-slate-700 !text-slate-300">
                                            {{ $item->kecamatan }}</option>
                                    @endforeach
                                </select>
                                <div class="font-Inter text-sm text-danger-500 pt-2 error-message"
                                    style="display: none">
                                    This is invalid state.</div>
                            </div>
                            <div class="input-area">
                                <label for="level" class="form-label">Desa/Kelurahan</label>
                                <select id="desa" class="form-control" name="desa">
                                    <option value="" selected class="dark:bg-slate-700 !text-slate-300">Pilih
                                        Data
                                    </option>
                                </select>
                            </div>

                        @endif
                        <div class="input-area">
                            <label for="level" class="form-label">TPS</label>
                            <select id="tps" class="form-control" name="tps">
                                <option value="" selected class="dark:bg-slate-700 !text-slate-300">Pilih Data
                                </option>
                            </select>
                            <div class="font-Inter text-sm text-danger-500 pt-2 error-message" style="display: none">
                                This is invalid state.</div>
                        </div>

                    </div>
                </div>
                <div class="card-body px-6 pb-6">
                    <div class="overflow-x-auto -mx-6 dashcode-data-table">
                        <span class=" col-span-8  hidden"></span>
                        <span class="  col-span-4 hidden"></span>
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden ">
                                <table
                                    class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                                    <thead class=" bg-slate-200 dark:bg-slate-700">
                                        <tr>
                                            <th scope="col" class=" table-th ">
                                                Nama
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Jenkel
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Usia
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Kecamatan
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Desa/Kelurahan
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                RT
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                RW
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                TPS
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        @vite(['resources/js/plugins/Select2.min.js'])
        <script type="module">
            $('#lokasi').select2({
                dropdownParent: $('#offcanvas')
            });
            var table = $("#data-table, .data-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{!! route('master.relawan') !!}',
                    data: function(d) {
                        return $.extend({}, d, {
                            relawan: 'Y',
                            name: $('#name').val(),
                            tps: $('#tps').val(),
                            kec: $('#kec').val(),
                            desa: $('#desa').val(),
                        })
                    },
                },
                dom: "<'grid grid-cols-12 gap-5 px-6 mt-6'<'col-span-4'l><'col-span-8 flex justify-end'f><'#pagination.flex items-center'>><'min-w-full't><'flex justify-end items-center'p>",
                paging: true,
                ordering: true,
                info: false,
                searching: false,
                pagingType: 'full_numbers',
                lengthChange: true,
                lengthMenu: [25, 50, 100],
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
                        "targets": [3, 4]
                    },
                    // {
                    //     "orderable": false,
                    //     "targets": [8]
                    // },
                    {
                        'className': 'table-td',
                        "targets": "_all"
                    }
                ],
                columns: [{
                        data: 'nama',
                    },
                    {
                        data: 'jenkel',
                    },
                    {
                        data: 'usia',
                    },
                    {
                        data: 'kecamatan.kecamatan',
                        name: 'kec'
                    },
                    {
                        data: 'kelurahan.desa',
                        name: 'desa'
                    },
                    {
                        data: 'rt',
                    },
                    {
                        data: 'rw',
                    },
                    {
                        data: 'tps',
                    }
                ],
            });

            table.tables().body().to$().addClass('bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700');

            $('#name, #tps, #kec, #desa, #filter').bind('change', function() {
                table.draw()
            })

            $(document).on('click', '#btn-add', () => {
                $("select[name='company']").val("").change();
                $("#sending_form")[0].reset();
                $("#sending_form").data("type", "submit");
            })

            $(document).on('submit', '#sending_form', (e) => {
                e.preventDefault();
                var type = $("#sending_form").data('type');
                var data = $('#sending_form').serializeArray();
                var id = $("#sending_form").find("input[name='id']").val()
                var url = type == 'submit' ? '{!! route('master.users.store') !!}' : '{!! route('master.users.update', ['id' => ':id']) !!}';

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


            $('#kec').select2({
                placeholder: 'Pilih Data'
            });
            $(document).on('change', '#kec', function(e) {
                e.preventDefault();
                let val = $(this).val();
                let level = $("#level").val()
                let dataOption = '<option value="" class="dark:bg-slate-700">Pilih Data</option>';
                var url = '{!! route('ajax.kelurahan', ['id' => ':id']) !!}';
                url = url.replace(':id', val);
                $.ajax({
                    type: 'GET',
                    url: url,
                    success: (res) => {
                        if (res.data.length > 0) {
                            res.data.map((data) => {
                                dataOption +=
                                    `<option value="${data.id}" class="dark:bg-slate-700">${data.desa}</option>`
                            })
                        }
                        $('#desa').html(dataOption);
                        $("#desa").prop('disabled', false);
                        $('#desa').select2({
                            placeholder: 'Pilih Data'
                        });
                    },
                    error: () => {
                        $('select[name="desa"]').html(dataOption)
                    }
                })

            })

            $(document).on('change', '#desa', function(e) {
                e.preventDefault();
                let val = $(this).val();
                let level = $("#level").val()
                let dataOption = '<option value="" class="dark:bg-slate-700">Pilih Data</option>';
                var url = '{!! route('ajax.tps', ['id' => ':id']) !!}';
                url = url.replace(':id', val);
                $.ajax({
                    type: 'GET',
                    url: url,
                    success: (res) => {
                        if (res.data.length > 0) {
                            res.data.map((data) => {
                                dataOption +=
                                    `<option value="${data.tps}" class="dark:bg-slate-700">${data.tps}</option>`
                            })
                        }
                        $('#tps').html(dataOption);
                        $("#tps").prop('disabled', false);
                        $('#tps').select2({
                            placeholder: 'Pilih Data'
                        });
                    },
                    error: () => {
                        $('select[name="tps"]').html(dataOption)
                    }
                })

            })
        </script>
    @endpush
</x-appLayout>
