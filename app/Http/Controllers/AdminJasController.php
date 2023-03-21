<?php

namespace App\Http\Controllers;

use App\Models\Jas;
use DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminJasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jas::all();
        return view('admin.jas', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jas = Jas::all();
        return view('admin.addJas')->with(compact('jas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'size' => 'required',
            'stok' => 'required'
        ]);

        $data = new Jas();
        $data->size = $request->input('size');
        $data->stok = $request->input('stok');
        $data->save();

        Alert::success('success', 'Tambah data berhasil');
        return redirect()->to('/admin/jas');
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
        $data = DB::table('jas')->where('id_jas', '=', $id)->get();
        return view('admin.editJas')->with(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('jas')->where('id_jas', $request->id)->update([
            'size' => $request->size,
            'stok' => $request->stok
        ]);

        Alert::success('success', 'Edit data berhasil');
        return redirect('/admin/jas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteJas($id)
    {
        $query = Jas::where('id_jas', '=', $id);
        $query->delete();

        Alert::success('success', 'Berhasil menghapus data');
        return redirect('/admin/jas');
    }
}
