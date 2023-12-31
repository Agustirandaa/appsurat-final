<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\User;
use Illuminate\Http\Request;

class ViewPDFController extends Controller
{

    public function viewPDF($slug, $jenis, $status)
    {

        if ($jenis == 'Surat Keterangan') {
            $jenis = 'surat_keterangan';
        } else if ($jenis == 'Surat Permohonan') {
            $jenis = 'surat_permohonan';
        } else if ($jenis == 'Surat Pemberitahuan') {
            $jenis = 'surat_pemberitahuan';
        } else {
            abort(404, 'Not Found');
        }

        $data = SuratKeluar::where('slug', $slug)->first();

        if ($status === 'Mahasiswa') {
            $dataDetail = $data->mahasiswa;
        } else if ($status === 'Dosen') {
            $dataDetail = $data->dosen;
        } else {
            $dataDetail = $data->suratPemberitahuan;
        }

        return view("dashboard.Pdf_template.$jenis.view_pdf", [
            'surat' => $data,
            'dataDetail' => $dataDetail,
        ]);
    }

    // Print Surat Masuk
    public function printSuratMasuk(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $semester = $request->input('semester');

        if (empty($startDate) || empty($endDate) || empty($semester)) {
            return redirect()->back()->with('error', 'Tidak dapat mencetak laporan, parameter tanggal mulai, tanggal akhir atau semester tidak ada');
        }

        $query = SuratMasuk::whereBetween('tanggal_surat', [$startDate, $endDate])
            ->where('semester', $semester);

        $totalSurat = $query->count();

        // Query harus diklom, jika tidak akan tertimpa dan tidak akan muncul jumlah surat nya

        $querySuratPermohonan = clone $query;
        $jumlahSuratPermohonan = $querySuratPermohonan->where('jenis_surat', 'Surat Permohonan')->count();

        $querySuratKeterangan = clone $query;
        $jumlahSuratKeterangan = $querySuratKeterangan->where('jenis_surat', 'Surat Keterangan')->count();

        $querySuratPemberitahuan = clone $query;
        $jumlahSuratPemberitahuan = $querySuratPemberitahuan->where('jenis_surat', 'Surat Pemberitahuan')->count();

        return view("dashboard.Pdf_template.laporansuratmasuk", [
            'user' => User::where('level', 'is_user')->first(),
            'startdate' => $startDate,
            'enddate' => $endDate,
            'semester' => $semester,

            'totalSurat' => $totalSurat,
            'jumlahSuratPermohonan' => $jumlahSuratPermohonan,
            'jumlahSuratKeterangan' => $jumlahSuratKeterangan,
            'jumlahSuratPemberitahuan' => $jumlahSuratPemberitahuan,
        ]);
    }





    // Print Surat Keluar
    public function printSuratKeluar(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $semester = $request->input('semester');

        if (empty($startDate) || empty($endDate) || empty($semester)) {
            return redirect()->back()->with('error', 'Tidak dapat mencetak laporan, parameter tanggal mulai, tanggal akhir atau semester tidak ada');
        }

        $query = SuratKeluar::whereBetween('tanggal_surat', [$startDate, $endDate])
            ->where('semester', $semester);

        $totalSurat = $query->count();

        // Query harus diklon, jika tidak akan tertimpa dan tidak akan muncul jumlah surat nya

        $querySuratPermohonan = clone $query;
        $jumlahSuratPermohonan = $querySuratPermohonan->where('jenis_surat', 'Surat Permohonan')->count();

        $querySuratKeterangan = clone $query;
        $jumlahSuratKeterangan = $querySuratKeterangan->where('jenis_surat', 'Surat Keterangan')->count();

        $querySuratPemberitahuan = clone $query;
        $jumlahSuratPemberitahuan = $querySuratPemberitahuan->where('jenis_surat', 'Surat Pemberitahuan')->count();

        return view("dashboard.Pdf_template.laporansuratkeluar", [
            'user' => User::where('level', 'is_user')->first(),
            'startdate' => $startDate,
            'enddate' => $endDate,
            'semester' => $semester,

            'totalSurat' => $totalSurat,
            'jumlahSuratPermohonan' => $jumlahSuratPermohonan,
            'jumlahSuratKeterangan' => $jumlahSuratKeterangan,
            'jumlahSuratPemberitahuan' => $jumlahSuratPemberitahuan,
        ]);
    }
}
