<?php require_once('Include/Sessions.php'); ?>
<?php require_once('Include/Functions.php'); ?>
<?php ConfirmLogin(); ?>
<?php
$getData = "SELECT * FROM cms_ppdb";
$execData = Query($getData);
	if (isset($_POST['submit'])){
		$forms = mysqli_real_escape_string($con,$_POST['googleFormsEmbed']);
		$spreadsheet = mysqli_real_escape_string($con,$_POST['googleSpreadsheetEmbed']);
		
		if (mysqli_num_rows($execData) > 0){
			$query = "UPDATE cms_ppdb SET googleSpreadsheetEmbedLink='$spreadsheet',googleFormsEmbedLink='$forms'";
			$exec = Query($query);
			$_SESSION['successMessage'] = "UPDATE Berhasil";
		} else if (mysqli_num_rows($execData) < 1){
			$query = "INSERT INTO cms_ppdb (googleSpreadsheetEmbedLink,googleFormsEmbedLink) VALUES ('$forms','$spreadsheet')";
			$exec = Query($query);
			$_SESSION['successMessage'] = "INSERT Berhasil";
		} else {
			$_SESSION['errorMessage'] = 'Error';
			Redirect_To('../admin/PPDB.php');
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<title>Data PPDB</title>
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

<body>
	<!--Main Navigation-->
	<header>
		<!-- Sidebar -->
		<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
			<div class="position-sticky">
				<div class="list-group list-group-flush mx-3 mt-4">
					<a href="News.php" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
					<i class="fas fa-tachometer-alt fa-fw me-3"></i><span>News</span></a>

                    <a href="PPDB.php" class="list-group-item list-group-item-action py-2 ripple active">
					<i class="fas fa-pen fa-fw me-3"></i><span>PPBD</span></a>

					<a href="NewPost.php" class="list-group-item list-group-item-action py-2 ripple">
					<i class="fas fa-chart-area fa-fw me-3"></i><span>New Post </span></a>

					<a href="ManageAdmin.php" class="list-group-item list-group-item-action py-2 ripple">
					<i class="fas fa-lock fa-fw me-3"></i><span>Manage Admin</span></a>

					<a href="Categories.php" class="list-group-item list-group-item-action py-2 ripple">
					<i class="fas fa-chart-line fa-fw me-3"></i><span>Categories</span></a>

					<a href="Comments.php" class="list-group-item list-group-item-action py-2 ripple">
					<i class="fas fa-chart-pie fa-fw me-3"></i><span>Comments</span></a>

					<a href="AboutUs.php" class="list-group-item list-group-item-action py-2 ripple">
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
		<div class="container pt-4">
			<?php
				if (mysqli_num_rows($execData) > 0){
					$post = mysqli_fetch_assoc($execData);
					$postForms = $post['googleFormsEmbedLink'];
					$postSpreadsheet = $post['googleSpreadsheetEmbedLink'];
				} else {
					$postForms = "Data Kosong !!!";
					$postSpreadsheet = "Data Kosong !!!";
				}
			?>
			<!-- Section: Main chart -->
			<section>
				<form action="PPDB.php" method="post">
					<h3>🔗 Link Google Forms</h3>
					<textarea name="googleFormsEmbed" id="googleFormsEmbed" cols="100" rows="1" required><?php echo $postForms ?></textarea>
					<br>
					<br>
					<h3>🔗 Link embed Google spreadsheets</h3>
					<textarea name="googleSpreadsheetEmbed" id="googleSpreadsheetEmbed" cols="100" rows="1" required><?php echo $postSpreadsheet ?></textarea>
					<div style="margin: top 200px;">
						<input style="width: 100px ;" class="form-control btn btn-primary" type="submit" name="submit" id="submit" value="Save">
					</div>
					</form>
					<br>
					<br>
					<br>
					<div class="page-title"><h1>Data PPDB</h1></div>
					<div class="embed-responsive embed-responsive-21by9">
						<?php echo Message(); ?>
						<?php echo SuccessMessage(); ?>
						<iframe style="width:100%;" class="embed-responsive-item" src="<?php echo $postSpreadsheet ?>?widget=true&amp;headers=false" allowfullscreen></iframe>
					</div>
					<div class="row navbar-inverse" id="footer"></div>
					<script type="text/javascript" src="jquery.js"></script>
			</section>
			<!-- Section: Main chart -->
		</div>
	</main>
	<!--Main layout-->
	<!-- MDB -->
	<script type="text/javascript" src="../../js/mdb.min.js"></script>
	<!-- Custom scripts -->
	<script type="text/javascript" src="../../js/admin.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>