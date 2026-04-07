<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')

       <!-- Logo -->
 <link rel="icon" type="image/png" sizes="16x16" href="../images/sitelogo.png">
 
  <script data-require="jquery@3.1.1" data-semver="3.1.1"
    src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  {{-- Bootstrap --}}
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
  {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}

  <title>Guest Information</title>

  {{-- <link rel="stylesheet" href="{{ asset('css/guest_registration.css') }}"> --}}
</head>

<body class="bg-gray-100">
  <!-- Navbar -->



  <x-app-layout>

    <nav class="container bg-[#82e9e4] h-[50px] mx-auto rounded-b-md ">
      <!-- Flex container -->
      <div class="flex items-center justify-between mx-[40px] ">
        <!-- Logo -->
        <div class="flex flex-row justify-center items-center">
          <img src="{{ asset('./images/BSBA.png')}}" class="h-[40px]">
          <div class="hidden md:block">
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
    </nav>

    <!-- Icons -->
    {{-- <div class="container">
                <div
                    class="progress-container"
                    style="position:relative; left: 400px; top: 30px;">
                    <div class="progress" id="progress"></div>
                    <div class="circle active"><img
                        src="https://r7q9b6u3.stackpathcdn.com/4.34/theme/defaultdark/img/icons/icon_nav_dates.png"
                        height="30"
                        width="25"/></div>

                    <div class="circle"><img
                        src="https://r7q9b6u3.stackpathcdn.com/4.34/theme/defaultdark/img/icons/icon_nav_info.png"
                        height="30"
                        width="25"/></div>
                    <div class="circle"><img
                        src="https://r7q9b6u3.stackpathcdn.com/4.34/theme/defaultdark/img/icons/icon_nav_rooms.png"
                        height="30"
                        width="25"/></div>
                    <div class="circle"><img
                        src="https://r7q9b6u3.stackpathcdn.com/4.34/theme/defaultdark/img/icons/icon_nav_confirmation.png"
                        height="30"
                        width="25"/></div>
                </div>
            </div> --}}
    {{-- </section> 
            <section class="room_details mx-[100px]">
                <p style="position:relative; left: 290px;">Check-in &
                </p>
                <p style="position:relative; left: 280px;">Check-out Date</p>
                <p style="position:relative; left: 480px; top: -50px;">Guest<br/></p>
                <p style="position:relative; left: 460px; top: -50px;">Information</p>
                <p style="position:relative; left: 650px; top: -100px;">Booking<br/></p>
                <p style="position:relative; left: 650px; top: -100px;">Summary</p>
                <p style="position:relative; left: 806px; top: -150px;">Payment<br/></p>
                <p style="position:relative; left: 790px; top: -150px;">Confirmation</p>
                <div class="mb-10">

                </section> --}}
    <section>

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
                        <div class="pl-10">{{ $rooms->room_type }}</div>
                      </div>
                      <div class="flex justify-between">
                        <label class="font-bold" for="guests">Total No. of Guests: </label>
                        <div class="pl-10">{{ $reservation->guests_num }}</div>
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
                        <label class="font-bold" for="guests">Additional Guests: </label>
                        <div class="pl-10">{{ $reservation->additional_guests }}</div>
                      </div>
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
                        <label class="font-bold" for="check-out-date">Nights: </label>
                      </div>
                      </div>
                      <div class="w-full md:w-1/2 py-2 px-5 ">
                      <div class="justify-left">

                      <div class=""> {{ $reservation->nights }}</div> 
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
                <a href="{{ route('guest.view.invoice') }}" target="_blank" class=" text-white bg-[#00BD56] active:bg-yellow-800 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">View</a>

                <a href="{{ route('generate.invoice')}}"  class="text-white bg-[#277BC0] active:bg-yellow-800 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Download</a>
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
  </x-app-layout>
</body>
<script src="{{url('js/progressbar.js')}}"></script>
<script src="{{url('js/pm1.js')}}"></script>

</html>