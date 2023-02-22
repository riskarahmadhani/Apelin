<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogActivity;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', [
            'row'=>$user
        ]);
    }

    public function edit()
    {
        $pegawai = Auth::user();
        return view('profile.edit', [
            'pegawai'=>$pegawai
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'nama'=>'required|between:3,100',
            'password'=>'nullable|between:4,100|confirmed',
        ]);

        if ($request->password) {
            $request->merge([
                'password'=>bcrypt($request->password),
            ]);
            $user->update($request->all());
        } else {
            $user->update($request->only('nama'));
        }

        LogActivity::add('berhasil mengupdate profile');

        return to_route('profile.index')->with('message','success update');
    }
}
