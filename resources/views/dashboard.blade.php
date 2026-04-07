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
            <a href="faq" target="_blank" class="hover:text-[#E0C822] hover:font-medium">FAQs</a>
            <a href="userGuest/contact" class="hover:text-[#E0C822] hover:font-medium">Contact</a>
          </div>
        </div>
      </nav>
      <div class="flex justify-center items-center">
        <h1 class="text-white font-bold text-[80px] my-[50px]">Room Types</h1>
      </div>
    </div>

    @if(count($expiredreservations) > 0)
    <section class="container w-[85%] md:w-[85%] lg:w-[85%] mx-auto mt-10">
      <h2 class="text-2xl font-bold mb-5">Notification{{(count($expiredreservations) > 1) ? 's' : ''}}</h2>
      <hr style="border: 2px solid #E6AF2E; width: 140px;  position: relative; left: -2px; top: -20px; ">
      <div class="flex flex-wrap p-10 rounded-lg bg-gray-200 ">
      @foreach($expiredreservations AS $bookdate)
        * Your booking/reservation for dates {{ $bookdate->checkin_date .' to '. $bookdate->checkin_date}} has been automatically cancelled after 24 hours of not paying the booking fee. <br>
      @endforeach
      </div>
    </section>
    @endif
    <!-- Rooms -->
    <section class="container w-[85%] md:w-[85%] lg:w-[85%] mx-auto mt-10">
      <h2 class="text-2xl font-bold mb-5">Check Room Availability</h2>
      <hr style="border: 2px solid #E6AF2E; width: 270px;  position: relative; left: -2px; top: -20px; ">
      <div class="w-full flex flex-col bg-gray-200 rounded-lg p-5">
        <div class="md:flex-row justify-center">
          <div class="w-full px-10 mx-auto">
            <form method="POST" action="{{ route('store.date') }}" class="grid grid-cols-1 gap-2">
              @csrf
              <div class="py-2">
                <label class="block text-gray-900 font-medium mb-2" for="check-in-date">Check-in date:</label>
                <input
                  class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                  id="check_in_date" name="check_in_date" type="date" value="{{ session('check_in_date') }}" required>
              </div>
              <div class="py-2">
                <label class="block text-gray-900 font-medium mb-2" for="check-out-date">Check-out date:</label>
                <input
                class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                  id="check_out_date" name="check_out_date" type="date" value="{{ session('check_out_date') }}"
                  required>
              </div>

              <div class="py-2 flex items-center">
                <label class="block text-gray-900 font-bold mr-4" for="number-of-nights">Number of Nights:</label>
                <input type="" id="number_of_nights" name="number_of_nights" value="{{ session('number_of_nights') }}"
                  class="bg-transparent pointer-events-none rounded py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:border-blue-500"
                  readonly>
              </div>
             
              <div class="mx-auto">
                @if ($errors->any())
                <div id="error-message" class="flex flex-row items-center justify-between bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative transition duration-500 ease-in-out" role="alert">
                  <div class="flex-grow">
                    @foreach ($errors->all() as $error)
                      <div>{{ $error }}</div>
                    @endforeach
                  </div>
                  <div class="ml-4">
                    <button type="button" class="close" onclick="document.getElementById('error-message').classList.add('opacity-0', 'h-0');">
                      <span class="text-xl-center text-red-500 font-extrabold">X</span>
                  </div>
                    </button>    
                  </div>
                </div>          
              @endif
                          
              </div>
              <div class="flex justify-end my-3 ">
                <a href="#scroll-section">
                <button 
                  class="text-white bg-[#E6AF2E] hover:bg-yellow-600 active:bg-yellow-800 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                  type="submit" required>Continue</button>
              </div>
              </a>
            </form>
          </div>
        </div>
      </div>
    </section>
  

    <section class="container w-[85%] sm:w-[85%] lg:w-[85%] md:w-[85%] mx-auto mt-10 bg" id="scroll-section">
      <h2 class="text-2xl font-bold mb-5">Available Rooms</h2>
      <hr style="border: 2px solid #E6AF2E; width: 188px;  position: relative; left: -2px; top: -20px; ">
        <div class="flex flex-wrap justify-center p-10 rounded-lg bg-gray-200 ">
            @foreach ($rooms as $room)
            @if(!$isRoomReserved[$room->id])
            <div class="w-[400px] md:w-[400px]  lg:w-[400px]  m-5">
              <form method="POST" action="{{ route('view.room', ['room_id' => $room->id]) }}">
                @csrf
                <input type="hidden" name="check_in_date" value="{{ session('check_in_date') }}">
                <input type="hidden" name="check_out_date" value="{{ session('check_out_date') }}"/>
                <input type="hidden" name="number_of_nights" value="{{ session('number_of_nights') }}" />
                <div class="max-w-sm rounded-md overflow-hidden shadow-lg m-2 bg-white">
                  @if ($displayImage)
                  <img class="w-full" src="{{ asset('uploads/rooms/' . $room->photos) }}" alt="Room Image">
                   @elseif ($isRoomReserved[$room->id])
                  <div class="relative">
                      <img class="w-full opacity-50" src="{{ asset('uploads/rooms/' . $room->photos) }}" alt="Room Image">
                      <div class="absolute top-0 left-0 right-0 bottom-0 flex justify-center items-center">
                          <h1 class="text-[30px] font-bold text-gray-00 border-2 border-black p-2">Not Available</h1>
                      </div>
                  </div>
                  @else
                  <img class="w-full" src="{{ asset('uploads/rooms/' . $room->photos) }}" alt="Room Image">
                  @endif
                    <div class="px-6 py-4">
                      <div>
                        <div class="text-black font-extrabold text-lg">Room {{$room->room_number}}</div>
                        <strong class="text-gray-700 text-base">{{$room->room_type}}</strong>
                          <p><strong style="color: #E6AF2E;">{{$room->rate}} / Night</strong></p>
                            <p class="text-gray-700 text-base">{{ Str::limit(Str::before($room->room_description, '.'),60) }}</p>
                      </div>
                    </div>
                  <div class="px-6 py-2 mb-3">
                    <div class="flex justify-end">
                      <button type="submit" name="room_id_{{ $room->id }}" value="{{ $room->id }}" {{ ( $isRoomReserved[$room->id]) ? 'disabled' : '' }}
                        class="inline-flex items-center bg-[#E6AF2E] hover:bg-yellow-600 text-black active:bg-yellow-800 
                        {{ ( $isRoomReserved[$room->id])?  : '' }}  font-semibold text-sm px-3 w-21 py-[10px] rounded shadow hover:shadow-lg outline-none focus:outline-none  ease-linear transition-all duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round"d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>&nbsp; DETAILS
                      </button>
                    </div>
                  </div>
                </div>
                <div class="mx-auto mt-5">
                 
             </div>
              </form>
            </div>
            @endif
          @endforeach
      </div>
    </section>
    <script>
      const check_in_date = document.getElementById('check_in_date');
      const check_out_date = document.getElementById('check_out_date');
      const numberOfNights = document.getElementById('number_of_nights');
      check_in_date.min = new Date().toISOString().split('T')[0];
      check_out_date.min = new Date().toISOString().split('T')[0];
  
      check_out_date.addEventListener('change', function() {
        const oneDay = 24 * 60 * 60 * 1000; // hours * minutes * seconds * milliseconds
        const checkIn = new Date(check_in_date.value);
        const checkOut = new Date(check_out_date.value);
        const diffDays = Math.round(Math.abs((checkOut - checkIn) / oneDay));
        numberOfNights.value = diffDays;
      });
    </script>
  </x-app-layout>
</body>

</html>