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
                   Orders {{Auth::user()->name }}
                   {{-- {{Auth::user()->id }} --}}
                </div>
                <div class="p-6 text-gray-900">
                    <ul>
                     @foreach ( $orders as $order )
                        <li>
                        {{$order->type}} Room Number: {{$order->room->room_number}} 
                        <a href="/edit_order/{{$order->id}}">Edit
                        </a>
                            <form method="post" action="{{ route('orders.destroy') }}" class="p-6">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" value="{{$order->id}}">
                                <x-danger-button class="ms-3">
                                    {{ __('Delete Order') }}
                                </x-danger-button>
                            </form>
                        </li>
                     @endforeach
                     </ul>
                 </div>
            </div>
        </div>
    </div>
</x-app-layout>
