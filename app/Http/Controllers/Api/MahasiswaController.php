<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MhsCreate;
use App\Http\Requests\MhsUpdate;
use App\Services\MhsService;

class MahasiswaController extends Controller
{
    public function index(MhsService $service)
    {
        $data = $service->getAll();
        return response()->json([
            'status' => 200,
            'message' => 'Data berhasil diambil',
            'data' => $data,
        ]);
    }

    public function getDetail(MhsService $service, $id)
    {
        $data = $service->getById($id);
        return response([
            'status' => ($data) ? 200 : 400,
            'message' => ($data) ? 'Data berhasil diambil' : 'Data gagal diambil',
            'data' => ($data) ? $data : null,
        ]);
    }


    public function create(MhsCreate $request, MhsService $service)
    {
        $serv = $service->create($request->validated());
        return response()->json([
            'status' => ($serv) ? 200 : 400,
            'message' => ($serv) ? 'Data berhasil ditambahkan' : 'Data gagal ditambahkan',
        ]);
    }

    public function update(MhsUpdate $request, MhsService $service, $id)
    {
        $serv = $service->update($id, $request->validated());
        return response([
            'status' => ($serv) ? 200 : 400,
            'message' => ($serv) ? 'Data berhasil diubah' : 'Data gagal diubah',
        ]);
    }

    public function destroy(MhsService $service, $id)
    {
        $serv = $service->delete($id);
        return response([
            'status' => ($serv) ? 200 : 400,
            'message' => ($serv) ? 'Data berhasil dihapus' : 'Data gagal dihapus',
        ]);
    }
}
