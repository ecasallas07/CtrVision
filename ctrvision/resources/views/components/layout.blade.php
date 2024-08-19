<!DOCTYPE html>
<html lang="en">

<x-head>Dashboard</x-head>

<body>
    {{-- TODO: Para crear un layout se debe ejcutar el command php artisan make: compoenent <name> --}}
    <div class="min-h-full">
        <nav class="">
            <div class="px-4 m-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-32 " src="{{ asset('images/logo-app.png') }}" alt="Your Company">
                        </div>
                        <div class="hidden md:block">
                            <div class="flex items-baseline ml-10 space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="{{ route('dashboard.view') }}"
                                    class="px-3 py-2 text-xl font-medium text-black rounded-md hover:bg-gray-400 hover:text-white"
                                    aria-current="page">Dashboard</a>
                                <a href="{{ route('project.create.view') }}"
                                    class="px-3 py-2 text-xl font-medium text-black rounded-md hover:bg-gray-400 hover:text-white">Create
                                    Projec</a>
                                <a href="{{ route('project.view') }}"
                                    class="px-3 py-2 text-xl font-medium text-black rounded-md text-xlfont-medium hover:bg-gray-400 hover:text-white">Projects</a>
                                <a href="{{ route('idea.view') }}"
                                    class="px-3 py-2 text-xl font-medium text-black rounded-md hover:bg-gray-400 hover:text-white">Ideas</a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="flex items-center ml-4 md:ml-6">

                            <!-- Profile dropdown -->
                            <div class="relative ml-3">
                                <div>
                                    <a href="{{route('logout.view')}}" type="button"
                                        class="relative flex items-center max-w-xs text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                        id="user-menu-button">
                                        <i class="fa-solid fa-user-ninja"
                                            style="font-size: 80px;backgorund-color:white;"></i>
                                    </a>
                                    <p class="text-center">{{ auth()->user()->name }}</p>
                                </div>

                             </div>
                        </div>
                    </div>
                    <div class="flex -mr-2 md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button"
                            class="relative inline-flex items-center justify-center p-2 text-gray-400 bg-gray-800 rounded-md hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg class="block w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg class="hidden w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div>
                        <form id="logout-form" action="{{ route('logout.view') }}" method="POST" >
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            </div>

        </nav>
        <main>
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>

</body>
<script>
    function toggleModal(num) {
        console.log(num)
        document.getElementById('editProject'+ num).classList.toggle('hidden')
    }

    function closeModal()
    {
        document.getElementById('editProject').classList.toggle('hidden')
    }
</script>

</html>
