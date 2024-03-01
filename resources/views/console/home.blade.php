@extends('console.adminlte.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('console.components.breadcrumb', ['title' => 'Dashboard'])

    <!-- Main content -->
    <div class="content">
		<div class="container-fluid">
			<div class="row">
			<!-- /.col-md-6 -->
			<div class="col-lg-12">

				<div class="card card-console card-outline">
				<div class="card-header">
					<h5 class="m-0">Dashboard</h5>
				</div>
				<div class="card-body">
					<h3 class="">Welcome {{ Auth::user()->name }}</h3>

					<p class="card-text d-none">With supporting text below as a natural lead-in to additional content.</p>
					<a href="#" class="btn btn-primary d-none">Go somewhere</a>
				</div>
				</div>
			</div>
			<!-- /.col-md-6 -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
