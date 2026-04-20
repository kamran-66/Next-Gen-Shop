<x-layouts.app>

<div class="p-6">

<h2 class="text-2xl text-black font-bold mb-4">📦 Orders</h2>

@foreach($orders as $order)

<div class="bg-white p-4 mb-4 shadow rounded">

    <div class="flex justify-between">
        <div>
            <p><strong>Order ID:</strong> {{ $order->id }}</p>
            <p><strong>User:</strong> {{ $order->user->name }}</p>
            <p><strong>Total:</strong> {{ $order->total }} PKR</p>
        </div>

        <form method="POST" action="{{ route('orders.update', $order) }}">
            @csrf
            @method('PUT')

            <select name="status" class="border p-1">
                <option {{ $order->status == 'pending' ? 'selected' : '' }}>pending</option>
                <option {{ $order->status == 'completed' ? 'selected' : '' }}>completed</option>
            </select>

            <button class="bg-indigo-600 text-white px-3 py-1 rounded ml-2">
                Update
            </button>
        </form>
    </div>

    <!-- Items -->
    <div class="mt-3 border-t pt-2">

        @foreach($order->items as $item)
            <p>
                {{ $item->product->name }} 
                ({{ $item->quantity }}) - {{ $item->price }} PKR
            </p>
        @endforeach

    </div>

</div>

@endforeach

</div>

</x-layouts.app>