<script>
import { useAuth } from '@/composables/useAuth.js';

export default {
    setup(){
        const {
            email,
            password,
            // confirmPassword,
            errors,
            registerUser,
            loginUser
        } = useAuth();

        return {
            email,
            password,
            // confirmPassword,
            errors,
            registerUser,
            loginUser
        };
    }
}
</script>
<template>
    <div class="bg-white p-8 w-full max-w-md">
        <h1 class="text-4xl font-bold mb-12 text-center">Welcome to i-Card</h1>     
        <form @submit.prevent="loginUser" class="space-y-4">
            <div>
                <label for="tailwindEmail" class="block text-sm font-medium text-gray-700 mb-2">
                    Email address
                </label>
                <input 
                    v-model="email"
                    type="email" 
                    id="tailwindEmail" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter email"
                >
            </div>
            <div>
                <label for="tailwindPassword" class="block text-sm font-medium text-gray-700 mb-2">
                    Password
                </label>
                <input 
                    v-model="password"
                    type="password" 
                    id="tailwindPassword" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Password"
                >
            </div>
            <a href="" class="block text-sm text-end font-medium text-sky-500 hover:text-sky-700">
                forgot password ?
            </a>
            <button 
                type="submit" 
                class="cursor-pointer w-full bg-blue-600 text-white mt-4 py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200"
            >
                Sign In
            </button>
        </form>

        <div class="mt-8">
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">or continue with</span>
                </div>
            </div>

            <div class="mt-5 grid space-y-4">
                <!-- Google Button -->
                <button
                    class="group cursor-pointer h-12 px-6 border-2 border-gray-300 rounded-full transition duration-300 hover:border-blue-400 focus:bg-blue-50 active:bg-blue-100">
                    <div class="relative flex items-center space-x-4 justify-center">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="absolute left-0 w-5" alt="google logo">
                            <span
                                class="block font-semibold tracking-wide text-gray-700 dark:text-dark text-sm transition duration-300 group-hover:text-blue-600 sm:text-base">
                                Continue with Google
                            </span>
                    </div>
                 </button>
            </div>

            <div class="mt-15">
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">not a member? <router-link to="/register" class="text-sky-500 hover:text-sky-700">Register now</router-link></span>
                </div>
            </div>
        </div>
    </div>
</template>