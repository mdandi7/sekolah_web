<?php

    ob_start();
    $error=""; // Variable To Store Error Message
    $connection = mysqli_connect("localhost", "root", "", "sekolah");
    $txInd = $_POST['txInd'];
    $rsp=""; //Variable to store the response

	//Profile
	if($txInd == "guru-update"){
	    $guruCd = $_POST['guruCd'];
	    $guruNm = $_POST['guruNm'];
	    $guruNip = $_POST['guruNip'];
		$guruTptLhr = $_POST['guruTptLhr'];
		$guruTglLhr = $_POST['guruTglLhr'];
		$guruAlmt = $_POST['guruAlmt'];
		$guruTlp = $_POST['guruTlp'];
		$guruPddk = $_POST['guruPddk'];
		$rsp = "Profile Telah di update!";

		$queryChk = mysqli_query($connection, "SELECT * FROM guru WHERE nip = '$guruNip'");
		$rows = mysqli_num_rows($queryChk);

		if($rows <= 1){
			$query = mysqli_query($connection, "UPDATE guru SET nama = '$guruNm', nip = '$guruNip', tempat_lahir = '$guruTptLhr', tgl_lahir = '$guruTglLhr', alamat = '$guruAlmt', telp = '$guruTlp', pendidikan = '$guruPddk' WHERE guru_cd = '$guruCd'");
		}else{
			$rsp = "NIP telah di gunakan!";
		}


		echo $rsp;
	
	//JADWAL
	}elseif($txInd == "guru-jadwal"){
		$guruCd = $_POST['guruCd'];

		$queryChk = mysqli_query($connection, "SELECT jadwal.guru_cd, guru.nama, mp.nama_mp, hari, jam, kelas_cd FROM jadwal LEFT JOIN guru on jadwal.guru_cd = guru.guru_cd LEFT JOIN mata_pelajaran mp on jadwal.mp_cd = mp.mp_cd WHERE jadwal.guru_cd = '$guruCd'");
		$rows = mysqli_num_rows($queryChk);

		if($rows <= 0){
			$rsp .= "<tr><th scope='row' colspan='5'>Belum Ada Jadwal</th>";
		}else{
    		for($i=0;$i<$rows;$i++){
    			$data = mysqli_fetch_array($queryChk);
    			$rsp .= "<tr><th scope='row'>" .$data['nama']. "</th>";
    			$rsp .= "<td>" .$data['nama_mp']. "</td>";
    			$rsp .= "<td>" .$data['hari']. "</td>";
    			$rsp .= "<td>" .$data['jam']. "</td>";
    			$rsp .= "<td>" .$data['kelas_cd']. "</td>";
    		}
		}
		echo $rsp;

	//HERE
	}elseif($txInd == "guru-nilai"){
		$guruCd = $_POST['guruCd'];

		$queryChk = mysqli_query($connection, "SELECT ss.nisn, ss.nama, kl.kelas_cd, guru.guru_cd, mp.mp_cd, mp.nama_mp FROM mata_pelajaran mp LEFT JOIN kelas kl on mp.kelas = kl.kelas LEFT JOIN guru on mp.mp_cd = guru.mp_cd LEFT JOIN siswa ss on kl.kelas_cd = ss.kelas_cd LEFT JOIN nilai nl on ss.nisn = nl.nisn and mp.mp_cd = nl.mp_cd WHERE guru.guru_cd = '$guruCd' AND nl.nilai is null AND ss.nisn is not null ORDER BY kelas_cd");
		$rows = mysqli_num_rows($queryChk);

		if($rows > 0){
			$curKls = '';

			for($i=0;$i<$rows;$i++){

    			$data = mysqli_fetch_array($queryChk);
    			if($curKls != $data['kelas_cd']){
    				$rsp .= "</table><table class='table table-hover table-responsive-md text-center'><h4 class='text-center'>Kelas : " .$data['kelas_cd']. "</h3><br>";
    				$rsp .= "<thead><tr><th scope='col'>NISN</th><th scope='col'>Siswa</th><th scope='col'>Mata Pelajaran</th><th scope='col'>Nilai</th><th scope='col'>Input</th></tr></thead>";

					$rsp .= "<tr><th scope='row'>" .$data['nisn']. "</th>";
	    			$rsp .= "<td>" .$data['nama']. "</td>";
	    			$rsp .= "<td>" .$data['nama_mp']. "</td>";
	    			$rsp .= "<td><input type='text' class='form-control' id=".$data['nisn']." placeholder='Nilai'></td>";
	    			$rsp .= "<td><input data-nisn='" .$data['nisn']. "' data-kls='" .$data['kelas_cd']. "' data-gr='" .$data['guru_cd']. "' data-mp='" .$data['mp_cd']. "' class='btn-ins-nilai btn btn-md btn-primary btn-info btn-block' type='submit' value='Input'></td></tr>";

	    			$curKls = $data['kelas_cd'];
    			}else{

    				$rsp .= "<tr><th scope='row'>" .$data['nisn']. "</th>";
	    			$rsp .= "<td>" .$data['nama']. "</td>";
	    			$rsp .= "<td>" .$data['nama_mp']. "</td>";
	    			$rsp .= "<td><input type='text' class='form-control' id=".$data['nisn']." placeholder='Nilai'></td>";
	    			$rsp .= "<td><input data-nisn='" .$data['nisn']. "' data-kls='" .$data['kelas_cd']. "' data-gr='" .$data['guru_cd']. "' data-mp='" .$data['mp_cd']. "' class='btn-ins-nilai btn btn-md btn-primary btn-info btn-block' type='submit' value='Input'></td></tr>";
    			}
    		}
		}

		$rsp .= "</table>|";

		$queryChk = mysqli_query($connection, "SELECT ss.nisn, ss.nama, kl.kelas_cd, guru.guru_cd, kl.guru_cd, mp.mp_cd, mp.nama_mp, nl.nilai FROM nilai nl LEFT JOIN siswa ss on nl.nisn = ss.nisn LEFT JOIN kelas kl on nl.kelas_cd = kl.kelas_cd LEFT JOIN mata_pelajaran mp on nl.mp_cd = mp.mp_cd LEFT JOIN guru on mp.mp_cd = guru.mp_cd WHERE guru.guru_cd = '$guruCd' ORDER BY kelas_cd");
		$rows = mysqli_num_rows($queryChk);

		if($rows > 0){
			$curKls = '';

			for($i=0;$i<$rows;$i++){

    			$data = mysqli_fetch_array($queryChk);
    			if($curKls != $data['kelas_cd']){
    				$rsp .= "</table><table class='table table-hover table-responsive-md text-center'><h4 class='text-center'>Kelas : " .$data['kelas_cd']. "</h3><br>";
    				$rsp .= "<thead><tr><th scope='col'>NISN</th><th scope='col'>Siswa</th><th scope='col'>Mata Pelajaran</th><th scope='col'>Nilai</th><th scope='col'>Input</th></tr></thead>";

					$rsp .= "<tr><th scope='row'>" .$data['nisn']. "</th>";
	    			$rsp .= "<td>" .$data['nama']. "</td>";
	    			$rsp .= "<td>" .$data['nama_mp']. "</td>";
	    			$rsp .= "<td><input type='text' class='form-control' id='up-".$data['nisn']."' placeholder='Nilai' value=".$data['nilai']."></td>";
	    			$rsp .= "<td><input data-nisn='" .$data['nisn']. "' data-kls='" .$data['kelas_cd']. "' data-gr='" .$data['guru_cd']. "' data-mp='" .$data['mp_cd']. "' class='btn-upd-nilai btn btn-md btn-primary btn-info btn-block' type='submit' value='Update'></td></tr>";

	    			$curKls = $data['kelas_cd'];
    			}else{

    				$rsp .= "<tr><th scope='row'>" .$data['nisn']. "</th>";
	    			$rsp .= "<td>" .$data['nama']. "</td>";
	    			$rsp .= "<td>" .$data['nama_mp']. "</td>";
	    			$rsp .= "<td><input type='text' class='form-control' id='up-".$data['nisn']."' placeholder='Nilai' value=".$data['nilai']."></td>";
	    			$rsp .= "<td><input data-nisn='" .$data['nisn']. "' data-kls='" .$data['kelas_cd']. "' data-gr='" .$data['guru_cd']. "' data-mp='" .$data['mp_cd']. "' class='btn-upd-nilai btn btn-md btn-primary btn-info btn-block' type='submit' value='Update'></td></tr>";
    			}
    		}
		}


		$rsp .= "</table>";
		echo $rsp;

	}elseif($txInd == "insert-nilai"){
		$nisn = $_POST['nisn'];
		$kls = $_POST['kls'];
		$guru = $_POST['guru'];
		$mpCd = $_POST['mpCd'];
		$nilai = $_POST['nilai'];


		$queryChk = mysqli_query($connection, "INSERT INTO nilai (nisn,kelas_cd,guru_cd,mp_cd,nilai) VALUES('$nisn','$kls','$guru','$mpCd','$nilai')");
	}elseif($txInd == "update-nilai"){
		$nisn = $_POST['nisn'];
		$kls = $_POST['kls'];
		$guru = $_POST['guru'];
		$mpCd = $_POST['mpCd'];
		$nilai = $_POST['nilai'];


		$queryChk = mysqli_query($connection, "UPDATE nilai SET nilai = '$nilai' WHERE nisn = '$nisn' and mp_cd = '$mpCd'");

		echo $rsp;
	
	//TABLES`
	}elseif($txInd == "tables"){

		$query = mysqli_query($connection, "SELECT * FROM GURU LEFT JOIN kelas on GURU.guru_cd = kelas.guru_cd");
		$rows = mysqli_num_rows($query);

		for($i=0;$i<$rows;$i++){
			$data = mysqli_fetch_array($query);

			$rsp .= "<tr><th scope='row'>" .$data['nip']. "</th>";
    		$rsp .= "<td>" .$data['nama']. "</td>";
    		$rsp .= "<td>" .$data['jns_kelamin']. "</td>";
    		$rsp .= "<td>" .$data['alamat']. "</td>";
    		$rsp .= "<td>" .$data['telp']. "</td>";
    		$rsp .= "<td>" .$data['jabatan']. "</td>";
    		$rsp .= "<td>" .$data['kelas_cd']. "</td></tr>";
		}

		$rsp .= "|";

		$query = mysqli_query($connection, "SELECT * FROM siswa");
		$rows = mysqli_num_rows($query);

		for($i=0;$i<$rows;$i++){
			$data = mysqli_fetch_array($query);

			$rsp .= "<tr><th scope='row'>" .$data['nisn']. "</th>";
    		$rsp .= "<td>" .$data['nama']. "</td>";
    		$rsp .= "<td>" .$data['jenis_kelamin']. "</td>";
    		$rsp .= "<td>" .$data['alamat']. "</td>";
    		$rsp .= "<td>" .$data['telp']. "</td>";
    		$rsp .= "<td>" .$data['kelas_cd']. "</td>";
    		$rsp .= "<td>" .$data['tahun_masuk']. "</td></tr>";
		}

		$rsp .= "|";

		$query = mysqli_query($connection, "SELECT * FROM kelas INNER JOIN guru on kelas.guru_cd = guru.guru_cd");
		$rows = mysqli_num_rows($query);

		for($i=0;$i<$rows;$i++){
			$data = mysqli_fetch_array($query);

			$rsp .= "<tr><th scope='row'>" .$data['kelas']. "</th>";
    		$rsp .= "<td>" .$data['kelas_cd']. "</td>";
    		$rsp .= "<td>" .$data['nama']. "</td></tr>";
    	}

		echo $rsp;
	}

?>