<!DOCTYPE html>
<html lang="en">
<x-head>Verification</x-head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="max-w-md w-full p-6 bg-white shadow-lg rounded-lg">
    <div class="text-center">
        <!-- Logo (opcional) -->
        <div class="mb-6">
            <img src="{{  asset('images/logo-app.png') }}" alt="Logo" class="mx-auto h-16">
        </div>

        <h1 class="text-2xl font-semibold text-gray-800 mb-4">{{ __('Email Verified Successfully') }}</h1>

        <div class="mb-4">
            <p class="text-gray-600">
                {{ __('Thank you for verifying your email address. You can now proceed to your account.') }}
            </p>
        </div>

        <!-- Enlace para redirigir a la página de inicio o login -->
        <a href="{{ route('login.view') }}" class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-lg hover:bg-blue-700">
            {{ __('Go to Dashboard') }}
        </a>
    </div>
</div>
</body>
</html>
