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
    <div>
        <div class="flex h-screen w-full items-center justify-center bg-gray-900 bg-cover bg-no-repeat"
            style="background-image:url('https://images.unsplash.com/photo-1499123785106-343e69e68db1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1748&q=80')">
            <div class="p-8 bg-gray-800 w-3/4 rounded-xl shadow-lg backdrop-blur-md bg-opacity-50 max-sm:px-8">

                <div class="p-4 flex justify-center items-center">
                    <h1 class="text-3xl font-bold">
                        Biodata Mahasiswa UTM
                    </h1>
                </div>
                <div class="table w-full p-2 ">
                    <table class="w-full border ">
                        <thead>
                            <tr class="bg-gray-50 border-b ">
                                <th class="p-2 border-r text-sm font-bold text-gray-500">
                                    <div class=" flex items-center justify-center">
                                        NO
                                    </div>
                                </th>
                                <th class="p-2 border-r text-sm font-bold text-gray-500">
                                    <div class=" flex items-center justify-center">
                                        NAMA
                                    </div>
                                </th>
                                <th class="p-2 border-r text-sm font-bold text-gray-500">
                                    <div class=" flex items-center justify-center">
                                        NIM
                                    </div>
                                </th>
                                <th class="p-2 border-r text-sm font-bold text-gray-500">
                                    <div class=" flex items-center justify-center">
                                        UMUR
                                    </div>
                                </th>
                                <th class="p-2 border-r text-sm font-bold text-gray-500">
                                    <div class=" flex items-center justify-center">
                                        JENIS KELAMIN
                                    </div>
                                </th>
                                <th class="p-2 border-r text-sm font-bold text-gray-500">
                                    <div class=" flex items-center justify-center">
                                        PRODI
                                    </div>
                                </th>
                                <th class="p-2 border-r text-sm font-bold text-gray-500">
                                    <div class=" flex items-center justify-center">
                                        JURUSAN
                                    </div>
                                </th>
                                <th class="p-2 border-r text-sm font-bold text-gray-500">
                                    <div class=" flex items-center justify-center">
                                        KOTA-ASAL
                                    </div>
                                </th>
                                <th class="p-2 border-r text-sm font-bold text-gray-500">
                                    <div class=" flex items-center justify-center">
                                        AKSI
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include 'koneksi.php';
                                $no = 1;
                                $query = "SELECT * FROM dbmhs";
                                $data = mysqli_query($koneksi, $query); // memanggil data di database

                                if (!$data) {
                                    die("Query failed: " . mysqli_error($koneksi));
                                }
 
                                while ($d = mysqli_fetch_assoc($data)) { // mengambil data kemudian disimpan dalam variabel d
                            ?>
                            <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                                <td class="p-2 border-r"><?php echo $no++; ?></td>
                                <td class="p-2 border-r"><?php echo isset($d['nama']) ? $d['nama'] : 'N/A'; ?></td>
                                <td class="p-2 border-r"><?php echo isset($d['nim']) ? $d['nim'] : 'N/A'; ?></td>
                                <td class="p-2 border-r"><?php echo isset($d['umur']) ? $d['umur'] : 'N/A'; ?></td>
                                <td class="p-2 border-r">
                                    <?php echo isset($d['jenis_kelamin']) ? $d['jenis_kelamin'] : 'N/A'; ?></td>
                                <td class="p-2 border-r"><?php echo isset($d['prodi']) ? $d['prodi'] : 'N/A'; ?></td>
                                <td class="p-2 border-r"><?php echo isset($d['jurusan']) ? $d['jurusan'] : 'N/A'; ?>
                                </td>
                                <td class="p-2 border-r"><?php echo isset($d['asal_kota']) ? $d['asal_kota'] : 'N/A'; ?>
                                </td>
                                <td>
                                    <a href="edit.php?id=<?php echo $d['id']; ?>"
                                        class="rounded bg-blue-500 p-2 px-3 text-white hover:shadow-lg text-xs font-bold">Edit</a>
                                    <a href="remove.php?id=<?php echo $d['id']; ?>"
                                        class="rounded bg-red-500 p-2 px-3 text-white hover:shadow-lg text-xs font-bold">Remove</a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="py-5 px-5">
                    <button><a href="index.php"
                            class="rounded bg-purple-500 p-2 px-3 text-white hover:shadow-lg text-xs font-bold"
                            role="button">Halaman Depan</a></button>
                    <a href="coba1.php"
                        class="rounded bg-pink-500 p-2 px-5 text-white hover:shadow-lg text-xs font-bold"
                        role="button">Tambah Data</a>
                </div>

            </div>
        </div>
    </div>
</body>

</html>