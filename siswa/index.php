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
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">

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

  <script src="../assets/jquery-3.4.1.min.js" type="text/javascript"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="../assets/jsFuncSiswa.js" type="text/javascript"></script>\

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
      <!-- <li class="nav-item">
        <a class="nav-link" href="input_data.php">Input Data</a>
      </li> -->
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
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $row['nama']; ?></a>
        <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../logout.php">Logout</a>
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
      <a class="list-group-item list-group-item-action" id="list-jadwal-list" data-toggle="list" href="#list-jadwal" role="tab" aria-controls="jadwal">Jadwal</a>
      <a class="list-group-item list-group-item-action" id="list-input-list" data-toggle="list" href="#list-input" role="tab" aria-controls="input">Nilai</a>
    </div>
  </div>
  <div class="col-8">
    <div class="tab-content pt-4" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
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

      <!-- PROFILE GURU -->
      <div class="tab-pane fade text-justify" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
        <div class="form-input-guru">
        <div class="siswa-err-msg" align="center" style="color: red"></div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">NISN</label>
          <div class="col-sm-8">
            <input type="text" class="form-control ss-nisn" placeholder="NISN" value="<?php echo $row['nisn'];?>" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Nama</label>
          <div class="col-sm-8">
            <input type="text" class="form-control ss-nm" placeholder="Nama" value="<?php echo $row['nama'];?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-8">
            <select class="form-control ss-jk" placeholder="Pendidikan">
              <option value="<?php echo $row['jenis_kelamin'];?>" selected hidden readonly><?php echo $row['jenis_kelamin'];?></option>
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
          <div class="col-sm-8">
            <input type="date" class="form-control ss-tgl-lhr" value="<?php echo $row['tanggal_lahir'];?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Alamat</label>
          <div class="col-sm-8">
            <input type="text" class="form-control ss-almt" placeholder="Alamat" value="<?php echo $row['alamat'];?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Telepon</label>
          <div class="col-sm-8">
            <input type="text" class="form-control ss-tlp" placeholder="Telepon" value="<?php echo $row['telp'];?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Tahun Masuk</label>
          <div class="col-sm-8">
            <input type="text" class="form-control ss-thn" placeholder="Tahun Masuk" value="<?php echo $row['tahun_masuk'];?>" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Kelas</label>
          <div class="col-sm-8">
            <input type="text" class="form-control ss-kls" placeholder="Kelas" value="<?php echo $row['kelas_cd'];?>" readonly>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mb-2 btn-updt-ss">Update Profile</button>
        </div>
      </div>
      <!-- END OF PROFILE GURU -->

      <!-- JADWAL -->
      <div class="tab-pane fade jadwal-table" id="list-jadwal" role="tabpanel" aria-labelledby="list-jadwal-list">
      </div>
      <!-- END OF JADWAL -->

      <!-- NILAI -->      
      <div class="tab-pane fade" id="list-input" role="tabpanel" aria-labelledby="list-input-list">
      <div><h3 class="text-center">Nilai</h3>
        <table class="table table-responsive-md text-center">
          <thead>
            <tr>
              <th scope="col">Kelas</th>
              <th scope="col">Guru</th>
              <th scope="col">Mata Pelajaran</th>
              <th scope="col">Nilai</th>
            </tr>
          </thead>
          <tbody class="table-nilai-ss">
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
            </tr>
          </tbody>
        </table>
      </div>
      </div>
      <!-- END OF NILAI -->


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

</html>