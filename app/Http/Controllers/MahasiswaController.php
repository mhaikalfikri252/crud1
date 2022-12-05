<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function create(Request $request)
    {
        $data = @$request->json()->all();
        $data['created_at'] = date("Y-m-d H:i:s");
        $data['updated_at'] = date("Y-m-d H:i:s");

        $model = new Mahasiswa();
        $model->insert($data);
        echo "Data mahasiswa berhasil ditambahkan";
    }


    public function read()
    {
        $data = Mahasiswa::all();
        $data = json_encode($data);
        // print_r($data);
        return response($data);
    }

    // public function readall()
    // {
    //     $data = Mahasiswa::all();
    //     $data = json_encode($data);
    //     print_r($data);
    // }

    // public function readbynim(Request $request)
    // {
    //     $data = Mahasiswa::where('nim', $request->nim)->get();
    //     $data = json_encode($data);
    //     print_r($data);
    // }

    // public function update(Request $request)
    // {
    //     $data = @$request->json()->all();
    //     $data['created_at'] = date("Y-m-d H:i:s");
    //     $data['updated_at'] = date("Y-m-d H:i:s");

    //     Mahasiswa::where('nim', $request->nim)->update([
    //         'nama' => $request->nama,
    //         'umur' => $request->umur,
    //         'alamat' => $request->alamat,
    //         'kota' => $request->kota,
    //         'kelas' => $request->kelas,
    //         'jurusan' => $request->jurusan,
    //     ]);

    //     echo "Data mahasiswa berhasil diupdate";
    // }

    public function update(Request $request)
    {
        $data = @$request->json()->all();
        // $data['created_at'] = date("Y-m-d H:i:s");
        $data['updated_at'] = date("Y-m-d H:i:s");

        $model =  Mahasiswa::find(@$data['nim']);
        if (!empty($model)) {
            $model->update($data);
            return response("Data Berhasil Diubah");
        } else {
            return response("Data tidak ditemukan");
        }
    }

    // public function delete(Request $request)
    // {
    //     Mahasiswa::where('nim', $request->nim)->delete();
    //     echo "Berhasil menghapus data mahasiswa";
    // }

    public function delete(Request $request)
    {
        $data = @$request->json()->all();

        $model =  Mahasiswa::find(@$data['nim']);
        if (!empty($model)) {
            $model->delete($data['nim']);
            return response("Data Berhasil Dihapus");
        } else {
            return response("Data tidak ditemukan");
        }
    }
}
