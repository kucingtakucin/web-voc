<div class="wrapper gray-wrapper">
	<div class="container inner">
		<div class="row">
			<div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
				<h2 class="section-title text-center">Supported Controls</h2>
				<p class="lead text-center">Examples of standard form controls supported in an example form layout.</p>
				<div class="space40"></div>
				<h6>Input</h6>
				<input type="text" class="form-control" placeholder="Text input">
				<div class="space30"></div>
				<h6>Textarea</h6>
				<textarea class="form-control" rows="3" placeholder="Textarea"></textarea>
				<div class="space30"></div>
				<h6>Checkboxes</h6>
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="customCheck5">
					<label class="custom-control-label" for="customCheck5">Check this custom checkbox</label>
				</div>
				<div class="space30"></div>
				<h6>Radios</h6>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
					<label class="custom-control-label" for="customRadioInline1">Toggle this custom radio</label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
					<label class="custom-control-label" for="customRadioInline2">Or toggle this other custom radio</label>
				</div>
				<div class="space30"></div>
				<h6>Disabled</h6>
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="customCheckDisabled" disabled>
					<label class="custom-control-label" for="customCheckDisabled">Check this custom checkbox</label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" name="radioDisabled" id="customRadioDisabled" class="custom-control-input" disabled>
					<label class="custom-control-label" for="customRadioDisabled">Toggle this custom radio</label>
				</div>
				<div class="space30"></div>
				<h6>Stacked</h6>
				<div class="custom-control custom-radio">
					<input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
					<label class="custom-control-label" for="customRadio1">Toggle this custom radio</label>
				</div>
				<div class="custom-control custom-radio">
					<input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
					<label class="custom-control-label" for="customRadio2">Or toggle this other custom radio</label>
				</div>
				<div class="space30"></div>
				<h6>Select</h6>
				<div class="form-group custom-select-wrapper">
					<select class="custom-select">
						<option selected>Open this select menu</option>
						<option value="1">One</option>
						<option value="2">Two</option>
						<option value="3">Three</option>
					</select>
				</div>
			</div>
			<!-- /column -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
</div>
<div class="wrapper white-wrapper" style="display: none;">
	<img src="<?= base_url(); ?>/assets/images/uiux.jpg" class="img-fluid rounded mx-auto d-block my-3" alt="uiux.jpg" style="width: 70%; padding-top: 50px;">
	<div class="jumbotron jumbotron-fluid mx-5">
		<div class="container">
			<h1 class="display-4 text-center">Pendaftaran Lomba UI/UX VOC 2021</h1>
			<div class="bg-light rounded-lg" style="padding: 20px;">
				<p>
					Biaya Pendaftaran Rp. 80.000,- per team. <br>
					Biaya Pendaftaran dapat ditransfer ke rekening BNI (1134128079 - Rizquna), BCA (2380914215 - Rizquna), Mandiri (1850000496072 - Exca). <br> <br>
					Setelah peserta melakukan pendaftaran dan pengumpulan karya di google form yang telah disediakan maka peserta wajib mengirim pesan konfirmasi kepada Mafa (0895377205773) dihari yang sama. Disertai dengan bukti pembayaran.
				</p>
				<hr>
				<form id="form">
					<div class="form-group">
						<label>Nama Lengkap</label>
						<input type="ketua" class="form-control" id="namaketua">
						<div class="msg-err-namaketua"></div>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="ketua" class="form-control" id="emailketua">
						<div class="msg-err-emailketua"></div>
					</div>
					<div class="form-group">
						<label>No Hp</label>
						<input type="ketua" class="form-control" id="nomorketua">
						<div class="msg-err-nomorketua"></div>
					</div>
					<div class="form-group">
						<label>Asal Instansi</label>
						<input type="ketua" class="form-control" id="instansi">
						<div class="msg-err-instansi"></div>
					</div>
					<div class="form-group">
						<label>Scan KTM/KTP/NISN</label>
						<input type="file" class="form-control " id="scan">
						<div class="msg-err-scan"></div>
					</div>
					<div class="form-group">
						<label>Bukti Transfer</label>
						<input type="file" class="form-control " id="tf">
						<div class="msg-err-tf"></div>
					</div>
					<div class="form-group">
						<label>Detail Kelengkapan</label>
						<input type="file" class="form-control " id="kelengkapan">
						<div class="msg-err-kelengkapan"></div>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-primary btn-lg" id="submit-btn" disabled>Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- /.container -->
</div>