<script type="text/javascript">
	let anggota, maks_anggota, status_ml, status_pubg;
	const BASE_URL = "<?= base_url($uri_segment) ?>"

	$(() => {

		bsCustomFileInput.init()

		// Select lomba
		fetch(BASE_URL + 'get_lomba_individu')
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
		})

		const daftar_lomba_individu = (form) => {
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
					fetch(BASE_URL + 'daftar_individu', {
						method: 'POST',
						body: formData
					}).then(response => {
						$('#pendaftaran_lomba_individu button[type=submit]').hide();
						$('#pendaftaran_lomba_individu button.loader').show();
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
							html: "Ada masalah saat melakukan pendaftaran! Sepertinya ukuran file kamu terlalu besar. Maks <b>10MB</b>",
						})
					}).finally(() => {
						$('#pendaftaran_lomba_individu button[type=submit]').show();
						$('#pendaftaran_lomba_individu button.loader').hide();
						$('#pendaftaran_lomba_individu').trigger('reset');
						$('#pendaftaran_lomba_individu select').val(null).trigger('change')
						$('#pendaftaran_lomba_individu').removeClass('was-validated')
						$('.wadah_anggota').html('')
						$('#increment').val(null)
						maks_anggota = 0;
						anggota = 0;
					})
				}
			})
		}

		$('#pendaftaran_lomba_individu').submit(function(event) {
			event.preventDefault()
			if (this.checkValidity()) {
				daftar_lomba_individu(this);
			}
		});
	});
</script>