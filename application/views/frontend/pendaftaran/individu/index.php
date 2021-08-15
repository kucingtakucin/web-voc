<div class="wrapper gray-wrapper">
	<div class="container inner">
		<div class="row">
			<div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
				<form id="pendaftaran_lomba_individu" class="needs-validation" novalidate>
					<h2 class="section-title text-center">Form Pendaftaran Lomba</h2>
					<div class="space40"></div>

					<!-- ================================================== -->

					<div class="form-group">
						<h6>Nama Lengkap</h6>
						<input type="text" name="nama" class="form-control" autocomplete="off" required placeholder="Masukkan Nama">
						<div class="invalid-feedback text-danger">Please choose a unique and valid nama</div>
						<div class="valid-feedback text-success">Looks good</div>
					</div>

					<div class="form-group">
						<h6>Email</h6>
						<input type="email" name="email" class="form-control" autocomplete="off" required placeholder="Masukkan Email">
						<div class="invalid-feedback text-danger">Please choose a unique and valid email</div>
						<div class="valid-feedback text-success">Looks good</div>
					</div>

					<div class="form-group">
						<h6>No. WhatsApp</h6>
						<input type="number" min="0" name="no_wa" class="form-control" autocomplete="off" required placeholder="Masukkan No. WhatsApp">
						<div class="invalid-feedback text-danger">Please choose a unique and valid no whatsapp</div>
						<div class="valid-feedback text-success">Looks good</div>
					</div>

					<div class="form-group">
						<h6>Asal Instansi</h6>
						<input type="text" name="asal_instansi" class="form-control" autocomplete="off" required placeholder="Masukkan Asal Instansi">
						<div class="invalid-feedback text-danger">Please choose a unique and valid asal instansi</div>
						<div class="valid-feedback text-success">Looks good</div>
					</div>

					<div class="form-group">
						<h6>Lomba</h6>
						<select class="custom-select form-control lomba" name="id_lomba" required></select>
						<div class="invalid-feedback text-danger">Please choose a unique and valid lomba</div>
						<div class="valid-feedback text-success">Looks good</div>
					</div>

					<div class="form-group">
						<h6>Scan Kartu Tanda Mahasiswa / Kartu Pelajar</h6>
						<small class="text-danger m-0">Max size <b>10MB</b>. JPG, JPEG, PNG, PDF, ZIP, RAR.</small>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroupFileAddon00">Upload</span>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="scan_kartu" required id="scan_kartu" aria-describedby="inputGroupFileAddon00">
								<label class="custom-file-label" for="scan_kartu">Choose file</label>
								<div class="invalid-tooltip">Please choose a unique and valid scan kartu</div>
								<div class="valid-tooltip">Looks good</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<h6>Bukti Transfer</h6>
						<small class="text-danger m-0">Max size <b>10MB</b>. JPG, JPEG, PNG, PDF, ZIP, RAR.</small>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroupFileAddon000">Upload</span>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="bukti_transfer" required id="bukti_transfer" aria-describedby="inputGroupFileAddon000">
								<label class="custom-file-label" for="bukti_transfer">Choose file</label>
								<div class="invalid-tooltip">Please choose a unique and valid bukti transfer</div>
								<div class="valid-tooltip">Looks good</div>
							</div>
						</div>
					</div>

					<div class="form-group unggah_karya">
						<h6 id="unggah_karya_individu">Unggah Karya dan Berkas Pendaftaran</h6>
						<small class="text-danger m-0">Max size <b>10MB</b>. JPG, JPEG, PNG, PDF, ZIP, RAR.</small>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroupFileAddon0000">Upload</span>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="unggah_karya" required id="unggah_karya" aria-describedby="inputGroupFileAddon0000">
								<label class="custom-file-label" for="unggah_karya">Choose file</label>
								<div class="invalid-tooltip">Please choose a unique and valid bukti unggah karya</div>
								<div class="valid-tooltip">Looks good</div>
							</div>
						</div>
					</div>
					<input type="hidden" name="MAX_FILE_SIZE" value="<?= (1024 * 1000 * 10) ?>"> <!-- 10 MB -->
					<div class="form-group">
						<div class="g-recaptcha" data-sitekey="6Le8qtUbAAAAAPrJIr8Tw-hy-9rqgTZw3x7PD1VU"></div>
						<div class="invalid-feedback text-danger">recaptcha required</div>
						<div class="valid-feedback text-success">Looks good</div>
					</div>
					<!-- ================================================== -->
					<section class="d-flex flex-row justify-content-end align-items-center">
						<button class="btn btn-info" type="submit">Daftar Lomba Sekarang</button>
						<button class="btn btn-primary loader" type="button" disabled style="display: none;">
							<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
							Loading...
						</button>
					</section>
				</form>
			</div>
			<!-- /column -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
</div>