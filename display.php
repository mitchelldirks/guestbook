<?php 
$link = mysqli_connect("localhost", "root", "", "guestbook");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
  if (isset($_GET['show'])) {
   $sql = "SELECT * FROM guest where masuk like '". $_GET['show']."%' order by masuk desc";
 }else{
   $sql="SELECT * FROM guest order by masuk desc";
 }
?>
<!DOCTYPE html>
<html>
<head>
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="css/display.css"/>
  <title>Data Absen Buku Tamu</title>
  <style type="text/css">
    td{
      font-size: 16px;
    }

    a{
      text-decoration: none;
      color: white;
    }    
  </style>
</head>
<body>
<section>
  <!--for demo wrap-->
  <h1 id="top">Data Absen Buku Tamu</h1>
  
  <button class="btn pull-right" onclick="window.print()" style="padding: 10px 10px 5px; width: 100px; background: transparent; border: 2px solid white;color: #fff;"><i class="fas fa-print"> Print</i></button>
  <div id="MyClockDisplay" class="pull-right" onload="showTime()" style="top: 50%; left: 50%; color: white; font-size: 2em; font-family: Orbitron; letter-spacing: 7px;"></div>



  <form action="?" method="show">
    <input type="date" style="background-color: transparent; border: none; border-bottom: solid; color: white;font-size: 2em;" name="show" value="<? echo $_GET['show'];?>" />
    <button class="btn" type="submit" style="background: transparent; color: white; font-size: 2em;"><i class="fas fa-search"></i></button>
  </form>
  


  <section id="time"></section>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Masuk</th>
          <th>Nama Tamu</th>
          <th>Kode Booking</th>
          <!-- <th>Kegiatan</th> -->
          <th>Kontak</th>
          <th>E-mail</th>
          <th>Jabatan</th>
          <th>Satuan Kerja</th>
      <!--<th>Sesi</th>
          <th>Bukti Check In</th> -->
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0" class="tableisi">
      <tbody>
        <?php 
        if($result = mysqli_query($link, $sql)){
          if(mysqli_num_rows($result) > 0){
              echo "<table class='tableisi'>";
              while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                      echo "<td>" . $row['masuk'] . "</td>";
                      echo "<td>" . $row['nama'] . "</td>";
                      echo "<td>" . $row['booking'] . "</td>";
                      // echo "<td>" . $row['k'] . "</td>";
                      echo "<td><a href='https://wa.me/" . $row['tel']."'>". $row['tel'] . "</a></td>";
                      echo "<td>" . $row['email'] . "</td>";
                      echo "<td>" . $row['jab'] . "</td>";
                      echo "<td>" . $row['satker'] . "</td>";
                      // echo "<td>" . $row['session'] . "</td>";
                      // echo "<td><img src='img/guest/" . $row['img'] . "' alt='".$row['img']."' width='120px' height='80px'></td>";
                  echo "</tr>";
              }
              echo "</table>";
              // Free result set
              mysqli_free_result($result);
          } else{
              echo "<h1><i class='fas fa-exclamation-triangle'></i> No records matching your query were found.</h1>";
          }
        } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }?>
      </tbody>
    </table>

  </div>

  <h4><a href="#top" id="scroll">Back to top</a></h4>
</section>
<!-- <script type="text/javascript" src="js/tampil.js"></script> -->
</body>
<?php
  
mysqli_close($link);

?>
<script type="text/javascript">
  function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
      
    var time = h + ":" + m + ":" + s;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;

    setTimeout(showTime, 1000);
    }
  showTime();
</script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#scroll").on('click', function(event){
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
        window.location.hash = hash;
      });
    }
  });
});
</script>
</html>