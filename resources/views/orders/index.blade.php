<x-layouts.app>
<div class="p-6">
    <h2 class="text-2xl text-gray-800 font-bold mb-6">📦 Order Management</h2>

    @foreach($orders as $order)
    <div class="bg-white border border-gray-200 p-5 mb-6 shadow-sm rounded-xl hover:shadow-md transition">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div class="space-y-1">
                <div class="flex items-center gap-3">
                    <span class="text-lg font-bold text-indigo-600">Order #{{ $order->id }}</span>
                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase {{ $order->status == 'completed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                        {{ $order->status }}
                    </span>
                </div>
                <p class="text-gray-600 text-sm"><strong>Customer:</strong> {{ $order->user->name }}</p>
                <p class="text-gray-800 font-semibold"><strong>Total Amount:</strong> {{ number_format($order->total) }} PKR</p>
            </div>

            <form method="POST" action="{{ route('orders.update', $order) }}" class="flex items-center gap-2 bg-gray-50 p-2 rounded-lg">
                @csrf
                @method('PUT')
                <select name="status" class="bg-white border border-gray-300 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 p-1.5">
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm px-4 py-1.5 rounded-md font-medium transition">
                    Update
                </button>
            </form>
        </div>

        <div class="mt-4 border-t border-gray-100 pt-4">
            <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Order Items</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                @foreach($order->items as $item)
                <div class="flex justify-between bg-gray-50 p-2 rounded text-sm">
                    <span class="text-gray-700">{{ $item->product->name }} <span class="text-gray-400">x{{ $item->quantity }}</span></span>
                    <span class="font-medium">{{ number_format($item->price) }} PKR</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
</div>
</x-layouts.app>