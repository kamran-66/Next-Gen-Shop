<x-layouts.app>

<div class="p-6 max-w-lg">

<h2 class="text-xl font-bold mb-4">Add Product</h2>

<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
@csrf

<input type="text" name="name" placeholder="Name" class="w-full mb-2 p-2 border">

<textarea name="description" placeholder="Description" class="w-full mb-2 p-2 border"></textarea>

<input type="number" name="price" placeholder="Price" class="w-full mb-2 p-2 border">

<input type="file" name="image" class="mb-2">

<button class="bg-indigo-600 text-white px-4 py-2">Save</button>

</form>

</div>

</x-layouts.app>