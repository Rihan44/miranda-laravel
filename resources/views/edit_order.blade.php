<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Your Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-4xl font-bold dark:text-dark">Edit your Order</h2>
                    <form class="max-w-sm mx-auto" method="POST">
                        @csrf
                        @foreach ($order as $or)
                            <div class="mb-5">
                                <label for="type" class="block mb-2 text-sm font-medium text-white-900 dark:text-dark">Order Type</label>
                                <input type="text" id="type" name="type" class="shadow-sm bg-white-50 border border-white-300 text-dark-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-white-600 dark:placeholder-dark-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{$or->type}}" required>
                            </div>
                            <div class="mb-5">
                                <label for="description" class="block mb-2 text-sm font-medium text-dark-900 dark:text-dark">Order Description</label>
                                <input type="text" id="description" name="description" class="shadow-sm bg-white-50 border border-white-300 text-dark-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-white-600 dark:placeholder-white-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{$or->description}}" required>
                            </div>
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <div class="mb-7">
                                <label for="room" class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark">Select the Room</label>
                                <select id="room" name="room_id" class="bg-white-50 border border-white-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-white-600 dark:placeholder-dark-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected readonly>{{$or->room->room_number}}</option>
                                </select>
                            </div>
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
