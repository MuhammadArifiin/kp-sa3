<?php

namespace App\Http\Controllers;

use App\Charts\QueueChart;
use App\Models\Antrian;
use App\Models\Jas;
use App\Models\keterangan;
use DB;
use Illuminate\Http\Request;

class QueueChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $jumlah_antrian = DB::table('antrians')
            ->leftJoin('keterangans', 'keterangans.id', '=', 'antrians.keterangan_id')
            ->select(DB::raw("count(kode) as jumlah_antrian"))
            ->where('keterangans.id', '!=', 0)
            ->groupBy(DB::raw("Day(pickupDate)"))
            ->pluck('jumlah_antrian');

        $hari = DB::table('antrians')
        ->leftJoin('keterangans', 'keterangans.id', '=', 'antrians.keterangan_id')
        ->select(DB::raw("DATE(pickupDate) as hari"))
        ->where('keterangans.id', '!=', 0 )
        ->groupBy(DB::raw("DATE(pickupDate)"))
        ->pluck('hari');

        // dd($hari);

        return view('admin.dashboard', compact('jumlah_antrian', 'hari'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
