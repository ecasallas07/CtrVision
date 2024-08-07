<x-layout>
    <h2 class="text-xl font-semibold leading-7 text-gray-900">Projects</h2>
    <ul role="list" class="p-4 divide-y divide-gray-100 hover:bg-gray-100">
        {{-- {{dd($projects)}} --}}
        @foreach ($projects as $ele)
            <li class="flex justify-between py-5 gap-x-6">
                <div class="flex min-w-0 gap-x-4">
                    <i class="fa-solid fa-sheet-plastic" style="font-size: 60px; "></i>
                    <div class="flex-auto min-w-0">
                        <p class="text-sm font-semibold leading-6 text-gray-900">{{ $ele->title }}</p>
                        <p class="mt-1 text-xs leading-5 text-gray-500 truncate">{{ $ele->description }}</p>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <div style="display: flex;">
                        <a href="{{ $ele->link_repo }}"><i class="fa-brands fa-github"
                                style="font-size: 30px;margin:2px;"></i></a>

                        <button
                            class="px-6 py-2 mx-px font-medium text-white transition duration-500 bg-blue-500 rounded hover:bg-blue-700"
                            data-id="{{$ele->id}}"
                            data-description="{{$ele->description}}"
                            data-link="{{$ele->link_repo}}"
                            data-title="{{$ele->title}}"
                            onclick="toggleModal(this)" ><i class="fa-regular fa-pen-to-square"></i></button>
                        <form method="post" action="{{ route('project.delete', $ele->id) }}" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-6 py-2 font-medium text-white transition duration-500 bg-red-500 rounded hover:bg-red-700"><i class="fa-solid fa-trash-can"
                                    style="font-size: 15px;"></i></button>
                        </form>
                    </div>

                </div>
            </li>
        @endforeach

    </ul>






    <!-- Main modal -->
    <div class="fixed top-0 left-0 z-10 hidden w-full overflow-y-auto" id="modal">
        <form id="modal-form" action="" method="POST">
            @csrf
            {{-- @method('UPDATE') --}}
            <div class="flex items-center justify-center px-4 pt-4 pb-20 text-center min-height-100vh sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-900 opacity-75" />
                </div>
                <div id="modalContainer"></div>
                <input type="hidden" id="modal-id"/>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                <div class="inline-block overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl align-center sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                        <label class="font-medium text-gray-800">Title</label>
                        <input type="text" class="w-full p-2 mt-2 mb-3 bg-gray-100 rounded outline-none" id="modal-id-title" />
                        <label class="font-medium text-gray-800">Description</label>
                        <input type="text" class="w-full p-2 mt-2 mb-3 bg-gray-100 rounded outline-none" id="modal-id-description" />
                        <label class="font-medium text-gray-800">Link repository</label>
                        <input type="text" class="w-full p-2 mt-2 mb-3 bg-gray-100 rounded outline-none" id="modal-id-link" />
                    </div>
                    <div class="px-4 py-3 text-right bg-gray-200">
                        <button type="button" class="px-4 py-2 mr-2 text-white bg-gray-500 rounded hover:bg-gray-700"
                            onclick="closeModal()"><i class="fas fa-times"></i> Cancel</button>
                        <button type="submit"
                            class="px-4 py-2 mr-2 font-medium text-white transition duration-500 bg-blue-500 rounded hover:bg-blue-700"><i
                                class="fas fa-plus"></i>Edit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


</x-layout>
