<?php

namespace App\Http\Controllers;

use App\Http\Requests\MhsCreate;
use App\Http\Requests\MhsUpdate;
use App\Services\MhsService;

class MahasiswaController extends Controller
{
    public function index(MhsService $service)
    {
        return view('index', [
            'mahasiswas' => $service->getAll(),
        ]);
    }


    public function create(MhsCreate $request, MhsService $service)
    {
        $serv = $service->create($request->validated());
        return response([
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
