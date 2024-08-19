<x-layout>
    <h2 class="text-xl font-semibold leading-7 text-gray-900">Projects</h2>
    <ul role="list" class="p-4 divide-y divide-gray-100 hover:bg-gray-100">
        @foreach ($data as $ele)
        <li class="flex justify-between py-5 gap-x-6">
            <div class="flex min-w-0 gap-x-4">
                <img src="{{ $ele['owner']['avatar_url']}}" class="rounded h-14">
                <div class="flex-auto min-w-0">
                    <p class="text-sm font-semibold leading-6 text-gray-900">{{$ele['name']}}</p>
                    <p class="mt-1 text-xs leading-5 text-gray-500 truncate">{{$ele['description']}}</p>
                    <p class="text-sm font-semibold leading-6 text-gray-900">{{$ele['language']}}</p>
                </div>
            </div>
            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                <p class="text-sm leading-6 text-gray-900"></p>
                <a href="{{$ele['clone_url']}}"><i class="fa-brands fa-github" style="font-size: 30px;"></i></a>
            </div>
        </li>

        @endforeach

    </ul>


</x-layout>
