<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medicio Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medicio - v4.3.0
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="align-items-center d-none d-md-flex">
        <i class="bi bi-clock"></i> Monday - Saturday, 8AM to 10PM
      </div>
      <div class="d-flex align-items-center">
        <i class="bi bi-phone"></i> Call us now +1 5589 55488 55
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="index.html" class="logo me-auto">ASKI VAKSIN</a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

     

     <!--  <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a> -->

    </div>
  </header><!-- End Header -->


  <main id="main">

    

   
<br><br><br><br><br>
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>GENERATE CODE</h2>
          <p>Masukan Nik anda, system akan mengecek apakah nik anda terdaftar atau tidak, bila nik anda anda terdaftar maka system akan melakukan generate dan akan tersedia QR code untuk akun anda,</p>
        </div>

         <form >
                @csrf
           <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-11">
                         <input type="text" name="nik" class="form-control" id="nik" placeholder="Masukan NIK">
                    </div>
                     <div class="col-lg-1">
                        <button class="btn btn-success btn-submit">GENERATE</button>
                    </div>
                </div>
          </div>
          
        </form>
    <br><br>
    <span id="result" style="display: none;"></span>
       

      </div>
    </section><!-- End About Us Section -->

   

  </main><!-- End #main -->

 
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<script type="text/javascript">
   
   
    $(".btn-submit").click(function(e){
        
        e.preventDefault();
         $("#result").hide();
         var url = 'http://localhost:8000/storage/qrcodes/';
        $.ajax({
        type: "GET",
        url: "submit_qr",
        data: {
        'nik': $('#nik').val(),
        },
          beforeSend: function (data) {
             $("#result").show();
                $('#result').html('<h1>Please Wait .....</h1>');
            },
         success: function(data) {
        if (data.success =="ada") {
           
            $("#result").show();
             $("#result").html('<div class="row">'+
                '<div class="col-lg-4" data-aos="fade-right">'+
            '<img src="http://localhost:8000/storage/qrcodes/'+data.qr+'" class="img-fluid" alt="" style="width: 60%">'+
          '</div>'+
          '<div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">'+
            '<h3>Selemat anda sudah terdaftar sebagai peserta vaksinisasi</h3>'+
            '<ul>'+
              '<li><i class="bi bi-check-circle"></i>Nama : '+data.name+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Tanggal Lahir : '+data.tanggal_lahir+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Umur : '+data.umur+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Nip : '+data.nip+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Nik : '+data.nik+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Status : '+data.nik+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Hubungan Keluarga : '+data.hubungan_keluarga+'</li>'+
              '<button class="btn btn-success">Download</button>'+
            '</ul>'+
          '</div>'+
        '</div>');
        }else if(data.success =="berhasil"){
          
             $("#result").show();
             $("#result").html('<div class="row">'+
                '<div class="col-lg-4" data-aos="fade-right">'+
            '<img src="http://localhost:8000/storage/qrcodes/'+data.qr+'" class="img-fluid" alt="" style="width: 60%">'+
          '</div>'+
          '<div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">'+
            '<h3>Selemat anda sudah terdaftar sebagai peserta vaksinisasi</h3>'+
            '<ul>'+
              '<li><i class="bi bi-check-circle"></i>Nama : '+data.name+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Tanggal Lahir : '+data.tanggal_lahir+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Umur : '+data.umur+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Nip : '+data.nip+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Nik : '+data.nik+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Status : '+data.nik+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Hubungan Keluarga : '+data.hubungan_keluarga+'</li>'+
              '<button class="btn btn-success">Download</button>'+
            '</ul>'+
          '</div>'+
        '</div>');
        }else{
              $('#result').html('<h1>Mohon maaf anda belum terdaftar</h1>');
        }

        }
       
        });

  
    });
</script>
</body>

</html>