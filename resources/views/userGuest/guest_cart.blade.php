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
            <a href="/faq" target="_blank" class="hover:text-[#E0C822] hover:font-medium">FAQs</a>
            <a href="/userGuest/contact" class="hover:text-[#E0C822] hover:font-medium">Contact</a>
          </div>
        </div>
      </nav>
      <div class="flex justify-center items-center">
        <h1 class="text-white font-bold text-[80px] my-[50px]">Cart List</h1>
      </div>
    </div>
  

    <section class="container w-[85%] sm:w-[85%] lg:w-[85%] md:w-[85%] mx-auto mt-10 bg" id="scroll-section">
        <h2 class="text-2xl font-bold mb-5">My Items</h2>
      
        <div class="w-full flex flex-col bg-gray-200 rounded-lg p-5">
            <div class="md:flex-row justify-center">
                <div class="w-full px-10 mx-auto">
                    <table id="datatable" class="table table-condensed table-sm table-bordered">
                        <thead class="bg-[#51bdb8] text-white">
                            <tr style="text-align:center">
                                <th scope="col"  style="text-align:center">No.</th>
                                <th scope="col" style="text-align:center">Item Name</th>
                                <th scope="col" style="text-align:center">Category</th>
                                <th scope="col" style="text-align:center">Quantity</th>
                                <th scope="col" style="text-align:center">Price</th>
                                <th scope="col" style="text-align:center">Total Amount</th>
                                <th scope="col" style="text-align:center">Action</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                    
                            @foreach($items as $index => $item)
                            <tr style="text-align:center">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->menu_name }}</td>
                                <td>{{ $item->category_name }}</td>
                                <td>{{ number_format($item->quantity) }}</td>
                                <td>P {{ number_format($item->price, 2) }}</td>
                                <td>P {{ number_format(($item->price * $item->quantity), 2) }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-danger item-action" attr-qty="{{$item->quantity}}" item-mode="subract" menu-id="{{ $item->id }}" style="background-color: #c82333; border: none;">-</button>
                                    <button type="button" class="btn btn-sm btn-success item-action" item-mode="add" menu-id="{{ $item->id }}" style="background-color: #146c43; border: none;">+</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    @if(count($items) > 0)
                        <button type="button" id="checkoutbtn" style="float: right; background-color: #007bff; border: none;" class="btn btn-primary">Checkout Orders</button>
                    @endif
                </div>
            </div>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('template/assets/js/main.js') }}"></script>

    <script>
        $(document).ready(function(){
            $(".item-action").click(function(){
                var currentqty = $(this).attr('attr-qty');
                var getcaritemid = $(this).attr('menu-id');
                var getmode = $(this).attr('item-mode');

                if(currentqty == 1){
                  if(confirm('Current quantity is set to 1. This will remove the item on the list. Do you wish to proceed?')){
                    $.ajax({
                        type: 'POST',
                        url: '/userGuest/cart-update/' + getcaritemid,
                        data: {
                        _token: '{{ csrf_token() }}',
                        value: getmode
                        },
                        success: function(data) {
                        // Handle success response
                        location.reload();
                        },
                        error: function() {
                        // Handle error response
                        }
                    });
                  }
                } else {
                  $.ajax({
                      type: 'POST',
                      url: '/userGuest/cart-update/' + getcaritemid,
                      data: {
                      _token: '{{ csrf_token() }}',
                      value: getmode
                      },
                      success: function(data) {
                      // Handle success response
                      location.reload();
                      },
                      error: function() {
                      // Handle error response
                      }
                  });
                }
            });

            $("#checkoutbtn").click(function(){
                if(confirm("Are you sure you want to checkout your order(s)?")){
                  $.ajax({
                      type: 'POST',
                      url: '/userGuest/checkout',
                      data: {
                      _token: '{{ csrf_token() }}',
                      },
                      success: function(data) {
                      // Handle success response
                          location.reload();
                      },
                      error: function() {
                      // Handle error response
                      }
                  });
                }
            })
        });
    </script>
</body>

</html>