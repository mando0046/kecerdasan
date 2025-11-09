<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PesertaController extends Controller
{
    /**
     * Tampilkan daftar peserta & guest.
     */
    public function index()
    {
        $users = User::whereIn('role', ['guest', 'peserta'])->get();

        return view('operator.peserta.index', compact('users'));
    }

    /**
     * Ubah role guest → peserta.
     */
    public function ubahRole($id)
    {
        $user = User::findOrFail($id);

        if ($user->role !== 'guest') {
            return redirect()->back()->with('error', 'User ini sudah peserta.');
        }

        $user->update(['role' => 'peserta']);

        return redirect()->route('operator.peserta.index')->with('success', 'Berhasil mengubah menjadi peserta.');
    }
}
