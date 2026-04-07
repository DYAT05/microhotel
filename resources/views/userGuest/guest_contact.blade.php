<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')

    <!-- Logo -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/sitelogo.png">
    
  <title>Reserve Dates</title>

  <style>
    /* Darker background on mouse-over */
    html {
    scroll-behavior: smooth;
  } 
    button[disabled] {
      background-color: gray;
      cursor: not-allowed;
    }

    button[disabled]:hover {
      background-color: gray;
    }
  </style>
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
            @if($is_checkedin == "1")
              <a href="userGuest/order-dashboard" class="hover:text-[#E0C822] hover:font-medium">Order</a>
              <a href="/userGuest/cart" class="hover:text-[#E0C822] hover:font-medium">My Cart</a>
            @else
              <a href="#" class="hover:text-[#E0C822] hover:font-medium">Order</a>
              <a href="#" class="hover:text-[#E0C822] hover:font-medium">My Cart</a>
            @endif
            <a href="/faq" target="_blank" class="hover:text-[#E0C822] hover:font-medium">FAQs</a>
            <a href="/userGuest/contact" class="hover:text-[#E0C822] hover:font-medium">Contact</a>
          </div>
        </div>
      </nav>
    </div>
    <!-- Rooms -->
    <section class="container w-[85%] md:w-[85%] lg:w-[85%] mx-auto mt-10">
      <h2 class="text-2xl font-bold mb-5">Contact Form</h2>
      <hr style="border: 2px solid #E6AF2E; width: 160px;  position: relative; left: -2px; top: -20px; ">
      <div class="w-full flex flex-col bg-gray-200 rounded-lg p-5">
        <div class="md:flex-row justify-center">
            
            <form action="{{ route('guest.submit.feedback') }}" method="POST" id="submitFeedbackForm" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="py-2">
                        <span class="mb-2 text-sm font-semibold">Name:<span
                            class="text-red-500 text-sm ">*</span></span>
                        <input type="text" name="name" required autofocus id="name"
                        class="w-full p-1 border border-gray-300 rounded-md placeholder:font:light placeholder:text-gray-500 placeholder:text-sm py-1"
                        placeholder="Enter your name" value="{{ Auth::guard('web')->user()->name }}">
                    </div>
                    <div class="py-2">
                        <span class="mb-2 text-sm font-semibold">Email Address:<span
                            class="text-red-500 text-sm ">*</span></span>
                        <input type="email" name="email" required autofocus id="email"
                        class="w-full p-1 border border-gray-300 rounded-md placeholder:font:light placeholder:text-gray-500 placeholder:text-sm py-1"
                        placeholder="Enter your email address" value="{{ Auth::guard('web')->user()->email }}">
                    </div>
                    <div class="py-2">
                        <span class="mb-2 text-sm font-semibold">Company:<span
                            class="text-red-500 text-sm ">*</span></span>
                        <input type="text" name="company" required autofocus id="company"
                        class="w-full p-1 border border-gray-300 rounded-md placeholder:font:light placeholder:text-gray-500 placeholder:text-sm py-1"
                        placeholder="Enter your company name">
                    </div>
                    <div class="py-2">
                        <span class="mb-2 text-sm font-semibold">Mobile/ Phone Number:<span
                            class="text-red-500 text-sm ">*</span></span>
                        <input type="text" name="mobilenumber" required autofocus id="mobilenumber"
                        class="w-full p-1 border border-gray-300 rounded-md placeholder:font:light placeholder:text-gray-500 placeholder:text-sm py-1"
                        placeholder="Enter your mobile/ phone number">
                    </div>
                    <div class="py-2">
                        <span class="mb-2 text-sm font-semibold">Message:<span class="text-red-500 text-sm ">*</span></span><br>
                        <textarea class="w-full p-1 border border-gray-300 rounded-md placeholder:font:light placeholder:text-gray-500 placeholder:text-sm py-1" type="text" name="message" id="message" required placeholder="Enter your message"></textarea>
                    </div>
                    
                    <button 
                    class="text-white bg-[#E6AF2E] hover:bg-yellow-600 active:bg-yellow-800 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                    type="submit" required>Submit Feedback</button>
                </div>
            </form>
        </div>
      </div>
    </section>
  </x-app-layout>
</body>

</html>