$(document).ready(function() {
	var base_url = 'http://localhost/busana/';
  $('#example1').on('click', 'a', function(event) {
  	event.preventDefault();
  	var elem = $(this);
      if (elem.is("[href^='#editinvoice']")) {
      	var orderid = $(this).data('orderid');
        var nama = $(this).data('nama');
        var payment = $(this).data('payment');
        var isbank = $(this).data('isbank');
        var courier = $(this).data('courier');
        var shippingaddres = $(this).data('shippingaddres');
        var shippingtotal = $(this).data('shippingtotal');
        var noresi = $(this).data('noresi');
        var total = $(this).data('total');
        var date = $(this).data('date');

        $('#orderid').val(orderid);
        $('#pelanggan').val(nama);
        $('#payment').val(payment);
        $('#isbank').val(isbank);
        $('#kurir').val(courier);
        $('#shippingaddres').val(shippingaddres);
        $('#shipping').val(shippingtotal);
        $('#noresi').val(noresi);
        $('#total').val(total);
        $('#datecreated').val(date);

        $('#edit-invoice').modal('show');
      } else if (elem.is('[href^="#deleteinvoice"]')) {
      	 var idorder = $(this).data('orderid');
  			Swal.fire({
			  title: 'Apakah anda ingin menghapus transaksi ini ?',
			  text: "Jika dihapus mka akan menghapus produk dan pelanggan yang terkait!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			  if (result.value) {
			  	$.ajax({
			  		url: base_url + 'ajax/deleteInvoice',
			  		method: 'POST',
			  		dataType: 'html',
			  		data: {orderid: idorder},
			  		success: function(mes) {
			  			if (mes == 'success') {
			  				Swal.fire({
							  position: 'top-end',
							  icon: 'success',
							  title: 'Transaksi berhasil dihapus',
							  showConfirmButton: false,
							  timer: 1500
							});
			  			} else {
			  				Swal.fire({
							  position: 'top-end',
							  icon: 'error',
							  title: 'Transaksi gagal dihapus',
							  showConfirmButton: false,
							  timer: 1500
							});
			  			}
			  		}
			  	});
			  }
			});
      } else {
      	var href = $(this).attr('href');
		document.location.href = href;
      }
  });


  $('#geteditinvoice').click(function() {
  	var form = $('#forminvoice').serialize();

  	$.ajax({
  		url: base_url + 'ajax/editInvoice',
  		method: 'POST',
  		dataType: 'json',
  		data: form,
  		success: function(resp) {
  			if (resp.type == 'success') {
  				toastr.success(resp.pesan);
  				setTimeout(() => {
                        window.location = base_url + "admin/invoice";
                    }, 3000);
  			} else {
  				toastr.error(resp.pesan);
  				setTimeout(() => {
                        window.location = base_url + "admin/invoice";
                    }, 3000);
  			}
  		}
  	});
  });

$('#example2').on('click', 'a', function(dol) {
	dol.preventDefault();
	var get = $(this);
	if (get.is('[href^="#deleteproduk"]')) {
		var id = $(this).data('id');
		Swal.fire({
		  title: 'Apakah anda ingin menghapus produk ini ?',
		  text: "Klik yes!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			  if (result.value) {
			  	$.ajax({
			  		url: base_url + 'ajax/deleteProduk',
			  		method: 'POST',
			  		dataType: 'html',
			  		data: {id: id},
			  		success: function(daw) {
			  			if (daw == 'succ') {
			  				Swal.fire({
							  position: 'top-end',
							  icon: 'success',
							  title: 'Produk berhasil dihapus',
							  showConfirmButton: false,
							  timer: 1500
							});
			  			} else {
			  				Swal.fire({
							  position: 'top-end',
							  icon: 'error',
							  title: 'Produk gagal dihapus',
							  showConfirmButton: false,
							  timer: 1500
							});
			  			}
			  		}
			  	});
			  }
			});
	} else if (get.is('[href^="#editproduk"]')) {
		var id = $(this).data('idn');
		$.ajax({
			url: base_url + 'ajax/editProdukForm',
			method: 'POST',
			dataType: 'html',
			data: {id: id},
			success: function(gtx) {
				$('#isi-produk').html(gtx);
				$('#edit-produk').modal('show');
			}
		});
	} else {
		var href = $(this).attr('href');
		document.location.href = href;
	}
});

