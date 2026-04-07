<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  @vite('resources/css/app.css')
  <link rel="icon" type="image/png" sizes="16x16" href="../images/sitelogo.png">
  <title>Frontdesk Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('template/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Modal -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="{{ asset('template/assets/css/style.css') }}" rel="stylesheet">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/3a364cef47.js" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v6.1.1/js/all.js"
    integrity="sha384-xBXmu0dk1bEoiwd71wOonQLyH+VpgR1XcDH3rtxrLww5ajNTuMvBdL5SOiFZnNdp" crossorigin="anonymous">
  </script>

  {{-- DataTables Link --}}
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">

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
            <!-- <span class="d-none d-md-block dropdown-toggle ps-2">Frontdesk</span> -->
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::guard('frontdesk')->user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Frontdesk</h6>
              <!-- <span>Web Designer</span> -->
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('frontdesk.logout') }}">
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
        <a class="nav-link collapsed" href="{{ route ('frontdesk.dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link nav-link-icon collapsed" href="{{ route('frontdesk.reservation') }}">
          <i class="fa-solid fa-bell icon-nav"></i>
          <span>Reservation</span>
        </a>
      </li><!-- End Manage Rooms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('frontdesk.payment') }}">
          <i class="fa-regular fa-credit-card icon-nav"></i>
          <span>Payment</span>
        </a>
      </li><!-- End Booking History Nav -->

      <li class="nav-item">
        <a class="nav-link " href="{{ route('frontdesk.bookingdetails') }}">
          <i class="fa-solid fa-book-open-reader icon-nav"></i>
          <span>Booking Details</span>
        </a>

      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('frontdesk.reports') }}">
          <i class="fa-solid fa-file-lines icon-nav"></i>
          <span>Reports</span>
        </a>
      </li><!-- End Reports Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Booking Details</h1>
      <br>
      <nav>
        <ol class="breadcrumb" style="background-color:">
          <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
          <li class="breadcrumb-item active">Booking Details</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif

            <div class="d-flex justify-content-between mb-3">
              <div class="row mt-3">
              
                <div class="">
                </div>
              </div>
            </div>
          </div><!-- End Left side columns -->
        </div>
        <hr style="border-top: 2px solid #3C4048;position: relative; left: 8px;">
        <div>
          <br>
          <table id="datatable" class="table table-condensed table-sm table-bordered">
            <thead class="bg-[#55afab] text-white">   
              <tr style="text-align:center">   
                  <th No. scope="col" class="w-[50px] text-center px-4"> &nbsp No. &nbsp</th>
                  <th scope="col" class="text-center">Name</th>
                  <th scope="col" class="text-center"> &nbsp Payment Method</th>
                  <th scope="col" class="text-center"> &nbsp Booking Status</th>
                  <th scope="col" class="text-center"> &nbsp Payment Status</th>
                  <th scope="col" class="text-center"> &nbsp &nbsp Check-in Date</th>
                  <th scope="col" class="text-center"> &nbsp Check-out Date</th>
                  <th scope="col" style="width: 100px; text-align:center;"> &nbsp &nbsp  Action</th>
                  <div class="container"> 
              </tr>   
             </thead>   

            <tbody>
              @foreach ($reservationData as $index => $data)
              {{-- @foreach ($reservationData as $data) --}}
              <tr style="text-align:center" style="height: 250px;">
                <td scope="col">
                  {{ $index + 1 }}
                </td>
                <td scope="col">{{ $data->first_name }} &nbsp; {{ $data->last_name }}</td>
                <td scope="col">{{ $data->payment_method }}</td>
                <td scope="col">
                  @php
                    if($data->booking_status == "Completed"){
                      if($data->is_checkedin == 0){
                        echo 'Not yet Checked-in';
                      } else if($data->is_checkedin == 1){
                        echo 'Checked-in';
                      } else {
                        echo 'Completed';
                      }
                    } else {
                      echo $data->booking_status;
                    }
                  @endphp
                </td>
                <td scope="col">{{ $data->payment_status }}</td>
                <td scope="col"> {{ \Carbon\Carbon::parse($data->checkin_date)->format('F j, Y') }}</td>
                <td scope="col"> {{ \Carbon\Carbon::parse($data->checkout_date)->format('F j, Y') }}</td>
                <td scope="col">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                    data-target="#view_modal{{ $data->reservation_id }}">
                    <i class="fa-solid fa-eye"></i></button>
                  @if($data->booking_status != "Completed")
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                    data-target="#delete_modal{{ $data->reservation_id }}">
                    <i class="fa-solid fa-trash"></i></button>
                  @endif
                </td>
              </tr>
              <!-- View Modal -->
              <div class="modal fade" id="view_modal{{ $data->reservation_id }}" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" style="position:relative; left: 338px; color: red; font-size: 25px;" 
                        data-dismiss="modal">&times;</button>
                      <h4 class="modal-title" style="position:relative; left: -230px; color:#51bdb8;">Booking Details
                      </h4>
                    </div>
                    <div class="modal-body">
                      <strong>
                        <p style="color:#434242;">Name:
                      </strong><span>{{ $data->first_name }}&nbsp;{{ $data->last_name }}</span></p>
                      <strong>
                        <p style="color:#434242;">Payment Method:
                      </strong> <span>{{ $data->payment_method }}</span></p>
                      <strong>
                        <p style="color:#434242;">Booking Status:
                      </strong><span>{{$data->booking_status}}</span></p>
                      <strong>
                        <p style="color:#434242;">Check-in / Check-out Date:
                      </strong> <span>
                        {{ \Carbon\Carbon::parse($data->checkin_date)->format('F j, Y') }} &nbsp; - &nbsp;
                        {{ \Carbon\Carbon::parse($data->checkout_date)->format('F j, Y') }}</span>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal"
                        style="background-color: #6c757d; color:#ffffff;">Close</button>
                    </div>
                  </div>
               
                </div>
              </div>
              <!-- Delete Modal -->
              <div class="modal fade" id="delete_modal{{ $data->reservation_id }}" id="view_modal" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content" style="height: 240px;">
                    <div class="modal-header">
                      <button type="button" style="position:relative; left: 358px; color: red; font-size: 25px;" 
                        data-dismiss="modal">&times;</button>
                      <h4 class="modal-title" style="position:relative; left: -190px; color:#51bdb8;">Cancel Booking
                        Details
                      </h4>
                    </div>
                    <form  action="{{ route('frontdesk.bookingdetails.softdelete', $data->reservation_id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <div class="modal-body">
                        <input id="id" name="id">
                        <strong>
                          <h4 class="text-center">Are you sure you want to cancel this reservation?
                        </strong></h4>
                        <input id="firstName" name="firstName"><input id="lastName" name="lastName">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit"class="btn btn-primary">Yes,Continue </button>
                      </div>
                    </form>
                  </div>
                </div>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>DWCC Microhotel</span></strong>. All Rights Reserved
    </div>

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

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

  {{-- DataTables CDN Links --}}
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
  {{-- <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script> --}}

  <script type="text/javascript">
    $(document).ready(function (){
      var table = $('#datatable').DataTable();
    });
  </script>

</body>
