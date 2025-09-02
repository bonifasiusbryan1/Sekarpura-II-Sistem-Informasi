@extends('layouts.header')

@section('content')
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-2xl font-poppins" style="max-width: 29cm; padding-left: 2rem; padding-right: 2rem;">
        <div class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0">
            <!-- Left side -->
            <div class="flex flex-col justify-center p-4 md:p-6 md:w-2/3">
                <span class="mb-2 text-2xl font-bold">Sign In</span>
                <span class="font-light text-gray-400 mb-4">
                    Welcome back! Please enter your details
                </span>
                <!-- Formulir Login -->
                <form class="form" action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="username" class="text-dark">Username:</label><br>
                        <input type="text" name="username" id="username" class="form-control">
                        @error('username')
                            <span class="d-block fs-6 text-danger mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="password" class="text-dark">Password:</label><br>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('password')
                            <span class="d-block fs-6 text-danger mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <input type="submit" name="submit" class="btn btn-dark btn-md w-full" value="login">
                    </div>
                </form>
            </div>
            <!-- Right side -->
            <div class="relative md:w-1/3">
                <img src="{{ asset('images/wp10941428.jpg') }}" alt="img" class="w-full h-[100px] shadow-2xl md:block object-cover" style="max-height: 24cm;">
                <!-- Text on image -->
                <div class="absolute bottom-0 right-0 left-0 p-4 bg-black bg-opacity-50 rounded-lg md:block">
                    <span class="text-white text-sm">We Make You Fly and Connect. SERASI©</span>
                </div>                
            </div>
        </div>
    </div>
@endsection
