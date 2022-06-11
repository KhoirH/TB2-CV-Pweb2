<?php

namespace App\Models;

use CodeIgniter\Model;

class Report extends Model
{
    protected $table = 'pengembalian';

    public function getMonthlyEarn()
    {
        $sql = "SELECT SUM(total_pembayaran) AS total FROM pengembalian WHERE MONTH(tanggal_pengembalian) = MONTH(CURRENT_DATE()) GROUP BY YEAR(tanggal_pengembalian), MONTH(tanggal_pengembalian)";
        $query = $this->db->query($sql);
        return $query->getRow()->total;
    }

    public function getAnnualEarn()
    {
        $sql = "SELECT SUM(total_pembayaran) AS total FROM pengembalian WHERE YEAR(tanggal_pengembalian) = YEAR(CURRENT_DATE()) GROUP BY YEAR(tanggal_pengembalian)";
        $query = $this->db->query($sql);
        return $query->getRow()->total;
    }

    public function getCompleteProgress()
    {
        $sql = "SELECT (SELECT COUNT(id_peminjaman) FROM peminjaman) AS buku_dipinjam, (SELECT COUNT(id_pengembalian) FROM pengembalian) AS buku_dikembalikan";
        $query = $this->db->query($sql);
        return $query->getRow();
    }

    public function getEarningOverview()
    {
        $sql = "SELECT MONTHNAME(tanggal_pengembalian) as month, SUM(total_pembayaran) AS total FROM pengembalian WHERE YEAR(tanggal_pengembalian) = YEAR(CURRENT_DATE()) GROUP BY MONTH(tanggal_pengembalian)";
        $query = $this->db->query($sql);

        $data = [];
        foreach ($query->getResultObject() as $index => $value) {
            $sparator = $index != 0  ? '::' : '';
            $data['month'] .= $sparator . $value->month;
            $data['total'] .= $sparator . $value->total;
        }

        return $data;
    }

    public function getEarningSource()
    {
        $sql = "SELECT judul_buku, count(id_peminjaman) AS total FROM peminjaman JOIN buku ON buku.id_buku = peminjaman.id_buku WHERE YEAR(tanggal_pinjam) = YEAR(CURRENT_DATE()) GROUP BY peminjaman.id_buku LIMIT 3";
        $query = $this->db->query($sql);

        $data = [];
        foreach ($query->getResultObject() as $index => $value) {
            $sparator = $index != 0  ? '::' : '';
            $data['judul_buku'] .= $sparator . $value->judul_buku;
            $data['total_pinjam'] .= $sparator . $value->total;
        }

        return $data;
    }
}
