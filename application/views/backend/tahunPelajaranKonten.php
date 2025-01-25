<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Tahun Pelajaran</h3>
			</div>
			<div class="card-body">
				<div class="btn btn-secondary btnRefresh mb-2" data-target="tahun_pelajaran"> <i class="fas fa-sync"></i> Refresh</div>
				<div class="btn btn-primary tambahBtn mb-2" data-target="tahun_pelajaran"> <i class="fas fa-plus"></i> Tambah</div>
				<div class="">
					<table class="table table-striped" width="100%" id="table_tahun_pelajaran" data-target="tahun_pelajaran">
						<thead class="text-sm">
							<tr>
								<th><input type="checkbox" id="check-all"></th>
								<th data-key="no">No</th>
								<th data-key="nama_tahun_pelajaran">Tahun Pelajaran</th>
								<th data-key="tanggal_mulai">Mulai</th>
								<th data-key="tanggal_akhir">Akhir</th>
								<th data-key="status_tahun_pelajaran">Status</th>
								<th data-key="btn_aksi">Aksi</th>
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

<div class="modal" id="modal_tahun_pelajaran" tabindex=" -1" role="dialog">
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
					<form id="form_tahun_pelajaran" action="#" method="post" enctype="multipart/form-data">
						<input type="hidden" class="form-control" id="id" name="id" value="">
						<div class="mb-1">
							<label for="nama_tahun_pelajaran" class="form-label">Nama Tahun Pelajaran</label>
							<input type="text" class="form-control" id="nama_tahun_pelajaran" name="nama_tahun_pelajaran" value="">
							<div class="text-danger"></div>
						</div>
						<div class="mb-1">
							<label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
							<input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="">
							<div class="text-danger"></div>
						</div>
						<div class="mb-1">
							<label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
							<input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="">
							<div class="text-danger"></div>
						</div>
						<div class="mb-1">
							<label for="status_tahun_pelajaran" class="form-label">Status</label>
							<select class="form-control" id="status_tahun_pelajaran" name="status_tahun_pelajaran">
								<option value="">Pililh</option>
								<option value="1">Aktif</option>
								<option value="0">Tidak Aktif</option>
							</select>
							<div class="text-danger"></div>
						</div>
					</form>
					<div>
					</div>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary saveBtn" data-target="tahun_pelajaran">Simpan</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>



