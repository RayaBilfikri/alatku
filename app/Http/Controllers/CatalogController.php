<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::with('subCategories')->get();

        $query = Product::with(['subCategory.category', 'contact']);

        // Filter berdasarkan subkategori
        if ($request->has('subcategory') && $request->subcategory) {
            $query->whereHas('subCategory', function ($q) use ($request) {
                $q->where('name', $request->subcategory);
            });
        }

        $products = $query->paginate(12);

        return view('catalog.index', compact('categories', 'products'));
    }

    public function show($id)
    {
       $product = Product::with('images')->findOrFail($id);

        return view('catalog.detailproduct', compact('product'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('q');
        $categories = Category::with('subCategories')->get();

        $query = Product::with(['subCategory.category', 'contact']);

        // Filter jika ada keyword pencarian
        if (!empty($keyword)) {
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', '%' . $keyword . '%')
                ->orWhereHas('subCategory', function ($q2) use ($keyword) {
                    $q2->where('name', 'like', '%' . $keyword . '%');
                })
                ->orWhereHas('subCategory.category', function ($q3) use ($keyword) {
                    $q3->where('name', 'like', '%' . $keyword . '%');
                });
            });
        }

        // Filter tambahan berdasarkan subkategori dari form
        if ($request->has('subcategory') && $request->subcategory) {
            $query->whereHas('subCategory', function ($q) use ($request) {
                $q->where('name', $request->subcategory);
            });
        }

        $products = $query->paginate(12);

        return view('catalog.index', compact('categories', 'products'));
    }


    public function ajaxFilteredProducts(Request $request)
    {
        $query = Product::with(['subCategory.category', 'contact']);

        // Filter kategori
        if ($request->has('category') && $request->category) {
            $query->whereHas('subCategory.category', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        // Filter subkategori
        if ($request->has('subcategory') && $request->subcategory) {
            $query->whereHas('subCategory', function ($q) use ($request) {
                $q->where('name', $request->subcategory);
            });
        }

        // Filter keyword pencarian
        if ($request->has('q') && $request->q) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->q . '%')
                ->orWhereHas('subCategory', function ($q2) use ($request) {
                    $q2->where('name', 'like', '%' . $request->q . '%');
                })
                ->orWhereHas('subCategory.category', function ($q3) use ($request) {
                    $q3->where('name', 'like', '%' . $request->q . '%');
                });
            });
        }

        $products = $query->get();

        return response()->json($products);
    }
}
