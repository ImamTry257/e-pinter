@extends('console.adminlte.layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
    <link rel="stylesheet" href="https://editor-latest.s3.amazonaws.com/css/froala_editor.pkgd.min.css">
    <link rel="stylesheet" href="https://editor-latest.s3.amazonaws.com/css/froala_style.min.css">
@endsection

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('console.components.breadcrumb', ['title' => 'Kelola Soal Kuisioner'])

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
                    <a href="{{ route('admin.questionniare.manage.add') }}" class="btn bg-console text-dark"><i class="fas fa-plus-circle"></i> Tambah</a>
                </div>
                <div class="col-md-12">
                    <div class="card border-0">
                        <div class="card-header bg-console text-dark">
                            <h3 class="card-title">Data Soal</h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 table-responsive">
                                    <table class="table table-bordered content-datatable w-100">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="10%">Halaman</th>
                                                <th width="5%">Nomor Soal</th>
                                                <th width="10%">Tipe Pernyataan</th>
                                                <th width="60%">Soal</th>
                                                <th width="10%">Action</th>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
    <script src="https://editor-latest.s3.amazonaws.com/js/froala_editor.pkgd.min.js"></script>

    <script type="text/javascript">
        $(function () {

          var table = $('.content-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('admin.questionniare.manage.get.user') }}",
              columns: [
                    {data: 'DT_RowIndex', name: 'No', orderable: false},
                    {data: 'page', name: 'Halaman', orderable: false},
                    {data: 'number', name: 'No', orderable: false},
                    {data: 'statement_type', name: 'Tipe Pernyataan', orderable: false},
                    {data: 'description', name: 'Soal', orderable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: true},
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
