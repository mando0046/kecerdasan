<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\ExamResetRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamResetController extends Controller
{
    public function form()
    {
        return view('peserta.ujian-ulang.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'reason' => 'required|string|max:255',
        ]);

        ExamResetRequest::create([
            'user_id' => Auth::id(),
            'reason' => $request->reason,
            'requested_at' => now(),
            'status' => 'pending',
        ]);

        return redirect()->route('peserta.dashboard')->with('success', 'Permintaan reset ujian telah dikirim ke admin.');
    }
}
