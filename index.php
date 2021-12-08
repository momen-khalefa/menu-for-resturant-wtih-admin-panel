<?php
session_start();
include 'config.php';
$_SESSION["user"]=null;
$_SESSION['loggedIn'] = false;
if(isset($_POST['submit'])){
    $username=$_POST["username"];
    $password=$_POST["password"];

    $sql = "select * from users  where username ='$username' and password='$password'";

    $result = $conn->query($sql) ;
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);
        $_SESSION["user"]=$row;
        $_SESSION['loggedIn'] = true;
        header("Location:home.php");
    }

}

?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>TTS DASHBORD</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/iconlogo.png">
    <link href="./css/style.css" rel="stylesheet">

    <?php
    function alert3($text){
        echo '<script type="text/javascript">';
        echo ' alert("'.$text.'")';  //not showing an alert box.
        echo '</script>';
    }

    ?>
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form" style="text-align: right; ">
                                    <h4 class="text-center mb-4">تسجيل الدخول </h4>
                                    <form  method="post">
                                        <div class="form-group">
                                            <label class="mb-1" ><strong>اسم المستخدم</strong></label>
                                            <input type="email" class="form-control" placeholder="UserName" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>كلمة المرور</strong></label>
                                            <input type="password" class="form-control" placeholder="*********" name="password">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                               <div class="custom-control custom-checkbox ml-1">
													<input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
													<label class="custom-control-label" for="basic_checkbox_1">تذكرني</label>
												</div>
                                            </div>
                                            
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block" name="submit">تسجيل الدخول</button>
                                        </div>
                                        <div class="text-center">
                                            <label class="mb-1" ><br> Creat By True Time Solution</label>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
	<script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="./js/custom.min.js"></script>
    <script src="./js/deznav-init.js"></script>

</body>

</html>