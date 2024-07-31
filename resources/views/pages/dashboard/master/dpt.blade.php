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
                    <button data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas"
                        class="btn btn-sm inline-flex justify-center btn-primary" id="btn-add">
                        <span class="flex items-center">
                            <span>Tambah Data</span>
                            <iconify-icon class="text-xl ltr:ml-2 rtl:mr-2"
                                icon="mdi:database-plus-outline"></iconify-icon>
                        </span>
                    </button>
                </header>
                <div class="card-body px-6 pb-6">
                    <div class="grid grid-cols-4 gap-3 ">
                        <div class="input-area">
                            <label for="username" class="form-label">Nama</label>
                            <input id="name" type="text" name="name" class="form-control"
                                placeholder="Nama" required="required">
                        </div>
                        <div class="input-area">
                            <label for="level" class="form-label">Kecamatan</label>
                            <select id="kec" class="form-control" name="kec">
                                <option value="" selected class="dark:bg-slate-700 !text-slate-300">Pilih Data
                                </option>
                            </select>
                            <div class="font-Inter text-sm text-danger-500 pt-2 error-message" style="display: none">
                                This is invalid state.</div>
                        </div>
                        <div class="input-area">
                            <label for="level" class="form-label">Desa/Kelurahan</label>
                            <select id="desa" class="form-control" name="desa">
                                <option value="" selected class="dark:bg-slate-700 !text-slate-300">Pilih Data
                                </option>
                            </select>
                            <div class="font-Inter text-sm text-danger-500 pt-2 error-message" style="display: none">
                                This is invalid state.</div>
                        </div>
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
                                                Desa/Kelurahan
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                RT
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                RW
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Kecamatan
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                TPS
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Status Pemilih
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Action
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
                            level: $('#level').val(),
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
                    {
                        "orderable": false,
                        "targets": [9]
                    },
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
                        data: 'kecamatan.kecamatan',
                        name: 'kec'
                    },
                    {
                        data: 'tps',
                    },
                    {
                        data: 'status_pemilih',
                    },
                    {
                        data: 'id',
                        name: 'action',
                        render: (data) => {
                            return `<div class="grid md:grid-cols-2 gap-0.5 md:gap-2"></div>`
                        }
                    },
                ],
            });

            table.tables().body().to$().addClass('bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700');

            $('#name, #level').bind('change', function() {
                table.draw()
            })

            $(document).on('click', '#change_sts', (e) => {
                var id = $(e.currentTarget).data('id');
                Swal.fire({
                    title: 'Ganti Status',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    html: `
                        <div class="w-full grid md:grid-cols-2 gap-2">
                            <input class="p-2 border border-slate-200 rounded-sm" type="text" id="tgl_exp" placeholder="Tanggal (yyyy-mm-dd)">
                            <select class="p-2 border border-slate-200 rounded-sm" id="type_exp" placeholder="Pilih Salah Satu">
                                <option value="RESIGN">Resign</option>
                                <option value="EXPIRED">Habis Kontrak</option>
                                <option value="FIRED">PHK</option>
                            </select>
                        </div>
                    `,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oke, Gasss.!!!',
                    preConfirm: () => {
                        var tgl = $("#tgl_exp").val();
                        var type = $("#type_exp").val();
                        var reg = new RegExp(
                            '[1-9][0-9][0-9]{2}-([0][1-9]|[1][0-2])-([1-2][0-9]|[0][1-9]|[3][0-1])');
                        var check = reg.test(tgl)
                        var succ = false;
                        if (tgl == "" || type == "" || !check) {
                            Swal.showValidationMessage(`periksa tanggal.!!`)
                        } else {
                            return {
                                tgl,
                                type
                            }
                        }
                    },
                }).then((result) => {
                    let {
                        tgl,
                        type
                    } = result.value
                    if (result.isConfirmed) {
                        var url = '{!! route('master.users') !!}';
                        url = url.replace(':id', id);
                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "tgl": tgl,
                                "type": type,
                            },
                            success: (msg) => {
                                if (msg.success) {
                                    Swal.fire(
                                        'Resetted!',
                                        'Status Update.',
                                        'success'
                                    ).then(() => {
                                        table.ajax.reload(null, false)
                                    })
                                }
                            }
                        })
                    }
                })
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
        </script>
    @endpush
</x-appLayout>
