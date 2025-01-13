<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo base_url('public/template/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<title>Dashboard</title>
</head>

<body>
    <!-- Modal Pop-up -->
    <div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="welcomeModalLabel">Selamat Datang!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Anda berhasil login
                </div>
            </div>
        </div>
    </div>
	<div class="row justify-content-center">
		<div class="card col-md-8 mt-5 ">
			<div class="card-header">
				<h1>Dashboard</h1>
			</div>
			<div class="card-body">
				<div>
					<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Tambah User</button>
				</div>
				<div class="table-user">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Username</th>
								<th>Password</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($users as $user) :
							?>
								<tr id="user_<?= $user->id; ?>">
									<td><?= $no++ ?></td>
									<td><?= $user->username ?></td>
									<td><?= $user->password ?></td>
									<td>
                                            <?php if ($user->id != $loggedInUserId): ?>
                                                <button class="btn btn-primary btn-edit" data-bs-toggle="modal" data-bs-target="#editUserModal" data-id="<?= $user->id; ?>">Edit</button>
                                                <button class="btn btn-danger btn-delete" data-id="<?= $user->id; ?>">Delete</button>
                                            <?php else: ?>
                                                <button class="btn btn-primary btn-edit2" onclick="showAlert('edit')">Edit</button>
                                                <button class="btn btn-danger btn-delete2" onclick="showAlert('delete')">Delete</button>
                                            <?php endif; ?>
                                        </td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
            <div class="">
					<button class="btn btn-primary mb-3" id="logoutBtn" >Logout</button>
			</div>
		</div>
	</div>
	<!-- Modal Add Data -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add New Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addForm">
                        <div class="mb-3">
                            <label for="addUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="addUsername" required>
                        </div>
                        <div class="mb-3">
                            <label for="addPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="addPassword" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm">
                        <input type="hidden" id="editId" name="id">
                        <div class="mb-3">
                            <label for="editUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="editUsername" name="editUsername" value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="editPassword" name="editPassword" value="" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



	<script src="<?php echo base_url('public/template/js/bootstrap.bundle.min.js'); ?>"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        window.onload = function() {
            <?php if ($this->session->flashdata('login_success')): ?>
                const welcomeModal = new bootstrap.Modal(document.getElementById('welcomeModal'));
                welcomeModal.show(); 

                setTimeout(function() {
                    welcomeModal.hide();
                }, 3000); 
            <?php endif; ?>
        };
    </script>

    <script>
        $(document).ready(function() {

            // Add new data
            $('#addForm').submit(function(e) {
                e.preventDefault();
                let username = $('#addUsername').val();
                let password = $('#addPassword').val();
                $.ajax({
                    url: '<?= base_url('dashboard/save'); ?>',
                    type: 'POST',
                    data: {username: username, password: password},
                    success: function(response) {
                        if (response) {
                            $('#addModal').modal('hide');
                            location.reload(); 
                        }
                    }
                });
            });
        

            $('#editUserForm').on('submit', function (e) {
                e.preventDefault();
                let id = $('#editId').val();
                let username = $('#editUsername').val();
                let password = $('#editPassword').val();
                $.ajax({
                    url: '<?= base_url('dashboard/update_user'); ?>',
                    type: 'POST',
                    data: {id: id, username: username, password: password},
                    success: function(response) {
                        if (response) {
                            $('#editUserModal').modal('hide');
                            location.reload(); 
                        }
                    }
                });
            });

            $(document).on('click', '.btn-edit', function() {
                let id = $(this).data('id');
                $.ajax({
                    url: '<?= base_url('dashboard/edit'); ?>/' + id,
                    method: 'GET',
                    success: function(data) {
                        let user = JSON.parse(data);
                        $('#editId').val(user.id);
                        $('#editUsername').val(user.username);
                        $('#editPassword').val(user.password);
                        $('#editUserModal').modal('show');
                    },
                    error: function() {
                        alert('Gagal mengambil data user.');
                    }
                });
            });

            $(document).on('click', '.btn-delete', function() {
                let id = $(this).data('id');
                if (confirm('Apakah Anda yakin ingin menghapus user ini?')) {
                    $.ajax({
                        url: '<?= base_url('dashboard/delete'); ?>',
                        type: 'POST',
                        data: { id: id },
                        success: function(response) {
                            if (response) {
                                location.reload(); 
                            }
                        },
                        error: function() {
                            alert('Gagal menghapus user.');
                        }
                    });
                }
            });

            $('#logoutBtn').click(function () {
                // Konfirmasi logout
                if (confirm('Apakah Anda yakin ingin logout?')) {
                    $.ajax({
                        url: '<?= base_url('dashboard/logout'); ?>', // URL ke fungsi logout
                        type: 'POST',
                        success: function (response) {
                            let res = JSON.parse(response);
                            if (res.status) {
                                // Redirect ke halaman login
                                window.location.href = '<?= base_url('login'); ?>';
                            } else {
                                alert('Logout gagal. Silakan coba lagi.');
                            }
                        },
                        error: function () {
                            alert('Terjadi kesalahan. Tidak dapat logout.');
                        }
                    });
                }
            });
        

        });

  
    </script>

        <script>
            function showAlert(action) {
                if (action === 'edit') {
                    alert('Anda tidak dapat mengedit data ini.');
                } else if (action === 'delete') {
                    alert('Anda tidak dapat menghapus data ini.');
                }
            }
        </script>
</body>

</html>