<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="VOC adalah singkatan dari Vocation Of The Champions. Dimana VOC ini merupakan
						perlombaan untuk mahasiswa/i Vokasi dan siswa/i SMA/SMK/sederajat Se-Indonesia dengan berbagai cabang
						lomba, diantaranya Seni, Olahraga dan Penalaran.">
    <meta name="keywords" content="voc, vokasi, universitas, sma, smk, siswa, siswi, mahasiswa, mahasiswi">
    <meta name="author" content="Admin VOC">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/images/logo-03.png">
    <title><?= sistem()->nama ?> | <?= $title ?></title>
    <!-- Google re-Captcha  -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://appt.demoo.id/tema/cuba/html/assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="https://appt.demoo.id/tema/cuba/html/assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="https://appt.demoo.id/tema/cuba/html/assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="https://appt.demoo.id/tema/cuba/html/assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="https://appt.demoo.id/tema/cuba/html/assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="https://appt.demoo.id/tema/cuba/html/assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="https://appt.demoo.id/tema/cuba/html/assets/css/style.css">
    <link id="color" rel="stylesheet" href="https://appt.demoo.id/tema/cuba/html/assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="https://appt.demoo.id/tema/cuba/html/assets/css/responsive.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
</head>

<body>
    <div class="preloader-container">
        <svg class="preloader" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340">
            <circle cx="170" cy="170" r="160" stroke="#E2007C" />
            <circle cx="170" cy="170" r="135" stroke="#404041" />
            <circle cx="170" cy="170" r="110" stroke="#E2007C" />
            <circle cx="170" cy="170" r="85" stroke="#404041" />
        </svg>
    </div>
    <!-- login page start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7"><img class="bg-img-cover bg-center" src="<?= base_url() ?>/assets/images/bg.jpeg" alt="loginpage">
            </div>
            <div class="col-xl-5 p-0">
                <?php $this->load->view($page) ?>
            </div>
        </div>
        <!-- latest jquery-->
        <script src="https://appt.demoo.id/tema/cuba/html/assets/js/jquery-3.5.1.min.js"></script>
        <!-- Bootstrap js-->
        <script src="https://appt.demoo.id/tema/cuba/html/assets/js/bootstrap/popper.min.js"></script>
        <script src="https://appt.demoo.id/tema/cuba/html/assets/js/bootstrap/bootstrap.js"></script>
        <!-- feather icon js-->
        <script src="https://appt.demoo.id/tema/cuba/html/assets/js/icons/feather-icon/feather.min.js"></script>
        <script src="https://appt.demoo.id/tema/cuba/html/assets/js/icons/feather-icon/feather-icon.js"></script>
        <!-- Sidebar jquery-->
        <script src="https://appt.demoo.id/tema/cuba/html/assets/js/config.js"></script>
        <!-- Plugins JS start-->
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="https://appt.demoo.id/tema/cuba/html/assets/js/form-validation-custom.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://appt.demoo.id/tema/cuba/html/assets/js/script.js"></script>
        <!-- login js-->
        <script>
            $(document).ready(function() {
                $('.preloader-container').fadeOut(1000)

                let width = $('.g-recaptcha').parent().width();
                if (width < 302) {
                    let scale = width / 302;
                    $('.g-recaptcha').css('transform', 'scale(' + scale + ')');
                    $('.g-recaptcha').css('-webkit-transform', 'scale(' + scale + ')');
                    $('.g-recaptcha').css('transform-origin', '0 0');
                    $('.g-recaptcha').css('-webkit-transform-origin', '0 0');
                }
            })
        </script>
        <!-- Plugin used-->
        <?php $this->load->view($script) ?>
    </div>
</body>

</html>