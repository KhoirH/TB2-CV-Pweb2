<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;


class PeminjamanBuku extends BaseController
{
    public function index()
    {
        $dataPeminjaman = model('Peminjaman')
            ->join('Anggota', 'Peminjaman.id_anggota = Anggota.id_anggota')
            ->join('Buku', 'Peminjaman.id_buku = Buku.id_buku')
            ->join('Rak', 'Rak.id_rak = Buku.id_rak')
            ->join('pengembalian', 'id_peminjaman = id_pinjam', 'left')
            ->where('id_pengembalian', null)
            ->orderBy('id_peminjaman')
            ->find();

        return view('PeminjamanBukuView',[
            'data' => $dataPeminjaman
        ]);
    }

    public function Pengembalian()
    {
        $dataPeminjaman = model('Peminjaman')
            ->join('Anggota', 'Peminjaman.id_anggota = Anggota.id_anggota')
            ->join('Buku', 'Peminjaman.id_buku = Buku.id_buku')
            ->join('Rak', 'Rak.id_rak = Buku.id_rak')
            ->join('pengembalian', 'id_peminjaman = id_pinjam')
            ->orderBy('id_peminjaman')
            ->find();

        return view('PengembalianBukuView', [
            'data' => $dataPeminjaman
        ]);
    }

    public function Search()
    {
        $dataPeminjaman = model('Peminjaman');
        $dataPeminjaman = $dataPeminjaman->join('Anggota', 'Peminjaman.id_anggota = Anggota.id_anggota');
        $dataPeminjaman = $dataPeminjaman->join('Buku', 'Peminjaman.id_buku = Buku.id_buku');
        $dataPeminjaman = $dataPeminjaman->join('Rak', 'Rak.id_rak = Buku.id_rak');
        $dataPeminjaman = $dataPeminjaman->join('pengembalian', 'id_peminjaman = id_pinjam', 'left');
        $dataPeminjaman = $dataPeminjaman->where('id_pengembalian', null);
        if($this->request->getVar('search') && $this->request->getVar('search') != ''){
            $dataPeminjaman = $dataPeminjaman->where('kode_peminjaman', $this->request->getVar('search'));
        }
        $dataPeminjaman = $dataPeminjaman->orderBy('id_peminjaman');
        $dataPeminjaman = $dataPeminjaman->find();

        return view('PeminjamanBukuView', [
            'data' => $dataPeminjaman
        ]);
    }

    public function Pinjam()
    {
        return view('TambahPeminjamanView', [
            'dataBuku' => model('Buku')->where('stok >', 0)->find(),
            'dataAnggota' => model('Anggota')->findAll(),
        ]);
    }

    public function KembalikanBuku($id)
    {
        $dataPeminjaman = model('Peminjaman')
            ->join('Anggota', 'Peminjaman.id_anggota = Anggota.id_anggota')
            ->join('Buku', 'Peminjaman.id_buku = Buku.id_buku')
            ->join('Rak', 'Rak.id_rak = Buku.id_rak')
            ->where('id_peminjaman', $id)
            ->first();
        
        $dateNow = new Time('now', 'Asia/Jakarta');
        $dateKembalian = Time::parse($dataPeminjaman->tanggal_kembali, 'Asia/Jakarta');
        $day = $dateKembalian->difference($dateNow)->getDays();
        $totalHariTerlambat = max($day, 0);
        $totalDenda = $totalHariTerlambat * 2000;
        $totalBayar = $totalDenda + $dataPeminjaman->harga_per_hari;

        return view('PengembalianView', [
            'dataPeminjaman' => $dataPeminjaman,
            'totalHariTerlambat' => $totalHariTerlambat,
            'totalDenda' => $totalDenda,
            'totalBayar' => $totalBayar,
        ]);
    }

    public function DoKembalikanBuku() {
        $data = $this->request->getVar();
        $pengembalian = model('Pengembalian');

        if(
            $pengembalian->insert([
                'id_pinjam' => $data['id_pinjaman'],
                'tanggal_pengembalian' => $data['tanggal_kembali'],
                'total_pembayaran' => $data['total_bayar'],
                'denda' => $data['total_denda'],
                'id_petugas' => session()->dataUser->id_petugas
            ])
        ) {
            $buku = model('Buku');
            $peminjaman = model('Peminjaman');
            $dataPeminjaman = $peminjaman->where('id_peminjaman', $data['id_pinjaman'])->first();
            $dataBuku = $buku->where('id_buku', $dataPeminjaman->id_buku)->first();
            $dataBuku->stok += 1;
            $buku->update($this->request->getVar('id_buku'), $dataBuku);
        }

        return redirect()->to(base_url('PeminjamanBuku'));
    }
    
    public function DoPinjam()
    {
        $peminjaman = model("Peminjaman");
        
        if(
            $peminjaman->insert([
                'kode_peminjaman' => 'PJM-'.date('Ymd').'-'.rand(1,999),
                'tanggal_pinjam' => date('Y-m-d'),
                'tanggal_kembali' => $this->request->getVar('tanggal_kembali'),
                'id_buku' => $this->request->getVar('id_buku'),
                'id_anggota' => $this->request->getVar('id_anggota'),
                'id_petugas' => session()->dataUser->id_petugas,
            ])
        ) {
            $buku = model('Buku');
            $dataBuku = $buku->where('id_buku', $this->request->getVar('id_buku'))->first();
            $dataBuku->stok -= $dataBuku->stok <= 0 ? 0 : 1;
            $buku->update($this->request->getVar('id_buku'), $dataBuku);
        }

        return redirect()->to(base_url('PeminjamanBuku'));
    }
}
