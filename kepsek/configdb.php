<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "root", "", "sekolah");
// Selecting Database
//$db = mysqli_select_db("test", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_kepsek'];
// SQL Query To Fetch Complete Information Of User
$ses_sql = mysqli_query($connection, "select * from guru left join mata_pelajaran mp on guru.mp_cd = mp.mp_cd where nip='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['nama'];
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location:../ind-login.php'); // Redirecting To Home Page
}
?>