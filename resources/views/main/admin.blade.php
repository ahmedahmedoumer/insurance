
<!doctype html>
<html lang="en">
  <head>
  	<title>Vehicle Insurance</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

		<link rel="stylesheet" href="../css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/style.css">
  </head>
  <body>

		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
	          <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(se.jpg);"></a>
	        <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="/dashboard"  class="nav-link active" >Dashboard</a>
                  </li>
	          <li >
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Register</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="/staff_register">Staff</a>
                </li>
                {{-- <li>
                    <a href="/customer_registers">Customer</a>
                </li> --}}
                <li>
                    <a href="/give_privilege">Add Admin</a>
                </li>
	            </ul>
	          </li>
              <li>
                <a href="/admin/show_paids">Show Paid Request </a>
	          </li>
	          <li>
                <a href="/admin/status">show status</a>
	          </li>
              <li>
                <a href="/admin/contact">Contact</a>
	          </li>
              <li>
                <a href="/admin/sign_out">Sign Out</a>
	          </li>
	        </ul>

	        <div class="footer bg-dark">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template and project is Developed By 3rd Year Software Enginering Students MR.Arebu Tadesse ,MR. Yonatan Massreshaw , MR. Ahmed Oumer. <i class="icon-heart" aria-hidden="true"></i>    <a href="https://wu.edu.et/kiot.com" target="_blank">ይጎብኙን</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars">☰</i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                {{-- <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li> --}}
                <li class="nav-item active">
                <a href="/admin/approve_contract" class="nav-link" >Approve Contract</a>
                </li>
                <li class="nav-item">
                    <a href="/view_complain" class="nav-link" >View Complain</a>
                </li>
                <li class="nav-item">
                    <a href="/post_notice" class="nav-link" >Post Notice</a>
                </li>
                <li class="nav-item">
                    <a href="/admin/view_accident" class="nav-link" >View Accident</a>
                </li>
                <li class="nav-item">
                    <a href="/admin/customer_info_approve" class="nav-link" >Customer info Approve</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
     @yield('content')

      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
