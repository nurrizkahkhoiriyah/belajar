<div class="card card-primary card-tabs">
    <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Jenis Biaya</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Harga</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                <div class="btn btn-primary btn_tambah_biaya mb-2"> <i class="fas fa-plus"></i> Tambah</div>
                <div class="row">
                    <table class="table table-striped" id="tabelBiaya">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Biaya</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                <div class="btn btn-primary btn_tambah_harga_biaya mb-2"> <i class="fas fa-plus"></i> Tambah</div>
				<div class="row">
					<table class="table table-striped" id="tabelHargaBiaya">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Biaya</th>
								<th>Tahun Pelajaran</th>
								<th>Harga</th>
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

<div class="modal" id="modal_biaya" tabindex=" -1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Jenis Biaya</h5>

				<button type="button" class="close " data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-user">
					<form id="form_biaya" action="#" method="post" enctype="multipart/form-data">
						<input type="hidden" class="form-control" id="id" name="id" value="">
						<div class="mb-1">
							<label for="nama_biaya" class="form-label">Nama Biaya</label>
							<input type="text" class="form-control" id="nama_biaya" name="nama_biaya" value="">
							<div class="error-block"></div>
						</div>
						<div class="mb-1">
							<label for="deskripsi" class="form-label">Deskripsi</label>
							<input type="text" class="form-control" id="deskripsi" name="deskripsi" value="">
							<div class="error-block"></div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary saveBtn" data-target="biaya">Simpan</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="modal_harga_biaya" tabindex=" -1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Harga Biaya</h5>

				<button type="button" class="close " data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-user">
					<form id="form_harga_biaya" action="#" method="post" enctype="multipart/form-data">
						<input type="hidden" class="form-control" id="id" name="id" value="">
						<div class="mb-1">
							<label for="id_biaya" class="form-label">Nama Biaya</label>
							<select class="form-control" name="id_biaya" id="id_biaya">
								<option value="">- Pilih Biaya -</option>
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
							<label for="harga" class="form-label">Harga</label>
							<input type="text" class="form-control" id="harga" name="harga" value="">
							<div class="error-block"></div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary saveBtn" data-target="harga_biaya">Simpan</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

