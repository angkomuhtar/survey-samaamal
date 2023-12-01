<x-appLayout>
 
    {{-- table --}}
    <div class="space-y-8">
        <div class="space-y-5">
            <div class="card">
                <header class="card-header noborder">
                    <h4 class="card-title">Absensi</h4>
                    <!-- <button
                        data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvas"
                        aria-controls="offcanvas"
                        class="btn btn-sm inline-flex justify-center btn-primary"
                        id="btn-add"
                    >
                        <span class="flex items-center">
                            <span>Tambah Data</span>
                            <iconify-icon
                                class="text-xl ltr:ml-2 rtl:mr-2"
                                icon="mdi:database-plus-outline"
                            ></iconify-icon>
                        </span>
                    </button> -->
                </header>
                <div class="card-body px-6 pb-6">
                    <div class="overflow-x-auto -mx-6 dashcode-data-table">
                        <span class="col-span-8 hidden"></span>
                        <span class="col-span-4 hidden"></span>
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden">
                                <table
                                    class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table"
                                >
                                    <thead
                                        class="bg-slate-200 dark:bg-slate-700"
                                    >
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
                                    <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
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
    <script type="module">
        // table
        var table = $("#data-table, .data-table").DataTable({
            processing:true,
            serverSide: true,
            ajax : '{!! route('absensi.attendance') !!}',
            dom: "<'grid grid-cols-12 gap-5 px-6 mt-6'<'col-span-4'l><'col-span-8 flex justify-end'f><'#pagination.flex items-center'>><'min-w-full't><'flex justify-end items-center'p>",
            paging: true,
            ordering: true,
            info: false,
            searching: true,
            pagingType:'full_numbers',
            lengthChange: true,
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
              { "searchable": false, "targets": [-1] },
              { "orderable" : false, "targets": [-1] },
              {
                'className' : 'table-td',
                "targets" : "_all"
              }
            ],
            columns: [
              {
                render : (data, type, row) =>{
                  return row.profile?.name ?? ''
                }
              },{
                data: 'date',
              },{
                data: 'clock_in',
              },{
                data: 'clock_out',
              },{
                render : (data, type, row, meta) =>{
                  var startTime = moment(row.clock_in, "hh:mm:ss");
                  var start = moment(row?.shift?.start, "hh:mm:ss");
                  var seconds = startTime.diff(start, 's')

                  if (seconds < 0) {
                    return '-'
                  }else{
                    const hours = Math.floor(seconds / 3600)
                    const minutes = Math.floor((seconds % 3600) / 60)
                    return `${hours} hours : ${minutes} minutes`;
                  }
                }
              },{
                render : (data, type, row, meta) =>{
                  var clock = moment(row.clock_out, "hh:mm:ss");
                  var end = moment(row?.shift?.end, "hh:mm:ss");
                  var seconds = end.diff(clock, 's');
                  console.log(isNaN(seconds));
                  if (seconds < 0 || isNaN(seconds)) {
                    return '-'
                  }else{
                    const hours = Math.floor(seconds / 3600)
                    const minutes = Math.floor((seconds % 3600) / 60)
                    return `${hours} hours : ${minutes} minutes`;
                  }
                }
              },{
                render : (data, type, row, meta) =>{
                  return `${row.shift?.name} (${row.shift?.start} - ${row.shift?.end})`
                }
              },
            ],
        });

      // submit data
        $(document).on('submit', '#sending_form', (e)=>{
          e.preventDefault();
          var type = $("#sending_form").data('type');
          var data = $('#sending_form').serializeArray();
          var id = $("#sending_form").find("input[name='id']").val()
          var url = type == 'submit' ? '{!! route('masters.position.store') !!}' : '{!! route('masters.position.update', ['id'=>':id']) !!}';

          $.post(url.replace(':id', id), data)
            .done(function(msg){
              if(!msg.success){
                Swal.fire({
                  title: 'Error',
                  text: 'data belum lengkap',
                  icon: 'error',
                  confirmButtonText: 'Oke'
                })
              }else{
                Swal.fire({
                  title: 'success',
                  text: msg.message,
                  icon: 'success',
                  confirmButtonText: 'Oke'
                }).then(()=>{
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

        $(document).on('change', 'select[name="company"]', (e)=>{
          var data = e.currentTarget.value;
          var dataOption = '<option selected disabled class="dark:bg-slate-700 text-slate-300">Pilih Data</option>';
          if (data == '') {
            $('select[name="division"]').html(dataOption)
            return;
          }
          var url = '{!! route('ajax.division', ['id'=>':id']) !!}';
          url = url.replace(':id', data);
          $.ajax({
            type : 'GET',
            url : url,
            success: (res)=>{
              if (res.data.length > 0) {
                res.data.map((data)=>{
                  dataOption += `<option value="${data.id}" class="dark:bg-slate-700">${data.division}</option>`
                })
              }
              $('select[name="division"]').html(dataOption)
            },
            error: ()=>{
              $('select[name="division"]').html(dataOption)
            }
          })
        })

        $(document).on('click', '#btn-add', ()=>{
          $("select[name='company']").val("").change();
          $("#sending_form")[0].reset();
          $("#sending_form").data("type", "submit");
        })

        table.on( 'draw', function () {
          tippy(".onTop", {
            content: "Tooltip On Top!",
            placement: "top",
          }); 
        });

        $(document).on('click', '#btn-edit', (e)=>{
          $("#sending_form").data("type", "update");
          var id = $(e.currentTarget).data('id');
          var url = '{!! route('masters.position.edit', ['id'=>':id']) !!}';
          url = url.replace(':id', id);

          $.ajax({
            type : 'GET',
            url : url,
            success: (msg)=>{
              // $('#default_modal').modal();
              console.log(msg);
              $("#sending_form").find("select[name='company']").val(msg.data.company_id);
              var url = '{!! route('ajax.division', ['id'=>':id']) !!}';
              url = url.replace(':id', msg.data.company_id);
              $.ajax({
                type : 'GET',
                url : url,
                success: (res)=>{
                  var dataOption = '<option selected disabled class="dark:bg-slate-700 text-slate-300">Pilih Data</option>';
                  if (res.data.length > 0) {
                    res.data.map((data)=>{
                      dataOption += `<option value="${data.id}" class="dark:bg-slate-700">${data.division}</option>`
                    })
                  }
                  $('select[name="division"]').html(dataOption)
                },
                complete:()=>{
                  $("select[name='division']").val(msg.data.division_id);
                }
              })
              $("#sending_form").find("input[name='position']").val(msg.data.position);
              $("#sending_form").find("input[name='id']").val(id)
            }
          })
        })

        $(document).on('click', '#btn-delete', (e)=>{
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
              var url = '{!! route('masters.position.destroy', ['id'=>':id']) !!}';
              url = url.replace(':id', id);
              $.ajax({
                url : url,
                type : 'DELETE',
                data:{ "_token": "{{ csrf_token() }}" },
                success: (msg)=>{
                  if (msg.success) {
                    Swal.fire(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                    ).then(()=>{
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
