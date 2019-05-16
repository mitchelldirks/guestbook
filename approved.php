<?php
	$link = new mysqli("localhost","root","","guestbook");

	if ($link->connect_error) {
	    die("Connection failed: " . $link->connect_error);
	} 
	if (isset($_GET['kb'])) {
		$kbook=$_GET['kb'];
		
	}else{
		echo "<script>alert('KODE ANDA BELUM SIAP')</script>";
	}
	$kb=$kbook;
?>

<!DOCTYPE html>
<html>
<head>
	<title>BOOKING SUCCESS ID <?php echo "$kb"; ?></title>
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
	<h2>Your booking is now successful</h2>
	<div class="input-group">
	<input id="text" type="text" value="<?php //echo("https://mitchell.webku.cf/Project/guestbook/validate.php?kb="); 
	echo ("localhost/form/validate.php?kb=");
	echo $kb; ?>" style="width:100%" hidden /><br>
	<div id="qrcode"></div><br>
	<h2>Code : <a href="#detail"><?php echo $kb; ?></a></h2><br>
	<button class="btn btn--stripe btn--large" onclick="print()" value="Print QRCODE">Print QRCODE</button>
	</div>
</center>
</div>
<hr>
<div class="row" id="detail">
	<center><h2>Booking details</h2></center>
	<table style="color: #333;">
	<?php  
	$sql="SELECT * FROM booking where booking='".$_GET['kb']."'";
		if($result = mysqli_query($link, $sql)){
         	while($row=mysqli_fetch_array($result)){
		echo "<tr><td style='padding:10px;'>Kode Booking</td><td>:</td><td style='padding:10px;'>". $row['booking'] ."</td></tr>";
        echo "<tr><td style='padding:10px;'>Waktu booking</td><td>:</td><td style='padding:10px;'>" . $row['date'] . "</td></tr>";
        echo "<tr><td style='padding:10px;'>Nama Lengkap</td><td>:</td><td style='padding:10px;'>" . $row['nama'] . "</td></tr>";
        echo "<tr><td style='padding:10px;'>No. Telp</td><td>:</td><td style='padding:10px;'><a href='https://wa.me/" . $row['tel']."'>". $row['tel'] . "</a></td></tr>";
        echo "<tr><td style='padding:10px;'>E-mail</td><td>:</td><td style='padding:10px;'>" . $row['email'] . "</td></tr>"; 
        echo "<tr><td style='padding:10px;'>Kegiatan</td><td>:</td><td style='padding:10px;'>" . $row['k'] . "</td></tr>";
 }} ?>
</table>
</div>
<center><h2><a href="#top" id="scroll">Back to top</a></h2></center>
</div>
</body>

<!-- END GAME -->

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/qrcode.min.js"></script>
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