$('#add-kategoribtn').click(function() {
	var formkate = $('#formkategori').serialize();

	$.ajax({
		url: base_url + 'ajax/addKategori',
		method: 'POST',
		dataType: 'json',
		data: formkate,
		success: function(getkate) {
			if (getkate.type == 'benar') {
  				toastr.success(getkate.pesan);
  				setTimeout(() => {
                        window.location = base_url + "get_kategori";
                    }, 3000);
  			} else {
  				toastr.error(getkate.pesan);
  				setTimeout(() => {
                        window.location = base_url + "get_kategori";
                    }, 3000);
  			}
		}
	});
});

$('#example3').on('click', 'a', function(ece) {
	ece.preventDefault();
	var acuh = $(this);
	if (acuh.is('[href^="#deletekategori"]')) {
		var id = $(this).data('id');

		Swal.fire({
		  title: 'Apakah anda ingin menghapus kategori ini ?',
		  text: "Klik yes!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			  if (result.value) {
			  	$.ajax({
			  		url: base_url + 'ajax/deleteKategori',
			  		method: 'POST',
			  		dataType: 'html',
			  		data: {id: id},
			  		success: function(how) {
			  			if (how == 'yesdelete') {
			  				Swal.fire({
							  position: 'top-end',
							  icon: 'success',
							  title: 'Kategori berhasil dihapus',
							  showConfirmButton: false,
							  timer: 1500
							});
			  			} else {
			  				Swal.fire({
							  position: 'top-end',
							  icon: 'error',
							  title: 'Kategori gagal dihapus',
							  showConfirmButton: false,
							  timer: 1500
							});
			  			}
			  		}
			  	});
			  }
			});
	} else if(acuh.is('[href^="#editkate"]')) {
		var id = $(this).data('id');
		var edit_nama_kategori = $(this).data('nama');
		var edit_kate = $(this).data('kate');

		$('input[name="edit_nama_kategori"]').val(edit_nama_kategori);
		$('input[name="edit_kate"]').val(edit_kate);
		$('input[name="idnya1"]').val(id);
		$('#update-kategori').modal('show');
	}
});

$('#update-kategoribtn').click(function() {
	var frm = $('#formkategoriupdate').serialize();

	$.ajax({
		url: base_url + 'ajax/editKategori',
		method: 'POST',
		dataType: 'html',
		data: frm,
		success: function(whr) {
			if (whr === 'sukses') {
				toastr.success('Kategori berhasil di update');
				setTimeout(() => {
	                window.location = base_url + "get_kategori";
	            }, 3000);
			} else {
				toastr.error('Kategori gagal di update');
			}
		}
	});
});

$('#example4').on('click', 'a', function(ee) {
	ee.preventDefault();
	var acu = $(this);
	if (acu.is('[href^="#deletesubkategori"]')) {
		var id = $(this).data('id');

		Swal.fire({
		  title: 'Apakah anda yakin ingin menghapus subkategori ini ?',
		  text: "Klik yes!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			  if (result.value) {
			  	$.ajax({
			  		url: base_url + 'ajax/deleteSubKategori',
			  		method: 'POST',
			  		dataType: 'html',
			  		data: {id: id},
			  		success: function(howw) {
			  			if (howw == 'yesdeletesub') {
			  				Swal.fire({
							  position: 'top-end',
							  icon: 'success',
							  title: 'Subkategori berhasil dihapus',
							  showConfirmButton: false,
							  timer: 1500
							});
			  			} else {
			  				Swal.fire({
							  position: 'top-end',
							  icon: 'error',
							  title: 'Subkategori gagal dihapus',
							  showConfirmButton: false,
							  timer: 1500
							});
			  			}
			  		}
			  	});
			  }
			});
	} else if (acu.is('[href^="#editsubkategori"]')) {
		var id = $(this).data('id');
		var nama = $(this).data('nama');
		var title = $(this).data('title');
		var desc = $(this).data('desc');
		var type = $(this).data('type');
		var kateid = $(this).data('kateid');
		var img = $(this).data('img');
		var status = $(this).data('status');

		$('input[name="editsub_id"]').val(id);
		$('input[name="editsub_nama"]').val(nama);
		$('input[name="editsub_title"]').val(title);
		$('textarea[name="editsub_desc"]').val(desc);
		$('select[name="editsub_type"]').val(type);
		$('select[name="editsub_kate_id"]').val(kateid);
		$('#gmbsub').html('<img src="'+ base_url +'assets/img/upload/'+ img +'" style="width: 80px;height:80px;" class="img-fluid">');
		$('select[name="editsub_is_active"]').val(status);

		$('#update-subkategori').modal('show');
	}
});

