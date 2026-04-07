<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  @vite('resources/css/app.css')

 <!-- Logo -->
 <link rel="icon" type="image/png" sizes="16x16" href="../images/sitelogo.png">

  <title>Frontdesk Dashboard</title>
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

    <!-- Modal -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


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
        <a class="nav-link collapsed"  href="{{ route('frontdesk.bookingdetails') }}">
          <i class="fa-solid fa-book-open-reader icon-nav"></i>
          <span>Booking Details</span>
        </a>
       
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{ route('frontdesk.reports') }}">
          <i class="fa-solid fa-file-lines icon-nav"></i>
          <span>Reports</span>
        </a>
      </li><!-- End Reports Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
      
    <div class="pagetitle">
      <h1>Confirmed Booking</h1><br>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
          <li class="breadcrumb-item active">Confirmed Booking</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
        
        </div>
    
                      </div>
                      
        </div><!-- End Left side columns -->
        

      </div>
      <div class="mx-auto">
        @if (Session::has('error'))
        <div id="error-message" class="flex flex-row items-center justify-between bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative transition duration-500 ease-in-out" role="alert">
          <div class="flex-grow">
            {{ Session::get('error') }}
          </div>
          <div class="ml-4">
            <button type="button" style="opacity:70" class="close" onclick="document.getElementById('error-message').classList.add('opacity-0', 'h-0');">
              <span class="text-xl-center text-red-500 font-extrabold">X</span>
          </div>
            </button>    
          </div>
        </div> 
        @elseif (Session::has('success'))
        <div id="error-message" class="flex flex-row items-center justify-between bg-red-100 border border-green-400 text-green-700 px-4 py-3 rounded relative transition duration-500 ease-in-out" role="alert">
          <div class="flex-grow">
            {{ Session::get('success') }}
          </div>
          <div class="ml-4">
            <button type="button" style="opacity:70" class="close" onclick="document.getElementById('error-message').classList.add('opacity-0', 'h-0');">
              <span class="text-xl-center text-green-500 font-extrabold">X</span>
          </div>
            </button>    
          </div>
        </div> 
      @endif
      <div>
            <br>
            
      <table id="datatable" class="table table-condensed table-sm table-bordered">   
                <thead class="bg-[#55afab] text-white">   
                    <tr style="text-align:center">   
                        <th scope="col" class="w-[50px] text-center px-4"> &nbspNo.&nbsp</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center"> &nbsp &nbsp Check-in Date</th>
                        <th scope="col" class="text-center"> &nbsp Check-out Date</th>
                        <th scope="col" style="width: 50px; text-align:center;"> &nbsp &nbsp  Action</th>
                    </tr>   
                </thead>   
                </tbody> 
                @php
                $counter = 1;
              @endphp
                @foreach ($reservationData as $index => $data)
                @if ($data->payment_status == 'Paid')
                  @php
                    if($data->is_checkedin == "1"){
                      $disablecheckin = 'disabled';
                      $disablecheckout = '';
                    } else if($data->is_checkedin == "2"){
                      $disablecheckin = 'disabled';
                      $disablecheckout = 'disabled';
                    } else {
                      $disablecheckin = '';
                      $disablecheckout = 'disabled';
                    }
                  @endphp
                <tr class=" text-center pt-2" >
                  <td scope="col">
                    {{-- {{ $index + 1 }}  --}}
                    {{ $counter }}
                    <p class="text-[0px]">{{ $data->reservation_id }}
                    </p></td>
                    <td scope="col">{{ $data->first_name }} &nbsp; {{ $data->last_name }}</td>
                    <td scope="col"> {{ \Carbon\Carbon::parse($data->checkin_date)->format('F j, Y') }}</td> 
                    <td> {{ \Carbon\Carbon::parse(($data->is_checkedin == "2") ? $data->updated_at : $data->checkout_date)->format('F j, Y') }}</td>
                    <td scope="col"> 
                      <form action="{{ route('frontdesk.bookingcheckin', ['reservation_Id' => $data->reservation_id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="reservation_id" value="{{ $data->reservation_id }}">
                        <input type="hidden" name="receipt_no" value="{{ $data->reservation_id }}">
                        <button type="submit" {{ $disablecheckin }} class="btn btn-primary btn-sm" style="background-color: #0B8457; border-color: none;"><i class="fa-solid fa-circle-check"></i></button>
                      </form>
                      <form action="{{ route('frontdesk.bookingcheckout', ['reservation_Id' => $data->reservation_id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="reservation_id" value="{{ $data->reservation_id }}">
                        <input type="hidden" name="receipt_no" value="{{ $data->reservation_id }}">
                        <button type="submit" {{ $disablecheckout }} class="btn btn-primary btn-sm" style="background-color: #dc3545; border-color: none;"><i class="fa-solid fa-times-circle"></i></button>
                      </form>
                    </td>
                </tr>
                
                @php
                $counter++;
               @endphp
              @endif
                @endforeach  
            </table>
          </div>
     
    </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>DWCC Microhotel</span></strong>. All Rights Reserved
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

   {{-- DataTables CDN Links --}}
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
  {{-- <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script> --}}

  <script type="text/javascript">
    $(document).ready(function (){
      var table = $('#datatable').DataTable();
    });
  </script>

  <script>
function addUser() {
   $("form").validate({
      rules: {
         first_name: {
            required: true
         },
         last_name: {
            required: true
         },
         receipt_no: {
            required: true
         }
      },
      messages: {
         first_name: {
            required: "Please enter your first name"
         },
         last_name: {
            required: "Please enter your last name"
         },
         receipt_no: {
            required: "Please enter a receipt number"
         }
      },
      submitHandler: function(form) {
         form.submit();
      }
   });
}

  </script>
  
</body>

</html>