<?php require_once('Include/Sessions.php'); ?>
<?php require_once('Include/Functions.php'); ?>
<?php ConfirmLogin(); ?>
<?php
	if (isset( $_POST['post-delete'])) {
		$sql = "DELETE  FROM cms_post WHERE post_id = '$_POST[deleteID]' ";
		$exec = Query($sql);

		if ($exec) {
			$_SESSION['successMessage'] = "Post Deleted Successfully";
			Redirect_To('News.php');
		} else {
			$_SESSION['errorMessage'] = "Something Went Wrong, Post Is Not Deleted. Please Try Again Later";
			Redirect_To('News.php');
		}
	} else if (isset($_GET['delete_post_id'])) {
		if (!empty($_GET['delete_post_id'])) {
			$sql = "SELECT * FROM cms_post WHERE post_id = '$_GET[delete_post_id]'";
			$exec = Query($sql);
			if (mysqli_num_rows($exec) > 0 ) {
				if ($post = mysqli_fetch_assoc($exec)) {
					$post_id = $post['post_id'];
					$post_date = $post['post_date_time'];
					$post_title = $post['title'];
					$post_category = $post['category'];
					$post_author = $post['author'];
					$post_image = $post['image'];
					$post_content = $post['post'];
				}
			} 
		}
	} else {
		Redirect_To('News.php');
	}
?>
<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<title>Material Design for Bootstrap</title>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
	<!-- Google Fonts Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
	<!-- MDB -->
	<link rel="stylesheet" href="../css/mdb.min.css" />
	<!-- Custom styles -->
	<link rel="stylesheet" href="../css/admin.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
</head>

<body>
	<!--Main Navigation-->
	<header>

      	<!-- Navbar -->
      	<nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
		<!-- Container wrapper -->
			<div class="container-fluid">
				<!-- Toggle button -->
				<!-- Using Javascript -->
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
				aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fas fa-bars"></i>
				</button>

				<!-- Brand -->
				<a class="navbar-brand" href="#">
				<img src="../img/icon/favicon.ico" height="25" alt="" loading="lazy" />
				</a>
			</div>
			<!-- Container wrapper -->
    	</nav>
    	<!-- Navbar -->
  	</header>
  	<!--Main Navigation-->

   	<!-- Sidebar -->
	<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
		<div class="position-sticky">
			<div class="list-group list-group-flush mx-3 mt-4">
				<a href="Dashboard.php" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true">
				<i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span></a>

				<a href="NewPost.php" class="list-group-item list-group-item-action py-2 ripple">
				<i class="fas fa-chart-area fa-fw me-3"></i><span>New Post </span></a>

				<a href="Admin.php" class="list-group-item list-group-item-action py-2 ripple">
				<i class="fas fa-lock fa-fw me-3"></i><span>Manage Admin</span></a>

				<a href="Categories.php" class="list-group-item list-group-item-action py-2 ripple">
				<i class="fas fa-chart-line fa-fw me-3"></i><span>Categories</span></a>

				<a href="Comments.php" class="list-group-item list-group-item-action py-2 ripple">
				<i class="fas fa-chart-pie fa-fw me-3"></i><span>Comments</span></a>

				<a href="Logout.php" class="list-group-item list-group-item-action py-2 ripple">
				<i class="fas fa-chart-bar fa-fw me-3"></i><span>Logout</span></a>
			</div>
		</div>
	</nav>
	<!-- Sidebar -->

	<!--Main layout-->
	<main style="margin-top: 58px">
		<div class="container pt-4">
			<!-- Section: Main chart -->
			<section>
				<div class="col-xs-10">
					<div class="page-title"><h2>Delete Post</h2></div>
						<?php echo Message(); ?>
						<?php echo SuccessMessage(); ?>
						<form action="DeletePost.php" method="POST" enctype="multipart/form-data">
							<fieldset>
								<div class="form-group">
									<button name="post-delete" class="btn btn-danger form-control">DELETE</button>
								</div>
								<div class="form-group">
									<labal for="post-title">Title</labal>
									<input disabled type="text" name="post-title" class="form-control" id="post-title" value="<?php echo $post_title ?>">
								</div>
								<div class="form-group">
									<label>Existing Category : <?php echo htmlentities($post_category); ?></label><br>
									<labal for="post-category">Change Category</labal>
									<select disabled class="form-control" name="post-category" id="post-category" value="<?php echo $post_category ?>">
										<?php
											$sql = "SELECT cat_name FROM cms_category";
											$exec = Query($sql);
											$selected = "";
											while($row = mysqli_fetch_assoc($exec)){ 
												// if ( $row['cat_name'] == $post_category ) {
												// 	$select = 'selected';
												// }
												if($post_category === $row['cat_name']) {
													?>
													<option selected="selected" ><?php echo htmlentities($row['cat_name']) ?></option>
													<?php
												}else {
													?>
													<option><?php echo htmlentities($row['cat_name']) ?></option>
													<?php
												}
											}
										?>
									</select>
								</div>
								<label>Existing Image: <img src="../pages/Upload/Image/<?php echo $post_image;  ?>" width='180' height='120'> </label>
								<div class="form-group">
									<labal for="post-image">Change Image</labal>
									<input disabled type="File" name="post-image" class="form-control">
								</div>
								<div class="form-group">
									<labal for="post-content">Existing Content</labal>
									<textarea disabled rows="10" class="form-control" name="post-content" id="post-content"><?php echo htmlentities($post_content);  mysqli_close($con); ?></textarea>
								</div>
								<input type="hidden" name="deleteID" value="<?php echo $_GET['delete_post_id']; ?>">
								<input type="hidden" name="currentImage" value="<?php echo $post_image; ?>">
							</fieldset>
						</form>
					</div>
				</div>
			</section>
			<!-- Section: Main chart -->
			<div class="row navbar-inverse" id="footer">
		</div>
	</div>
	<script type="text/javascript" src="jquery.js"></script>		
	</main>
	<!--Main layout-->

	<!-- MDB -->
	<script type="text/javascript" src="../../js/mdb.min.js"></script>
	<!-- Custom scripts -->
	<script type="text/javascript" src="../../js/admin.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>