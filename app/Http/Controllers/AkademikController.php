<?php

namespace App\Http\Controllers;

use App\Models\ModelAkademik;
use Illuminate\Http\Request;

class AkademikController extends Controller
{
    function index()
    {
        return view('form_akademik');
    }
    function akademikStore(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|numeric',
            'nama' => 'required',
            'kelas' => 'required',
            'matakuliah' => 'required'
        ]);

        $akademik = new ModelAkademik;
        $akademik->nim = $request->nim;
        $akademik->nama = $request->nama;
        $akademik->kelas = $request->kelas;
        $akademik->matakuliah = $request->matakuliah;
        $akademik->save();
        $response = [
            'status' => 'success',
            'msg' => 'Data berhasil disimpan'
        ];
        return response()->json($response);
    }
}
