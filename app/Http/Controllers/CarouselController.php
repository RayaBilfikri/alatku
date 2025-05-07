<?php

// app/Http/Controllers/CarouselController.php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    public function index()
    {
        $carousels = Carousel::all();
        return view('superadmin.carousel.index', compact('carousels'));
    }

    public function create()
    {
        return view('superadmin.carousel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'link' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $path = $request->file('gambar')->store('carousel', 'public');

        $carousel = Carousel::create([
            'judul' => $request->judul,
            'gambar' => $path,
            'link' => $request->link,
            'status' => $request->status,
        ]);

        return response()->json($carousel, 201);
    }

    public function show($id)
    {
        $carousel = Carousel::findOrFail($id);
        return response()->json($carousel);
    }

    public function update(Request $request, $id)
    {
        $carousel = Carousel::findOrFail($id);

        $request->validate([
            'judul' => 'sometimes|required|string|max:255',
            'gambar' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
            'link' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        if ($request->hasFile('gambar')) {
            // hapus file lama
            Storage::disk('public')->delete($carousel->gambar);
            $carousel->gambar = $request->file('gambar')->store('carousel', 'public');
        }

        $carousel->update($request->only(['judul', 'link', 'status']));

        return response()->json($carousel);
    }

    public function destroy($id)
    {
        $carousel = Carousel::findOrFail($id);
        Storage::disk('public')->delete($carousel->gambar);
        $carousel->delete();

        return response()->json(['message' => 'Carousel deleted']);
    }
}

