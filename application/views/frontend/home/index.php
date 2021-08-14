<!-- /.wrapper -->
<div class="wrapper white-wrapper">
	<div class="container inner">
		<div class="text-center">
			<img class="mb-5" style="margin-top: -50px;" src="<?php echo base_url(); ?>/assets/images/logo-03.png" width="180px" alt="">
		</div>
		<div class="space10"></div>
		<h3 class="display-3 text-center font-weight-bold" style="font-size: 40px; color:#9d5845;">Vocation <br class="d-none d-lg-block" />Of The Champions</h3>
		<div class="space30"></div>
		<div class="row gutter-60 text-center align-items-end">
			<div class="col-md-12">
				<center>
					<p class="text-center" style="font-size: 20px; color:#9d5845; width: 75%">VOC singkatan dari <b>Vocation Of The Champions.</b> Dimana VOC ini merupakan
						perlombaan untuk mahasiswa/i Vokasi Se-Indonesia dengan berbagai cabang
						lomba, diantaranya Seni, Olahraga dan Penalaran.
					</p>
				</center>
				<div class="space20"></div>
				<div class="pembatas">
					<div class="gambar">
						<img src="<?php echo base_url(); ?>/assets/images/logo-03.png" width="25px" alt="">
					</div>
				</div>
				<div class="space30"></div>
				<h4 class="text-center" style="font-weight: medium; font-size: 25px; color:#9d5845;">"Glory In Diversity"</h4>
				<center>
					<p class="text-center" style="font-size: 20px; color:#9d5845; width: 75%;">Merupakan tema yang diusung pada VOC 2021. Memiliki maksud menunjukan bahwa
						perbedaan bukanlah halangan untuk bersatu menuju kejayaan Indonesia. Serta
						dengan acara VOC 2021 ini dapat menunjukan bahwa pendidikan vokasi juga bisa
						memberikan andil yang besar untuk kemajuan Indonesia.</p>
				</center>
			</div>
		</div>
	</div>
	<!-- /.container -->
</div>

<!-- /.wrapper -->
<div class="wrapper image-wrapper bg-image" data-image-src="<?php echo base_url(); ?>/assets/images/bg-1.jpeg">
	<div class="container inner pb-140">
		<center>
			<img style="margin-top: -100px;" src="<?php echo base_url(); ?>/assets/images/logo-03.png" width="25px" alt="">
		</center>
		<p class="text-center text-white" style="margin-top: -40px; font-weight: normal;">Daftar Lomba</p>
		<div class="garis">
			<h3 class="display-3 text-center text-white font-weight-bold" style="font-size: 40px;">VOC 2021</h3>
		</div>
		<div class="space60"></div>
		<div class="grid-view">
			<div class="carousel owl-carousel" data-loop="true" data-margin="30" data-dots="true" data-autoplay="true" data-autoplay-timeout="3000" data-responsive='{"0":{"items": "1"}, "768":{"items": "2"}, "992":{"items": "3"}}'>
				<?php foreach ($lomba as $item) : ?>
					<div class="item">
						<div class="card">
							<div class="card-header teksgambar">
								<img src="./uploads/lomba/<?= $item->gambar_thumb ?>" class="card-img-top img-thumbnail" alt="<?= $item->nama_lomba ?>">
							</div>
							<div class="card-body">
								<h5 class="card-title text-dark text-center font-weight-bold"><?= $item->nama_lomba ?></h5>
								<p class="card-text text-dark text-center"><?= $item->deskripsi ?></p>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
			<!-- /.owl-carousel -->
		</div>
	</div>
	<!-- /.container -->
</div>


<!-- /.wrapper -->
<div class="wrapper white-wrapper">
	<div class="container inner">
		<div class="text-center">
			<h2 style="font-size: 25px;" class="color-gray text-center">Sponsor</h2>
		</div>
		<div class="space80"></div>
		<div class="carousel owl-carousel clients" data-margin="30" data-loop="true" data-dots="false" data-autoplay="true" data-autoplay-timeout="3000" data-responsive='{"0":{"items": "2"}, "768":{"items": "3"}, "992":{"items": "4"}, "1140":{"items": "5"}}'>
			<div class="item pl-15 pr-15"><img src="<?= base_url() ?>assets/snowlake/images/art/z1.svg" alt="" /></div>
			<div class="item pl-15 pr-15"><img src="<?= base_url() ?>assets/snowlake/images/art/z2.svg" alt="" /></div>
			<div class="item pl-15 pr-15"><img src="<?= base_url() ?>assets/snowlake/images/art/z3.svg" alt="" /></div>
			<div class="item pl-15 pr-15"><img src="<?= base_url() ?>assets/snowlake/images/art/z4.svg" alt="" /></div>
			<div class="item pl-15 pr-15"><img src="<?= base_url() ?>assets/snowlake/images/art/z5.svg" alt="" /></div>
			<div class="item pl-15 pr-15"><img src="<?= base_url() ?>assets/snowlake/images/art/z6.svg" alt="" /></div>
			<div class="item pl-15 pr-15"><img src="<?= base_url() ?>assets/snowlake/images/art/z7.svg" alt="" /></div>
			<div class="item pl-15 pr-15"><img src="<?= base_url() ?>assets/snowlake/images/art/z8.svg" alt="" /></div>
		</div>
		<!-- /.owl-carousel -->
	</div>
	<!-- /.container -->
</div>