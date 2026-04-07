<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Reset Password</title>
</head>

<body>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-[9
            00px] flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0">
            <!-- <div class="">
                <img src="./images/logomicrohotel.jpg" alt=""
                    class="w-[450px] h-full hidden rounded-l-2xl md:block object-cover">
            </div> -->
            <div class="flex flex-col justify-center p-2 md:p-8">
                <h3 class="text-2xl font-semibold mb-2">Reset your Password</h3>
                <p class="w-full font-normal mb-4">Strong password include numbers, letters and special characters</p>
                <hr class="h-px mb-5 bg-[#55AFAB] border-0">

                <form method="POST" action="{{ route('password.store') }}">
                @csrf

                     <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div class="py-2">
                        <span class="mb-2 text-md">Email</span>
                        <input type="email" id="email"
                            class="w-full p-1 border border-gray-300 rounded-md placeholder:font:light placeholder:text-gray-500 placeholder:text-sm"
                            placeholder="johndoe@gmail.com" name="email" :value="old('email', $request->email)" required autofocus>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="py-2">
                        <span class="mb-2 text-md">Password</span>
                        <input type="password" id="password"
                            class="w-full p-1 border border-gray-300 rounded-md placeholder:font:light placeholder:text-gray-500 placeholder:text-sm"
                            placeholder="Enter your new password" name="password" required>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="py-2">
                        <span class="mb-2 text-md">Confirm Password</span>
                        <input type="password" id="password_confirmation"
                            class="w-full p-1 border border-gray-300 rounded-md placeholder:font:light placeholder:text-gray-500 placeholder:text-sm"
                            placeholder="Confirm your password" name="password_confirmation" required>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="w-1/2 flex flex-col m-auto">
                        <button class="bg-[#E6AF2E] hover:bg-yellow-600  active:bg-yellow-800 text-white font-bold py-2 px-4 rounded">
                            Reset Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>