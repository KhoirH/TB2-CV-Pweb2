<?php

namespace App\Controllers;

class Buku extends BaseController
{
    public function index()
    {
        $buku = model("Buku");

        return view('BukuView', [
            'data' => $buku->getAll()
        ]);
    }

    public function Search()
    {
        $buku = model("Buku");
        if ($this->request->getVar('search') && $this->request->getVar('search') != '') {
            $buku = $buku->where('kode_buku', $this->request->getVar('search'));
        }
        $buku = $buku->find();

        return view('BukuView', [
            'data' => $buku
        ]);
    }

    public function Tambah()
    {
        $dataRak = model("Rak");

        return view('TambahBuku', [
            'dataRak' => $dataRak->findAll(),
            'action' => base_url() . '/Buku/DoTambahBuku'
        ]);
    }

    public function DoTambahBuku()
    {
        $data = $this->request->getPost();
        $buku = model("Buku");
        if (!$buku->where('kode_buku', $this->request->getVar('kode_buku'))->find()) {
            $buku->insert($data);
        }

        return redirect()->to(base_url('Buku'));
    }

    public function HapusBuku($id)
    {
        $buku = model("Buku");
        $buku->where('id_buku', $id)->delete();

        return redirect()->to(base_url('Buku'));
    }

    public function EditBuku($id)
    {
        $dataRak = model("Rak");
        $buku = model("Buku");
        $buku = $buku->where('id_buku', $id)->first();

        return view('TambahBuku', [
            'dataBuku' => $buku,
            'dataRak' => $dataRak->findAll(),
            'action' => base_url() . '/Buku/DoEdit/' . $id
        ]);
    }

    public function DoEdit($id)
    {
        $data = $this->request->getPost();
        $buku = model("Buku");
        $buku = $buku->where('id_buku', $id);
        $buku->update($id, $data);

        return redirect()->to(base_url('Buku'));
    }
}
