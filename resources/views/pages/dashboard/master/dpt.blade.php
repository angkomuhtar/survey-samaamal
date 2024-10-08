<x-appLayout>

    {{-- form offcanvas --}}
    <div class="offcanvas offcanvas-end fixed bottom-0 flex flex-col max-w-full bg-white dark:bg-slate-800 invisible bg-clip-padding shadow-sm outline-none transition duration-300 ease-in-out text-gray-700 top-0 ltr:right-0 rtl:left-0 border-none w-96"
        tabindex="-1" id="offcanvas" aria-labelledby="offcanvas">
        <div
            class="offcanvas-header flex items-center justify-between p-4 pt-3 border-b border-b-slate-300 dark:border-b-slate-900">
            <div>
                <h3 class="block text-xl font-Inter text-slate-900 font-medium dark:text-[#eee]">
                    Data Jabatan
                </h3>
            </div>
            <button type="button"
                class="box-content text-2xl w-4 h-4 p-2 pt-0 -my-5 -mr-2 text-black dark:text-white border-none rounded-none opacity-100 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                data-bs-dismiss="offcanvas">
                <iconify-icon icon="line-md:close"></iconify-icon>
            </button>
        </div>
        <div class="offcanvas-body flex-grow overflow-y-auto">
            <div class="settings-modal">
                <div class="divider"></div>
                <div class="p-6">
                    <form class="space-y-4" id="sending_form">
                        <input type="hidden" name="id" id="id" value="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Username</label>
                            <div class="relative">
                                <input type="text" name="username" class="form-control !pl-9" placeholder="username">
                                <iconify-icon icon="heroicons:globe-alt"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                            </div>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Password</label>
                            <div class="relative">
                                <input type="password" name="password" class="form-control !pl-9"
                                    placeholder="password">
                                <iconify-icon icon="heroicons:globe-alt"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                            </div>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Nama</label>
                            <div class="relative">
                                <input type="text" name="name" class="form-control !pl-9" placeholder="name">
                                <iconify-icon icon="heroicons:globe-alt"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                            </div>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Level Akun</label>
                            <div class="relative">
                                <select id="select" class="form-control !pl-9" name="level">
                                    <option value="" selected disabled class="dark:bg-slate-700 text-slate-300">
                                        Pilih Data</option>
                                    <option value="1" class="dark:bg-slate-700 !text-slate-300">Desa/Kelurahan
                                    </option>
                                    <option value="2" class="dark:bg-slate-700 !text-slate-300">Kecamatan
                                    </option>
                                    <option value="3" class="dark:bg-slate-700 !text-slate-300">Kabupaten
                                    </option>
                                    <option value="6" class="dark:bg-slate-700 !text-slate-300">Admin</option>
                                </select>
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                            </div>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Lokasi</label>
                            <div class="relative">
                                <select id="lokasi" class="form-control !pl-9" name="lokasi">
                                    <option selected disabled class="dark:bg-slate-700 text-slate-300">Pilih Data
                                    </option>
                                    <option value="6" class="dark:bg-slate-700 !text-slate-300">Admin</option>
                                    <option value="6" class="dark:bg-slate-700 !text-slate-300">Admin</option>
                                    <option value="6" class="dark:bg-slate-700 !text-slate-300">Admin</option>
                                    <option value="6" class="dark:bg-slate-700 !text-slate-300">Admin</option>

                                </select>
                            </div>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Username</label>
                            <div class="relative">
                                <input type="text" name="username" class="form-control !pl-9" placeholder="username">
                                <iconify-icon icon="heroicons:globe-alt"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                            </div>
                        </div>
                        <div class="flex justify-end space-x-3">
                            <button type="submit"
                                class="btn btn-sm inline-flex justify-center btn-dark">Simpan</button>
                            <button type="reset" id="btn_cancel" data-bs-dismiss="offcanvas"
                                class="btn btn-sm btn-outline-danger inline-flex justify-center btn-dark">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="space-y-8">
        <div class=" space-y-5">
            <div class="card">
                <header class=" card-header noborder">
                    <h4 class="card-title">{{ $pageTitle }}</h4>
                    {{-- <button data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas"
                        class="btn btn-sm inline-flex justify-center btn-primary" id="btn-add">
                        <span class="flex items-center">
                            <span>Tambah Data</span>
                            <iconify-icon class="text-xl ltr:ml-2 rtl:mr-2"
                                icon="mdi:database-plus-outline"></iconify-icon>
                        </span>
                    </button> --}}
                </header>
                <div class="card-body px-6 pb-6 space-y-2">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 ">
                        <div class="input-area">
                            <label for="username" class="form-label">Nama</label>
                            <input id="name" type="text" name="name" class="form-control"
                                placeholder="Nama" required="required">
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
                                            <th scope="col" class=" table-th ">
                                                Status Pemilih
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
                    url: '{!! route('master.dpt') !!}',
                    data: function(d) {
                        return $.extend({}, d, {
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
                    },
                    {
                        data: 'status_pemilih',
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
