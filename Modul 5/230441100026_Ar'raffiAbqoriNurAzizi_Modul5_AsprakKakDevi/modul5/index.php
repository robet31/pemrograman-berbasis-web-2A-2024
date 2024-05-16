<?php
session_start();
// pengecekan apakah data username melalui metode post dari form login
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
if (($username == "AR'RAFFI ABQORI NUR AZIZI" && $password == "1234") || 
    ($username == "KING NASSAR" && $password == "1234")) {
    $_SESSION['login'] = true; // jika username dan pass cocok akan diarahkan ke landingpage
    $_SESSION["username"] = $username; // nama user akan di simpan di variabel username
    header("Location: landingpage.php");
    exit;
} else {
    $error = "Username atau password salah.";
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LOGIN PAGE</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="https://www.reshot.com/preview-assets/icons/XAWDP62TFY/energy-XAWDP62TFY.svg"
        type="image/png">
</head>
<!-- page 1 -->

<body class="text-white d-flex flex-column justify-content-center align-items-center min-vh-100"
    style="backdrop-filter: blur(5px); filter: drop-shadow(1px 20px 40px hsl(0, 90%, 90%)); font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-style: normal; font-weight: 500; background-image: url(https://api.starlink.com/public-files/residential_a_feature1_d.jpg); background-repeat: no-repeat; background-size: cover; height: 100vh;">
    <div class="card bg-secondary text-white p-4 shadow-lg rounded-lg w-100" style="max-width: 400px;">
        <div class="card-body">
            <h3 class="card-title">Login</h3>
            <h6 class="card-text">Silahkan Masukkan Username dan Password</h6>
            <!-- untuk menampilkan alert ketika error terjadi -->
            <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
            <!-- form-start -->
            <form method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                        autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="d-flex justify-content-center gap-2">
                    <button type="submit" class="btn btn-light">Login</button>
                </div>
            </form>
        </div>
    </div>
    <!-- page 1 -->
</body>

</html>