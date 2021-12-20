<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title> reignsol.net|@yield('page_title')</title> @stack('css')
	<!-- General CSS Files index -->
	<link rel="stylesheet" href="{{ asset('assets/admin/css/app.min.css') }}">
	<!-- General CSS Files create-post -->
	<link rel="stylesheet" href="{{ asset('assets/admin/bundles/summernote/summernote-bs4.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
	<!-- General CSS Files datatables -->
	<link rel="stylesheet" href="{{ asset('assets/admin/bundles/datatables/datatables.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
	<!-- Template CSS -->
	<link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/css/components.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/bundles/pretty-checkbox/pretty-checkbox.min.css') }}">
	<!-- Custom style CSS -->
	<link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">
	<link rel='shortcut icon' type='image/x-icon' href="{{ asset('assets/admin/img/favicon.png') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/backend/css/toastr.min.css') }}"> </head>

<body>
	<div class="loader"></div>
	<div id="app">
		<div class="main-wrapper main-wrapper-1">
			<div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
                  collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="{{ asset('assets/admin/img/user.png') }}"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title"><b>{{ Auth::user()->name }}</b></div>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
              onclick="event.preventDefault();
               document.getElementById('logout-form').submit();"> 
                 <i class="fas fa-sign-out-alt"></i>
                 {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
               @csrf
                </form>
            </div>
          </li>
        </ul>
      </nav>
			<div class="main-sidebar sidebar-style-2">
				<aside id="sidebar-wrapper">
					<div class="sidebar-brand">
						<a href="{{route('users.index')}}"> <span class="logo-name">Reignsol</span></a>
					</div>
					<ul class="sidebar-menu">
						<li class="menu-header">Main</li>
						<li class="dropdown"> <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="list"></i><span>Categories</span></a>
							<ul class="dropdown-menu">
								<li class=""><a class="nav-link" href="{{ route('categories.index') }}">All Categories</a></li>
								<li class=""><a class="nav-link" href="{{ route('categories.create') }}">Add Category</a></li>
							</ul>
						</li>
						<li class="dropdown"> <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="list"></i><span>Products</span></a>
							<ul class="dropdown-menu">
								<li class=""><a class="nav-link" href="{{ route('products.index') }}">All Products</a></li>
								<li class=""><a class="nav-link" href="{{ route('products.create') }}">Add Product</a></li>
							</ul>
						</li> 
            @if(\Auth::user()->hasRole('Admin'))
						<li class="dropdown"> <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="list"></i><span>Roles</span></a>
							<ul class="dropdown-menu">
								<li class=""><a class="nav-link" href="{{ route('roles.index') }}">All Roles</a></li>
								<li class=""><a class="nav-link" href="{{ route('roles.create') }}">Add Roles</a></li>
							</ul>
						</li> 
            @else 
            @endif
						<li class="dropdown"> <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="list"></i><span>Organizations</span></a>
							<ul class="dropdown-menu">
								<li class=""><a class="nav-link" href="{{ route('organizations.index') }}">All Organizations</a></li>
								<li class=""><a class="nav-link" href="{{route('organizations.create')}}">Add Organization</a></li>
							</ul>
						</li>
			@if(\Auth::user()->hasRole('Admin'))
						<li class="dropdown"> <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="list"></i><span>General Setting</span></a>
							<ul class="dropdown-menu">
								<li class=""><a class="nav-link" href="{{ route('logs') }}">Logs</a></li>
								<li class=""><a class="nav-link" href="{{ route('content') }}">Contents & Terms Conditon</a></li>
								<li class=""><a class="nav-link" href="{{route('settings.index')}}">Settings</a></li>
							</ul>
						</li>
			@else 
            @endif
				</aside>
			</div>
			<!-- Main Content -->
			<div class="main-content"> @yield('content') </div>
			<footer class="main-footer">
				<div class="footer-left"> <b style="color:#212529;">Copyright © {{ date('Y') }} <a href="https://reignsol.com" target="_blank" style="color:#6777ef; text-decoration:none;"><b>reignsol</b></a>. All rights reserved.</b>
				</div>
				<div class="footer-right"> </div>
			</footer>
		</div>
	</div>
	<!-- General JS Scripts -->
	<script src="{{ asset('assets/admin/js/app.min.js') }}"></script>
	<!-- JS Libraies index-->
	<script src="{{ asset('assets/admin/bundles/apexcharts/apexcharts.min.js') }}"></script>
	<!-- JS Libraies create-post-->
	<script src="{{ asset('assets/admin/bundles/summernote/summernote-bs4.js') }}"></script>
	<script src="{{ asset('assets/admin/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
	<script src="{{ asset('assets/admin/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
	<!-- JS Libraies datatables -->
	<script src="{{ asset('assets/admin/bundles/datatables/datatables.min.js') }}"></script>
	<script src="{{ asset('assets/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('assets/admin/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
	<!-- Page Specific JS File index -->
	<script src="{{ asset('assets/admin/js/page/index.js') }}"></script>
	<!-- Page Specific JS File create-post -->
	<script src="{{ asset('assets/admin/js/page/create-post.js') }}"></script>
	<!-- Page Specific JS File datatables -->
	<script src="{{ asset('assets/admin/js/page/datatables.js') }}"></script>
	<!-- Template JS File -->
	<script src="{{ asset('assets/admin/js/scripts.js') }}"></script>
	<!-- Custom JS File -->
	<script src="{{ asset('assets/admin/js/custom.js') }}"></script>
	<script src="{{ asset('assets/admin/backend/js/toastr.min.js') }}"></script> @stack('js') </body>

</html>