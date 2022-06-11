<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {

        $report = model('Report');
        $pendapatanBulanan = $report->getMonthlyEarn();
        $pendapatanTahunan = $report->getAnnualEarn();
        $progressPengembalian = $report->getCompleteProgress();
        $earningOverview = $report->getEarningOverview();
        $earningSource = $report->getEarningSource();
        $bukuDipinjam = $progressPengembalian->buku_dipinjam;
        $progressPengembalian = ceil(($progressPengembalian->buku_dikembalikan / isset($progressPengembalian->buku_dipinjam) ? $progressPengembalian->buku_dipinjam : 0) * 100);
        $progressPengembalian = $progressPengembalian >= 100 ? 100 : $progressPengembalian ;
        
        return view('DashboardView', [
            'pendapatanBulanan' => "Rp ".number_format($pendapatanBulanan, 0, ',','.'),
            'pendapatanTahunan' => "Rp ".number_format($pendapatanTahunan, 0, ',','.'),
            'progressPengembalian' => $progressPengembalian,
            'bukuDipinjam' => $bukuDipinjam,
            'earningOverview' => $earningOverview,
            'earningSource' => $earningSource
        ]);
    }
}
