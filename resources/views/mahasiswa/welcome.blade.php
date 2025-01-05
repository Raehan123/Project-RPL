<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FinalEase - Landing Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      box-sizing: border-box;
    }

    .wrapper {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .content {
      flex: 1;
    }

    /* Kotak Header dengan Logo dan User */
    .header-box {
      background-color: #4a69bd;
      padding: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .header-box .logo-section {
      display: flex;
      align-items: center;
    }

    .header-box img {
      width: 50px;
      height: 50px;
      margin-right: 10px;
    }

    .header-box h1 {
      color: white;
      font-size: 24px;
      margin: 0;
    }

    .header-box p {
      color: white;
      font-size: 14px;
      margin: 0;
    }

    /* User Info */
    .user-info {
      position: relative;
      display: inline-block;
    }

    .user-info span {
      color: white;
      margin-right: 10px;
      cursor: pointer;
    }

    .user-info i {
      font-size: 30px;
      color: white;
      cursor: pointer;
    }

    /* Dropdown Logout */
    .dropdown-menu {
      display: none;
      position: absolute;
      top: 100%;
      right: 0;
      background-color: white;
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 10px;
      min-width: 50px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
      z-index: 1050;
    }

    .dropdown-menu button {
      width: 100%;
      text-align: left;
      background: none;
      border: none;
      padding: 5px 0;
      color: #333;
      cursor: pointer;
    }

    .dropdown-menu button:hover {
      background-color: #f5f5f5;
    }

    /* Navbar dengan background biru */
    .navbar-custom {
      background-color: #4a69bd;
      padding: 10px 0;
      position: sticky;
      top: 0;
      z-index: 1000;
      width: 100%;
    }

    .navbar-nav .nav-link {
      font-size: 16px;
      color: white !important;
      margin-right: 30px;
    }

    /* Section Informasi Mahasiswa */
    .info-section {
      margin-top: 30px;
      display: flex;
      justify-content: space-between;
      gap: 20px;
    }

    .info-card {
      background-color: white;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      flex: 1;
    }

    .info-card h5 {
      font-weight: bold;
    }

    .progress-bar-container {
      margin-top: 20px;
    }

    .progress-bar-container .progress {
      height: 20px;
      border-radius: 10px;
    }

    .icon-large {
  font-size: 150px; /* Ukuran lebih besar */
  color: #4a69bd;
  margin-right: 20px; /* Memberi jarak antara ikon dan teks */
}

    /* Footer fix di bawah */
    footer {
      background-color: #4a69bd;
      color: white;
      text-align: center;
      padding: 10px;
      margin-top: auto;
      width: 100%;
    }
  </style>
</head>
<body>

  <div class="wrapper">
    <!-- Header Box (Logo dan User) -->
    <div class="header-box">
      <div class="logo-section">
        <img src="{{ asset('assets/images/logo-finalease-removebg-preview.png') }}" alt="Logo">
        <div>
          <h1>FinalEase</h1>
          <p>Sistem Reminder Bimbingan TA</p>
        </div>
      </div>
      <div class="user-info" onclick="toggleDropdown()">
        <span>{{ Auth::user()->name }}</span>
        <i class="bi bi-person-circle"></i>
        <div class="dropdown-menu" id="dropdown-menu">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-danger">
              <i class="bx bx-power-off font-size-17 align-middle me-1 text-danger"></i> Logout
            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pengajuan Jadwal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Jadwal Bimbingan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Schedule Tugas</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Section Informasi Mahasiswa dan Progress -->
    <div class="container info-section">
      <!-- Informasi Mahasiswa -->
      <div class="info-card">
        <div class="d-flex">
          <i class="bi bi-mortarboard icon-large"></i>
          <div class="ml-3">
            <h5>INFORMASI MAHASISWA</h5>
            <p>Hi, {{ Auth::user()->name }}</p>
            <p class="text-justify">
              Selamat datang di FinalEase, teman setia untuk membantu Tugas Akhir.
              Dengan FinalEase, bimbingan Tugas Akhir menjadi lebih mudah dan teratur.
            </p>            
          </div>
        </div>
      </div>

      <!-- Progress Tugas Akhir -->
      <div class="info-card">
        <h5>{{ Auth::user()->name }}</h5>
        <p>NIM: {{ Auth::user()->mahasiswa->nim }}</p>
        <p>jurusan: {{ Auth::user()->mahasiswa->jurusan }}</p>
        <p>Dosen Pembimbing: Zeki, S.KOM</p>
        <div class="progress-bar-container">
          <p>Bar Progress Tugas Akhir</p>
          <div class="progress">
            <div class="progress-bar bg-primary" style="width: 65%;">65%</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer>
      <p>By RPL_Nemo</p>
    </footer>
  </div>

  <script>
    // Toggle Dropdown Menu
    function toggleDropdown() {
      var dropdown = document.getElementById('dropdown-menu');
      if (dropdown.style.display === 'block') {
        dropdown.style.display = 'none';
      } else {
        dropdown.style.display = 'block';
      }
    }

    // Close dropdown menu when clicking outside
    window.onclick = function(event) {
      if (!event.target.matches('.user-info') && !event.target.closest('.user-info')) {
        var dropdown = document.getElementById('dropdown-menu');
        if (dropdown.style.display === 'block') {
          dropdown.style.display = 'none';
        }
      }
    }
  </script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
