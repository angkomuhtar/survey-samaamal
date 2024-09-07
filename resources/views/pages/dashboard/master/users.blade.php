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
                            <label for="largeInput" class="form-label">Password <span class="text-[10px]"
                                    id="pass_edit">(Biarkan
                                    kosong
                                    jika tidak ingin
                                    mengubah password)</span></label>
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
                            <label for="largeInput" class="form-label">Alamat</label>
                            <div class="relative justify-start items-start">
                                <textarea class="form-control" name="alamat" id="" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Level Akun</label>
                            <div class="relative">
                                <select id="level" class="form-control !pl-9" name="level">
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
                            <label for="largeInput" class="form-label">Kecamatan</label>
                            <div class="relative">
                                <select id="kecamatan" class="form-control !pl-9" name="kecamatan" disabled>
                                    <option value="" selected disabled class="dark:bg-slate-700 !text-slate-300">
                                        Pilih Data</option>
                                    @foreach ($kec as $item)
                                        <option value="{{ $item->id }}" class="dark:bg-slate-700 !text-slate-300">
                                            {{ $item->kecamatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Kelurahan/Desa</label>
                            <div class="relative">
                                <select id="desa" class="form-control !pl-9" name="desa" disabled></select>
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
                            <input id="f_name" type="text" name="name" class="form-control"
                                placeholder="Nama" required="required">
                        </div>
                        <div class="input-area">
                            <label for="level" class="form-label">Level</label>
                            <select id="f_level" class="form-control" name="level">
                                <option value="" selected class="dark:bg-slate-700 !text-slate-300">Pilih Data
                                </option>
                                <option value="1" class="dark:bg-slate-700 !text-slate-300">Desa/Kelurahan
                                </option>
                                <option value="2" class="dark:bg-slate-700 !text-slate-300">Kecamatan
                                </option>
                                <option value="3" class="dark:bg-slate-700 !text-slate-300">Kabupaten
                                </option>
                                <option value="6" class="dark:bg-slate-700 !text-slate-300">Admin</option>
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
                                                Username
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Nama
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Level
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Lokasi
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Alamat
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Status
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
        {{-- @vite(['resources/js/plugins/Select2.min.js']) --}}
        <script type="module">
            $('#lokasi').select2({
                dropdownParent: $('#offcanvas'),
                placeholder: 'Pilih Data'
            });
            var table = $("#data-table, .data-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{!! route('master.users') !!}',
                    data: function(d) {
                        return $.extend({}, d, {
                            name: $('#f_name').val(),
                            level: $('#f_level').val(),
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
                        "targets": [3, 4]
                    },
                    {
                        'className': 'table-td',
                        "targets": "_all"
                    }
                ],
                columns: [{
                        data: 'username',
                        name: 'username',
                        render: (data, type, row, meta) => {
                            return `<span class="flex items-center">
                                  <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                    <img src={!! asset('images/avatar.png') !!} alt="" class="object-cover w-full h-full rounded-full">
                                  </span>
                                  <span class="text-sm text-slate-600 dark:text-slate-300 lowercase">${data}</span>
                                </span>`;
                        }
                    },
                    {
                        data: 'profile.name',
                    },
                    {
                        data: 'type',
                    },
                    {
                        data: 'lokasi',
                        render: (data, type, row, meta) => {
                            if (row.profile.level > 2) {
                                return data
                            } else if (row.profile.level > 1) {
                                return row.lokasi.kecamatan
                            } else {
                                return row.lokasi.desa
                            }
                        }
                    },
                    {
                        data: 'profile.alamat',
                    },
                    {
                        data: 'status',
                        render: (data) => {
                            if (data == 'Y') {
                                return `<div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] text-white
                                          bg-success-500">
                                        Active
                                      </div>`
                            } else {
                                return `<div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] text-white
                                          bg-danger-500">
                                        disabled
                                      </div>`
                            }
                        }
                    },
                    {
                        data: 'id',
                        name: 'action',
                        render: (data, type, row, meta) => {
                            return `<div>
                                  <div class="relative">
                                    <div class="dropdown relative">
                                      <button
                                        class="text-xl text-center block w-full "
                                        type="button"
                                        id=""
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                      </button>
                                      <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                          shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                        <li>
                                          <a
                                            href="#"
                                            id="reset_password"
                                            data-id="${row.id}"
                                            class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                              dark:hover:text-white">
                                            Reset Password</a>
                                        </li>
                                        <li>
                                          <a
                                            href="#"
                                            id="status_chg"
                                            data-id="${row.id}"
                                            class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                              dark:hover:text-white">
                                                ${row.status == 'Y' ? 'disable' : 'active'}
                                            </a>
                                        </li>
                                        <li>
                                          <a
                                            href="#"
                                            id="btn-edit"
                                            data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas"
                                            data-id="${row.id}"
                                            class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                              dark:hover:text-white">
                                            Edit</a>
                                        </li>
                                        <li>
                                          <a
                                            href="#"
                                            id="delete_action"
                                            data-id="${row.id}"
                                            class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                              dark:hover:text-white">
                                            Delete</a>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>`
                        }
                    },
                ],
            });

            table.tables().body().to$().addClass('bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700');

            $('#f_name, #f_level').bind('change', function() {
                table.draw()
            })

            $(document).on('click', '#btn-add', () => {
                $("#pass_edit").css('display', 'none');
                $("#sending_form").find("input[name='username']").prop('disabled', false);
                $("#sending_form")[0].reset();
                $("#sending_form").data("type", "submit");
                $("#kecamatan").prop('disabled', true);
                $("#kecamatan").val("");
                $("#kecamatan").select2('destroy');
                $('#desa').val("");
                $("#desa").prop('disabled', true);
                $('#desa').select2('destroy');
            })

            $(document).on('click', '#reset_password', (e) => {
                var id = $(e.currentTarget).data('id');
                Swal.fire({
                    title: 'Reset Password',
                    text: "Aksi ini akan mereset password akun menjadi 'secret123'",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oke, Lanjut',
                }).then((result) => {
                    let {
                        tgl,
                        type
                    } = result.value
                    if (result.isConfirmed) {
                        var url = '{!! route('master.users.reset', ['id' => ':id']) !!}';
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
                                        'Resetted!',
                                        'Password Berhasil direset',
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

            $(document).on('click', '#status_chg', (e) => {
                var id = $(e.currentTarget).data('id');
                Swal.fire({
                    title: 'Ubah Status',
                    text: "Aksi ini akan mengubah status",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oke, Lanjut',
                }).then((result) => {
                    let {
                        tgl,
                        type
                    } = result.value
                    if (result.isConfirmed) {
                        var url = '{!! route('master.users.status', ['id' => ':id']) !!}';
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
                                        'Status Berhasil diubah',
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

            $(document).on('click', '#delete_action', (e) => {
                var id = $(e.currentTarget).data('id');
                Swal.fire({
                    title: 'Hapus Akun',
                    text: "Aksi ini akan Menghapus Akun dan tidak dapat di kembalikan",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oke, Lanjut',
                }).then((result) => {
                    let {
                        tgl,
                        type
                    } = result.value
                    if (result.isConfirmed) {
                        var url = '{!! route('master.users.delete', ['id' => ':id']) !!}';
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
                                        'Success!',
                                        'User Berhasil dihapus',
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

            $(document).on('change', '#level', function(e) {
                e.preventDefault();
                let val = $(this).val();
                if (val <= 2) {
                    $("#kecamatan").prop('disabled', false);
                    $("#kecamatan").val("");
                    $("#kecamatan").select2({
                        dropdownParent: $('#offcanvas'),
                        placeholder: 'Pilih Data'
                    });
                } else {
                    $("#kecamatan").prop('disabled', true);
                    $("#kecamatan").val("");
                    $("#kecamatan").select2('destroy');
                    $('#desa').val("");
                    $("#desa").prop('disabled', true);
                    $('#desa').select2('destroy');

                }
            })

            function setDesa(level, val, selected = false) {
                let dataOption = '<option value="" class="dark:bg-slate-700">Pilih Data</option>';
                if (level == 1) {
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
                            if (selected) {
                                $("#desa").val(selected);
                            }
                            $('#desa').select2({
                                dropdownParent: $('#offcanvas'),
                                placeholder: 'Pilih Data'
                            });
                        },
                        error: () => {
                            $('select[name="desa"]').html(dataOption)
                        }
                    })
                } else {
                    $('#desa').val("");
                    $("#desa").prop('disabled', true);
                }
            }


            $(document).on('change', '#kecamatan', function(e) {
                e.preventDefault();
                let val = $(this).val();
                let level = $("#level").val()
                setDesa(level, val)
            })



            $(document).on('click', '#btn-edit', (e) => {
                $("#pass_edit").css('display', 'inline');
                $("#sending_form").find("input[name='username']").prop('disabled', true);
                $("#sending_form").data("type", "update");
                var id = $(e.currentTarget).data('id');
                var url = '{!! route('master.users.edit', ['id' => ':id']) !!}';
                url = url.replace(':id', id);

                $.ajax({
                    type: 'GET',
                    url: url,
                    success: (msg) => {
                        console.log(msg);
                        $("#sending_form").find("input[name='id']").val(msg.data.id);
                        $("#sending_form").find("input[name='username']").val(msg.data.username);
                        $("#sending_form").find("input[name='name']").val(msg.data.profile.name);
                        $("#sending_form").find("textarea[name='alamat']").val(msg.data.profile.alamat);
                        $("#sending_form").find("select[name='level']").val(msg.data.profile.level);
                        if (msg.data.profile.level <= 1) {
                            $("#kecamatan").prop('disabled', false);
                            $("#kecamatan").val(msg.data.lokasi.id_kec);
                            $("#kecamatan").select2({
                                dropdownParent: $('#offcanvas'),
                                placeholder: 'Pilih Data'
                            });
                            setDesa(msg.data.profile.level, msg.data.lokasi.id_kec, msg.data.lokasi.id)
                        } else {

                        }

                    }
                })
            })
        </script>
    @endpush
</x-appLayout>
