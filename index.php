<?php
include "string.php";
include "configdb.php";

// $con = OpenCon();
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $nama_aplikasi ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">

	<style type="text/css">
		.navbar {
			padding: .8rem;
		}
		.navbar-nav li {
			padding-right: 20px;
		}
    @media (min-width: 768px) {
    .carousel-multi-item-2 .col-md-3 {
    float: left;
    width: 25%;
    max-width: 100%; } }

    .carousel-multi-item-2 .card img {
    border-radius: 2px; }
	</style>
</head>
<body class="text-monospace">



<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid mb-0 shadow" style="background-color: #555555; background-size: 100%">
  <div class="container-fluid pl-5">
    <h1 class="display-5 text-light"><img src="1.jpg" width="20%" class="rounded-circle img-thumbnail"> Sistem Informasi Sekolah</h1>
    <p  class="lead text-light">Sekolah apa nih..?</p>
  </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark pl-4 fixed-top sticky-top shadow" style="background-color: #333333;">
<!-- <a class="navbar-brand" href="#"><img src="4.jpeg" width="30" height="30" class="d-inline-block align-top rounded-circle">
Website Sekolah
</a> -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="nav navbar-nav ml-auto mr-sm-2">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Beranda<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="input_data.php">Olah Data</a>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Managemen Data</a>
        <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Input  Kelas</a>
          <a class="dropdown-item" href="#">Input  Guru</a>
          <a class="dropdown-item" href="#">Input Jadwal Menagajar</a>
          <a class="dropdown-item" href="#">Input  Wali Kelas</a>
        </div>
      </li> -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
        <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid row pl-0 pb-0">
  <div class="col-4 bg-dark pb-3">
    <div class="list-group " id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Website Sekolah</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
      <a class="list-group-item list-group-item-action" id="list-guru-list" data-toggle="list" href="#list-guru" role="tab" aria-controls="guru">Daftar Guru</a>
      <a class="list-group-item list-group-item-action" id="list-siswa-list" data-toggle="list" href="#list-siswa" role="tab" aria-controls="siswa">Daftar Siswa</a>
      <a class="list-group-item list-group-item-action" id="list-mapel-list" data-toggle="list" href="#list-mapel" role="tab" aria-controls="mapel">Daftar Mata Pelajaran</a>
      <a class="list-group-item list-group-item-action" id="list-kelas-list" data-toggle="list" href="#list-kelas" role="tab" aria-controls="kelas">Daftar Kelas</a>
    </div>
  </div>
  <div class="col-8">
    <div class="tab-content pt-4" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">SISTEM INFORMASI SEKOLAH</div>
      <div class="tab-pane fade text-justify" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
        <h4 class="">Visi, Misi dan Tujuan</h5><br><br>
        <h5 class="">Visi Sekolah</h5>
        <p>” MEWUJUDKAN SISWA – SISWI YANG BERPRESTASI, BERIMAN DAN BERTAQWA KEPADA  TUHAN YANG MAHA ESA SERTA CINTA TERHADAP LINGKUNGAN. ”</p>
        <h5 class="">Misi Sekolah</h5>
        <p>Untuk mewujudkan Visi tersebut, Sekolah menentukan langkah – langkah strategis yang dinyatakan dalam Misi berikut :</p>
        <p><li>Mewujudkan/menciptakan siswa yang taat beribadah</li>
        <li>Membentuk sikap dan prilaku yang baik, santun, sopan dan berkarakter.</li>
        <li>Mewujudkan siswa/i yang disiplin</li>
        <li>Menciptakan suasana Pembelajaran yang aktif, inovatif, kreatif, efektif,  menyenangkan, gembira dan berbobot</li>
        <li>Mewujudkan siswa yang berprestasi</li>
        <li>Mewujudkan suasana kekeluargaan antar warga sekolah</li>
        <li>Mewujudkan sekolah hijau ( Gereen School ).</li>
        <li>Pembiasaan 3 K( Kebersihan diri, Kebersihan Kelas, dan Kebersihan lingkungan) dan 3S (Senyum, Sapa, Salam)</li></p>
      </div>
      <div class="tab-pane fade" id="list-guru" role="tabpanel" aria-labelledby="list-guru-list">
        <table class="table table-hover table-responsive-md text-center"><h4 class="text-center">Laporan Daftar Guru Pengajar</h3><br>
          <thead class="thead-light">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Guru</th>
              <th scope="col">NIP</th>
              <th scope="col">Alamat</th>
              <th scope="col">No. Telepon</th>
              <th scope="col">Kelas Mengajar</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>@mdo</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
              <td>@mdo</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
              <td>@mdo</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
              <td>@mdo</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">5</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
              <td>@mdo</td>
              <td>@mdo</td>
            </tr>
          </tbody>
        </table><br>
        <table class="table table-hover table-responsive-md text-center"><h4 class="text-center">Laporan Daftar Wali Kelas</h3><br>
          <thead class="thead-light">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kelas</th>
              <th scope="col">Nama Wali Kelas</th>
              <th scope="col">Tahun Pelajaran</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
            </tr>
            <tr>
              <th scope="row">5</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="list-siswa" role="tabpanel" aria-labelledby="list-siswa-list">
        <table class="table table-hover table-responsive-md text-center"><h4 class="text-center">Laporan Daftar Siswa</h3><br>
          <thead class="thead-light">
            <tr>
              <th scope="col">No</th>
              <th scope="col">NISN</th>
              <th scope="col">Nama Siswa</th>
              <th scope="col">Alamat</th>
              <th scope="col">Kelas</th>
              <th scope="col">Tahun Masuk</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>123456789643</td>
              <td>Danny Bastian Manurung</td>
              <td>Jl. Haluoleo Komp. Bumi Praja</td>
              <td>@mdo</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
              <td>@mdo</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
              <td>@mdo</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
              <td>@mdo</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">5</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
              <td>@mdo</td>
              <td>@mdo</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="list-mapel" role="tabpanel" aria-labelledby="list-mapel-list">
        <table class="table table-hover table-responsive-md text-center"><h4 class="text-center">Laporan Daftar Mata Pelajaran</h3><br>
          <thead class="thead-light">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kode</th>
              <th scope="col">Mata Pelajaran</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry</td>
              <td>the Bird</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Larry</td>
              <td>the Bird</td>
            </tr>
            <tr>
              <th scope="row">5</th>
              <td>Larry</td>
              <td>the Bird</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="list-kelas" role="tabpanel" aria-labelledby="list-kelas-list">
        <table class="table table-hover table-responsive-md text-center"><h4 class="text-center">Laporan Daftar Kelas</h3><br>
          <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<!-- Footer -->
<footer class="page-footer text-light font-small unique-color-dark pt-1" style="background-color: #555555">

  <!-- Footer Links -->
  <div class="container text-justify text-md-left mt-5" >

    <!-- Grid row -->
    <div class="row mt-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4" >

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">Company name</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
          consectetur
          adipisicing elit.</p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Another Link</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="#!">MDBootstrap</a>
        </p>
        <p>
          <a href="#!">MDWordPress</a>
        </p>
        <p>
          <a href="#!">BrandFlow</a>
        </p>
        <p>
          <a href="#!">Bootstrap Angular</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Social Media</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="#!">Your Account</a>
        </p>
        <p>
          <a href="#!">Become an Affiliate</a>
        </p>
        <p>
          <a href="#!">Shipping Rates</a>
        </p>
        <p>
          <a href="#!">Help</a>
        </p>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Contact</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p> New York, NY 10012, US</p>
        <p>info@example.com</p>
        <p>+ 01 234 567 88</p>
        <p>+ 01 234 567 89</p>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3" style="background-color: #333333">© 2019 Copyright:
    <a href="#">Sekolah apa nih..</a>, All right reserved.
  </div>
  <!-- Copyright -->

</footer>


</body>

<script src="assets/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</html>