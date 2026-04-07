<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    
  <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js'></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/searchbar.css') }}">
    <title>Landing Page</title>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
<nav class="relative bg-[#55AFAB] h-[75px]">
    <div class="flex justify-between h-16">
        <div class="flex">
            <div class="flex items-center justify-between mx-[40px]">
                <!-- Logo -->
                <div class="flex flex-row justify-center items-center ">
                    <img src="./images/logom2.png" class="h-[50px] pr-5">
                        <div class="hidden md:block">
                            <h1 class="font-semibold">MICROHOTEL</h1>
                            <p class="text-sm">Divine Word College of Calapan</p>
                        </div>
                    </div>
                    {{-- <div class="px-4">
                <h1>Search bar</h1>
            </div> --}}
                    {{-- <div class="search-box">
                <input type="text" placeholder="Type to search..."/>
                <div class="search-btn">
                  <i class="fas fa-search"></i>
                </div>
                
                <div class="cancel-btn">
                  <i class="fas fa-times"></i>
                </div>
              </div>> --}}
                </div>
            </div>
        </div>
    </nav>
    {{-- @include('layouts.navigation') --}}

    <div class="bg-cover bg-center h-[500px] max-w-full" style="background-image: url({{ asset('./images/roomtype.jpg') }});">
        <nav class="container bg-[#82e9e4] max-w-full px-3 h-[50px]">
            <!-- Flex container -->
        <div class="flex items-center justify-between mx-[45px]">
            <!-- Logo -->
            <div class="flex flex-row justify-center items-center">
                <img src="./images/bsba.png" class="h-[50px]">
                <div class="hidden md:block">
                    <p class="text-sm">School of Business Hospitality<br> and Tourism Management</p>
                </div>
            </div>

            <div class="hidden md:flex space-x-10 items-center">
                <a href="/" class="hover:text-[#E0C822] hover:font-medium">Home</a>
                <a href="/faq" target="_blank" class="hover:text-[#E0C822] hover:font-medium">FAQs</a>
                <a href="userGuest/contact" class="hover:text-[#E0C822] hover:font-medium">Contact</a>
                
            @if (Route::has('login')) 
                @auth
                <a href="{{ route('login') }}"
                class="bg-[#E6AF2E]   hover:bg-yellow-600 text-white rounded w-21 py-2 px-2 cursor-pointer">Book Now</a>
                @else
                <a href="{{ route('login') }}"
                class="bg-[#E6AF2E]   hover:bg-yellow-600 text-white rounded w-21 py-2 px-2 cursor-pointer">Book Now</a>
                @endauth  
            @endif  
            </div> 
        </div>   
    </nav>

    {{-- Content -----------------------------------------------------------------------}}
        <div class="flex justify-center items-center mt-[150px] mb-[20px] ">
            <h1 class="text-white text-[45px] font-bold ">SPEND YOUR BEAUTIFUL MOMENTS </h1>
        </div>
{{-------Calendar  -------------------------------}}
       
    <div class="bg-white w-[880px] flex item-center space-x-7 mx-auto px-10 rounded">
                
            </div>
            
        </div>
 <!-- Room Details -->
        <div class="row">
            <h1 class="text-[40px] font-bold text-center">Welcome to DWCC Microhotel</h1>
            <div class="max-w-[1240px] mx-auto py-16 px-4 grid lg:grid-cols-4 gap-8">
                <div>
                    <div>
                        <img src="./uploads/dashboard/{{$image1}}" class="h-[400px]" alt="">
                    </div>
                </div>
                <div>
                    <div>
                        <img src="./uploads/dashboard/{{$image2}}" class="h-[400px]" alt="">
                    </div>
                </div>
                <div>
                    <div>
                        <img src="./uploads/dashboard/{{$image3}}" class="h-[400px]" alt="">
                    </div>
                </div>
                <div>
                    <div>
                        <img src="./uploads/dashboard/{{$image4}}" class="h-[400px]" alt="">
                    </div>
                </div>
            </div>
            <div class="max-w-[1240px] mx-auto py-16 px-4 gap-8">
                <p style="white-space: pre-line" class="text-[20px] font-bold text-center">{{$contents}}</p>
            </div>
        </div>

            {{-- CALENDAR --}}
    
    <!-- Footer------------------------------------------------------------------------------------------------ -->
    <footer class="bg-[#a2eeea] mt-[150px]">
        <div class="max-w-[1240px] mx-auto py-16 px-4 grid lg:grid-cols-4 gap-8">
            <!-- Logo -->
            <div class="flex flex-col items-center justify-between space-y-12
            md:flex-col md:space-y-0 md:items-start">
                <!-- Logo -->
                <div>
                    <img src="./images/logom2.png" class="h-[100px]" alt="">
                </div>
            </div>

            <div class="">
                <h1 class="font-bold text-lg w-full">MICROHOTEL</h1>
                <p class="text-sm text-gray-900">The DWCC Microhotel is a school-run hotel located inside the Divine Word College of Calapan.</p>
            </div>

            <div class="">
                <h1 class="font-bold text-lg">Contact Us</h1>
                    <p class="text-sm text-gray-900">Gov Infantado St, Calapan City, Oriental Mindoro</p>
                    <p class="text-sm text-gray-900">microhotel@dwcc.edu.ph</p>
                    <p class="text-sm text-gray-900">09123456789</p>
            </div>

            <div class="flex flex-col items-center justify-between space-y-12
            md:flex-col md:space-y-0 md:items-start">
                <!-- Logo -->
                <div>
                    <img src="./images/DWCCLOGO.png" class="h-[100px]" alt="">
                </div>
            </div>
        </div>

        <div class="bg-[#55AFAB] flex justify-center">
            <p class="text-sm">Copyright &copy; 2023 DWCC MicroHotel</p>
        </div>
        </footer>   

         <script>
           $(document).ready(function() {
                $("#datepicker").datepicker();
                minDate: 0;
            });

        <script>
</body>
<script src="{{url('js/searhbar.js')}}"></script>
</html>