<!-- resources/views/auth/verify-email.blade.php -->
<!DOCTYPE html>
<html lang="en">

<x-head>Verify Email</x-head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="max-w-lg w-full p-6 bg-white shadow-lg rounded-lg">
    <!-- Logo -->
    <div class="text-center mb-6">
        <img src="{{ asset('images/logo-app.png') }}" alt="Logo" class="mx-auto h-16">
    </div>

    <div class="text-center">
        <h1 class="text-2xl font-semibold text-gray-800 mb-4">{{ __('Verify Your Email Address') }}</h1>

        <div class="mb-4">
            @if (session('message'))
                <div class="bg-green-100 text-green-800 border border-green-300 rounded-lg p-4 mb-4" role="alert">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <p class="text-gray-600 mb-4">
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
        <form class="inline" method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="text-blue-600 hover:underline">{{ __('click here to request another') }}</button>.
        </form>
        </p>
    </div>
</div>
</body>
</html>