<script>
    $(document).ready(function() {
		tabelBiaya();
        tabelHargaBiaya();
	})

    $('#id_tahun_pelajaran').load('<?php echo base_url('biaya/option_tahun_pelajaran'); ?>');
    $('#id_biaya').load('<?php echo base_url('biaya/option_biaya'); ?>');


    $('.btn_tambah_biaya').click(function() {
		$('#id').val('');
		$('#form_biaya').trigger('reset');
		$('#modal_biaya').modal('show');
	});

    $('.btn_tambah_harga_biaya').click(function() {
		$('#id').val('');
		$('#form_harga_biaya').trigger('reset');
		$('#modal_harga_biaya').modal('show');
	});

    function tabelBiaya() {
		let tabelBiaya = $('#tabelBiaya');
		let tr = $('<tr>');
		$.ajax({
			url: '<?php echo base_url('biaya/table_biaya'); ?>',
			type: 'GET',

			dataType: 'json',
			success: function(response) {
				if (response.status) {
					tabelBiaya.find('tbody').html('');
					let no = 1;
					$.each(response.data, function(i, item) {
						let tr = $('<tr>');
						tr.append('<td>' + no++ + '</td>');
						tr.append('<td>' + item.nama_biaya + '</td>');
						tr.append('<td>' + item.deskripsi + '</td>');
						tr.append('<td>	<button class="btn btn-primary editBtn" data-target="biaya" (' + item.id + ')">Edit</button> <button class="btn btn-danger deleteBtn" data-target="biaya"(' + item.id + ')">Delete</button></td>');
						tabelBiaya.find('tbody').append(tr);
					});

				} else {
					tabelBiaya.find('tbody').html('');
					tr.append('<td colspan="4">' + response.message + '</td>');
				}
			}
		});
	}

    function tabelHargaBiaya() {
		let tabelHargaBiaya = $('#tabelHargaBiaya');
		let tr = $('<tr>');
		$.ajax({
			url: '<?php echo base_url('biaya/table_harga_biaya'); ?>',
			type: 'GET',
			dataType: 'json',
			success: function(response) {
				if (response.status) {
					tabelHargaBiaya.find('tbody').html('');
					let no = 1;
					$.each(response.data, function(i, item) {
						let tr = $('<tr>');
						tr.append('<td>' + no++ + '</td>');
						tr.append('<td>' + item.nama_biaya + '</td>');
						tr.append('<td>' + item.nama_tahun_pelajaran + '</td>');
						tr.append('<td>' + item.harga + '</td>');
						tr.append('<td>	<button class="btn btn-primary editBtn" data-target="harga_biaya" (' + item.id + ')">Edit</button> <button class="btn btn-danger deleteBtn" data-target="harga_biaya"(' + item.id + ')">Delete</button></td>');
						tabelHargaBiaya.find('tbody').append(tr);
					});

				} else {
					tabelHargaBiaya.find('tbody').html('');
					tr.append('<td colspan="4">' + response.message + '</td>');
				}
			}
		});
	}

    $('.saveBtn').click(function() {
		let base = '<?php echo base_url(); ?>';
		var targetController = $(this).data('target');
		var url = base + 'biaya/save_' + targetController;
		var formData = new FormData($('#form_' + targetController)[0]);
		$.ajax({
			url: url,
			type: 'POST',
			data: formData,
			processData: false,
			contentType: false,
			dataType: 'json',
			success: function(response) {
				if (response.status) {
					alert(response.message);
					$('#modal_' + targetController).modal('hide');
					tabelHargaBiaya(); //nnti buat fungsi lagi
					tabelBiaya();

				} else {
					alert(response.message);
				}
			}

		})
	})

	$('.editBtn').click(function() {
		let base = '<?php echo base_url(); ?>';
		var targetController = $(this).data('target');
    	var url = base + 'biaya/edit_' + targetController;
		var formData = new FormData($('#form_' + targetController)[0]);

		$.ajax({
			url: url,
			type: 'GET',
			data: formData,
			processData: false,
			contentType: false,
			dataType: 'json',
			success: function(response) {
				if (response.status) {
					alert(response.message);
					
					$('#modal_' + targetController).modal('hide');
					tabelHargaBiaya(); //nnti buat fungsi lagi
					tabelBiaya();

				} else {
					alert(response.message);
				}
			}

		})
	});

    // function editBiaya(id){
	// 		$.ajax({
	// 			url: '<?php echo base_url('biaya/edit_biaya'); ?>',
	// 			type: 'POST',
	// 			data: {
	// 				id: id
	// 			},
	// 			dataType: 'json',
	// 			success: function(response) {
	// 				if (response.status) {
	// 					$('#id').val(response.data.id);
	// 					$('#nama_biaya').val(response.data.nama_biaya);
	// 					$('#deskripsi').val(response.data.deskripsi);
	// 					$('#modal_biaya').modal('show');
	// 					tabelBiaya();
	// 				} else {
	// 					alert(response.message);
	// 				}
	// 			}
	// 		});
	// }
    // function editHargaBiaya(id){
	// 		$.ajax({
	// 			url: '<?php echo base_url('biaya/edit_harga_biaya'); ?>',
	// 			type: 'POST',
	// 			data: {
	// 				id: id
	// 			},
	// 			dataType: 'json',
	// 			success: function(response) {
	// 				if (response.status) {
	// 					$('#id').val(response.data.id);
	// 					$('#id_biaya').val(response.data.id_biaya);
    //                     $('#id_tahun_pelajaran').val(response.data.id_tahun_pelajaran);
    //                     $('#harga').val(response.data.harga);
	// 					$('#modal_harga_biaya').modal('show');
	// 					tabelHargaBiaya();
	// 				} else {
	// 					alert(response.message);
	// 				}
	// 			}
	// 		});
	// }

	// $('.deleteBtn').click(function() {
	// 	let base = '<?php echo base_url(); ?>';
	// 	var targetController = $(this).data('target');
	// 	var id = $(this).data('id');
    // 	var url = base + 'biaya/delete_' + targetController + '/' + id;
	// 	$.ajax({
	// 		url: url,
	// 		type: 'POST',
	// 		data: {
	// 			id: id
	// 		},
	// 		processData: false,
	// 		contentType: false,
	// 		dataType: 'json',
	// 		success: function(response) {
	// 			if (response.status) {
	// 				alert(response.message);
	// 				$('#modal_' + targetController).modal('hide');
	// 				tabelHargaBiaya(); //nnti buat fungsi lagi
	// 				tabelBiaya();

	// 			} else {
	// 				alert(response.message);
	// 			}
	// 		}

	// 	})
	// })

    $('.deleteBtn').click(function() {
		if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
			let url = '<?php echo base_url('biaya/delete_biaya'); ?>';
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
						tabelBiaya();
					} else {
						alert(response.message);
					}
				}
			});
		}

	});
    // function deleteHargaBiaya(id) {
	// 	if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
	// 		let url = '<?php echo base_url('biaya/deleteHargaBiaya'); ?>';
	// 		$.ajax({
	// 			url: url,
	// 			type: 'POST',
	// 			data: {
	// 				id: id
	// 			},
	// 			dataType: 'json',
	// 			success: function(response) {
	// 				if (response.status) {
	// 					alert(response.message);
	// 					tabelHargaBiaya();
	// 				} else {
	// 					alert(response.message);
	// 				}
	// 			}
	// 		});
	// 	}

	// }

</script>