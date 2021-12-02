<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Murid;
use Validator;

class MuridController extends Controller
{
    public function index()
    {
        $murids = Murid::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Murid',
            'data' => $murids
        ], 200);
    }


    public function create(Request $request)
    {
        //validate data
        $validator = Validator::make(
            $request->all(),
            [
                'nama'     => 'required',
                'kelas'   => 'required',
            ],
            [
                'nama.required' => 'Masukkan Nama Murid !',
                'kelas.required' => 'Masukkan Kelas Murid !',
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 400);
        } else {

            $murid = Murid::create([
                'nama'     => $request->input('nama'),
                'kelas'   => $request->input('kelas')
            ]);


            if ($murid) {
                return response()->json([
                    'success' => true,
                    'message' => 'Murid Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Murid Gagal Disimpan!',
                ], 400);
            }
        }
    }



    public function update(Request $request, $id)
    {
         //validate data
         $validator = Validator::make(
            $request->all(),
            [
                'nama'     => 'required',
                'kelas'   => 'required',
            ],
            [
                'nama.required' => 'Masukkan Nama Murid !',
                'kelas.required' => 'Masukkan Kelas Murid !',
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 400);
        } else {

            $murid = Murid::whereId($request->input('id'))->update([
                'nama'     => $request->input('nama'),
                'kelas'   => $request->input('kelas'),
            ]);


            if ($murid) {
                return response()->json([
                    'success' => true,
                    'message' => 'Murid Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Murid Gagal Diupdate!',
                ], 500);
            }
        }
    }

    public function delete($id)
    {
        $siswa = Murid::find($id);
        $siswa->delete();

        return "Data Terhapus";
    }

    public function show($id)
    {
        $siswa = Murid::find($id);

        if ($siswa) {
            return response()->json([
                'success' => true,
                'message' => 'Detail siswa!',
                'data'    => $siswa
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'siswa Tidak Ditemukan!',
                'data'    => ''
            ], 404);
        }
    }
}
