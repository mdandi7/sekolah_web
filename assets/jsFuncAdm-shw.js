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
			url : 'ajax-adm.php',
			data :{
				txInd : 'TablesShow'
			},
			complete : function(resp){
				$(".mp-table").html(resp.responseText);
			},
			erorr : function(){
				alert("Connection to database failed!");
			}

		});
	};

	onLoadTables();
});