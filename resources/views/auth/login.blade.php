<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Login</title>
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Logo -->
  <link rel="icon" type="image/png" sizes="16x16" href="../images/sitelogo.png">

  <style>
        .toggle-password-eye {
    float: right;
    top: -25px;
    right: 10px;
    position: relative;
    cursor: pointer;
    color:#404040;
}
        </style>
</head>
<body>
    <!-- Session Status -->
    <x-auth-session-status class="text-center text-base mt-2 mb-3" :status="session('status')" />

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-[9
            00px] flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0">
            <div class="">
                <img src="./images/logomicrohotel.jpg" alt=""
                    class="w-[400px] h-full hidden rounded-l-2xl md:block object-cover">
            </div>
            <div class="flex flex-col justify-center p-2 md:p-8">
                <h3 class="text-2xl font-semibold mb-4">Sign In</h3>
                <hr class="h-px mb-5 bg-[#55AFAB] border-0">

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="py-2">Username <span class="text-red-500 text-sm ">*</span></span>
                        <input type="text" id="email"
                            class="w-full p-1 border border-gray-300 rounded-md placeholder:font:light placeholder:text-gray-500 placeholder:text-sm" 
                            placeholder="Enter your Username" name="email" :value="old('email')" required autofocus>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="py-2">
                        <span class="mb-2 text-md">Password <span class="text-red-500 text-sm ">*</span></span>
                        <input type="password" id="password" class="w-full p-1 border border-gray-300 rounded-md placeholder:font:light placeholder:text-gray-500
                                placeholder:text-sm" placeholder="Enter your Password" name="password"
                                required autocomplete="current-password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
        
                    <div class="flex justify-between w-full items-center my-3">
                        <div class="mr-24">
                            <input id="link-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="link-checkbox" class="ml-2 text-sm font-normal text-black">Remember me</label>
                        </div>
                        
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-blue-600 hover:text-blue-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
        <br>
                    <div class="w-1/2 flex flex-col m-auto">
                        <button style ="width: 350px; position: relative; left: -90px;" class="bg-[#E6AF2E] hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                            {{ __('Login') }}
                        </button>
                    </div>
        
                    <div class="w-full flex items-center justify-center m-1">
                        <p class="text-sm font-normal text-[#060606]">Don't have an account? <span
                                class="font-semibold text-[#55AFAB] cursor-pointer"><a href="register">Sign Up</a></span></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src= "{{url('js1/eyevisibility.js')}}"></script>
</html>