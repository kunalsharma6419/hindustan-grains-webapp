<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hindustan Grains Register</title>
</head>
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    clifford: '#da373d',
                }
            }
        }
    }
</script>
<script src="https://kit.fontawesome.com/5c118959dd.js" crossorigin="anonymous"></script>

<body>

    <div class="h-full bg-white flex flex-col md:flex-row">
        <div
            class="bg-gradient-to-b from-[#42342E] to-[#6A4E42] w-full md:w-1/2 p-6 md:p-20 text-white lg:flex flex-col justify-center items-center md:items-start">
            <h1 class="text-4xl mb-3 text-center md:text-left">Welcome to</h1>
            <img class="w-full h-[300px] object-cover" src="./user/Rectangle 33.png" alt="">
        </div>
        <div class=" flex flex-col flex justify-center items-center">
            <div class=" w-[94%] mx-auto md:w-full md:w-1/2  ">
                <div class="w-full  lg:max-w-lg">
                    <p class="text-2xl font-semibold text-[#9F6B00]  mt-20">Let’s get started</p>
                    <div class="bg-white border border-[#B48629] p-6 md:p-8 mt-10 rounded-lg shadow-lg">
                        <h2 class="text-lg font-semibold mb-4">Sign Up</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-4 px-4 py-4 w-full bg-[#F5F5F5] rounded-[8px] ">
                                <input class="input-field w-full  bg-[#F5F5F5]" id="name" type="text"
                                    name="name" :value="old('name')" style="outline-color: #F5F5F5;" required
                                    autofocus autocomplete="name" placeholder="Enter Full Name" />
                            </div>
                            <div class="mb-4 px-4 py-4 w-full bg-[#F5F5F5] rounded-[8px] ">
                                <input class="input-field w-full  bg-[#F5F5F5]" type="email" name="email"
                                    :value="old('email')" style="outline-color: #F5F5F5;" placeholder="Enter Email"
                                    required />
                            </div>
                            <div class="mb-4 px-4 py-4 w-full bg-[#F5F5F5] rounded-[8px] ">
                                <input class="input-field w-full  bg-[#F5F5F5]" type="tel" name="phone"
                                    :value="old('phone')" style="outline-color: #F5F5F5;" placeholder="Enter Phone"
                                    required />
                            </div>
                            <div class="mb-4 px-4 py-4 w-full bg-[#F5F5F5] rounded-[8px] ">
                                <input class="input-field w-full  bg-[#F5F5F5]" type="text" name="address"
                                    :value="old('address')" style="outline-color: #F5F5F5;" placeholder="Enter Address"
                                    required />
                            </div>

                            <div
                                class="mb-4 px-4 py-4 items-center w-full flex justify-between bg-[#F5F5F5] rounded-[8px] ">
                                <input class="input-field w-full  bg-[#F5F5F5]" type="password" name="password"
                                    autocomplete="new-password" style="outline-color: #F5F5F5;" placeholder="Password"
                                    required>
                                {{-- <i class="fa-solid fa-eye-slash" style="color: #8F8F8F;"></i> --}}
                            </div>
                            <div
                                class="mb-4 px-4 py-4 items-center w-full flex justify-between bg-[#F5F5F5] rounded-[8px] ">
                                <input class="input-field w-full  bg-[#F5F5F5]" type="password"
                                    name="password_confirmation" style="outline-color: #F5F5F5;"
                                    placeholder="Confirm Password" required autocomplete="new-password">
                                {{-- <i class="fa-solid fa-eye-slash" style="color: #8F8F8F;"></i> --}}
                            </div>
                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mt-4">
                                    <x-jet-label for="terms">
                                        <div class="flex items-center">
                                            <x-jet-checkbox name="terms" id="terms" />

                                            <div class="ml-2">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' =>
                                                        '<a target="_blank" href="' .
                                                        route('terms.show') .
                                                        '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                                        __('Terms of Service') .
                                                        '</a>',
                                                    'privacy_policy' =>
                                                        '<a target="_blank" href="' .
                                                        route('policy.show') .
                                                        '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                                        __('Privacy Policy') .
                                                        '</a>',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </x-jet-label>
                                </div>
                            @endif
                            <button
                                class=" bg-[#FFC857] p-5  w-full  flex justify-between gap-10 rounded-[8px] items-center">
                                <h1 class=" text-black">Sign Up</h1>
                                <a href="#"><i class="fa-solid fa-arrow-right" style="color: #9F6B00"></i></a>
                            </button>
                        </form>
                        <!-- <button class="login-button">
                        <span class="text-black">Login</span>
                        <i class="fa-solid fa-arrow-right" style="color: #9F6B00"></i>
                    </button> -->
                        {{-- <div class=" flex justify-center  separator my-4">
                            <span class="bg-gray-300 h-px flex-grow"></span>
                            <span class="px-2 text-sm text-gray-400">or</span>
                            <span class="bg-gray-300 h-px flex-grow"></span>
                        </div> --}}
                        {{-- <div class="flex justify-center items-center space-x-4">
                            <img class="social-icon" src="Google - png 0.png" alt="">
                            <img class="social-icon" src="Google - png 2.png" alt="">
                        </div> --}}
                        <p class="mt-4 text-center text-sm">
                            Already have an account? <a class="text-[#B48629]" href="{{ route('login') }}">Log in</a>
                        </p>
                    </div>
                </div>

            </div>
            <img class=" mt-   " src="./user/Rectangle 591.png" alt="">
        </div>

    </div>

</body>


</html>
