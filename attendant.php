<?php
require 'mysqlConnect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>smart-parking</title>
    <link rel="icon" href="assets/img/ny.jpg" />

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- Bootstrap Core CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="jquery/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">

            <!--logo start-->
            <a href="index.php" class="logo"><b>Smart-parking</b></a>
            <!--logo end-->

        </header>
      <!--header end-->
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                  <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                  <h5 class="centered"> <?php echo $_SESSION['email']; ?></h5>
                  <li class="mt">
                      <a href="admin.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Add Parking Attendant Details</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
              <form class="form-horizontal" action="attendant.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <div class="col-sm-10">
            <input type="text" class="form-control"  placeholder="first name" name="Fname">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10">
            <input type="text" class="form-control"  placeholder="last name" name="Lname">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10">
            <input type="text" class="form-control"  placeholder="mobile number" name="mobile_no">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="location" name="location">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-6 col-sm-10">
            <button type="submit" class="btn btn-default" name="sub">Submit</button>
          </div>
        </div>
      </form>
      </div>
    </div>

</section>
<!--/wrapper -->
</section><!-- /MAIN CONTENT -->

<!--main content end-->
<!--footer start-->
<?php
if(isset($_POST['sub'])){
  $Fname=mysqli_real_escape_string($con,$_POST['Fname']);
	$Lname=mysqli_real_escape_string($con,$_POST['Lname']);
	$mobile_no=mysqli_real_escape_string($con,$_POST['mobile_no']);
  $location=mysqli_real_escape_string($con,$_POST['location']);

  if($Fname==''&& $Lname==''&& $mobile_no=='' && $location==''){
		echo"<script>alert('please fill all field')</script>";
      echo"<script>window.open('attendant.php','_self')</script>";
		exit();
	}
  else{

		$insert="INSERT INTO `attendant` (`id`, `Fname`, `Lname`, `mobile_no`, `location`) VALUES (NULL, '$Fname', '$Lname', '$mobile_no', '$location');";
		$run_insert=mysqli_query($con,$insert);
		if($run_insert){
			echo"<script>alert('registration successful')</script>";
      echo"<script>window.open('attendant.php','_self')</script>";


		}
}}
?>

<footer class="site-footer">
    <div class="text-center">
        &copy; <?php echo date("Y"); ?> Copyright.
        <a href="blank.html#" class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</footer>
<!--footer end-->
</section>
<!-- js placed at the end of the document so the pages load faster -->
<script src="script.js"></script>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<!--common script for all pages-->
<script src="assets/js/common-scripts.js"></script>



<!--script for this page-->

</body>
</html>
