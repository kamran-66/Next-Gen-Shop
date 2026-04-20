<x-layouts.app>

<div class="p-6">

<h2 class="text-2xl text-black font-bold mb-4">🛒 Your Cart</h2>

@if($cart && $cart->items->count())

<table class="w-full bg-white shadow rounded">

<tr class="border-b">
    <th class="p-2">Product</th>
    <th>Price</th>
    <th>Qty</th>
    <th>Action</th>
</tr>

@foreach($cart->items as $item)
<tr class="border-b text-center">

    <td class="p-2">{{ $item->product->name }}</td>
    <td>{{ $item->product->price }}</td>
    <td>{{ $item->quantity }}</td>

    <td>
        @php $total = 0; @endphp

@foreach($cart->items as $item)
    @php
        $total += $item->product->price * $item->quantity;
    @endphp
@endforeach

<div class="mt-4">
    <h3 class="text-xl font-bold">Total: {{ $total }} PKR</h3>

    <form action="{{ route('checkout') }}" method="POST">
        @csrf
        <button class="bg-indigo-600 text-white px-6 py-2 mt-2 rounded mb-8">
            Checkout
        </button>
        <form action="{{ route('cart.remove',$item->id) }}" method="POST">
            @csrf
            <button class="bg-red-500 text-white px-3 py-1 rounded">
                Remove
            </button>
        </form>
    </td>

</tr>
@endforeach

</table>

@else


<p class=" text-black mb-4">No items in cart</p>

@endif

</div>

</x-layouts.app>