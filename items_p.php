<?php
session_start();

if(!isset( $_SESSION["user"])){
    header("Location:index.php");

}
if(!isset( $_GET["no"])){
    header("Location:items.php");

}
include 'config.php';
$sql_items = "SELECT * from items , ( SELECT item_id from item_pranch where pranch_id=".$_GET["no"].") tt2 where items.id=tt2.item_id ";
$result_items = $conn->query($sql_items) ;
$no_items=mysqli_num_rows($result_items);

if(isset($_POST['dell'])){
    $sql="delete from items where id=".$_POST['dell'];
    $result = $conn->query($sql);
    $sql="delete from item_pranch where item_id=".$_POST['dell'];
    $result = $conn->query($sql);
    header("Location:items.php");}

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
            <a href="index.html" class="brand-logo">
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
                                <h4 class="card-title">الأصناف</h4>
                                <a href="items.php"  class="btn btn-primary">الكل</a>
                           					<?php $sql_pranches = "select * from pranches   ";
                                      $result_pranches = $conn->query($sql_pranches) ;
                                      $no_pranches=mysqli_num_rows($result_pranches);
                                      for($m=0 ; $m< $no_pranches ;$m++){
                                         $row22 = mysqli_fetch_array($result_pranches);
                                         echo '<a href="items_p.php?no='.$row22['id'].'"  class="btn btn-primary">'.$row22['name'].'</a>
                                                ';
                                         

                                      }

                                ?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>اسم الصنف</th>
                                                <th>المجموعة</th>
                                                <th>السعر</th>
                                                <th>إجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
                                            for($i=0;$i<$no_items;$i++){
                                                $row = mysqli_fetch_array($result_items);
                                                $sql = "select * from categories  where id=".$row['cat_id'];
                                                $res = $conn->query($sql) ;
                                                $row2 = mysqli_fetch_array($res);
                                                echo '<tr>
                                                <form method="post">
                                                <td><img class="rounded-circle" width="35" src="images/product/'.$row['image'].'" alt=""></td>
                                                <td>'.$row['name'].'</td>
                                                <td>'.$row2['name'].'</td>
                                                <td>'.$row['price'].'</td>
                                                <td>
													<div class="d-flex">
														<a href="edititem.php?no='.$row['id'].'" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<button type="submit" name="dell" value="'.$row['id'].'" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
													</div>												
												</td>	
                                               </form>											
                                            </tr>';

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