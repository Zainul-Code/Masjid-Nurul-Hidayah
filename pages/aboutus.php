<?php
include('../admin/Include/Sessions.php');
include('../admin/Include/Functions.php');
include_once('../admin/PPDBLink.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Pondok Pesantren Nurul Jadid Al - Mas'udiyah</title>
    <!-- MDB icon -->
    <link rel="icon" href="../img/icon/favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet1" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/mdb.min.css" />
</head>

<body>
<header style="margin: 2cm;">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="../index.php">
                    <img src="../img/LogoPonpes_remove.png" height="30" alt="Pondok Pesantren Nurul Jadid Al - Mas'udiyah" loading="lazy" />
                </a>
                <!-- Responsive Header -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fas fa-bars"></span>
                    </button>
                <!-- Responsive Header -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="../index.php">
                                <button type="button" class="btn btn-link px-3 me-2">
                                        Dashboard
                                    </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $link ?>">
                                <button type="button" class="btn btn-link px-3 me-2">
                                        PPDB
                                    </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="blog.php">
                                <button type="button" class="btn btn-link px-3 me-2">
                                        Berita
                                    </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="aboutus.php">
                                <button type="button" class="btn btn-success btn-rounded">
                                        Tentang Kami
                                    </button>
                            </a>
                        </li>
                        <li class="nav-item" >
                            <a href="../admin/Login.php">
                                <button type="button" class="btn btn-link px-3 me-2">
                                        Login
                                    </button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <div style="position: relative;" data-draggable="true" class="" draggable="false">
    <?php
    $query = "SELECT * FROM cms_aboutus";
    $exec = Query($query) or die(mysqli_error($con));
        if($exec){
            $post = mysqli_fetch_assoc($exec);
            $postAbout = $post['about'];
            $postVisi = $post['vision'];
            $postMisi = $post['mission'];
        }
    ?>
    
        <section draggable="false" class="container pt-5" data-v-271253ee="">
            <section id="Tentang Kami" class="mb-10 p-5">
                <h2 class="fw-bold mb-5 text-center">Tentang Kami <br /></h2>
                <div class="row gx-lg-5 mb-5 flex-lg-row-reverse align-items-center">
                    <div class="col-md-6 mb-4 mb-md-0 hover-zoom">
                        <img src="../img/event/event_Akhirussanah_2.jpeg" class="w-100 shadow-5-strong rounded-4 mb-4" alt="" aria-controls="#picker-editor" draggable="false" />
                    </div>
                    <div class="col-md-6 mb-4">
                        <h3 class="fw-bold mb-3">Tentang Pondok Pesantren Nurul Jadid</h3>
                        <!-- <div class="mb-2 text-primary small"><i class="fas fa-book-reader me-2" aria-controls="#picker-editor"></i><span>Lomba</span></div> -->
                        <p style="text-align: justify;" class="text-muted ">
                            <?php echo $postAbout ?>
                        </p>
                    </div>
                </div>
            </section>
            <section id="Visi dan Misi" class="mb-10 p-5">
                <h2 class="fw-bold mb-5 text-center">Visi dan Misi <br /></h2>
                <div class="row gx-lg-5 mb-5 flex-lg-row-reverse align-items-center">
                    <div class="col-md-6 mb-4">
                        <h3 class="fw-bold mb-3">Visi</h3>
                        <!-- <div class="mb-2 text-primary small"><i class="fas fa-book-reader me-2" aria-controls="#picker-editor"></i><span>Lomba</span></div> -->
                        <p style="text-align: justify;" class="text-muted">
                            <?php echo $postVisi ?>.
                        </p>
                        <h3 class="col-md-6 mb-4">Misi</h3>
                        <p style="text-align: justify;" class="text-muted">
                           <?php echo $postMisi ?>
                        </p>
                    </div>
                    <div class="col-md-6 mb-4 mb-md-0 hover-zoom">
                        <img src="../img/logoPonpes.png" class="w-100 shadow-5-strong rounded-4 mb-4" alt="" aria-controls="#picker-editor" draggable="false" />
                    </div>
                </div>
            </section>
        </section>
    </div>
    <!-- Akhir tentang kami -->

    <!-- Fasilitas -->
    <section id="fasilitas">
        <div class="container bg-light p-5">
            <div class="row text-center">
                <div class="col mb-5">
                    <h2 class="fw-bold mb-3 text-center">Fasilitas <br /></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4 hover-zoom">
                    <div style="margin-right: 10px;" class="card">
                        <img src="../img/fasilitas/fasilitas 1.jpg" class="card-img-top" alt="masjid">
                        <div class="card-body">
                            <p class="fw-bold fs-4 card-text text-center">Masjid</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 hover-zoom">
                    <div style="margin-right: 10px;" class="card">
                        <img src="../img/fasilitas/fasilitas 2.jpg" class="card-img-top" alt="kamar tidur">
                        <div class="card-body">
                            <p class="fw-bold fs-4 card-text text-center">Kamar tidur</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 hover-zoom">
                    <div style="margin-right: 10px;" class="card">
                        <img src="../img/fasilitas/fasilitas 3.jpg" class="card-img-top" alt="kamar mandi">
                        <div class="card-body">
                            <p class="fw-bold fs-4 card-text text-center">Kamar mandi</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4 mb-4 hover-zoom">
                    <div style="margin-right: 10px;" class="card">
                        <img src="../img/fasilitas/fasilitas 4.jpg" class="card-img-top" alt="ruang kelas">
                        <div class="card-body">
                            <p class="fw-bold fs-4 card-text text-center">Ruang kelas</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 hover-zoom">
                    <div style="margin-right: 10px;" class="card">
                        <img src="../img/fasilitas/fasilitas 5.jpg" class="card-img-top" alt="kantin">
                        <div class="card-body">
                            <p class="fw-bold fs-4 card-text text-center">Kantin</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir fasilitas -->

    <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="pages/ppdb.php" class="nav-link px-2 text-muted">PPDB</a></li>
                <li class="nav-item"><a href="pages/blog.php" class="nav-link px-2 text-muted">Berita</a></li>
                <li class="nav-item"><a href="aboutus.php" class="nav-link px-2 text-muted">Tentang Kami</a></li>
            </ul>
            <p class="text-center text-muted">© 2022 Pondok Pesantren Nurul Jadid Al - Mas'udiyah</p>
        </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>