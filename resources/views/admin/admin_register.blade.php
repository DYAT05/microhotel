<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Registration</title>
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Logo -->
  <link rel="icon" type="image/png" sizes="16x16" href="../images/logo.png">
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
        <div class="flex items-center justify-center min-h-screen bg-gray-100">
            <div class="w-[9
            00px] flex flex-col bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0">
                <div class="">
                    <img src="{{ asset('images/logomicrohotel.jpg') }}" alt=""
                    class="w-[450px] h-full hidden rounded-l-2xl md:block object-cover">
                </div>
                <div class="flex flex-col justify-center p-2 md:px-6 py-4">
                    <h3 class="text-2xl font-semibold mb-4">Sign Up</h3>
                    <hr class="h-px mb-5 bg-[#55AFAB] border-0">

                    <form method="POST" action="{{ route('admin.register.create') }}">
                    @csrf
                    <div class="py-1">
                        
                        <span class="mb-2 text-sm font-semibold">Name <span class="text-red-500 text-sm ">*</span></span>
                        <input type="text" name="name" :value="old('name')" required autofocus id="name" class="w-full p-1 border border-gray-300 rounded-md placeholder:font:light placeholder:text-gray-500 placeholder:text-sm py-1"
                        placeholder="Enter your name" >
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- <div class="py-1">
                        <span class="mb-2 text-sm font-semibold">First Name</span>
                        <input type="text" name="firstname" id="firstname" class="w-full p-1 border border-gray-300 rounded-md placeholder:font:light placeholder:text-gray-500 placeholder:text-sm py-1"
                        placeholder="Enter your first name">
                    </div>
                    <div class="py-1">
                        <span class="mb-2 text-sm font-semibold">Last Name</span>
                        <input type="text" name="lastname" id="lastname" 
                            class="w-full p-1 border border-gray-300 rounded-md placeholder:font:light placeholder:text-gray-500 placeholder:text-sm py-1"
                        placeholder="Enter your last name">
                    </div> -->
                    <div class="py-1">
                        <span class="mb-2 text-sm font-semibold">Email
                            <span class="text-red-500 text-sm ">*</span> </span>
                        <input type="email" name="email" :value="old('email')" required id="email"
                            class="w-full p-1 border border-gray-300 rounded-md placeholder:font:light placeholder:text-gray-500 placeholder:text-sm py-1"
                            placeholder="Enter your email">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="py-1">
                        <span class="mb-2 text-sm font-semibold">Password <span class="text-red-500 text-sm ">*</span></span>
                        <input type="password" name="password"
                            required autocomplete="new-password" id="password" 
                            class="w-full p-1 border border-gray-300 rounded-md placeholder:font:light placeholder:text-gray-500
                            placeholder:text-sm py-1"
                            placeholder="Enter your password" >
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="py-1">
                        <span class="mb-2 text-sm font-semibold">Confirm Password <span class="text-red-500 text-sm ">*</span></span>
                        <input type="password" name="password_confirmation" required id="password"
                            class="w-full p-1 border border-gray-300 rounded-md placeholder:font:light placeholder:text-gray-500 placeholder:text-sm py-1"
                            placeholder="Confirm your password">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center my-1">
                        <input type="checkbox" name="terms"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="link-checkbox" class="ml-2 text-sm font-normal text-black">I agree to the DWCC Microhotel <a href="#"
                                class="text-[#55AFAB] hover:underline">Terms and Conditions and Privacy Policy</a>.</label>     
                                
                    </div>
                    <x-input-error :messages="$errors->get('terms')" class="mt-2" />

                    <div class="w-1/2 flex flex-col m-auto">
                        <br>
                        <button style ="width: 500px; position: relative; left: -120px;" class="bg-[#E6AF2E] hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                            Register
                        </button>
                    </div>

                    <div class="w-full flex items-center justify-center mt-1">
                        <p class="text-sm font-normal text-[#060606]">Already have an account? <span
                                class="font-semibold text-[#55AFAB] cursor-pointer"><a href="login">Login</a></span></p>
                    </div>
                </form>
                </div>
            </div>
        </div>
</body>
<script src= "{{url('js1/eyevisibility.js')}}"></script>
</html>