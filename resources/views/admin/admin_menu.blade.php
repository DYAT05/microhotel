<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')


      <!-- Logo -->
 <link rel="icon" type="image/png" sizes="16x16" href="../images/sitelogo.png">

  <title>Menu Maintenance</title>
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
        <a class="nav-link dropdown-toggle" href="#" id="accounts-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
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
      <h1>{{$cur_category->category_name}}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Menu</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="hidden md:flex space-x-6 items-center ">
              <div class="vr"></div>
              @foreach ($categories as $category)
              <a href="/admin/menu-list/{{$category->id}}" class="hover:text-[#E0C822] hover:font-medium">{{$category->category_name}}</a>
              <div class="vr"></div>
              @endforeach
              <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#addCategoryModal"><i class="fa-solid fa-plus"></i>&nbsp;Add new category</button>
          </div>
          <div class="flex flex-wrap p-10 rounded-lg bg-gray-200 ">
            <div class="row col-md-12">

              <div class="d-flex justify-content-between mb-3">
                <div class="ml-auto">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMenuModal">
                    <i class="fa-solid fa-plus"></i>&nbsp; Add New Item</button>
                </div>
              </div>
            </div>

            <div class="modal fade" id="addCategoryModal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" style="color: #55afab">Add New Category</h4>
                    <button type="button"  style="color: #E21818; font-size: 25px;" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('admin.menucategories.store') }}" id="addnewcategory" method="POST" enctype="multipart/form-data">
                      @csrf

                      <div class="form-group mb-2 font-semibold">
                          <label>Category Name</label>
                          <input class="form-control" type="text" name="name" placeholder="Enter Category Name" required>
                          <x-input-error :messages="$errors->get('name')"/>
                      </div>
                      <button type="submit" style="position: relative; left: 400px;" class="btn btn-primary">Save</button>
                      <button type="reset" style="position: relative; left: 260px; background-color: #7c7c7c; border: none;" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="addMenuModal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" style="color: #55afab">Add New Item to {{$cur_category->category_name}}</h4>
                    <button type="button"  style="color: #E21818; font-size: 25px;" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('admin.menu.store') }}" id="addnewitem" method="POST" enctype="multipart/form-data">
                      @csrf

                      <div class="form-group mb-2 font-semibold">
                          <label>Item Name</label>
                          <input class="form-control" type="hidden" name="category_id" value="{{$cur_category->id}}">
                          <input class="form-control" type="text" name="menu_name" placeholder="Enter Item Name" required>
                          <x-input-error :messages="$errors->get('menu_name')"/>
                      </div>
                      <div class="form-group mb-2 font-semibold ">
                          <label>Price</label>
                          <input class="form-control" type="number" name="price"  placeholder="Enter Price" required>
                          <x-input-error :messages="$errors->get('price')"/>
                      </div>
                      <div class="form-group font-semibold" >
                              <label for="image" class="col-form-label" >Image:</label>
                              <p>(png/jpeg)</p>
                              <input type="file" accept="image/*" name="photos" class="form-control" id="photos" required>
                          
                          <x-input-error :messages="$errors->get('photos')"/>
                      </div>
                      <button type="submit" style="position: relative; left: 400px;" class="btn btn-primary">Save</button>
                      <button type="reset" style="position: relative; left: 260px; background-color: #7c7c7c; border: none;" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex flex-wrap p-10 rounded-lg bg-gray-200 ">
              @foreach ($menu as $item)

              <div class="w-[250px] m-2">
                @csrf
                <div class="max-w-sm rounded-md overflow-hidden shadow-lg m-2 bg-white">
                  <img class="w-full" src="{{ asset('uploads/menu/'.$item->image) }}" alt="Image of {{$item->menu_name}}">
                    <div class="px-6 py-4">
                      <div>
                        <div class="text-black font-extrabold text-lg">{{$item->menu_name}}</div>
                        <p><strong style="color: #E6AF2E;">P{{number_format($item->price,2)}}</strong></p>
                      </div>
                    </div>
                    <div class="px-6 py-2 mb-3">
                      <div class="flex justify-end">
                        <button type="button" data-toggle="modal" data-target="#editMenuModal_{{$item->id}}" name="menu_id_" value="{{$item->id}}"
                          class="inline-flex items-center bg-[#E6AF2E] hover:bg-yellow-600 text-black active:bg-yellow-800 font-semibold text-sm px-3 w-21 py-[10px] rounded shadow hover:shadow-lg outline-none focus:outline-none  ease-linear transition-all duration-150">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"" />
                          </svg>&nbsp; Edit
                        </button>
                      </div>
                    </div>
                </div>
                <div class="modal fade" id="editMenuModal_{{$item->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" style="color: #55afab">Update {{$item->menu_name}}</h4>
                        <button type="button"  style="color: #E21818; font-size: 25px;" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('admin.menu.update', $item->id) }}" class="edititem" method="POST" enctype="multipart/form-data">
                          @csrf

                          <div class="form-group mb-2 font-semibold">
                              <label>Item Name</label>
                              <input class="form-control" type="hidden" name="category_id" value="{{$cur_category->id}}">
                              <input class="form-control" type="text" name="menu_name" placeholder="Enter Item Name" value="{{$item->menu_name}}" required>
                              <x-input-error :messages="$errors->get('menu_name')"/>
                          </div>
                          <div class="form-group mb-2 font-semibold ">
                              <label>Price</label>
                              <input class="form-control" type="number" name="price"  placeholder="Enter Price" value="{{$item->price}}" required>
                              <x-input-error :messages="$errors->get('price')"/>
                          </div>
                          <div class="form-group font-semibold" >
                                  <label for="image" class="col-form-label" >Image:</label>
                                  <p>(png/jpeg)</p>
                                  <input type="file" accept="image/*" name="photos" class="form-control" id="photos">
                              
                              <x-input-error :messages="$errors->get('photos')"/>
                          </div>
                          <div class="form-group mb-2 font-semibold ">
                              <input type="checkbox" value="ischecked" name="active" {{($item->active == 1) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                              <label for="link-checkbox" class="ml-2 text-sm font-normal text-black">Item Active</label>
                          </div>
                             
                          <button type="submit" style="position: relative; left: 400px;" class="btn btn-primary">Save</button>
                          <button type="button" data-dismiss="modal" style="position: relative; left: 260px; background-color: #7c7c7c; border: none;" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach

            </div>
          </div>
        </div>
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
  <script>
    
    $('#addnewitem').submit(function() {
        var ia = confirm("Are you sure you want to add new item?");
        return ia;
    });

    $('#addnewcategory').submit(function() {
        var ca = confirm("Are you sure you want to add new category?");
        return ca;
    });
    
    $('.edititem').submit(function() {
        var ie = confirm("Are you sure you want to edit this item?");
        return ie;
    });
  </script>
</body>

</html>