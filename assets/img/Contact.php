<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="node_modules/bootstrap/dist/css/bootstrap.min.css"
    />
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link
      rel="stylesheet"
      href="node_modules/bootstrap-icons/font/bootstrap-icons.css"
    />
    <!-- Icon -->
    <link rel="icon" href="assets/img/logo.png"/>
    <!-- Style Sendiri -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Beranda</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg color-nav">
      <div class="container-fluid container">
       
          <img src="assets/img/logo.png" alt="Novriyanti Rahmadani logo" height="70" />
       
        <button
          class="navbar-toggler bg-white"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul
            class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-end w-100 align-items-center"
          >
            <li class="nav-item" id="berandaLogin" style="display: none">
              <a class="nav-link active" href="Landingpagelogin.html"
                >Beranda</a
              >
            </li>
            <li class="nav-item" id="berandaTidakLogin">
              <a class="nav-link active" aria-current="page" href="home.php"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Article.php">Article</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Contact.php">Contact</a>
            </li>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

   

<!-- Kontak -->
<section class="pekerjaan py-5" id="pekerjaan">
      <div class="container mt-4">
        <div class="row">
          <div class="col-md-6 my-auto">
            <h1>Kontak Kami</h1>
            <p>
              Silahkan tinggalkan pesan maupun pertanyaan anda pada kolom yang
              tersedia
            </p>
          </div>
          <div class="col-md-6">
            <div class="card w-100 p-4">
              <form action="">
                <div class="mb-3">
                  <label for="nama" class="form-label fw-semibold"
                    >Nama Lengkap</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="nama"
                    placeholder="Masukkan Nama Anda"
                  />
                </div>
                <div class="mb-3">
                  <label for="No. Telepon" class="form-label fw-semibold"
                    >No. Telepon</label
                  >
                  <input
                    type="No. Telepon"
                    class="form-control"
                    id="No. Telepon"
                    placeholder="Masukkan No. Telepon Anda"
                  />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label fw-semibold"
                    >Email</label
                  >
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    placeholder="Masukkan Email Anda"
                  />
                </div>
                <div class="mb-3">
                  <label for="pesan" class="form-label fw-semibold"
                    >Pesan/Pertanyaan</label
                  >
                  <textarea
                    class="form-control"
                    id="pesan"
                    rows="3"
                    placeholder="Masukkan Pesan Anda"
                  ></textarea>
                </div>
                <button type="submit" class="btn btn-primary px-5">
                  Kirim
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
