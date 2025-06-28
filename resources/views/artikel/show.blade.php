<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Artikel
        </h2>
    </x-slot>
    <div class="container mx-auto py-4">
        <div class="max-w-4xl mx-auto bg-white rounded shadow overflow-hidden">
            @if($artikel->gambar)
                <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->judul }}" class="w-full h-64 object-cover">
            @endif
            <div class="p-6">
                <h1 class="text-3xl font-bold mb-4">{{ $artikel->judul }}</h1>
                <div class="flex items-center text-gray-600 mb-4">
                    <span class="mr-4">Kategori: {{ $artikel->kategori->nama }}</span>
                    <span class="mr-4">Penulis: {{ $artikel->user->name }}</span>
                    @if($artikel->published_at)
                        <span>Dipublish: {{ $artikel->published_at->format('d M Y H:i') }}</span>
                    @else
                        <span class="text-yellow-600">Draft</span>
                    @endif
                </div>
                <div class="prose max-w-none">
                    {!! nl2br(e($artikel->isi)) !!}
                </div>
                <div class="mt-6 pt-4 border-t">
                    <a href="{{ route('artikel.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Kembali</a>
                    @if(Auth::user()->level === 'admin' || Auth::id() === $artikel->user_id)
                        <a href="{{ route('artikel.edit', $artikel) }}" class="bg-yellow-400 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded ml-2">Edit</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 