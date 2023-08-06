<?php
session_start();
include("sessions.php");
include("../database/connection.php");
 
$user=$_SESSION['user'];
$sql="SELECT * from user where email_address='$user'";
$res=mysqli_query($conn,$sql);
$profile_pic="";

while($row=mysqli_fetch_assoc($res)){
	
	$first_name=strtoupper($row['last_name'])." ".strtoupper($row['first_name']);
	$profile_pic=$row['profile_pic'];
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    SA CRIME TRACKING
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link type="text/css" rel="stylesheet" href="../loader/dist/jquery.loading-indicator.css" />
  <style>
     .chart-area input{
	    width:100%;
		height:100px;
	 }
  
  </style>
  	<style>

		/* Card styles */
		.card_shad{
			background-color: #fff;
			height: auto;
			width: auto;
			overflow: hidden;
			margin: 12px;
			border-radius: 5px;
			box-shadow: 9px 17px 45px -29px
						rgba(0, 0, 0, 0.44);

		}
	
		/* Card image loading */
		.card__image img {
			width: 100%;
			height: 100%;
		}
		
		.card__image.loading {
			height: 300px;
			width: 400px;
		}
	
		/* Card title */
		.card__title {
			padding: 8px;
			font-size: 22px;
			font-weight: 700;
		}
		
		.card__title.loading {
			height: 1rem;
			width: 50%;
			margin: 1rem;
			border-radius: 3px;
		}
	
		/* Card description */
		.card__description {
			padding: 8px;
			font-size: 16px;
		}
		
		.card__description.loading {
			height: 3rem;
			margin: 1rem;
			border-radius: 3px;
		}
	
		/* The loading Class */
		.loading {
			position: relative;
			background-color: #e2e2e2;
		}
	
		/* The moving element */
		.loading::after {
			display: block;
			content: "";
			position: absolute;
			width: 100%;
			height: 100%;
			transform: translateX(-100%);
			background: -webkit-gradient(linear, left top,
						right top, from(transparent),
						color-stop(rgba(255, 255, 255, 0.2)),
						to(transparent));
						
			background: linear-gradient(90deg, transparent,
					rgba(255, 255, 255, 0.2), transparent);
	
			/* Adding animation */
			animation: loading 0.8s infinite;
		}
	
		/* Loading Animation */
		@keyframes loading {
			100% {
				transform: translateX(100%);
			}
		}
	</style>
</head>

<body class="" onload="loader()">
  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
           <img src="../assets/img/logo.png">
        </div>
        <ul class="nav">
          <li class="active">
            <a href="index.php">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Home</p>
            </a>
          </li>
          <li>
            <a href="report_case.php">
              <i class="tim-icons icon-user-run"></i>
              <p>Report Crime</p>
            </a>
          </li>
         <li class="">
            <a href="nearby_stations.php">
              <i class="tim-icons icon-square-pin"></i>
              <p>Nearby Stations</p>
            </a>
          </li>
         <li class="">
            <a href="status.php">
              <i class="tim-icons icon-chart-bar-32"></i>
              <p>Track Status</p>
            </a>
          </li>
          <li>
            <a href="../index.php">
              <i class="tim-icons icon-single-02"></i>
              <p>Logout</p>
            </a>
          </li>


        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-body" hidden>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
         

              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
				    <?php  
					   if($profile_pic==""){
						?>
                       <img src="../assets/img/anime3.png" alt="Profile Photo">
					   <?php
					}
					else{
					?>
					 <img src="profile pictures/<?php echo $profile_pic; ?>" alt="Profile Photo">
					<?php
					
					}?>
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link"><a href="profile.php" class="nav-item dropdown-item">Profile</a></li>
                  <li class="nav-link"><a href="change_password.php" class="nav-item dropdown-item">Change Password</a></li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Log out</a></li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
	  
	  
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->
	     <div class="content" id="content_near">
         <div class="card__title loading"></div>
		<br>
		<div class="card__title loading"></div>
        <div class="card_shad" id="" style="display:flex">
          <div class="card__image loading"></div>
		  <div class="card__image loading"></div>
		   <div class="card__image loading"></div>
        </div>   
        <div class="card_shad" id="" style="display:flex">
          <div class="card__image loading"></div>
		  <div class="card__image loading"></div>
		   <div class="card__image loading"></div>
        </div>    		

      </div>
      <div class="content" hidden id="body-content">
        <h2>Welcome <?php echo $first_name?></h2>
		<br>
		<h4>Use the provided links to either Report a case or to use a panic button<h4>
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">PANIC BUTTON</h5>
                <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> Press Panic Button</h3>
              </div>
              <div class="card-body">
                <div class="chart-area ">
                    <input type="button" value="Panic Button" class="btn btn-fill btn-primary">
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">REPORT A CRIME</h5>
                <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i>Report A Crime Here!</h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                    <a href="report_case.php"><input type="button" value="Report Case" class="btn btn-fill btn-primary"></a>
                </div>
              </div>
            </div>
          </div>

           <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">NEARBY POLICE STATIONS</h5>
                <h3 class="card-title"><i class="tim-icons icon-square-pin text-success"></i>Nearby police station</h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                   <input type="button" value="Nearby Police Station" class="btn btn-fill btn-primary" onclick="window.location.href='nearby_stations.php'">
              </div>
            </div>
          </div>
        </div>    
		
           <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">LIVE LOCATION</h5>
                <h3 class="card-title"><i class="tim-icons icon-square-pin text-success"></i>View Live Location</h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                   <input type="button" value="Live Location" class="btn btn-fill btn-primary" onclick="window.location.href='live_location.php'">
              </div>
            </div>
          </div>
        </div>  

        </div>
      </div>
	  <div id="notif"></div>
      <footer class="footer">
        <div class="container-fluid">
          <ul class="nav">
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                T&Cs
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                About Us
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                Disclaimer
              </a>
            </li>
          </ul>
          <div class="copyright">
            ©
            <script>
              document.write(new Date().getFullYear())
            </script> SA CRIME TRACKING . All Rights Reserved.
            <a href="javascript:void(0)" target="_blank">
          </div>
        </div>
      </footer>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/black-dashboard.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });
  </script>
</body>

</html>
<script src="../loader/jquery.min.js"></script>
<script src="../loader/dist/jquery.loading-indicator.js"></script>

<script>

function loader(){
$('body').loadingIndicator();
var loader = $('body').data("loadingIndicator");



    setTimeout(function() {
	   document.getElementById('main-body').removeAttribute('hidden');
       loader.hide()
     }, 3000);	
	 
    setTimeout(function() {
        document.getElementById('body-content').removeAttribute('hidden');
		document.getElementById('content_near').style.display="none";	
     }, 5000);	
	
}

function showload(){
	//document.getElementById('content_near').style.display="none";	
	
}


function get_notification(){   
    $.ajax({
        url: "../classess/case_user_notifications.php",
        cache: false,
        success: function(html){       
           $("#notif").html(html); 	   
        },
    });
   } 

setInterval (get_notification, 2500); 
</script> 