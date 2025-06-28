<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Kategori
        </h2>
    </x-slot>
    <div class="container mx-auto py-4">
        <form action="{{ route('kategori.store') }}" method="POST" class="max-w-md bg-white p-6 rounded shadow">
            @csrf
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Nama Kategori</label>
                <input type="text" name="nama" class="w-full border rounded px-3 py-2 @error('nama') border-red-500 @enderror" value="{{ old('nama') }}" required>
                @error('nama')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex gap-2">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
                <a href="{{ route('kategori.index') }}" class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout> 