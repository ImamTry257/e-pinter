@extends('console.adminlte.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('console.components.breadcrumb', ['title' => 'Siswa'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 pb-2">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                    @endif

                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                            @php
                                Session::forget('error');
                            @endphp
                        </div>
                    @endif
                </div>
                <div class="col-md-12 pb-2">
                    <a href="{{ route('admin.user.add') }}" class="btn bg-console text-dark"><i class="fas fa-plus-circle"></i> Tambah</a>
                </div>
                <div class="col-md-12">
                    <div class="card border-0">
                        <div class="card-header bg-console text-dark">
                            <h3 class="card-title">Data Siswa</h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 table-responsive">
                                    <table class="table table-bordered content-datatable w-100">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Sekolah</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
    <!-- /.content -->

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 -->
    <script src="{{ asset('vendor/template/plugins/select2/js/select2.full.min.js') }}"></script>

    <!-- Bootstrap4 Duallistbox -->
    <script src="{{  asset('vendor/template/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{  asset('vendor/template/plugins/moment/moment.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{  asset('vendor/template/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{  asset('vendor/template/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{  asset('vendor/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <script type="text/javascript">
        $(function () {

          var table = $('.content-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('admin.get.user') }}",
              columns: [
                    {data: 'DT_RowIndex', name: 'No'},
                    {data: 'name', name: 'Username'},
                    {data: 'school', name: 'Sekolah'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });

        });

        // add event setelah data dirender
        $('body').on('click', 'a.delete-user', (e) => {
            e.preventDefault();
            let id = $(e.target).attr('id')

            var ans = confirm('Apakah Anda yakin?')
            
            if ( ans ) {
                delete_user(id)
            }
        })

        function delete_user(id) {
            window.location.href = '{{ url("admin/user/delete") }}'+'/'+id;
        }
    </script>

  <!-- /.content-wrapper -->

@endsection
