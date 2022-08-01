<?php
    include('Include/Sessions.php');
    include('Include/Functions.php');
    include_once('Include/Database.php');
    include_once('Include/LoginLogic.php');
    include_once('Include/Security/WAF.php');
    include_once('../admin/PPDBLink.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <!-- MDB icon -->
    <link rel="icon" href="../img/icon/favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/mdb.min.css">
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
                        <a href="../pages/blog.php">
                            <button type="button" class="btn btn-link px-3 me-2">
                                Berita
                            </button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../pages/aboutus.php">
                            <button type="button" class="btn btn-link px-3 me-2">
                                Tentang Kami
                            </button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="Login.php">
                            <button type="button" class="btn btn-primary btn-rounded">
                                Login
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<form action="Login.php" method="post">
    <section class="h-100">
        <?php echo Message(); ?>
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                        <img src="../img/LogoPonpes_remove.png" alt="logo" width="100">
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
                            <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                                    <input id="username" type="email" class="form-control" name="username" value="" required autofocus>
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="mb-2 w-100">
                                        <label class="text-muted" for="password">Password</label>
                                        <!-- <a href="forgot.html" class="float-end">
                                            Forgot Password?
                                        </a> -->
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <!-- <div class="form-check">
                                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                        <label for="remember" class="form-check-label">Remember Me</label>
                                    </div> -->
                                    <button id="submit" name="submit" type="submit" class="btn btn-primary ms-auto">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-center mt-5 text-muted">
                        Copyright &copy; 2022 &mdash; nuruljadid.ponpes.id
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<script src="../js/login.js"></script>
</body>
</html>