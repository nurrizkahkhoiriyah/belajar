
	$(document).ready(function() {
	tampilkan_table('biaya', 'biaya');
	tampilkan_table('biaya', 'harga_biaya');	
})


// $('#id_tahun_pelajaran').load('<?php echo base_url('biaya/option_tahun_pelajaran'); ?>');
// $('#id_biaya').load('<?php echo base_url('biaya/option_biaya'); ?>');


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
	formData.append('id', $(this).data('id'));

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