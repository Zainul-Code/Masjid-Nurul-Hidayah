<?php require_once('Include/Sessions.php'); ?>
<?php require_once('Include/Functions.php'); ?>
<?php ConfirmLogin(); ?>
<?php

	if(isset($_POST['submit'])){
		$aboutPostContent = mysqli_real_escape_string($con, $_POST['about-post-content']);
		$visi = mysqli_real_escape_string($con, $_POST['post-visi']);
		$misi = mysqli_real_escape_string($con, $_POST['post-misi']);
		$query = "UPDATE cms_aboutus SET about='$aboutPostContent',vision='$visi',mission='$misi' WHERE id=1 ";
		$exec = Query($query);
			if ($exec) {
				// move_uploaded_file($_FILES['post-image']['tmp_name'], $imageDirectory);
				$_SESSION['successMessage'] = "Post Added Successfully";
			} else {
				$_SESSION['errorMessage'] = "Something Went Wrong Please Try Again";
			}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<title>About Us</title>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
	<!-- Google Fonts Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
	<!-- MDB -->
	<link rel="stylesheet" href="../css/mdb.min.css" />
	<!-- Custom styles -->
	<link rel="stylesheet" href="../css/admin.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw=="
		crossorigin="anonymous"></script>
</head>

<body style="padding-bottom: 1cm;">
	<!--Main Navigation-->
	<header>
		<!-- Sidebar -->
		<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
			<div class="position-sticky">
				<div class="list-group list-group-flush mx-3 mt-4">
					<a href="News.php" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
					<i class="fas fa-tachometer-alt fa-fw me-3"></i><span>News</span></a>

                    <a href="PPDB.php" class="list-group-item list-group-item-action py-2 ripple">
					<i class="fas fa-pen fa-fw me-3"></i><span>PPBD</span></a>

					<a href="NewPost.php" class="list-group-item list-group-item-action py-2 ripple">
					<i class="fas fa-chart-area fa-fw me-3"></i><span>New Post </span></a>

					<a href="ManageAdmin.php" class="list-group-item list-group-item-action py-2 ripple">
					<i class="fas fa-lock fa-fw me-3"></i><span>Manage Admin</span></a>

					<a href="Categories.php" class="list-group-item list-group-item-action py-2 ripple">
					<i class="fas fa-chart-line fa-fw me-3"></i><span>Categories</span></a>

					<a href="Comments.php" class="list-group-item list-group-item-action py-2 ripple">
					<i class="fas fa-chart-pie fa-fw me-3"></i><span>Comments</span></a>

                    <a href="AboutUs.php" class="list-group-item list-group-item-action py-2 ripple active">
                    <i class="fas fa-user fa-fw me-3"></i><span>About Us</span></a>

					<a href="Logout.php" class="list-group-item list-group-item-action py-2 ripple">
					<i class="fas fa-chart-bar fa-fw me-3"></i><span>Logout</span></a>
				</div>
			</div>
		</nav>
		<!-- Sidebar -->

		<!-- Navbar -->
		<nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
			<!-- Container wrapper -->
			<div class="container-fluid">
				<!-- Toggle button -->
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
				aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fas fa-bars"></i>
				</button>

				<!-- Brand -->
				<a class="navbar-brand" href="../index.php">
				<img src="../img/icon/favicon.ico" height="25" alt="" loading="lazy" />
				</a>
			</div>
			<!-- Container wrapper -->
		</nav>
		<!-- Navbar -->
	</header>
	<!--Main Navigation-->

	<!--Main layout-->
	<main style="margin-top: 58px">
		<!-- Section: Main chart -->
		<section>
			<div class="container pt-4">
				<div class="col-xs-10">
					<div class="page-title"><h1>Manage About Us</h1></div>
					<?php echo Message(); ?>
					<?php echo SuccessMessage(); ?>
					<?php
					$sqlCheckVisiMisi = "SELECT *  FROM cms_aboutus";
					$checkVisiMisi = Query($sqlCheckVisiMisi);
					if ($checkVisiMisi){
						$post = mysqli_fetch_assoc($checkVisiMisi);
						$postAboutus = $post['about'];
						$postVisi = $post['vision'];
						$postMisi = $post['mission'];
					}
					?>
					<div>
						<div class="row">
							<div class="col-md-12 ">
								<form method="POST" action="AboutUs.php">
									<fieldset>
										<div class="form-group" style="margin-top:1cm ;">
											<label for="cat_name"><strong>Tentang Pondok Pesantren Nurul Jadid</strong></label>
											<br>
											<br>
											<!-- <input class="form-control input-md" type="text" name="about-post-content" id="about-post-content" placeholder="Ceritakan tentang Pesantren Nurul Jadid"> -->
											<textarea name="about-post-content" id="about-post-content" cols="100" rows="5" placeholder="Ceritakan tentang Pesantren Nurul Jadid "><?php echo $postAboutus ?></textarea>
										</div>

                                        <div class="form-group" style="margin-top:1cm ;">
											<label for="cat_name"><strong>Visi</strong></label>
											<br>
											<br>
											<!-- <input class="form-control input-md text-area" type="text" name="post-visi" id="post-visi" placeholder="Tuliskan visi di sini"> -->
											<textarea name="post-visi" id="post-visi" cols="100" rows="5" placeholder="Tuliskan visi di sini"><?php echo $postVisi ?></textarea>
										</div>

                                        <div class="form-group" style="margin-top:1cm ;">
											<label for="cat_name"><strong>Misi</strong></label>
											<br>
											<br>
											<!-- <input class="form-control input-md" type="text" name="post-misi" id="post-misi" placeholder="Tuliskan misi di sini"> -->
											<textarea name="post-misi" id="post-misi" cols="100" rows="5" placeholder="Tuliskan misi di sini"><?php echo $postMisi ?></textarea>
										</div>
										<div class="form-group" style="margin-top:1cm;">
											<input class="form-control btn btn-primary" type="submit" name="submit" id="submit" value="Save">
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script type="text/javascript" src="jquery.js"></script>
		</section>
		<!-- Section: Main chart -->
	</main>
	<!--Main layout-->
	<!-- MDB -->
	<script type="text/javascript" src="../../js/mdb.min.js"></script>
	<!-- Custom scripts -->
	<script type="text/javascript" src="../../js/admin.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>