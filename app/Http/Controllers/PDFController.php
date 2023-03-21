<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $dataAntrian = DB::table('antrians')
            ->leftJoin('mahasiswas', 'mahasiswas.id', '=', 'antrians.mahasiswa_id')
            ->leftJoin('keterangans', 'keterangans.id', '=', 'antrians.keterangan_id')
            ->get();

        $pdf = Pdf::loadView('admin.qdonePDF', ['printedData' => $dataAntrian])->setPaper('a4', 'landscape');
        // dd($dataAntrian->pickupDate);
        $today = Carbon::today()->format('d M Y');;
        return $pdf->download('Data-antrean-'. $today . '.pdf');
    }
}
