<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  @vite('resources/css/app.css')

 <!-- Logo -->
 <link rel="icon" type="image/png" sizes="16x16" href="../images/sitelogo.png">

  <title>Frontdesk Reservation</title>
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
  {{-- Script for Select Room_types --}}

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
        
        <!-- End Search Icon-->

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
        <a class="nav-link collapsed" href="{{ route('frontdesk.bookingdetails') }}">
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
      <h1>Reservation</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/frontdesk/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Reservation</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="mx-auto">
      @if (Session::has('error'))
      <div id="error-message" class="flex flex-row items-center justify-between bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative transition duration-500 ease-in-out" role="alert">
        <div class="flex-grow">
          {{ Session::get('error') }}
        </div>
        <div class="ml-4">
          <button type="button" class="close" onclick="document.getElementById('error-message').classList.add('opacity-0', 'h-0');">
            <span class="text-xl-center text-red-500 font-extrabold">X</span>
        </div>
          </button>    
        </div>
      </div>          
    @endif

    <form method="POST" id="reservationform" action="{{ route('frontdesk.save.reservation') }}">
      @csrf
      <section class="lg:container lg:mx-auto">
        <div class="bg-white rounded-lg shadow-md border-2 w-full my-10 pb-14 ">
          <div class="border-b-2 border-gray-300 px-4 py-3">
            <h3 class="text- sm:text-2xl font-bold">Room Information</h3>
          </div>
          <div class="pt-3">
            <div class="flex flex-col md:flex-row">
              <div class="flex-1 mx-4">
                <label class="block mt-3 font-semibold">Check-in Date:</label>
                <input
                  class="daterangebook w-full mt-2 py-[7px] border-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  style="border: 1px solid gray;" id="check_in_date" name="check_in_date" type="date"
                  value="{{ old('check_in_date') }}">
              </div>
              <div class="flex-1 mx-4">
                <label class="block mt-3 font-semibold" for="in">Check-out Date:</label>
                <input
                  class="daterangebook w-full mt-2 py-[7px] border-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  style="border: 1px solid gray;" id="check_out_date" name="check_out_date" type="date"
                  value="{{ old('check_out_date') }}">
              </div>
            </div>
            <div class="flex flex-col md:flex-row">
              <div class="flex-1 mx-4">
                <label class="block mt-3 font-semibold" for="room_type">Room Type:</label>
                <select disabled="disabled" class="w-full mt-2 focus:outline-none rounded-md "
                  style="border: 1px solid gray;" name="room_type" id="room_type">
                  <option value="">---</option>
                  @foreach ($room_type as $roomType)
                  <option value="{{ $roomType }}" {{ old('room_type') == $roomType ? 'selected' : '' }}>
                    {{ ucfirst($roomType) }} Size
                  </option>
                  @endforeach
                </select>
              </div>
              <div class="flex-1 mx-4">
                <label class="block mt-3  font-semibold" for="room_no">Room No:</label>
                <!-- <input
                  class="w-full mt-2 py-[7px]
                 border-1 text-center border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  style="border: 1px solid gray;" name="room_no" id="room_no" value="{{ old('room_no') }}" readonly> -->
                <select class="w-full mt-2 focus:outline-none rounded-md "
                style="border: 1px solid gray;" required name="room_no" id="room_no">
              </select>
             </div>
            </div>
            <div class="">
              <div class="flex flex-col md:flex-row mx-4 md:mx-5">
                <label class="font-semibold mt-3" for="num_guest">Number of Guest</label>
              </div>
              <div class="flex flex-col md:flex-row mx-4 md:mx-5">
                <div class="w-full md:w-[450px] ">
                  <div class="flex items-center border mt-2 border-gray-500 rounded">
                    <button type="button" onclick="subtract('guest_num')"
                      class="flex flex-col items-center justify-center py-[7px]  w-10 h-10 bg-gray-100 hover:bg-gray-400 text-gray-700 hover:text-white border-r border-gray-500 focus:outline-none focus:ring-gray-600 rounded-l">
                      -
                    </button>
                    <input type="number" id="guest_num" name="guest_num" 
                    {{-- value="{{ $max_capacity->max_capacity  }}" min="{{ $max_capacity->max_capacity }}" --}}
                      class="w-full sm:w-[410px] md:w-[410px] lg:w-full  flex-1 text-center text-gray-700 bg-white py-[7px]"
                      readonly>
                    <button type="button" onclick="add('guest_num')"
                      class="flex flex-col items-center justify-center py-[7px]  w-10 h-10 bg-gray-100 hover:bg-gray-400 text-gray-700 hover:text-white border-l border-gray-500 focus:outline-none focus:ring-gray-600 rounded-r">
                      +
                    </button>
                  </div>
                </div>
              </div>
              <div class="flex items-center md:flex-row mx-4 md:mx-5 mt- py-[7px]">
                <label class="mt-1 ml-3 font-semibold" for="font-bold">Number of Nights</label>
                <div>
                  <input type="text" id="number_of_nights" name="number_of_nights"
                  value="{{ old('number_of_nights') }}"
                  class="bg-transparent pointer-events-non border-transparent rounded mx-2 w-10 text-gray-900 text-left leading-tight focus:outline-none focus:border-blue-500"
                  readonly
                  >           
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    <section class="lg:container lg:mx-auto ">
      <div class="relative bg-white rounded-lg border-2 shadow-md w-full pb-4">
        <div class="border-b-2 border-gray-300 px-4 py-3">
          <h3 class="text-lg sm:text-2xl font-bold">Guest Information</h3>
        </div>
        <div class="space-y-4 font-regular text-base  ">
            <div class="flex flex-col lg:flex-row lg:space-x-10 sm:mx-10 md:mx-10 mx-4 py-3">
              <div class="w-full lg:w-auto pt-2">
                <label class="font-semibold" for="salutation">Salutation</label>&nbsp; &nbsp;
                <div class="">
                  <select class="w-full md:w-[130px] py-[7px] border-1 mt-3 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" style="border: 1px solid gray;" name="salutation" id="salutation" value="{{ old('salutation') }}" placeholder="Ms.">
                    <option value="-">N/A</option></option>
                    <option value="Ms." {{ old('salutation') == 'Ms.' ? 'selected' : '' }}>Ms.</option>
                    <option value="Mrs." {{ old('salutation') == 'Mrs.' ? 'selected' : '' }}>Mrs.</option>
                    <option value="Mr." {{ old('salutation') == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                  </select>   
                </div>
              </div>
              <div class="w-full lg:w-1/2 pt-2">
                <label class="font-semibold" for="fullname">Full Name&nbsp;<span class="text-red-700 font-bold">*</span></label>
                <div class=" ">
                  <input type="text" class="w-full py-[7px] border-1 mt-3 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" style="border: 1px solid gray;" name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="First Name" required>  
                </div>
              </div>
              <div class="w-full lg:w-1/2 pt-2">
                <label class="" for="last_name"></label>
                <div class=" ">
                  <input type="text" class="w-full py-[7px] border-1 mt-3 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" style="border: 1px solid gray;" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required>  
                </div>
              </div>
            </div>

            <div class="mx-4 sm:mx-10 ">                                
              <label class="font-semibold" for="companyName">Company Name</label>
              <input type="text" name="company_name" id="company_name" class="w-full mt-3 py-[7px] border-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
               style="border: 1px solid gray;">
            </div>
  
            <div class="mx-4 sm:mx-10">
              <label class="font-semibold" for="Address">Address&nbsp;<span class="text-red-700 font-bold ">*</label>
              <input type="text" name="address" id="address" value="{{ old('address') }}" placeholder="Address" class="w-full
              py-[7px] mt-3 border-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" style="border: 1px solid gray;" required>                              
            </div>
  
            <div class="mx-4 sm:mx-10">
              <label class="font-semibold" for="address">Phone Number&nbsp;<span class="text-red-700 font-bold">*</label><br>
              <input type="number"  name="phone_number" id="phone_number" value="{{ old('phone_number') }}" class="w-full mt-3 sm:w-[200px] py-[7px] border-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
              style="border: 1px solid gray;" placeholder="+63" required>                              
              <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
            </div>
            <div class="flex flex-col lg:flex-row lg:space-x-10 sm:mx-10 md:mx-10 mx-4 py-3">
              <div class="w-full lg:w-1/2 pt-2">
                <label class="font-semibold" for="email">Username&nbsp;<span class="text-red-700 font-bold">*</span></label>
                <div class=" ">
                  <input type="text" class="w-full py-[7px] border-1 mt-3 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" style="border: 1px solid gray;" name="email" id="email" placeholder="Email Address" required>  
                </div>
              </div>
              <div class="w-full lg:w-1/2 pt-2">
                <label class="font-semibold" for="password">Password&nbsp;<span class="text-red-700 font-bold">*</span></label>
                <div class=" ">
                  <input type="password" class="w-full py-[7px] border-1 mt-3 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" style="border: 1px solid gray;" name="password" id="password" placeholder="Password" required>  
                </div>
              </div>
            </div>

        </div>
      </div>
    </section>
      <section class="lg:container lg:mx-auto">
      <section class="">
        <div class="mt-5">
          <div class="mx-auto">
            <div class="bg-white rounded-lg shadow-md border-2 w-full">
              <div class="border-b-2 border-gray-300 px-4 py-3">
                <h3 class="text-lg sm:text-2xl font-bold">Payment Method</h3>
              </div>
              <div class="mx-4 sm:mx-10 md:mx-5 py-8">
                <div class="py-2">
                  <input class="mr-2" type="radio" name="payment_method" id="cash" value="Cash" required>
                  <label for="payment_method_cash">Cash</label>
                </div>
                <div class="py-2">
                  <input class="mr-2" type="radio" name="payment_method" id="department_charge"
                    value="Department Charge" required>
                  <label for="payment_method_department_charge">Department Charge</label>
                </div>
                <div class=" mx-[100px] bg-slate-300 border-1 border-gray-400  px-3 rounded-sm py-3"
                  id="department_charge_options" style="display:none">
                  <div class="py-2">
                    <input class="mr-2" type="radio" name="department" id="department_it"
                      value="School of Information Technology">
                    <label for="department_it">School of Information Technology</label>
                  </div>
                  <div class="py-2">
                    <input class="mr-2" type="radio" name="department" id="department_edu" value="School of Education">
                    <label for="department_edu">School of Education</label>
                  </div>
                  <div class="py-2">
                    <input class="mr-2" type="radio" name="department" id="department_bhmt"
                      value="School of Business and Hospitality and Tourism Management">
                    <label for="department_bhmt">School of Business and Hospitality and Tourism Management</label>
                  </div>
                  <div class="py-2">
                    <input class="mr-2" type="radio" name="department" id="department_acc"
                      value="School of Accountancy">
                    <label for="department_acc">School of Accountancy</label>
                  </div>
                  <div class="py-2">
                    <input class="mr-2" type="radio" name="department" id="department_eng"
                      value="School of Engineering and Architechture and Fine Arts">
                    <label for="department_eng">School of Engineering and Architechture and Fine Arts</label>
                  </div>
                  <div class="py-2">
                    <input class="mr-2" type="radio" name="department" id="department_lacj"
                      value="School of Liberal Arts and Criminal Justice">
                    <label for="department_lacj">School of Liberal Arts and Criminal Justice</label>
                  </div>
                </div>
              </div>
      </section>
      <section class="mb-10">
        <div class="flex justify-end mt-10">
          <button type="submit"
            class="text-white px-3 w-21 py-[10px] bg-[#E6AF2E] hover:bg-yellow-60 active:bg-yellow-800 rounded ">
            Save
          </button>
      </section>
    </form>
  </main>


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
  {{-- Public Js File --}}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('js/frontdeskReservation.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('#reservationform').submit(function() {
          var r = confirm("Are you sure you want to create this room reservation?");
          return r;
      });

      $(".daterangebook").change(function(){
        var withnull = 0;
        $("#room_no").empty();
        $("#room_no").append($("<option></option>").attr("value", "").text("---"));
        $("#room_type").val('').change();
        $("#guest_num").val('');

        $(".daterangebook").each(function(){
          if(!$(this).val()){
            withnull = 1;
          }
        });
        if(withnull == 0){
          $("#room_type").attr("disabled", false);
        } else {
          $("#room_type").attr("disabled", true);
        }
      })
      $('#room_type').on('change', function() {
        var roomType = $(this).val();
        var check_in_date = $("#check_in_date").val();
        var check_out_date = $("#check_out_date").val();

        $("#guest_num").val('');

        $.ajax({
          url: '{{ route("frontdesk.reservation.roomlist") }}',
          method: 'POST',
          data: {
            '_token': '{{ csrf_token() }}',
            'room_type': roomType,
            'check_in_date': check_in_date,
            'check_out_date': check_out_date
          },
          success: function(response) {
            var roomno = $("#room_no");
            roomno.empty();

            roomno.append($("<option></option>")
                .attr("value", "").text("---"));

            response.forEach((info) => {
              roomno.append($("<option></option>")
                .attr("value", info.id).text(info.room_number));
            })


          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
          }
        });
      });
      $('#room_no').on('change', function() {
        var roomNo = $(this).val();
        $.ajax({
          url: '{{ route("frontdesk.reservation.guestcount") }}',
          method: 'POST',
          data: {
            '_token': '{{ csrf_token() }}',
            'room_no': roomNo
          },
          success: function(response) {
            if (response.max_capacity) {
              $('#guest_num').val(response.max_capacity);
            } else {
              console.log("error getting room guest count")
            }
          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
          }
        });
      });
    });
    $(document).ready(function() {
      // Listen for changes in the payment method radio buttons
      $('input[name=payment_method]').change(function() {
        if ($(this).val() === 'Cash') {
          // If cash is selected, unselect the department charge and hide its options
          $('input[name=payment_method_dept]').prop('checked', false);
          $('#department_charge_options').fadeOut();
        } else if ($(this).val() === 'Department Charge') {
          // If department charge is selected, unselect the cash and show its options
          $('input[name=payment_method_cash]').prop('checked', false);
          $('#department_charge_options').fadeIn();
        }
      });
    });
  </script>
  <!-- Template Main JS File -->
  <script src="{{ asset('template/assets/js/main.js') }}"></script>
  
  
</body>

</html>