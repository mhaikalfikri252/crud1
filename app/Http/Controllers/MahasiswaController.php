<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    function read($id = null)
    {
        if (isset($id)) {
            $mahasiswa = Mahasiswa::findOrFail($id);
            return response()->json(['msg' => 'Data retrieved', 'data' => $mahasiswa], 200);
        } else {
            $mahasiswa = Mahasiswa::get();
            return response()->json(['msg' => 'Data retrieved', 'data' => $mahasiswa], 200);
        }
    }

    function create(Request $request)
    {
        $mahasiswa = Mahasiswa::create($request->all());
        return response()->json(['msg' => 'Data created', 'data' => $mahasiswa], 201);
    }

    function update($id, Request $request)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());
        return response()->json(['msg' => 'Data updated', 'data' => $mahasiswa], 200);
    }

    function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return response()->json(['msg' => 'Data deleted'], 200);
    }
}
