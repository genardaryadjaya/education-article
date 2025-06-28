<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div class="bg-white rounded shadow p-6">
                    <div class="text-gray-500">Total Artikel</div>
                    <div class="text-3xl font-bold">{{ \App\Models\Artikel::count() }}</div>
                </div>
                <div class="bg-white rounded shadow p-6">
                    <div class="text-gray-500">Artikel Published</div>
                    <div class="text-3xl font-bold">{{ \App\Models\Artikel::whereNotNull('published_at')->count() }}</div>
                </div>
                <div class="bg-white rounded shadow p-6">
                    <div class="text-gray-500">Total Kategori</div>
                    <div class="text-3xl font-bold">{{ \App\Models\Kategori::count() }}</div>
                </div>
                <div class="bg-white rounded shadow p-6">
                    <div class="text-gray-500">Total User</div>
                    <div class="text-3xl font-bold">{{ \App\Models\User::count() }}</div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white rounded shadow p-6">
                    <div class="text-gray-500">Total Admin</div>
                    <div class="text-3xl font-bold">{{ \App\Models\User::where('level', 'admin')->count() }}</div>
                </div>
                <div class="bg-white rounded shadow p-6">
                    <div class="text-gray-500">Artikel Draft</div>
                    <div class="text-3xl font-bold">{{ \App\Models\Artikel::whereNull('published_at')->count() }}</div>
                </div>
            </div>
            <div class="bg-white rounded shadow p-6 mt-6">
                <div class="text-lg font-semibold mb-2">Jumlah Artikel per Kategori</div>
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left">Kategori</th>
                            <th class="px-4 py-2 text-left">Jumlah Artikel</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\Kategori::withCount('artikels')->get() as $kategori)
                        <tr>
                            <td class="px-4 py-2">{{ $kategori->nama }}</td>
                            <td class="px-4 py-2">{{ $kategori->artikels_count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
