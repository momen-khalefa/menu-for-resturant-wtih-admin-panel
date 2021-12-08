<?php
session_start();

if(!isset( $_SESSION["user"])){
    header("Location:index.php");

}
include 'config.php';
if(isset($_GET['no'])){
    $sql_items = "select * from items where id=".$_GET['no'];
    $result_items = $conn->query($sql_items) ;
    $no_items=mysqli_num_rows($result_items);
    $row= mysqli_fetch_array($result_items);
    if($no_items==0){
        header("Location:items.php");
    }

}
else{
    header("Location:items.php");

}
if(isset($_POST['save'])){
    $item_name=$_POST["item_name"];
    $item_price=$_POST["item_price"];
    $item_group=$_POST["item_group"];
    $item_pranch=$_POST["item_pranch"];
    $short_note=$_POST["short_note"];
    $note=$_POST["note"];
    if( htmlspecialchars( basename( $_FILES["image"]["name"])) != null){
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
                          $sql = " DELETE from item_pranch where item_id=".$_POST['save'];
                          $result = $conn->query($sql) ;
                          $sql = "UPDATE items set name='$item_name',cat_id='$item_group',price='$item_price',short_note='$short_note',note='$note',image='$image_name'  where id=".$_POST['save'];
                          if ($conn->query($sql) == TRUE) {
                             $last_id =  $_POST['save'];
                             foreach ($_POST['item_pranch'] as $subject){
                                $sql = "INSERT INTO item_pranch  (item_id,pranch_id) VALUES ('$last_id','$subject')";
                                $conn->query($sql);
                             }
                                  header("Location:items.php");

                      
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
                          $sql = " DELETE from item_pranch where item_id=".$_POST['save'];
                          $result = $conn->query($sql) ;
                          $sql = "UPDATE items set name='$item_name',cat_id='$item_group',price='$item_price',short_note='$short_note',note='$note',image='$image_name' where id=".$_POST['save'];
                          if ($conn->query($sql) ==TRUE) {
                             $last_id = $_POST['save'];
                             foreach ($_POST['item_pranch'] as $subject){
                                $sql = "INSERT INTO item_pranch  (item_id,pranch_id) VALUES ('$last_id','$subject')";
                                $conn->query($sql);
                             }
                              header("Location:items.php");

                            }
            }
        
             

    }
    else{
        $sql = " DELETE from item_pranch where item_id=".$_POST['save'];
        $result = $conn->query($sql) ;
        $sql = "UPDATE items set name='$item_name',cat_id='$item_group',price='$item_price',short_note='$short_note',note='$note'  where id=".$_POST['save'];
        if ($conn->query($sql) ==TRUE) {
           $last_id =$_POST['save'];
           foreach ($_POST['item_pranch'] as $subject){
              $sql = "INSERT INTO item_pranch  (item_id,pranch_id) VALUES ('$last_id','$subject')";
              $conn->query($sql);
           }
         
          }
            header("Location:items.php");
    }





   

}
if(isset($_POST['cancel'])){
    header("Location:items.php");

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
        echo ' alert("تمت الاضافة بنجاح")';  //not showing an alert box.
        echo '</script>';
    }
    function alert2(){
        echo '<script type="text/javascript">';
        echo ' alert("حدثت مشكلة")';  //not showing an alert box.
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
              <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" style="text-align: center; " >تعديل منتج</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" enctype="multipart/form-data">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>اسم المنتج</label>
                                                <input type="text" class="form-control" placeholder=""required value="<?php  echo $row['name'] ; ?>" name="item_name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>السعر</label>
                                                <div class="input-group mb-3  input-info">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">₪</span>
                                                    </div>
                                                    <input type="number" class="form-control "required value="<?php  echo $row['price'] ; ?>" name="item_price">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                </div>                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>المجموعة</label>
                                                <select id="inputState" class="form-control" required  name="item_group" >
                                                <?php 
                                                    $sql_categories = "select * from categories   ";
                                                    $result_categories = $conn->query($sql_categories) ;
                                                    $no_categories=mysqli_num_rows($result_categories);
                                                    for($i=0;$i<$no_categories;$i++){
                                                        $row2 = mysqli_fetch_array($result_categories);
                                                        if($row2['id']==$row['cat_id']){
                                                            echo '<option value="'.$row2['id'].'" selected>'.$row2['name'].' </option>';
                                                        }
                                                        else{
                                                        echo '<option value="'.$row2['id'].'">'.$row2['name'].' </option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>                                            
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>المطعم</label>
                                                <select class="form-control" name="item_pranch[]" multiple="multiple" required>
                                                <?php 
                                                     $sql_no = "select * from  item_pranch where item_id=".$row['id'];
                                                     $result_no = $conn->query($sql_no) ;
                                                     $pranch=array();
                                                     for($j=0;$j<mysqli_num_rows($result_no);$j++){
                                                        $row_no = mysqli_fetch_array($result_no);
                                                         $pranch[$j]=$row_no['pranch_id'];
                                                     }
                                                    $sql_pranches = "select * from pranches   ";
                                                    $result_pranches = $conn->query($sql_pranches) ;
                                                    $no_pranches=mysqli_num_rows($result_pranches);
                                                    for($i=0;$i<$no_pranches;$i++){
                                                        $row3 = mysqli_fetch_array($result_pranches);
                                                        if(in_array($row3['id'],$pranch,TRUE)){
                                                            echo '<option value="'.$row3['id'].'" selected >'.$row3['name'].' </option>';

                                                        }
                                                        else{
                                                            echo '<option value="'.$row3['id'].'" >'.$row3['name'].' </option>';

                                                        }
                                                    }
                                                    ?>
                                                </select>                                          
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>الاسم باللغة الانجليزية</label>
                                                <textarea class="form-control" rows="4" placeholder="" required   name="short_note"><?php  echo $row['short_note'] ; ?></textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>شرح عن المنتج</label>
                                                <textarea class="form-control" rows="4" id="comment"  name="note"><?php  echo $row['note'] ; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>الصورة</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input"  name="image" id="fileInput" > 
                                                        <label class="custom-file-label" name ="image_name" id="p1"><?php echo $row['image'] ; ?> </label>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                          <div class="card mb-3">
                                             <img class="card-img-top img-fluid" src="images/product/<?php echo $row['image'] ; ?>" alt="Card image cap" id="p2">
                                          <div class="card-header">
                                        <h5 class="card-title"></h5>
                                       </div>
                                      </div>
                                     </div>
                                        
                                        <button type="submit" name="save" class="btn btn-success" value="<?php echo $row['id']; ?>">حفظ</button>
                                        <button type="submit" name="cancel"class="btn btn-dark">إالغاء </button>
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
         document.getElementById('fileInput').onchange = function (evt) {
         document.getElementById("p1").innerHTML = this.value.split(/(\\|\/)/g).pop();
    var tgt = evt.target || window.event.srcElement,
        files = tgt.files;

    // FileReader support
    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function () {
            document.getElementById('p2').src = fr.result;
        }
        fr.readAsDataURL(files[0]);
    }

    // Not supported
    else {
        // fallback -- perhaps submit the input to an iframe and temporarily store
        // them on the server until the user's session ends.
    }
}
     
         <?php $change=1; ?>
   </script>
	
</body>
</html>