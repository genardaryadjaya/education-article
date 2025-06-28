<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Artikel
        </h2>
    </x-slot>
    <div class="container mx-auto py-4">
        <form action="{{ route('artikel.update', $artikel) }}" method="POST" enctype="multipart/form-data" class="max-w-2xl bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Judul Artikel</label>
                <input type="text" name="judul" class="w-full border rounded px-3 py-2 @error('judul') border-red-500 @enderror" value="{{ old('judul', $artikel->judul) }}" required>
                @error('judul')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Kategori</label>
                <select name="kategori_id" class="w-full border rounded px-3 py-2 @error('kategori_id') border-red-500 @enderror" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ old('kategori_id', $artikel->kategori_id) == $kategori->id ? 'selected' : '' }}>
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
                <textarea name="isi" rows="10" class="w-full border rounded px-3 py-2 @error('isi') border-red-500 @enderror" required>{{ old('isi', $artikel->isi) }}</textarea>
                @error('isi')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Gambar Saat Ini</label>
                @if($artikel->gambar)
                    <img src="{{ $artikel->gambar_url }}" alt="Gambar saat ini" class="w-32 h-32 object-cover border rounded mb-2">
                @else
                    <p class="text-gray-500">Tidak ada gambar</p>
                @endif
                <input type="file" name="gambar" class="w-full border rounded px-3 py-2 @error('gambar') border-red-500 @enderror" accept="image/*">
                <p class="text-sm text-gray-600 mt-1">Biarkan kosong jika tidak ingin mengubah gambar</p>
                @error('gambar')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="flex items-center">
                    <input type="checkbox" name="publish" class="mr-2" {{ old('publish', $artikel->published_at ? 'checked' : '') ? 'checked' : '' }}>
                    <span class="font-semibold">Publish Sekarang</span>
                </label>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                <a href="{{ route('artikel.index') }}" class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout> 