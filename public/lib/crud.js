$(document).ready(function() {

	$('.table').each(function () {
		let target = $(this).data('target');
		loadTabel(target);
	});

	$('.loadSelect').each(function () {
		let targetController = $(this).data('target');
		// $('#id_' + targetController)
		let url = baseClass + '/option_' + targetController;
		$(this).load(url);
		// let source = $(this).data('source');
		// let id = $(this).val();
		// $('#id_' + source).load(url + '/' + id, function(){
		// 	$('#id_' + source).val(id)
		// });
	});

	$(document).on('hidden.bs.modal', '.modal', function () {
		const modal = $(this);
		const form = modal.find('form')[0];
	
		if (form) {
			form.reset(); // Reset form
		}
		
		modal.find('.text-danger').text(''); // Hapus pesan error
		modal.find('.is-invalid, .is-valid').removeClass('is-invalid is-valid'); // Hapus kelas validasi
	});
	
	
	
	

	// $(document).on('change', '.loadSelect', function() {
	// 	let targetController = $(this).data('target');
	// 	let source = $(this).data('source');
	// 	let id = $(this).val();
	// 	let url = baseClass + '/option_' + source;
	// 	$('#id_' + source).load(url + '/' + id, function(){
	// 		$('#id_' + source).val(id)
	// 	});
	// });

	// $('#id_jurusan').load(url + '/' + id_tahun_pelajaran, function() {
	// 	$('#id_jurusan').val(id);
	// });

	// $('#id_tahun_pelajaran').load('kelas/option_tahun_pelajaran');
	// $('#id_tahun_pelajaran').change(function() {
	// 	let id = $(this).val();
	// 	let url = 'kelas/option_jurusan';
	// 	$('#id_jurusan').load(url + '/' + id);
	// })
	// $('#id_biaya').load('biaya/option_biaya');
	// $('#id_seragam').load('seragam/option_seragam');


})

$(document).on('click', '.tambahBtn', function(){
	var targetController = $(this).data('target');
	$('#id').val('');
	
	$('#form_' + targetController).trigger('reset');
	$('#modal_' + targetController).modal('show');

})



function loadTabel(target) {
	let table = $('#table_' + target);
	let url = baseClass + '/table_' + target;
	let tr = '';
	let th = '';
	$.ajax({
		url: url,
		type: 'GET',
		dataType: 'json',
		success: function (response) {
			if (response.status) {
				generateTable(response.data, target);
			} else {
				tr = $('<tr>');
				table.find('tbody').html('');
				th = table.find('thead th').length;
				tr.append('<td colspan="' + th + '"> <h4>' + response.message + '</h4></td>');
			}
		}
	});
}


function generateTable(data, target) {
	const $table = $(`#table_${target}`);
	const $thead = $table.find('thead th');
	const $tbody = $table.find('tbody');

	let rows = "";

	data.forEach((item, index) => {
		let row = "<tr>";

		$thead.each(function () {
			const key = $(this).data('key');

			if (key === "no") {
				// Kolom nomor urut
				row += `<td style="${$(this).attr('style')}">${index + 1}</td>`;
			} else if (key === "btn_aksi") {
				// Kolom aksi
				row += `
					<td style="${$(this).attr('style')}">
						<button class="btn btn-primary btn-sm editBtn" data-id="${item.id}" data-target="${target}" >Edit</button>
						<button class="btn btn-danger btn-sm deleteBtn" data-id="${item.id}" data-target="${target}" >Delete</button>
					</td>`;
			} else if (key === "btn_pendaftaran") {
				// Kolom aksi
				row += `
					<td style="${$(this).attr('style')}">
						<button class="btn btn-primary btn-sm editBtn" data-id="${item.id}" data-target="${target}" >Edit</button>
						<button class="btn btn-danger btn-sm deleteBtn" data-id="${item.id}" data-target="${target}" >Delete</button>
						<button class="btn btn-success btn-sm detailBtn" data-id="${item.id}" data-target="${target}" >Lihat Detail</button>
					</td>`;
			} else {
				// Kolom lainnya berdasarkan key
				row += `<td style="${$(this).attr('style')}">${item[key] || '-'}</td>`;
			}
		});

		row += "</tr>";
		rows += row;
	});

	$tbody.html(rows);
}


$(document).on('click', '.saveBtn', function()  {
	$('.text-danger').html('');
	$('input').removeClass('is-invalid');
	var targetController = $(this).data('target');
	var formElement = $('#form_' + targetController)[0];
	var formData = new FormData(formElement);
	$.ajax({
		url: baseClass +'/save_' + targetController,
		type: 'POST',
		data: formData,
		processData: false,
		contentType: false,
		dataType: 'json',
		success: function(response) {
			if (response.status) {
				alert(response.message);
				$('#modal_' + targetController).modal('hide');
				loadTabel(targetController);
			} else {
				// Bersihkan pesan error dan kelas invalid sebelum menampilkan yang baru
				$('.text-danger').html('');
				$('input').removeClass('is-invalid').removeClass('is-valid');
				
				if (response.error) {
					for (var prop in response.error) {
						if (response.error[prop] !== '') {
							$('#form_' + targetController + " [name=" + prop + "] ").addClass('is-invalid')
								.next('.text-danger').html(response.error[prop]);
						}
					}
				}
			}
		}

	})
})


$(document).on('click', '.editBtn', function() {
	let targetController = $(this).data('target');
	let id = $(this).data('id');
	let url = baseClass +'/edit_' + targetController + '/' + id;
	let form = '#form_' + targetController;
	$.ajax({
		url: url,
		type: 'POST',
		data: {
			id: id
		},
		dataType: 'json',
		success: function(response) {
			if (response.status) {
				$.each(response.data, function (i, item) {
					$(form + ' [name="' + i + '"]').val(item);
				});


				$('#modal_' + targetController).modal('show');
			} else {
				alert(response.message);
			}
		}

	})
});


$(document).on('click', '.detailBtn', function() {
    let targetController = $(this).data('target');
    let id = $(this).data('id');
    let url = baseClass + '/get_detail_' + targetController + '/' + id;

    $.ajax({
        url: url,
        type: 'POST',
        data: { id: id },
        dataType: 'json',
        success: function(response) {
            if (response.status) {
                // Mengisi data ke modal
                $.each(response.data, function(i, item) {
                    $('#detailModal [name="' + i + '"]').val(item);
                });

                // Menampilkan modal
                $('#detailModal').modal('show');
            } else {
                alert(response.message);
            }
        }
    });
});

$(document).on('click', '.deleteBtn', function() {
	var targetController = $(this).data('target');
	var id = $(this).data('id');
	$.ajax({
		url: baseClass +'/delete_' + targetController,
		type: 'POST',
		data: {
			id: id
		},
		dataType: 'json',
		success: function(response) {
			if (response.status) {
				alert(response.message);
				loadTabel(targetController);
			} else {
				alert(response.message);
			}
		}

	})
})



// function setJurusan(id_tahun_pelajaran, id) {
// 	let url = 'kelas/option_jurusan';
// 	$('#id_jurusan').load(url + '/' + id_tahun_pelajaran, function() {
// 		$('#id_jurusan').val(id);
// 	});

// }


$(document).on('click', '#logoutBtn', function() {
    if (confirm('Apakah Anda yakin ingin keluar?')) {
        $.ajax({
        url: 'login/logout', 
        type: 'POST',
        success: function (response) {
        	let res = JSON.parse(response);
        	if (res.status) {
                window.location.href = 'login';
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


