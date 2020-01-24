/* 
File : jsfunction.js
Author : Danny Bastian M.
Use : Every Javascript function will be placed here for Sekolah-website project.
Version : 1.0.0
*/

$(document).ready(function(){
	function onLoadTables(e){
		$.ajax({
			type : 'POST',
			url : 'ajax-adm-show.php',
			data :{
				txInd : 'TablesShow'
			},
			complete : function(resp){
				var rsp = resp.responseText.split("|");
				$(".guru-table").html(rsp[0]);
				$(".siswa-table").html(rsp[1]);
				$(".mp-table").html(rsp[2]);
				$(".kls-table").html(rsp[3]);
				$(".jadwal-table").html(rsp[4]);
			},
			erorr : function(){
				alert("Connection to database failed!");
			}

		});
	};

	onLoadTables();


	$(document).on("click",".btn-non-guru",function(e){
		var guruCd = $(this).attr("data-id");

		$.ajax({
			type : 'POST',
			url : 'ajax-adm-show.php',
			data :{
				txInd : 'guru-nonaktif',
				guruCd : guruCd,
			},
			complete : function(resp){
				onLoadTables();
			},
			erorr : function(){
				alert("Connection to database failed!");
			}

		});
		return false;
	});

	$(document).on("click",".btn-alm-siswa",function(e){
		var nisn = $(this).attr("data-id");

		$.ajax({
			type : 'POST',
			url : 'ajax-adm-show.php',
			data :{
				txInd : 'siswa-alm',
				nisn : nisn,
			},
			complete : function(resp){
				onLoadTables();
			},
			erorr : function(){
				alert("Connection to database failed!");
			}

		});
		return false;
	});

	$(document).on("click",".btn-delete-mp",function(e){
		var mpCd = $(this).attr("data-id");

		$.ajax({
			type : 'POST',
			url : 'ajax-adm-show.php',
			data :{
				txInd : 'mp-dlt',
				mpCd : mpCd,
			},
			complete : function(resp){
				onLoadTables();
			},
			erorr : function(){
				alert("Connection to database failed!");
			}

		});
		return false;
	});
});