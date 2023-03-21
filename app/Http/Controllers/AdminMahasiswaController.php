<?php

namespace App\Http\Controllers;

use App\Imports\MahasiswasImport;
use App\Imports\UserImport;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class AdminMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('mahasiswas')
            ->leftJoin('fakultas', 'fakultas.id_fakultas', '=', 'mahasiswas.fakultas_id')
            ->leftJoin('jurusans', 'jurusans.id_jurusan', '=', 'mahasiswas.jurusan_id')
            ->leftJoin('jas', 'jas.id_jas', '=', 'mahasiswas.jas_id')
            ->paginate(10);

        return view('admin.mahasiswa')->with('data', $data);
    }

    public function mahasiswaImport(Request $request)
    {
        Excel::import(new MahasiswasImport, $request->file('file'));
        Excel::import(new UserImport, $request->file('file'));
        Alert::success('success', 'Import data user berhasil');
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $keyword = $request->cari;

        $data = Mahasiswa::where('nim', 'like', "%" . $keyword . "%")->paginate(5);

        return view('admin.mahasiswa', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
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
