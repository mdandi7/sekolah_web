<?php
    ob_start();
    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message
    if (isset($_POST['submit'])) {
        if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
        }
        else
        {
            // Define $username and $password
            $username=$_POST['username'];
            $password=$_POST['password'];
            $session_nm=$_POST['sessionname'];
            // Establishing Connection with Server by passing server_name, user_id and password as a parameter
            $connection = mysqli_connect("localhost", "root", "", "sekolah");
            // To protect MySQL injection for Security purpose
            $username = stripslashes($username);
            $password = stripslashes($password);
            $username = mysqli_real_escape_string($connection, $username);
            $password = mysqli_real_escape_string($connection, $password);

            // SQL query to fetch information of registerd users and finds user match.
            if($session_nm == "0"){
                $error = "Pilih Login session anda";
            
            //Siswa authorize
            }elseif($session_nm == "siswa"){
                $query = mysqli_query($connection, "select * from siswa where password='$password' AND nisn='$username'");

                $rows = mysqli_num_rows($query);
                $result = mysqli_fetch_assoc($query);
                
                if ($rows == 0) {
                    $error = "Username or Password is invalid";
                }else{
                    $_SESSION['login_siswa']=$username; // Initializing Session
                    header("Location: siswa/index.php"); // Redirecting To Other Page                
                }

            //Guru authorize
            }elseif($session_nm == "guru"){
                $query = mysqli_query($connection, "select * from guru where password='$password' AND guru_cd='$username'");

                $rows = mysqli_num_rows($query);
                $result = mysqli_fetch_assoc($query);
                
                if ($rows == 0) {
                    $error = "Username or Password is invalid";
                }elseif($result['jabatan'] == "Kepala Sekolah"){
                    $_SESSION['login_kepsek']=$username; // Initializing Session
                    header("Location: kepsek/index.php"); // Redirecting To Other Page                
                }else{
                    $_SESSION['login_guru']=$username; // Initializing Session
                    header("Location: guru/index.php"); // Redirecting To Other Page                
                }

            //Admin authorize
            }elseif($session_nm == "admin"){
                $query = mysqli_query($connection, "select * from user where password='$password' AND username='$username'");

                $rows = mysqli_num_rows($query);
                $result = mysqli_fetch_assoc($query);
                
                if ($rows == 0) {
                    $error = "Username or Password is invalid";
                }else{
                    $_SESSION['login_admin']=$username; // Initializing Session
                    header("Location: index.php"); // Redirecting To Other Page                
                }
            }

            ob_end_flush();
            mysqli_close($connection); // Closing Connection
        }
    }
?>