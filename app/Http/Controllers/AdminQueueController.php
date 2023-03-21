<?php

namespace App\Http\Controllers;

use App\Exports\qDoneExport;
use App\Models\Antrian;
use App\Models\keterangan;
use Carbon\Carbon;
use DB;
use Excel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminQueueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pickupDate = Carbon::today();
        $dataAntrian = DB::table('antrians')
            ->leftJoin('mahasiswas', 'mahasiswas.id', '=', 'antrians.mahasiswa_id')
            ->where('pickupDate', '=', $pickupDate)
            ->paginate(10);
        $keterangan = keterangan::all();

        return view('admin.queue', compact('dataAntrian', 'keterangan'));
    }

    public function search(Request $request)
    {
        $keterangan = keterangan::all();

        $keyword = $request->cari;

        $dataAntrian = Antrian::where('nim', 'like', "%" . $keyword . "%")->leftJoin('mahasiswas', 'mahasiswas.id', '=', 'antrians.mahasiswa_id')->paginate(5);

        return view('admin.queue', compact('dataAntrian', 'keterangan'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function confirmQ(Request $request)
    {
        $dataUpdate = $request->only(['id_antrian', 'keterangan_id', 'pengambil']);

        DB::table('antrians')
            ->where('id_antrian', $dataUpdate['id_antrian'])
            ->update([
                'keterangan_id' => $dataUpdate['keterangan_id'],
                'pengambil' => $dataUpdate['pengambil']
            ]);

        Alert::success('success', 'Konfirmasi data berhasil');
        return redirect('/admin/queue');
    }

    public function doneQ()
    {
        $dataAntrian = DB::table('antrians')
            ->leftJoin('mahasiswas', 'mahasiswas.id', '=', 'antrians.mahasiswa_id')
            ->leftJoin('keterangans', 'keterangans.id', '=', 'antrians.keterangan_id')
            ->paginate(10);
        return view('admin.qdone', compact('dataAntrian'));
    }

    public function fileExport()
    {
        $today = Carbon::today()->format('d M Y');
        return Excel::download(new qDoneExport, 'Data-antrean-' . $today . '.xlsx');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Antrian::where('id_antrian', '=', $id);
        $data->delete();
        $pickupDate = Carbon::today();
        $dataAntrian = DB::table('antrians')
            ->leftJoin('mahasiswas', 'mahasiswas.id', '=', 'antrians.mahasiswa_id')
            ->where('pickupDate', '=', $pickupDate)
            ->paginate(10);
        $keterangan = keterangan::all();

        Alert::success('succes', 'Data berhasil dihapus');
        return view('admin.queue', compact('dataAntrian', 'keterangan'));
    }
}
