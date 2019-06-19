<?php

$conn = new mysqli("localhost","root","","guestbook");

	 if ($conn->connect_error) {
	     die("Connection failed: " . $link->connect_error);
	 } 
	if (isset($_GET['kb'])) {
		$kbook=$_GET['kb'];
    $img=$_GET['img'];
	}else{
		echo "<script>alert('VALIDASI GAGAL') <button onclick='goBack()' value='Back'></button></script>";
		echo "<script>
				function goBack() {
  				window.history.go(-2);
				}
			</script>";
	}
	$kb=$kbook;
	$date=date('YmdHis');

	$sql="SELECT * FROM booking where booking='$kb'";
	if($result = mysqli_query($conn, $sql)){
         	if($row=mysqli_fetch_array($result)){
         		$book=$row['booking'];
         		$kval=$date.$book."OK";
         		$tgl_book=$row['date'];
         		$name=$row['nama'];
         		$k=$row['k'];
         		$email=$row['email'];
         		$tel=$row['tel'];
         		$jab=$row['jab'];
         		$satker=$row['satker'];
         		$jk=$row['jk'];
         		}
   }else{
   	echo "<script>alert('MOHON LAKUKAN VALIDASI ULANG')</script>";
   }
   $check="SELECT * FROM valid v INNER JOIN booking b on v.k_booking=b.booking WHERE v.k_booking='$book'";
	if ($conn->query($check) === TRUE) {
    echo "<script>alert('$nama dengan kode booking $book sudah terdaftar')</script>";
} else {   

$post="INSERT INTO valid (k_validasi,k_booking,tgl_book,img) VALUES ('$kval','$book','$tgl_book','$img')";
$att="INSERT INTO guest (nama,booking,tel,email,jab,satker,jk,tgl_book) VALUES ('$name','$book','$tel','$email','$jab','$satker','$jk','$tgl_book')";

if ($conn->query($att) === TRUE) {
    echo "<script>alert('Peserta tervalidasi atas nama $name ')</script>";
    echo "<a class='btn btn--stripe btn--large' href='reader/index.html'>done</a>";
       		
if ($conn->query($post) === TRUE) {
	
    echo "<script>alert('Validasi sukses, selamat datang $name ";
    echo "<br>";
    echo " Kode Booking $book tervalidasi')</script>";
     $old = '../../../../Users/Andini/downloads/'.$img;
     $new = 'img/guest/'.$img;
    copy($old, $new) or die("Unable to copy $old to $new.");
    echo "script bisa";
    header('location: reader/index.php');
} else {
    echo "<script>alert('Error: " . $post . "<br>" . $conn->error . "')</script>";
    echo "<script>alert('Tamu sudah pernah masuk')</script>";
}} else {
    echo "<script>alert('Error: " . $att . "<br>" . $conn->error . "')</script>";
    echo "<script>alert('VALIDASI TAMU GAGAL. Tamu telah terdaftar')</script>";
}}
?>