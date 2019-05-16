<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title> Registrasi Kegiatan SDPPI</title>
  
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='css/font-awesome.min.css'>


    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="container">
  <form method="POST" action="saving.php">  
    <center>
    <h2>Registrasi Kegiatan SDPPI</h2>
  </center>
    <div class="row">
        <h4>Tanggal Daftar</h4>
        <div class="input-group">
           <div class="col-half">
            <input type="text" placeholder="Day" value="<?php echo date('l');?>" readonly/>
          </div>
          <div class="col-half">
          <div class="col-third">
            <input type="text" placeholder="DD" value="<?php echo date('d')?>" readonly/>
          </div>
          <div class="col-third">
            <input type="text" placeholder="MM" value="<?php echo date('M')?>" readonly/>
          </div>
          <div class="col-third">
            <input type="text" placeholder="YYYY"value="<?php echo date('Y')?>" readonly/>
          </div>
        </div>
      </div>
      
        <h4>Tema Kegiatan </h4>
        <div class="input-group">
          <!-- <div class="infokeg"> -->
        <input type="radio" name="kegiatan" value="A" id="KegiatanA" checked="true"/>
          <label for="KegiatanA" data-tooltip="Rabu 8 Mei 2019 15:00 WIB Ruang C Gedung Z">Kegiatan A</label> 

          <input type="radio" name="kegiatan" value="B" id="KegiatanB"/>
          <label for="KegiatanB" data-tooltip="Rabu 8 Mei 2019 15:00 WIB Ruang C Gedung Z">Kegiatan B</label>

          <input type="radio" name="kegiatan" value="C" id="KegiatanC"/>
          <label for="KegiatanC" data-tooltip="Rabu 8 Mei 2019 15:00 WIB Ruang C Gedung Z">Kegiatan C</label>

          <input type="radio" name="kegiatan" value="D" id="KegiatanD"/>
          <label for="KegiatanD" data-tooltip="Rabu 8 Mei 2019 15:00 WIB Ruang C Gedung Z">Kegiatan D</label>

        </div>
      <!--   </div> -->
    </div>

     <div class="row">
      <h4>Data Diri</h4>
      <div class="input-group input-group-icon">
        <input type="text" name="nama" placeholder="Nama Lengkap"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="email" name="email" placeholder="Email"/>
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="number" name="tel" placeholder="Nomor Telpon"/>
        <div class="input-icon"><i class="fa fa-phone"></i></div>
      </div>
         <div class="input-group input-group-icon">
        <input type="text" name="jab" placeholder="Jabatan Anda"/>
        <div class="input-icon"><i class="fa fa-suitcase"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" name="satker" placeholder="Satuan Kerja"/>
        <div class="input-icon"><i class="fa fa-bars"></i></div>
      </div>
       <h4>Jenis Kelamin</h4>
      <div class="input-group">
        <input type="radio" name="jk" value="laki" id="jenis-kelamin-laki" checked="true"/>
        <label for="jenis-kelamin-laki"><span><i class="fa fa-mars"></i>Laki-Laki</span></label>
        <input type="radio" name="jk" value="perempuan" id="jenis-kelamin-perempuan"/>
        <label for="jenis-kelamin-perempuan"> <span><i class="fa fa-venus"></i>Perempuan</span></label>
      </div>
    </div>

    <!-- CHECK UNTUK PERSYARATAN -->
    <div class="row">
      <h4>Komitmen</h4>
      <div class="input-group">
        <input type="checkbox" id="terms" required />
        <label for="terms">Dengan ini saya bersedia untuk datang dan bertanggung jawab atas kehadiran saya.</label>
      </div>
    </div>
    <!-- BUTTON KIRIM -->
      <div class="row">
      <button type="submit" class="btn btn--stripe btn--large" value="Submit" >Kirim</button>
    </div>
  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>
