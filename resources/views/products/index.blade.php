<x-layouts.app>
<div class="p-6 bg-gray-50 min-h-screen">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
        <div>
            <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Product Catalog</h2>
            <p class="text-gray-500 text-sm">Manage your inventory and showcase products.</p>
        </div>
        <a href="{{ route('products.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-xl font-bold shadow-lg shadow-indigo-200 transition-all active:scale-95">
            + Add New Product
        </a>
    </div>

    @if(session('success'))
        <div id="success-alert" class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 mb-6 rounded-r-lg shadow-sm animate-pulse" role="alert">
            <div class="flex items-center">
                <span class="mr-2">✅</span>
                <p class="font-medium">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($products as $product)
        <div class="group bg-white border border-gray-100 shadow-sm rounded-2xl overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 flex flex-col">
            

            <div class="mt-2 flex items-center justify-between">
    <span class="text-sm font-medium text-gray-500">Available Stock:</span>
    <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $product->stock > 10 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
        {{ $product->stock }} units
    </span>
</div>
            <div class="relative overflow-hidden bg-gray-100 aspect-square">
                @if($product->image)
                    <img src="{{ asset('storage/'.$product->image) }}" 
                         class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110"
                         alt="{{ $product->name }}">
                @else
                    <div class="h-full w-full flex flex-col items-center justify-center text-gray-400">
                        <span class="text-4xl mb-2">📸</span>
                        <span class="text-xs uppercase font-bold tracking-widest">No Image</span>
                    </div>
                @endif
                
                <div class="absolute top-3 right-3">
                    <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-tighter shadow-sm {{ $product->stock > 0 ? 'bg-emerald-500 text-white' : 'bg-rose-500 text-white' }}">
                        {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                    </span>
                </div>
            </div>

            <div class="p-5 flex-grow">
                <h3 class="text-lg font-bold text-gray-800 line-clamp-1 mb-1">{{ $product->name }}</h3>
                <div class="flex items-baseline gap-1 mb-4">
                    <span class="text-2xl font-black text-indigo-600">Rs. {{ number_format($product->price) }}</span>
                    <span class="text-xs text-gray-400 font-bold uppercase">PKR</span>
                </div>
                
                @if($product->stock > 0)
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="w-full bg-gray-900 hover:bg-indigo-600 text-white py-3 rounded-xl font-bold transition-colors duration-300 flex items-center justify-center gap-2">
                            <span>🛒</span> Add to Cart
                        </button>
                    </form>
                @else
                    <button disabled class="w-full bg-gray-100 text-gray-400 py-3 rounded-xl font-bold cursor-not-allowed">
                        Out of Stock
                    </button>
                @endif
            </div>

            <div class="px-5 py-4 bg-gray-50/50 flex gap-3 border-t border-gray-50">

               @if(auth()->user() && auth()->user()->is_admin) 
    {{-- <div class="flex gap-6"> --}}
        <a href="{{ route('products.edit', $product->id) }}" class="flex-1 text-center py-2 rounded-lg text-sm font-bold text-amber-600 bg-amber-50 hover:bg-amber-100 transition-colors">Edit</a>
        
        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-full py-2 rounded-lg text-sm font-bold text-rose-600 bg-rose-50 hover:bg-rose-100 transition-colors">Delete</button>
        </form>
    {{-- </div> --}}
@endif
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="p-4 bg-gray-50 border-t border-gray-100">
                {{ $products->links() }}
            </div>
        </div>

<script>
    setTimeout(() => {
        const alert = document.getElementById('success-alert');
        if(alert) alert.style.display = 'none';
    }, 4000);
</script>
</x-layouts.app>