<x-layouts.app>

<div class="p-6 max-w-lg">

<h2 class="text-xl font-bold mb-4">Add Product</h2>

<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
@csrf

<div class="mt-4">
    <label class="block font-medium text-sm text-gray-700">Select Category</label><br>
    <select name="category" class="w-full mb-2 p-2 border focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
        <option value="Electronics">Electronics</option>
        <option value="Fashion">Fashion</option>
        <option value="Home Decor">Home Decor</option>
        <option value="Accessories">Accessories</option>
    </select>
</div>

<input type="text" name="name" placeholder=" Name" class="w-full mb-2 p-2 border focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">

<textarea name="description" placeholder=" Description" class="w-full mb-2 p-2 border  focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"></textarea>

<input type="number" name="price" placeholder=" Price" class="w-full mb-2 p-2 border focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"><br><br>

<input type="file" name="image" class="mb-2"><br><br>

<button class="bg-indigo-600 text-white px-4 py-2 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">Save</button>

</form>

</div>

</x-layouts.app>