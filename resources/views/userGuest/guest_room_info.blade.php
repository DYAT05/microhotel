<!DOCTYPE html>
<html lang="en">
@php
  use Illuminate\Support\Facades\DB;
@endphp

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

 
  
    {{-- <link href="{{ asset('css/room_info.css') }}" rel="stylesheet"> --}}

    <script data-require="jquery@3.1.1" data-semver="3.1.1"
        src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

       <!-- Logo -->
       <link rel="icon" type="image/png" sizes="16x16" href="../images/sitelogo.png">
    <title>Room Information</title>
    
</head>

<body class="bg-gray-100">

<x-app-layout>
    <x-auth-session-status class="text-center text-base mt-2 mb-3" :status="session('status')" />
    <div class="container bg-[#82e9e4] h-[50px] mx-auto rounded-b-md">
        <!-- Flex container -->
        <div class="flex items-center justify-between mx-[40px]">
            <!-- Logo -->
            <div class="flex flex-row justify-center items-center">
                <img src="{{ asset('./images/BSBA.png')}}" class="h-[40px]">
                <div class="md:block">
                    <p class="text-sm">School of Business Hospitality<br>
                        and Tourism Management</p>
                </div>
            </div>
            <div class="hidden md:flex space-x-6">
                <a href="/" class="hover:text-[#E0C822] hover:font-medium">Home</a>
                <a href="#" class="hover:text-[#E0C822] hover:font-medium">Order</a>
                <a href="#" class="hover:text-[#E0C822] hover:font-medium">My Cart</a>
                <a href="/faq" class="hover:text-[#E0C822] hover:font-medium">FAQs</a>
                <a href="/userGuest/contact" class="hover:text-[#E0C822] hover:font-medium">Contact</a>
            </div>
        </div>
    </div>
    <!-- Icons -->
    <div class="">
        {{-- <div class="flex justify-center space-x-[100px] mt-[35px]">
        <div class="" id="progress"></div>
        <div class="circle active"><img
                src="https://r7q9b6u3.stackpathcdn.com/4.34/theme/defaultdark/img/icons/icon_nav_dates.png"
                height="30" width="25" /></div>
        <div class="circle"><img
                src="https://r7q9b6u3.stackpathcdn.com/4.34/theme/defaultdark/img/icons/icon_nav_info.png"
                height="30" width="25" /></div>
        <div class="circle"><img
                src="https://r7q9b6u3.stackpathcdn.com/4.34/theme/defaultdark/img/icons/icon_nav_rooms.png"
                height="30" width="25" /></div>
        <div class="circle"><img
                src="https://r7q9b6u3.stackpathcdn.com/4.34/theme/defaultdark/img/icons/icon_nav_confirmation.png"
                height="30" width="25" /></div>
    </div> --}}

        {{-- <div class="flex justify-center">
        <p >Check-in & </p>
    <p >Check-out Date</p>
    <p >Guest<br/></p>
    <p >Information</p>
    <p >Booking<br/></p>
    <p >Summary</p>
    <p >Payment<br/></p>
    <p >Confirmation</p> 
    </div> --}}
<section class="room_details mx-[100px] mt-[70px]">
<form method="POST" action="{{ route('save.reservation')}}">
@csrf
<div class="mb-10">
    <div class="flex item-center">
        <h2 class="text-[30px] text-[#4C4C4C] font-bold ml-7 w-full sm:w-[86%] md:w-[86%] lg:w-[86%]">Room
            <input type="text" class="border-none bg-none text-[30px]"
                value="{{ $rooms->id }}" name="room_id" style="background-color: transparent;"
                readonly>
        </h2>
    </div>
    <hr class="bg-[#444444] mx-4 h-[5px] py-23">
