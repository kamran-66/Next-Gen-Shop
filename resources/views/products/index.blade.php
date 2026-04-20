<x-layouts.app>

<div class="p-6">

    <h2 class="text-2xl text-black font-bold mb-4">Products</h2>

    <a href="{{ route('products.create') }}" 
       class="bg-indigo-600 text-white px-4 py-2 rounded">Add Product</a><br><br>
       

    {{-- @if(session('success'))
        <p class="text-green-600 mt-2">{{ session('success') }}</p>
    @endif --}}


@if(session('success'))
    <div id="success-alert" style="padding: 10px; background-color: #d4edda; color: #155724; margin-bottom: 10px;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div id="error-alert" style="padding: 10px; background-color: #f8d7da; color: #721c24; margin-bottom: 10px;">
        {{ session('error') }}
    </div>
@endif

    <div class="grid grid-cols-3 gap-6 mt-6">
        @foreach($products as $product)
        <div class="bg-white p-4 shadow rounded">

            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}" class="h-40 w-full object-cover">
            @endif

            <h3 class="font-bold mt-2">{{ $product->name }}</h3>
            <p>{{ $product->price }} PKR</p>

             <!-- 🔥 ADD TO CART BUTTON -->
    @if($product->stock > 0)
    <p class="text-green-600 font-bold">In Stock: {{ $product->stock }}</p>
    
    {{-- <form action="{{ route('cart.add', $product->id) }}" method="POST">
        @csrf
        <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="border rounded w-16 px-2 py-1 mb-2">
        
        <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded mt-2 hover:bg-green-700">
            Add to Cart
        </button>
    </form> --}}


    <form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="submit " class="bg-green-600 text-white px-3 py-1 rounded mt-2 hover:bg-green-700">Add to Cart</button>
</form>

@else
    <p class="text-red-600 font-bold mt-2">Out of Stock</p>
    <button disabled class="bg-gray-400 text-white px-3 py-1 rounded mt-2 cursor-not-allowed">
        Add to Cart
    </button>
@endif

            <div class="flex gap-2 mt-2">
                <a href="{{ route('products.edit',$product) }}" class="bg-yellow-500 px-3 py-1 text-white rounded">Edit</a>

                <form action="{{ route('products.destroy',$product) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 px-3 py-1 text-white rounded">Delete</button>
                </form>
            </div>

        </div>
        @endforeach
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Success message hide karein
        setTimeout(function() {
            let successAlert = document.getElementById('success-alert');
            if (successAlert) {
                successAlert.style.display = 'none';
            }
        }, 3000); // 3000 milliseconds = 3 seconds

        // Error message hide karein
        setTimeout(function() {
            let errorAlert = document.getElementById('error-alert');
            if (errorAlert) {
                errorAlert.style.display = 'none';
            }
        }, 3000);
    });
</script>

</x-layouts.app>




{{-- @if($product->stock > 0)
    <p class="text-green-600 font-bold">In Stock: {{ $product->stock }}</p>
    
    <form action="{{ route('cart.add', $product->id) }}" method="POST">
        @csrf
        <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="border rounded w-16 px-2 py-1 mb-2">
        
        <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded mt-2 hover:bg-green-700">
            Add to Cart
        </button>
    </form>
@else
    <p class="text-red-600 font-bold mt-2">Out of Stock</p>
    <button disabled class="bg-gray-400 text-white px-3 py-1 rounded mt-2 cursor-not-allowed">
        Add to Cart
    </button>
@endif --}}