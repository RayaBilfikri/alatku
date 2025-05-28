<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        return view('superadmin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('superadmin.articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten_artikel' => 'required',
            'tanggal_publish' => 'required|date',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('articles', 'public');
        }

        Article::create($validated);

        return redirect()->route('superadmin.articles.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('superadmin.articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten_artikel' => 'required',
            'tanggal_publish' => 'required|date',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($article->gambar) {
                Storage::disk('public')->delete($article->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('articles', 'public');
        }

        $article->update($validated);

        return redirect()->route('superadmin.articles.index')->with('success', 'Data berhasil disimpan');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        if ($article->gambar) {
            Storage::disk('public')->delete($article->gambar);
        }
        $article->delete();

        return redirect()->route('superadmin.articles.index')->with('success', 'Data berhasil dihapus');
    }
}
