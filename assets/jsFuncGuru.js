/* 
File : jsfunction.js
Author : Danny Bastian M.
Use : Every Javascript function will be placed here for Sekolah-website project.
Version : 1.0.0
*/

$(document).ready(function(){
	
	//PROFILE

	$(document).on("click",".btn-updt-guru",function(e){
		var guruCd = $(".guru-cd").val();
		var guruNm = $(".guru-nm").val();
		var guruNip = $(".guru-nip").val();
		var guruTptLhr = $(".guru-tpt-lhr").val();
		var guruTglLhr = $(".guru-tgl-lhr").val();
		var guruAlmt = $(".guru-almt").val();
		var guruTlp = $(".guru-tlp").val();
		var guruPddk = $(".guru-pddk").val();
		var ScInd = 1;
	
		if(!guruNm || !guruNip || !guruTptLhr || !guruTglLhr || !guruAlmt || !guruTlp){
			$(".guru-err-msg").html("Silahkan lengkapi semua field.");
			ScInd = 0;
			return false;
		}

		if(ScInd == 1){
			$.ajax({
				type : 'POST',
				url : 'ajax-guru.php',
				data : {
					txInd : 'guru-update',
					guruCd : guruCd,
					guruNm : guruNm,
					guruNip : guruNip,
					guruTptLhr : guruTptLhr,
					guruTglLhr : guruTglLhr,
					guruAlmt : guruAlmt,
					guruTlp : guruTlp,
					guruPddk : guruPddk,
				},
				complete : function(response){
					$(".guru-err-msg").html(response.responseText);
				},
				erorr : function(){
					alert("Connection to database failed!");
				}
			});
			return false;
		}
	});

	//JADWAL

	function onLoadJadwal(e){
		var guruCd = $(".guru-cd").val();

		$.ajax({
			type : 'POST',
			url : 'ajax-guru.php',
			data : {
				txInd : 'guru-jadwal',
				guruCd : guruCd,
			},
			complete : function(response){
				$(".table-jadwal-guru").html(response.responseText);
			},
			erorr : function(){
				alert("Connection to database failed!");
			}
		});
		return false;
	};

	onLoadJadwal();

	function onLoadNilai(e){
		var guruCd = $(".guru-cd").val();

		$.ajax({
			type : 'POST',
			url : 'ajax-guru.php',
			data : {
				txInd : 'guru-nilai',
				guruCd : guruCd,
			},
			complete : function(response){
				var rsp = response.responseText.split("|");
				$(".table-nilai-insert").html(rsp[0]);
				$(".table-nilai-update").html(rsp[1]);
			},
			erorr : function(){
				alert("Connection to database failed!");
			}
		});
		return false;
	};

	onLoadNilai();

	$(document).on("click",".btn-ins-nilai",function(e){
		var nisn = $(this).attr("data-nisn");
		var kls = $(this).attr("data-kls");
		var guru = $(this).attr("data-gr");
		var mpCd = $(this).attr("data-mp");
		var nilai = document.getElementById(nisn).value;
		var ScInd = 1;

		if(!nilai){
			alert("Isi Kolom nilai terlebih dahulu!");
			ScInd = 0;
			return false;
		}

		if(ScInd == 1){
			$.ajax({
				type : 'POST',
				url : 'ajax-guru.php',
				data : {
					txInd : 'insert-nilai',
					nisn : nisn,
					kls : kls,
					guru : guru,
					mpCd : mpCd,
					nilai : nilai,
				},
				complete : function(response){
					onLoadNilai();
				},
				erorr : function(){
					alert("Connection to database failed!");
				}
			});
			return false;
		}
	});

	$(document).on("click",".btn-upd-nilai",function(e){
		var nisn = $(this).attr("data-nisn");
		var kls = $(this).attr("data-kls");
		var guru = $(this).attr("data-gr");
		var mpCd = $(this).attr("data-mp");
		var id = "up-" + nisn;
		var nilai = document.getElementById(id).value;
		var ScInd = 1;

		if(!nilai){
			alert("Isi Kolom nilai terlebih dahulu!");
			ScInd = 0;
			return false;
		}

		if(ScInd == 1){
			$.ajax({
				type : 'POST',
				url : 'ajax-guru.php',
				data : {
					txInd : 'update-nilai',
					nisn : nisn,
					kls : kls,
					guru : guru,
					mpCd : mpCd,
					nilai : nilai,
				},
				complete : function(response){
					alert("Nilai diupdate!")
					onLoadNilai();
				},
				erorr : function(){
					alert("Connection to database failed!");
				}
			});
			return false;
		}
	});
});