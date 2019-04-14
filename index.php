<html>
<head> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<style>
	
	body {
		background-image: url('bg.jpg') ;
			background-attachment: fixed;
			background-size:  cover;
	}
	td {
		font-family:arial;
		font-size:14px;
	}
	input,select,textarea {
		font-family:arial;
        font-size:14px;
		padding:2px;
		border-radius: 10px;
	}
	.wajibisi { 
		color:red;
	}

	.kirim {
		font-family:arial;
        font-size:14px;
		color:#fff;
		background:grey;
		padding-left:20px;
		padding-right:20px;
		padding-top:10px;
		padding-bottom:10px;
		border:0px;
	}
	
	.sukses {
		font-family:arial;
                font-size:12px;
                font-weight:bold;
		color:red

	}
	.error {
		font-family:arial;
                font-size:12px;
                color:red;
		font-weight:bold;
		color:red;	
	}

	.tabelnya {
		background:#fff;
		padding:10px;
		border-radius:10px;
	}
	</style>
	</head>

	<body>
	<!-- <div style="width:100%; height:10px; background:blue;">&nbsp;</div> -->
	<table align="center">
		
		<tr>
			<td width="20%"><a href=""><img src="" width=90 border=0 alt="index"></a></td>
			<td><h3>BUKU TAMU KUNJUNGAN</h3>
				<h2 style="margin-top:-17px">DATA CENTER</h2>
				<p style="margin-top:-17px">Telp:()  | Email:@ </p>
				</td>
		</tr>
	</table>

		<div class="row fluid">
			<div class="box">
		<form method="POST" action="index.php">
			<table class="tabelnya" style="width: 500px;" align="center" cellpadding=2 cellspacing=2>
				<tbody>
					
					 <tr>
                    	<td colspan=2 style="background:grey; color:#fff; padding:6px; border-radius:6px; font-weight:bold;">Silahkan lengkapi form buku tamu berikut :</td>
			                </tr>
					 	<tr><td colspan=2 height=3></td></tr>


					<tr>
						<td style="width: 162px;">&nbsp;Tanggal <span class="wajibisi">*</span></td>
						<td style="width: 303px;">&nbsp;<input type=text id="datepicker"  name=tanggal value="<?php echo date('Y-m-d')?>" readonly></td>

					</tr>
					<tr>
						<td style="width: 162px;">&nbsp;Jam <span class="wajibisi">*</span></td>
						<td style="width: 303px;">&nbsp;<input  type="text" name="jam" value="<?php $H=date('H'); $jam=$H+7; echo '$jam : date(i)';?>" size=7> <small><i>misal pukul 09:00 atau 21:00</i></td>
					</tr>
					<tr>
                            <td style="width: 162px;">&nbsp;Nama<span class="wajibisi">*</span></td>
            <td style="width: 303px;">&nbsp;<input type=text name=nama size=20 value=""></td>
                                        </tr>
				<tr>
					<td style="width: 162px;">&nbsp;Jabatan<span class="wajibisi">*</span></td>
					<td style="width: 303px;">&nbsp;<input type=text name=jabatan size=20 value=""></td>

				</tr>
					<tr>
						<td style="width: 162px;">&nbsp; Divisi</td>
						<td>&nbsp;<select name=rack>
							<option value="0">Pilih</option>
							<option value="timur">Divisi Timur</option>	
 							<option value="barat">Divisi Barat </option>
 							<option value="selatan">Divisi Selatan</option>
 							<option value="utara">Divisi Utara</option>
						</select>
						</td>
						
					<tr>
				
					<tr>
          				<td style="width: 162px;">&nbsp;Email <span class="wajibisi">*</span></td>
            			<td style="width: 303px;">&nbsp;<input type=text name=email size=20 value=""></td>
                  	</tr>	
					<tr>
						<td style="width: 162px;">&nbsp;Telepon / HP <span class="wajibisi">*</span></td>
						<td style="width: 303px;">&nbsp;<input type=text name=telepon value=""></td>
					</tr>
					<tr>
						<td style="width: 162px;">&nbsp; Sesi</td>
						<td>&nbsp;<select name=rack>
							<option value="pilih">Pilih</option>
							<option value="sesi1">ke 1</option>	
 							<option value="sesi2">ke 2</option>
 							<option value="sesi3">ke 3</option>
						</select>
						</td>
					<tr>
					<tr>
						<td style="width: 162px; height: 97px;">&nbsp;Agenda / Kegiatan</td>
						<td style="width: 303px; height: 97px;">
						<textarea style="margin-left:3px" cols="40" rows="8" name=agenda></textarea></td>
					</tr>

					<tr> 
						
					</tr>
					<tr>
					<td><div class="g-recaptcha" data-sitekey="6LdRyyUUAAAAAJ9ZzHTM_fstuiilRHpHllLaOLwf"></div></td>
					</tr>
					<tr>
					<td colspan=2 align=center><small>Kolom dengan tanda <span class=wajibisi>*</span> wajib untuk diisi</small></td>
					<!--<td colspan=2 align=center></td>-->
					
					</tr>
					<tr>
						<td style="width: 162px;">&nbsp;</td>
						<td style="width: 303px;">&nbsp;
							<input name=kirim id="snap" class="btn btn-info kirim" type="submit" value="KIRIM"> 
							<input name=kirim class="btn btn-info kirim" type="reset" value="CLEAR">
						</td>
						<td>
							<!--<button onclick="takeSnapshot()" class="kirim" >Ambil Gambar</button>-->
						</td>

					</tr>
				</tr></tr></tr></small></td></tr></tbody>
			</table>
		</form>
	</div>
	<div id="frame">
		<?php include 'cam-preview.html';?>	
	</div>

	</body>
	<script type="text/javascript">
    var video = document.querySelector("#video-webcam");
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;
    if (navigator.getUserMedia) {
        navigator.getUserMedia({ video: true }, handleVideo, videoError);
    }
    function handleVideo(stream) {
        video.src = window.URL.createObjectURL(stream);
        console.log(stream);
    }
    function videoError(e) {
        alert("TAMU WAJIB AMBIL GAMBAR!")
    }
    function takeSnapshot() {
        var img = document.createElement('img');
        var context;
        var width = video.offsetWidth
                , height = video.offsetHeight;
        canvas = document.createElement('canvas');
        canvas.width = width;
        canvas.height = height;
        context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, width, height);
        img.src = canvas.toDataURL('image/png');
        document.body.appendChild(img);
    }
       var canvas = document.getElementById("myCanvas");
            var ctx = canvas.getContext("2d");
    function renderImage() {
            var canvas = document.getElementById("myCanvas");
            var ctx = canvas.getContext("2d");

            // ambil gambar dari elemen <img>
            var img = document.getElementById("scream");

            // render ke Canvas
            ctx.drawImage(img,10,10);
        }
</script>
</html>