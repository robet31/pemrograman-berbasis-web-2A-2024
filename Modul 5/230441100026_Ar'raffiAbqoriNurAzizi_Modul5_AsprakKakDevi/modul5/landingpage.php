<?php
session_start();

// pemeriksaan apakah user sudah login. jika belum akan diarahkan ke login page 
if(!isset($_SESSION['login'])) {
  header("Location: index.php");
  exit;
}
// untuk menyimpan data yang sudah terisi di dalam username dan disimpan ke variabel username
if(isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
}
// menyimpan data students di dalam variabel array superglobal yang disimpan di dalam server agar dapat digunakan diberbagai halaman
if (!isset($_SESSION['students'])) {
  $_SESSION['students'] = [];
}

// terdapat fungsi untuk menambah data mahasiswa kedalam variabel session
function addStudent($nim, $nama, $alamat, $prodi, $angkatan) {
    $_SESSION['students'][$nim] = [
        'nama' => $nama,
        'alamat' => $alamat,
        'Prodi' => $prodi,
        'angkatan' => $angkatan
    ];
}

// terdapat fungsi untuk menghapus data mahasiswa berdasarkan NIM
function deleteStudent($nim) {
  unset($_SESSION['students'][$nim]);
}

// edit data
// Fungsi untuk mengedit data mahasiswa.
function editStudent($old_nim, $new_nim, $nama, $alamat, $prodi, $angkatan) {
    // Hapus data lama jika NIM berubah
    if ($old_nim !== $new_nim) {
        unset($_SESSION['students'][$old_nim]);
    }
    // data yang baru akan disimpan
    $_SESSION['students'][$new_nim] = [
        'nama' => $nama,
        'alamat' => $alamat,
        'Prodi' => $prodi,
        'angkatan' => $angkatan
    ];
}

// Menangani aksi dari form
if (isset($_POST['action'])) {
  if ($_POST['action'] == 'Tambah') {
      addStudent($_POST['nim'], $_POST['nama'], $_POST['alamat'], $_POST['Prodi'], $_POST['angkatan']);
  } elseif ($_POST['action'] == 'Edit') {
      // Mengatur mode edit
      $_SESSION['edit_nim'] = $_POST['nim'];
  } elseif ($_POST['action'] == 'Simpan') {
      // Menyimpan perubahan dari mode edit
      editStudent($_POST['old_nim'], $_POST['nim'], $_POST['nama'], $_POST['alamat'], $_POST['Prodi'], $_POST['angkatan']);
      // Mengatur mode default
      unset($_SESSION['edit_nim']);
  } elseif ($_POST['action'] == 'Hapus') {
      deleteStudent($_POST['nim']);
  } elseif ($_POST['action'] == 'Batal') {
        // Mengatur mode default
        unset($_SESSION['edit_nim']);
  }
}
?>

<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>STARLINK</title>
    <link rel="stylesheet" href="style1.css" />
    <!-- link font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet" />
    <!-- link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- link untuk icon website -->
    <link rel="shortcut icon" href="https://www.reshot.com/preview-assets/icons/XAWDP62TFY/energy-XAWDP62TFY.svg"
        type="image/png">
</head>
<style>
table {
    width: 80%;
    border-collapse: collapse;
}

.page2 table,
th,
td {
    border: 1px solid black;
}

