<?php 

session_start(); 
include("koneksi.php"); 

$username = $_POST['username']; 
$password = $_POST['password']; 

$sql = "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'"; 

$result = $conn->query($sql); 
if ($result->num_rows > 0) { 
    $_SESSION['username'] = $username; 
    header("Location: home.php"); 
} else { 
    header("Location: gagal.php"); 
} 
    $conn->close(); 
?>