</div>
<div class="flex flex-wrap justify-center space-x-3 h-auto">
    {{-- Left --}}
    <div class="flex bg-gray-300 w-[800px] sm:w-[800px] md:w-[800px] lg:w-[800px] rounded-md">
        <div class="flex flex-wrap mx-4 my-4">
            <img class="h-[305px] " src="{{ asset('uploads/rooms/' . $rooms->photos) }}" alt="">
            <div class="flex space-x-5">
                <div class="bg-white border-2  h-[90px] w-[190px] my-3 rounded-md"
                    style="border-color: #F3C623;">
                    <h1 class=" items-center font-bold mt-2 ml-1 pl-3">Capacity</h1>
                    <div class="bg-black w-auto mx-1 h-[1px]">
                        <p class="p-3 inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" class="w-5 h-5 mr-2">
                                <path
                                    d="M7 8a3 3 0 100-6 3 3 0 000 6zM14.5 9a2.5 2.5 0 100-5 2.5 2.5 0 000 5zM1.615 16.428a1.224 1.224 0 01-.569-1.175 6.002 6.002 0 0111.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 017 18a9.953 9.953 0 01-5.385-1.572zM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 00-1.588-3.755 4.502 4.502 0 015.874 2.636.818.818 0 01-.36.98A7.465 7.465 0 0114.5 16z" />
                            </svg>
                            {{ $rooms->max_capacity }} Person</p>
                    </div>
                </div>
                <div class="bg-white border-2  h-[90px] w-[190px] my-3  rounded-md"
                    style="border-color: #F3C623;">
                    <h1 class="font-bold mt-2 ml-1 pl-3 ">Beds</h1>
                    <div class="bg-black w-auto mx-1 h-[1px]">
                        <p class="pl-2 pt-3 inline-flex items-center text-sm ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2"
                                viewBox="0 0 512 512" id="IconChangeColor">
                                <title>ionicons-v5-g</title>
                                <path
                                    d="M432,224V96a16,16,0,0,0-16-16H96A16,16,0,0,0,80,96V224a48,48,0,0,0-48,48V432H68V400H444v32h36V272A48,48,0,0,0,432,224Zm-192,0H120V192a16,16,0,0,1,16-16h88a16,16,0,0,1,16,16Zm32-32a16,16,0,0,1,16-16h88a16,16,0,0,1,16,16v32H272Z"
                                    id="mainIconPathAttribute"></path>
                            </svg> {{ $rooms->room_type }} </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="description mx-4 my-4 ">
            <h1 class="font-bold text-[20px]">Description</h1>
            <div class="bg-black w-[300px] mb-2 mx-1 h-[1px]"></div>
            <p class="w-[300px] text-justify ">
                {{ $rooms->room_description }}
            </p>
            <div class="items-center">
                <div class="bg-white border-2 mx-auto  my-2 rounded-md"
                    style="border-color: #E6AF2E;">
                    <h1 class="font-bold mt-2  ml-1 pl-3">Amenities</h1>
                    <div class="bg-black w-auto h-[1px] "></div>
                    @php
                        $listamenities = DB::table('room_amenities')->where('room_id', $rooms->id)->pluck('name')->toArray();
                    @endphp
                    <p class="p-3 inline-flex items-center ">
                    @foreach($listamenities AS $amenity)
                    {{ $amenity }}<br>
                    @endforeach
                    </p>
                </div>
            </div>
            <div class="text-right pt-[60px]" style="position: relative; left: -75px;">
                <div class="text-[25px] font-bold">PHP<span class="font-regular">
                        {{ $rooms->rate }}/nights</span></div>
            </div>
        </div>
    </div>
    {{-- right --}}
    <div class=" bg-gray-300 w-[300px] h-[450px] rounded-md">
        <div class="">
            {{-- <input type="hidden" name="room_id" value="{{ $id }}" id="number_of_nights" /> --}}
            <div class="mx-[25px] mt-2">
                <div class="py-2  ">
                    <p class="text-medium font-semibold">Check-in</p>
                    <div class="input-group date">
                        <input readonly type="date" name="check_in_date"
                            value="{{ $check_in_date }}" class="w-[250px] text-center" id="check_in"
                            required="required" />
                    </div>
                </div>
                <div class="py-2">
                    <p class="text-medium font-semibold">Check-out</p>
                    <div class="input-group date">
                        <input readonly type="date" name="check_out_date"
                            value="{{ $check_out_date }}" class="w-[250px] text-center"
                            id="check_out" required="required" />
                    </div>
                </div>
                <div class="py-2">
                    <p class="text-medium font-semibold">Number of Guest</p>
                    <div class="flex items-center justify-center">
                        <a class="bg-gray-100 hover:bg-gray-400 text-gray-700 px-2 py-2 rounded-l shadow-md transition duration-300 ease-in-out cursor-pointer"
                            onclick="subtract('guest_num')">-</a>
                        <input readonly type="number" id="guest_num" name="guest_num"
                            value="{{ $rooms->max_capacity }}" min="{{ $rooms->max_capacity }}"
                            class="w-[200px] text-center text-gray-700 bg-white py-2">
                        <a class="bg-gray-100 hover:bg-gray-400 text-gray-700 px-2 py-2 rounded-r shadow-md transition duration-300 ease-in-out cursor-pointer"
                            onclick="add('guest_num')">+</a>
                    </div>
                    <div class="py-4 flex items-center">
                        <div>
                            <p class="text-medium font-semibold">Number of Nights</p>
                        </div>
                        <div>
                            <input
                                class="py-2 w-[40px] bg-transparent border-none cursor-not-allowed"
                                type="text" name="number_of_nights" value="{{ $number_of_nights }}"
                                id="number_of_nights" readonly />
                        </div>
                    </div>
                    <div class="pt-[70px] text-center">
                        <button
                            class=" bg-[#E6AF2E] hover:bg-yellow-600 text-white active:bg-yellow-800 font-bold uppercase text-sm px-[80px] py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                            id="next">Book Now</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="flex justify-end mx-[25px]">
    <button 
    class="bg-[#7c7c7c] hover:bg-gray-600 text-white active:bg-gray-800 font-bold uppercase text-sm px-6 py-3 
     rounded shadow hover:shadow-lg outline-none focus:outline-none pr-15 mt-10 ease-linear transition-all duration-150" onclick="goBack()">Back</button>
</div>
</section>
        {{-- script for add and subtract btn --}}
        <script>
            function subtract(inputId) {
                var inputElement = document.getElementById(inputId);
                var currentValue = parseInt(inputElement.value);
                if (currentValue > 1) {
                    inputElement.value = currentValue - 1;
                }
            }

            function add(inputId) {
                var inputElement = document.getElementById(inputId);
                var currentValue = parseInt(inputElement.value);
                if(currentValue < '<?= $rooms->max_capacity ?>'){
                    inputElement.value = currentValue + 1;
                }
            }
        </script>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </x-app-layout>
</body>
<script src="{{url('js/progressbar.js')}}"></script>
<script src="{{url('js/pm1.js')}}"></script>
</html>