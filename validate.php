<?php
	//include 'reader/koneksi.php';
	 $conn = new mysqli("localhost","root","","guestbook");

	 if ($conn->connect_error) {
	     die("Connection failed: " . $link->connect_error);
	 } 
	if (isset($_GET['kb'])) {
		$kbook=$_GET['kb'];
	}else{
		echo "<script>alert('VALIDASI GAGAL')</script>";
		header('location: index.php');
	}
	$kb=$kbook;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Validasi ID <?php echo "$kb"; ?></title>
	<link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
		#qrcode {
		  width:100%;
		  height:100%;
		  margin:15px,15px;
		  padding: 10px;
		}
		a{
			text-decoration: none;
			color: #8fa4aa;	
		}
	</style>
</head>
<body>

<div class="container">
  

	<!-- QR below -->
<div class="row" id="top">
<center>
	<?php  
	$sql="SELECT * FROM booking where booking='".$_GET['kb']."'";
		if($result = mysqli_query($conn, $sql)){
         	while($row=mysqli_fetch_array($result)){
	?>
	
	<h2>Your QR code is now verified</a></h2><br>
	<a href="val.php?kb=<?php echo $kb; ?>"><button class="btn btn--stripe btn--large" value="Validate">Validate</button></a>
	<hr>
</center>
</div>
<div class="row" id="detail">
	<center><h2>Booking details</h2></center>
	<table style="color: #333;">
	<?php
		echo "<tr><td style='padding:10px;'>Kode Booking</td><td>:</td><td style='padding:10px;'>". $row['booking'] ."</td></tr>";
        echo "<tr><td style='padding:10px;'>Waktu booking</td><td>:</td><td style='padding:10px;'>" . $row['date'] . "</td></tr>";
        echo "<tr><td style='padding:10px;'>Nama Lengkap</td><td>:</td><td style='padding:10px;'>" . $row['nama'] . "</td></tr>";
        echo "<tr><td style='padding:10px;'>No. Telp</td><td>:</td><td style='padding:10px;'><a href='https://wa.me/" . $row['tel']."'>". $row['tel'] . "</a></td></tr>";
        echo "<tr><td style='padding:10px;'>E-mail</td><td>:</td><td style='padding:10px;'>" . $row['email'] . "</td></tr>"; 
        echo "<tr><td style='padding:10px;'>Kegiatan</td><td>:</td><td style='padding:10px;'>" . $row['k'] . "</td></tr>";
  ?>
</table>
</div><?php }} ?><hr>
<center><button class="btn btn--stripe" onclick="goBack()" value="Back">Back</button></center>
</div>

</body>

<!-- END GAME -->

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/qrcode.min.js"></script>
<script type="text/javascript">
function goBack() {
  window.history.go();
}
</script>
<script type="text/javascript">

	var qrcode = new QRCode("qrcode");
	function makeCode () {		
		var elText = document.getElementById("text");	
		if (!elText.value) {
			alert("Input a text");
			elText.focus();
			return;
		}	
		qrcode.makeCode(elText.value);
	}
	makeCode();
	$("#text").
		on("blur", function () {
			makeCode();
		}).
		on("keydown", function (e) {
			if (e.keyCode == 13) {
				makeCode();
			}
		});
	</script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
   <script  src="js/index.js"></script>
</html>