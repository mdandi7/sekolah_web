<?php

    ob_start();
    $error=""; // Variable To Store Error Message
    $connection = mysqli_connect("localhost", "root", "", "sekolah");
    $txInd = $_POST['txInd'];
    $rsp=""; //Variable to store the response

	//Profile
	if($txInd == "siswa-update"){
		$ssNisn = $_POST['ssNisn'];
	    $ssNm = $_POST['ssNm'];
	    $ssJk = $_POST['ssJk'];
		$ssTglLhr = $_POST['ssTglLhr'];
		$ssAlmt = $_POST['ssAlmt'];
		$ssTlp = $_POST['ssTlp'];

		$query = mysqli_query($connection, "UPDATE siswa SET nama = '$ssNm', jenis_kelamin = '$ssJk', tanggal_lahir = '$ssTglLhr', alamat = '$ssAlmt', telp = '$ssTlp' WHERE nisn = '$ssNisn'");
	
	}elseif($txInd == "TablesShow"){
		$klsCd = $_POST['klsCd'];
		$ssNisn = $_POST['ssNisn'];
		//Show Jadwal
    	$query = mysqli_query($connection, "SELECT * FROM jadwal LEFT JOIN mata_pelajaran mp on jadwal.mp_cd = mp.mp_cd WHERE kelas_cd = '$klsCd' ORDER BY kelas_cd, jam, hari desc");
    	$rows = mysqli_num_rows($query);
    	$currJm = '';
    	$firstLn = '';
    	$currKls = '';

    	if($rows <= 0){
    		$rsp .= "<tr><td colspan='4'>Belum ada Jadwal</td></tr>";
    	}else{
    		

    		for($i=0;$i<$rows;$i++){
    			$data = mysqli_fetch_array($query);
    			
    			if($currKls != $data['kelas_cd']){
    				$firstLn = '';
    				$rsp .= "</table><hr style='border-top: 3px double #8c8b8b;'><table class='table table-hover table-responsive-md text-center'><h4 class='text-center'>Kelas : " .$data['kelas_cd']. "</h3><br>";
    				$rsp .= "<tr class='thead-light'><th scope='row'>Jam</th>";

	    			if($currJm != $data['jam']){
	    				if($data['jam'] == '1'){
	    					$rsp .= "<th scope='row'>".$data['hari']."</th>";
	    					$firstLn .= "</tr><tr><th scope='row'>" .$data['jam']. "</th>";
	    					$firstLn .= "<td>" .$data['nama_mp']. "</td>";
	    				}elseif($data['jam'] == '2'){
	    					$rsp .= $firstLn;
	    					$rsp .= "</tr><tr><th scope='row'>" .$data['jam']. "</th>";
	    					$rsp .= "<td>" .$data['nama_mp']. "</td>";
	    				}else{
	    					$rsp .= "</tr><tr><th scope='row'>" .$data['jam']. "</th>";
	    					$rsp .= "<td>" .$data['nama_mp']. "</td>";
	    				}
	    				$currJm = $data['jam'];
	    			}else{
	    				if($data['jam'] == '1'){
	    					$rsp .= "<th scope='row'>".$data['hari']."</th>";
	    					$firstLn .= "<td>" .$data['nama_mp']. "</td>";
	    				}else{
	    					$rsp .= "<td>" .$data['nama_mp']. "</td>";
	    				}
	    				
	    			}
	    			$currKls = $data['kelas_cd'];
    			}else{
	    			if($currJm != $data['jam']){
	    				if($data['jam'] == '1'){
	    					$rsp .= "<th scope='row'>".$data['hari']."</th>";
	    					$firstLn .= "</tr><tr><th scope='row'>" .$data['jam']. "</th>";
	    					$firstLn .= "<td>" .$data['nama_mp']. "</td>";
	    				}elseif($data['jam'] == '2'){
	    					$rsp .= $firstLn;
	    					$rsp .= "</tr><tr><th scope='row'>" .$data['jam']. "</th>";
	    					$rsp .= "<td>" .$data['nama_mp']. "</td>";
	    				}else{
	    					$rsp .= "</tr><tr><th scope='row'>" .$data['jam']. "</th>";
	    					$rsp .= "<td>" .$data['nama_mp']. "</td>";
	    				}
	    				$currJm = $data['jam'];
	    			}else{
	    				if($data['jam'] == '1'){
	    					$rsp .= "<th scope='row'>".$data['hari']."</th>";
	    					$firstLn .= "<td>" .$data['nama_mp']. "</td>";
	    				}else{
	    					$rsp .= "<td>" .$data['nama_mp']. "</td>";
	    				}
	    				
	    			}
    			}
    		}
    	}

    	$rsp .= "|";

    	$queryChk = mysqli_query($connection, "SELECT ss.nisn, ss.nama, kl.kelas_cd, guru.guru_cd, guru.nama as gnama, mp.mp_cd, mp.nama_mp, nl.nilai FROM mata_pelajaran mp LEFT JOIN kelas kl on mp.kelas = kl.kelas LEFT JOIN guru on mp.mp_cd = guru.mp_cd LEFT JOIN siswa ss on kl.kelas_cd = ss.kelas_cd LEFT JOIN nilai nl on ss.nisn = nl.nisn and mp.mp_cd = nl.mp_cd WHERE ss.nisn = '$ssNisn' AND nl.nilai is null AND ss.nisn is not null ORDER BY kelas_cd");
    	$rows = mysqli_num_rows($queryChk);

    	if($rows > 0){
    		for($i=0;$i<$rows;$i++){
    			$data = mysqli_fetch_array($queryChk);

    			$rsp .= "<tr><th scope='row'>" .$data['kelas_cd']. "</th>";
	    		$rsp .= "<td>" .$data['gnama']. "</td>";
	    		$rsp .= "<td>" .$data['nama_mp']. "</td>";
	    		$rsp .= "<td>".$data['nilai']."</td></tr>";
	    	}
	    }

	    $queryChk = mysqli_query($connection, "SELECT ss.nisn, ss.nama, kl.kelas_cd, guru.guru_cd, kl.guru_cd, mp.mp_cd, guru.nama as gnama, mp.nama_mp, nl.nilai FROM nilai nl LEFT JOIN siswa ss on nl.nisn = ss.nisn LEFT JOIN kelas kl on nl.kelas_cd = kl.kelas_cd LEFT JOIN mata_pelajaran mp on nl.mp_cd = mp.mp_cd LEFT JOIN guru on mp.mp_cd = guru.mp_cd WHERE ss.nisn = '$ssNisn' ORDER BY kelas_cd");
		$rows = mysqli_num_rows($queryChk);

		if($rows > 0){
    		for($i=0;$i<$rows;$i++){
    			$data = mysqli_fetch_array($queryChk);

    			$rsp .= "<tr><th scope='row'>" .$data['kelas_cd']. "</th>";
	    		$rsp .= "<td>" .$data['gnama']. "</td>";
	    		$rsp .= "<td>" .$data['nama_mp']. "</td>";
	    		$rsp .= "<td>".$data['nilai']."</td></tr>";
	    	}
	    }

    	echo $rsp;
	}

?>