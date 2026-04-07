<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
        <div class="flex items-center justify-center min-h-screen bg-gray-100">
            <div class="w-[9
            00px] flex flex-col bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0">
                <div class="flex flex-col justify-center p-2 md:px-6 py-4">
                    <h3 class="text-2xl font-semibold mb-4">Sign Up</h3>
                    <hr class="h-px mb-5 bg-[#55AFAB] border-0">

                    <form method="POST" action="{{ route('admin.fregister.create') }}">
                    @csrf
                    <div class="py-1">
                        
                        <span class="mb-2 text-sm font-semibold">Name <span class="text-red-500 text-sm ">*</span></span>
                        <input type="text" name="name" :value="old('name')" required autofocus id="name" class="w-full p-1 border border-gray-300 rounded-md placeholder:font:light placeholder:text-gray-500 placeholder:text-sm py-1"
                        placeholder="Enter your name" >
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
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

                   
                    <x-input-error :messages="$errors->get('terms')" class="mt-2" />

                    <div class="w-1/2 flex flex-col m-auto">
                        <button  style ="width: 500px; position: relative; left: -90px;" class="bg-[#FFB200] hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                            Register
                        </button>
                    </div>

                    </div>
                </form>
                </div>
            </div>
        </div>
</body>
<script src= "{{url('js/main.js')}}"></script>
</html>