<?php
session_start();

if(!isset( $_SESSION["user"])){
    header("Location:index.php");

}
include 'config.php';

if(isset($_POST['submit'])){
    $item_name=$_POST["item_name"];
    $item_price=$_POST["item_price"];
    $item_group=$_POST["item_group"];
    $item_pranch=$_POST["item_pranch"];
    $short_note=$_POST["short_note"];
    $note=$_POST["note"];
    $target_dir = "images/product/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (!file_exists($target_file)) {

// Check if file already exists
    if (!($_FILES["image"]["size"] > 500000)) {
        // Allow certain file formats
       if(!($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif" )) {
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                alert3("Sorry, your file was not uploaded.");
              } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                  $image_name=htmlspecialchars( basename( $_FILES["image"]["name"]));
                  $sql = "INSERT INTO items (name,cat_id,price,short_note,note,image) VALUES ('$item_name','$item_group','$item_price','$short_note','$note','$image_name')";
                  if ($conn->query($sql) === TRUE) {
                     $last_id = $conn->insert_id;
                     foreach ($_POST['item_pranch'] as $subject){
                        $sql = "INSERT INTO item_pranch  (item_id,pranch_id) VALUES ('$last_id','$subject')";
                        $conn->query($sql);
                     }
                     print "You selected $subject<br/>";
                      echo "New record created successfully";
                      alert();
              
                  } else {
                      echo "Error: " . $sql . "<br>" . $conn->error;
                      alert2();
                  }
                  
                  
              
                } else {
                  echo "Sorry, there was an error uploading your file.";
                  alert3("Sorry, there was an error uploading your file.");
                }
              }         
         } 
         else{
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
            alert3("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
         }
      }
      else{
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
        alert3("Sorry, your file is too large.");
      }
    }
    else{
        $image_name=htmlspecialchars( basename( $_FILES["image"]["name"]));
                  $sql = "INSERT INTO items (name,cat_id,price,short_note,note,image) VALUES ('$item_name','$item_group','$item_price','$short_note','$note','$image_name')";
                  if ($conn->query($sql) === TRUE) {
                     $last_id = $conn->insert_id;
                     foreach ($_POST['item_pranch'] as $subject){
                        $sql = "INSERT INTO item_pranch  (item_id,pranch_id) VALUES ('$last_id','$subject')";
                        $conn->query($sql);
                     }
                     print "You selected $subject<br/>";
                      echo "New record created successfully";
                      alert();
                    }
    }

     
    

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
    <?php

    function alert(){
        echo '<script type="text/javascript">';
        echo ' alert("?????? ?????????????? ??????????")';  //not showing an alert box.
        echo '</script>';
    }
    function alert2(){
        echo '<script type="text/javascript">';
        echo ' alert("???????? ??????????")';  //not showing an alert box.
        echo '</script>';
    }
    function alert3($text){
        echo '<script type="text/javascript">';
        echo ' alert("'.$text.'")';  //not showing an alert box.
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
              <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" style="text-align: center; " >?????????? ????????</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method='post' enctype="multipart/form-data" >

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>?????? ????????????</label>
                                                <input type="text" class="form-control" placeholder=""required name="item_name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>??????????</label>
                                                <div class="input-group mb-3  input-info">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">???</span>
                                                    </div>
                                                    <input type="number" class="form-control "required name="item_price">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                </div>                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>????????????????</label>
                                                <select id="inputState" class="form-control" required name="item_group">
                                                    <option selected>???????? ????????????????</option>
                                                    <?php 
                                                    $sql_categories = "select * from categories   ";
                                                    $result_categories = $conn->query($sql_categories) ;
                                                    $no_categories=mysqli_num_rows($result_categories);
                                                    for($i=0;$i<$no_categories;$i++){
                                                        $row = mysqli_fetch_array($result_categories);
                                                        echo '<option value="'.$row['id'].'">'.$row['name'].' </option>';
                                                    }
                                                    ?>
                                                </select>                                            
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>????????????</label>
                                                <select class="form-control"  multiple="multiple" required name="item_pranch[]">
                                                <?php 
                                                    $sql_pranches = "select * from pranches   ";
                                                    $result_pranches = $conn->query($sql_pranches) ;
                                                    $no_pranches=mysqli_num_rows($result_pranches);
                                                    for($i=0;$i<$no_pranches;$i++){
                                                        $row = mysqli_fetch_array($result_pranches);
                                                        echo '<option value="'.$row['id'].'">'.$row['name'].' </option>';
                                                    }
                                                    ?>
                                                </select>                                          
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>?????????? ???????????? ????????????????????</label>
                                                <textarea class="form-control" rows="4" placeholder=""required name="short_note"></textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>?????? ???? ????????????</label>
                                                <textarea class="form-control" rows="4" id="comment" name="note"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>????????????</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" required name="image" id="fileInput">
                                                        <label class="custom-file-label" id="p1">???????? ????????</label>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="submit">?????????? ????????</button>
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
    <script type="text/javascript">
   document.getElementById('fileInput').onchange = function () {
       document.getElementById("p1").innerHTML = this.value.split(/(\\|\/)/g).pop();
         };
   </script>
	
</body>
</html>