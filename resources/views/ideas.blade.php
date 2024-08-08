<x-layout>


<div class="bg-white">
    <div>
        <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
            <!--
          Off-canvas menu backdrop, show/hide based on off-canvas menu state.

          Entering: "transition-opacity ease-linear duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "transition-opacity ease-linear duration-300"
            From: "opacity-100"
            To: "opacity-0"
        -->
            <div class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>

            <div class="fixed inset-0 z-40 flex">

                    <form class="mt-4 border-t border-gray-200">

                    </form>
                </div>
            </div>
        </div>

        <main class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-baseline justify-between pt-24 pb-6 border-b border-gray-200">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900">New Ideas</h1>

                <div class="flex items-center">
                    <div class="relative inline-block text-left">
                    </div>
                    <button type="button" class="p-2 ml-4 -m-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden">
                        <span class="sr-only">Filters</span>
                        <svg class="w-5 h-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 01.628.74v2.288a2.25 2.25 0 01-.659 1.59l-4.682 4.683a2.25 2.25 0 00-.659 1.59v3.037c0 .684-.31 1.33-.844 1.757l-1.937 1.55A.75.75 0 018 18.25v-5.757a2.25 2.25 0 00-.659-1.591L2.659 6.22A2.25 2.25 0 012 4.629V2.34a.75.75 0 01.628-.74z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>

            <section aria-labelledby="products-heading" class="pt-6 pb-24">
                <h2 id="products-heading" class="sr-only">Products</h2>

                <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                    <!-- TODO: FORM -->
                    <form class="hidden lg:block" action="{{ route('idea.create') }}" method="POST">
                        @csrf
                        <h3 class="sr-only">Categories</h3>
                        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-1">
                            <div>
                                <label for="title" class="block text-sm font-semibold leading-6 text-gray-900">Title</label>
                                <div class="mt-2.5">
                                    <input type="text" name="title" id="first-name" autocomplete="given-name"
                                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>

                            </div>
                            <div class="sm:col-span-2">
                                <label for="tag" class="block text-sm font-semibold leading-6 text-gray-900">Tag</label>
                                <div class="mt-2.5">
                                    <input type="text" name="tag" id="company" autocomplete="organization"
                                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>

                            </div>
                            <div class="sm:col-span-2">
                                <label for="tools" class="block text-sm font-semibold leading-6 text-gray-900">Tools</label>
                                <div class="mt-2.5">
                                    <input type="text" name="tools" id="first-name" autocomplete="given-name"
                                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>


                            <div class="sm:col-span-2">
                                <label for="description" class="block text-sm font-semibold leading-6 text-gray-900">Description</label>
                                <div class="mt-2.5">
                                    <textarea name="description" id="message" rows="4"
                                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="mt-10">
                            <button type="submit"
                                class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create Idea</button>
                        </div>
                    </form>

                    <!-- Product grid -->
                    <div class="lg:col-span-3">
                        <x-ideas></x-ideas>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>

</x-layout>
