/* 
File : jsfunction.js
Author : Danny Bastian M.
Use : Every Javascript function will be placed here for Sekolah-website project.
Version : 1.0.0
*/

$(document).ready(function(){
	
	//PROFILE
	$(document).on("click",".btn-updt-ss",function(e){
		var ssNisn = $(".ss-nisn").val();
		var ssNm = $(".ss-nm").val();
		var ssJk = $(".ss-jk").val();
		var ssTglLhr = $(".ss-tgl-lhr").val();
		var ssAlmt = $(".ss-almt").val();
		var ssTlp = $(".ss-tlp").val();
		var ScInd = 1;

		if(!ssNisn || !ssNm || !ssJk || !ssTglLhr || !ssAlmt || !ssTlp){
			$(".siswa-err-msg").html("Silahkan lengkapi semua field.");
			ScInd = 0;
			return false;
		}

		if(ScInd == 1){
			$.ajax({
				type : 'POST',
				url : 'ajax-siswa.php',
				data : {
					txInd : 'siswa-update',
					ssNisn : ssNisn,
					ssNm : ssNm,
					ssJk : ssJk,
					ssTglLhr : ssTglLhr,
					ssAlmt : ssAlmt,
					ssTlp : ssTlp,
				},
				complete : function(response){
					location.reload();
				},
				erorr : function(){
					alert("Connection to database failed!");
				}
			});
			return false;
		}

	});

	function onLoadTables(e){
		var klsCd = $(".ss-kls").val();
		var ssNisn = $(".ss-nisn").val();

		$.ajax({
			type : 'POST',
			url : 'ajax-siswa.php',
			data :{
				txInd : 'TablesShow',
				klsCd : klsCd,
				ssNisn : ssNisn,
			},
			complete : function(resp){
				var rsp = resp.responseText.split("|");
				$(".jadwal-table").html(rsp[0]);
				$(".table-nilai-ss").html(rsp[1]);
			},
			erorr : function(){
				alert("Connection to database failed!");
			}

		});
	};

	onLoadTables();
});