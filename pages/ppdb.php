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
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/mdb.min.css" />
    <link rel="stylesheet" href="../css/style.css">

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
                                <button type="button" class="btn btn-success btn-rounded">
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

    <?php

    ?>
    <!-- <section>
        <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScn-IR1zWlSah7BHELl8nZDZ5okvYSm0tRU0CTDU5O3x_DR5Q/viewform?embedded=true" width="100%" height="950" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
    </section> -->



    <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="../index.php" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="ppdb.php" class="nav-link px-2 text-muted">PPDB</a></li>
                <li class="nav-item"><a href="blog.php" class="nav-link px-2 text-muted">Berita</a></li>
                <li class="nav-item"><a href="aboutus.php" class="nav-link px-2 text-muted">Tentang Kami</a></li>
            </ul>
            <p class="text-center text-muted">© 2022 Pondok Pesantren Nurul Jadid Al - Mas'udiyah</p>
        </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>