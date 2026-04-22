<x-layouts.app>
    <div class="p-6">
        <h2 class="text-2xl text-black font-bold mb-4">🛒 Your Cart</h2>

        @if($cart && $cart->items->count() > 0)
            <div class="bg-white shadow rounded overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="p-4 text-left">Product</th>
                            <th class="p-4 text-center">Price</th>
                            <th class="p-4 text-center">Qty</th>
                            <th class="p-4 text-center">Subtotal</th>
                            <th class="p-4 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $grandTotal = 0; @endphp
                        @foreach($cart->items as $item)
                            @php 
                                $subtotal = $item->product->price * $item->quantity; 
                                $grandTotal += $subtotal;
                            @endphp
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-4">{{ $item->product->name }}</td>
                                <td class="p-4 text-center">{{ $item->product->price }} PKR</td>
                                <td class="p-4 text-center">{{ $item->quantity }}</td>
                                <td class="p-4 text-center font-semibold">{{ $subtotal }} PKR</td>
                                <td class="p-4 text-center">
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm transition">
                                            Remove
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-8 bg-gray-100 p-6 rounded-lg shadow-sm flex flex-col items-end">
                <div class="text-right mb-4">
                    <span class="text-gray-600 text-lg">Grand Total:</span>
                    <h3 class="text-3xl font-bold text-indigo-700">{{ $grandTotal }} PKR</h3>
                </div>

                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-lg font-bold text-lg transition shadow-md">
                        Proceed to Checkout
                    </button>
                </form>
            </div>
        @else
            <div class="bg-white p-8 rounded shadow text-center">
                <p class="text-xl text-gray-600 mb-4">No items in your cart yet! 🛒</p>
                <a href="/" class="text-indigo-600 font-bold hover:underline">Continue Shopping</a>
            </div>
        @endif
    </div>
</x-layouts.app>