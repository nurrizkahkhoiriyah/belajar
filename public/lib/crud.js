
    $(document).ready(function() {
		tabelBiaya();
        tabelHargaBiaya();
	})

    $('#id_tahun_pelajaran').load('<?php echo base_url('biaya/option_tahun_pelajaran'); ?>');
    $('#id_biaya').load('<?php echo base_url('biaya/option_biaya'); ?>');


    $('.btnTambahBiaya').click(function() {
		$('#id').val('');
		$('#formBiaya').trigger('reset');
		$('#modalBiaya').modal('show');
	});

    $('.btnTambahHargaBiaya').click(function() {
		$('#id').val('');
		$('#formHargaBiaya').trigger('reset');
		$('#modalHargaBiaya').modal('show');
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
						tr.append('<td>	<button class="btn btn-primary" onclick="editBiaya(' + item.id + ')">Edit</button> <button class="btn btn-danger" onclick="deleteBiaya(' + item.id + ')">Delete</button></td>');
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
						tr.append('<td>	<button class="btn btn-primary" onclick="editHargaBiaya(' + item.id + ')">Edit</button> <button class="btn btn-danger" onclick="deleteHargaBiaya(' + item.id + ')">Delete</button></td>');
						tabelHargaBiaya.find('tbody').append(tr);
					});

				} else {
					tabelHargaBiaya.find('tbody').html('');
					tr.append('<td colspan="4">' + response.message + '</td>');
				}
			}
		});
	}

    $('.saveBtnBiaya').click(function() {
		$.ajax({
			url: '<?php echo base_url('biaya/saveBiaya'); ?>',
			type: 'POST',
			data: {
				id: $('#id').val(),
				nama_biaya: $('#nama_biaya').val(),
				deskripsi: $('#deskripsi').val(),
			},
			dataType: 'json',
			success: function(response) {
				if (response.status) {
					alert(response.message);
					$('#modalBiaya').modal('hide');
					tabelBiaya();
				} else {
					alert(response.message);
				}
			}

		})
	})
    $('.saveBtnHargaBiaya').click(function() {
		$.ajax({
			url: '<?php echo base_url('biaya/saveHargaBiaya'); ?>',
			type: 'POST',
			data: {
				id: $('#id').val(),
				id_biaya: $('#id_biaya').val(),
				id_tahun_pelajaran: $('#id_tahun_pelajaran').val(),
				harga: $('#harga').val(),
			},
			dataType: 'json',
			success: function(response) {
				if (response.status) {
					alert(response.message);
					$('#modalHargaBiaya').modal('hide');
					tabelHargaBiaya();
				} else {
					alert(response.message);
				}
			}

		})
	})

    function editBiaya(id){
			$.ajax({
				url: '<?php echo base_url('biaya/editBiaya'); ?>',
				type: 'POST',
				data: {
					id: id
				},
				dataType: 'json',
				success: function(response) {
					if (response.status) {
						$('#id').val(response.data.id);
						$('#nama_biaya').val(response.data.nama_biaya);
						$('#deskripsi').val(response.data.deskripsi);
						$('#modalBiaya').modal('show');
						tabelBiaya();
					} else {
						alert(response.message);
					}
				}
			});
	}
    function editHargaBiaya(id){
			$.ajax({
				url: '<?php echo base_url('biaya/editHargaBiaya'); ?>',
				type: 'POST',
				data: {
					id: id
				},
				dataType: 'json',
				success: function(response) {
					if (response.status) {
						$('#id').val(response.data.id);
						$('#id_biaya').val(response.data.id_biaya);
                        $('#id_tahun_pelajaran').val(response.data.id_tahun_pelajaran);
						$('#modalHargaBiaya').modal('show');
						tabelHargaBiaya();
					} else {
						alert(response.message);
					}
				}
			});
	}

    function deleteBiaya(id) {
		if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
			let url = '<?php echo base_url('biaya/deleteBiaya'); ?>';
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

	}
    function deleteHargaBiaya(id) {
		if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
			let url = '<?php echo base_url('biaya/deleteHargaBiaya'); ?>';
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
						tabelHargaBiaya();
					} else {
						alert(response.message);
					}
				}
			});
		}

	}
