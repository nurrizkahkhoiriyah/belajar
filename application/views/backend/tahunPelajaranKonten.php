<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Tahun Pelajaran</h3>
			</div>
			<div class="card-body">
				<div class="btn btn-primary btnTambahTahunPelajaran mb-2"> <i class="fas fa-plus"></i> Tambah</div>
				<div class="row">
					<table class="table table-striped" id="tabelTahunPelajaran">
						<thead>
							<tr>
								<th>No</th>
								<th>Tahun Pelajaran</th>
								<th>Mulai</th>
								<th>Akhir</th>
								<th>Status</th>
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

<div class="modal" id="modalTahunPelajaran" tabindex=" -1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Tahun Pelajaran</h5>

				<button type="button" class="close " data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-user">
					<form action="#" method="post" enctype="multipart/form-data">
						<input type="hidden" class="form-control" id="id" name="id" value="">
						<div class="mb-1">
							<label for="nama_tahun_pelajaran" class="form-label">Nama Tahun Pelajaran</label>
							<input type="text" class="form-control" id="nama_tahun_pelajaran" name="nama_tahun_pelajaran" value="">
							<div class="error-block"></div>
						</div>
						<div class="mb-1">
							<label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
							<input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="">
							<div class="error-block"></div>
						</div>
						<div class="mb-1">
							<label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
							<input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="">
							<div class="error-block"></div>
						</div>
						<div class="mb-1">
							<label for="status_tahun_pelajaran" class="form-label">Status</label>
							<input class="form-control" id="status_tahun_pelajaran" name="status_tahun_pelajaran">
								<!-- <option value="1">Aktif</option>
								<option value="0">Tidak Aktif</option> -->
							<!-- </input> -->
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
		tabelTahunPelajaran();

		$('.btnTambahTahunPelajaran').click(function() {
			$('#modalTahunPelajaran').modal('show');
		});

		
	})

	function tabelTahunPelajaran() {
		let tabelTahunPelajaran = $('#tabelTahunPelajaran');
		let tr = $('<tr>');
		$.ajax({
			url: '<?php echo base_url('tahun_pelajaran/table_tahun_pelajaran'); ?>',
			type: 'GET',

			dataType: 'json',
			success: function(response) {
				if (response.status) {
					tabelTahunPelajaran.find('tbody').html('');
					let no = 1;
					$.each(response.data, function(i, item) {

						tr.append('<td>' + no++ + '</td>');
						tr.append('<td>' + item.nama_tahun_pelajaran + '</td>');
						tr.append('<td>' + item.tanggal_mulai + '</td>');
						tr.append('<td>' + item.tanggal_akhir + '</td>');
						tr.append('<td>' + item.status_tahun_pelajaran + '</td>');
						tr.append('<td>	<button class="btn btn-primary" onclick="editTahunPelajaran(' + item.id + ')">Edit</button> <button class="btn btn-danger" onclick="deleteTahunPelajaran(' + item.id + ')">Delete</button></td>');
						tabelTahunPelajaran.find('tbody').append(tr);
					});

				} else {
					tabelTahunPelajaran.find('tbody').html('');
					tr.append('<td colspan="4">' + response.message + '</td>');
				}
			}
		});
	}

	$('.saveBtn').click(function() {
		const id = $('#id').val();
		const nama_tahun_pelajaran = $('#nama_tahun_pelajaran').val();
		const tanggal_mulai = $('#tanggal_mulai').val();
		const tanggal_akhir = $('#tanggal_akhir').val();
		const status_tahun_pelajaran = $('#status_tahun_pelajaran').val();

		if (!nama_tahun_pelajaran || !tanggal_mulai || !tanggal_akhir) {
			alert('Harap isi semua field dengan benar.');
			return;
		}

		$.ajax({
			url: '<?php echo base_url('tahun_pelajaran/save'); ?>',
			type: 'POST',
			data: {
				id: id,
				nama_tahun_pelajaran: nama_tahun_pelajaran,
				tanggal_mulai: tanggal_mulai,
				tanggal_akhir: tanggal_akhir,
				status_tahun_pelajaran: status_tahun_pelajaran
			},
			dataType: 'json',
			success: function(response) {
				if (response.status) {
					alert(response.message); 
					$('#modalTahunPelajaran').modal('hide'); 
					tabelTahunPelajaran(); // Reload tabel
				} else {
					alert(response.message); 
				}
			},
			error: function(xhr, status, error) {
				alert('Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
			}
		});
	});

	// $('.saveBtn').click(function() {
	// 	// lakukan proses simpan data, lalu tutup modal , lalu reload tabel
	// })
	// $('.editTahunPelajaran').click(function() {
			
	// })
	
	$('.deleteBtn').click(function() {
		// lakukan proses delete data, lalu reload tabel
	})
	function editTahunPelajaran(id){
			$.ajax({
				url: '<?php echo base_url('tahun_pelajaran/edit'); ?>',
				type: 'POST',
				data: {
					id: id
				},
				dataType: 'json',
				success: function(response) {
					if (response.status) {
						$('#id').val(response.data.id);
						$('#nama_tahun_pelajaran').val(response.data.nama_tahun_pelajaran);
						$('#tanggal_mulai').val(response.data.tanggal_mulai);
						$('#tanggal_akhir').val(response.data.tanggal_akhir);
						$('#status_tahun_pelajaran').val(response.data.status_tahun_pelajaran);
						$('#modalTahunPelajaran').modal('show');
					} else {
						alert(response.message);
					}
				}
			});
	}

	function deleteTahunPelajaran(id) {
		if (confirm('Apakah Anda yakin ingin menghapus user ini?')) {
			let url = '<?php echo base_url('tahun_pelajaran/delete'); ?>';
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
						tabelTahunPelajaran();
					} else {
						alert(response.message);
					}
				}
			});
		}

	}
</script>