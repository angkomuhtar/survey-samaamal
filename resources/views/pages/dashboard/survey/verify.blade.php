<x-appLayout>




    <div class="space-y-8">
        <div class=" space-y-5">
            <div class="card">
                <header class=" card-header noborder">
                    <h4 class="card-title">Verifikasi Kecamatan</h4>
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
                                <div class="font-Inter text-sm text-danger-500 pt-2 error-message"
                                    style="display: none">
                                    This is invalid state.</div>
                            </div>

                        @endif
                        <div class="input-area">
                            <label for="level" class="form-label">TPS</label>
                            <select id="tps" class="form-control" name="tps">
                                <option value="" selected class="dark:bg-slate-700 !text-slate-300">Pilih Data
                                </option>
                                @foreach ($tps as $item)
                                    <option value="{{ $item->tps }}" class="dark:bg-slate-700 !text-slate-300">
                                        {{ $item->tps }}</option>
                                @endforeach
                            </select>
                            <div class="font-Inter text-sm text-danger-500 pt-2 error-message" style="display: none">
                                This is invalid state.</div>
                        </div>
                        <div class="input-area">
                            <label for="level" class="form-label">Filter</label>
                            <select id="filter" class="form-control" name="filter[]" multiple="multiple">
                                <option value="BV" class="dark:bg-slate-700 !text-slate-300">Belum
                                    Verifikasi
                                </option>
                                <option value="V" class="dark:bg-slate-700 !text-slate-300">
                                    Terverifikasi
                                </option>
                            </select>
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
                                                Verifikasi
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Nama
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Desa/Kelurahan
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Status
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
        <script type="module">
            $('#lokasi').select2({
                dropdownParent: $('#offcanvas')
            });
            var table = $("#data-table, .data-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{!! route('verify') !!}',
                    data: function(d) {
                        return $.extend({}, d, {
                            name: $('#name').val(),
                            tps: $('#tps').val(),
                            kec: $('#kec').val(),
                            desa: $('#desa').val(),
                            filter: $('#filter').val(),
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
                        "targets": "_all"
                    },
                    {
                        "orderable": false,
                        "targets": "_all"
                    },
                    {
                        'className': 'table-td',
                        "targets": "_all"
                    },
                    {
                        width: '200px',
                        targets: [0]
                    }
                ],
                columns: [{
                        data: 'kelurahan.survey',
                        name: 'status',
                        render: (data, type, row, meta) => {
                            if (row.survey[0].kec_verify == 'N') {
                                return `<div class="flex-1">
                                        <a href="#" class="btn btn-sm inline-flex justify-center btn-outline-primary items-center" id="btn-verify" data-id="${row.survey[0].id}" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas">
                                            <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2" icon="heroicons-outline:newspaper"></iconify-icon>
                                            <span>Verifikasi</span>
                                        </a>
                                    </div>`;
                            } else {
                                return `<div href="#" class="btn btn-sm inline-flex justify-center btn-outline-success items-center"> 
                                    <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2" icon ="heroicons:check-badge-20-solid"></iconify-icon>
                                    <span> Terverifikasi </span> 
                                    </div>`;
                            }
                        }
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        render: (data, type, row, meta) => {
                            return `<div class="flex-1">
                                        <div class="text-slate-800 dark:text-slate-300 text-sm font-medium mb-1">${row.nama}</div>
                                        <div class="text-xs hover:text-[#68768A] font-normal text-slate-600 dark:text-slate-300">${row.usia} thn, ${row.jenkel == 'L' ? 'Laki-laki' : 'Perempuan'}</div> 
                                        <div class="text-slate-400 dark:text-slate-400 text-xs mt-1" >${row.status_pemilih}</div>
                                    </div>`;
                        }
                    },
                    {
                        data: 'kelurahan.desa',
                        name: 'desa',
                        render: (data, type, row, meta) => {
                            return `<div class="flex-1">
                                        <div class="text-slate-800 dark:text-slate-300 text-sm font-medium mb-1">${row.kelurahan.desa}</div>
                                        <div class="text-xs hover:text-[#68768A] font-normal text-slate-600 dark:text-slate-300">RT ${row.rt}, RW ${row.rw}, TPS ${row.tps}</div> 
                                        <div class="text-slate-400 dark:text-slate-400 text-xs mt-1" >${row.kecamatan.kecamatan}</div>
                                    </div>`;
                        }
                    },
                    {
                        data: 'kelurahan.survey',
                        name: 'status',
                        render: (data, type, row, meta) => {
                            return `<div class="flex-1">
                                        <div class="text-slate-800 dark:text-slate-300 text-sm font-medium mb-1">${row.survey[0].pilihan == '5' ? 'Belum Memilih - ' : row.survey[0].pilihan == '1' ? 'Memilih - ' : 'Netral'} ${row.survey[0].paslon.id != '999' ? row.survey[0].paslon.nama : '' }</div>
                                        ${row.survey[0].kec_verify == 'Y' ? 
                                        `<div class="text-xs hover:text-[#68768A] font-normal text-slate-600 dark:text-slate-300 flex justify-start items-center "><iconify-icon class="text-sm mr-1" icon="heroicons:check-badge-20-solid"></iconify-icon><span>terverifikasi</span></div>` : ''}
                                        ${row.survey[0].kordinator != null ?  
                                        `<div class="text-xs hover:text-[#68768A] font-normal text-slate-600 dark:text-slate-300 flex justify-start items-center "><iconify-icon class="text-sm mr-1" icon="heroicons:user-group-20-solid"></iconify-icon><span>${row.survey[0].kordinator} ${row.survey[0].relawan == 'Y' ? '(Relawan)' : ''}</span></div>` : ''}              
                                        ${row.survey[0].ket ?
                                        `<div class="text-slate-400 dark:text-slate-400 text-xs mt-1" >${row.survey[0].ket}</div>` : '' }
                                    </div>`;
                        }
                    },
                ],
            });

            table.tables().body().to$().addClass('bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700');

            $('#name, #tps, #kec, #desa, #filter').bind('change', function() {
                table.draw()
            })

            $(document).on('click', '#btn-edit', (e) => {
                $("#sending_form")[0].reset();
                var id = $(e.currentTarget).data('id');
                $("#id").val(id);
            })

            $(document).on('submit', '#sending_form', (e) => {
                e.preventDefault();
                var type = $("#sending_form").data('type');
                var data = $('#sending_form').serializeArray();
                var id = $("#sending_form").find("input[name='id']").val()
                var url = '{!! route('survey.store') !!}';

                $.post(url, data)
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

            $(document).on('change', '#pilihan', function() {
                let pilihan = $(this).val();
                if (pilihan == 0) {
                    $("#paslon").attr('disabled', 'disabled');
                    $("#paslon").val("").change();
                } else {
                    $("#paslon").prop('disabled', false);
                }
            })

            $(document).on('click', '#btn-verify', (e) => {
                var id = $(e.currentTarget).data('id');
                Swal.fire({
                    title: 'Anda Yakin.?',
                    text: "Data Survey Akan di verifikasi",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = '{!! route('verify.verified', ['id' => ':id']) !!}';
                        url = url.replace(':id', id);
                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: (msg) => {
                                if (msg.success) {
                                    Swal.fire(
                                        'Success!',
                                        'Data terverifikasi',
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

            $('#filter').select2();
            var usersLevel = {!! Auth::guard('web')->user()->profile->level !!};

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
        </script>
    @endpush
</x-appLayout>
