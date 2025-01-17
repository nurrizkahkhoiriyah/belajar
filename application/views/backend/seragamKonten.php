<div class="card card-primary card-tabs">
    <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Jenis Seragam</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Stok Seragam</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                <div class="btn btn-primary btn_tambah_seragam mb-2"> <i class="fas fa-plus"></i> Tambah</div>
                <div class="row">
                    <table class="table table-striped" id="table_seragam">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Seragam</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                <div class="btn btn-primary btn_tambah_stok mb-2"> <i class="fas fa-plus"></i> Tambah</div>
				<div class="row">
					<table class="table table-striped" id="table_stok">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Seragam</th>
								<th>Tahun Pelajaran</th>
								<th>Ukuran</th>
								<th>Stok</th>
								<th>Aksi</th>
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

<div class="modal" id="modal_seragam" tabindex=" -1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Jenis Seragam</h5>

				<button type="button" class="close " data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-user">
					<form id="form_seragam" action="#" method="post" enctype="multipart/form-data">
						<input type="hidden" class="form-control" id="id" name="id" value="">
						<div class="mb-1">
							<label for="nama_seragam" class="form-label">Nama Seragam</label>
							<input type="text" class="form-control" id="nama_seragam" name="nama_seragam" value="">
							<div class="error-block"></div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary saveBtn">Simpan</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="modal_stok" tabindex=" -1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Stok Seragam</h5>

				<button type="button" class="close " data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-user">
					<form id="form_stok" action="#" method="post" enctype="multipart/form-data">
						<input type="hidden" class="form-control" id="id" name="id" value="">
						<div class="mb-1">
							<label for="id_seragam" class="form-label">Nama Seragam</label>
							<select class="form-control" name="id_seragam" id="id_seragam">
								<option value="">- Pilih Seragam -</option>
							</select>
							<div class="error-block"></div>
						</div>
						<div class="mb-1">
							<label for="id_tahun_pelajaran" class="form-label">Tahun Pelajaran</label>
							<select class="form-control" name="id_tahun_pelajaran" id="id_tahun_pelajaran">
								<option value="">- Pilih Tahun Pelajaran -</option>
							</select>
							<div class="error-block"></div>
						</div>
						<div class="mb-1">
							<label for="ukuran" class="form-label">Ukuran</label>
							<input type="text" class="form-control" id="ukuran" name="ukuran" value="">
							<div class="error-block"></div>
						</div>
            			<div class="mb-1">
							<label for="stok" class="form-label">Stok</label>
							<input type="text" class="form-control" id="stok" name="stok" value="">
							<div class="error-block"></div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary saveBtn">Simpan</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

