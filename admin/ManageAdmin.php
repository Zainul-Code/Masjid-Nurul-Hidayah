<?php require_once('Include/Sessions.php'); ?>
<?php require_once('Include/Functions.php'); ?>
<?php ConfirmLogin(); ?>
<?php
	if (isset($_POST['submit'])) {
		date_default_timezone_set('Asia/Manila');
		$time = time();
		$dateTime = strftime('%Y-%m-%d %H:%M:%S ',$time);
		$username = mysqli_real_escape_string($con,$_POST['username']);
		$password = mysqli_real_escape_string($con,$_POST['password']);
		$confirmPassword = mysqli_real_escape_string($con,$_POST['confirm_password']);
		$creator = $_SESSION['username'];
		if (empty($username) || empty($password) || empty($confirmPassword)) {
			$_SESSION['errorMessage'] = 'All Fields Must Be Fill Out';
			Redirect_To('ManageAdmin.php');
		} else if (strlen($password) < 7) {
			$_SESSION['errorMessage'] = 'Password Must Be 7 Or More Characters';
			Redirect_To('ManageAdmin.php');
		} else if ($password !== $confirmPassword) {
			$_SESSION['errorMessage'] = 'Password And Re-tpe Password Does Not Match';
			Redirect_To('ManageAdmin.php');
		} else {
			$sql = "INSERT INTO cms_admin (date_time, username, password, added_by) VALUES('$dateTime', '$username', '$password', '$creator')";
			$exec = Query($sql);
			if ($exec) {
				$_SESSION['successMessage'] = 'New Admin Has Been Created Successfully';
				mysqli_close($con);
				Redirect_To('ManageAdmin.php');
			} else {
				$_SESSION['errorMessage'] = 'Something Went Wrong Please Try Again Later';
				Redirect_To('ManageAdmin.php');
			}
		}
	}

	if (isset($_GET['del_admin'])) {
		if (!empty($_GET['del_admin'])) {
			$sql = "DELETE FROM cms_admin WHERE id = '$_GET[del_admin]'";
			$exec = Query($sql);
			if ($exec) {
				$_SESSION['successMessage'] = 'Admin Deleted Successfully';
				mysqli_close($con);
				Redirect_To('ManageAdmin.php');
				
			} else {
				$_SESSION['errorMessage'] = 'Something Went Wrong Please Try Again Later';
				mysqli_close($con);
				Redirect_To('ManageAdmin.php');

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
	<title>Manage Admin</title>
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

				<a href="ManageAdmin.php" class="list-group-item list-group-item-action py-2 ripple active">
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
			<!-- Section: Main chart -->
			<section>
				<div class="col-xs-10">
					<div class="page-title"><h1>Manage Admin</h1></div>
					<?php echo Message(); ?>
					<?php echo SuccessMessage(); ?>
					<div>
						<div class="row">
							<div class="col-md-12 ">
								<form method="POST" action="ManageAdmin.php">
									<fieldset>
										<div class="form-group">
											<label for="username">Email</label>
											<input class="form-control input-md" type="text" name="username" placeholder="Email">
										</div>
										<div class="form-group">
											<label for="password">Password</label>
											<input class="form-control input-md" type="Password" name="password" placeholder="Password">
										</div>
										<div class="form-group">
											<label for="confirm_password">Re-type Same Password</label>
											<input class="form-control input-md" type="Password" name="confirm_password" placeholder="Confirm Password">
										</div>
										<div class="form-group" style="margin-top: 1cm; margin-bottom: 1cm;">
											<input class="form-control btn btn-primary" type="submit" name="submit" value="Register New Admin">
										</div>
									</fieldset>
								</form>
							</div>
						</div>
						<div id="cat_table">
							<?php echo deleteCategory(); ?>
							<h3>Registered Admins</h3>
							<table class="table table-striped table-hover">
								<tr>
									<th>Number</th>
									<th>Date Added</th>
									<th>Email</th>
									<th>Added By</th>
									<th>Action</th>
								</tr>
								<?php
									$num = 1;
									$viewSql = "SELECT * FROM cms_admin ORDER BY date_time DESC";
									$exec = Query($viewSql);
									while($data = mysqli_fetch_assoc($exec)) {
										$id = $data['id'];
										$dateAdded = $data['date_time'];
										$username = $data['username'];
										$creator = $data['added_by'];
										echo "<tr>
											<td>$num</td>
												<td>$dateAdded</td>
												<td>$username</td>
												<td>$creator</td>
												<td><a href='ManageAdmin.php?del_admin=$id'><button class='btn btn-danger'>Delete</button></a></td>
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
				<!-- Main Content -->
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