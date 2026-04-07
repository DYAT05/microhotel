<!DOCTYPE html>
<html lang="en">
@php
  use Illuminate\Support\Facades\DB;
@endphp

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

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

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
        <a class="nav-link nav-link-icon" href="{{ route('admin.room.index') }}">
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

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Manage Rooms</h1><br>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Manage Rooms</li><br>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

          <div class="d-flex justify-content-between mb-3">
            <!-- <div class="ml-auto">
                <a class="btn btn-primary" onclick="openModal()">Add New</a>
            </div> -->
            <!-- Button trigger modal -->
            <div class="ml-auto">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fa-solid fa-plus"></i>&nbsp Add New</button>
            </div>
          </div>


          <hr style="border-top: 2px solid #3C4048;position: relative; left: 8px;">

          <!-- Modal -->
          <div class="modal fade" id="exampleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color: #55afab">Add New Room</h4>
                <button type="button"  style="color: #E21818; font-size: 25px;" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.room.store') }}" method="POST" id="addnewroomform" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-2 font-semibold">
                        <label>Room Number</label>
                        <input class="form-control" type="number" name="room_number" placeholder="Enter Room Number">
                        <x-input-error :messages="$errors->get('room_number')"/>
                    </div>
                    <div class="form-group mb-2 font-semibold">
                        <label>Room Type</label>
                        <!-- <input class="form-control" type="text" name="room_type" placeholder="Enter Room Type"> -->
                        <select class="form-control" name="room_type">
                          @foreach($roomtypes as $roomtype)
                            <option value="{{ $roomtype->name }}">{{ $roomtype->name }}</option>
                          @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('room_type')"/>
                    </div>
                    <div class="form-group mb-2 font-semibold">
                        <label>Description</label>
                        <input class="form-control" type="text" name="room_description" placeholder="Enter Description">
                        <x-input-error :messages="$errors->get('room_description')"/>
                    </div>
                    <div class="form-group mb-2 font-semibold">
                        <label>Maximum Room Capacity</label>
                        <input class="form-control" type="number" name="max_capacity"  placeholder="Enter Maximum Capacity">
                        <x-input-error :messages="$errors->get('max_capacity')"/>
                    </div>
                    <div class="form-group mb-2 font-semibold">
                        <label>Amenities</label>
                        <div class="form-group mb-2 font-semibold ">
                          <input type="checkbox" value="TV" name="amenities[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                          <label for="link-checkbox" class="ml-2 text-sm font-normal text-black">TV</label>
                        </div>
                        <div class="form-group mb-2 font-semibold ">
                          <input type="checkbox" value="Wifi" name="amenities[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                          <label for="link-checkbox" class="ml-2 text-sm font-normal text-black">Wifi</label>
                        </div>
                        <div class="form-group mb-2 font-semibold ">
                          <input type="checkbox" value="Aircon" name="amenities[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                          <label for="link-checkbox" class="ml-2 text-sm font-normal text-black">Aircon</label>
                        </div>
                        <div class="form-group mb-2 font-semibold ">
                          <input type="checkbox" value="Complimentary water" name="amenities[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                          <label for="link-checkbox" class="ml-2 text-sm font-normal text-black">Complimentary water</label>
                        </div>
                        <div class="form-group mb-2 font-semibold ">
                          <input type="checkbox" value="Hairdryer" name="amenities[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                          <label for="link-checkbox" class="ml-2 text-sm font-normal text-black">Hairdryer</label>
                        </div>
                        <div class="form-group mb-2 font-semibold ">
                          <input type="checkbox" value="Towels" name="amenities[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                          <label for="link-checkbox" class="ml-2 text-sm font-normal text-black">Towels</label>
                        </div>
                        <input class="form-control" type="text" name="otheramenities"  placeholder="Enter Other Amenities separated by comma">
                        <x-input-error :messages="$errors->get('amenities')"/>
                    </div>
                    <div class="form-group mb-2 font-semibold">
                        <label>Status</label>
                        <!-- <input class="form-control" type="text" name="status"  placeholder="Enter Status"> -->
                        <select class="form-control" name="status">
                            <option value="Available">Available</option>
                            <option value="For Maintenance">For Maintenace</option>
                        </select>
                        <x-input-error :messages="$errors->get('status')"/>
                        
                    </div>
                    <div class="form-group mb-2 font-semibold ">
                        <label>Rate</label>
                        <input class="form-control" type="number" name="rate"  placeholder="Enter Rate">
                        <x-input-error :messages="$errors->get('rate')"/>
                    </div>
                    <div class="form-group font-semibold" >
														<label for="image" class="col-form-label" >Image:</label>
                            <p>(png/jpeg)</p>
														<input type="file" name="photos" class="form-control" id="photos" accept="image/png, image/gif, image/jpeg">
												
                        <x-input-error :messages="$errors->get('photos')"/>
                    </div>
                    <button type="submit" style="position: relative; left: 400px;" class="btn btn-primary">Save</button>
                    <button type="reset" style="position: relative; left: 260px; background-color: #7c7c7c; border: none;" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                </form>
            </div>
    </div>
    </div>
