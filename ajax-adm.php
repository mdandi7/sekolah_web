<?php

    ob_start();
    $error=""; // Variable To Store Error Message
    $connection = mysqli_connect("localhost", "root", "", "sekolah");
    $txInd = $_POST['txInd'];
    $rsp=""; //Variable to store the response

    // MAPEL
    if($txInd == "TablesShow"){
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

    	echo $rsp;

    }elseif($txInd == "mapel-id"){
    	$kelas = $_POST['kelas'];

    	if($kelas == "X"){
    		$query = mysqli_query($connection, "SELECT substr(mp_cd,5) as max FROM mata_pelajaran WHERE kelas = '$kelas' ORDER BY mp_cd DESC");	
    	}elseif($kelas == "XI"){
    		$query = mysqli_query($connection, "SELECT substr(mp_cd,6) as max FROM mata_pelajaran WHERE kelas = '$kelas' ORDER BY mp_cd DESC");
    	}else{
    		$query = mysqli_query($connection, "SELECT substr(mp_cd,7) as max FROM mata_pelajaran WHERE kelas = '$kelas' ORDER BY mp_cd DESC");
    	}
    	
    	$data = mysqli_fetch_array($query);

    	$maxPlus = $data['max'] + 1;

    	echo $maxPlus;
    }elseif($txInd == "mapel-insert"){
    	$mpCd = $_POST['mpCd'];
    	$mpNm = $_POST['mpNm'];
    	$kelas = $_POST['kelas'];

    	$query = mysqli_query($connection, "INSERT INTO mata_pelajaran VALUES('$mpCd','$mpNm','$kelas')");
    }elseif($txInd == "mapel-for-guru"){
    	$query = mysqli_query($connection, "SELECT * FROM mata_pelajaran ORDER BY nama_mp");
		$rows = mysqli_num_rows($query);

		$rsp .= "<select class='form-control guru-mp-cd' placeholder='Mata Pelajaran'>";
        $rsp .= "<option value='0' selected hidden readonly>Mata Pelajaran</option>";

    	if($rows <= 0){
    		$rsp .= "<option value='0'>Belum Ada Mata Pelajaran</option>";
    	}else{
    		for($i=0;$i<$rows;$i++){
    			$data = mysqli_fetch_array($query);
    			$rsp .= "<option value='" .$data['mp_cd']. "'>" .$data['nama_mp']. "</option>";
    		}
    	}

    	$rsp .= "</select>";

    	echo $rsp;
    }


?>