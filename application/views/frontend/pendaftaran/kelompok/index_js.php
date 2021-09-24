<script type="text/javascript">
	let anggota, maks_anggota, status_ml, status_pubg;
	const BASE_URL = "<?= base_url($uri_segment) ?>"

	$(() => {
		<?php if ($is_mobile) : ?>
			Swal.fire({
				icon: 'info',
				title: 'Perhatian',
				text: 'Disarankan untuk menggunakan akses desktop',
				timer: false,
				showConfirmButton: true,
			})
		<?php endif; ?>

		bsCustomFileInput.init()

		// Select lomba
		fetch(BASE_URL + 'get_lomba_kelompok')
			.then(response => {
				if (response.ok) {
					return response.json()
				}
				throw new Error(response.statusText)
			})
			.then(response => {
				let html = '<option></option>'
				response.data.map(item => {
					html += `
						<option value="${item.id}" 
							data-opening="${item.opening}" 
							data-closing="${item.closing}"
							data-maks_anggota="${item.maks_anggota}"
						>${item.nama_lomba}</option>
					`
				})
				$('select.lomba').html(html)
			})
			.catch(error => {
				console.error(error);
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Something went wrong!',
					showConfirmButton: false,
					timer: 1500
				})
			})

		maks_anggota = 0
		anggota = 0;
		status_pubg = false
		status_ml = false
		$('select.lomba').change(function(event) {
			if (Date.now() < Date.parse($(this).find(':selected').data('opening'))) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Maaf, lomba ini belum membuka pendaftaran!',
					showConfirmButton: false,
					timer: 1500
				})
				$(this).val(null).change()
			}
			if (Date.now() > Date.parse($(this).find(':selected').data('closing'))) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Maaf, pendaftaran untuk lomba ini sudah ditutup!',
					showConfirmButton: false,
					timer: 1500
				})
				$(this).val(null).change()
			}

			if ($(this).val() == '1' || $(this).val() == '2' || $(this).val() == '4' || $(this).val() == '7' || $(this).val() == '8' || $(this).val() == '9') {
				$('#unggah_karya_kelompok').html('Unggah Berkas Pendaftaran')
			} else {
				$('#unggah_karya_kelompok').html('Unggah Karya dan Berkas Pendaftaran')
			}

			if ($(this).val() == '1' || $(this).val() == '2') {
				if ($(this).val() == '1') {
					status_pubg = true
					status_ml = false
					$('.id_pubg_ketua').fadeIn(750)
					$('#id_pubg_ketua').prop('required', true)
					$('.id_ml_ketua').fadeOut(750)
					$('#id_ml_ketua').prop('required', false)
				}
				if ($(this).val() == '2') {
					status_ml = true
					status_pubg = false
					$('.id_ml_ketua').fadeIn(750)
					$('#id_ml_ketua').prop('required', true)
					$('.id_pubg_ketua').fadeOut(750)
					$('#id_pubg_ketua').prop('required', false)
				}
			} else {
				status_ml = false
				status_pubg = false
				$('.id_ml_ketua').fadeOut(750)
				$('#id_ml_ketua').prop('required', false)
				$('.id_pubg_ketua').fadeOut(750)
				$('#id_pubg_ketua').prop('required', false)
			}

			if ($(this).find(':selected').data('maks_anggota')) {
				maks_anggota = parseInt($(this).find(':selected').data('maks_anggota'))
			} else {
				maks_anggota = 0
			}
			anggota = 0;
			$('#increment').val(null)
			$('.wadah_anggota').html('')
		})

		$('#tambah_anggota').click(function() {
			if (!$('select.lomba').val()) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Maaf, pilih lomba terlebih dahulu!',
					showConfirmButton: false,
					timer: 1500
				})
				return;
			}

			anggota++;
			if (anggota > maks_anggota) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: `Maaf, maksimal anggota untuk lomba ini adalah ${maks_anggota} orang!`,
					showConfirmButton: false,
					timer: 1500
				})
				anggota--;
				return;
			}

			let html = `
				<div id="anggota_ke${anggota}" style="display: none;">
					<div class="form-group">
						<h6>Nama Lengkap Anggota ${anggota}</h6>
						<input type="text" name="nama_anggota_${anggota}" autocomplete="off" class="form-control" required placeholder="Masukkan Nama Anggota ${anggota}">
						<div class="invalid-feedback text-danger">Please choose a unique and valid nama anggota ${anggota}</div>
						<div class="valid-feedback text-success">Looks good</div>
					</div>

					<div class="form-group">
						<h6>Email Anggota ${anggota}</h6>
						<input type="email" name="email_anggota_${anggota}" autocomplete="off" class="form-control" required placeholder="Masukkan Email Anggota ${anggota}">
						<div class="invalid-feedback text-danger">Please choose a unique and valid nama anggota ${anggota}</div>
						<div class="valid-feedback text-success">Looks good</div>
					</div>

					<div class="form-group">
						<h6>No. WhatsApp Anggota ${anggota}</h6>
						<input type="number" min="0" name="no_wa_anggota_${anggota}" autocomplete="off" class="form-control" required placeholder="Masukkan No. WhatsApp Anggota ${anggota}">
						<div class="invalid-feedback text-danger">Please choose a unique and valid no whatsapp anggota ${anggota}</div>
						<div class="valid-feedback text-success">Looks good</div>
					</div>`

			if (status_ml) {
				html += `
				<div class="form-group id_ml_anggota_${anggota}">
					<h6>ID Mobile Legends Anggota ${anggota}</h6>
					<input type="number" min="0" name="id_ml_anggota_${anggota}" id="id_ml_anggota_${anggota}" class="form-control" required autocomplete="off" placeholder="Masukkan ID Mobile Legends Anggota ${anggota}">
					<div class="invalid-feedback text-danger">Please choose a unique and valid id mobile legends</div>
					<div class="valid-feedback text-success">Looks good</div>
				</div>
			`
			}

			if (status_pubg) {
				html += `
				<div class="form-group id_pubg_anggota_${anggota}">
					<h6>ID PUBG Anggota ${anggota}</h6>
					<input type="number" min="0" name="id_pubg_anggota_${anggota}" id="id_pubg_anggota_${anggota}" class="form-control" required autocomplete="off" placeholder="Masukkan ID PUBG Anggota ${anggota}">
					<div class="invalid-feedback text-danger">Please choose a unique and valid id pubg</div>
					<div class="valid-feedback text-success">Looks good</div>
				</div>
			`
			}

			html += `<div class="form-group">
					<h6>Scan Kartu Tanda Mahasiswa / Kartu Pelajar Anggota ${anggota}</h6>
					<small class="text-danger m-0">Max size <b>10MB</b>. JPG, JPEG, PNG, PDF, ZIP, RAR.</small>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input" required name="scan_kartu_anggota_${anggota}" id="scan_kartu_anggota_${anggota}" aria-describedby="inputGroupFileAddon01">
								<label class="custom-file-label" for="scan_kartu_anggota_${anggota}">Choose file</label>
								<div class="invalid-tooltip">Please choose a unique and valid scan kartu anggota ${anggota}</div>
								<div class="valid-tooltip">Looks good</div>
							</div>
						</div>
					</div>

					<hr>
				</div>
				`
			$(html).appendTo('.wadah_anggota').fadeIn(1000)
			bsCustomFileInput.destroy()
			bsCustomFileInput.init()
			$('#increment').val(anggota)
		})

		$('#kurangi_anggota').click(function() {
			if (!$('select.lomba').val()) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Maaf, pilih lomba terlebih dahulu!',
					showConfirmButton: false,
					timer: 1500
				})
				return;
			}

			$(`.wadah_anggota #anggota_ke${anggota}`).fadeOut(1000, function() {
				$(this).remove()
			})
			anggota--;
			if (anggota <= 0) {
				anggota = 0;
			}
			$('#increment').val(anggota)
		})

		const daftar_lomba_kelompok = (form) => {
			if (!grecaptcha.getResponse()) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					html: "Recaptcha wajib dicentang!",
				})
				return;
			}

			Swal.fire({
				title: 'Apakah kamu yakin untuk mendaftar?',
				text: "Pastikan data yang terisi sudah benar!",
				icon: 'warning',
				showCancelButton: true,
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya!'
			}).then((result) => {
				if (result.isConfirmed) {
					Swal.fire({
						title: 'Loading...',
						allowEscapeKey: false,
						allowOutsideClick: false,
						didOpen: () => {
							Swal.showLoading();
						}
					})

					let formData = new FormData(form);
					fetch(BASE_URL + 'daftar_kelompok', {
						method: 'POST',
						body: formData
					}).then(response => {
						$('#pendaftaran_lomba_kelompok button[type=submit]').hide();
						$('#pendaftaran_lomba_kelompok button.loader').show();
						if (response.ok) return response.json()
						throw new Error(response.statusText)
					}).then(response => {
						if (response.status) {
							Swal.fire({
								icon: 'success',
								title: 'Success!',
								text: response.message,
							})
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								html: response.message,
							})
						}
					}).catch(error => {
						console.log(error);
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							html: "Ada masalah saat melakukan pendaftaran. Silakan coba lagi.",
						})
					}).finally(() => {
						$('#pendaftaran_lomba_kelompok button[type=submit]').show();
						$('#pendaftaran_lomba_kelompok button.loader').hide();
						$('#pendaftaran_lomba_kelompok').trigger('reset');
						$('#pendaftaran_lomba_kelompok select').val(null).trigger('change')
						$('#pendaftaran_lomba_kelompok').removeClass('was-validated')
						$('.wadah_anggota').html('')
						$('#increment').val(null)
						maks_anggota = 0;
						anggota = 0;
					})
				}
			})
		}

		$('#pendaftaran_lomba_kelompok').submit(function(event) {
			event.preventDefault()
			if (anggota == 0) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Silakan tambah anggota terlebih dahulu!',
					showConfirmButton: false,
					timer: 1500
				})
				return;
			}
			if (this.checkValidity()) {
				daftar_lomba_kelompok(this);
			}
		});
	});
</script>