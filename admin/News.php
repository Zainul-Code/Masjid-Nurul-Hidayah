<?php require_once('Include/Sessions.php'); ?>
<?php require_once('Include/Functions.php'); ?>
<?php ConfirmLogin(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>News</title>
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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
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
  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        <a href="News.php" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true">
          <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>News</span>
        </a>
        <a href="PPDB.php" class="list-group-item list-group-item-action py-2 ripple">
					<i class="fas fa-pen fa-fw me-3"></i><span>PPBD</span></a>
        <a href="NewPost.php" class="list-group-item list-group-item-action py-2 ripple">
          <i class="fas fa-chart-area fa-fw me-3"></i><span>New Post </span>
        </a>
        <a href="ManageAdmin.php" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-lock fa-fw me-3"></i><span>Manage Admin</span></a>
        <a href="Categories.php" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-chart-line fa-fw me-3"></i><span>Categories</span></a>
        <a href="Comments.php" class="list-group-item list-group-item-action py-2 ripple">
          <i class="fas fa-chart-pie fa-fw me-3"></i><span>Comments</span>
        </a>
        <a href="AboutUs.php" class="list-group-item list-group-item-action py-2 ripple">
        <i class="fas fa-user fa-fw me-3"></i><span>About Us</span></a>
        <a href="Logout.php" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-chart-bar fa-fw me-3"></i><span>Logout</span></a>
      </div>
    </div>
  </nav>
  <!-- Sidebar -->

  <!--Main layout-->
  <main style="margin-top: 58px">
    <div class="container pt-4">
      <!-- Section: Main chart -->
      <section class="mb-4">
        <div class="">
          <div class="card-header py-3">
            <h5 class="mb-0 text-center"><strong>News</strong></h5>
          </div>
          <div class="col-xs-10">
            <div>
              <?php echo SuccessMessage(); ?>
              <?php echo Message(); ?>
              <div class="table-responsive">
                <?php
                $sql = "SELECT * FROM cms_post ORDER BY post_date_time";
                $exec = Query($sql);
                $postNo = 1;
                if (mysqli_num_rows($exec) < 1) {
                ?>
                  <p class="lead">You Have 0 Post For The Moment</p>
                  <a href="NewPost.php"><button class="btn btn-info">Add Post</button></a>
                <?php
                } else { ?>
                  <table class="table table-hover">
                    <tr>
                      <th>Post No.</th>
                      <th>Post Date</th>
                      <th>Date Title</th>
                      <th>Author</th>
                      <th>Category</th>
                      <th>Feature Image</th>
                      <th>Comments</th>
                      <th>Action</th>
                      <th>Details</th>
                    </tr>
                    <?php
                    while ($post = mysqli_fetch_assoc($exec)) {
                      $post_id = $post['post_id'];
                      $post_date = $post['post_date_time'];
                      $post_title = $post['title'];
                      $category = $post['category'];
                      $author = "Admin";
                      $image = $post['image'];
                    ?>
                      <tr>
                        <td><?php echo $postNo; ?></td>
                        <td><?php echo $post_date; ?></td>
                        <td><?php
                            if (strlen($post_title) > 20) {
                              echo substr($post_title, 0, 20) . '...';
                            } else {
                              echo $post_title;
                            }

                            ?></td>
                        <td><?php echo $author; ?></td>
                        <td><?php echo $category; ?></td>
                        <td><?php echo "<img class='img-responsive' src='../pages/Upload/Image/$image' width='180px' height='120px'>"; ?></td>
                        <td><?php echo 'Ongoing'; ?></td>
                        <td><?php echo "<a href='EditPost.php?post_id=$post_id'>Edit</a> | <a href='DeletePost.php?delete_post_id=$post_id'>Delete</a>"; ?></td>
                        <td><a href="../pages/Post.php?id=<?php echo $post_id; ?>"><button class="btn btn-primary">Live Preview</button></a></td>
                      </tr>
                  <?php
                      $postNo++;
                    }
                  }
                  ?>
                  </table>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row navbar-inverse" id="footer"></div>
        <script type="text/javascript" src="jquery.js"></script>
        </div>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>