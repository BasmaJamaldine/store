<x-guest-layout>
   

    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900 dark:text-white">
                    Sign in to your account
                </h2>
            </div>
    
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
    
            <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
                @csrf
    
                <div class="rounded-md  flex flex-col gap-7">
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="sr-only" />
                        <input id="email" 
                                      class="appearance-none rounded-md relative block w-full px-4 py-3  placeholder-gray-500 border-2 border-[#F4DFC8] focus:ring-[#8f6e4b] focus:border-[#8f6e4b] focus:z-10" 
                                      type="email" 
                                      name="email" 
                                      :value="old('email')" 
                                      required 
                                      autofocus 
                                      autocomplete="username" 
                                      placeholder="Email address" />
                        <input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
    
                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="sr-only" />
                        <input id="password" 
                                      class="appearance-none rounded-md relative block w-full px-4 py-3 border-2 border-[#F4DFC8] focus:ring-[#8f6e4b] focus:border-[#8f6e4b] focus:z-10 " 
                                      type="password" 
                                      name="password" 
                                      required 
                                      autocomplete="current-password" 
                                      placeholder="Password" />
                        <input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                </div>
    
                <div class="flex items-center justify-between">
                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember_me" 
                               type="checkbox" 
                               class="h-4 w-4 text-[#85694b] focus:ring-[#8f6e4b]  " 
                               name="remember">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-900 ">
                            {{ __('Remember me') }}
                        </label>
                    </div>
    
                    <!-- Forgot Password -->
                    @if (Route::has('password.request'))
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="font-medium text-red-500 hover:text-red-600 ">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                    @endif
                </div>
    
                <div>
                    <button class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-lg font-medium rounded-md bg-[#b49d85] hover:bg-[#8c755c] text-white">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <!-- Heroicon name: solid/lock-closed -->
                            <svg class="h-5 w-5 text-white " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
