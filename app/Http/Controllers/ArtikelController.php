<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::with('kategori', 'user')->orderByDesc('published_at')->get();
        return view('artikel.index', compact('artikels'));
    }

    public function create()
    {
        $kategoris = Kategori::orderBy('nama')->get();
        return view('artikel.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:200',
            'isi' => 'required',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar' => 'nullable|image|max:2048',
        ]);
        $data = $request->only('judul', 'isi', 'kategori_id');
        $data['user_id'] = Auth::id();
        $data['published_at'] = $request->has('publish') ? now() : null;
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }
        Artikel::create($data);
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function edit(Artikel $artikel)
    {
        $user = Auth::user();
        if ($user->level !== 'admin' && $artikel->user_id !== $user->id) {
            abort(403);
        }
        $kategoris = Kategori::orderBy('nama')->get();
        return view('artikel.edit', compact('artikel', 'kategoris'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $user = Auth::user();
        if ($user->level !== 'admin' && $artikel->user_id !== $user->id) {
            abort(403);
        }
        $request->validate([
            'judul' => 'required|max:200',
            'isi' => 'required',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar' => 'nullable|image|max:2048',
        ]);
        $data = $request->only('judul', 'isi', 'kategori_id');
        if ($request->hasFile('gambar')) {
            if ($artikel->gambar) {
                Storage::disk('public')->delete($artikel->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }
        $data['published_at'] = $request->has('publish') ? now() : null;
        $artikel->update($data);
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diupdate!');
    }

    public function destroy(Artikel $artikel)
    {
        $user = Auth::user();
        if ($user->level !== 'admin' && $artikel->user_id !== $user->id) {
            abort(403);
        }
        if ($artikel->gambar) {
            Storage::disk('public')->delete($artikel->gambar);
        }
        $artikel->delete();
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus!');
    }

    public function show(Artikel $artikel)
    {
        return view('artikel.show', compact('artikel'));
    }

    public function publish(Artikel $artikel)
    {
        $user = Auth::user();
        if ($user->level !== 'admin' && $artikel->user_id !== $user->id) {
            abort(403);
        }
        $artikel->published_at = now();
        $artikel->save();
        return back()->with('success', 'Artikel berhasil dipublish!');
    }

    public function unpublish(Artikel $artikel)
    {
        $user = Auth::user();
        if ($user->level !== 'admin' && $artikel->user_id !== $user->id) {
            abort(403);
        }
        $artikel->published_at = null;
        $artikel->save();
        return back()->with('success', 'Artikel berhasil di-unpublish!');
    }
}
