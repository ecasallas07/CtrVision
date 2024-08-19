<!DOCTYPE html>
<html lang="en">


<x-head>login</x-head>

<body class="h-full">
    <div class="flex flex-col justify-center min-h-full px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="w-auto h-48 mx-auto" src="{{asset('images/logo-app.png')}}"
                alt="CtrVision company">

            <h2 class="mt-10 text-2xl font-bold leading-9 tracking-tight text-center text-gray-700">Sign in to your
                account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

            {{-- TODO: form - configure form login and autenticate --}}
            <form class="space-y-6" method="POST" action="{{route('login.authenticate')}}" >
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                        address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-gray-900 hover:text-gray-500">Forgot
                                password?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-gray-400 px-3 py-1.5 text-sm font-semibold leading-6 text-black shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Sign
                            in</button>
                    </div>
            </form>

            <p class="mt-10 text-sm text-center text-gray-500">
                Not a member?
                <a href="{{route('register.view')}}" class="font-semibold leading-6 text-gray-600 hover:text-gray-500">Register</a>
            </p>
        </div>
    </div>



</body>

</html>
