<?php
include "string.php";
include "login.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $nama_aplikasi ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="assets/jquery-3.4.1.min.js" type="text/javascript"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    
    <!-- JS -->
    <script type="text/javascript">
    	$(document).ready(function(){
    		
    		$(document).on("change",".session-sel",function(e){
    			var ses = $(this).val();
    			if(ses == "siswa"){
    				$("#username").attr("placeholder","NISN");
    			}else if(ses == "guru"){
    				$("#username").attr("placeholder","NIP");
    			}else{
    				$("#username").attr("placeholder","Username");
    			}
    		});

    	});
    </script>
</head>

<body class="text-center mt-5">
	<section class="container-fluid pt-5">
		<section class="row justify-content-center">
			<section class="col-12 col-sm-6 col-md-3">
				<form class="form-signin" method="post">
				  <img class="mb-3" src="4.jpeg" alt="" width="75">
				  <h1 class="h3 mb-4 font-weight-normal">Please sign in</h1>
				  <span><?php echo $error; ?></span><br>
				  <select name="sessionname" class="form-control session-sel">
					  <option value="0" selected hidden>Login Sebagai</option>
					  <option value="siswa">Siswa</option>
					  <option value="guru">Guru</option>
					  <option value="admin">Administrator</option>
				  </select><br>
				  <input type="text" id="username" name="username"class="form-control" placeholder="Username" required autofocus><br>	
				  <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
				  <div class="checkbox mb-3">
				    <label>
				     <input type="checkbox" value="remember-me"> Remember me
				    </label>
				  </div>
				  <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" id='submit'></input>
				  <!-- <div class="mt-2 font-weight-bold"><a href="guest_login/guest_login.php">Login as Guest !</a></div> -->
				  <p class="mt-5 mb-3 text-muted">&copy; Sistem Informasi Sekolah</p>
				</form>
			</section>
		</section>
	</section>
</body>
</html>
