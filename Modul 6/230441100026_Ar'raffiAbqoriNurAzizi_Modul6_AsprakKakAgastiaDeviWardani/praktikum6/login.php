<?php
session_start();
include 'koneksi.php';
if (isset($_SESSION['status']) && $_SESSION['status'] === "login") { // kondisi apakah user sudah login
    header("location: index.php");
    exit;
}
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username']; // mengambil nilai username
    $password = $_POST['password'];

    $query = "SELECT * FROM login WHERE username=? AND password=?"; //  query untuk mengecek username dan password

    $stmt = mysqli_prepare($koneksi, $query); 
    mysqli_stmt_bind_param($stmt, "ss", $username, $password); // pernyataan bahwa parameter bersifat string
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $cek = mysqli_num_rows($result);

    if ($cek > 0) { 
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("location: index.php");
        exit;
    } else {
        $salah = "Akun anda tidak terdaftar";
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
    <div class="flex h-screen w-full items-center justify-center bg-gray-900 bg-cover bg-no-repeat"
        style="background-image:url('https://images.unsplash.com/photo-1499123785106-343e69e68db1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1748&q=80')">
        <div class="rounded-xl bg-gray-800 bg-opacity-50 px-16 py-10 shadow-lg backdrop-blur-md max-sm:px-8">
            <div class="text-white">
                <div class="mb-8 flex flex-col items-center">
                    <img src="logo1.png" width="150" alt="" srcset="" />
                    <h1 class="mb-2 text-2xl">FORM MAHASISWA</h1>
                    <span class="text-gray-300">Masukkan Akun Data Mahasiswa...</span>
                </div>
                <form action="" method="post">
                    <div class="mb-4 text-lg">
                        <input
                            class="rounded-3xl border-none bg-yellow-400 bg-opacity-75 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md"
                            type="text" name="username" placeholder="Username" required />
                    </div>
                    <div class="mb-4 text-lg">
                        <input
                            class="rounded-3xl border-none bg-yellow-400 bg-opacity-75 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md"
                            type="password" name="password" placeholder="Password" required />
                    </div>
                    <div class="mt-8 flex justify-center text-lg text-black">
                        <button type="submit" href="index.php"
                            class="rounded-3xl bg-yellow-400 bg-opacity-50 px-10 py-2 text-white shadow-xl backdrop-blur-md transition-colors duration-300 hover:bg-yellow-600">Login</button>
                    </div>
                    <?php if (isset($salah)) {
                        echo "<p style='color:red; text-align:center;'>$salah</p>";
                    } ?>
                </form>
                <p class="mt-5">Belum punya akun ? <a href="signup.php"> Buat disini </a></p>
            </div>
        </div>
    </div>
</body>

</html>