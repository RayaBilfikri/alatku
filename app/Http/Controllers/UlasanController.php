<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mckenziearts\Notify\Facades\Notify;


class UlasanController extends Controller
{
    /**
     * Display all reviews for superadmin.
     */
    public function superadminIndex()
    {
        $ulasans = Ulasan::with('user')->latest()->get();
        return view('superadmin.ulasans.index', compact('ulasans'));
    }

    /**
     * Display a listing of the reviews for public/user view.
     */
    public function index()
    {
        $approvedReviews = Ulasan::where('status', 'approved')->with('user')->latest()->take(3)->get();
        $pendingReviews = [];

        if (Auth::check()) {
            $pendingReviews = Ulasan::where('user_id', Auth::id())
                ->where('status', 'pending')
                ->with('user')
                ->latest()
                ->get();
        }

        return view('ulasan.index', [
            'approvedReviews' => $approvedReviews,
            'pendingReviews' => $pendingReviews,
            'hasPendingReviews' => count($pendingReviews) > 0
        ]);
    }

    /**
     * Store a newly created review in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $ulasan = new Ulasan();
        $ulasan->user_id = Auth::id() ?? 1; // fallback untuk demo
        $ulasan->content = $request->content;
        $ulasan->status = 'pending';
        $ulasan->save();

        return response()->json([
            'success' => true,
            'message' => 'Ulasan berhasil dikirim dan sedang menunggu persetujuan.',
            'ulasan' => $ulasan
        ]);
    }

    /**
     * Approve a review.
     */
    public function approve($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->status = 'approved';
        $ulasan->save();
        

        notify()->success('Ulasan kamu disetujui.');
        
        return redirect()->route('superadmin.ulasans.index')->with('success', 'Ulasan disetujui.');
        
    }

    /**
     * Reject a review.
     */
    public function reject($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->status = 'rejected';
        $ulasan->save();

        notify()->error('Ulasan ditolak.');

        return redirect()->route('superadmin.ulasans.index')->with('success', 'Ulasan ditolak.');
    }

    /**
     * Remove the specified approved review from storage.
     */
    public function destroy($id)
    {
        $ulasan = Ulasan::findOrFail($id);

        if ($ulasan->status !== 'approved') {
            return redirect()->route('superadmin.ulasans.index')->with('error', 'Hanya ulasan yang disetujui yang dapat dihapus.');
        }

        $ulasan->delete();
        return redirect()->route('superadmin.ulasans.index')->with('success', 'Ulasan berhasil dihapus.');
    }
}
