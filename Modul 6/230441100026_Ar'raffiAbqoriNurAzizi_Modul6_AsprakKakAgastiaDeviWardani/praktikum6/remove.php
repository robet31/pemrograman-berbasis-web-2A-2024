<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM dbmhs WHERE id = $id";

    if (mysqli_query($koneksi, $query)) {
        header("Location: datamhs.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    header("Location: datamhs.php");
    exit();
}
?>