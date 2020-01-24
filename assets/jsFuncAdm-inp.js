/* 
File : jsfunction.js
Author : Danny Bastian M.
Use : Every Javascript function will be placed here for Sekolah-website project.
Version : 1.0.0
*/

$(document).ready(function(){

	//Automation Date
	function fillDate(){
	  var today = new Date();
	  if(today.getDate() < 10){
	    var date = '-0'+today.getDate();
	  }else{
	    var date = '-'+today.getDate();
	  }
	  if((today.getMonth()+1) < 10){
	    var month = '-0'+(today.getMonth()+1);
	  }else {
	    var month = '-'+(today.getMonth()+1);
	  }

	  var fullDate = today.getFullYear()+month+date;
	  $("input[type=date]").val(fullDate);
	  //document.getElementById("tgl1").value = fullDate;
	};
	fillDate();
	
	//MAPEL
	$(document).on("change",".mp-kelas",function(e){

		var th_v = $(this).val();
		var mpStts = "";

		if(th_v == "X"){
			mpStts = "MP-X";
		}else if(th_v == "XI"){
			mpStts = "MP-XI";
		}else if(th_v == "XII"){
			mpStts = "MP-XII";
		}

		$.ajax({
			type : 'POST',
			url : 'ajax-adm.php',
			data : {
				txInd : 'mapel-id',
				kelas : th_v,
			},
			complete : function(response){
				mpStts = mpStts + response.responseText;
				$(".mp-cd").val(mpStts);
			},
			erorr : function(){
				alert("Connection to database failed!");
			}
		});
	});

	$(document).on("click",".btn-add-mapel",function(e){

		$(".mp-err-msg").html("");
		var mp_cd = $(".mp-cd").val();
		var mp_nm = $(".mp-name").val();
		var kelas = $(".mp-kelas").val();

		if(!mp_nm){
			$(".mp-err-msg").html("Isi Nama Mata-Pelajaran!");
			return false;
		}else if(kelas == "0"){
			$(".mp-err-msg").html("Pilih kelas!");
			return false;
		}

		$.ajax({
			type : 'POST',
			url : 'ajax-adm.php',
			data : {
				txInd : 'mapel-insert',
				mpCd : mp_cd,
				mpNm : mp_nm,
				kelas : kelas,
			},
			complete : function(response){
				$(".mp-err-msg").html(mp_nm + " telah di input");
				$(".mp-kelas").trigger("change");
				$(".mp-name").val("");
				onLoadMpGuru();
			},
			erorr : function(){
				alert("Connection to database failed!");
			}
		});
	});
	// END OF MAPEL

	//GURU
	function onLoadMpGuru(e){
		$.ajax({
			type : 'POST',
			url : 'ajax-adm.php',
			data : {
				txInd : 'mapel-for-guru',
			},
			complete : function(response){
				$(".option-guru-mp").html(response.responseText);
			},
			erorr : function(){
				alert("Connection to database failed!");
			}
		});
	}

	onLoadMpGuru();

	$(document).on("change",".guru-mp-cd",function(e){
		var mpCd = $(this).val();
		
		$.ajax({
			type : 'POST',
			url : 'ajax-adm.php',
			data : {
				txInd : 'guruCd-find',
				mpCd : mpCd,
			},
			complete : function(response){
				var GuruCd = parseInt(response.responseText)+ 1;
				mpCd = mpCd.replace("-","");
				GuruCd = "GR" + mpCd + "-" + GuruCd;
				$(".guru-cd").val(GuruCd);
			},
			erorr : function(){
				alert("Connection to database failed!");
			}
		});
	})

	$(document).on("click",".btn-add-guru",function(e){

		$(".guru-err-msg").html("");

		var guruMpCd = $(".guru-mp-cd").val();
		var ScInd = 1;
		//alert(guruMpCd);

		$(".form-input-guru").find("select").each(function(){

			var pd = $(this).attr("placeholder");
			var pdFinal = 'Pilih ' + pd;
		
			 if($(this).val() == '0'){
				$(".guru-err-msg").html(pdFinal);
				ScInd = 0;
				return false;
			}
		});

		$(".form-input-guru").find("input").each(function(){
			
			var pd = $(this).attr("placeholder");
			var pdFinal = pd + ' Tidak boleh kosong!';
		
			if($(this).val() == ''){
				$(".guru-err-msg").html(pdFinal);
				ScInd = 0;
				return false;				
			}
		});

		if(ScInd == 1){
			var guruCd = $(".guru-cd").val();
			var guruNm = $(".guru-nm").val();
			var guruNIP = $(".guru-nip").val();
			var guruJnsKlm = $(".guru-jns-klm").val();
			var guruTptLhr = $(".guru-tpt-lhr").val();
			var guruTglLhr = $(".guru-tgl-lhr").val();
			var guruAlmt = $(".guru-alamat").val();
			var guruTlp = $(".guru-tlp").val();
			var guruPddk = $(".guru-pddk").val();
			var guruJbtn = $(".guru-jbtn").val();
			var guruPass = $(".guru-pass").val();
			var guruMp = $(".guru-mp-cd").val();

			$.ajax({
				type : 'POST',
				url : 'ajax-adm.php',
				async : false,
				data : {
					txInd : 'guru-insert',
					guruCd : guruCd,
					guruNm : guruNm,
					guruNIP : guruNIP,
					guruJnsKlm : guruJnsKlm,
					guruTptLhr : guruTptLhr,
					guruTglLhr : guruTglLhr,
					guruAlmt : guruAlmt,
					guruTlp : guruTlp,
					guruPddk : guruPddk,
					guruJbtn : guruJbtn,
					guruPass : guruPass,
					guruMp : guruMp,
				},
				complete : function(response){
					if(response.responseText == '1'){
						$(".guru-err-msg").html("Guru " + guruNm + " berhasil di input");
						$(".guru-mp-cd").trigger("change");
						$(".form-input-guru").find("input").each(function(){
							$(this).val('');
						});
						fillDate();
						onLoadGrKelas();	
					}else{
						$(".guru-err-msg").html("NIP ini telah terpakai");
					}
					
				},
				erorr : function(){
					alert("Connection to database failed!");
				}
			});
			return false;
		}else{
			return false;
		}
		
	});
	// END OF GURU

	//KELAS
	function onLoadGrKelas(e){
		$.ajax({
			type : 'POST',
			url : 'ajax-adm.php',
			data : {
				txInd : 'guru-for-kelas',
			},
			complete : function(response){
				$(".option-kelas-guru").html(response.responseText);
			},
			erorr : function(){
				alert("Connection to database failed!");
			}
		});
	}

	onLoadGrKelas();

	$(document).on("change",".kelas-kls",function(e){
		var kls = $(this).val();

		$.ajax({
			type : 'POST',
			url : 'ajax-adm.php',
			data : {
				txInd : 'kelas-find',
				kls : kls,
			},
			complete : function(response){
				var klsNum = parseInt(response.responseText)+ 1;
				kelasCd = kls + "-" + klsNum;
				$(".kls-cd").val(kelasCd);
			},
			erorr : function(){
				alert("Connection to database failed!");
			}
		});
	})

	$(document).on("click",".btn-add-kls",function(e){

		$(".kls-err-msg").html("");
		var klsGuruCd = $(".kelas-guru-cd").val();
		var kelasKls = $(".kelas-kls").val();
		var klsCd = $(".kls-cd").val();
		var ScInd = 1;

		if(kelasKls == "0"){
			$(".kls-err-msg").html("Pilih Kelas.");
			ScInd = 0;
			return false;
		}

		if(klsGuruCd == "0"){
			$(".kls-err-msg").html("Pilih Wali Kelas.");
			ScInd = 0;
			return false;
		}

		if(ScInd == 1){
			$.ajax({
				type : 'POST',
				url : 'ajax-adm.php',
				async : false,
				data : {
					txInd : 'kls-insert',
					klsGuruCd : klsGuruCd,
					kelasKls : kelasKls,
					klsCd : klsCd,
				},
				complete : function(response){
					$(".kls-err-msg").html("Kelas " + klsCd + " telah di input");
					$(".kelas-kls").trigger("change");
					onLoadJadwalKelas();
				},
				erorr : function(){
					alert("Connection to database failed!");
				}
			});
			return false;
		}
	});
	// END OF KELAS

	// JADWAL 

	function onLoadJadwalKelas(e){
		$.ajax({
			type : 'POST',
			url : 'ajax-adm.php',
			data : {
				txInd : 'jadwal-drop-down',
			},
			complete : function(response){
				$(".option-jadwal-kls").html(response.responseText);
			},
			erorr : function(){
				alert("Connection to database failed!");
			}
		});
	}

	onLoadJadwalKelas();

	$(document).on("change",".jadwal-kls-cd, .jadwal-hari, .jadwal-jam",function(e){
		var kls = $(".jadwal-kls-cd").val();
		var hari = $(".jadwal-hari").val();
		var jam = $(".jadwal-jam").val();
		var ScInd = 1;

		if(kls == '0' || hari == '0' || jam == '0'){
			//$("jadwal-err-msg").html("Pilih Option dibawah");
			ScInd = 0;
			return false;

		}

		if(ScInd == 1){
			$.ajax({
				type : 'POST',
				url : 'ajax-adm.php',
				async : false,
				data : {
					txInd : 'jadwal-find',
					kls : kls,
					hari : hari,
					jam : jam,
				},
				complete : function(response){
					$(".option-jadwal-mp").html(response.responseText);
					$(".jadwal-mp-cd").trigger("change");
				},
				erorr : function(){
					alert("Connection to database failed!");
				}
			});	
		}
		
	})

	$(document).on("change",".jadwal-mp-cd",function(e){
		var kls = $(".jadwal-kls-cd").val();
		var hari = $(".jadwal-hari").val();
		var jam = $(".jadwal-jam").val();
		var mpCd = $(this).val();
		ScInd = 1;

		if(kls == '0' || hari == '0' || jam == '0'){
			//$("jadwal-err-msg").html("Pilih Option dibawah");
			ScInd = 0;
			return false;

		}

		if(ScInd == 1){
			$.ajax({
				type : 'POST',
				url : 'ajax-adm.php',
				async : false,
				data : {
					txInd : 'jadwal-guru-find',
					mpCd : mpCd,
					kls : kls,
					hari : hari,
					jam : jam,
				},
				complete : function(response){
					$(".option-jadwal-guru").html(response.responseText);
				},
				erorr : function(){
					alert("Connection to database failed!");
				}
			});	
		}
	});

	$(document).on("click",".btn-add-jadwal",function(e){
		var kls = $(".jadwal-kls-cd").val();
		var hari = $(".jadwal-hari").val();
		var jam = $(".jadwal-jam").val();
		var mpCd = $(".jadwal-mp-cd").val();
		var guruCd = $(".jadwal-guru-cd").val();
		var ScInd = 1;

		if(kls == '0' || hari == '0' || jam == '0' || mpCd == '0' || guruCd == '0'){
			$(".jadwal-err-msg").html("Lengkapi Pilihan");
			ScInd = 0;
			return false
		}

		if(ScInd == 1){
			$.ajax({
				type : 'POST',
				url : 'ajax-adm.php',
				data : {
					txInd : 'jadwal-insert',
					mpCd : mpCd,
					kls : kls,
					hari : hari,
					jam : jam,
					guruCd : guruCd,
				},
				complete : function(response){
					$(".jadwal-err-msg").html("Jadwal Berhasil di submit");
				},
				erorr : function(){
					alert("Connection to database failed!");
				}
			});	
		}
	});

	// END OF JADWAL

	//SISWA
	function onLoadSiswaKelas(e){
		$.ajax({
			type : 'POST',
			url : 'ajax-adm.php',
			data : {
				txInd : 'siswa-drop-down',
			},
			complete : function(response){
				$(".option-siswa-kls").html(response.responseText);
			},
			erorr : function(){
				alert("Connection to database failed!");
			}
		});
	}

	onLoadSiswaKelas();

	$(document).on("click",".btn-add-siswa",function(e){
		var sNisn = $(".siswa-nisn").val();
		var sNm = $(".siswa-nm").val();
		var sKls = $(".siswa-kls-cd").val();
		var sThnMsk = $(".siswa-thn-msk").val();
		var sPass = $(".siswa-pass").val();
		var ScInd = 1;

		if(!sNisn || !sNm || !sKls || !sThnMsk || !sPass){
			$(".siswa-err-msg").html("Isi data dengan benar!");
			ScInd = 0;
			return false;
		}

		if(ScInd == 1){
			$.ajax({
				type : 'POST',
				url : 'ajax-adm.php',
				data : {
					txInd : 'siswa-insert',
					sNisn : sNisn,
					sNm : sNm,
					sKls : sKls,
					sThnMsk : sThnMsk,
					sPass : sPass,
				},
				complete : function(response){
					$(".siswa-err-msg").html(response.responseText);
				},
				erorr : function(){
					alert("Connection to database failed!");
				}
			});
			return false;
		}
	});
//END OF FILE
});