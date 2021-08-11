<div class="wrapper gray-wrapper">
	<div class="container inner">
		<div class="row">
			<div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
				<form id="pendaftaran_lomba_kelompok" class="needs-validation" novalidate>
					<h2 class="section-title text-center">Form Pendaftaran Lomba</h2>
					<div class="wadah_gambar">
						<!-- <img src="<?= base_url(); ?>/assets/images/uiux.jpg" class="img-fluid rounded mx-auto d-block my-3" alt="uiux.jpg"> -->
					</div>
					<p class="lead text-center deskripsi_pendaftaran"></p>
					<div class="space40"></div>

					<div class="form-group">
						<h6>Nama Tim</h6>
						<input type="text" name="nama_tim" class="form-control" required autocomplete="off" placeholder="Masukkan Nama Tim">
						<div class="invalid-feedback text-danger">Please choose a unique and valid nama tim</div>
						<div class="valid-feedback text-success">Looks good</div>
					</div>

					<div class="form-group">
						<h6>Lomba</h6>
						<select class="custom-select form-control lomba" name="id_lomba" required></select>
						<div class="invalid-feedback text-danger">Please choose a unique and valid lomba</div>
						<div class="valid-feedback text-success">Looks good</div>
					</div>

					<div class="form-group">
						<h6>Asal Instansi</h6>
						<input type="text" name="asal_instansi" class="form-control" autocomplete="off" required placeholder="Masukkan Asal Instansi">
						<div class="invalid-feedback text-danger">Please choose a unique and valid asal instansi</div>
						<div class="valid-feedback text-success">Looks good</div>
					</div>

					<hr>

					<!-- ================================================== -->

					<div class="form-group">
						<h6>Nama Lengkap Ketua</h6>
						<input type="text" name="nama_ketua" class="form-control" autocomplete="off" required placeholder="Masukkan Nama Ketua">
						<div class="invalid-feedback text-danger">Please choose a unique and valid nama ketua</div>
						<div class="valid-feedback text-success">Looks good</div>
					</div>

					<div class="form-group">
						<h6>Email Ketua</h6>
						<input type="email" name="email_ketua" class="form-control" autocomplete="off" required placeholder="Masukkan Email Ketua">
						<div class="invalid-feedback text-danger">Please choose a unique and valid email ketua</div>
						<div class="valid-feedback text-success">Looks good</div>
					</div>

					<div class="form-group">
						<h6>No. WhatsApp Ketua</h6>
						<input type="number" name="no_wa_ketua" class="form-control" autocomplete="off" required placeholder="Masukkan No. WhatsApp Ketua">
						<div class="invalid-feedback text-danger">Please choose a unique and valid no whatsapp ketua</div>
						<div class="valid-feedback text-success">Looks good</div>
					</div>

					<!-- <div class="form-group id_ml">
						<h6>ID Mobile Legends</h6>
						<input type="number" name="id_ml" class="form-control" autocomplete="off" required placeholder="Masukkan ID Mobile Legends">
						<div class="invalid-feedback text-danger">Please choose a unique and valid id mobile legends</div>
						<div class="valid-feedback text-success">Looks good</div>
					</div>

					<div class="form-group id_pubg">
						<h6>ID PUBG</h6>
						<input type="number" name="id_pubg" class="form-control" autocomplete="off" required placeholder="Masukkan ID PUBG">
						<div class="invalid-feedback text-danger">Please choose a unique and valid id pubg</div>
						<div class="valid-feedback text-success">Looks good</div>
					</div> -->

					<div class="form-group">
						<h6>Scan Kartu Tanda Mahasiswa / Kartu Pelajar Ketua</h6>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroupFileAddon00">Upload</span>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="scan_kartu_ketua" required id="scan_kartu_ketua" aria-describedby="inputGroupFileAddon00">
								<label class="custom-file-label" for="scan_kartu_ketua">Choose file</label>
								<div class="invalid-tooltip">Please choose a unique and valid scan kartu ketua</div>
								<div class="valid-tooltip">Looks good</div>

							</div>
						</div>
					</div>

					<div class="form-group">
						<h6>Bukti Transfer</h6>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroupFileAddon000">Upload</span>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="bukti_transfer" required id="bukti_transfer" aria-describedby="inputGroupFileAddon000">
								<label class="custom-file-label" for="bukti_transfer">Choose file</label>
								<div class="invalid-tooltip">Please choose a unique and valid bukti transfer ketua</div>
								<div class="valid-tooltip">Looks good</div>
							</div>
						</div>
					</div>

					<div class="form-group unggah_karya">
						<h6>Unggah Karya</h6>
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
					<input type="hidden" name="increment" id="increment">
					<input type="hidden" name="MAX_FILE_SIZE" value="4194304"> <!-- 4 MB -->

					<hr>
					<!-- ================================================== -->

					<button type="button" id="tambah_anggota" class="btn btn-primary">Tambah Anggota</button>
					<button type="button" id="kurangi_anggota" class="btn btn-danger">Kurangi Anggota</button>
					<div class="space30"></div>
					<div class="wadah_anggota"></div>

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