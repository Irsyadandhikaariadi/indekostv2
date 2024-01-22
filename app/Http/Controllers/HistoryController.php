<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kamar;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tracking;

class HistoryController extends Controller
{
    //
    public function index()
    {
        $userId = auth()->user()->id;
        $historys = Transaksi::where('user_id', $userId)
            ->orWhereHas('kamar', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })->get();

        return view('user.history', compact('historys'));
    }

    public function show(Kamar $kamar)
    {
        // Fetch tracking data that is related to the given Kamar by its id
        $tracking = Tracking::whereHas('kamar', function ($query) use ($kamar) {
            $query->where('id', $kamar->id);
        })->get();

        return view('user.history_detail', compact('kamar', 'tracking'));
    }

    public function owner()
    {
        $tracking = Tracking::all();
        return view('owner.tracking', compact('tracking'));
    }

    public function showTracking(Tracking $tracking)
    {
        return view('owner.tracking_edit', compact('tracking'));
    }

    public function editTracking(Request $request, Tracking $tracking)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'checkin' => 'required|date',
            'checkout' => 'required|date|after_or_equal:checkin',
        ], [
            'checkin.required' => 'Tanggal check-in wajib diisi.',
            'checkin.date' => 'Tanggal check-in tidak valid.',
            'checkout.required' => 'Tanggal check-out wajib diisi.',
            'checkout.date' => 'Tanggal check-out tidak valid.',
            'checkout.after_or_equal' => 'Tanggal check-out harus sama atau setelah tanggal check-in.',
        ]);

        $tracking->update([
            'checkin' => $request->checkin,
            'checkout' => $request->checkout,
        ]);

        return redirect()->route('owner.history');
    }
}