</div>
          <!-- <div class="alert alert-success" role="alert">
            The record has been successfully added.
          </div> -->
          {{-- @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
              <p>{{ $message }}</p>
            </div>
          @endif --}}
          @if(count($errors) > 0)

          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
          @endif

          @if(\Session::has('success'))
            <div class="alert alert-success">
              <p>{{ \Session::get('success') }}</p>
            </div>
          @endif

            <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <div class="d-flex justify-content-between mb-3">
              
            </div>
          </div><!-- End Left side columns -->
            <!-- <div class="ml-auto">
                <form action="{{ route('admin.room.create') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div> -->
          </div>
<br>
            <table id="datatable" class="table table-condensed table-sm table-bordered">   
                <thead class="bg-[#51bdb8] text-white">   
                    <tr style="text-align:center">   
                        <th scope="col" style="text-align:center" >Room No.</th>
                        <th scope="col" style="text-align:center" >Room Type</th>
                        <th scope="col" style="text-align:center">Description</th>
                        <th scope="col" style="text-align:center">Maximum Room Capacity</th>
                        <th scope="col" style="text-align:center">Amenities</th>
                        <th scope="col" style="text-align:center">Status</th>
                        <th scope="col" style="text-align:center">Rate</th>
                        <th scope="col" style="text-align:center" style="text-align:center">Photos</th>
                        <th scope="col"  style="text-align:center; width: 5px;">Action</th>
                    </tr>   
                </thead>   
                <tbody>   
                  @foreach($rooms as $roomData)
                    @php
                      $selectitems = array('TV', 'Wifi', 'Aircon', 'Complimentary water', 'Hairdryer', 'Towels');
                      $listamenities = DB::table('room_amenities')->where('room_id', $roomData->id)->pluck('name')->toArray();
                      $showamenities = implode(', ', $listamenities);
                      
                      $inputamenities = array_diff($listamenities, $selectitems);
                      
                      $showamenitiesinput = implode(',', $inputamenities);

                    @endphp
                    <tr style="text-align:center">
                        <td>{{ $roomData-> room_number }}</td>
                        <td>{{ $roomData-> room_type }}</td>
                        <td>{{ substr($roomData->room_description, 0, 50) }}...</td>
                        <td>{{ $roomData-> max_capacity }}</td>
                        <td>{{ $showamenities }}</td>
                        <td>{{ $roomData-> status }}</td>
                        <td>{{ $roomData-> rate }}</td>
                        <td>
                          <img src="{{ asset('uploads/rooms/' . $roomData->photos) }}" alt="Room" width="70px" height="70px">                
                        </td>
                        <td style="width: 150px;">

                          <button type="button" class="btn btn-primary" style="position:relative;left:5px; top: 5px;" data-bs-toggle="modal" data-bs-target="#editModal{{ $roomData->id }}">
                          <i class="fa-regular fa-pen-to-square"></i>
                          </button>
                          
                          <button type="button" class="btn btn-danger" style="position:relative;left: 5px; top: 5px;" data-bs-toggle="modal" data-bs-target="#delete{{ $roomData->id }}">
                          <i class="fa-solid fa-trash"></i>
                          </button>
                        </td>
                        <!-- Start Edit Modal -->
                        <div class="modal fade" id="editModal{{ $roomData->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel" style="color: #55afab">Edit Room Details</h5>
                                <button type="button"  style="color: #E21818; font-size: 25px;" data-bs-dismiss="modal">&times;</button>
                                </button>
                              </div>
                              <form action="{{ route('admin.room.update',  $roomData->id) }}" method="POST" class="editroomform" id="editForm" enctype="multipart/form-data">
                                @csrf
                                @method('POST')


                                <div class="modal-body">
                                    <div class="form-group font-semibold">
                                        <label>Room Number</label>
                                        <input class="form-control" type="number" name="room_number" id="room_number" value="{{ $roomData-> room_number }}" placeholder="Enter Room Number" >
                                        <x-input-error :messages="$errors->get('room_number')" />
                                    </div>

                                    <div class="form-group font-semibold">
                                        <label>Room Type</label>
                                        <!-- <input class="form-control" type="text" name="room_type" id="room_type" value="{{ $roomData-> room_type }}" placeholder="Enter Room Type"> -->
                                        <select class="form-control" name="room_type">
                                          @foreach($roomtypes as $roomtype)
                                            <option value="{{ $roomtype->name }}" {{ ($roomData->room_type == $roomtype->name) ? 'selected' : '' }}>{{ $roomtype->name }}</option>
                                          @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('room_type')" />
                                    </div>

                                    <div class="form-group font-semibold">
                                        <label>Description</label>
                                        <input class="form-control" type="text" name="room_description" id="room_description" value="{{ $roomData-> room_description }}" placeholder="Enter Description">
                                        <x-input-error :messages="$errors->get('room_description')" />
                                    </div>

                                    <div class="form-group font-semibold">
                                        <label>Maximum Room Capacity</label>
                                        <input class="form-control" type="number" name="max_capacity" value="{{ $roomData-> max_capacity }}" id="max_capacity" placeholder="Enter Maximum Room Capacity">
                                        <x-input-error :messages="$errors->get('max_capacity')" />
                                    </div>

                                    <div class="form-group font-semibold">
                                      <label>Amenities</label>
                                      
                                      <div class="form-group mb-2 font-semibold ">
                                        <input type="checkbox" value="TV" name="amenities[]" {{ (in_array('TV', $listamenities)) ? 'checked' : ''}} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="link-checkbox" class="ml-2 text-sm font-normal text-black">TV</label>
                                      </div>
                                      <div class="form-group mb-2 font-semibold ">
                                        <input type="checkbox" value="Wifi" name="amenities[]" {{ (in_array('Wifi', $listamenities)) ? 'checked' : ''}} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="link-checkbox" class="ml-2 text-sm font-normal text-black">Wifi</label>
                                      </div>
                                      <div class="form-group mb-2 font-semibold ">
                                        <input type="checkbox" value="Aircon" name="amenities[]" {{ (in_array('Aircon', $listamenities)) ? 'checked' : ''}} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="link-checkbox" class="ml-2 text-sm font-normal text-black">Aircon</label>
                                      </div>
                                      <div class="form-group mb-2 font-semibold ">
                                        <input type="checkbox" value="Complimentary water" name="amenities[]" {{ (in_array('Complimentary water', $listamenities)) ? 'checked' : ''}} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="link-checkbox" class="ml-2 text-sm font-normal text-black">Complimentary water</label>
                                      </div>
                                      <div class="form-group mb-2 font-semibold ">
                                        <input type="checkbox" value="Hairdryer" name="amenities[]" {{ (in_array('Hairdryer', $listamenities)) ? 'checked' : ''}} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="link-checkbox" class="ml-2 text-sm font-normal text-black">Hairdryer</label>
                                      </div>
                                      <div class="form-group mb-2 font-semibold ">
                                        <input type="checkbox" value="Towels" name="amenities[]" {{ (in_array('Towels', $listamenities)) ? 'checked' : ''}} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="link-checkbox" class="ml-2 text-sm font-normal text-black">Towels</label>
                                      </div>
                                      <input class="form-control" type="text" name="otheramenities" value="{{$showamenitiesinput}}" placeholder="Enter Other Amenities separated by comma">
                                        <!-- <input class="form-control" type="text" name="amenities" id="amenities" value="{{ $roomData-> amenities }}" placeholder="Enter Amenities">
                                        <x-input-error :messages="$errors->get('amenities')" /> -->
                                    </div>
                              

                                    <div class="form-group font-semibold">
                                        <label>Status</label>
                                        <!-- <input class="form-control" type="text" name="status" id="status" value="{{ $roomData-> status }}" placeholder="Enter Room Status"> -->
                                        <select class="form-control" name="status">
                                          <option value="Available" {{ ($roomData->status =="Available") ? 'selected' : '' }}>Available</option>
                                          <option value="For Maintenance" {{ ($roomData->status =="For Maintenance") ? 'selected' : '' }}>For Maintenace</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('status')" />
                                    </div>

                                    <div class="form-group font-semibold">
                                        <label>Rate</label>
                                        <input class="form-control" type="text" name="rate" id="rate" value="{{ $roomData-> rate }}" placeholder="Enter Room Rate">
                                        <x-input-error :messages="$errors->get('rate')" />
                                    </div>

                                    <div class="form-group font-semibold">
                                        <label>Photos</label>
                                        <p>(png/jpg/jpeg)</p>
                                        <input type="file" name="photos" class="form-control" id="photos" accept="image/png, image/gif, image/jpeg">
                                        <img src="{{ asset('uploads/rooms/' . $roomData->photos) }}" alt="Room" width="70px" height="70px">
                                        <x-input-error :messages="$errors->get('photos')" />
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        {{-- End Edit Modal --}}
  
                        <!-- Delete Product Modal -->
                        <div class="modal fade" id="delete{{ $roomData->id }}" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteProductModalLabel" style="color: #51bdb8;">Delete Room</h5>
                                        <button type="button" style="color: #E21818; font-size: 25px;" data-bs-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this room?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <form id="deleteProductForm" action="{{ route('admin.room.destroy',  $roomData->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>            
                        {{-- End Delete Modal --}}

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

  <!-- Template Main JS File -->
  <script src="{{ asset('template/assets/js/main.js') }}"></script>

  <!-- JavaScript code to show the modal for deleting a product -->
  <script>
    function editRoom(id) {
        $('#editModal').modal('show');
        $('#editForm').attr('action', '/room/' + id);
    }
  </script>

  <!-- JavaScript code to show the modal for deleting a product -->
<script>
    function deleteProduct(id) {
        $('#delete').modal('show');
        $('#deleteProductForm').attr('action', '/room/' + id);
    }
</script>

  <script>
  $(document).ready(function() {
    $('#addnewroomform').submit(function() {
        var ra = confirm("Are you sure you want to add new room?");
        return ra;
    });
    
    $('.editroomform').submit(function() {
        var re = confirm("Are you sure you want to edit this room?");
        return re;
    });

    $('#saveButton').click(function() {
      var recordId = $('#exampleModal').data('id');
      var updatedValue = $('#updatedValue').val();
      
      $.ajax({
        type: 'PUT',
        url: '/records/' + recordId,
        data: {
          _token: '{{ csrf_token() }}',
          value: updatedValue
        },
        success: function(data) {
          // Handle success response
          $('#exampleModal').modal('hide');
          location.reload();
        },
        error: function() {
          // Handle error response
        }
      });
    });
  });
</script>

  {{-- Jquery --}}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

</html>