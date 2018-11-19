{!! Form::model($mobil, [
	'route' => $mobil->exists ? ['mobil.update', $mobil->id] : 'mobil.store',
	'method' => $mobil->exists ? 'PUT' : 'POST'
]) !!}
	<div class="form-group">
		<label for="" class="control-label">Kode Mobil</label>
		{!! Form::text('kode_mobil', null, ['class' => 'form-control', 'id' => 'kode_mobil']) !!}
	</div>

	<div class="form-group">
		<label for="" class="control-label">Merk Mobil</label>
		{!! Form::text('merk_mobil', null, ['class' => 'form-control', 'id' => 'merk_mobil']) !!}
	</div>

	<div class="form-group">
		<label for="" class="control-label">Plat Nomor</label>
		{!! Form::text('plat_nomor', null, ['class' => 'form-control', 'id' => 'plat_nomor']) !!}
	</div>

	<div class="form-group">
		<label for="" class="control-label">Harga Sewa</label>
		{!! Form::text('harga_sewa', null, ['class' => 'form-control', 'id' => 'harga_sewa']) !!}
	</div>
{!! Form::close() !!}