.page2 th,
td {
    padding: 10px;
    text-align: left;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

body {
    font-family: 'Poppins', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    height: 100%;
}

form {
    margin: 20px;
}

input[type='text'] {
    margin: 5px 0;
}

.table1 {
    width: 100%;
    border-collapse: collapse;
}

.table1,
th,
td {
    border: 1px solid black;
    padding: 10px;
    text-align: left;
}
</style>
</head>

<body>
    <!-- Start Navbar -->
    <nav>
        <div class="wrapper">
            <div class="logo">
                <h1 style="letter-spacing: 3px;">STARLINK.</h1>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#form">Form</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Start selamat-datang  -->
    <section class="page1">
        <div class="container">
            <h1 class="welcome">SELAMAT DATANG</h1>
            <h1 class="name"><?php echo $username ?></h1>
        </div>
    </section>

    <!-- ini Content -->
    <svg style="background: transparent; margin-top: -19rem;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#333" fill-opacity="1"
            d="M0,96L80,128C160,160,320,224,480,240C640,256,800,224,960,213.3C1120,203,1280,213,1360,218.7L1440,224L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
        </path>
    </svg>
    <svg id="form" style="background: transparent; margin-bottom: -10rem;" xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 1440 320">
        <path fill="#333" fill-opacity="1"
            d="M0,224L34.3,229.3C68.6,235,137,245,206,261.3C274.3,277,343,299,411,261.3C480,224,549,128,617,90.7C685.7,53,754,75,823,90.7C891.4,107,960,117,1029,149.3C1097.1,181,1166,235,1234,245.3C1302.9,256,1371,224,1406,208L1440,192L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z">
        </path>
    </svg>
    <!-- ini Form Inputan -->
    <form method="post" style="margin: 30px;" <!-- Menambahkan input tersembunyi untuk mode edit -->
        <?php if (isset($_SESSION['edit_nim'])): ?>
        <input type="hidden" name="old_nim" value="<?= $_SESSION['edit_nim'] ?>">
        <?php endif; ?>
        <div style="margin-bottom: 10px;">
            NIM: <input type="text" name="nim" value="<?= isset($_SESSION['edit_nim']) ? $_SESSION['edit_nim'] : '' ?>"
                required style="padding: 8px; width: 100%; box-sizing: border-box;">
        </div>
        <div style="margin-bottom: 10px;">
            Nama: <input type="text" name="nama"
                value="<?= isset($_SESSION['edit_nim']) ? $_SESSION['students'][$_SESSION['edit_nim']]['nama'] : '' ?>"
                required style="padding: 8px; width: 100%; box-sizing: border-box;">
        </div>
        <div style="margin-bottom: 10px;">
            Alamat: <input type="text" name="alamat"
                value="<?= isset($_SESSION['edit_nim']) ? $_SESSION['students'][$_SESSION['edit_nim']]['alamat'] : '' ?>"
                required style="padding: 8px; width: 100%; box-sizing: border-box;">
        </div>
        <div style="margin-bottom: 10px;">
            Prodi: <input type="text" name="Prodi"
                value="<?= isset($_SESSION['edit_nim']) ? $_SESSION['students'][$_SESSION['edit_nim']]['Prodi'] : '' ?>"
                required style="padding: 8px; width: 100%; box-sizing: border-box;">
        </div>
        <div style="margin-bottom: 10px;">
            Angkatan: <input type="text" name="angkatan"
                value="<?= isset($_SESSION['edit_nim']) ? $_SESSION['students'][$_SESSION['edit_nim']]['angkatan'] : '' ?>"
                required style="padding: 8px; width: 100%; box-sizing: border-box;">
        </div>
        <!-- Mengubah nilai tombol sesuai mode -->
        <?php if(isset($_SESSION['edit_nim'])): ?>
        <input type="submit" name="action" value="Simpan" style="padding: 8px; margin-right: 5px;">
        <input type="submit" name="action" value="Batal" style="padding: 8px;">
        <?php else: ?>
        <input type="submit" name="action" value="Tambah" style="padding: 8px;">
        <?php endif; ?>
    </form>

    <!-- ini tabel Output -->
    <table class="tabel1"
        style="width: 100%; border-collapse: collapse; margin-top: 20px; margin: 30px; padding: 10rem">
        <tr>
            <th style="border: 1px solid black; padding: 10px; text-align: left;" class="text-center">NIM</th>
            <th style="border: 1px solid black; padding: 10px; text-align: left;" class="text-center">Nama</th>
            <th style="border: 1px solid black; padding: 10px; text-align: left;" class="text-center">Alamat</th>
            <th style="border: 1px solid black; padding: 10px; text-align: left;" class="text-center">Prodi</th>
            <th style="border: 1px solid black; padding: 10px; text-align: left;" class="text-center">Angkatan</th>
            <th style="border: 1px solid black; padding: 10px; text-align: left;" class="text-center">Aksi</th>
            <!-- Menambah kolom untuk tombol Hapus -->
        </tr>
        <?php foreach ($_SESSION['students'] as $nim => $student): ?>
        <tr>
            <td style="border: 1px solid black; padding: 10px; text-align: left;"><?= $nim ?></td>
            <td style="border: 1px solid black; padding: 10px; text-align: left;"><?= $student['nama'] ?></td>
            <td style="border: 1px solid black; padding: 10px; text-align: left;"><?= $student['alamat'] ?></td>
            <td style="border: 1px solid black; padding: 10px; text-align: left;"><?= $student['Prodi'] ?></td>
            <td style="border: 1px solid black; padding: 10px; text-align: left;"><?= $student['angkatan'] ?></td>
            <!-- Menambah tombol Hapus yang terpisah -->
            <td style="border: 1px solid black; padding: 10px; text-align: left;">
                <form method="post">
                    <input type="hidden" name="nim" value="<?= $nim ?>">
                    <input type="submit" name="action" value="Edit" style="padding: 5px;">
                    <input type="submit" name="action" value="Hapus" style="padding: 5px;">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <!-- ini Content -->
    <svg style="background: transparent; margin-top: -10rem;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#333" fill-opacity="1"
            d="M0,128L20,149.3C40,171,80,213,120,218.7C160,224,200,192,240,192C280,192,320,224,360,197.3C400,171,440,85,480,58.7C520,32,560,64,600,85.3C640,107,680,117,720,106.7C760,96,800,64,840,80C880,96,920,160,960,208C1000,256,1040,288,1080,288C1120,288,1160,256,1200,229.3C1240,203,1280,181,1320,186.7C1360,192,1400,224,1420,240L1440,256L1440,320L1420,320C1400,320,1360,320,1320,320C1280,320,1240,320,1200,320C1160,320,1120,320,1080,320C1040,320,1000,320,960,320C920,320,880,320,840,320C800,320,760,320,720,320C680,320,640,320,600,320C560,320,520,320,480,320C440,320,400,320,360,320C320,320,280,320,240,320C200,320,160,320,120,320C80,320,40,320,20,320L0,320Z">
        </path>
    </svg>
    <!-- ini Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-info">
                <span>Starlink © 2024</span>
                <span>Starlink adalah divisi dari SpaceX. Kunjungi kami di <a
                        href="https://www.spacex.com/">spacex.com</a></span>
            </div>
        </div>
    </footer>
    <!-- ini Footer -->
</body>

</html>