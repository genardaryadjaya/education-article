<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Artikel
        </h2>
    </x-slot>
    <div class="container mx-auto py-4">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('artikel.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">+ Tambah Artikel</a>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($artikels as $artikel)
            <div class="bg-white rounded shadow overflow-hidden">
                <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->judul }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-bold text-lg mb-2">{{ $artikel->judul }}</h3>
                    <p class="text-gray-600 text-sm mb-2">
                        Kategori: {{ $artikel->kategori->nama }} | 
                        Penulis: {{ $artikel->user->name }}
                    </p>
                    <p class="text-gray-500 text-sm mb-3">
                        {{ Str::limit($artikel->isi, 100) }}
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="px-2 py-1 text-xs rounded {{ $artikel->published_at ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ $artikel->published_at ? 'Published' : 'Draft' }}
                        </span>
                        <div class="flex gap-2">
                            <a href="{{ route('artikel.show', $artikel) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded text-sm">Lihat</a>
                            <a href="{{ route('artikel.edit', $artikel) }}" class="bg-yellow-400 hover:bg-yellow-600 text-white py-1 px-3 rounded text-sm">Edit</a>
                            @if($artikel->published_at)
                                <form action="{{ route('artikel.unpublish', $artikel) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-orange-500 hover:bg-orange-700 text-white py-1 px-3 rounded text-sm">Unpublish</button>
                                </form>
                            @else
                                <form action="{{ route('artikel.publish', $artikel) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white py-1 px-3 rounded text-sm">Publish</button>
                                </form>
                            @endif
                            <form action="{{ route('artikel.destroy', $artikel) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded text-sm">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout> 