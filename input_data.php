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

<script src="assets/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/jsFuncAdm-inp.js" type="text/javascript"></script>

<script type="text/javascript">
  
</script>


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
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mr-sm-2">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Beranda</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Profil</a>
      </li> -->
    <!--   <li class="nav-item">
        <a class="nav-link" href="#">Guru</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Siswa</a>
      </li> -->
      <li class="nav-item show active">
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
      <a class="list-group-item list-group-item-action active" id="list-mapel-list" data-toggle="list" href="#list-mapel" role="tab" aria-controls="mapel">Mata Pelajaran</a>
      <a class="list-group-item list-group-item-action" id="list-kelas-list" data-toggle="list" href="#list-kelas" role="tab" aria-controls="kelas">Kelas</a>
      <a class="list-group-item list-group-item-action" id="list-guru-list" data-toggle="list" href="#list-guru" role="tab" aria-controls="guru">Guru</a>
      <a class="list-group-item list-group-item-action" id="list-jadwal-list" data-toggle="list" href="#list-jadwal" role="tab" aria-controls="jadwal">Jadwal Pelajaran</a>
      <a class="list-group-item list-group-item-action" id="list-siswa-list" data-toggle="list" href="#list-siswa" role="tab" aria-controls="siswa">Siswa</a>
    </div>
  </div>
  <div class="col-8">
    <div class="tab-content pt-4 " id="nav-tabContent">

      <!-- MAPEL -->
      <div class="tab-pane fade show active text-justify" id="list-mapel" role="tabpanel" aria-labelledby="list-mapel-list">
        <div class="row">
        <div class="col">
        <div class="mp-err-msg" align="center" style="color: red"></div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Kode Mapel</label>
          <input type="text" class="form-control mp-cd" placeholder="Kode Mapel" readonly="readonly">
          <label for="exampleFormControlInput1">Nama Mapel</label>
          <input type="text" class="form-control mp-name" placeholder="Nama Mapel">
        </div>

        </div>
        <div class="col">
        <div class="form-group">
          <label>Kelas</label>
          <select class="form-control mp-kelas">
            <option value="0" selected hidden>Kelas</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary mb-2 btn-add-mapel">Submit</button>
        </div>
      </div>
      <br>
      <hr style="border-top: 3px double #8c8b8b;">
      <br>
      </div>

      <!-- END OF MAPEL -->

      <!-- KELAS  -->      
      <div class="tab-pane fade" id="list-kelas" role="tabpanel" aria-labelledby="list-kelas-list">
        <div class="row">
        <div class="col">
        <div class="kls-err-msg" align="center" style="color: red"></div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Kode Kelas</label>
          <input type="text" class="form-control kls-cd" placeholder="Kode Kelas" readonly="readonly">
          <label for="exampleFormControlInput1">Wali Kelas</label>
        </div>
        <div class="form-group option-kelas-guru">
        </div>
        </div>
        <div class="col">
        <div class="form-group">
          <label>Kelas</label>
          <select class="form-control kelas-kls">
            <option value="0" selected hidden>Kelas</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary mb-2 btn-add-kls">Tambah Kelas</button>
        </div>
      </div>
      </div>
      <!-- END OF KELAS -->

      <!-- GURU -->
      <div class="tab-pane fade text-justify" id="list-guru" role="tabpanel" aria-labelledby="list-guru-list">
        <div class="form-input-guru">
        <div class="guru-err-msg" align="center" style="color: red"></div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Kode Guru</label>
          <div class="col-sm-8">
            <input type="text" class="form-control guru-cd" placeholder="GR" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Mata Pelajaran</label>
          <div class="col-sm-8 option-guru-mp">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Nama</label>
          <div class="col-sm-8">
            <input type="text" class="form-control guru-nm" placeholder="Nama">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">NIP</label>
          <div class="col-sm-8">
            <input type="text" class="form-control guru-nip" placeholder="NIP">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-8">
            <select class="form-control guru-jns-klm" placeholder="Jenis Kelamin">
            <option value="0" selected readonly hidden>Jenis Kelamin</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Tempat Lahir</label>
          <div class="col-sm-8">
            <input type="text" class="form-control guru-tpt-lhr" placeholder="Tempat Lahir">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
          <div class="col-sm-8">
            <input type="date" class="form-control guru-tgl-lhr">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Alamat</label>
          <div class="col-sm-8">
            <input type="text" class="form-control guru-alamat" placeholder="Alamat">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">No. Telepon</label>
          <div class="col-sm-8">
            <input type="text" class="form-control guru-tlp" placeholder="No. Telepon">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Pendidikan Terakhir</label>
          <div class="col-sm-8">
            <select class="form-control guru-pddk" placeholder="Pendidikan">
            <option value="0" selected hidden readonly>Pendidikan</option>
            <option>D1/D2/D3</option>
            <option>Sarjana (S1)</option>
            <option>Magister (S2)</option>
            <option>Doctor (S3)</option>
          </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Jabatan</label>
          <div class="col-sm-8">
            <select class="form-control guru-jbtn" placeholder="Jabatan">
            <option value="0" selected hidden readonly>Jabatan</option>
            <option>Kepala Sekolah</option>
            <option>Guru Tetap</option>
            <option>Guru Honorer</option>
          </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Password</label>
          <div class="col-sm-8">
            <input type="Password" class="form-control guru-pass" placeholder="Password">
          </div>
        </div>
        <button type="submit" class="btn btn-primary mb-2 btn-add-guru">Submit Guru</button>
        <br>
      </div>
      </div>

      <!-- END OF GURU-->

      <!-- JADWAL -->

      <div class="tab-pane fade" id="list-jadwal" role="tabpanel" aria-labelledby="list-jadwal-list">
          <div class="jadwal-err-msg" align="center" style="color: red"></div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Kelas</label>
            <div class="col-sm-8 option-jadwal-kls">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Hari</label>
            <div class="col-sm-8 option-jadwal-hr">
            <select class="form-control jadwal-hari">
              <option value="0" selected hidden>Hari</option>
              <option value="Senin">Senin</option>
              <option value="Selasa">Selasa</option>
              <option value="Rabu">Rabu</option>
              <option value="Kamis">Kamis</option>
              <option value="Jumat">Jumat</option>
            </select>
            </div>

          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Jam Ke-</label>
            <div class="col-sm-8 option-jadwal-jm">
            <select class="form-control jadwal-jam">
              <option value="0" selected hidden>Jam</option>
              <option value="1">1 (07:30 - 08:30)</option>
              <option value="2">2 (08:30 - 09:30)</option>
              <option value="3">3 (10:00 - 11:00)</option>
              <option value="4">4 (11:00 - 12:00)</option>
              <option value="5">5 (13:00 - 14:00)</option>
              <option value="6">6 (14:00 - 15:00)</option>
            </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Mata Pelajaran</label>
            <div class="col-sm-8 option-jadwal-mp">
              <select class="form-control" readonly>
              <option selected value = '0' hidden>Mata Pelajaran</option>
            </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Nama Guru</label>
            <div class="col-sm-8 option-jadwal-guru">
              <select class="form-control" readonly>
              <option selected value = '0' hidden>Guru</option>
            </select>
            </div>
          </div>
          <button type="submit" class="btn btn-primary mb-2 btn-add-jadwal">Submit Jadwal</button>
      </div>
      <!-- END OF JADWAL -->

      <!-- SISWA -->

      <div class="tab-pane fade" id="list-siswa" role="tabpanel" aria-labelledby="list-siswa-list">
        <div class="siswa-err-msg" align="center" style="color: red"></div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">NISN</label>
          <div class="col-sm-8">
            <input type="text" class="form-control siswa-nisn" placeholder="NISN">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Nama</label>
          <div class="col-sm-8">
            <input type="text" class="form-control siswa-nm" placeholder="Nama">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Kelas</label>
          <div class="col-sm-8 option-siswa-kls">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Tahun Masuk</label>
          <div class="col-sm-8">
            <input type="text" class="form-control siswa-thn-msk" placeholder="Tahun Masuk">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control siswa-pass" placeholder="Password">
          </div>
        </div>

          <button type="submit" class="btn btn-primary mb-2 btn-add-siswa">Submit Siswa</button>
      </div>  
      <!-- END OF SISWA -->

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