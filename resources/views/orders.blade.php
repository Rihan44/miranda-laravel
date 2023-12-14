<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <h2 class="text-4xl font-bold dark:text-dark">{{Auth::user()->name }}'s Order</h2>
                   @if(session('success'))
                        <div class="alert alert-success">
                            {{toastify()->success(session('success'));}}
                        </div>

                        @elseif(session('error'))
                            <div class="alert alert-danger">
                                {{toastify()->error(session('error'));}}
                            </div>
                    @endif
                </div>
                <div class="p-6 ">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-dark-500 dark:text-dark-400">
                            <thead class="text-darkext-dark-700 uppercase bg-white-50 dark:bg-white-700 dark:text-dark-400 border-b odd:bg-whitee odd:dark:bg-white-900 even:bg-white-50 even:dark:bg-white-800 border-b dark:border-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Room Number
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Order Type
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Description
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Edit
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Delete
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ( $orders as $order )
                                <tr class="odd:bg-whitee odd:dark:bg-white-900 even:bg-white-50 even:dark:bg-white-800 border-b dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                                        {{$order->room->room_number}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$order->type}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$order->description}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <button type="button" class="px-3 py-2 text-xs font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                            <a href="/edit_order/{{$order->id}}">                           
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        </button>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{-- TODO METER UN MODAL PARA ACEPTAR --}}
                                        {{-- <button type="submit" class="px-3 py-2 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                            {{toastify()->success('Your action was successful!');}}
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button> --}}
                                        <form method="post" action="{{ route('orders.destroy') }}">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="id" value="{{$order->id}}">
                                            <button type="submit" class="px-3 py-2 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </form>    
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