$('#example5').on('click', 'a', function(c) {
	c.preventDefault();
	var th = $(this);
	if (th.is('[href^="#editpay"]')) {
		var id = $(this).data('id');
		Swal.fire({
		  title: 'Konfirmasi pembayaran ini ?',
		  text: "Klik yes!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Konfirmasi'
		}).then((result) => {
			  if (result.value) {
			  	$.ajax({
			  		url: base_url + 'ajax/editRequestPay',
			  		method: 'POST',
			  		dataType: 'json',
			  		data: {id: id},
			  		success: function(howww) {
			  			if (howww.type == 'yesberhasil') {
			  				Swal.fire({
							  position: 'top-end',
							  icon: 'success',
							  title: howww.pesan,
							  showConfirmButton: false,
							  timer: 1500
							});
			  			} else {
			  				Swal.fire({
							  position: 'top-end',
							  icon: 'error',
							  title: howww.pesan,
							  showConfirmButton: false,
							  timer: 1500
							});
			  			}
			  		}
			  	});
			  }
			});
	}
});

$('#example6').on('click', 'a', function() {
	var doc = $(this);
	if (doc.is('[href^="#editul"]')) {
		var id = $(this).data('id');
		var sku = $(this).data('sku');
		var orderid = $(this).data('orderid');
		var nama = $(this).data('nama');
		var rating = $(this).data('rating');
		var pesan = $(this).data('pesan');
		var gambar = $(this).data('gambar');
		var waktu = $(this).data('waktu');

		$('#gambar_ulasan').attr('src', base_url + 'assets/img/rating/' + gambar);
		$('input[name=id_ulasan]').val(id);
		$('input[name=sku_produk_ulasan]').val(sku);
		$('input[name=order_id_ulasan]').val(orderid);
		$('input[name=nama_ulasan]').val(nama);
		$('input[name=rating_ulasan]').val(rating);
		$('textarea[name=pesan_ulasan]').val(pesan);
		$('input[name=date_ulasan]').val(waktu);
		$('#edit-ulasan').modal('show');
	} else if(doc.is('[href^="#hapusul"]')) {
		var idh = $(this).data('id');
		Swal.fire({
		  title: 'Hapus ulasan ini ?',
		  text: "Klik yes!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Konfirmasi'
		}).then((result) => {
			  if (result.value) {
			  	$.ajax({
			  		url: base_url + 'ajax/hapusUlasan',
			  		method: 'POST',
			  		dataType: 'json',
			  		data: {id: idh},
			  		success: function(ul) {
			  			if (ul.type == 'ok') {
			  				Swal.fire({
							  position: 'top-end',
							  icon: 'success',
							  title: ul.pesan,
							  showConfirmButton: false,
							  timer: 2000
							});
			  			} else {
			  				Swal.fire({
							  position: 'top-end',
							  icon: 'error',
							  title: ul.pesan,
							  showConfirmButton: false,
							  timer: 2000
							});
			  			}
			  		}
			  	});
			  }
			});
	} else {
	    var href = $(this).attr('href');
	    document.location.href = href;
	}
});

});