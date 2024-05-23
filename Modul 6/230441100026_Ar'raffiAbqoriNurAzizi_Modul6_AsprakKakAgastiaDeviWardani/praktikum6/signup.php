<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { // mengambil data dari form menggunakan post
    $username = $_POST['username']; // mengambil atribut name dari username
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_pass'];

    if ($password != $confirm_password) { // kondisi jika password salah 
        header("location: signup.php?pesan=password_tidak_cocok");
        exit;
    }

    // memasukkan data kedalam tabel login
    $query = mysqli_query($koneksi, "INSERT INTO login (username, email, password) VALUES ('$username', '$email', '$password')"); 

    //kondisi untuk pemeriksaan jika berhasil atau tidak
    if ($query) { 
        header("location: login.php?pesan=signup_sukses");
        exit;
    } else {
        header("location: signup.php?pesan=gagal");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
                <!-- form-login -->
                <form method="post" onsubmit="return validateForm()">
                    <div class="mb-4 text-lg">
                        <input
                            class="rounded-3xl border-none bg-yellow-400 bg-opacity-75 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md"
                            type="text" id="username" name="username" placeholder="Username" required />
                    </div>
                    <div class="mb-4 text-lg">
                        <input
                            class="rounded-3xl border-none bg-yellow-400 bg-opacity-75 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md"
                            type="email" id="email" name="email" placeholder="Email" required />
                    </div>
                    <div class="mb-4 text-lg">
                        <input
                            class="rounded-3xl border-none bg-yellow-400 bg-opacity-75 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md"
                            type="password" id="password" name="password" placeholder="Password" required />
                    </div>
                    <div class="mb-4 text-lg">
                        <input
                            class="rounded-3xl border-none bg-yellow-400 bg-opacity-75 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md"
                            type="password" id="confirm_pass" name="confirm_pass" placeholder="Confirm Password"
                            required />
                    </div>
                    <div class="mt-8 flex justify-center text-lg text-black">
                        <input type="submit" value="SIGNUP"
                            class="cursor-pointer rounded-3xl bg-yellow-400 bg-opacity-50 px-10 py-2 text-white shadow-xl backdrop-blur-md transition-colors duration-300 hover:bg-yellow-600"></input>
                    </div>
                    <p class="mt-5">Sudah punya akun ? <a href="login.php"> Login disini </a></p>
                </form>
            </div>
        </div>
    </div>
</body>

<!-- memastikan kata sandi sudah benar dengan menggunakan alert -->
<script>
function validateForm() {
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_pass").value;

    if (password !== confirm_password) {
        alert("Password yang anda masukkan tidak sama!");
        return false;
    }
    alert("Terima kasih sudah mendaftar!");
    return true;
}
</script>

</html>