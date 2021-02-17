<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('backend/bootstrap/css/bootstrap.min.css')}}">
  <link rel="icon" href="{{asset('images/thumbnail/'.$dashboard_setting->fav_icon)}}" type="image/gif">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.4/datepicker.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/AdminLTE.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/datepicker/datepicker3.css')}}">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/skins/_all-skins.min.css')}}">
 

  <style type="text/css">
    .modal-dialog{
        position: relative;
        display: table; //This is important
        overflow-y: auto;
        overflow-x: auto;
        min-width: 300px;
    }

    .jcrop-keymgr{
      opacity:0 !important;
    }
    button{
          background: none;
            border:none;
            padding:0;
            margin:0;
        }
  
  </style>
  @stack('styles')
  <?php
    $today=Carbon\Carbon::today();
    
    
    $user=Auth::user();
    
    $role=$user->role;
    $user_access = explode(",",$user->access_level);
    
    
  ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->

<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>B</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Elite</b>Engineering</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- Tasks: style can be found in dropdown.less -->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">{{$user->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <p>
                  {{$user->name}}
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="{{route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('images/thumbnail/'.$dashboard_setting->logo)}}"  alt="User Image" style="max-width: 120px;" >
        </div>
       
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="{{route('dashboard.index')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
           <!--  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
          
          <li>
              <a href="{{route('setting.index')}}">
            <i class="fa fa-sliders"></i> <span>Site Setting</span>
           <!--  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
          </li>
        
         <li class="treeview ">
          <a href="#">
            <i class="fa fa-sliders"></i> <span>Blog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li class=""><a href="{{route('blog.create')}}"><i class="fa fa-circle-o text-aqua"></i> Add Blog</a></li>
            <li class=""><a href="{{route('blog.index')}}"><i class="fa fa-circle-o text-aqua"></i> All Blogs</a></li>
          </ul>
        </li> 
        
         <li class="treeview ">
          <a href="#">
            <i class="fa fa-sliders"></i> <span>Career</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <!--<li class=""><a href="{{route('blog.create')}}"><i class="fa fa-circle-o text-aqua"></i> Add Career</a></li>-->
            <li class=""><a href="{{route('career.index')}}"><i class="fa fa-circle-o text-aqua"></i> All Careers</a></li>
          </ul>
        </li>
        
         <li class="treeview ">
          <a href="#">
            <i class="fa fa-sliders"></i> <span>Quote</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <!--<li class=""><a href="{{route('blog.create')}}"><i class="fa fa-circle-o text-aqua"></i> Add Career</a></li>-->
            <li class=""><a href="{{route('quote.index')}}"><i class="fa fa-circle-o text-aqua"></i> All Quotes</a></li>
          </ul>
        </li>

        <li class="treeview ">
          <a href="#">
            <i class="fa fa-sliders"></i> <span>Service</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <!-- <li class=""><a href="{{route('service.create')}}"><i class="fa fa-circle-o text-aqua"></i> Add Service</a></li> -->
            <li class=""><a href="{{route('service.index')}}"><i class="fa fa-circle-o text-aqua"></i> All Services</a></li>
          </ul>
        </li>

       <!--  <li class="treeview ">
          <a href="#">
            <i class="fa fa-sliders"></i> <span>Programs</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
           
            <li class=""><a href="{{route('program.index')}}"><i class="fa fa-circle-o text-aqua"></i> All Programs</a></li>
          </ul>
        </li>
 -->
       
          <li class="treeview ">
          <a href="#">
            <i class="fa fa-sliders"></i> <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li class=""><a href="{{route('slider.create')}}"><i class="fa fa-circle-o text-aqua"></i> Add Slider</a></li>
            <li class=""><a href="{{route('slider.index')}}"><i class="fa fa-circle-o text-aqua"></i> All Sliders</a></li>
          </ul>
        </li>

         <li class="treeview ">
          <a href="#">
            <i class="fa fa-sliders"></i> <span>Subscribers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <!-- <li class=""><a href=""><i class="fa fa-circle-o text-aqua"></i> Add Subscriber</a></li> -->
            <li class=""><a href="{{route('subscriber.index')}}"><i class="fa fa-circle-o text-aqua"></i> All Subscribers</a></li>
          </ul>
        </li>

         <li class="treeview ">
          <a href="#">
            <i class="fa fa-sliders"></i> <span>Testimonials</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li class=""><a href="{{route('testimonial.create')}}"><i class="fa fa-circle-o text-aqua"></i> Add Testimonial</a></li>
            <li class=""><a href="{{route('testimonial.index')}}"><i class="fa fa-circle-o text-aqua"></i> All Testimonials</a></li>
          </ul>
        </li>

         <li class="treeview ">
          <a href="#">
            <i class="fa fa-sliders"></i> <span>Page</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <!--<li class=""><a href="{{route('page.create')}}"><i class="fa fa-circle-o text-aqua"></i> Add Pages</a></li>-->
            <li class=""><a href="{{route('page.index')}}"><i class="fa fa-circle-o text-aqua"></i> All Pages</a></li>
          </ul>
        </li>
       
        
      
       
      <!--   <li class="treeview ">
          <a href="{{route('setting.index')}}">
            <i class="fa fa-dashboard"></i> <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li> -->
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
   @yield('content')

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    
    
  </footer>

  <!-- Control Sidebar -->
  <!--  -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{asset('backend/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('backend/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('backend/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('backend/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/app.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->

<script src="{{asset('backend/dist/js/demo.js')}}"></script>
@stack('script')
</body>
</html>
