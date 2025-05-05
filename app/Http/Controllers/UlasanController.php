<?php


namespace App\Http\Controllers;


use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    /**
     * Display a listing of the reviews.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get approved reviews
        $approvedReviews = Ulasan::where('status', 'approved')
            ->with('user')
            ->latest()
            ->get();
        
        $ulasans = Ulasan::with('user')->get(); // Ambil semua ulasan, dengan relasi user jika ada
            return view('ulasan.index', compact('ulasans'));

        // Get pending reviews for the current user
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $ulasan = new Ulasan();
        $ulasan->user_id = Auth::id() ?? 1; // Fallback to ID 1 if not logged in (for demo)
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
     * Update the status of a review.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $ulasan = Ulasan::findOrFail($id);
        $ulasan->status = $request->status;
        $ulasan->save();

        return response()->json([
            'success' => true,
            'message' => 'Status ulasan berhasil diperbarui.',
            'ulasan' => $ulasan
        ]);
    }

    

    
}