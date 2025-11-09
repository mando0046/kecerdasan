<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamResetRequest; // Model untuk menyimpan pengajuan ujian ulang
use Illuminate\Support\Facades\Auth;

class UjianUlangController extends Controller
{
    /**
     * Menampilkan form pengajuan ujian ulang
     */
    public function form()
    {
        return view('peserta.ujian-ulang.form');
    }

    /**
     * Menyimpan pengajuan ujian ulang
     */
    public function store(Request $request)
    {
        $request->validate([
            'reason' => 'required|string|max:1000',
        ]);

        ExamResetRequest::create([
            'user_id' => Auth::id(),
            'reason'  => $request->reason,
            'status'  => 'pending', // default status
        ]);

        return redirect()->route('peserta.dashboard')
            ->with('success', 'Permintaan ujian ulang berhasil dikirim.');
    }
}
