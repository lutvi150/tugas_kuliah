<?php

namespace App\Http\Controllers;

use App\Models\ModelAkademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AkademikController extends Controller
{
    function index()
    {
        return view('form_akademik');
    }
    function akademikStore(Request $request)
    {

        $rules = [
            'nim' => 'required|numeric|unique:table_akademiks',
            'nama' => 'required',
            'kelas' => 'required',
            'matakuliah' => 'required'
        ];
        $message = [
            'nim.required' => 'NIM harus diisi',
            'nim.unique' => 'NIM Sudah terdaftar',
            'nim.numeric' => 'NIM harus berupa angka',
            'nama.required' => 'Nama harus diisi',
            'kelas.required' => 'Kelas harus diisi',
            'matakuliah.required' => 'Matakuliah harus diisi'
        ];
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            $response = [
                'status' => 'error',
                'msg' => 'validation failed',
                'errors' => $validator->errors(),
                'content' => null,
            ];
        } else {
            $akademik = new ModelAkademik;
            $akademik->nim = $request->nim;
            $akademik->nama = $request->nama;
            $akademik->kelas = $request->kelas;
            $akademik->matakuliah = $request->matakuliah;
            $akademik->save();
            $response = [
                'status' => 'success',
                'msg' => 'store data success',
                'content' => null,
            ];
        }
        return response()->json($response);
    }
    function akademikGet()
    {
        $akademik = ModelAkademik::all();
        $response = [
            'status' => 'success',
            'msg' => 'data found',
            'content' => $akademik,
        ];
        return response()->json($response, 200);
    }
}
