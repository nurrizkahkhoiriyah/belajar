<div class="card card-primary card-tabs">
    <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs tab_harga_biaya" id="custom-tabs-one-tab" role="tablist">
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
                <div class="btn btn-primary tambahBtn mb-2" data-method="biaya"> <i class="fas fa-plus"></i> Tambah</div>
                <div class="row">
                    <table class="table table-striped" data-target="biaya"  id="table_biaya">
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
                <div class="btn btn-primary tambahBtn mb-2" data-method="harga_biaya"> <i class="fas fa-plus"></i> Tambah</div>
				<div class="row">
					<table class="table table-striped" data-target="biaya" id="table_harga_biaya">
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
				<button type="button" class="btn btn-primary saveBtn" data-target="biaya" data-method="biaya">Simpan</button>
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
							<select class="form-control " name="id_biaya" id="id_biaya">
								<option value="">- Pilih Biaya -</option>
							</select>
							<div class="error-block"></div>
						</div>
						<div class="mb-1">
							<label for="id_tahun_pelajaran" class="form-label">Tahun Pelajaran</label>
							<select class="form-control " name="id_tahun_pelajaran" id="id_tahun_pelajaran">
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
				<button type="button" class="btn btn-primary saveBtn" data-target="biaya" data-method="harga_biaya">Simpan</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<!-- <script src="<?php echo base_url(); ?>public/template/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('public/lib/crud.js'); ?>"></script> -->

<!-- <script>
    $(document).ready(function() {
		tampilkan_table('biaya', 'biaya');
        tampilkan_table('biaya', 'harga_biaya');	
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

	function tampilkan_table(targetController, table){
		let tableElement = $('#table_' + table);
		$.ajax({
			url: '<?php echo base_url(); ?>' + targetController + '/table_' + table,
			type: 'GET',
			dataType: 'json',
			success: function(response){
				console.log(tableElement);
				if(response.status){
					let no = 1;
					tableElement.find('tbody').html('');
					$.each(response.data, function(i, item){
						let tr = $('<tr>');
						tr.append('<td>' + no++ + '</td>');

						if(table === 'biaya'){
							tr.append('<td>' + item.nama_biaya + '</td>');
							tr.append('<td>' + item.deskripsi + '</td>');
							
						} else if(table === 'harga_biaya'){
							tr.append('<td>' + item.nama_biaya + '</td>');
							tr.append('<td>' + item.nama_tahun_pelajaran + '</td>');
							tr.append('<td>' + item.harga + '</td>');
						}

						tr.append('<td> <button class="btn btn-primary editBtn" data-method="'+ table +'" data-target="'+ targetController +'" data-id="' + item.id + '">Edit</button> <button class="btn btn-danger deleteBtn" data-method="'+ table +'" data-target="' + targetController + '" data-id="' + item.id + '">Delete</button></td>');
                    	tableElement.find('tbody').append(tr);
					});
				} else {
                	tableElement.find('tbody').html('<tr><td colspan="4">' + response.message + '</td></tr>');
            }
			}
		})
	}


    $(document).on('click', '.saveBtn', function()  {
		let base = '<?php echo base_url(); ?>';
		var targetController = $(this).data('target');
		var targetMethod = $(this).data('method');
		var url = base + targetController +'/save_' + targetMethod;
		var formData = new FormData($('#form_' + targetMethod)[0]);
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
					$('#modal_' + targetMethod).modal('hide');
					tampilkan_table(targetController, targetMethod); 

				} else {
					alert(response.message);
				}
			}

		})
	})

	$(document).on('click', '.editBtn', function() {
		let base = '<?php echo base_url(); ?>';
		var targetController = $(this).data('target');
		var targetMethod = $(this).data('method');
    	var url = base + targetController +'/edit_' + targetMethod;
		var formData = new FormData($('#form_' + targetMethod)[0]);

		$.ajax({
			url: url,
			type: 'POST',
			data: formData,
			processData: false,
			contentType: false,
			dataType: 'json',
			success: function(response) {
				if (response.status) {
					if(targetMethod === 'biaya'){
						$('#id').val(response.data.id);
						$('#nama_biaya').val(response.data.nama_biaya);
						$('#deskripsi').val(response.data.deskripsi);
						$('#modal_' + targetMethod).modal('show');
						tampilkan_table(targetController, targetMethod); 
					} else if (targetMethod === 'harga_biaya'){
						$('#id').val(response.data.id);
						$('#id_biaya').val(response.data.id_biaya);
                        $('#id_tahun_pelajaran').val(response.data.id_tahun_pelajaran);
                        $('#harga').val(response.data.harga);
						$('#modal_' + targetMethod).modal('show');
						tampilkan_table(targetController, targetMethod); 

					}
				} else {
					alert(response.message);
				}
			}

		})
	});


	$(document).on('click', '.deleteBtn', function() {
		let base = '<?php echo base_url(); ?>';
		var targetController = $(this).data('target');
		var targetMethod = $(this).data('method');
		var id = $(this).data('id');
    	var url = base + targetController +'/delete_' + targetMethod;
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
					tampilkan_table(targetController, targetMethod); 
				} else {
					alert(response.message);
				}
			}

		})
	})


</script> -->