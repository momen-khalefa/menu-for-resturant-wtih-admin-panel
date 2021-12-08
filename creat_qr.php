<?php
session_start();
if(!isset( $_SESSION["user"])){
    header("Location:index.php");

}
if(!isset( $_GET["no"])){
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
                <div class="container-fluid">
                    <div class="text-center">
                
                    <!-- Get a Placeholder image initially,
                    this will change according to the
                    data entered later -->
                    <img src=
                "https://chart.googleapis.com/chart?cht=qr&chl=Hello+World&chs=160x160&chld=L|0"
                        class="qr-code img-thumbnail img-responsive" />
                    </div>
                
                    <div class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-2"
                        for="content" style="display: none;">
                        Content:
                        </label>
                        <div class="col-sm-10">
                
                        <!-- Input box to enter the
                            required data -->
                        <input type="text" size="60"
                            maxlength="60" class="form-control"
                            id="content" placeholder="Enter content" value="https://tts.com.ps/menu/menu_home.php?no=<?php echo $_GET['no']; ?>" style="display: none;"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                
                        <!-- Button to generate QR Code for
                        the entered data -->
                        <button type="button" class=
                            "btn btn-default" id="generate" style="display: none;">
                            Generate
                        </button>
                        </div>
                    </div>
                    </div>
                </div>
                <script src=
                    "https://code.jquery.com/jquery-3.5.1.js">
                </script>
                
                <script>
                    // Function to HTML encode the text
                    // This creates a new hidden element,
                    // inserts the given text into it
                    // and outputs it out as HTML
                    function htmlEncode(value) {
                    return $('<div/>').text(value)
                        .html();
                    }
                
                    let finalURL =
                'https://chart.googleapis.com/chart?cht=qr&chl=' +
                        htmlEncode($('#content').val()) +
                        '&chs=160x160&chld=L|0'
                
                        // Replace the src of the image with
                        // the QR code image
                        $('.qr-code').attr('src', finalURL);
                    $(function () {
                
                    // Specify an onclick function
                    // for the generate button
                    $('#generate').click(function () {
                
                        // Generate the link that would be
                        // used to generate the QR Code
                        // with the given data
                        let finalURL =
                'https://chart.googleapis.com/chart?cht=qr&chl=' +
                        htmlEncode($('#content').val()) +
                        '&chs=160x160&chld=L|0'
                
                        // Replace the src of the image with
                        // the QR code image
                        $('.qr-code').attr('src', finalURL);
                    });
                    });
                </script>
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