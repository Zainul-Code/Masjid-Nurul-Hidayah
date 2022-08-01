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
                                <button type="button" class="btn btn-success btn-rounded">
                                        Berita
                                    </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="aboutus.php">
                                <button type="button" class="btn btn-link px-3 me-2">
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

        <!-- Qoute -->
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light text-center">Acara Pondok Pesantren</h1>
                <h1 class="text-center" style="color: #00b74a;">Nurul Jadid Al - Mas'udiyah</h1>
                <p class="text-center fst-italic"><cite>"Pribadi saleh, mandiri, berilmu, berjuang dan berbakti kepada agama, masyarakat dan bangsa"</cite></p>
            </div>
        </div>
        <!-- Qoute -->
        <div id="preview" class="preview">
            <div style="display: none;"></div>
            <div>
                <div style="position: relative;" data-draggable="true">
                    <!---->
                    <!---->
                    </div>
                    <section draggable="false" class="container pt-5" data-v-271253ee="">
                        <section class="mb-10 text-center">
                            <h2 class="fw-bold mb-7 text-center">Berita Terbaru</h2>
                            <!-- Search -->
                            <section class="container m-5 ">
                                <div class="input-group justify-content">
                                    <div class="">
                                      <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                    </div>
                                    <button type="button" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                    </button>
                                  </div>
                            </section>
                            <!-- Search -->
                            <div class="row gx-lg-5">
                                <div class="col-lg-4 col-md-12 mb-6 mb-lg-0">
                                    <div class="card shadow-2-strong">
                                        <div class="bg-image hover-overlay ripple shadow-4-strong rounded mx-3" data-mdb-ripple-color="light" style="margin-top: -15px;">
                                            <img src="../img/event/event_Akhirussanah_3_berita.jpeg" class="img-fluid" alt="" aria-controls="#picker-editor" />
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Peserta Juara Lomba Membaca Al-Qur'an</h5>
                                            <p class="card-text">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem explicabo laudantium facere totam cupiditate harum accusantium atque, animi, nam tenetur aliquam quod, quis praesentium
                                                consequuntur! Ex doloremque dicta voluptatem at?
                                            </p>
                                            <a href="../blog/2022_02_02.php" class="btn btn-primary btn-rounded" aria-controls="#picker-editor">Read more</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-6 mb-lg-0">
                                    <div class="card shadow-2-strong">
                                        <div class="bg-image hover-overlay ripple shadow-4-strong rounded mx-3" data-mdb-ripple-color="light" style="margin-top: -15px;">
                                            <img src="../img/event/event_Akhirussanah_2.jpeg" class="img-fluid" alt="" aria-controls="#picker-editor" />
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Pembagian Hadiah Pemenang Lomba</h5>
                                            <p class="card-text">Suspendisse in volutpat massa. Nulla facilisi. Sed aliquet diam orci, nec ornare metus semper sed. Integer volutpat ornare erat sit amet rutrum.</p>
                                            <a href="#!" class="btn btn-primary btn-rounded disabled" aria-controls="#picker-editor">Read more</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-6 mb-lg-0">
                                    <div class="card shadow-2-strong">
                                        <div class="bg-image hover-overlay ripple shadow-4-strong rounded mx-3" data-mdb-ripple-color="light" style="margin-top: -15px;">
                                            <img src="../img/event/event_Akhirussanah_3.jpeg" class="img-fluid" alt="" aria-controls="#picker-editor" />
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Pembagian Sembako</h5>
                                            <p class="card-text">Curabitur tristique, mi a mollis sagittis, metus felis mattis arcu, non vehicula nisl dui quis diam. Mauris ut risus eget massa volutpat feugiat. Donec.</p>
                                            <a href="#!" class="btn btn-primary btn-rounded disabled" aria-controls="#picker-editor">Read more</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-6 mb-lg-0" style="margin-top: 2cm;">
                                    <div class="card shadow-2-strong">
                                        <div class="bg-image hover-overlay ripple shadow-4-strong rounded mx-3" data data-mdb-ripple-color="light" style="margin-top: -15px;">
                                            <img src="../img/event/event_Akhirussanah_3.jpeg" class="img-fluid" alt="" aria-controls="#picker-editor" />
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Coming soon</h5>
                                            <p class="card-text">Coming soon....</p>
                                            <a href="#!" class="btn btn-primary btn-rounded disabled" aria-controls="#picker-editor">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </section>
                    <!---->
                </div>
            </div>
        </div>

        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="../index.php " class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="ppdb.php " class="nav-link px-2 text-muted">PPDB</a></li>
                <li class="nav-item"><a href="blog.php " class="nav-link px-2 text-muted">Berita</a></li>
                <li class="nav-item"><a href="aboutus.php " class="nav-link px-2 text-muted">Tentang Kami</a></li>
            </ul>
            <p class="text-center text-muted">© 2022 Pondok Pesantren Nurul Jadid Al - Mas'udiyah</p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p " crossorigin="anonymous "></script>
    </body>
</html>
