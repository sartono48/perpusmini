<?php 

session_start(); 
include("koneksi.php"); 

$username = $_POST['username']; 
$password = $_POST['password']; 

$sql = mysqli_query($conn,"SELECT * FROM tb_admin WHERE username='$username' AND password='$password'"); 

//$result = $conn->query($sql); 
if ($sql->num_rows > 0) { 
    $data = mysqli_fetch_assoc($sql);
    if($data['level']=="1"){
        $_SESSION['username'] = $username; 
        header("Location: home.php"); 
    }else if($data['level']=="2"){
        $_SESSION['username'] = $username; 
        header("Location: homeanggota/homeanggota.php"); 
    }
} else { 
    header("Location: gagal.php"); 
} 
    $conn->close(); 
?>