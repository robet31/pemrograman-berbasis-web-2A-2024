<?php
    include 'koneksi.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Proses form tambah data
        $nama = $_POST['Nama'];
        $nim = $_POST['NIM'];
        $umur = $_POST['Umur'];
        $jenis_kelamin = $_POST['Jenis_Kelamin'];
        $prodi = $_POST['Prodi'];
        $jurusan = $_POST['Jurusan'];
        $asal_kota = $_POST['Asal_Kota'];

        $query = "INSERT INTO dbmhs (Nama, NIM, Umur, Jenis_Kelamin, Prodi, Jurusan, Asal_Kota) VALUES ('$nama', '$nim', '$umur', '$jenis_kelamin', '$prodi', '$jurusan', '$asal_kota')";

        if(mysqli_query($koneksi, $query)){
            echo "Data berhasil disimpan.";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }

        header("location:datamhs.php");
        exit();
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

                    <h2 class="text-2xl font-bold mb-4">Input Data</h2>

                    <form action="" method="post">
                        <div class="mb-4">
                            <label class="text-black">Nama:</label>
                            <input type="text" name="Nama" class="w-full px-3 py-2 border border-gray-300 rounded-md"
                                placeholder="Masukan Nama" required />
                        </div>
                        <div class="mb-4">
                            <label class="text-black">Nim:</label>
                            <input type="text" name="NIM" class="w-full px-3 py-2 border border-gray-300 rounded-md"
                                placeholder="Masukan nim anda" required />
                        </div>
                        <div class="mb-4">
                            <label class="text-black">Umur :</label>
                            <input type="text" name="Umur" class="w-full px-3 py-2 border border-gray-300 rounded-md"
                                placeholder="Masukan umur anda" required />
                        </div>
                        <div class="mb-4 text-black">
                            <label class="text-black">Jenis Kelamin:</label>
                            <input type="radio" name="Jenis_Kelamin" value="Laki-laki" required> Laki-laki
                            <input type="radio" name="Jenis_Kelamin" value="Perempuan" required> Perempuan
                        </div>
                        <div class="mb-4">
                            <label class="text-black">Prodi:</label>
                            <input type="text" name="Prodi" class="w-full px-3 py-2 border border-gray-300 rounded-md"
                                placeholder="Masukan prodi anda" required />
                        </div>
                        <div class="mb-4">
                            <label class="text-black">Jurusan:</label>
                            <input type="text" name="Jurusan" class="w-full px-3 py-2 border border-gray-300 rounded-md"
                                placeholder="Masukan jurusan anda" required />
                        </div>
                        <div class="mb-4">
                            <label class="text-black">Asal Kota:</label>
                            <input name="Asal_Kota" class="w-full px-3 py-2 border border-gray-300 rounded-md" rows="1"
                                placeholder="Masukan asal kota anda" required></input>
                        </div>

                        <input type="submit" value="SIMPAN" name="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md cursor-pointer"></input>
                        <a type="cancel" name="cancel" href="datamhs.php"
                            class="bg-red-500 text-white px-4 py-2 rounded-md">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>