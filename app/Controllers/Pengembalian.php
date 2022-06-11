<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;


class Pengembalian extends BaseController
{
    
    public function index()
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
        $dataPeminjaman = $dataPeminjaman->join('pengembalian', 'id_peminjaman = id_pinjam');  
        if($this->request->getVar('search') && $this->request->getVar('search') != ''){ 
            $dataPeminjaman = $dataPeminjaman->where('kode_peminjaman', $this->request->getVar('search')); 
        }
        $dataPeminjaman = $dataPeminjaman->orderBy('id_peminjaman'); 
        $dataPeminjaman = $dataPeminjaman->find(); 
        
        
        return view('PengembalianBukuView', [
            'data' => $dataPeminjaman
        ]);
    }
}
