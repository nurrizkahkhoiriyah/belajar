<li class="nav-item">
	<a href="<?php echo base_url('admin') ?>" class="nav-link">
		<i class="nav-icon fas fa-tachometer-alt "></i>
		<p>
			Dashboard
		</p>
	</a>
</li>
<li class="nav-item ">
	<a href="#" class="nav-link ">
		<i class="nav-icon fas fa-th "></i>
		<p>
			Master Data
			<i class="right fas fa-angle-left"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">
		<li class="nav-item">
			<a href="<?php echo base_url('tahun_pelajaran') ?>" class="nav-link ">
				<i class="far fa-circle nav-icon"></i>
				<p>Data Tahun Pelajaran</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?php echo base_url('jurusan') ?>" class="nav-link ">
				<i class="far fa-circle nav-icon"></i>
				<p>Data Jurusan</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?php echo base_url('kelas') ?>" class="nav-link ">
				<i class="far fa-circle nav-icon"></i>
				<p>Data Kelas</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?php echo base_url('biaya') ?>" class="nav-link ">
				<i class="far fa-circle nav-icon"></i>
				<p>Data Biaya</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?php echo base_url('seragam') ?>" class="nav-link ">
				<i class="far fa-circle nav-icon"></i>
				<p>Data Seragam</p>
			</a>
		</li>
	</ul>
</li>
<li class="nav-item ">
	<a href="#" class="nav-link ">
		<i class="nav-icon fas fa-copy"></i>
		<p>
			Pendaftaran
			<i class="right fas fa-angle-left"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">
		<li class="nav-item">
			<a href="<?php echo base_url('pendaftaran_awal') ?>" class="nav-link ">
				<i class="far fa-circle nav-icon"></i>
				<p>Pendaftaran Awal</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?php echo base_url('pendaftaran_ulang') ?>" class="nav-link ">
				<i class="far fa-circle nav-icon"></i>
				<p>Pendaftaran Ulang</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?php echo base_url('pembatalan_pendaftaran') ?>" class="nav-link ">
				<i class="far fa-circle nav-icon"></i>
				<p>Pembatalan Pendaftaran</p>
			</a>
		</li>
	</ul>
</li>

<li class="nav-item">
	<a href="<?php echo base_url('akun_pengguna') ?>" class="nav-link">
		<i class="nav-icon fas fa-users "></i>
		<p>
			Akun Pengguna
		</p>
	</a>
</li>

<li class="nav-item"  id="logoutBtn">
	<a href="" class="nav-link">
		<i class="nav-icon fas fa-sign-out-alt"></i>
		<p>
			Keluar
		</p>
	</a>
</li>

<script>
	$('#logoutBtn').click(function () {
                // Konfirmasi logout
                if (confirm('Apakah Anda yakin ingin keluar?')) {
                    $.ajax({
                        url: '<?= base_url('login/logout'); ?>', // URL ke fungsi logout
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
</script>