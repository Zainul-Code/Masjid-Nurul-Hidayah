<?php
include('admin/Include/Sessions.php');
include('admin/Include/Functions.php');
include_once('admin/Include/Database.php');
include_once('admin/Include/Vcounter.php');
include_once('./admin/PPDBLink.php');
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Masjid Nurul Hidayah</title>
        <!-- MDB icon -->
        <link rel="icon" href="img/icon/favicon.ico" type="image/x-icon" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
        <!-- Google Fonts Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
        <!-- MDB -->
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/mdb.min.css" />
    </head>

    <body>
        <header style="margin: 2cm;">
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <img src="img/LogoMasjid.png" height="30" alt="Masjid Nurul Hidayah" loading="lazy" />
                    </a>
                    <!-- Responsive Header -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fas fa-bars"></span>
                    </button>
                    <!-- Responsive Header -->
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a href="index.php">
                                <button type="button" class="btn btn-primary btn-rounded" >
                                        Dashboard
                                    </button>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/blog.php">
                                    <button type="button" class="btn btn-link px-3 me-2">
                                        Berita
                                    </button>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/aboutus.php">
                                    <button type="button" class="btn btn-link px-3 me-2">
                                        Tentang Kami
                                    </button>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/Login.php">
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

        <div id="preview" class="preview">
            <div style="display: none;"></div>
            <div>
                <div style="position: relative;" data-draggable="true" class="" draggable="false">
                    <section draggable="false" class="container" data-v-271253ee="">
                        <section class="mb-10">
                            <!-- Background image -->
                            <div
                                class="p-5 text-center shadow-5-strong rounded"
                                style="background-image: url('img/Masjid1.JPG'); height: 500px; background-size: cover; background-position: 50% 50%; background-color: rgba(0, 0, 0, 0);"
                                aria-controls="#picker-editor"
                            ></div>
                            <!-- Background image -->
                            <!-- Card Qoute -->
                            <div class="card mx-4 mx-md-5 text-center shadow-5-strong" style="margin-top: -170px; background: hsla(0, 0%, 100%, 0.7); backdrop-filter: blur(30px);">
                                <div class="card-body px-4 py-5 px-md-5">
                                    <h1 class="display-3 fw-bold ls-tight mb-4">
                                        <span>Masjid</span> <br />
                                        <span style="color:blue;">Nurul Hidayah</span>
                                        <p><cite style="font-style: italic; font-size: 20px;">"Barangsiapa Yang Lebih Mementingkan Ibadahnya Niscaya Surga Bagimu"</cite></p>
                                    <!-- <a class="btn btn-link btn-lg py-3 px-5 text-danger mb-2 me-2" data-ripple-color="danger" href="#berita1" role="button" aria-controls="#picker-editor" draggable="false">Baca selengkapnya</a> -->
                                </div>
                                <!-- Card Qoute -->
                            </div>
                        </section>
                    </section>
                    <!---->
                </div>

                <!-- Main Content -->
                
                            
                            <div style="position: relative;" data-draggable="true">
                <!---->
                <!---->
                <section draggable="false" class="container pt-5" data-v-271253ee="">
                    <section class="mb-10 text-center">
                        <h2 class="fw-bold mb-7 text-center">Latest articles</h2>
                        <div class="row gx-lg-5">
                        <?php
                $query = "SELECT * FROM cms_post ORDER BY post_id  LIMIT 0,3	";
                $exec = Query($query) or die(mysqli_error($con));
					if( $exec ) {
						if (mysqli_num_rows($exec) > 0) {
							while ( $post = mysqli_fetch_assoc($exec) ) {
								$post_id = $post['post_id'];
								$post_date = $post['post_date_time'];
								$post_title = $post['title'];
								$post_category = $post['category'];
								$post_author = $post['author'];
								$post_image = $post['image'];
								$post_content = substr($post['post'], 0,150) . '...'; 
							?>
                            <div class="col-lg-4 col-md-12 mb-6 mb-lg-0">
                                <div class="card shadow-2-strong">
                                    <div class="bg-image hover-overlay ripple shadow-4-strong rounded mx-3" data-mdb-ripple-color="light" style="margin-top: -15px"> <?php echo "<img src='pages/Upload/Image/$post_image'"?> class="img-fluid" alt="" aria-controls="#picker-editor"> </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $post_title ?></h5>
                                        <p class="card-text"><?php echo $post_content ?>.</p> <a href="pages/Post.php?id=<?php echo $post_id;?>" class="btn btn-primary btn-rounded" aria-controls="#picker-editor">Read more</a> </div>
                                </div>
                            </div>
                            <?php
							}

						}else {
							echo "<span class='lead'>No result<span>";
						}
					}else {

					}
				?>

                        </div>
                    </section>
                </section>
                <!---->
            </div>
        </div>
    </div>


        <!-- Main Content -->

        <!-- Sambutan -->
        <section class="pt-5 pb-5">
            <div class="container my-5">
                <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
                    <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                        <h1 class="display-4 fw-bold lh-1">Sambutan Ketua Yayasan</h1>
                        <p class="lead">
                            Segala puji marilah kita panjatkan kehadirat Allah SWT bahwa atas berkah-Nya kita senantiasa mendapat limpahan rahmat dan keridoan-Nya sehingga Pondok Pesantren Nurul Jadid Al - Mas'udiyah terus berkembang maju
                            dan memberi kontribusi bagi masyarakat dan dunia pendidikan. Sholawat teriring salam semoga tercurahkan kepada junjungan Nabi Muhammad SAW, beserta keluarga, pada sahabat dan pengikutnya hingga akhir zaman.
                            Aamiin Ya Robbal Aalamiin.
                        </p>
                        <figcaption class="blockquote-footer">
                            TRIYONO, S.E.
                        </figcaption>
                    </div>
                    <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden">
                        <img class="img-thumbnail" src="https://dummyimage.com/200x200/000/fff" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <!-- Sambutan -->

        <!-- Statistic -->
        <div class="container my-2">
        <div class="row">
      <div class="col-xl-3 col-sm-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
              <div class="align-self-center">
                <i class="fas fa-pencil-alt text-info fa-3x"></i>
              </div>
              <div class="text-end">
                <?php 
                    $sql = "SELECT * FROM cms_post";
                    
                    if ($result = mysqli_query($con,$sql)) {
                        $postRowCount = mysqli_num_rows($result);
                    }else
                    $postRowCount = 0 ;
                ?>
                <h3><?php echo $postRowCount ?></h3>
                <p class="mb-0">Posts</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
              <div class="align-self-center">
                <i class="far fa-comment-alt text-warning fa-3x"></i>
              </div>
              <div class="text-end">
                <?php 
                    $sql = "SELECT * FROM comment";
                    
                    if ($result = mysqli_query($con,$sql)) {
                        $commentRowCount = mysqli_num_rows($result);
                    }else
                    $commentRowCount = 0 ;
                ?>
                <h3><?php echo $commentRowCount ?></h3>
                <p class="mb-0">Comments</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
              <div>
                <h3 class="text-success">156</h3>
                <p class="mb-0">Murid</p>
              </div>
              <div class="align-self-center">
                <i class="far fa-user text-success fa-3x"></i>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
              <div class="align-self-center">
                <i class="fas fa-map-marker-alt text-danger fa-3x"></i>
              </div>
              <div class="text-end">
                <h3><script type="text/javascript" src="admin/Include/visitorCounter.php?show=this"></script></h3>
                <h3><?php echo $id?></h3>
                <p class="mb-0">Total Website Visits</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      </div>
        </div>
        
        <!-- Statistic -->
        <!-- Map -->
        <div id="preview" class="preview">
            <div style="display: none;"></div>
            <div>
                <div style="position: relative;" data-draggable="true">
                    <!---->
                    <!---->
                    <section draggable="false" class="container pt-5" data-v-271253ee="">
                        <section class="mb-10">
                            <style>
                                /* Map settings */

                                .map-container-2 {
                                    height: 500px;
                                }

                                .map-container-2 iframe {
                                    left: 0;
                                    top: 0;
                                    height: 100%;
                                    width: 100%;
                                }

                                .rounded-t-5 {
                                    border-top-left-radius: 0.5rem;
                                    border-top-right-radius: 0.5rem;
                                }

                                @media (min-width: 992px) {
                                    .rounded-tr-lg-0 {
                                        border-top-right-radius: 0;
                                    }
                                    .rounded-bl-lg-5 {
                                        border-bottom-left-radius: 0.5rem;
                                    }
                                }
                            </style>
                            <div class="card mb-3">
                                <div class="row g-0 d-flex align-items-center">
                                    <div class="col-lg-4 d-none d-lg-flex">
                                        <div class="map-container-2 w-100 mb-4 mb-lg-0">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3231.9539162717847!2d109.26038598160889!3d-7.455918280292359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xaa5f74cfb8b9e069!2zN8KwMjcnMTkuNiJTIDEwOcKwMTUnMjguNyJF!5e0!3m2!1sen!2sid!4v1652519686949!5m2!1sen!2sid"
                                                width="600"
                                                height="450"
                                                style="border: 0;"
                                                allowfullscreen=""
                                                loading="lazy"
                                                referrerpolicy="no-referrer-when-downgrade"
                                            ></iframe>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="card-body py-5 px-md-5">
                                            <div class="row gx-lg-5">
                                                <div class="col-md-6 mb-5">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0">
                                                            <div class="p-3 bg-primary rounded-4 shadow-2-strong"><i class="fas fa-headset fa-lg text-white fa-fw" aria-controls="#picker-editor"></i></div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-4">
                                                            <p class="fw-bold mb-1">Kontak Kami</p>
                                                            <!-- <p class="text-muted mb-0">pondoknuruljadidgmail.com</p> -->
                                                            <p class="text-muted mb-0">+62 858-6864-6334 (Edi)</p>
                                                            <p class="text-muted mb-0">+62 813-1093-1519 (Gus Rahmat)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-5">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0">
                                                            <div class="p-3 bg-primary rounded-4 shadow-2-strong"><i class="fas fa-dollar-sign fa-lg text-white fa-fw" aria-controls="#picker-editor"></i></div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-4">
                                                            <p class="fw-bold mb-1">Website</p>
                                                            <p class="text-muted mb-0">nuruljadid.ponpes.id</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-5">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0">
                                                            <div class="p-3 bg-primary rounded-4 shadow-2-strong"><i class="fas fa-bug fa-lg text-white fa-fw" aria-controls="#picker-editor"></i></div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-4">
                                                            <p class="fw-bold mb-1">Bug report</p>
                                                            <p class="text-muted mb-0">muhammadirfani@pm.me</p>
                                                            <p class="text-muted mb-0">+62 822-2009-1122</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-5">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0">
                                                            <div class="p-3 bg-primary rounded-4 shadow-2-strong"><i class="fas fa-instagram fa-lg text-white fa-fw" aria-controls="#picker-editor"></i></div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-4">
                                                            <p class="fw-bold mb-1">Instagram</p>
                                                            <p class="text-muted mb-0">pon.pes_almasudiyah</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
        <!-- Map -->

        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="pages/ppdb.php" class="nav-link px-2 text-muted">PPDB</a></li>
                <li class="nav-item"><a href="pages/blog.php" class="nav-link px-2 text-muted">Berita</a></li>
                <li class="nav-item"><a href="pages/aboutus.php" class="nav-link px-2 text-muted">Tentang Kami</a></li>
            </ul>
            <p class="text-center text-muted">© 2022 Pondok Pesantren Nurul Jadid Al - Mas'udiyah</p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
