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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
	<!-- <video id="video" width="320" height="240" autoplay></video> -->
	<!-- <button id="snap" class="btn btn-info kirim"></button> -->
	<canvas id="canvas" width="320" height="240" hidden="true"></canvas>
	<video id="vid" autoplay="true" width="320" height="240"></video><br>
	*) Capture required
	<button class="btn btn--stripe btn--large" id="snap" value="Capture"><i class="fas fa-camera"></i> Capture</button>
	<hr>
</center>
</div>
<div class="row" id="detail">
	<center><h2>Booking details</h2></center>
	<table style="color: #333; width: 100%;">
	<?php
		echo "<tr><td style='padding:10px;'>Kode Booking</td><td>:</td><td style='padding:10px;'>". $row['booking'] ."</td></tr>";
        echo "<tr><td style='padding:10px;'>Waktu booking</td><td>:</td><td style='padding:10px;'>" . $row['date'] . "</td></tr>";
        echo "<tr><td style='padding:10px;'>Nama Lengkap</td><td>:</td><td style='padding:10px;'>" . $row['nama'] . "</td></tr>";
        echo "<tr><td style='padding:10px;'>No. Telp</td><td>:</td><td style='padding:10px;'><a href='https://wa.me/" . $row['tel']."'>". $row['tel'] . "</a></td></tr>";
        echo "<tr><td style='padding:10px;'>E-mail</td><td>:</td><td style='padding:10px;'>" . $row['email'] . "</td></tr>"; 
        echo "<tr><td style='padding:10px;'>Kegiatan</td><td>:</td><td style='padding:10px;'>" . $row['k'] . "</td></tr>";
        echo "<tr><td colspan=3><form  action='val.php'>
        	<Input type='file' accept='image/*' name='img' required/>
        	<Input type='text' name='kb' values='". $row['booking'] ."'  hidden/>
        	</td></tr>";
        echo "<tr><td colspan=3><button type='submit' class='btn btn--stripe btn--large' value='Submit'>Validate</button></form></td></tr>";
  ?>
</table>
<!-- <a href="val.php?kb=<?php //echo $kb; ?>">Validate</button></a> -->
</div><hr>
<?php }}
else{ echo "<script>alert('False Code')</script>";
	echo "<button class='btn btn--stripe' onclick='goBack()' value='Back'>Back</button>";
} ?>
</div>

</body>

<!-- END GAME -->

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/qrcode.min.js"></script>
<script src="js/main.js"> </script>
<script type="text/javascript">
function goBack() {
  window.history.go(-1);
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
<script>
		$('.form-control').each(function () {
			floatedLabel($(this));
		});

		$('.form-control').on('input', function () {
			floatedLabel($(this));
		});

		function floatedLabel(input) {
			var $field = input.closest('.form-kelompokan');
			if (input.val()) {
				$field.addClass('input-not-empty');
			} else {
				$field.removeClass('input-not-empty');
			}
		}



		// Grab elements, create settings, etc.
var video = document.getElementById('video');

// Get access to the camera!
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    // Not adding `{ audio: true }` since we only want video now
    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
        //video.src = window.URL.createObjectURL(stream);
        video.srcObject = stream;
        video.play();
    });
}


// Elements for taking the snapshot
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
var video = document.getElementById('video');

// Trigger photo take
document.getElementById("snap").addEventListener("click", function() {
	context.drawImage(video, 0, 0, 640, 480);
});

///sekat

const vid = document.querySelector('video');
navigator.mediaDevices.getUserMedia({video: true}) // request cam
.then(stream => {
  vid.srcObject = stream; // don't use createObjectURL(MediaStream)
  return vid.play(); // returns a Promise
})
.then(()=>{ // enable the button
  const btn = document.querySelector('button');
  btn.disabled = false;
  btn.onclick = e => {
    takeASnap()
    .then(download);
  };
})
.catch(e=>console.log('please use the fiddle instead'));

// var date = new Date();
// var timestamp = date.getTime();

console.log(dateString);

function takeASnap(){
  const canvas = document.createElement('canvas'); // create a canvas
  const ctx = canvas.getContext('2d'); // get its context
  canvas.width = vid.videoWidth; // set its size to the one of the video
  canvas.height = vid.videoHeight;
  ctx.drawImage(vid, 0,0); // the video
  return new Promise((res, rej)=>{
    canvas.toBlob(res, 'image/jpeg'); // request a Blob from the canvas
  });
}



function download(blob){

// var currentDate = new Date();
// //var time = new ();

// var date = currentDate.getDate();
// var month = currentDate.getMonth(); //Be careful! January is 0 not 1
// var year = currentDate.getFullYear();

// var dateString = date + "-" +(month + 1) + "-" + year;

var today = new Date();
var date = today.getFullYear() +(today.getMonth()+1) + today.getDate();
var time = today.getHours() + today.getMinutes() + today.getSeconds();
var dateTime = date + time;
  // uses the <a download> to download a Blob
  let a = document.createElement('a'); 
  a.href = URL.createObjectURL(blob);
  a.download = 'img'+dateTime+'.jpg';

  newFilePath=('/img/guests/')

  document.body.appendChild(a);
  a.click();
}
	</script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
   <script  src="js/index.js"></script>
</html>