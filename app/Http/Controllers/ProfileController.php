<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use App\Models\LogActivity;
use App\Models\User;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user->foto = asset("images/{$user->foto}");
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

    public function update(Request $request, User $user)
    {
        $user = Auth::user();
        $request->validate([
            'nama'=>'required|between:3,100',
            'password'=>'nullable|between:4,100|confirmed',
        ]);

        if ($request->file_foto){

            $folder = 'images';
            $foto_lama = "{$folder}/{$user->foto}";
            if (file_exists($foto_lama)){
                unlink($foto_lama);
            }
            $file = $request->file('file_foto');
            $ext = $file->getClientOriginalExtension();
            $filename = date('Ymdhis').'.'.$ext;
            $img = Image::make($file);
            $img->fit(300,300);
            $img->save($folder.'/'.$filename);

            $request->merge([
                'foto'=>$filename,
            ]);
        }

        if ($request->password) {
            $request->merge([
                'password'=>bcrypt($request->password),
            ]);
            $user->update($request->all());
        } else {
            $user->update($request->except(['password']));
            $user->update($request->only('nama','foto'));
        }

        LogActivity::add('berhasil mengupdate profile');

        return to_route('profile.index')->with('message','success update');
    }
}
