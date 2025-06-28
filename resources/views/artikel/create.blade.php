<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Artikel
        </h2>
    </x-slot>
    <div class="container mx-auto py-4">
        <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data" class="max-w-2xl bg-white p-6 rounded shadow">
            @csrf
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Judul Artikel</label>
                <input type="text" name="judul" class="w-full border rounded px-3 py-2 @error('judul') border-red-500 @enderror" value="{{ old('judul') }}" required>
                @error('judul')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Kategori</label>
                <select name="kategori_id" class="w-full border rounded px-3 py-2 @error('kategori_id') border-red-500 @enderror" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Isi Artikel</label>
                <textarea name="isi" rows="10" class="w-full border rounded px-3 py-2 @error('isi') border-red-500 @enderror" required>{{ old('isi') }}</textarea>
                @error('isi')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Gambar (Opsional)</label>
                <input type="file" name="gambar" class="w-full border rounded px-3 py-2 @error('gambar') border-red-500 @enderror" accept="image/*">
                @error('gambar')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="flex items-center">
                    <input type="checkbox" name="publish" class="mr-2" {{ old('publish') ? 'checked' : '' }}>
                    <span class="font-semibold">Publish Sekarang</span>
                </label>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
                <a href="{{ route('artikel.index') }}" class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout> 