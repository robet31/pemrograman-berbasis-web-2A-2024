<?php
session_start();
session_destroy(); //menghapus semua data yang tersimpan di array session
header("Location:index.php");
?>