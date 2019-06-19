<?php

$conn = new mysqli("localhost","root","","guestbook");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$d=date('md');
$name=$_POST['nama'];
$Activity=$_POST['kegiatan'];
$Tel=$_POST['tel'];
$Email=$_POST['email'];
$Occupy=$_POST['jab'];
$SatKer=$_POST['satker'];
$JK=$_POST['jk'];
$KB=$Activity.$d.$Tel;

$sql="INSERT INTO booking (nama,k,tel,email,jab,satker,jk,booking) values ('$name','$Activity','$Tel','$Email','$Occupy','$SatKer','$JK','$KB')"; 
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Booking sukses, $Name ')</script>";

    header('location: approved.php?kb='.$KB);
} else {
    echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "')</script>";
    echo "alert('MOHON LAKUKAN REGISTRASI ULANG')";
}



$conn->close();
?>
