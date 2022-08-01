<?php require_once('Include/Sessions.php'); ?>
<?php require_once('Include/Functions.php'); ?>
<?php ConfirmLogin(); ?>
<?php
	if (isset($_POST['submit_category'])) {
		date_default_timezone_set('Asia/Manila');
		$time = time();
		$dateTime = strftime('%Y-%m-%d ',$time);
		$categoryName = ($_POST['cat_name']);
		$category = mysqli_real_escape_string($con,$categoryName);
		$cat_name_length = strlen($category);
		$admin = $_SESSION['username']; 
		if (empty($category)) {
			$_SESSION['errorMessage'] = 'All Fields Must Be Fill Out' . $category;
			Redirect_To('Categories.php');
			exit;
		} else if ($cat_name_length > 50) {
			$_SESSION['errorMessage'] = 'Category Name Is Too Long.';
			Redirect_To('Categories.php');
		} else {
			global $con;
			$query = "INSERT INTO cms_category (cat_datetime, cat_name,	cat_creator) 
			VALUES('$dateTime', '$category', '$admin')";
			$exec = Query($query);
			if ($exec) {
				$_SESSION['successMessage'] = 'Category Added Successfully.';
				Redirect_To('Categories.php');
				mysqli_close($con);
			} else {
				$_SESSION['errorMessage'] = 'Something Went Wrong';
				Redirect_To('Categories.php');
			}
		}
	}

	if (isset($_GET['delete_attempt'])) {
		if (!empty($_GET['delete_attempt'])) {
			$_SESSION['del_id'] = $_GET['delete_attempt'];
			$_SESSION['optDeleteCategory'] = "";
			$_SESSION['categoryName'] = $_GET['name'];
		} else {
			Redirect_To('Categories.php');
		}
	}

	if (isset($_GET['CategoryID'])) {
		if (!empty($_GET['CategoryID'])) {
			$sql = "DELETE FROM cms_category WHERE cat_id = $_GET[CategoryID]";
			$exec = Query($sql);
			if ($exec) {
				$_SESSION['successMessage'] = "Category Delete Successfully";
				Redirect_To('Categories.php');
			} else {
				Redirect_To('Categories.php');
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<title>Categories</title>
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

					<a href="PPDB.php" class="list-group-item list-group-item-action py-2 ripple">
					<i class="fas fa-pen fa-fw me-3"></i><span>PPBD</span></a>

					<a href="NewPost.php" class="list-group-item list-group-item-action py-2 ripple">
					<i class="fas fa-chart-area fa-fw me-3"></i><span>New Post </span></a>

					<a href="ManageAdmin.php" class="list-group-item list-group-item-action py-2 ripple">
					<i class="fas fa-lock fa-fw me-3"></i><span>Manage Admin</span></a>

					<a href="Categories.php" class="list-group-item list-group-item-action py-2 ripple active">
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
		<!-- Section: Main chart -->
		<section>
			<div class="container pt-4">
				<div class="col-xs-10">
					<div class="page-title"><h1>Manage Category</h1></div>
					<?php echo Message(); ?>
					<?php echo SuccessMessage(); ?>
					<div>
						<div class="row">
							<div class="col-md-12 ">
								<h3>New Category</h3>
								<form method="POST" action="Categories.php">
									<fieldset>
										<div class="form-group" style="margin-top:1cm ;">
											<label for="cat_name">Name</label>
											<input class="form-control input-md" type="text" name="cat_name" placeholder="Name">
										</div>
										<div class="form-group" style="margin-top:1cm ;">
											<input class="form-control btn btn-primary" type="submit" name="submit_category" value="Add">
										</div>
									</fieldset>
								</form>
							</div>
						</div>
						<div id="cat_table " style="margin-top:1cm ;">
							<?php echo deleteCategory(); ?>
							<h3>Category List</h3>
							<table class="table table-striped table-hover" >
								<tr>
									<th>Number</th>
									<th>Category Name</th>
									<th>Date Added</th>
									<th>Added By</th>
									<th>Update</th>
									<th>Delete</th>
								</tr>
								<?php
									$num = 1;
									$viewSql = "SELECT * FROM cms_category ORDER BY cat_id DESC";
									$exec = Query($viewSql);
									while($data = mysqli_fetch_assoc($exec)) {
										$cat_id = $data['cat_id'];
										$cat_dateTime = $data['cat_datetime'];
										$cat_name = $data['cat_name'];
										$cat_creator = $data['cat_creator'];
										echo "<tr>
										<td>$num</td>
										<td>$cat_name</td>
										<td>$cat_dateTime</td>
										<td>$cat_creator</td>
										<td><input class='btn btn-success' type='button' name='update' value='Edit'></td>
										<td><a href='Categories.php?delete_attempt=$cat_id&name=$cat_name'><button class='btn btn-danger'>Delete</button></a></td>
										</tr>
										";
										$num++;
									} 
									mysqli_close($con);
								?>
							</table>
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