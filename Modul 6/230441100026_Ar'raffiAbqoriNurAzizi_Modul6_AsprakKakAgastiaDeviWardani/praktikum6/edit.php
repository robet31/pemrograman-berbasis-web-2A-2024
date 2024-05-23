<?php
include 'koneksi.php'; // konfigurasi untuk menghubungkan ke database

if (isset($_GET['id'])) { // memeriksa dan memanggil parameter id 
    $id = $_GET['id']; // mengambil nilai id 
    $query = "SELECT * FROM dbmhs WHERE id = $id";
    $result = mysqli_query($koneksi, $query); // memanggil data di database 

    if (!$result) { // pemeriksaan jika gagal
        die("Query failed: " . mysqli_error($koneksi));
    }

    $data = mysqli_fetch_assoc($result); // mengambil data kemudian dijadikan array dalam variabel data
} else {
    header("Location: datamhs.php"); // jika parameter id tidak ada akan diarahkan ke halaman datamhs
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama']; // mengambil data dari form
    $nim = $_POST['nim'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $prodi = $_POST['prodi'];
    $jurusan = $_POST['jurusan'];
    $asal_kota = $_POST['asal_kota'];

    // memperbarui data di tabel dbmhs berdasarkan id 
    $query = "UPDATE dbmhs SET nama = '$nama', nim = '$nim', umur = '$umur', jenis_kelamin = '$jenis_kelamin', prodi = '$prodi', jurusan = '$jurusan', asal_kota = '$asal_kota' WHERE id = $id";

    if (mysqli_query($koneksi, $query)) {
        header("Location: datamhs.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    clifford: '#da373d',
                }
            }
        }
    }
    </script>
    <style type="text/tailwindcss">
        @layer utilities {
          .content-auto {
            content-visibility: auto;
          }
        }
    </style>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries">
    </script>
    <link href="logo1.png" rel="SHORTCUT_ICON">
</head>

<body>
    <div class="h-screen">
        <div class="py-16 flex justify-center items-center"
            style="background-image:url('https://images.unsplash.com/photo-1499123785106-343e69e68db1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1748&q=80')">
            <div class="p-8 bg-gray-600 w-3/4 rounded-lg shadow-lg backdrop-blur-md bg-opacity-50">
                <div class="container mx-auto p-4 py-5">
                    <h2 class="text-2xl font-bold mb-4">Edit Data</h2>
                    <form action="" method="post">
                        <div class="mb-4">
                            <label class="block text-black">Nama:</label>
                            <input type="text" name="nama" class="w-full px-3 py-2 border border-gray-300 rounded-md"
                                value="<?php echo $data['nama']; ?>" required />
                        </div>
                        <div class="mb-4">
                            <label class="block text-black">Nim:</label>
                            <input type="text" name="nim" class="w-full px-3 py-2 border border-gray-300 rounded-md"
                                value="<?php echo $data['nim']; ?>" required />
                        </div>
                        <div class="mb-4">
                            <label class="block text-black">Umur :</label>
                            <input type="text" name="umur" class="w-full px-3 py-2 border border-gray-300 rounded-md"
                                value="<?php echo $data['umur']; ?>" required />
                        </div>
                        <div class="mb-4">
                            <label class="block text-black">Jenis Kelamin:</label>
                            <input type="radio" name="jenis_kelamin" value="laki-laki"
                                <?php echo ($data['jenis_kelamin'] == 'laki-laki') ? 'checked' : ''; ?>> Laki-laki
                            <input type="radio" name="jenis_kelamin" value="perempuan"
                                <?php echo ($data['jenis_kelamin'] == 'perempuan') ? 'checked' : ''; ?>> Perempuan
                        </div>
                        <div class="mb-4">
                            <label class="block text-black">Prodi:</label>
                            <input type="text" name="prodi" class="w-full px-3 py-2 border border-gray-300 rounded-md"
                                value="<?php echo $data['prodi']; ?>" required />
                        </div>
                        <div class=" mb-4">
                            <label class="block text-black">Jurusan:</label>
                            <input type="text" name="jurusan" class="w-full px-3 py-2 border border-gray-300 rounded-md"
                                value="<?php echo $data['jurusan']; ?>" required />
                        </div>
                        <div class="mb-4">
                            <label class="block text-black">Asal Kota:</label>
                            <input name="asal_kota" class="w-full px-3 py-2 border border-gray-300 rounded-md" rows="1"
                                value="<?php echo $data['asal_kota']; ?>" required></input>
                        </div>

                        <input type="submit" value="Update"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md cursor-pointer">
                        <a href="index.php" class="bg-red-500 text-white px-4 py-2 rounded-md">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>