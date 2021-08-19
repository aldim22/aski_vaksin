<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ASKI Vaksin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/aski.png" rel="icon">
  <link href="assets/img/aski.png" rel="apple-touch-icon">

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center">

      <a href="index.html" class="logo me-auto">ASKI VAKSIN</a>
    </div>
  </header>


  <main id="main">

<br><br><br><br><br>
    <!-- ======= Cek NIK ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>MASUKKAN NIK & CEK JADWAL VAKSIN ANDA</h2>
          <p>QR Code digunakan untuk registrasi saat di ASKI </p>
          <p><b>Lokasi Vaksin di PT ASKI</b></p>
        </div>

         <form >
                @csrf
           <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-11">
                         <input type="text" name="nik" class="form-control" id="nik" placeholder="Masukan NIK" required>
                    </div>
                     <div class="col-lg-1">
                        <button class="btn btn-success btn-submit">GENERATE</button>
                    </div>
                </div>
          </div>

        </form>
        <br><br>

        <div class="row">
            <div class="col-lg-4" data-aos="fade-right">
                <div id="qrcode" class="img-fluid" style="display: none;"></div>
                </div>
                <div class="col-lg-6" data-aos="fade-right">
                <div id="result" style="display: none;"></div>
            </div>
        </div>

      </div>
    </section>

    <div class="footer-clean">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 item">
                        <a href="https://grin.co.id/"><img src="assets/img/grin.png" alt="" width="300px" height="auto"></a>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
   
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Visit Us !!! <a href="https://grin.co.id/">www.grin.co.id</a></h3>
                        <ul>
                            <li><a href="#">Tetap jaga kesehatan Anda dan patuhi Protokol Kesehatan dan GRIN hadir untuk memenuhi kebutuhan Anda</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 item social">
                        <a href="https://www.facebook.com/askigrin">
                            <i class="icon ion-social-facebook"></i>
                        </a>
                        <a href="https://www.youtube.com/channel/grinbyaski">
                            <i class="icon ion-social-youtube"></i>
                        </a>
                        <a href="https://www.instagram.com/aski_innovation/">
                            <i class="icon ion-social-instagram"></i>
                        </a>
                        <br><br>
                        <p><a href="https://grin.co.id/">www.grin.co.id</a></p>
                        <p class="copyright">PT Astra Komponen Indonesia</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>




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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/qrcode.js" defer></script>
  <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<script type="text/javascript">
   
   
    $(".btn-submit").click(function(e){
        
        e.preventDefault();
         $("#result").hide();
         document.getElementById('qrcode').innerHTML = "";
         var QR_CODE = new QRCode("qrcode", {
          width: 300,
          height: 300,
          colorDark: "#000000",
          colorLight: "#ffffff",
          correctLevel: QRCode.CorrectLevel.H,
          });

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
           QR_CODE.makeCode(data.qr);
            $("#result").show();
            $("#qrcode").show();
             $("#result").html(       
          '<div class="content" data-aos="fade-left">'+
            '<h3>Selamat anda sudah terdaftar sebagai peserta vaksin</h3>'+
            '<ul>'+
            '<li><i class="bi bi-check-circle"></i>Dosis : '+data.status_dosis+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Tanggal : '+data.waktu_vaksin+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Jam : '+data.tanggal_vaksin+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Lokasi Vaksin : PT ASKI</li>'+
              '<li><i class="bi bi-check-circle"></i>Nama : '+data.name+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Tanggal Lahir : '+data.tanggal_lahir+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Nik : '+data.nik+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Status : '+data.status+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Hubungan Keluarga : '+data.hubungan_keluarga+'</li>'+
              '<a class="btn btn-success" href="download/'+data.id+'">Download</a>'+
            '</ul>'+
          '</div>');
        }else if(data.success =="berhasil"){ 
           QR_CODE.makeCode(data.qr);
            $("#result").show();
            $("#qrcode").show();
             $("#result").html(       
          '<div class="content" data-aos="fade-left">'+
            '<h3>Selamat anda sudah terdaftar sebagai peserta vaksin</h3>'+
            '<ul>'+
            '<li><i class="bi bi-check-circle"></i>Dosis : '+data.status_dosis+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Tanggal : '+data.waktu_vaksin+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Jam : '+data.tanggal_vaksin+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Lokasi Vaksin : PT ASKI</li>'+
              '<li><i class="bi bi-check-circle"></i>Nama : '+data.name+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Tanggal Lahir : '+data.tanggal_lahir+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Nik : '+data.nik+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Status : '+data.status+'</li>'+
              '<li><i class="bi bi-check-circle"></i>Hubungan Keluarga : '+data.hubungan_keluarga+'</li>'+
              '<a class="btn btn-success" href="download/'+data.id+'">Download</a>'+
            '</ul>'+
          '</div>');
        }else{
              $('#result').html('<h2>Mohon maaf anda belum terdaftar. Silahkan hubungi HR perusahaan Anda</h2>');
        }

        }
       
        });

  
    });
</script>
</body>

</html>
