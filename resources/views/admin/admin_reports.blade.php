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
      
  <!-- Favicons -->
  <link href="{{ asset('template/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('template/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

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

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">


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
      <a class="nav-link dropdown-toggle " href="{{ route('admin.reports') }}" id="accounts-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
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
      <h1>Reports</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Reports</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <form id="filter-form" action="{{ route('admin.reports.preview') }}" method="get" class="mb-[50px]">
              <div class="flex item-center">
                  <div class="mr-5">
                    <div>Status</div>
                    <select id="status" name="status" class="block w-[170px] mt-1 pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                        <option value=""{{ empty($status) ? ' selected' : '' }}>All</option>
                        <option value="completed"{{ $status === 'completed' ? ' selected' : '' }}>Completed</option>
                        <option value="pending"{{ $status === 'pending' ? ' selected' : '' }}>Pending</option>
                        <option value="cancelled"{{ $status === 'cancelled' ? ' selected' : '' }}>Cancelled</option>
                    </select>
                  </div>
                  <div class="mr-5">
                    <div>Room Type</div>
                    <select id="room_type" name="room_type" class="block w-[170px] mt-1 pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                      <option value="" {{ empty($curroomtype) ? ' selected' : '' }}>All</option>
                      @foreach($roomtypes AS $roomtype)
                      <option value="{{$roomtype}}" {{ $curroomtype === $roomtype ? ' selected' : '' }}>{{$roomtype}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mr-5">
                    <div>Room Number</div>
                    <select id="room_number" name="room_number" class="block w-[170px] mt-1 pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                      <option value="" {{ empty($curroomnumber) ? ' selected' : '' }}>All</option>
                      @foreach($room_numbers AS $room_number)
                      <option value="{{$room_number}}" {{ $curroomnumber == $room_number ? ' selected' : '' }}>{{$room_number}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mr-10">
                    <div>Check-in Date</div>
                      <input type="date" name="checkin_date" id="checkin_date" value="{{ $checkinDate }}" class="block w-[170px] mt-1 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                  </div>
                  <div class="mr-10">
                    <div>Check-in Date</div>
                      <input type="date" name="checkout_date" id="checkout_date" value="{{ $checkoutDate }}" class="block w-[170px] mt-1 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                  </div>
                  <div class="mr-10">
                    <div class="opacity-1"></div>
                      <button type="submit"  style ="position: relative; top: 20px;" class="bg-[#259F6C] w-[120px] mt-1 py-2 text-white rounded-md">Preview</button>
                  </div>
                </div>
              </form>

            {{-- <section class="mb-[50px]">
                <div class="flex item-center">
                    <div class="mr-5">
                    <div>Status</div>
                    <select id="select" name="select" class="block w-[170px] mt-1 pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                        <option value="option1">Completed</option>
                        <option value="option2">Pending</option>
                        <option value="option3">Cancelled</option>
                    </select>
                    </div>
                    <div class="mr-10">
                    <div>Check-in Date</div>
                    <input type="date" class="block w-[170px] mt-1 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                    </div>
                    <div class="mr-10">
                    <div>Check-in Date</div>
                    <input type="date" class="block w-[170px] mt-1 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                    </div>
                    <div class="mr-10">
                        <div class="opacity-1">Button</div>
                        <button class="bg-[#005289] w-[120px] mt-1 py-2 text-white rounded-md">Preview</button>
                    </div>
                </div>
            </section> --}}

            <!-- <form action="{{ route('admin.reports.print', ['status' => $status, 'checkin_date' => $checkinDate, 'checkout_date' => $checkoutDate])}}" method="post" target="_blank">
              @csrf
              <div class="d-flex justify-content-between mb-3">
                <div class="ml-auto">
                    <button type="submit" class="bg-[#277bc0] w-[120px] mt-1 py-2 text-white rounded-md">Print</button>
                </div>
              </div>
            </form> -->
            <hr style="border-top: 2px solid #3C4048;position: relative; left: 8px;">

            <table id="datatable" class="table table-condensed table-sm table-bordered">   
                <thead class="bg-[#51bdb8] text-white">   
                    <tr class="text-center ">   
                        <th scope="col" class="w-[70px] sm-w-[70] text-center py-3">Invoice No.</th>
                        <th scope="col" class="text-center px-1 py-3">Name</th>
                        <th scope="col" class="text-center px-1 py-3">Booking Status</th>
                        <th scope="col" class="text-center px-1 py-3">Check-in Date</th>
                        <th scope="col" class="text-center px-1 py-3">Check-out Date</th>
                        <th scope="col" class="text-center px-1 py-3">Room No.</th>
                        <th scope="col" class="text-center px-1 py-3">Room Type</th>
                        <th scope="col" class="text-center px-1 py-3">Nights</th>
                        <th scope="col" class="text-center px-1 py-3">Price</th>
                    </tr>   
                </thead>   
                </tbody> 
                @foreach ($reports as $index => $report)
                @if ($report->payment_status != '')
                <tr class="text-center py-5" >
                <td scope="col">
                    {{ $index + 1 }} 
                    {{-- {{ $counter }} --}}
                    {{-- <p class="text-[0px] text">{{ $data->reservation_id }}</p> --}}
                    </td>
                    <td scope="col">{{ $report->first_name }} &nbsp; {{ $report->last_name }}</td>
                    <td scope="col">{{ $report->booking_status }}</td>
                    <td scope="col"> {{ \Carbon\Carbon::parse($report->checkin_date)->format('F j, Y') }}</td> 
                    <td> {{ \Carbon\Carbon::parse($report->checkout_date)->format('F j, Y') }}</td>
                    <td scope="col">{{ $report->room_number }}</td>
                    <td scope="col">{{ $report->room_type }}</td>
                    <td scope="col">{{ $report->nights }}</td>
                    <td scope="col">{{ $report->total_price }}</td>
                </tr>
            @endif
                @endforeach  
            </table>

            {{-- {{ $reports->links() }}  --}}
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
  
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
  
  <!-- Template Main JS File -->
  <script src="{{ asset('template/assets/js/main.js') }}"></script>

  <script>
    $(document).ready(function (){
        var table = $('#datatable').DataTable({
          dom: 'Bfrtip',
          buttons: [
              'excelHtml5',
              'csvHtml5',
              'pdfHtml5'
          ]
        });
      });
</script>

</body>

</html>