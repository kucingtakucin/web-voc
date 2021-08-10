$(document).ready(function() {
	$('#namaketua').on('input', function () {
		var firstName = $(this).val();
		var validName = /^[a-zA-Z ]*$/;
		if (firstName.length == 0) {
			$('.msg-err-namaketua').addClass('invalid-msg').text("Harap diisi!!");
			$(this).addClass('is-invalid').removeClass('is-valid');
			
		}
		else if (!validName.test(firstName)) {
			$('.msg-err-namaketua').addClass('invalid-msg').text('hanya karakter dan spasi');
			$(this).addClass('is-invalid').removeClass('is-valid');
			
		}
		else {
			$('.msg-err-namaketua').empty();
			$(this).addClass('is-valid').removeClass('is-invalid');
		}
	});
	$('#emailketua').on('input', function () {
		var emailAddress = $(this).val();
		var validEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if (emailAddress.length == 0) {
			$('.msg-err-emailketua').addClass('invalid-msg').text('Email wajib diisi');
			$(this).addClass('is-invalid').removeClass('is-valid');
		}
		else if (!validEmail.test(emailAddress)) {
			$('.msg-err-emailketua').addClass('invalid-msg').text('Alamat email tidak valid');
			$(this).addClass('is-invalid').removeClass('is-valid');
		}
		else {
			$('.msg-err-emailketua').empty();
			$(this).addClass('is-valid').removeClass('is-invalid');
		}
	});
	$('#nomorketua').on('input', function () {
		var nomorKetua = $(this).val();
		var rules = /^[0-9]*$/;
		if (nomorKetua.length == 0) {
			$('.msg-err-nomorketua').addClass('invalid-msg').text("Harap diisi!!");
			$(this).addClass('is-invalid').removeClass('is-valid');
			
		}
		else if (!rules.test(nomorKetua)) {
			$('.msg-err-nomorketua').addClass('invalid-msg').text('hanya angka');
			$(this).addClass('is-invalid').removeClass('is-valid');
			
		}
		else if (nomorKetua.length > 13)
		{
			$('.msg-err-nomorketua').addClass('invalid-msg').text("Nomor harus kurang dari 13 digit");
			$(this).addClass('is-invalid').removeClass('is-valid');
		}
		else {
			$('.msg-err-nomorketua').empty();
			$(this).addClass('is-valid').removeClass('is-invalid');
		}
	});
	$('#anggota1').on('input', function () {
		var anggota1 = $(this).val();
		var rules = /^[a-zA-Z ]*$/;
		if (anggota1.length == 0) {
			$('.msg-err-anggota1').addClass('invalid-msg').text("Harap diisi!!");
			$(this).addClass('is-invalid').removeClass('is-valid');
			
		}
		else if (!rules.test(anggota1)) {
			$('.msg-err-anggota1').addClass('invalid-msg').text('hanya karakter dan spasi');
			$(this).addClass('is-invalid').removeClass('is-valid');
			
		}
		else {
			$('.msg-err-anggota1').empty();
			$(this).addClass('is-valid').removeClass('is-invalid');
		}
	});
	$('#anggota2').on('input', function () {
		var anggota2 = $(this).val();
		var rules = /^[a-zA-Z ]*$/;
		if (!rules.test(anggota2)) {
			$('.msg-err-anggota2').addClass('invalid-msg').text('hanya karakter dan spasi');
			$(this).addClass('is-invalid').removeClass('is-valid');
			
		} else {
			$('.msg-err-anggota2').empty();
			$(this).addClass('is-valid').removeClass('is-invalid');
		}
	});
	$('#instansi').on('input', function () {
		var instansi = $(this).val();
		if (instansi.length == 0) {
			$('.msg-err-instansi').addClass('invalid-msg').text("Harap diisi!!");
			$(this).addClass('is-invalid').removeClass('is-valid');
		}
		else {
			$('.msg-err-instansi').empty();
			$(this).addClass('is-valid').removeClass('is-invalid');
		}
	});
	$('#namatim').on('input', function () {
		var namatim = $(this).val();
		if (namatim.length == 0) {
			$('.msg-err-namatim').addClass('invalid-msg').text("Harap diisi!!");
			$(this).addClass('is-invalid').removeClass('is-valid');
			
		}
		else {
			$('.msg-err-namatim').empty();
			$(this).addClass('is-valid').removeClass('is-invalid');
		}
	});
	$('#judulkarya').on('input', function () {
		var judulkarya = $(this).val();
		if (judulkarya.length == 0) {
			$('.msg-err-judulkarya').addClass('invalid-msg').text("Harap diisi!!");
			$(this).addClass('is-invalid').removeClass('is-valid');
			
		}
		else {
			$('.msg-err-judulkarya').empty();
			$(this).addClass('is-valid').removeClass('is-invalid');
		}
	});
	$('#uploadkarya').on('input', function() {
		var uploadkarya = $(this).val();
		if (uploadkarya == "") {
			$('.msg-err-uploadkarya').addClass('invalid-msg').text("Silahkan upload file!!");
			$(this).addClass('is-invalid').removeClass('is-valid');
		} else {
			$('.msg-err-judulkarya').empty();
			$(this).addClass('is-valid').removeClass('is-invalid');
		}
	});
	$('#buktibayar').on('input', function() {
		var buktibayar = $(this).val();
		if (buktibayar == "") {
			$('.msg-err-buktibayar').addClass('invalid-msg').text("Silahkan upload file!!");
			$(this).addClass('is-invalid').removeClass('is-valid');
		} else {
			$('.msg-err-buktibayar').empty();
			$(this).addClass('is-valid').removeClass('is-invalid');
		}
	});
	$('#kartuidentitas').on('input', function() {
		var kartuidentitas = $(this).val();
		if (kartuidentitas == "") {
			$('.msg-err-kartuidentitas').addClass('invalid-msg').text("Silahkan upload file!!");
			$(this).addClass('is-invalid').removeClass('is-valid');
		} else {
			$('.msg-err-kartuidentitas').empty();
			$(this).addClass('is-valid').removeClass('is-invalid');
		}
	});
	$('#ssvoc').on('input', function() {
		var ssvoc = $(this).val();
		if (ssvoc == "") {
			$('.msg-err-ssvoc').addClass('invalid-msg').text("Silahkan upload file!!");
			$(this).addClass('is-invalid').removeClass('is-valid');
		} else {
			$('.msg-err-ssvoc').empty();
			$(this).addClass('is-valid').removeClass('is-invalid');
		}
	});
	$('input').on('input',function(e){
		if($('#form').find('.is-valid').length==11){
			$('#submit-btn').removeAttr('disabled');
		}
		else {
			e.preventDefault();
			$('#submit-btn').attr('disabled');
		}
	});	
});
