<?php

// app/Http/Controllers/CarouselController.php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousels = Carousel::all();
        return view('superadmin.carousel.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'judul' => 'required|string|max:255',
                'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'link' => 'nullable|string',
                'status' => 'required|in:aktif,nonaktif',
            ],
            [
                'judul.required'  => 'Judul wajib diisi.',
                'judul.string'    => 'Judul harus berupa teks.',
                'judul.max'       => 'Judul maksimal 255 karakter.',
                'gambar.required' => 'Gambar wajib diunggah.',
                'gambar.image'    => 'File yang diunggah harus berupa gambar.',
                'gambar.mimes'    => 'Format gambar harus jpeg, png, atau jpg.',
                'gambar.max'      => 'Ukuran gambar maksimal 2 MB.',
                'link.string'     => 'Link harus berupa teks.',
                'status.required' => 'Status wajib dipilih.',
                'status.in'       => 'Status harus diisi dengan nilai aktif atau nonaktif.',
            ]
        );

        $path = $request->file('gambar')->store('carousel', 'public');

        $carousel = Carousel::create([
            'judul' => $request->judul,
            'gambar' => $path,
            'link' => $request->link,
            'status' => $request->status,
        ]);

        return redirect()->route('superadmin.carousel.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carousel = Carousel::findOrFail($id);
        return view('superadmin.carousel.show', compact('carousel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carousel = Carousel::findOrFail($id);
        return view('superadmin.carousel.edit', compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $carousel = Carousel::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'link' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
        ], [
            'judul.required'  => 'Judul wajib diisi.',
            'judul.string'    => 'Judul harus berupa teks.',
            'judul.max'       => 'Judul maksimal 255 karakter.',
            'gambar.image'    => 'File yang diunggah harus berupa gambar.',
            'gambar.mimes'    => 'Format gambar harus jpeg, png, atau jpg.',
            'gambar.max'      => 'Ukuran gambar maksimal 2 MB.',
            'link.string'     => 'Link harus berupa teks.',
            'status.required' => 'Status wajib dipilih.',
            'status.in'       => 'Status harus diisi dengan nilai aktif atau nonaktif.',
        ]);

        if ($request->hasFile('gambar')) {
            // hapus file lama
            Storage::disk('public')->delete($carousel->gambar);
            $carousel->gambar = $request->file('gambar')->store('carousel', 'public');
        }

        $carousel->update($request->only(['judul', 'link', 'status']));

        return redirect()->route('superadmin.carousel.index')
            ->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carousel = Carousel::findOrFail($id);
        Storage::disk('public')->delete($carousel->gambar);
        $carousel->delete();

        return redirect()->route('superadmin.carousel.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
