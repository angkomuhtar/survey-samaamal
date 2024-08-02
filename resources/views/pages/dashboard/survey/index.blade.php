<x-appLayout>

    {{-- form offcanvas --}}
    <div class="offcanvas offcanvas-end fixed bottom-0 flex flex-col max-w-full bg-white dark:bg-slate-800 invisible bg-clip-padding shadow-sm outline-none transition duration-300 ease-in-out text-gray-700 top-0 ltr:right-0 rtl:left-0 border-none w-96"
        id="offcanvas" aria-labelledby="offcanvas">
        <div
            class="offcanvas-header flex items-center justify-between p-4 pt-3 border-b border-b-slate-300 dark:border-b-slate-900">
            <div>
                <h3 class="block text-xl font-Inter text-slate-900 font-medium dark:text-[#eee]">
                    Survey DPT
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
                            <label for="largeInput" class="form-label">Kategori</label>
                            <div class="relative">
                                <select id="pilihan" class="form-control !pl-9" name="pilihan">
                                    <option value="" selected disabled class="dark:bg-slate-700 text-slate-300">
                                        Pilih Data</option>
                                    <option value="0" class="dark:bg-slate-700 !text-slate-300">Netral</option>
                                    <option value="5" class="dark:bg-slate-700 !text-slate-300">Belum Memilih
                                    </option>
                                    <option value="1" class="dark:bg-slate-700 !text-slate-300">Memilih</option>
                                </select>
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                            </div>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Paslon</label>
                            <div class="relative">
                                <select class="form-control !pl-9" id="paslon" name="paslon">
                                    <option value="0" disabled class="dark:bg-slate-700 text-slate-300">Pilih Data
                                    </option>
                                    @foreach ($paslon as $item)
                                        <option value="{{ $item->id }}" class="dark:bg-slate-700 !text-slate-300">
                                            {{ $item->nama }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">sub kordinator</label>
                            <div class="relative">
                                <input type="text" name="kord" class="form-control !pl-9"
                                    placeholder="subkord lapangan">
                                <iconify-icon icon="heroicons:globe-alt"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                            </div>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Catatan</label>
                            <div class="relative">
                                <textarea type="text" name="ket" class="form-control" placeholder="Catatan Tambahan"></textarea>
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
                    <h4 class="card-title">Survey</h4>
                </header>
                <div class="card-body px-6 pb-6">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 ">
                        <div class="input-area">
                            <label for="username" class="form-label">Nama</label>
                            <input id="name" type="text" name="name" class="form-control" placeholder="Nama"
                                required="required">
                        </div>
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
                    url: '{!! route('survey') !!}',
                    data: function(d) {
                        return $.extend({}, d, {
                            name: $('#name').val(),
                            tps: $('#tps').val(),
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
                        targets: "_all"
                    }
                ],
                columns: [{
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
                            if (row.survey.length > 0) {
                                return `<div class="flex-1">
                                            <div class="text-slate-800 dark:text-slate-300 text-sm font-medium mb-1">${row.survey[0].pilihan == '5' ? 'Belum Memilih - ' : row.survey[0].pilihan == '1' ? 'Memilih - ' : 'Netral'} ${row.survey[0].paslon.nama}</div>
                                            <div class="text-xs hover:text-[#68768A] font-normal text-slate-600 dark:text-slate-300">${row.survey[0].kordinator  == 'NULL' ? '' : row.survey[0].kordinator} - ${row.survey[0].kec_verify == 'N' ? 'Belum diverifikasi' : 'Terverifikasi'}</div> 
                                            <div class="text-slate-400 dark:text-slate-400 text-xs mt-1" >${row.survey[0].ket}</div>
                                        </div>`;
                            } else {
                                return `<div class="flex-1"><a href="#" class="text-slate-800 dark:text-slate-300 text-sm font-medium mb-1" id="btn-edit" data-id="${row.id}" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas">Belum di survey</a></div>`;
                            }
                        }
                    },
                ],
            });

            table.tables().body().to$().addClass('bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700');

            $('#name, #tps').bind('change', function() {
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
        </script>
    @endpush
</x-appLayout>
