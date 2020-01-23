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
});