<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Forgot Password</title>
</head>

<body>
    <!-- Session Status -->
    <x-auth-session-status class="text-center text-base mt-2 mb-3" :status="session('status')" />

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-[9
            00px] flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0">
            <!-- Image Left -->
            <div class="">
                <img src="./images/logomicrohotel.jpg" alt=""
                    class="w-[400px] h-full hidden rounded-l-2xl md:block object-cover">
            </div>
            <div class="flex flex-col justify-center p-2 md:p-8">
                <h3 class="text-2xl font-semibold mt-12 mb-4">Forgot Password</h3>
                <hr class="h-px mb-5 bg-[#55AFAB] border-0">

                <!-- Form -->
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <!-- Email Address -->
                    <div class="py-4">
                        <span class="mmb-2 text-md">Enter your email address</span>
                        <input type="email" id="email"
                            class="w-full my-2 p-1 border border-gray-300 rounded-md placeholder:font:light placeholder:text-gray-500 placeholder:text-sm"
                            placeholder="johndoe@gmail.com" name="email" :value="old('email')" required autofocus>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    
                    <!-- Button -->
                    <div class="w-1/2 flex flex-col m-auto">
                        <button class="bg-[#E6AF2E] hover:bg-yellow-600  active:bg-yellow-800 text-white font-bold py-2 px-4 rounded">
                            Continue
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>