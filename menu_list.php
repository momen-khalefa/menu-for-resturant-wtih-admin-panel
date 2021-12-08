<?php

include 'config.php';
if(isset($_GET['no']) && isset($_GET['cat']) ){
    $sql = "SELECT * from items , ( SELECT item_id from item_pranch where pranch_id=".$_GET['no'].") tt2 where items.id=tt2.item_id  and items.cat_id=".$_GET['cat'];
    $result = $conn->query($sql) ;
    $no_cat=mysqli_num_rows($result);
    if($no_cat==0){
        header("Location:page404.php");

    }
}
else{
    header("Location:page404.php");

}

?>

<!doctype html>
<html ⚡>
<head>
<meta charset="utf-8">
<script async src="https://cdn.ampproject.org/v0.js"></script>

<!--AMP HTML files require a canonical link pointing to the regular HTML. If no HTML version exists, it should point to itself.-->
<link rel="canonical" href="index.html">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Satisfy">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1,maximum-scale=1,user-scalable=no"><meta name="apple-mobile-web-app-capable" content="yes"/><meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="icon" type="image/png" sizes="16x16" href="./images/iconlogo.png">
<title>MENU</title>
<style amp-custom>
body{font-family:'Roboto', sans-serif; font-size:14px; background-color:#f4f3f8;}

/*Color Schemes and Colors*/

.header-logo, .footer-logo{background-image:url(images/logopngw.png);}
.menu-item span{color:#FFFFFF;}
.menu-item i:first-child{color:#5f5f5f;}
.menu-item i:last-child{color:#aaa;}
.toggle-menu-header{color:#FFFFFF;}
.toggle-menu-icon{background-color:#5D9CEC; color:#FFFFFF;}
input[id="toggle-menu"] + label .l1, 
input[id="toggle-menu"] + label .l2, 
input[id="toggle-menu"] + label .l3{background-color:#FFFFFF;}
.submenu-item label{color:#FFFFFF;}
input[data-submenu-items] + label:before {color:#aaa;}
input[data-submenu-items] + label:before { color:#FFFFFF;}
input[data-submenu-items]:checked + label:before { color:#ED5565;}
.submenu-wrapper .menu-item .fa-angle-right{color:#666;}
.submenu-wrapper a{color:#aaa;}
header{background-color:#171717; border-bottom:solid 1px rgba(255,255,255,0.1);}
.header-icon-1, .header-icon-2{color:#FFFFFF;}
.body-bg{background-image:url(images/listphoto.jpg);
    box-shadow: inset 0 0 0 1000px rgba(0,0,0,.2);}
.footer{background-color:#141414;}
.footer .decoration{background-color:rgba(255,255,255,0.05);}
.menu-item em{color:#FFFFFF; font-weight:500; font-size:12px; font-style: normal;}
.menu-item strong{color:#FC6E51; font-weight:400; font-size:16px;}

.bg-teal-light{ background-color: #1abc9c; color:#FFFFFF}
.bg-teal-dark{  background-color: #16a085; color:#FFFFFF}
.border-teal-light{ border:solid 1px #1abc9c;}
.border-teal-dark{  border:solid 1px #16a085;}
.color-teal-light{ color: #1abc9c;}
.color-teal-dark{  color: #16a085;}
.bg-green-light{background-color: #2ecc71; color:#FFFFFF}
.bg-green-dark{background-color: #2abb67; color:#FFFFFF}
.border-green-light{border:solid 1px #2ecc71;}
.border-green-dark{ border:solid 1px #2abb67;}
.color-green-light{color: #2ecc71;}
.color-green-dark{color: #2abb67;}
.bg-blue-light{background-color: #3498db; color:#FFFFFF}
.bg-blue-dark{background-color: #2980b9; color:#FFFFFF;}
.border-blue-light{border:solid 1px #3498db;}
.border-blue-dark{ border:solid 1px #2980b9;}
.color-blue-light{color: #3498db;}
.color-blue-dark{color: #2980b9;}
.bg-magenta-light{background-color: #9b59b6; color:#FFFFFF}
.bg-magenta-dark{background-color: #8e44ad; color:#FFFFFF}
.border-magenta-light{border:solid 1px #9b59b6;}
.border-magenta-dark{ border:solid 1px #8e44ad;}
.color-magenta-light{color: #9b59b6;}
.color-magenta-dark{color: #8e44ad;}
.bg-night-light{background-color: #34495e; color:#FFFFFF}
.bg-night-dark{background-color: #2c3e50; color:#FFFFFF}
.border-night-light{border:solid 1px #34495e;}
.border-night-dark{ border:solid 1px #2c3e50;}
.color-night-light{color: #34495e;}
.color-night-dark{color: #2c3e50;}
.bg-yellow-light{background-color: #E67E22; color:#FFFFFF}
.bg-yellow-dark{background-color: #e86f2a; color:#FFFFFF}
.border-yellow-light{border:solid 1px #E67E22;}
.border-yellow-dark{ border:solid 1px #F27935;}
.color-yellow-light{color: #f1c40f;}
.color-yellow-dark{color: #f39c12;}
.bg-orange-light{background-color: #F9690E; color:#FFFFFF}
.bg-orange-dark{background-color: #D35400; color:#FFFFFF}
.border-orange-light{border:solid 1px #F9690E;}
.border-orange-dark{ border:solid 1px #D35400;}
.color-orange-light{color: #e67e22;}
.color-orange-dark{color: #d35400;}
.bg-red-light{background-color: #e74c3c; color:#FFFFFF}
.bg-red-dark{background-color: #c0392b; color:#FFFFFF}
.border-red-light{border:solid 1px #e74c3c;}
.border-red-dark{ border:solid 1px #c0392b;}
.color-red-light{color: #e74c3c;}
.color-red-dark{color: #c0392b;}
.bg-pink-light{background-color: #fa6a8e ; color:#FFFFFF}
.bg-pink-dark{background-color: #FB3365 ; color:#FFFFFF}
.border-pink-light{border:solid 1px #fa6a8e ;}
.border-pink-dark{ border:solid 1px #FB3365 ;}
.color-pink-light{color: #fa6a8e;}
.color-pink-dark{color: #FB3365;}
.bg-gray-light{background-color: #bdc3c7; color:#FFFFFF}
.bg-gray-dark{background-color: #95a5a6; color:#FFFFFF}
.border-gray-light{border:solid 1px #bdc3c7;}
.border-gray-dark{ border:solid 1px #95a5a6;}
.color-gray-light{color: #bdc3c7;}
.color-gray-dark{color: #95a5a6;}
.bg-white{background-color:#FFFFFF;}
.color-white{color:#FFFFFF;}
.border-white{border:solid 1px #FFFFFF;}
.bg-black{background-color:#000000;}
.color-black{color:white;}
.border-black{border:solid 1px #000000;}
.color-heading{color:#676767;}

/*Social Icons*/
.facebook-bg{background-color:#3b5998; color:#FFFFFF;}
.linkedin-bg{background-color:#0077B5; color:#FFFFFF;}
.twitter-bg{background-color:#4099ff; color:#FFFFFF;}
.google-bg{ background-color:#d34836; color:#FFFFFF;}
.whatsapp-bg{ background-color:#34AF23; color:#FFFFFF;}
.pinterest-bg{ background-color:#C92228; color:#FFFFFF;}
.sms-bg{ background-color:#27ae60; color:#FFFFFF;}
.mail-bg{ background-color:#3498db; color:#FFFFFF;}
.dribbble-bg{ background-color:#EA4C89; color:#FFFFFF;}
.tumblr-bg{ background-color:#2C3D52; color:#FFFFFF;}
.reddit-bg{ background-color:#336699; color:#FFFFFF;}
.youtube-bg{ background-color:#D12827; color:#FFFFFF;}
.phone-bg{ background-color:#27ae60; color:#FFFFFF;}
.skype-bg{ background-color:#12A5F4; color:#FFFFFF;}
.facebook-color{    color:#3b5998;}
.linkedin-color{    color:#0077B5;}
.twitter-color{     color:#4099ff;}
.google-color{      color:#d34836;}
.whatsapp-color{    color:#34AF23;}
.pinterest-color{   color:#C92228;}
.sms-color{         color:#27ae60;}
.mail-color{        color:#3498db;}
.dribbble-color{    color:#EA4C89;}
.tumblr-color{      color:#2C3D52;}
.reddit-color{      color:#336699;}
.youtube-color{     color:#D12827;}
.phone-color{       color:#27ae60;}
.skype-color{       color:#12A5F4;}

/*Background Images*/
.bg-1{background-image:url(images/pictures/1.jpg)}
.bg-2{background-image:url(images/pictures/2.jpg)}
.bg-3{background-image:url(images/pictures/3.jpg)}
.bg-4{background-image:url(images/pictures/4.jpg)}
.bg-5{background-image:url(images/pictures/5.jpg)}
.bg-6{background-image:url(images/pictures/6.jpg)}
.bg-7{background-image:url(images/pictures/7.jpg)}
.bg-8{background-image:url(images/pictures/8.jpg)}
.bg-9{background-image:url(images/pictures/9.jpg)}
.bg-body{background-image:url(images/pictures_vertical/bg2.jpg)}
.bg-body-1{background-image:url(images/pictures_vertical/bg1.jpg)}
.bg-body-2{background-image:url(images/pictures_vertical/bg0.jpg)}
.overlay{background-color:rgba(0,0,0,0.8); position:absolute; top:0px; right:0px; bottom:0px; left:0px;}

/*Font Settings*/
h1{ font-size:24px; line-height:34px; font-weight:500; color:white;}
h2{ font-size:22px; line-height:32px; font-weight:500;}
h3{ font-size:20px; line-height:30px; font-weight:500;}
h4{ font-size:18px; line-height:28px; font-weight:500;}
h5{ font-size:16px; line-height:26px; font-weight:500;}
h6{ font-size:14px; line-height:22px; font-weight:800;}
.decoration{margin-bottom:30px;}
.ultrathin{font-weight:200;}
.thin{font-weight:300;}
.thiner{font-weight:400;}
.boder{font-weight:600;}
.bold{font-weight:700;}
.ultrabold{font-weight:800;}
.capitalize{text-transform: capitalize;}
.italic{font-style: italic;}
.small-text{font-size:12px; display:block;}
.center-text{text-align:center; display:block;}
.right-text{text-align:right;}
.uppercase{text-transform: uppercase;}
.boxed-text{width:85%; margin:0px auto 30px auto;}
.boxed-image{width:75%; margin:0px auto 30px auto;}
.round-image{border-radius:500px;}
p a{display:inline;}
.disabled{display:none;}
.heading-icon{font-size:40px;}
.heading-small{font-size:26px;}
.heading-large{font-size:32px;}
.heading-huge{font-size:38px;}
.heading-medium{font-size:28px;}

/*Content Settings*/
.content{padding:0px 20px 0px 20px}
.container{margin-bottom:30px}
.full-bottom{margin-bottom:30px}
.double-bottom{margin-bottom:60px}
.no-bottom{margin-bottom:0px}
.full-top{margin-top:25px}
.half-bottom{margin-bottom:15px}
.half-top{margin-top:15px}
.quarter-bottom{margin-bottom:5px}
.hidden{display:none}
.left-column{width:45%; margin-right:5%; float:left}
.right-column{width:45%; margin-left:5%; float:left}
.one-third-left{float:left; width:29%;  margin-right:1%}
.one-third-center{float:left; width:29%; margin-left:5%; margin-right:5%}
.one-third-right{float:left; width:29%; margin-left:1%}
.clear{clear:both}

* {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	vertical-align: baseline;
	outline: none;
	font-size-adjust: none;
	-webkit-text-size-adjust: none;
	-moz-text-size-adjust: none;
	-ms-text-size-adjust: none;
	-webkit-tap-highlight-color: rgba(0,0,0,0);
    -webkit-font-smoothing: antialiased;
    -webkit-transform: translate3d(1,1,1);
    transform:translate3d(1,1,1);    
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

div, a, p, img, blockquote, form, fieldset, textarea, input, label, iframe, code, pre {
	display: block;
	position:relative;
}

p{
	line-height:30px; 
	font-weight:400; 
	color:#666666; 
	font-size:13px; 
	margin-bottom:30px;
}

a{text-decoration:none; color:#3498db;} 

/*Lists*/
.icon-list{list-style:none; font-size:14px; line-height:28px; color:#666666;}
.icon-list i{width:30px;}

.center-icon{
	width:80px;
	height:80px;
	border-radius:80px;
	border:solid 1px rgba(0,0,0,0.5);
	text-align:center;
	line-height:80px;
	font-size:24px;
	margin:0px auto 30px auto;
	display:block;
}

.decoration, .decoration-no-bottom{
	height:1px; 
	background-color:rgba(0,0,0,0.1);
}

.deco{height:1px; margin-bottom:30px;}

.deco-box .deco{
	width:10%;
	float:left;
	height:5px;
}

.decoration-margins{margin:0px 20px 30px 20px}

/*Page Content*/

::-webkit-scrollbar { width: 0; }

.menu *{
	user-select: none;
	-moz-user-select: none;
	-webkit-user-select: none;
}

@media(min-height:300px) and (max-height:450px){.menu-clear{height:10px;} .menu-scroll{padding-bottom:35px;}}
@media(min-height:450px) and (max-height:500px){.menu-clear{height:40px;} .menu-scroll{padding-bottom:45px;}}
@media(min-height:500px) and (max-height:600px){.menu-clear{height:55px;} .menu-scroll{padding-bottom:90px;}}
@media(min-height:600px){.menu-clear{height:140px;}.menu-scroll{padding-bottom:120px;}}

.menu-sidebar{
	position:fixed;
	top:0px;
	left:0px;
	right:0px;
	bottom:0px;
	z-index:9;
	width:240px;
	transform:translateX(-250px);
	transition:all 450ms ease;
}

.menu-scroll{
	position:absolute;
	left:0px;
	right:0px;
	top:0px;
	bottom:0px;
	padding-left:30px;
	padding-top:10px;
	overflow:scroll;
	overflow-x:hidden;
	-webkit-overflow-scrolling:touch;
}

/*input[id="toggle-menu"]*/
input[data-submenu-items]{
   position: absolute;
   top: -9999px;
   left: -9999px;
   /* For mobile, it's typically better to position checkbox on top of clickable
      area and turn opacity to 0 instead. */
}

input[id=toggle-menu]:checked ~ #menu-sidebar{
	transform:translateX(0px);
	transition:all 450ms ease;
}

input[id=toggle-menu]:checked ~ header{
	transform:translateX(100%) translateY(0px);
	transition:all 450ms ease;
}

input[id=toggle-menu]:checked ~ .menu-hider{
	display:block;
}

input[id=toggle-menu]:checked ~ .toggle-menu-header{
	transform:translateX(0) translateY(0px);
	transition:all 450ms ease;
}

input[id=toggle-menu]:checked ~ .page-content{
	transform:translateX(100%) translateY(0px);
	transition:all 450ms ease;
}

.page-content{
	background-color:#FFFFFF;
	z-index:9;
	transition:all 450ms ease;
	padding-top:60px;
	overflow-x:hidden;
}

.page-content-scroll{overflow-x:hidden;}

.header-clear{padding-top:60px;}
.header-clear-large{padding-top:90px;}

.page-content-transparent{background-color:rgba(255,255,255,0);}

.menu-hider{
	position:fixed;
	top:0px;
	left:150px;
	bottom:0px;
	right:0px;
	z-index:99999;
	display:none;
}

.body-bg{
	background-size:cover;
	background-position:45%;
	position:fixed;
	top:0px;
	left:0px;
	right:0px;
	bottom:0px;
	z-index:5;
}

/*Main Items*/
.menu-item{
	height:47px;
	line-height:47px;
	display:block;
	padding-left:55px;
	font-size:16px;
	font-weight:300;
	cursor:pointer;
}

.menu-item i{
	position:absolute; 
	height:45px;
	width:55px;
	line-height:45px;
	text-align:center;
}

.active-item em{
	font-size:16px;
	text-align:center;
	position:absolute;
	width:4px;
	height:4px;
	right:25px;
	border-radius:7px;
	top:50%;
	margin-top:-2px;
}

.active-item strong{
	font-weight:400;
}

.active-item .fa-circle{display:none;}
.active-item span{margin-left:-3px;}
.active-item i:first-child{margin-left:-3px;}
.menu-item i:first-child{left:0px; font-size:15px;}
.menu-item i:last-child{right:0px;}
.menu-item .fa-circle{font-size:4px;}
.menu-item .fa-angle-down{font-size:8px;}

.toggle-menu-header{
	height:60px;
	width:50px;
	line-height:60px;
	text-align:center;
	top:0px;
	z-index:99;
	position:fixed;
	top:0px;
	left:0px;
	cursor:pointer;
	transition:all 4s50ms ease;
}


.toggle-menu-icon .l1{top:-7px;}
.toggle-menu-icon .l2{opacity:0;}
.toggle-menu-icon .l3{top:-8px;}

input[id="toggle-menu"] { display:none;  } /* to hide the checkbox itself */
input[id="toggle-menu"] + label:before {font-family: FontAwesome;	display: inline-block;}
input[id="toggle-menu"] + label .l1, input[id="toggle-menu"] + label .l2, input[id="toggle-menu"] + label .l3{
	height:1px;
	width:14px;
	position:absolute;
	left:50%;
	margin-left:-7px;
	transition:all 250ms ease;
}

input[id="toggle-menu"] + label .l1{margin-top:25px;}
input[id="toggle-menu"] + label .l2{margin-top:29px;}
input[id="toggle-menu"] + label .l3{margin-top:33px;}

input[id="toggle-menu"]:checked + label .l1{transform:rotate(45deg); margin-top:30px; transition:all 250ms ease;}
input[id="toggle-menu"]:checked + label .l2{opacity:0; transition:all 250ms ease;}
input[id="toggle-menu"]:checked + label .l3{transform:rotate(-45deg); margin-top:30px; transition:all 250ms ease;}

input[id="toggle-menu"] { display:none;  } /* to hide the checkbox itself */
input[id="toggle-menu"] + label:before {font-family: FontAwesome;	display: inline-block;}

.submenu-item label{
	height:50px;
	cursor:pointer;
}

input[class=toggle-submenu] {
	position: absolute;
	top: -9999px;
	left: -9999px;
}

.submenu-wrapper {
	height:0px;
	overflow:hidden;
	color: white;
	transition:all 250ms ease;
}

input[data-submenu-items] { display:none;  } /* to hide the checkbox itself */
input[data-submenu-items] + label:before {
	font-family: FontAwesome;
	position:absolute;
	right:0px;
	height:60px;
	width:55px;
	line-height:60px;
	text-align:center;
	font-size:9px;

}

.submenu-wrapper a{
	height:50px;
	font-size:12px;
	line-height:50px;
	border-bottom:none;
}

.submenu-wrapper a i{line-height:55px;}
.submenu-wrapper .menu-item .fa-angle-right{font-size:8px; margin-top:-1px;}
.submenu-wrapper a:first-child{margin-top:-5px;}
.submenu-wrapper a:last-child{padding-bottom:5px; }

/* Toggled State */
/*Value Obtain by (Number of Submenus * 55) + 11px ( paddings & border )*/

[data-submenu-items="2"]:checked ~ .submenu-wrapper {height:100px;}
[data-submenu-items="3"]:checked ~ .submenu-wrapper {height:150px;}
[data-submenu-items="4"]:checked ~ .submenu-wrapper {height:200px;}
[data-submenu-items="5"]:checked ~ .submenu-wrapper {height:250px;}
[data-submenu-items="6"]:checked ~ .submenu-wrapper {height:300px;}
[data-submenu-items="7"]:checked ~ .submenu-wrapper {height:350px;}
[data-submenu-items="8"]:checked ~ .submenu-wrapper {height:400px;}
[data-submenu-items="9"]:checked ~ .submenu-wrapper {height:450px;}
[data-submenu-items="10"]:checked ~ .submenu-wrapper {height:500px;}
[data-submenu-items="11"]:checked ~ .submenu-wrapper {height:550px;}
[data-submenu-items="12"]:checked ~ .submenu-wrapper {height:600px;}
[data-submenu-items="13"]:checked ~ .submenu-wrapper {height:650px;}
[data-submenu-items="14"]:checked ~ .submenu-wrapper {height:700px;}
[data-submenu-items="15"]:checked ~ .submenu-wrapper {height:750px;}

/*Header*/
header{
	position:fixed;
	height:60px;
	width:100%;
	z-index:98;
	transition:all 450ms ease;
}

.header-transparent header{background-color:rgba(255,255,255,0); border-bottom:none;}
.header-transparent .page-content{padding-top:0px;}

.header-icon-1, .header-icon-2{
	position:absolute;
	line-height:60px; 
	text-align:center; 
	width:60px;
	display:block;
	font-size:14px;
	background-color:transparent;
}

.header-icon-2{
	right:0px; 
	top:0px;
}

.header-logo{
	margin:0 auto;
	background-repeat: no-repeat;
	background-position:center center;
	background-size:350px 290px;
	width:170px;
	height:65px;
	display:block;
}

/*Footer*/
.footer{padding-bottom:5px; padding-top:30px;}
.footer-logo{
	background-repeat: no-repeat;
	background-size:200px 60px;
	width:200px;
	height:60px;
	display:block;
	margin:12px auto 20px auto;
}

.footer-socials a{
	width:40px;
	height:40px;
	line-height:40px;
	margin-left:2px;
	margin-right:2px;
	text-align:center;
	float:left;
}

.footer-socials a{background-color:transparent; border:solid 1px rgba(255,255,255,0.05); box-sizing: border-box;}

.footer-socials{
	width:265px;
	margin:30px auto 30px 170px;

}

.news-slider .caption{
	background-color:rgba(0,0,0,0.8);
}


/*Contact Page*/

.contactField{
	font-family:'Roboto', sans-serif;
	height:40px;
	line-height:40px;
	line-height:100%;
	width:100%;
	display:block;
	border:solid 1px rgba(0,0,0,0.1);
	text-indent:10px;
	font-size:13px;
	transition:all 250ms ease;
	margin-bottom:20px;
}

.contactField:focus{
	border:solid 1px rgb(140,193,82);
	transition:all 250ms ease;
}

.contactTextarea{
	font-family:'Roboto', sans-serif;
	padding-top:10px;
	min-height:80px;
	line-height:40px;
	line-height:100%;
	width:100%;
	display:block;
	border:solid 1px rgba(0,0,0,0.1);
	text-indent:10px;
	font-size:13px;
	transition:all 250ms ease;
	margin-bottom:30px;
}

.contactTextarea:focus{
	transition:all 250ms ease;
	border:solid 1px rgb(140,193,82);
}

.field-title{
	font-size:13px; 
	margin-bottom:5px;
}

.field-title span{
	font-size:10px;
	color:#cacaca;
	position:absolute;
	right:0px;
	margin-top:2px;
}

.buttonWrap{
	width:100%;
	display:block;
	text-align:center;
	margin-bottom:30px;
    appearance:none;
    -webkit-appearance:none;
	font-family:'Roboto', sans-serif;
	letter-spacing: 1px;
}

#contactDateField{line-height:40px;}
input, textarea{appearance:none; -webkit-appearance:none;}
textarea::placeholder{text-indent:10px; color:#969696;}
input::placeholder{font-size:12px; line-height:150%; color:#969696;}
input[type=date]{padding-left:10px; box-sizing: border-box; text-indent: 0px; font-size:12px; color:#969696;}

input[type=date]::-webkit-outer-spin-button,
input[type=number]::-webkit-outer-spin-button,
input[type=date]::-webkit-inner-spin-button,
input[type=number]::-webkit-inner-spin-button,
input[type=date]::-webkit-calendar-picker-indicator,
input[type=date]::-webkit-clear-button
{
    -webkit-appearance: none;
	display: none;
}


.contact-icon{
	color:#666666;
	line-height:30px;
}

.contact-icon i{
	color:#1f1f1f;
	width:30px;
}

/*Homepage*/

.cover-bg-1{background-image:url(images/covers/1.jpg);}
.cover-bg-1 .cover-overlay{background-color:rgba(0,0,0,0.7);}
.cover-bg-2{background-image:url(images/covers/2.jpg);}
.cover-bg-2 .cover-overlay{background-color:rgba(0,0,0,0.85);}

.cover-class{
	background-size:cover;
	background-position:center center;
	height:90vh;
	border-bottom:solid 1px rgba(255,255,255,0.05);
}

.cover-overlay{
	position:absolute;
	top:0px;
	left:0px;
	right:0px;
	bottom:0px;
}

.cover-content{
	z-index:999;
	position:absolute;
	height:200px;
	width:300px;
	left:50%;
	margin-left:-150px;
	top:50%;
	margin-top:-150px;
}

.cover-logo{
	background-image:url(images/logo_light_large.png);
	width:200px;
	height:53px;
	background-size:200px 53px;
	margin:0px auto 20px auto;
}

.cover-content p{
	text-align:center;
	max-width:280px;
	color:#c4c4c4;
	margin:0 auto;
}

.cover-cta{
	position:absolute;
	left:50%;
	margin-left:-100px;
	margin-bottom:20px;
	width:200px;
	height:45px;
	line-height:45px;
	border-radius:5px;
	text-align:center;
	color:#FFFFFF;
	text-transform:uppercase;
	font-weight:800;
	font-size:12px;
	z-index:999;
	bottom:70px;
	border:solid 1px rgba(255,255,255,0.2);
}

.cover-boxes{
	overflow: hidden;
	margin-top:-3px;
	z-index:999;
	position:relative;
	width:101%;
}

.cover-boxes a{
	background-color:rgba(0,0,0,0.9);
	width:33.3%;
	height:100px;
	float:left;
	box-sizing: border-box;
	border-left:solid 1px rgba(255,255,255,0.05);
	border-bottom:solid 1px rgba(255,255,255,0.05);
}

.cover-boxes a i{
	position:absolute;
	width:100%;
	display:block;
	font-size:24px;
	line-height:75px;
	text-align:center;
}

.cover-boxes a em{
	display:block;
	text-align:center;
	color:#FFFFFF;
	line-height:130px;
	font-style:normal;
	font-size:12px;
}

/*Heading Cursive*/

.heading-cursive{font-family:'Satisfy', cursive;}
.heading-serif{font-family:'Times New Roman', sans-serif;}

/*Home Bar*/

.home-bar{
	border-radius:10px;
	margin-top:0px;
}

.home-bar-large-icons i{
	transform:scale(1.5, 1.5);
}

.home-bar-2-icons a{width:50%;}
.home-bar-3-icons a{width:33.3%;}
.home-bar-4-icons a{width:25%;}

.home-bar a{
	float:left;
	height:	line-height:60px;
	line-height:60px;
	text-align:center;
	color:#1f1f1f;
	font-weight:800;
	text-transform:uppercase;
	font-size:11px;
}

.home-bar a i{
	display:block;
	font-size:20px;
	margin-bottom:-10px;
}

/*Home Thumbs*/


.home-thumbnails.home-1-thumbs strong{
	font-size:24px;
	font-weight:800;
	text-transform:uppercase
}

.home-thumbnails.home-1-thumbs em{
	font-size:12px;
	padding-top:10px;
}


.home-thumbnails{margin-bottom:20px;}
.home-thumbnails.home-2-thumbs a:nth-child(2n+2){margin-left:2%;     margin-bottom: 10%;}
.home-thumbnails.home-2-thumbs a:nth-child(2n+1){margin-right:2%;}

.home-thumbnails.home-2-thumbs a{
	width:48%;
	text-decoration:none;
	float:left;
}

.home-thumbnails.home-3-thumbs a:nth-child(3n+3){margin-left:1%;}
.home-thumbnails.home-3-thumbs a:nth-child(3n+2){margin-left:1%;}
.home-thumbnails.home-3-thumbs a:nth-child(2n+1){margin-right:1%;}

.home-thumbnails.home-3-thumbs a{
	width:31%;
	text-decoration:none;
	float:left;
}

.home-thumbnails a u{
	position:absolute;
	right:0px;
	left:0px;
	font-size:12px;
	color:#1f1f1f;
	text-align:center;
	background-color:rgba(255,255,255,0.8);
	text-decoration:none;
	margin-top:-22px;
	padding:4px 15px;
	font-weight:700;
	display:none;
}

.home-thumbnails a strong{
	font-size:20px;
	display:block;
	font-weight:400;
	line-height:25px;
	padding-top:5px;
	text-align:center;
	margin-top: 25%;
}

.home-thumbnails a span{
	font-size:14px;
	text-align:center;
	display:block;
	font-weight:700;
	margin-bottom:10px;
}

.home-thumbnails a em{
	font-size:10px;
	display:block;
	font-weight:400;
	color:#868686;
	padding-bottom:10px;
	text-align:center;
	height: 46px;
}

.home-thumbnails amp-img{border-radius:0%; overflow:hidden;}

/*Home Quote*/

.home-quote{
	font-size:17px;
	padding-left:20px;
	padding-right:20px;
	font-style: italic;
	font-weight:300;
	color:#8b8b8b;
	line-height:34px;
	text-align:center;
}

.home-quote a{
	padding-top:10px;
	text-align:center;
	font-size:12px;
	font-weight:500;
}

/*Home Testimonials*/

.testimonials:before{
	content: "\f10e";     
	font-family: FontAwesome;
	position:absolute;
	font-size:140px;
	color:rgba(255,206,84,0.05);	
	width:140px;
	height:140px;
	text-align:center;
	display:block;
	left:50%;
	margin-left:-70px;
	margin-top:170px;
}


.testimonials amp-img{
	width:80px;
	margin:0 auto;
	border-radius:80px;
	display:block;
	margin-bottom:20px;
}

.testimonials h1{
	font-size:17px;
	line-height:40px;
	text-align:center;
	font-weight:300;
	color:#555555;
	font-style: italic;
	padding:0px 35px 0px 35px;
}

.testimonials a{
	display:block;
	text-align:center;
	font-size:13px;
	font-weight:700;
	text-transform:uppercase;
	padding-top:30px;
	color:#000000;
}

.testimonials span{
	width:115px;
	margin:0 auto;
	display:block;
	margin-top:20px;
	font-size:20px;
}

.amp-carousel-button-next, .amp-carousel-button-prev{
	top:55px;
	background-image:none;
	background-color:transparent;
	color:#000000;
	font-size:24px;
	text-align:center;
	width:40px;
	line-height:35px;
	display:block;
}

.amp-carousel-button-next:before{content: "\f105";     font-family: FontAwesome;}
.amp-carousel-button-prev:before{content: "\f104";     font-family: FontAwesome;}


/*Home delivery*/
.home-delivery{
	height:80px;
}

.home-delivery i{
	font-size:34px;
	line-height:50px;
	width:50px;
	text-align:center;
	display:block;
	position:absolute;
}

.home-delivery h1{
	text-align:right;
	display:block;
	font-size:18px;
}

.home-delivery em{
	text-align:right;
	display:block;
	font-size:12px;
	color:#838383;
	font-style: normal;
}


/*Menu Fancy*/
ul.menu-list {
    max-width: 40em;
    padding: 0;
    overflow-x: hidden;
    list-style: none;
}
ul.menu-list li:before {
    float: left;
    width: 0;
	padding-top:10px;
	color:#cacaca;
    white-space: nowrap;
    content:
 ". . . . . . . . . . . . . . . . . . . . "
 ". . . . . . . . . . . . . . . . . . . . "
 ". . . . . . . . . . . . . . . . . . . . "
 ". . . . . . . . . . . . . . . . . . . . "

}

ul.menu-list span:first-child {
    padding-right: 0.33em;
	font-weight:400;
}

ul.menu-list span + span {
	float:right;
	padding-left: 0.33em;
	margin-top:-3px;
}

ul.menu-list span:nth-child(3){
	display:block;
	clear:both;
	text-align:left;
	width:100%;
	float:left;
	padding-left:0.33em;
	padding-right:0.33em;
	color:#aaaaaa;
	font-size:12px;
	margin-left:-5px;
	line-height:24px;
	margin-bottom:15px;
	margin-top:-12px;
}

ul.menu-list  li{
	font-size:13px;
	line-height:40px; 
	padding-bottom:5px;
}

ul.menu-list sup{
    vertical-align: super;
    font-size: smaller;
}

.decoration-fancy strong{
	position:absolute;
	left:50px;
	right:50px;
	height:1px;
	top:25px;
	background-color:rgba(0,0,0,0.2);
}

.decoration-fancy span{
	position:relative;
	width:70px;
	height:70px;
	margin:0 auto;
	display:block;
	background-color:#FFFFFF;
	z-index:999;
}

.decoration-fancy i{
	position:absolute;
	width:70px;
	height:70px;
	line-height:70px;
	text-align:center;
	z-index:9999;
	left:50%;
	margin-left:-35px;
	top:-10px;
	font-size:28px;
}

/*Menu Classic*/

.menu-classic{
	height:70px;
	margin-bottom:10px;
}

.menu-classic i{
	right:10px;
	font-size:34px;
	line-height:50px;
	width:50px;
	text-align:center;
	display:block;
	position:absolute;
}

.menu-classic h1{
	text-align:left;
	display:block;
}

.menu-classic em{
	text-align:left;
	display:block;
	font-size:12px;
	color:#838383;
	font-style: normal;
}

/*Menu Fancy*/
ul.menu-list-minimal {
    max-width: 40em;
    padding: 0;
    overflow-x: hidden;
    list-style: none
}

ul.menu-list-minimal li{
	line-height:40px;
	text-transform:uppercase;
	font-size:12px;
}

ul.menu-list-minimal li:before {
    float: left;
    width: 0;
	padding-top:10px;
	color:#cacaca;
    white-space: nowrap;
}

ul.menu-list-minimal span:first-child {
    padding-right: 0.33em;
	font-weight:400;
}

ul.menu-list-minimal span + span {
	float:right;
	padding-left: 0.33em;
	margin-top:-3px;
}


/*Menu BG*/

.menu-bg{
	background-image:url(images/body-bg.jpg);
	background-size:cover;
}


/*Buttons*/
.button{
	display:inline-block;
	padding:13px 25px;
	font-size:12px;
}

.button-round{border-radius:30px;}
.button-full{display: block; text-align: center;}
.button-center{max-width:175px; margin-left:auto; margin-right:auto; display:block; text-align:center;}
.button:hover{opacity:0.9;}

.icon-square, .icon-round{
	width:40px;
	height:40px;
	line-height:40px;
	text-align:center;
	display:inline-block;
	margin-left:6px;
	margin-right:6px;
	margin-bottom:10px;
	font-size:14px;
}
.icon-square:hover, .icon-round:hover{opacity:0.9;}
.icon-round{border-radius:45px;}


/*Booking*/

.booking-hours{
	width:300px;
	margin:0px auto 30px auto;
}

.booking-hours a{
	width:28%;
	float:left;
	height:30px;
	line-height:27px;
	text-align:center;
	border:solid 1px rgba(0,0,0,0.15);
	box-sizing: border-box;
	border-radius:50px;
	color:#1f1f1f;
	font-size:13px;
	transition:all 250ms ease;
}

.booking-hours a:nth-child(2){
	margin-left:5%;
	margin-right:5%;
}

.booking-hours a:hover{
	background-color:#000000;
	color:#FFFFFF;
	transition:all 250ms ease;
}


/*Locations*/

.location-box h6{
	font-size:12px;
	font-weight:500;
	color:#666666;
	line-height:16px;
	padding-top:5px;
	padding-bottom:10px;
	letter-spacing: 1.5px;
}

.location-box .button{
	padding:12px 25px;
	font-size:11px;
}

/*Review Box*/

.review-box amp-img{
	width:120px;
	height:120px;
	border-radius:60px;
	margin:0px auto 15px auto;
}

.review-box h1{
	top:0px;
	left:75px;
	font-size:22px;
}

.review-box em{
	font-size:11px;
	font-weight:400;
	color:#909090;
	display:block;
}

.review-box strong{
	display:block;
	width:92px;
	margin:10px auto 15px auto;
}

.review-box strong i{
	font-size:16px;
}

.review-box p{
	max-width:300px;
	text-align:center;
	margin:0px auto 30px auto;
	font-size:18px;
	font-weight:300;
	color:#5c5c5c;
	font-style: italic;
	line-height:40px;
}

/*Heading Box*/

.heading-box{
	height:120px;
	margin-bottom:30px;
}

.heading-box h3{
	z-index:999;
	color:#FFFFFF;
	position:relative;
	padding-top:35px;
	font-size:22px;
	text-align:center;
}

.heading-box p{
	z-index:999;
	position:relative;
	text-align:center;
}

/*Large Link*/

.large-link{
	height:45px;
	line-height:45px;
	color:#666666;
	font-size:13px;
	border-bottom:solid 1px rgba(0,0,0,0.1);
}

.large-link i:last-child{
	width:30px;
	height:45px;
	line-height:45px;
	text-align:center;
	padding-right:10px;
	color:#1f1f1f;
}

.large-link .fa-angle-right{
	position:absolute;
	right:0px;
	height:45px;
	line-height:45px;
	text-align:center;
}

/*Accordion Styles*/
.accordion h4{
	background-color:transparent;
	border:none;
}

.accordion h4{
	font-size:16px;
	line-height:40px;
}

.accordion h4 i{
	height:40px;
	line-height:40px;
	position:absolute;
	right:0px;
	font-size:12px;
}

.nested-accordion h4{
	font-size:14px;
}

section[expanded] .fa-plus{	transform:rotate(45deg);}
section[expanded] .fa-angle-down{	transform:rotate(180deg);}
section[expanded] .fa-chevron-down{	transform:rotate(180deg);}

/*Slider Caption*/
.amp-carousel-button{color:#FFFFFF;}
.amp-carousel-button-next,
.amp-carousel-button-prev{
	background-color:rgba(0,0,0,0.8);
	height:40px;
	top:50%;
	margin-top:-23px;
	line-height:40px;
	background-size:10px 10px;
	transform:scale(0.8, 0.8);
	cursor:pointer;
}

.amp-carousel-button-next{right:-5px;}
.amp-carousel-button-prev{left:-5px;}

.caption{
	position:absolute;
	bottom:0px;
	left:0px;
	right:0px;
	height:65px;
	padding-left:20px;
	padding-right:20px;
	background-color:rgba(0,0,0,0.5);
}

.caption h4{
	font-size:14px;
	color:#FFFFFF;
	line-height:20px;
	margin-top:12px;
}

.caption h3{
	color:#FFFFFF;
	margin-bottom:5px;
	font-size:16px;
	padding-top:23px;
	line-height:0px;
}

.caption p{
	font-size:12px;
	color:rgba(255,255,255,0.5);
}


/*Fonts*/
.demo-icons a{
	color:#FFFFFF; 
	width:20%;
	height:50px;
	float:left;
}
.demo-icons a i{
	color:#1f1f1f; 
	font-size:21px;
	width:50px;
	height:50px; 
	float:left; 
	text-align:center; 
	overflow:hidden;
}

/*Highlights*/
.highlight{margin-bottom:10px;}
.highlight span{padding:3px 5px 3px 5px; margin-right:2px;}
ol ul{	padding-left:5px;}
ol, ul{line-height:24px;}
.icon-list{list-style:none; margin-left:0px; padding-left:0px;}
.icon-list i{font-size:10px;}
.icon-list ul{list-style:none; padding-left:10px;}
.icon-list ul ul{padding-left:10px;}


/*User Notifications*/
.user-notification{
	text-align:left;
	padding-top:5px;
	padding-left:10px;
	padding-right:10px;
	background-color:#27ae60;
	height:50px;
	color:#FFFFFF;
	font-size:12px;
	line-height:24px;
	width:70%;
	float:left;
}

.user-notification button{
	background-color:#27ae60;
	color:#FFFFFF;
	height:55px;
	position:fixed;
	right:0px;
	bottom:0px;
	width:25%;
}

/*Social Share*/

amp-social-share[type="twitter"],amp-social-share[type="whatsapp"],amp-social-share[type="sms"],amp-social-share[type="facebook"],amp-social-share[type="gplus"],amp-social-share[type="email"],amp-social-share[type="pinterest"],amp-social-share[type="linkedin"]{background-image:none;}

amp-social-share{
	font-family: FontAwesome;
	height:40px;
	line-height:40px;
	color:#FFFFFF;
	text-align:center;
	display:block;
	font-size:16px;
	margin-right:10px;
	margin-bottom:5px;
}

amp-social-share[type="twitter"]:before{content: "\f099";}
amp-social-share[type="facebook"]:before{content: "\f09a";}
amp-social-share[type="gplus"]:before{content: "\f0d5";}
amp-social-share[type="email"]:before{content: "\f0e0";}
amp-social-share[type="pinterest"]:before{content: "\f231";}
amp-social-share[type="linkedin"]:before{content: "\f0e1";}
amp-social-share[type="whatsapp"]:before{content: "\f232";}
amp-social-share[type="sms"]:before{content: "\f075 ";}
</style>
<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
</head>

<body>	
	<div class="body-bg"></div>
			
	<input type="checkbox" id="toggle-menu">
	<label class="toggle-menu-header" for="toggle-menu"><em class="l1"></em><em class="l2"></em><em class="l3"></em></label>
	
	<label class="menu-hider" for="toggle-menu"></label>

	<header class="header">
        <a href="menu_home.php?no=<?php echo $_GET['no'];?>" class="header-logo"></a>
		<a href="menu_categories.php?no=<?php echo $_GET['no']; ?>" class="header-icon-2"><i class="fa fa-arrow-left"></i></a> 
	</header>
	
	<div id="menu-sidebar" class="menu menu-sidebar">
		<div class="menu-scroll">
			<div class="menu-clear"></div><!-- Use this on pages that don't have an opened submenu-->		
            <a class="menu-item" href="menu_home.php?no=<?php echo $_GET['no'];?>"><i class="fa fa-home active-icon"></i><span>HOME</span></a>	
            <?php
            $sql2 = "SELECT * from categories , ( SELECT DISTINCT cat_id from items where EXISTS (SELECT item_id from item_pranch where pranch_id=".$_GET['no'].")) tt2 where categories.id=tt2.cat_id";
            $result2 = $conn->query($sql2) ;
            $name;
            $no_cat2=mysqli_num_rows($result2);
            for($j=0; $j<$no_cat2 ;$j++){
                $row2 = mysqli_fetch_array($result2);
                    echo '<a class="menu-item" href="menu_list.php?no='.$_GET['no'].'&cat='.$row2['id'].'"><i class="fa fa-navicon"></i><span>'.$row2['name_en'].'</span></a>';
                if($row2['id']==$_GET['cat']){
                    $name=$row2['name'];
                }
            }            
            
            ?>	
		</div>			
	</div>

	
	<div class="page-content no-header" style="background-image: url(images\\body-bg.jpg);">
		<div class="page-content-scroll">
			<div class="decoration decoration-margins"></div>
			
			
			<div class="content">
				<h1 class="uppercase center-text ultrabold"> <?php  echo $name ; ?></h1>
				<p class="center-text boxed-text">
					تشكيلة مميزة من <?php echo $name ; ?>
				</p>
				<div class="home-thumbnails home-2-thumbs">
                    <?php
                    for($j=0;$j<$no_cat;$j++){
                        $row= mysqli_fetch_array($result);

                        echo '
                         
                        <a href="menu_item_view.php?noo='.$row['id'].'&no='.$_GET['no'].'">
						<strong class="color-black">'.$row['short_note'].' <br> '.$row['name'].'</strong>
						
						<span class="color-red-dark">'.$row['price'].'</span>
				     	</a> 
                        <a href="menu_item_view.php?noo='.$row['id'].'&no='.$_GET['no'].'">
						<amp-img src="images/product/'.$row['image'].'" width="200" height="200" layout="responsive"></amp-img>
				     	</a>
                        ';
                    }

                    ?> 
                   
                    
					
					
					<div class="clear"></div>
				</div>				
			</div>			
			
			<div class="decoration decoration-margins"></div>
			
			

			<div class="footer">
				<p class="boxed-text center-text">
				</p>
				<div class="footer-socials">
					
					<div class="clear"></div>
				</div>
				<div class="decoration decoration-margins"></div>
				<p class="center-text">Copyright by True Time Solution. All rights reserved.</p>
			</div>
			
		</div>
	</div>

	
</body>
</html>