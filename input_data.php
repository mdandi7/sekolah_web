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
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mr-sm-2">
      <li class="nav-item show active">
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
      <a class="list-group-item list-group-item-action active" id="list-kelas-list" data-toggle="list" href="#list-kelas" role="tab" aria-controls="kelas">Kelas</a>
      <a class="list-group-item list-group-item-action" id="list-guru-list" data-toggle="list" href="#list-guru" role="tab" aria-controls="guru">Guru</a>
      <a class="list-group-item list-group-item-action" id="list-mapel-list" data-toggle="list" href="#list-mapel" role="tab" aria-controls="mapel">Jadwal Pelajaran</a>
      <a class="list-group-item list-group-item-action" id="list-wakel-list" data-toggle="list" href="#list-wakel" role="tab" aria-controls="wakel">Wali Kelas</a>
    </div>
  </div>
  <div class="col-8">
    <div class="tab-content pt-4" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-kelas" role="tabpanel" aria-labelledby="list-kelas-list">
      <div class="row">
        <div class="col">
        <form>
        <div class="form-group">
          <label for="exampleFormControlInput1">Tambah Kelas</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Kelas">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
      </form>
        </div>
        <div class="col">
        <form>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Hapus Kelas</label>
          <select class="form-control" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
        </div>
      </div>
      </div>
      <div class="tab-pane fade text-justify" id="list-guru" role="tabpanel" aria-labelledby="list-guru-list">
        <div class="row">
        <div class="col">
        <form>
        <div class="form-group">
          <label for="exampleFormControlInput1">Tambah Guru</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Kelas">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
      </form>
        </div>
        <div class="col">
        <form>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Hapus Guru</label>
          <select class="form-control" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
        </div>
      </div>
      </div>
      <div class="tab-pane fade" id="list-mapel" role="tabpanel" aria-labelledby="list-mapel-list">
        <form>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Tahun Pelajaran</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputPassword" placeholder="Tahun Pelajaran">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Kelas</label>
            <div class="col-sm-10">
              <select class="form-control" id="exampleFormControlSelect1">
              <option selected>Pilih</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Hari</label>
            <div class="col-sm-10">
              <select class="form-control" id="exampleFormControlSelect1">
              <option selected>Pilih</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Jam Ke-</label>
            <div class="col-sm-10">
              <select class="form-control" id="exampleFormControlSelect1">
              <option selected>Pilih</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Pukul</label>
            <div class="col-sm-10">
              <select class="form-control" id="exampleFormControlSelect1">
              <option selected>Pilih</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Mata Pelajaran</label>
            <div class="col-sm-10">
              <select class="form-control" id="exampleFormControlSelect1">
              <option selected>Pilih</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Nama Guru</label>
            <div class="col-sm-10">
              <select class="form-control" id="exampleFormControlSelect1">
              <option selected>Pilih</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
            </div>
          </div>
          <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
      </div>
      <div class="tab-pane fade" id="list-wakel" role="tabpanel" aria-labelledby="list-wakel-list">
        <form>
          <div class="form-group row">
            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Kelas</label>
            <div class="col-sm-10">
              <select class="form-control" id="exampleFormControlSelect1">
              <option selected>Pilih</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Nama Wali Kelas</label>
            <div class="col-sm-10">
              <select class="form-control" id="exampleFormControlSelect1">
              <option selected>Pilih</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Tahun Pelajaran</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputPassword" placeholder="Tahun Pelajaran">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Input</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="inputPassword" placeholder="Tahun Pelajaran">
            </div>
          </div>
          <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
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