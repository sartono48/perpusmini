<?php
    session_start();
    if(isset($_SESSION['username'])) {

    include 'koneksi.php';
 
    $databuku = $conn->query("SELECT id_buku, judul FROM tb_buku");
    $namaanggota = $conn->query("SELECT id_anggota, nama FROM tb_anggota");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_buku = $_POST['id_buku'];
    $id_anggota = $_POST['id_anggota'];
 
    $sql = "INSERT INTO tb_pinjam (id_pinjam, id_buku, id_anggota, tgl_pinjam, tgl_kembali) 
            VALUES ('','$id_buku', '$id_anggota',now(),'')";
     
    if ($conn->query($sql) === TRUE) {
        header('Location: pinjam.php');
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
        <link href="../css/jquery-editable-select.css" rel="stylesheet" />
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
                            <a class="nav-link" href="../anggota/anggota.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Anggota
                            </a>
                            <a class="nav-link" href="../buku/buku.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Buku
                            </a>
                            <a class="nav-link" href="pinjam.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Pinjam
                            </a>
                            <a class="nav-link" href="../kembali/kembali.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Kembali
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
                        <h1 class="mt-4">Data Transaksi Peminjaman</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Data Transaksi Peminjaman</li>
                        </ol>
                        <div class="card mb-4">
                            <a class="btn btn-primary" href="pinjam.php">Kembali</a>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tambah Data Transaksi Peminjaman
                            </div>
                            <div class="card-body">
                            <form action="" method="POST">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">

                                        <select id="judul" name="id_buku" class="form-select" aria-label="Default select example" >
                                            <?php 
                                            //$data = mysqli_query($koneksi,"select * from provinces");
                                            while($d = mysqli_fetch_array($databuku)){
                                                ?>
                                                <option value="<?php echo $d['id_buku'] ?>"><?php echo $d['judul'] ?></option>
                                                <?php
                                            }
                                            ?>				
                                        </select>  
                                        <label for="inputFirstName">Masukkan Judul</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">

                                        <select id="nama" name="id_anggota" class="form-select" aria-label="Default select example" >
                                            <?php 
                                            //$data = mysqli_query($koneksi,"select * from provinces");
                                            while($d = mysqli_fetch_array($namaanggota)){
                                                ?>
                                                <option value="<?php echo $d['id_anggota'] ?>"><?php echo $d['nama'] ?></option>
                                                <?php
                                            }
                                            ?>				
                                        </select>  
                                        <label for="inputFirstName">Masukkan Judul</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                <div class="col-md-3">

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
        <script src="../js/jquery-editable-select.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php
    } else { 
        header("Location: gagal.php"); 
    } 
?>