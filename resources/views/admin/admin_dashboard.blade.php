<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  @vite('resources/css/app.css')

      <!-- Logo -->
 <link rel="icon" type="image/png" sizes="16x16" href="../images/sitelogo.png">

  <title>Admin Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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
        <a class="nav-link " href="{{ route('admin.dashboard') }}">
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
        <a class="nav-link dropdown-toggle collapsed" href="#" id="accounts-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
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

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('admin.faqMaintenance') }}">
        <i class="bi bi-question-circle"></i>
        <span>FAQ Maintenance</span>
      </a>
    </li>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      @if(Auth::guard('admin')->user()->is_super == 1)
        <h1>Super Admin Dashboard</h1>
      @else
        <h1>Dashboard</h1>
      @endif
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <div class="alert alert-warning">
              <strong>{{$expiredreservationcount}}</strong> reservations reached the 24 hours grace period for payment. <a onclick="return confirm('Are your sure you want to cancel all expired reservations?')" href="cancel_expired">Click here </a> to cancel all expired reservations.
            </div>
            @if(Auth::guard('admin')->user()->is_super == 1)
              @foreach($inventorystocks AS $stock)
              <div class="alert alert-danger">
                <strong>{{$stock->item}}</strong> of category <strong>{{ucwords($stock->category)}}</strong> is now below minimum stocks.
              </div>
              @endforeach
            @endif
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Registered Guest Users</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalGuest }}</h6>
                      <a href="{{ route('admin.guestList') }}">View</a>
                      @if(Auth::guard('admin')->user()->is_super == 1)
                      <br>
                      <a href="{{ route('admin.guestNewList') }}"><i>{{ $totalNewGuest }} new account(s)</i></a>
                      @endif
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
            
            @if(Auth::guard('admin')->user()->is_super == 1)
            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Registered Admin Users</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalAdmin }}</h6>
                      <a href="{{ route('admin.adminList') }}">View</a>
                      @if(Auth::guard('admin')->user()->is_super == 1)
                      <br>
                      <a href="{{ route('admin.adminNewList') }}"><i>{{ $totalNewAdmin }} new account(s)</i></a>
                      @endif
                    </div>
                  </div>
              </div>

              </div>
            </div><!-- End Revenue Card -->
            @endif

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Registered Frontdesk Users</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalFrontdesk }}</h6>
                      <a href="{{ route('admin.frontdeskList') }}">View</a>
                      @if(Auth::guard('admin')->user()->is_super == 1)
                      <br>
                      <a href="{{ route('admin.frontdeskNewList') }}"><i>{{ $totalNewFrontdesk }} new account(s)</i></a>
                      @endif
                    </div>
                  </div>
              </div>

              </div>
            </div><!-- End Revenue Card -->

            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Registered Cashier Users</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalCashier }}</h6>
                      <a href="{{ route('admin.cashierList') }}">View</a>
                      @if(Auth::guard('admin')->user()->is_super == 1)
                      <br>
                      <a href="{{ route('admin.cashierNewList') }}"><i>{{ $totalNewCashier }} new account(s)</i></a>
                      @endif
                    </div>
                  </div>
              </div>

              </div>
            </div>
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Registered Stock Controller Users</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalStockController }}</h6>
                      <a href="{{ route('admin.stockcontrollerList') }}">View</a>
                      @if(Auth::guard('admin')->user()->is_super == 1)
                      <br>
                      <a href="{{ route('admin.stockcontrollerNewList') }}"><i>{{ $totalNewStockController }} new account(s)</i></a>
                      @endif
                    </div>
                  </div>
              </div>

              </div>
            </div>

            <!-- Rooms Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card room-card">

                <div class="card-body">
                  <h5 class="card-title">Rooms</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-bed"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalRoom }}</h6>
                      <a href="{{ route('admin.roomList') }}">View</a>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Room Card -->
            

            <div class="col-xxl-4 col-md-4">
              <div class="card info-card room-card">

                <div class="card-body">
                  <h5 class="card-title">Total Completed Bookings</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-building"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ number_format($overallBooking->completedreservation) }}</h6>
                      <a href="{{ route('admin.bookingHistory') }}">View</a>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col-xxl-4 col-md-4">
              <div class="card info-card room-card">

                <div class="card-body">
                  <h5 class="card-title">Overall Sales</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-money-bill"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ number_format($overallSales->grandtotal, 2) }}</h6>
                      <a href="{{ route('admin.restaurant') }}">View</a>
                    </div>
                  </div>
                </div>

              </div>
            </div>


            {{-- DYAT --}}

            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Registered Kitchen Staff Users</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalKitchen }}</h6>
                      <a href="{{ route('admin.kitchenList') }}">View</a>
                      @if(Auth::guard('admin')->user()->is_super == 1)
                      <br>
                      <a href="{{ route('admin.kitchenNewList') }}"><i>{{ $totalNewKitchen }} new account(s)</i></a>
                      @endif
                    </div>
                  </div>
              </div>

            {{-- DYAT --}}

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

  <!-- Template Main JS File -->
  <script src="{{ asset('template/assets/js/main.js') }}"></script>

</body>

</html>