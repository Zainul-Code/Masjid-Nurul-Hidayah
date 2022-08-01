<?php require_once('../admin/Include/Sessions.php'); ?>
<?php require_once('../admin/Include/Functions.php'); ?>
<?php require_once('../admin/PPDBLink.php'); ?>

<?php 
	if ( isset($_GET['id']) ) {
		$post_id = $_GET['id'];
		$post_title = "";
		$sql = "SELECT * FROM cms_post WHERE post_id = '$post_id'";
		$exec = Query($sql);
		if ($title = mysqli_fetch_assoc($exec)) {
			$post_title = $title['title'];
		}
	}
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
    <script src="../js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/mdb.min.css" />
    <link rel="stylesheet" href="../css/commentSection.css">
</head>
<body>

    <header style="margin: 2cm;">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="../index.php">
                    <img src="../img/LogoPonpes_remove.png" height="30" alt="Pondok Pesantren Nurul Jadid Al - Mas'udiyah" loading="lazy" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fas fa-bars"></span>
                    </button>

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
        </nav>

    </header>
    <div id="preview" class="preview">
        <div style="display: none;"></div>
        <div>
        <?php echo SuccessMessage(); ?>
            <div style="position: relative;" data-draggable="true" class="">
                <!---->
                <!---->
                <section draggable="false" class="container pt-5" data-v-271253ee="">
                    <section class="mb-10">
				<?php
					if( isset($_GET['id'])) {
						$query = "SELECT * FROM cms_post WHERE post_id = '$_GET[id]'";
						$exec = Query($query);
						if (mysqli_num_rows($exec) > 0) {
							while ($post = mysqli_fetch_assoc($exec) ) {
								$post_id = $post['post_id'];
								$post_date = $post['post_date_time'];
								$post_title = $post['title'];
								$post_category = $post['category'];
								$post_author = $post['author'];
								$post_image = $post['image'];
								$post_content = $post['post']; 
							?>
							<div class="post">
                            <div class="p-5 text-center shadow-5-strong rounded" style="margin-bottom: 2cm; background-image: url('Upload/Image/<?php echo $post_image?>'); height: 500px; background-size: cover; background-position: 50% 50%; background-color: rgba(0, 0, 0, 0);"
                            aria-controls="#picker-editor">
                        </div>
                        <!-- <img src="../img/event_Akhirussanah_1.jpeg" width="200px" class=" align-items-lg-center shadow-5-strong rounded-5 mb-4" alt="" aria-controls="#picker-editor" /> -->
                        <div class="row align-items-center mb-4">
                            <div class="col-lg-7">
                                <img src="../img/event/event_Akhirussanah_1.jpeg" class="rounded-circle me-2" alt="" loading="lazy" aria-controls="#picker-editor" height="35" width="35" />
                                <span> Published <u><?php echo htmlentities($post_date) ?></u> by</span> <a href="undefined" class="text-dark" aria-controls="#picker-editor"><?php echo htmlentities($post_author) ?></a>
                            </div>
                        </div>
                        <h1 class="fw-bold mb-4"><?php echo htmlentities($post_title)?></h1>
                        <p>
                        <?php echo htmlentities($post_content) ?>
                        </p>
							</div>
							<?php
							}
						}
					}else {
						Redirect_To('../pages/blog.php');
					}
				?>
                    </section>
                </section>
                <!---->
            </div>
        </div>
    </div>

    <!-- Comment -->
    <form action="../admin/Comment.php?>'" method="POST">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootdey">
<div class="col-md-12 bootstrap snippets">
<div class="panel form-group">
  <div class="panel-body">
	<input type="email" name="email" placeholder="Your Email Address" class="form-control" required>
    <br>
    <div>
    <textarea class="form-control" rows="2" name="comment" placeholder="What are you thinking?" required></textarea>
    </div>
    
    <div class="mar-top clearfix">
      <input name="submit" class="btn btn-sm btn-primary pull-right" value="Send Comment" type="submit"></input>
  </div>
      <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"></input>
    </form>
  <hr>
</div>
<div class="page-header">Comments</div>
<?php
					$sql = "SELECT * FROM comment WHERE post_id = '$_GET[id]' AND status = 'approved'";
					$exec = Query($sql);
					if (mysqli_num_rows($exec) > 0) {
						while ($comments = mysqli_fetch_assoc($exec)) {
							$c_email = $comments['email'];
							$c_dateTime = $comments['date_time'];
							$c_comment = $comments['comment'];
							?>
							
							<div class="comment-block" style="margin-bottom: 20px; ">
								<div class="row">
									<div class="col-sm-2" style="height: 70px;width: 100px; padding:0; margin:0;">
									<img src="Assets/Images/user-default.png" height="70px" width="100px">
									</div>
									<div class="col-sm-10">
										<div><span class="lead text-info"><?php echo $c_email; ?></span></div>
										<div><span><?php echo $c_dateTime; ?></span></div>
										<div><span class="lead"> Say: <?php echo $c_comment; ?></span></div>
									</div>
								</div>
							</div>

							<?php
						}
					}else {
							echo "No Comments Yet";
						}
				?>
    <!-- Comment -->

    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="../index.php " class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="../pages/ppdb.php " class="nav-link px-2 text-muted">PPDB</a></li>
            <li class="nav-item"><a href="../pages/blog.php " class="nav-link px-2 text-muted">Berita</a></li>
            <li class="nav-item"><a href="../pages/aboutus.php " class="nav-link px-2 text-muted">Tentang Kami</a></li>
        </ul>
        <p class="text-center text-muted">© 2022 Pondok Pesantren Nurul Jadid Al - Mas'udiyah</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>