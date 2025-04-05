<?php
session_start();
if(isset($_SESSION['username'])) {

include 'koneksi.php';
 
$id = $_GET['id'];
$sql = "DELETE FROM tb_buku WHERE id_buku = $id";
 
    if ($conn->query($sql) === TRUE) {
        header('Location: buku.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

} else { 
    header("Location: gagal.php"); 
} 
?>