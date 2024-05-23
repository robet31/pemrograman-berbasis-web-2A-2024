<?php
session_start(); 
// Ambil username dari URL jika tersedia
$username = isset($_GET['username']) ? $_GET['username'] : '';
// kondisi ketika username benar 
if (!isset($_SESSION['username']) && empty($username)) { 
    header("Location: login.php");
    exit;
}
// kondisi untuk menyimpan info bahawa user telah masuk
if (!isset($_SESSION['username']) && !empty($username)) {
    $_SESSION['username'] = $username;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>landing Page</title>
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
    <div class="w-full h-screen bg-center bg-no-repeat bg-cover"
        style="background-image: url('https://img.freepik.com/free-photo/glowing-spaceship-orbits-planet-starry-galaxy-generated-by-ai_188544-9655.jpg?t=st=1716396219~exp=1716399819~hmac=87268b2b585c126e823eedc193f5a846b95822fdcb17d01642c0d00dccdcd001&w=1060');">
        <div class="w-full h-screen bg-opacity-50 bg-black flex justify-center items-center">
            <div class="mx-4 text-center text-white">
                <h1 class="font-bold text-6xl mb-4">Selamat Datang</h1>
                <h2 class="font-bold text-3xl mb-12"><?php echo $_SESSION["username"]; ?></h2>
                <div>
                    <a href="logout.php"
                        class="bg-blue-500 rounded-md font-bold text-white text-center px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-600 mr-2">
                        Logout
                    </a>
                    <a href="datamhs.php"
                        class="bg-red-500 rounded-md font-bold text-white text-center px-4 py-3 transition duration-300 ease-in-out hover:bg-red-600 ml-2">
                        Form Data Mahasiswa
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>