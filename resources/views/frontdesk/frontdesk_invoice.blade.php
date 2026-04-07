<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  @vite('resources/css/app.css')
 <!-- Logo -->
<link rel="icon" type="image/png" sizes="16x16" href="../images/sitelogo.png">
    
<link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
        <a class="nav-link collapsed" href="{{ route('frontdesk.reservation') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link nav-link-icon " href="{{ route('frontdesk.reservation') }}">
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
      <h1>Invoice</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
          <li class="breadcrumb-item active">Invoice</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

          <section class="section dashboard">
            <div class="container mx-auto pt-10 px-4 sm:px-6 lg:px-8">
              <!-- Flex container -->
              <div class="justify-between mx-[50px]">
                <!-- Logo -->
                @if ($reservation)
                <div class="bg-white rounded-t-lg border-6 w-full">
                  <div class="bg-[#51BDB8]">
                    <div class="px-4 py-3 text-center">
                      <h3 class="text-lg sm:text-2xl font-semibold">Booking Summary</h3>
                      <div class="flex justify-center">
                        <div class="bg-black text-left py-7 px-5 w-full my-4 mx-4 sm:mx-20">
                          <div class="text-white">
                            <h1 class="text-xs sm:text-base">
                              {{ \Carbon\Carbon::parse($reservation->checkin_date)->format('F j, Y') }}
                              &nbsp; - &nbsp;{{ \Carbon\Carbon::parse($reservation->checkout_date)->format('F j, Y') }}
                            </h1>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
      
                  <form 
                  {{-- method="POST" --}}
                   {{-- action="{{ route('') }}" --}}
                   >
                  <div class="rounded-b-lg border-2 border-gray-700 shadow-md w-full pb-4">
                    <div class="space-y-4 font-regular text-base sm:text-lg pb-1">
                      <div class="px-5 pt-3 pb-3 text-left border-b-2 border-gray-400">
                        <h3 class="text-2xl font-semibold">Booking Summary</h3>
                      </div>
                      <div class="py-5">
                        <div class="w-full flex flex-col sm:flex-row justify-center">
                          <div class="py-2 px-5 mb-3 sm:mb-0 w-full sm:w-1/2 sm:mx-10 sm:border-gray-400">
                            <div class="flex justify-between">
                              <label class="font-bold" for="room">Room No: </label>
                              <div class="pl-10">{{ $reservation->room_id }}</div>
                            </div>
                            <div class="flex justify-between">
                              <label class="font-bold" for="room">Room Type </label>
                              <div class="pl-10" style="position: relative; left: 100px;">{{ $rooms->room_type }}</div>
                            </div>
                            <div class="flex justify-between">
                              <label class="font-bold" for="guests">Total No. of Guests: </label>
                              <div class="pl-10">{{ $reservation->guests_num }}</div>
                            </div>
                            <div class="flex justify-between">
                              <label class="font-bold" for="guests">Additional Guests: </label>
                              <div class="pl-10">{{ $reservation->additional_guests }}</div>
                            </div>
                          </div>
      
                          <div class="py-2 px-5 mb-3 sm:mb-0 w-full sm:w-1/2 sm:mx-10 sm:border-gray-400">
                            <div class="flex justify-between">
                              <label class="font-bold" for="check-in-date">Date Checked in: </label>
                              <div class="pl-10">{{ \Carbon\Carbon::parse($reservation->checkin_date)->format('F j, Y') }}</div>
      
                            </div>
                            <div class="flex justify-between">
                              <label class="font-bold" for="check-out-date">Date Checked out: </label>
                              <div class="pl-10">{{ \Carbon\Carbon::parse($reservation->checkout_date)->format('F j, Y') }}</div>
      
                            </div>
                            <div class="flex justify-between">
                              <label class="font-bold" for="check-out-date">Nights: </label>
                              <div class="pl-10"> {{ $reservation->nights }}</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
      
                    <div class="bg-[#AFF4F1] ">
                      <div class="max-w-7xl mx-auto sm:text-lg px-4 sm:px-6 lg:px-8 py-3">
                        <div class="flex flex-wrap justify-evenly ">
                          <div class="w-full md:w-1/2 py-2 px-5">
                            <div class="justify-left">
                              <label class="font-bold" for="base-price">Base Price: </label>
                            </div>
                          </div>
                          <div class="w-full md:w-1/2 py-2 px-5 ">
                            <div class="justify-left">
                              <div class=""> {{ number_format($reservation->base_price,0) }}</div>
                            </div>
                          </div>
                          <div class="w-full md:w-1/2 py-2 px-5">
                            <div class="justify-left">
                              <label class="font-bold" for="additional-person">Additional Fee Per-Guests: </label>
                            </div>
                          </div>
                          <div class="w-full md:w-1/2 py-2 px-5">
                            <div class="justify-left">
                              <div class="">{{ number_format($reservation->guests_Fee,0)}}</div>
                            </div>
                          </div>
                        </div>
                        <hr class="border-b-2 border-black">
                        <div class="flex flex-wrap justify-between">
                          <div class="w-full md:w-1/2 py-2  px-5">
                            <div class="justify-between">
                              <label class="font-bold" for="base-price">Total Price:</label>
                            </div>
                          </div>
                          <div class="w-full md:w-1/2 py-2 px-5">
                            <div class="flex justify-between">
                              <div class=" font-bold"> {{ number_format($reservation->total_price, 0) }}</div>
                            </div>
                          </div>
                          <div class="w-full md:w-1/2 pb-10 py-2 px-5">
                            <div class="flex justify-between">
                              <label class="font-bold" for="base-price">Payment
                                Method:&nbsp;{{ $guestRegistration->payment_method }}</label>
                              <label class="font-bold" for="base-price"></label>
                            </div>
                          </div>
                          <div class="w-full md:w-1/2 py-2 px-5">
                            <div class="flex justify-between">
                              <div class=" font-bold">{{ $guestRegistration->department}}</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <div class="flex justify-end mt-20 mr-10">
                      {{-- <button id="continue-button" class="text-white bg-[#E0C822] hover:bg-yellow-600 px-4 py-2 rounded-sm"
                             >Continue</button> --}}
                      {{-- <button class="bg-yellow-500 text-white active:bg-yellow-800 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button"
                        onclick="toggleModal('modal-id')">
                        Continue
                      </button> --}}
                      <a href="{{ route('frontdesk.invoice.view.pdf') }}" target="_blank" class=" bg-[#00BD56] text-white active:bg-yellow-800 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">View</a>
      
                      <a href="{{ route('frontdesk.invoice.generate.pdf')}}" 
                       class=" bg-[#277BC0] text-white active:bg-yellow-800 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Download</a>
                  </form>
      
                      <div
                        class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
                        id="modal-id">
                        <div class="relative w-[700px] my-6 mx-auto max-w-3xl">
                          <!--content-->
                          <div
                            class="border-3 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                            <!--header-->
                            <div class="p-3">
                              <button
                                class="p-1 ml-auto  text-black  float-right text-2xl leading-none font-semibold outline-none focus:outline-none"
                                onclick="toggleModal('modal-id')">
                                <h1 class="text-black text-[30px]">x</h1>
                              </button>
                            </div>
                            <div class="relative items-start p-1  rounded-t">
                              <div class="flex justify-left ml-10 md:items-center">
                                <div>
                                  <img src="{{ asset('./images/DWCCLOGO.png')}}" class="h-[70px]" >
                                </div>
                                <div>
                                  <img src="{{ asset('./images/logom2.png')}}" class="h-[70px]" alt="">
                                </div>
                                <div class="relative text-center ">
                                  <h3 class="text-lg font-semibold">
                                    Divine Word College of Calapan
                                  </h3>
                                  <h2 class="font-bold">MicroHotel</h2>
                                </div>
                              </div>
                            </div>
                            <div>
                              <div class="text-center mt-3">
                                <h2 class="font-regular">Official Receipt</h2>
                              </div>
                              <div class="flex justify-end mt-3 pr-1 border-b-4 mx-10 border-black">
                                <h2 class="font-regular mr-1">Invoice No: </h2>
                                <h2 class="font-regular text-black"> {{$guestRegistration->reservation_id}}</h2>
                              </div>
                            </div>
                            <!--body-->
                            <div class="relative pl-6 pr-6 pb-6 pt-0 flex-auto">
                              <div class="">
                                <div class="p-4">
                                  <!-- Receipt Info -->
                                  <div class="flex justify-left pb-2 border-b-4 border-neutral-300 mb-4">
                                    <h2 class="font-bold  ">Guest Information</h2>
                                  </div>
                                  <div class="flex justify-between items-center mb-4">         
                                    <div class="flex-grow-10">
                                      <p class="mr-4">Guest Name:</p>
                                    </div>  
                                    <div class="flex-shrink-0 text-left">
                                      <p>{{ $guestRegistration->first_name }} {{ $guestRegistration->last_name }}</p>
                                    </div>
                                    </div>
                                  
                                  <div class="flex justify-between items-center mb-4">
                                    <p>Address:</p>
                                    <div class="flex-shrink-0 text-left">
                                    <p>{{ $guestRegistration->address }}</p>
                                  </div>
                                  </div>
                                  <div class="flex justify-between mb-4">
                                    <p>Phone Number:</p>
                                    <p>{{ $guestRegistration->phone_number }}</p>
                                  </div>
                                  <div class="flex justify-between mb-4">
                                    <p>Room No.:</p>
                                    <p>{{$reservation->room_id}}</p>
                                  </div>
                                  <div class="flex justify-between mb-4">
                                    <p>Number of Guests:</p>
                                    <p>{{$reservation->guests_num}}</p>
                                  </div>
          
                                  <div class="flex justify-between mb-4">
                                    <p>Number of Nights:</p>
                                    <p>{{$reservation->nights}}</p>
                                  </div>
                                  <div class="flex justify-between mb-4">
                                    <p>Date Checked in:</p>
                                    <p>{{$reservation->checkin_date}}</p>
                                  </div>
                                  <div class="flex justify-between mb-4">
                                    <p>Date Checked out:</p>
                                    <p>{{$reservation->checkout_date}}</p>
                                  </div>
                                  <div class="flex justify-between mb-4">
                                    <p>Payment Method:</p>
                                    <p>{{ $guestRegistration->payment_method}}</p>
                                  </div>
      
                                  <!-- Price Details -->
                                  <div class="border-t border-b border-black py-2 mb-4">
                                    <div class="flex justify-between">
                                      <p>Unit Price:</p>
                                      <p>{{number_format($reservation->base_price,0)}}</p>
                                    </div>
                                    <div class="flex justify-between">
                                      <p>Additional Person:</p>
                                      <p>{{ number_format($reservation->guestsFee,0) }}</p>
                                    </div>
                                  </div>
      
                                  <!-- Total -->
                                  <div class="flex justify-between mb-4">
                                    <p>Total:</p>
                                    <p>{{number_format($reservation->total_price,0)}}</p>
                                  </div>
                                </div>
                                </div>
                              </div>
                              <!--footer-->
                              <div class="flex items-center justify-center p-6 border-t border-solid border-slate-200 rounded-b">
                                <button
                                  class="bg-yellow-500 text-white active:bg-yellow-800 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                  type="button" onclick="toggleModal('modal-id')">
                                  Print
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <script type="text/javascript">
                          function toggleModal(modalID) {
                            document.getElementById(modalID).classList.toggle("hidden");
                            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
                            document.getElementById(modalID).classList.toggle("flex");
                            document.getElementById(modalID + "-backdrop").classList.toggle("flex");
                          }
                        </script>
                        @else
                        <h1>No records</h1>
                 @endif
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

</body>

</html>