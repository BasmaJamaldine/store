<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900 dark:text-white">
                    Create your account
                </h2>
            </div>
            <form class="mt-8 space-y-6" method="POST" action="{{ route('register') }} " enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="sr-only" />
                    <input id="name" 
                                  class="appearance-none  rounded-lg relative block w-full px-3 py-3 border-2 border-[#F4DFC8] 0 placeholder-gray-500  text-gray-900  sm:text-md focus:ring-[#8f6e4b] focus:border-[#8f6e4b] focus:z-10" 
                                  type="text" 
                                  name="name" 
                                  :value="old('name')" 
                                  required 
                                  autofocus 
                                  autocomplete="name" 
                                  placeholder="Full name" />
                    <input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="sr-only" />
                    <input id="email" 
                                  class="appearance-none rounded-lg relative block w-full px-3 py-3 border-2 border-[#F4DFC8]  placeholder-gray-500  text-gray-900   sm:text-md focus:ring-[#8f6e4b] focus:border-[#8f6e4b] focus:z-10" 
                                  type="email" 
                                  name="email" 
                                  :value="old('email')" 
                                  required 
                                  autocomplete="username" 
                                  placeholder="Email address" />
                    <input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                 <!-- Gender -->
        <div class="mt-4">
            <x-input-label for="gender" :value="__('Gender')" class="sr-only"/>
            <select name="gender" id="gender" required class="w-full text-gray-600 rounded-lg border-2 border-[#F4DFC8] px-3 py-3  ">
                <option value="" disabled selected>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

        </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="sr-only" />
                    <input id="password" 
                                  class="appearance-none rounded-lg relative block w-full px-3 py-3 border-2 border-[#F4DFC8] dark:border-gray-700 placeholder-gray-500  text-gray-900   sm:text-md focus:ring-[#8f6e4b] focus:border-[#8f6e4b] focus:z-10" 
                                  type="password" 
                                  name="password" 
                                  required 
                                  autocomplete="new-password" 
                                  placeholder="Password" />
                    <input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="sr-only" />
                    <input id="password_confirmation" 
                                  class="appearance-none rounded-lg relative block w-full px-3 py-3 border-2 border-[#F4DFC8] placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-b-md focus:outline-none focus:ring-[#8f6e4b] focus:border-[#8f6e4b] focus:z-10 sm:text-sm " 
                                  type="password" 
                                  name="password_confirmation" 
                                  required 
                                  autocomplete="new-password" 
                                  placeholder="Confirm password" />
                    <input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                  <!-- Profile Image -->
        <div class="mt-4">
            <x-input-label for="profile_image" :value="__('Profile Image')" class="block text-lg font-semibold text-[#4a654f]" />
            <input id="profile_image" type="file" name="profile_image"  class="mt-1 block w-full text-sm text-gray-500 
            file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#FAF6F0]
             file:text-[#93B1A6] hover:file:bg-[#FDE5D4]" accept="image/*"
                required />
            <input-error :messages="$errors->get('profile_image')" class="mt-2" />
         
                   
        </div>

                <div>
                    <button class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-lg font-medium rounded-md bg-[#b49d85] hover:bg-[#8c755c] text-white ">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <!-- Heroicon name: solid/user-add -->
                            <svg class="h-5 w-5 text-white " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                            </svg>
                        </span>
                        {{ __('Register') }}
                    </button>
                </div>
            </form>

            <div class="flex items-center justify-center mt-6">
                <a class="text-sm text-balck hover:text-red-500 dark:text-indigo-400 " href="{{ route('login') }}">
                    {{ __('Already have an account? Sign in') }}
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>