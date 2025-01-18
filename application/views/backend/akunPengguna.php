<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Akun Pengguna</h3>
			</div>
			<div class="card-body">
				<div class="btn btn-primary tambahBtn mb-2" data-method="akun_pengguna"> <i class="fas fa-plus"></i> Tambah</div>
				<div class="row">
					<table class="table table-striped" id="table_akun_pengguna">
						<thead>
							<tr>
								<th>No</th>
								<th>Username</th>
								<th>Password</th>
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

<div class="modal" id="modal_akun_pengguna" tabindex=" -1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Akun Pengguna</h5>

				<button type="button" class="close " data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-user">
					<form id="form_akun_pengguna" action="#" method="post" enctype="multipart/form-data">
						<input type="hidden" class="form-control" id="id" name="id" value="">
						<div class="mb-1">
							<label for="username" class="form-label">Username</label>
							<input type="text" class="form-control" id="username" name="username" value="">
							<div class="error-block"></div>
						</div>
						<div class="mb-1">
							<label for="password" class="form-label">Password</label>
							<input type="text" class="form-control" id="password" name="password" value="">
							<div class="error-block"></div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary saveBtn" data-target="akun_pengguna" data-method="akun_pengguna">Simpan</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

<!-- <script>
    $(document).ready(function() {
		tabelUser();
		
	})

	function tabelUser() {
		let tabelUser = $('#tabelUser');
		let tr = $('<tr>');
		$.ajax({
			url: '<?php echo base_url('akun_pengguna/table_user'); ?>',
			type: 'GET',

			dataType: 'json',
			success: function(response) {
				if (response.status) {
					tabelUser.find('tbody').html('');
					let no = 1;
					$.each(response.data, function(i, item) {
						let tr = $('<tr>');
						tr.append('<td>' + no++ + '</td>');
						tr.append('<td>' + item.username + '</td>');
						tr.append('<td>' + item.password + '</td>');
						tr.append('<td>	<button class="btn btn-primary" onclick="edit(' + item.id + ')">Edit</button> <button class="btn btn-danger" onclick="deleteBtn(' + item.id + ')">Delete</button></td>');
						tabelUser.find('tbody').append(tr);
					});

				} else {
					tabelUser.find('tbody').html('');
					tr.append('<td colspan="4">' + response.message + '</td>');
				}
			}
		});
	}

    $('.btnTambahUser').click(function() {
		$('#id').val('');
		$('#formUser').trigger('reset');
		$('#modalUser').modal('show');
	});

    $('.saveBtn').click(function() {
		$.ajax({
			url: '<?php echo base_url('akun_pengguna/save'); ?>',
			type: 'POST',
			data: {
				id: $('#id').val(),
				username: $('#username').val(),
				password: $('#password').val(),
			},
			dataType: 'json',
			success: function(response) {
				if (response.status) {
					alert(response.message);
					$('#modalUser').modal('hide');
					tabelUser();
				} else {
					alert(response.message);
				}
			}

		})
	})

    function edit(id){
			$.ajax({
				url: '<?php echo base_url('akun_pengguna/edit'); ?>',
				type: 'POST',
				data: {
					id: id
				},
				dataType: 'json',
				success: function(response) {
					if (response.status) {
						$('#id').val(response.data.id);
						$('#username').val(response.data.username);
						$('#password').val(response.data.password);
						$('#modalUser').modal('show');
						tabelUser();
					} else {
						alert(response.message);
					}
				}
			});
	}

    function deleteBtn(id) {
		if (confirm('Apakah Anda yakin ingin menghapus user ini?')) {
			let url = '<?php echo base_url('akun_pengguna/delete'); ?>';
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
						tabelUser();
					} else {
						alert(response.message);
					}
				}
			});
		}

	}

</script> -->
