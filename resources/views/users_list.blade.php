<x-layouts.app>
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">User Management</h2>
            <p class="text-sm text-gray-500">Manage all registered users and their roles</p>
        </div>
        <span class="bg-indigo-100 text-indigo-700 px-4 py-2 rounded-full font-bold text-sm">
            Total Users: {{ $users->total() }}
        </span>
    </div>

    @if($users->isEmpty())
        <div class="bg-white p-10 text-center rounded-xl shadow">
            <p class="text-gray-500 italic">No users found in the system.</p>
        </div>
    @else
        <div class="bg-white shadow-md rounded-xl overflow-hidden border border-gray-100">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="p-4 font-bold text-gray-600 uppercase text-xs tracking-wider">ID</th>
                        <th class="p-4 font-bold text-gray-600 uppercase text-xs tracking-wider">User Details</th>
                        <th class="p-4 font-bold text-gray-600 uppercase text-xs tracking-wider text-center">Role</th>
                        <th class="p-4 font-bold text-gray-600 uppercase text-xs tracking-wider text-center">Joined Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($users as $user)
                    <tr class="hover:bg-indigo-50 transition">
                        <td class="p-4 text-gray-500 font-mono text-sm">#{{ $user->id }}</td>
                        <td class="p-4">
                            <div class="font-bold text-gray-800">{{ $user->name }}</div>
                            <div class="text-sm text-gray-500">{{ $user->email }}</div>
                        </td>
                        <td class="p-4 text-center">
                            <span class="px-3 py-1 rounded-full text-xs font-bold uppercase {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' }}">
                                {{ $user->role }}
                            </span>
                        </td>
                        <td class="p-4 text-center text-gray-600 text-sm">
                            {{ $user->created_at->format('M d, Y') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="p-4 bg-gray-50 border-t border-gray-100">
                {{ $users->links() }}
            </div>
        </div>
    @endif
</div>
</x-layouts.app>