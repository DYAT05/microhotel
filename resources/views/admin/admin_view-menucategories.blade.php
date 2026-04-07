<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  @vite('resources/css/app.css')

  <title>Admin Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Logo -->
  <link rel="icon" type="image/png" sizes="16x16" href="../images/sitelogo.png">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('template/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('template/assets/css/style.css') }}" rel="stylesheet">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/3a364cef47.js" crossorigin="anonymous"></script>
    <script
      defer
      src="https://use.fontawesome.com/releases/v6.1.1/js/all.js"
      integrity="sha384-xBXmu0dk1bEoiwd71wOonQLyH+VpgR1XcDH3rtxrLww5ajNTuMvBdL5SOiFZnNdp"
      crossorigin="anonymous">
    </script>

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="dashboard" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Microhotel</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
            <!-- <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span> -->
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::guard('admin')->user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Admin</h6>
              <!-- <span>Web Designer</span> -->
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.changePassword') }}">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="">
        <div class="sibar-logo">
          <img src="{{ asset ('images/logom2.png') }}" class="h-[120px] mx-auto" alt="">
          <p class="text-[#bdb6b5] text-sm flex justify-center">Divine Word College of Calapan</p>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link nav-link-icon collapsed" href="{{ route('admin.room.index') }}">
          <i class="fa-solid fa-bed icon-nav"></i>
          <span>Manage Rooms</span>
        </a>
      </li><!-- End Manage Rooms Nav -->

      <li class="nav-item">
        <a class="nav-link nav-link-icon collapsed" href="{{ route('admin.roomtype.index') }}">
          <i class="fa-solid fa-bed icon-nav"></i>
          <span>Manage Room Types</span>
        </a>
      </li><!-- End Manage Rooms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.bookingHistory') }}">
          <i class="fa-regular fa-file icon-nav"></i>
          <span>Booking History</span>
        </a>
      </li><!-- End Booking History Nav -->

      <li class="nav-item">
        <a class="nav-link dropdown-toggle collapsed" href="#" id="accounts-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-user icon-nav"></i><span>Accounts</span></i>
        </a>
        <ul id="tables-nav" class="dropdown-menu" aria-labelledby="accounts-dropdown">
          <li>
            <a class="dropdown-item" href="{{ route('admin.guestList') }}">
            <i class="fa-solid fa-users"></i><span>&nbsp Guest</span>
            </a>
          </li>
          @if(Auth::guard('admin')->user()->is_super == 1)
          <li>
            <a class="dropdown-item" href="{{ route('admin.adminList') }}">
            <i class="fa-sharp fa-solid fa-user-tie"></i><span>&nbsp Admins</span>
            </a>
          </li>
          @endif
          <li>
            <a class="dropdown-item" href="{{ route('admin.frontdeskList') }}">
            <i class="fa-sharp fa-solid fa-user-tie"></i><span>&nbsp Frontdesk</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="{{ route('admin.cashierList') }}">
            <i class="fa-solid fa-users"></i><span>&nbsp Cashier</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="{{ route('admin.stockcontrollerList') }}">
            <i class="fa-solid fa-users"></i><span>&nbsp Stock Controller</span>
            </a>
          </li>

          {{-- DYAT --}}
          <li>
            <a class="dropdown-item" href="{{ route('admin.kitchenList') }}">
            <i class="fa-solid fa-users"></i><span>&nbsp Kitchen</span>
            </a>
          </li>
          {{-- DYAT --}}
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link dropdown-toggle " href="#" id="accounts-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fas fa-hamburger icon-nav"></i><span>Ordering</span></i>
        </a>
        <ul id="tables-nav" class="dropdown-menu" aria-labelledby="accounts-dropdown">
          <li>
            <a class="dropdown-item" href="{{ route('admin.menuListDashboard') }}">
            <i class="fa-solid fa-cutlery"></i><span>&nbsp Menu</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="{{ route('admin.menucategories.index') }}">
            <i class="fa-solid fa-cutlery"></i><span>&nbsp Menu Categories</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- End Tables Nav -->

      <li class="nav-item">
      <a class="nav-link dropdown-toggle collapsed " href="{{ route('admin.reports') }}" id="accounts-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-regular fa-file-lines icon-nav"></i>
          <span>Reports</span>
        </a>       
        <ul id="tables-nav" class="dropdown-menu" aria-labelledby="accounts-dropdown">
        <li>
            <a class="dropdown-item" href="{{ route('admin.reports') }}">
            <i class="fa-regular fa-file-lines"></i><span>&nbsp Room Reports</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="{{ route('admin.overallsales') }}">
            <i class="fa-regular fa-file-lines"></i><span>&nbsp Overall Sales</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="{{ route('admin.restaurant') }}">
            <i class="fa-regular fa-file-lines"></i><span>&nbsp Restaurant Reports</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="{{ route('admin.inventory') }}">
            <i class="fa-regular fa-file-lines"></i><span>&nbsp Inventory Reports</span>
            </a>
          </li>
      </li><!-- End Reports Nav -->

    </ul>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('admin.manageDashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard Content</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('admin.guestFeedback') }}">
        <i class="bi bi-lightbulb"></i>
        <span>Guests Feedbacks</span>
      </a>
    </li>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Menu Categories</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Menu Categories</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <div class="d-flex justify-content-between mb-3">
                <div class="ml-auto">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewMenuCategory">
                    <i class="fa-solid fa-plus"></i>&nbsp Add New</button>
                </div>
            </div>
            
<!-- Modal -->
<div class="modal fade" id="addNewMenuCategory">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color: #55afab">Add New Menu Category</h4>
                <button type="button"  style="color: #E21818; font-size: 25px;" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.menucategories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-2 font-semibold">
                        <label>Menu Category Name</label>
                        <input class="form-control" type="text" name="name" placeholder="Enter Name">
                        <x-input-error :messages="$errors->get('name')"/>
                    </div>
                    <button type="submit" style="position: relative; left: 400px;" class="btn btn-primary">Save</button>
                    <button type="reset" data-bs-dismiss="modal" style="position: relative; left: 260px; background-color: #7c7c7c; border: none;" class="btn btn-primary">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

  <table class="table table-condensed table-sm table-bordered">   
      <thead class="bg-[#51bdb8] text-white">   
          <tr style="text-align:center">   
              <th scope="col">Name</th>
              <th scope="col" style="width: 150px;">Action</th>
          </tr>   
      </thead>   
      <tbody>   
      @foreach ($categories as $category)
          <tr>     
              <td style="text-align:center">{{ $category->category_name }}</td>
              <td class="text-center">
              <!--View Button-->	
                <!-- Button trigger deactivate modal -->
{{-- DYAT --}}
                <!-- Edit Button -->
              <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editmenucategory{{ $category->id }}">
                  <i class="fa-solid fa-pen"></i>
              </button>
{{-- DYAT --}}

              {{-- delete button --}}
                <button type="button"  class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletemenucategory{{ $category->id }}">
                    <i class="fa-solid fa-trash"></i>
                </button>

                </td>  
            </tr> 
            
{{-- DYAT --}}
         <div class="modal fade" id="editmenucategory{{ $category->id }}">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" style="color: #55afab">Edit Menu Category</h4>
                <button type="button" style="color: #E21818; font-size: 25px;" data-bs-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                {{-- <form action="{{ route('admin.menucategories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT') --}}
                <form action="{{ route('admin.menucategories.update', $category->id) }}" method="POST">
                    @csrf
{{-- DYAT --}}



                    <div class="form-group mb-2 font-semibold">
                        <label>Menu Category Name</label>
                        <input class="form-control" type="text" name="name" value="{{ $category->category_name }}">
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Cancel</button>
                </form>
            </div>

        </div>
    </div>
</div>   

{{-- DYAT --}}
            
<div class="modal fade" id="deletemenucategory{{ $category->id }}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.deletemenucategory', $category->id) }}">
                @csrf
                @method('PATCH')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"  style="color: #55afab;">Delete Category</h5>
                    <button type="button" class="close" style="color: #E21818; font-size: 25px;" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this menu category?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
                        
                    </tr>     
                    @endforeach
                </tbody>   
            </table>

          </div>
        </div><!-- End Left side columns -->
      </div>
    </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Microhotel</span></strong>. All Rights Reserved
    </div>

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('template/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/chart.js/chart.min.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>


  <!-- Template Main JS File -->
  <script src="{{ asset('template/assets/js/main.js') }}"></script>
  

</body>


</html>