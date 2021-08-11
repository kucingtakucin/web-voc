<script type="text/javascript">
	$(document).ready(function() {
		$('#namatim').on('input', function() {
			var firstName = $(this).val();
			var validName = /^[a-zA-Z ]*$/;
			if (firstName.length == 0) {
				$('.msg-err-namatim').addClass('invalid-msg').text("Harap diisi!!");
				$(this).addClass('is-invalid').removeClass('is-valid');

			} else if (!validName.test(firstName)) {
				$('.msg-err-namatim').addClass('invalid-msg').text('hanya karakter dan spasi');
				$(this).addClass('is-invalid').removeClass('is-valid');

			} else {
				$('.msg-err-namatim').empty();
				$(this).addClass('is-valid').removeClass('is-invalid');
			}
		});
		$('#namaketua').on('input', function() {
			var firstName = $(this).val();
			var validName = /^[a-zA-Z ]*$/;
			if (firstName.length == 0) {
				$('.msg-err-namaketua').addClass('invalid-msg').text("Harap diisi!!");
				$(this).addClass('is-invalid').removeClass('is-valid');

			} else if (!validName.test(firstName)) {
				$('.msg-err-namaketua').addClass('invalid-msg').text('hanya karakter dan spasi');
				$(this).addClass('is-invalid').removeClass('is-valid');

			} else {
				$('.msg-err-namaketua').empty();
				$(this).addClass('is-valid').removeClass('is-invalid');
			}
		});
		$('#email').on('input', function() {
			var emailAddress = $(this).val();
			var validEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			if (emailAddress.length == 0) {
				$('.msg-err-emailketua').addClass('invalid-msg').text('Email wajib diisi');
				$(this).addClass('is-invalid').removeClass('is-valid');
			} else if (!validEmail.test(emailAddress)) {
				$('.msg-err-emailketua').addClass('invalid-msg').text('Alamat email tidak valid');
				$(this).addClass('is-invalid').removeClass('is-valid');
			} else {
				$('.msg-err-emailketua').empty();
				$(this).addClass('is-valid').removeClass('is-invalid');
			}
		});
		$('#nomorketua').on('input', function() {
			var nomorKetua = $(this).val();
			var rules = /^[0-9]*$/;
			if (nomorKetua.length == 0) {
				$('.msg-err-nomorketua').addClass('invalid-msg').text("Harap diisi!!");
				$(this).addClass('is-invalid').removeClass('is-valid');

			} else if (!rules.test(nomorKetua)) {
				$('.msg-err-nomorketua').addClass('invalid-msg').text('hanya angka');
				$(this).addClass('is-invalid').removeClass('is-valid');

			} else if (nomorKetua.length > 13) {
				$('.msg-err-nomorketua').addClass('invalid-msg').text("Nomor harus kurang dari 13 digit");
				$(this).addClass('is-invalid').removeClass('is-valid');
			} else {
				$('.msg-err-nomorketua').empty();
				$(this).addClass('is-valid').removeClass('is-invalid');
			}
		});
		$('#idketua').on('input', function() {
			var nomorKetua = $(this).val();
			var rules = /^[0-9]*$/;
			if (nomorKetua.length == 0) {
				$('.msg-err-idketua').addClass('invalid-msg').text("Harap diisi!!");
				$(this).addClass('is-invalid').removeClass('is-valid');

			} else if (!rules.test(nomorKetua)) {
				$('.msg-err-idketua').addClass('invalid-msg').text('hanya angka');
				$(this).addClass('is-invalid').removeClass('is-valid');

			} else if (nomorKetua.length > 13) {
				$('.msg-err-idketua').addClass('invalid-msg').text("Nomor harus kurang dari 15 digit");
				$(this).addClass('is-invalid').removeClass('is-valid');
			} else {
				$('.msg-err-idketua').empty();
				$(this).addClass('is-valid').removeClass('is-invalid');
			}
		});
		$('#instansi').on('input', function() {
			var instansi = $(this).val();
			var rules = /^[a-zA-Z ]*$/;
			if (instansi.length == 0) {
				$('.msg-err-instansi').addClass('invalid-msg').text("Harap diisi!!");
				$(this).addClass('is-invalid').removeClass('is-valid');
			} else if (!rules.test(instansi)) {
				$('.msg-err-instansi').addClass('invalid-msg').text('hanya karakter dan spasi');
				$(this).addClass('is-invalid').removeClass('is-valid');

			} else {
				$('.msg-err-instansi').empty();
				$(this).addClass('is-valid').removeClass('is-invalid');
			}
		});
		$('input').on('input', function(e) {
			if ($('#form').find('.is-valid').length == 5) {
				$('#submit-btn').removeAttr('disabled');
			} else {
				e.preventDefault();
				$('#submit-btn').attr('disabled');
			}
		});
	});
</script>
