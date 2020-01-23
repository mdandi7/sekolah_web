<?php

    ob_start();
    $error=""; // Variable To Store Error Message
    $connection = mysqli_connect("localhost", "root", "", "sekolah");
    $txInd = $_POST['txInd'];
    $rsp=""; //Variable to store the response

    // MAPEL
    if($txInd == "TablesShow"){

    	//Show Guru
    	$query = mysqli_query($connection, "SELECT *, gr.guru_cd FROM guru gr LEFT JOIN kelas kls on gr.guru_cd = kls.guru_cd LEFT JOIN mata_pelajaran mp on gr.mp_cd = mp.mp_cd");
    	$rows = mysqli_num_rows($query);

    	if($rows <= 0){
    		$rsp .= "<tr><td colspan='4'>Belum ada Guru</td></tr>";
    	}else{
    		for($i=0;$i<$rows;$i++){
    			$data = mysqli_fetch_array($query);
    			$rsp .= "<tr><th scope='row'>" .$data['guru_cd']. "</th>";
    			$rsp .= "<td>" .$data['nama']. "</td>";
    			$rsp .= "<td>" .$data['nip']. "</td>";
    			$rsp .= "<td>" .$data['telp']. "</td>";
    			$rsp .= "<td>" .$data['jabatan']. "</td>";
    			$rsp .= "<td>" .$data['kelas_cd']. "</td>";
    			
    			$rsp .= "<td><input data-id='" .$data['guru_cd']. "' class='btn-non-guru btn btn-md btn-primary btn-info btn-block' type='submit' value='Nonaktifkan'></td></tr>";
    		}
    	}

    	$rsp .= "|";

    	//Show Siswa
    	$query = mysqli_query($connection, "SELECT * FROM siswa");
    	$rows = mysqli_num_rows($query);
    	$alm = '';
    	if($rows <= 0){
    		$rsp .= "<tr><td colspan='4'>Belum ada Siswa</td></tr>";
    	}else{
    		for($i=0;$i<$rows;$i++){
    			$data = mysqli_fetch_array($query);
    			$alm = '';
    			if($data['alumni_ind'] == 1){
    				$alm = 'disabled'; 
    			}

    			$rsp .= "<tr><th scope='row'>" .$data['nisn']. "</th>";
    			$rsp .= "<td>" .$data['nama']. "</td>";
    			$rsp .= "<td>" .$data['jenis_kelamin']. "</td>";
    			$rsp .= "<td>" .$data['alamat']. "</td>";
    			$rsp .= "<td>" .$data['kelas_cd']. "</td>";
    			$rsp .= "<td>" .$data['tahun_masuk']. "</td>";
    			$rsp .= "<td>" .$data['tahun_keluar']. "</td>";
    			$rsp .= "<td><input data-id='" .$data['nisn']. "' class='btn-alm-siswa btn btn-md btn-primary btn-info btn-block' type='submit' value='Alumni' $alm></td></tr>";
    		}
    	}

    	$rsp .= "|";

    	//Show Mapel
    	$query = mysqli_query($connection, "SELECT * FROM mata_pelajaran");
    	$rows = mysqli_num_rows($query);

    	if($rows <= 0){
    		$rsp .= "<tr><td colspan='4'>Belum ada Mata Pelajaran</td></tr>";
    	}else{
    		for($i=0;$i<$rows;$i++){
    			$data = mysqli_fetch_array($query);
    			$rsp .= "<tr><th scope='row'>" .$data['mp_cd']. "</th>";
    			$rsp .= "<td>" .$data['nama_mp']. "</td>";
    			$rsp .= "<td>" .$data['kelas']. "</td>";
    			$rsp .= "<td><input data-id='" .$data['mp_cd']. "' class='btn-delete-mp btn btn-md btn-primary btn-info btn-block' type='submit' value='Delete'></td></tr>";
    		}
    	}

    	$rsp .= "|";

    	//Show Kelas
    	$query = mysqli_query($connection, "SELECT * FROM kelas LEFT JOIN guru on kelas.guru_cd = guru.guru_cd");
    	$rows = mysqli_num_rows($query);
    	
    	if($rows <= 0){
    		$rsp .= "<tr><td colspan='4'>Belum ada Siswa</td></tr>";
    	}else{
    		for($i=0;$i<$rows;$i++){
    			$data = mysqli_fetch_array($query);

    			$rsp .= "<tr><th scope='row'>" .$data['kelas_cd']. "</th>";
    			$rsp .= "<td>" .$data['kelas']. "</td>";
    			$rsp .= "<td>" .$data['nama']. "</td></tr>";
    		}
    	}


    	$rsp .= "|";

		//Show Jadwal
    	$query = mysqli_query($connection, "SELECT * FROM jadwal LEFT JOIN mata_pelajaran mp on jadwal.mp_cd = mp.mp_cd ORDER BY kelas_cd, jam, hari desc");
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
    	echo $rsp;

    }
?>