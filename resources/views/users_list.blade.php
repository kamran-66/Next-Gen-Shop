<x-layouts.app>

<div class="p-6">


<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">



{{-- <h1 class="text-2xl font-bold mb-6">Users List</h1> --}}

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Users</h2>
            <span class="text-gray-600">
                Total: {{ $users->total() }}
            </span>
        </div>
                @if($users->isEmpty())
    <p class="text-gray-500 text-center py-6">No users found</p>
@endif

<div class="bg-white shadow rounded-lg overflow-hidden">

    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-3">ID</th>
                <th class="p-3">Name</th>
                <th class="p-3">Email</th>
                <th class="p-3">Role</th>
                <th class="p-3">Created</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3">{{ $user->id }}</td>
                <td class="p-3">{{ $user->name }}</td>
                <td class="p-3">{{ $user->email }}</td>
                <td class="p-3">{{ $user->role }}</td>
                <td class="p-3">{{ $user->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
    {{ $users->links() }}
</div>

</div>

</body>
</html>


</div>
</x-layouts.app>