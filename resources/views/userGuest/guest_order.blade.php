<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')

    <!-- Logo -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/sitelogo.png">
    
  <title>Order</title>
  
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
</head>
<body style="background-color: #ffffff;">
  <!-- Navbar -->
  <x-app-layout>
    <div class="bg-cover bg-center h-[350px] max-w-full"
      style="background-image: url({{ asset('./images/roomtype.jpg') }});">
      <!-- Navbar -->
      <nav class="container bg-[#82e9e4] max-w-full px-3 h-[50px]">
        <!-- Flex container -->
        <div class="flex items-center justify-between mx-[40px]">
          <!-- Logo -->
          <div class="flex flex-row justify-center items-center">
            <img src="{{ asset('./images/bsba.png')}}" class="h-[50px]">
            <div class="hidden md:block">
              <p class="text-sm">School of Business Hospitality<br> and Tourism Management</p>
            </div>
          </div>

          <div class="hidden md:flex space-x-6 items-center ">
            <a href="/" class="hover:text-[#E0C822] hover:font-medium">Home</a>
            <a href="/userGuest/order-dashboard" class="hover:text-[#E0C822] hover:font-medium">Order</a>
            <a href="/userGuest/cart" class="hover:text-[#E0C822] hover:font-medium">My Cart</a>
            <a href="/faq" class="hover:text-[#E0C822] hover:font-medium">FAQs</a>
            <a href="/userGuest/contact" class="hover:text-[#E0C822] hover:font-medium">Contact</a>
          </div>
        </div>
      </nav>
      <div class="flex justify-center items-center">
        <h1 class="text-white font-bold text-[80px] my-[50px]">Orders List</h1>
      </div>
    </div>
  

    <section class="container w-[85%] sm:w-[85%] lg:w-[85%] md:w-[85%] mx-auto mt-10 bg" id="scroll-section">
      <h2 class="text-2xl font-bold mb-5">Menu</h2>
      <hr style="border: 2px solid #E6AF2E; width: 70px;  position: relative; left: -2px; top: -20px; ">
      <div class="hidden md:flex space-x-6 items-center ">
            <div class="vr"></div>
            @foreach ($categories as $category)
            <a href="/userGuest/order/{{$category->id}}" class="hover:text-[#E0C822] hover:font-medium">{{$category->category_name}}</a>
            <div class="vr"></div>
            @endforeach
      </div>
      <div class="flex flex-wrap justify-center p-10 rounded-lg bg-gray-200 ">
        @foreach ($menu as $item)

        <div class="w-[300px] m-1">
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
                <button type="button" data-toggle="modal" data-target="#addQuantityModal_{{$item->id}}" name="menu_id_" value="pancake"
                  class="inline-flex items-center bg-[#E6AF2E] hover:bg-yellow-600 text-black active:bg-yellow-800 font-semibold text-sm px-3 w-21 py-[10px] rounded shadow hover:shadow-lg outline-none focus:outline-none  ease-linear transition-all duration-150">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16"> <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/> </svg>&nbsp; Add to Cart
                </button>
              </div>
            </div>
          </div>
        </div>
        
        <div class="modal fade" id="addQuantityModal_{{$item->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" style="color: #55afab">Add to Cart - {{$item->menu_name}}</h4>
                <button type="button"  style="color: #E21818; font-size: 25px;" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form action="{{ route('save.order.cart') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group mb-2 font-semibold ">
                      <label>Quantity</label>
                      <input class="form-control" type="hidden" name="category_id" value="{{$cur_category->id}}">
                      <input class="form-control" type="hidden" name="menu_id" value="{{$item->id}}" required>
                      <input class="form-control" type="number" name="quantity"  placeholder="Enter Quantity" required min="0">
                      <x-input-error :messages="$errors->get('quantity')"/>
                  </div>
                  <button type="submit" style="position: relative; left: 400px;  background-color: #007bff; border: none;" class="btn btn-primary">Save</button>
                  <button type="reset" style="position: relative; left: 260px; background-color: #7c7c7c; border: none;" class="btn btn-primary">Cancel</button>
                </form>
              </div>
            </div>
          </div>
        </div>
          
        @endforeach
      </div>
    </section>
  </x-app-layout>
  
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