<script>
    $(document).ready(function() {
      tabelSeragam();
      tabelStok();
    })

    $('#id_tahun_pelajaran').load('<?php echo base_url('seragam/option_tahun_pelajaran'); ?>');
    $('#id_seragam').load('<?php echo base_url('seragam/option_seragam'); ?>');


    $('.btn_tambah_seragam').click(function() {
      $('#id').val('');
      $('#form_seragam').trigger('reset');
      $('#modal_seragam').modal('show');
    });

	$('.btn_tambah_stok').click(function() {
      $('#id').val('');
      $('#form_stok').trigger('reset');
      $('#modal_stok').modal('show');
    });

    function tabelSeragam() {
		let tabelSeragam = $('#tabel_seragam');
		let tr = $('<tr>');
		$.ajax({
			url: '<?php echo base_url('seragam/tabel_seragam'); ?>',
			type: 'GET',

			dataType: 'json',
			success: function(response) {
				if (response.status) {
					tabelSeragam.find('tbody').html('');
					let no = 1;
					$.each(response.data, function(i, item) {
						let tr = $('<tr>');
						tr.append('<td>' + no++ + '</td>');
						tr.append('<td>' + item.nama_seragam + '</td>');
						tr.append('<td>	<button class="btn btn-primary" onclick="editSeragam(' + item.id + ')">Edit</button> <button class="btn btn-danger" onclick="deleteSeragam(' + item.id + ')">Delete</button></td>');
						tabelSeragam.find('tbody').append(tr);
					});

				} else {
					tabelSeragam.find('tbody').html('');
					tr.append('<td colspan="4">' + response.message + '</td>');
				}
			}
		});
	}

	function tabelStok() {
		let tabelStok = $('#tabelStok');
		let tr = $('<tr>');
		$.ajax({
			url: '<?php echo base_url('seragam/table_stok'); ?>',
			type: 'GET',
			dataType: 'json',
			success: function(response) {
				if (response.status) {
					tabelStok.find('tbody').html('');
					let no = 1;
					$.each(response.data, function(i, item) {
						let tr = $('<tr>');
						tr.append('<td>' + no++ + '</td>');
						tr.append('<td>' + item.nama_seragam + '</td>');
						tr.append('<td>' + item.nama_tahun_pelajaran + '</td>');
						tr.append('<td>' + item.ukuran + '</td>');
						tr.append('<td>' + item.stok + '</td>');
						tr.append('<td>	<button class="btn btn-primary" onclick="editStok(' + item.id + ')">Edit</button> <button class="btn btn-danger" onclick="deleteStok(' + item.id + ')">Delete</button></td>');
						tabelStok.find('tbody').append(tr);
					});
				} else {
					tabelStok.find('tbody').html('');
					tr.append('<td colspan="4">' + response.message + '</td>');
				}
			}
		});
	}

	$('.saveBtnSeragam').click(function() {
		$.ajax({
			url: '<?php echo base_url('seragam/saveSeragam'); ?>',
			type: 'POST',
			data: {
				id: $('#id').val(),
				nama_seragam: $('#nama_seragam').val(),
			},
			dataType: 'json',
			success: function(response) {
				if (response.status) {
					alert(response.message);
					$('#modalSeragam').modal('hide');
					tabelSeragam();
				} else {
					alert(response.message);
				}
			}

		})
	})

	$('.saveBtnStok').click(function() {
		$.ajax({
			url: '<?php echo base_url('seragam/saveStok'); ?>',
			type: 'POST',
			data: {
				id: $('#id').val(),
				id_seragam: $('#id_seragam').val(),
				id_tahun_pelajaran: $('#id_tahun_pelajaran').val(),
				ukuran: $('#ukuran').val(),
				stok: $('#stok').val(),
			},
			dataType: 'json',
			success: function(response) {
				if (response.status) {
					alert(response.message);
					$('#modalStok').modal('hide');
					tabelStok();
				} else {
					alert(response.message);
				}
			}

		})
	})

	function editSeragam(id){
			$.ajax({
				url: '<?php echo base_url('seragam/editSeragam'); ?>',
				type: 'POST',
				data: {
					id: id
				},
				dataType: 'json',
				success: function(response) {
					if (response.status) {
						$('#id').val(response.data.id);
						$('#nama_seragam').val(response.data.nama_seragam);
						$('#modalSeragam').modal('show');
						tabelSeragam();
					} else {
						alert(response.message);
					}
				}
			});
	}

	function editStok(id){
			$.ajax({
				url: '<?php echo base_url('seragam/editStok'); ?>',
				type: 'POST',
				data: {
					id: id
				},
				dataType: 'json',
				success: function(response) {
					if (response.status) {
						$('#id').val(response.data.id);
						$('#id_seragam').val(response.data.id_seragam);
						$('#id_tahun_pelajaran').val(response.data.id_tahun_pelajaran);
						$('#ukuran').val(response.data.ukuran);
						$('#stok').val(response.data.stok);
						$('#modalStok').modal('show');
						tableStok();
					} else {
						alert(response.message);
					}
				}
			});
	}

	function deleteSeragam(id) {
		if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
			let url = '<?php echo base_url('seragam/deleteSeragam'); ?>';
			$.ajax({
				url: url,
				type: 'POST',
				data: {
					id: id
				},
				dataType: 'json',
				success: function(response) {
					if (response.status) {
						alert(response.message);
						tabelSeragam();
					} else {
						alert(response.message);
					}
				}
			});
		}

	}
    
    function deleteStok(id) {
		if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
			let url = '<?php echo base_url('seragam/deleteStok'); ?>';
			$.ajax({
				url: url,
				type: 'POST',
				data: {
					id: id
				},
				dataType: 'json',
				success: function(response) {
					if (response.status) {
						alert(response.message);
						tabelStok();
					} else {
						alert(response.message);
					}
				}
			});
		}

	}

</script>
