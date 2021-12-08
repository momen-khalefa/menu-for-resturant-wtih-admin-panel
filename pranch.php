<?php
session_start();

if(!isset( $_SESSION["user"])){
    header("Location:index.php");

}
include 'config.php';
$sql_pranch = "select * from pranches   ";
$result_pranch = $conn->query($sql_pranch) ;
$no_pranch=mysqli_num_rows($result_pranch);

if(isset($_POST['dell'])){
    $sql="delete from pranches where id=".$_POST['dell'];
    $result = $conn->query($sql);
    $sql="delete from item_pranch where pranch_id=".$_POST['dell'];
    $result = $conn->query($sql);
    header("Location:pranch.php");}



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
    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

    <?php
    function relode(){
        echo '<script type="text/javascript">';
        echo ' location.reload();';  //not showing an alert box.
        echo '</script>';
    }


?>
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
        <?php include 'sidebar.php' ; ?>

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
                <div class="row">

					<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">الفروع</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>اسم الفرع</th>
                                                <th>إجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
                                            for($i=0;$i<$no_pranch;$i++){
                                                $row = mysqli_fetch_array($result_pranch);
                                                echo '
                                                <tr>
                                                <form method="post">
                                                <td></td>
                                                <td>'.$row['name'].'</td>
                                                <td>
													<div class="d-flex">
														<a href="editpranch.php?no='.$row['id'].'" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<button type="submit" name="dell" value="'.$row['id'].'" class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></button>
														                                                        <a href="items_p.php?no='.$row['id'].'" class="btn btn-secondary shadow btn-xs sharp mr-1"><i class="fa fa-list"></i></a>

                                                        <a href="creat_qr.php?no='.$row['id'].'" class="btn btn-secondary shadow btn-xs sharp mr-1"><i class="fa fa-qrcode"></i></a>
														<a href="menu_home.php?no='.$row['id'].'"  target="_blank" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-chain-broken"></i></a>
													</div>												
												</td>
                                                </form>												
                                            </tr>
                                            ';

                                            }

                                            ?>
                                            
                                           
                                        </tbody>
                                    </table>
                                </div>
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
	
	<!-- Dashboard 1 -->
	<script src="./js/dashboard/dashboard-1.js"></script>
	<script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./js/plugins-init/datatables.init.js"></script>
	
</body>
</html>