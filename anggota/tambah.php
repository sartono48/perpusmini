<?php
session_start();
if(isset($_SESSION['username'])) {

include 'koneksi.php';
 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
 
    $sql = "INSERT INTO tb_anggota (id_anggota, nama, kelas, jk, alamat) 
            VALUES ('','$nama', '$kelas', '$jk', '$alamat')";
     
    if ($conn->query($sql) === TRUE) {
        header('Location: anggota.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Perpustakaan</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Perpustakaan</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
                <div class="input-group">
                    
                </div>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="../home.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="anggota.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Anggota
                            </a>
                            <a class="nav-link" href="../buku/buku.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Buku
                            </a>
                            <a class="nav-link" href="../pinjam/pinjam.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Pinjam
                            </a>
                            <a class="nav-link" href="../lapkembali/lapkembali.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Laporan
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Petugas
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Anggota</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Data Anggota</li>
                        </ol>
                        <div class="card mb-4">
                            <a class="btn btn-primary" href="anggota.php">Kemballi</a>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tambah Tabel Anggota
                            </div>
                            <div class="card-body">
                            <form action="" method="POST">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFirstName" type="text" name="nama" placeholder="Masukkan nama" required />
                                            <label for="inputFirstName">Masukkan nama</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control" id="inputLastName" type="text" name="kelas" placeholder="Masukkan kelas" required />
                                            <label for="inputLastName">Masukkan Kelas</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                <div class="col-md-3">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputFirstName" type="text" name="jk" placeholder="Masukkan jenis kelamin" required />
                                        <label for="inputFirstName">Masukkan jenis kelamin</label>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputFirstName" type="text" name="alamat" placeholder="Masukkan alamat" required />
                                        <label for="inputFirstName">Masukkan alamat</label>
                                    </div>
                                </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <input class="btn btn-primary" type="submit" value="Tambah" name="tambah">
                                 </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; SMK Muhammadiyah Kretek 2025</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php
    } else { 
        header("Location: ../gagal.php"); 
    } 
?>