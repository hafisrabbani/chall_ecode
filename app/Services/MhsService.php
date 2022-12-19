<?php

namespace App\Services;

use App\Models\Mahasiswa;

class MhsService
{
    public function getAll()
    {
        return Mahasiswa::all();
    }

    public function getById($id)
    {
        try {
            return Mahasiswa::find($id);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function create($data)
    {
        try {
            return Mahasiswa::create([
                'nama' => $data['nama'],
                'nim' => $data['nim'],
                'email' => $data['email'],
                'jurusan' => $data['jurusan'],
                'no_hp' => $data['no_hp'],
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update($id, $data)
    {
        try {
            return Mahasiswa::find($id)->update([
                'nama' => $data['nama'],
                'nim' => $data['nim'],
                'email' => $data['email'],
                'jurusan' => $data['jurusan'],
                'no_hp' => $data['no_hp'],
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            return Mahasiswa::find($id)->delete();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
