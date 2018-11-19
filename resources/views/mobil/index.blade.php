@extends('adminlte::page')
@section('title', 'Aplikasi Rental Mobil')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Dashboard</a></li>
				<li class="active">Mobil</li>
			</ul>
			<p>
				<a href="{{ route('mobil.create') }}" class="btn btn-primary modal-show">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah </a>
			</p>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Mobil</h2>
				</div>
				<div class="panel-body">
					<table id="datatable" class="table table-hover" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode Mobil</th>
								<th>Merk Mobil</th>
								<th>Plat Nomor</th>
								<th>Harga Sewa</th>
								<th></th>
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
@endsection

@push('scripts')
<script>
	$('#datatable').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: "{{ route('table.mobil') }}",
		columns: [
		{data: 'DT_Row_Index', name: 'id'},
		{data: 'kode_jurusan', name: 'kode_mobil'},
		{data: 'merk_mobil', name: 'merk_mobil'},
		{data: 'plat_nomor', name: 'plat_nomor'},
		{data: 'harga_sewa', name: 'harga_sewa'},
		{data: 'action', name: 'action'},
		]
	});
</script>
@endpush
