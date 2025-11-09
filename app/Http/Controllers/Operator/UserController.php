<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereIn('role', ['guest', 'peserta'])->get();
        return view('operator.users.index', compact('users'));
    }

    public function upgrade($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'guest') {
            $user->update(['role' => 'peserta']);
            return redirect()->back()->with('success', 'User berhasil diubah menjadi peserta.');
        }

        return redirect()->back()->with('error', 'Hanya guest yang bisa diubah menjadi peserta.');
    }
}
