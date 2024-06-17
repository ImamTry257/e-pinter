@extends('console.adminlte.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('console.components.breadcrumb', ['title' => 'Siswa Kegiatan Pembelajaran'])

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
                    <a href="{{ route('admin.questionniare.result.download.type', ['type' => $type_selected]) }}" class="btn bg-console text-dark"><i class="fas fa-download"></i> Download Hasil</a>
                </div>
                <div class="col-md-12">
                    <div class="card border-0">
                        <div class="card-header bg-console text-dark">
                            <h3 class="card-title">Data Siswa Kegiatan Pengerjaan Soal Sesi {{ ucwords(str_replace('-', ' ', $type_selected)) }}</h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 table-responsive">
                                    <table class="table table-bordered la-datatable w-100">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="20%">Siswa</th>
                                                <th width="20%">Nama Sekolah</th>
                                                <th width="15%">Email</th>
                                                <th width="20%">Status</th>
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

          var table = $('.la-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('admin.questionniare.result.get.user.type', ['type' => $type_selected]) }}",
              columns: [
                    {data: 'DT_RowIndex', name: 'No', orderable: false},
                    {data: 'nama_siswa', name: 'Siswa', orderable: false},
                    {data: 'nama_sekolah_kapital', name: 'Nama Sekolah', orderable: false},
                    {data: 'email_siswa', name: 'Email', orderable: false},
                    {data: 'action', name: 'Status', orderable: false, searchable: true}
              ]
          });

        });

        // add event setelah data dirender
        $('body').on('click', 'a.delete-content', (e) => {
            e.preventDefault();
            let id = $(e.target).attr('id')

            swal({
                title: "Apakah kamu yakin?",
                text: "Datamu akan hilang dan tidak bisa dikembalikan!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    deleteResult(id)
                    console.log(id)
                }
            });
        })

        function deleteResult(id) {
            window.location.href = '{{ url("admin/result-learning-activity/delete") }}'+'/'+id;
        }
    </script>

  <!-- /.content-wrapper -->

@endsection
