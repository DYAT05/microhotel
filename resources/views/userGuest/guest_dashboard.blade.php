<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <title>Calendar</title>
        {{-- Bootstrap theme:Full Calendar --}}
        
        {{-- Calendar Css --}}
        <link rel="stylesheet" href="css/calendar1.css">
     

        {{-- javascript calendar --}}
        <script src= "{{url('js/check_in_calendar.js')}}"></script>
        <script src= "{{url('js/check_out_calendar.js')}}"></script>
    
        {{-- Calendar script --}}
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>

        {{-- Font awesome --}}
        <script src="https://kit.fontawesome.com/d0fec6f98b.js" crossorigin="anonymous"></script>
        

        <!-- Logo -->   
        <link rel="icon" type="image/png" sizes="16x16" href= "../images/logo.png">
        
    </head>

    <body style="background-color: white;">
        {{-- App.blade.php --}}
        <x-app-layout>
            <div class="flex items-center justify-center my-10 mx-10 pb-3 bg-gray-100">
                <div class="w-4/5 flex flex-col bg-gray-200  rounded-2xl p-10 ">
{{-------------------------------------------------- FORM DATE PICKER -----------------------------------------------}}
                    <form method="POST" action="{{ route('store_date') }}" required>

                        @csrf
                        <div class="py-2">
                            <span class="mb-2 text-md font-semibold">Check-in</span>
                         
                            <input
                                readonly
                                type="text"
                                name="check_in_date"
                                value="{{ old('check_in_date') }}"
                                class="btn w-full"
                                id="check_in"
                                placeholder="DD-MM-YY"
                                >
                                
                                <x-input-error :messages="$errors->get('check_in_date')" class="mt-2 font-base" />                                  
                        </div>
                       
                        <div class="py-2">
                            <span class="mb-2 text-md font-semibold">Check-out</span>
                            <input
                                readonly
                                type="text"
                                name="check_out_date"
                                value="{{ old('check_out_date') }}"
                                class="w-full"
                                id="check_out"
                                placeholder="DD-MM-YY"
                                />
                                <x-input-error :messages="$errors->get('check_out_date')" class="mt-2 font-base" />
                               
                            </div>
                           
              
{{--------------------------------------------------FULL CALENDAR 1 -----------------------------------------------}}
                <div class="flex pt-10 space-x-[90px] justify-center  rounded">

                    <div class="">
                        <div id="calendar1" ></div>
                    </div>
                                    
{{--------------------------------------------------FULL CALENDAR 2 -----------------------------------------------}}
                        
                    <div class="">
                        <div id="calendar2" class="calendar"></div>

                    </div>
                </div>  

{{-------------------------------------------------- SECTION LEGEND -----------------------------------------------}}
                <div class="pt-4">
                    <div class=" py-4 ">
                        <div class="px-10 font-bold font-base ">LEGEND</div>

                        <div class="flex items-center px-10 py-4 ">

                            <div class="bg-gray-300 box-border  border-black h-3 w-2.5 p-2 " style="color: #DDDDDD;"></div>
                            <div for="box" class="pl-3 font-xs">Available Date</div>

                            <div class="bg-blue-600 box-border border-black h-3 w-2.5 p-2 ml-4"></div>
                            <div for="box" class="pl-3 font-xs">Check-in Date</div>

                        </div>
                        <div class="flex items-center px-10 ">
                            <div class="bg-gray-600 box-border border-black h-3 w-2.5 p-2 "></div>
                            <div for="box" class="pl-3 font-xs">Invalid Date</div>
                            <div class="flex items-center px-5 ">
                            <div class="bg-red-600 box-border border-black h-3 w-2.5 p-2 ml-4 "></div>
                            <div for="box" class="pl-3 font-xs">Check-out Date</div>
                        </div>
                    </div>
                </div>
                  
{{-------------------------------------------------- BUTTON -----------------------------------------------}}
              
        
                    <div class=" flex justify-end m-auto">
                        <button type="submit" 
                        class="bg-[#F3C623] hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded mt-3 ">
                            Continue
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-app-layout>
 </body>

</html>