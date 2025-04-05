<?php
    session_start();
    if(isset($_SESSION['username'])) {

include 'koneksi.php';
 
$id = $_GET['id'];
$sql = "DELETE FROM tb_pinjam WHERE id_pinjam = $id";
 
if ($conn->query($sql) === TRUE) {
    header('Location: pinjam.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

    } else { 
        header("Location: gagal.php"); 
    } 
?>