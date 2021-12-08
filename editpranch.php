<?php
session_start();

if(!isset( $_SESSION["user"])){
    header("Location:index.php");

}
include 'config.php';
if(isset($_GET['no'])){
    $sql_items = "select * from pranches where id=".$_GET['no'];
    $result_items = $conn->query($sql_items) ;
    $no_items=mysqli_num_rows($result_items);
    $row= mysqli_fetch_array($result_items);
    if($no_items==0){
        header("Location:pranch.php");
    }

}
else{
    header("Location:pranch.php");

}
if(isset($_POST['save'])){
    $sql = "UPDATE pranches set name='".$_POST['name']."' where id=".$_POST['save'];
    $result = $conn->query($sql) ;
    header("Location:pranch.php");

}
if(isset($_POST['cancel'])){
    header("Location:pranch.php");

}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>TTS Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/iconlogo.png">
    <link href="./vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="./vendor/chartist/css/chartist.min.css">
    <link href="./vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
	<link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">

</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="home.php" class="brand-logo">
                <img class="logo-abbr" src="./images/iconlogo.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        <?php include 'header.php' ; ?>

        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a class="has-arrow ai-icon active" href="index.html" aria-expanded="false">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">الصفحة الرئيسية</span>
						</a>
                    </li>
                
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-television"></i>
							<span class="nav-text">الفروع</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="resturants.html">قائمة الفروع</a></li>
                            <li><a href="Add_resturant.html">إضافة فرع</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-layer-1"></i>
							<span class="nav-text">المجموعات</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="catagories.html">قائمة المجموعات</a></li>
                            <li><a href="Add_catagorie.html">إضافة مجموعة</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-notepad"></i>
							<span class="nav-text">الأصناف</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="products.html">قائمة الأصناف</a></li>
                            <li><a href="Add_product.html">إضافة صنف</a></li>
                        </ul>
                    </li>
                </ul>
				<div class="copyright" style="padding-top: 200px; ">
					<p><strong>True Time Solution Admin Dashboard</strong> © 2021 All Rights Reserved</p>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="form-head d-flex mb-3 align-items-start">
					<div class="mr-auto d-none d-lg-block">
					</div>
					
				</div>
              <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" style="text-align: center; " >تعديل فرع</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>اسم الفرع</label>
                                                <input type="text" class="form-control" placeholder=""required  value="<?php  echo $row['name'] ; ?>" name="name">
                                            </div>
                                        </div>
                                        <button type="submit" name="save"  value="<?php echo $row['id'];?>" class="btn btn-success">حفظ</button>
                                        <button type="submit" name="cancel" class="btn btn-dark">إالغاء </button>  
                                      </form>
                                </div>
                            </div>
                        </div>
					</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
	<script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="./vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="./js/custom.min.js"></script>
	<script src="./js/deznav-init.js"></script>
	
	<!-- Counter Up -->
    <script src="./vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="./vendor/jquery.counterup/jquery.counterup.min.js"></script>	
		
	<!-- Apex Chart -->
	<script src="./vendor/apexchart/apexchart.js"></script>	
	
	<!-- Chart piety plugin files -->
	<script src="./vendor/peity/jquery.peity.min.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="./js/dashboard/dashboard-1.js"></script>
	
	
</body>
</html>