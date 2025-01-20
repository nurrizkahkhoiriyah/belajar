$(document).ready(function () {
	$('.chainedSelect').each(function () {
		let $parent = $(this).data('parent');
		let $target = $(this).data('target');
		let $url = baseClass + '/option_' + target;
		if ($parent) {
            // Tambahkan event handler untuk perubahan pada parent
            $('#' + $parent).change(function () {
                let parentValue = $(this).val(); // Ambil nilai parent
                if (parentValue) {
                    // Muat opsi berdasarkan nilai parent
                    $(this).load($url + '/' + parentValue, function () {
                        $(this).trigger('change'); // Trigger event change setelah opsi dimuat
                    });
                } else {
                    // Kosongkan elemen jika parent tidak memiliki nilai
                    $(this).html('<option value="">Pilih terlebih dahulu</option>');
                }
            });
        } else {
            // Jika tidak ada parent, muat opsi langsung saat halaman dimuat
            if ($target) {
                $(this).load($url, function () {
                    $(this).trigger('change'); // Trigger event change setelah opsi dimuat
                });
            }
        }

	})
});

// $(document).ready(function () {
//     // Iterasi untuk setiap elemen dengan class "chainedSelect"
//     $('.chainedSelect').each(function () {
//         let $element = $(this); // Simpan referensi ke elemen saat ini
//         let $parent = $element.data('parent'); // Ambil atribut data-parent
//         let $target = $element.data('target'); // Ambil atribut data-target
//         let $url = baseClass + '/option_' + $target; // URL untuk memuat opsi

//         // Jika elemen memiliki parent (dropdown bergantung pada dropdown lain)
//         if ($parent) {
//             // Tambahkan event handler untuk perubahan pada parent
//             $('#' + $parent).change(function () {
//                 let parentValue = $(this).val(); // Ambil nilai parent
//                 if (parentValue) {
//                     // Muat opsi berdasarkan nilai parent
//                     $element.load($url + '/' + parentValue, function () {
//                         $element.trigger('change'); // Trigger event change setelah opsi dimuat
//                     });
//                 } else {
//                     // Kosongkan elemen jika parent tidak memiliki nilai
//                     $element.html('<option value="">Pilih terlebih dahulu</option>');
//                 }
//             });
//         } else {
//             // Jika tidak ada parent, muat opsi langsung saat halaman dimuat
//             if ($target) {
//                 $element.load($url, function () {
//                     $element.trigger('change'); // Trigger event change setelah opsi dimuat
//                 });
//             }
//         }
//     });
// });
