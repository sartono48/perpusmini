<?php
session_start();
if(isset($_SESSION['username'])) {

include 'koneksi.php';
 
$id = $_GET['id'];
$sql = "DELETE FROM tb_anggota WHERE id_anggota = $id";
 
if ($conn->query($sql) === TRUE) {
    header('Location: anggota.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

} else { 
    header("Location: ../gagal.php"); 
} 
?>