<script>
	// var table = $("#tabelTahunPelajaran");
	// $(document).ready(function() {
	// 	//tabelTahunPelajaran();
	// 	loadDataTable(table);
	// 	$("#check-all").click(function() {
	// 		$(".data-check").prop('checked', $(this).prop('checked'));
	// 	});
	// });

	// $(document).on("click", ".btnRefresh", function() {
	// 	reloadTable(table);
	// });

	// function reloadTable(el) {
	// 	return el.DataTable().ajax.reload(null, false);
	// }

	// function initTable(el) {
	// 	el.DataTable({
	// 		"retrieve": true,
	// 		"processing": true,
	// 		"order": [],
	// 		"columnDefs": []

	// 	});
	// }

	// function loadDataTable(el, filter = '') {
	// 	var ds = el.data("target");
	// 	el.DataTable().destroy();
	// 	el.DataTable({

	// 		"retrieve": true,
	// 		"processing": true,
	// 		"serverSide": true,
	// 		"ordering": false,
	// 		"ajax": {
	// 			"url": baseClass + '/' + ds,
	// 			"type": "POST",
	// 			"data": function(data) {
	// 				data.filter = filter;
	// 			}
	// 		},

	// 		"columnDefs": [


	// 			{
	// 				"targets": [-1],
	// 				"orderable": false,
	// 			}

	// 		],
	// 		"fnDrawCallback": function() {

	// 		}
	// 	});
	// }

	// function tabelTahunPelajaran() {
	// 	let tabelTahunPelajaran = $('#tabelTahunPelajaran');
	// 	let tr = '';
	// 	$.ajax({
	// 		url: '<?php echo base_url('tahun_pelajaran/table_tahun_pelajaran'); ?>',
	// 		type: 'GET',

	// 		dataType: 'json',
	// 		success: function(response) {
	// 			if (response.status) {
	// 				tabelTahunPelajaran.find('tbody').html('');
	// 				let no = 1;
	// 				$.each(response.data, function(i, item) {
	// 					tr = $('<tr>');

	// 					tr.append('<td>' + no++ + '</td>');
	// 					tr.append('<td>' + item.nama_tahun_pelajaran + '</td>');
	// 					tr.append('<td>' + item.tanggal_mulai + '</td>');
	// 					tr.append('<td>' + item.tanggal_akhir + '</td>');
	// 					tr.append('<td>' + item.status_tahun_pelajaran + '</td>');
	// 					tr.append('<td>	<button class="btn btn-primary" onclick="editTahunPelajaran(' + item.id + ')">Edit</button> <button class="btn btn-danger" onclick="deleteTahunPelajarar(' + item.id + ')">Delete</button></td>');
	// 					tabelTahunPelajaran.find('tbody').append(tr);
	// 				});

	// 			} else {
	// 				tr = $('<tr>');
	// 				tabelTahunPelajaran.find('tbody').html('');
	// 				tr.append('<td colspan="4">' + response.message + '</td>');
	// 			}
	// 		}
	// 	});
	// }

	// $('.btnTambahTahunPelajaran').click(function() {
	// 	$('#id').val('');
	// 	$('#formTahunPelajaran').trigger('reset');
	// 	$('#modalTahunPelajaran').modal('show');
	// });

	// $('.saveBtn').click(function() {
	// 	// lakukan proses simpan data, lalu tutup modal , lalu reload tabel
	// 	$.ajax({
	// 		url: '<?php echo base_url('tahun_pelajaran/save_tahun_pelajaran'); ?>',
	// 		type: 'POST',
	// 		data: {
	// 			id: $('#id').val(),
	// 			nama_tahun_pelajaran: $('#nama_tahun_pelajaran').val(),
	// 			tanggal_mulai: $('#tanggal_mulai').val(),
	// 			tanggal_akhir: $('#tanggal_akhir').val(),
	// 			status_tahun_pelajaran: $('#status_tahun_pelajaran').val(),
	// 		},
	// 		dataType: 'json',
	// 		success: function(response) {
	// 			if (response.status) {
	// 				alert(response.message);
	// 				$('#modalTahunPelajaran').modal('hide');
	// 				tabelTahunPelajaran();
	// 			} else {
	// 				alert(response.message);
	// 			}
	// 		}

	// 	})
	// })

	// function editTahunPelajaran(id) {
	// 	// tampilkan data dalam modal 
	// 	$.ajax({
	// 		url: '<?php echo base_url('tahun_pelajaran/edit_tahun_pelajaran'); ?>',
	// 		type: 'POST',
	// 		data: {
	// 			id: id,
	// 		},
	// 		dataType: 'json',
	// 		success: function(response) {
	// 			if (response.status) {
	// 				$('#id').val(response.data.id);
	// 				$('#nama_tahun_pelajaran').val(response.data.nama_tahun_pelajaran);
	// 				$('#tanggal_mulai').val(response.data.tanggal_mulai);
	// 				$('#tanggal_akhir').val(response.data.tanggal_akhir);
	// 				$('#status_tahun_pelajaran').val(response.data.status_tahun_pelajaran);
	// 				$('#modalTahunPelajaran').modal('show');
	// 			} else {
	// 				alert(response.message);
	// 			}
	// 		}
	// 	})
	// };

	// function deleteTahunPelajarar(id) {
	// 	// lakukan proses delete data, lalu reload tabel
	// 	$.ajax({
	// 		url: '<?php echo base_url('tahun_pelajaran/delete_tahun_pelajaran'); ?>',
	// 		type: 'POST',
	// 		data: {
	// 			id: id,
	// 		},
	// 		dataType: 'json',
	// 		success: function(response) {
	// 			if (response.status) {
	// 				alert(response.message);
	// 				tabelTahunPelajaran();
	// 			} else {
	// 				alert(response.message);
	// 			}
	// 		}
	// 	})
	// };
</script>