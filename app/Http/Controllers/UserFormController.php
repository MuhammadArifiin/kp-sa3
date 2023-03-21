<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Jas;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Catch_;

class UserFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Mahasiswa::get();
        // $now = Carbon::now();
        // foreach($data as $limit){}

        $mahasiswa = DB::table('mahasiswas')
            ->leftJoin('fakultas', 'fakultas.id_fakultas', '=', 'mahasiswas.fakultas_id')
            ->leftJoin('jurusans', 'jurusans.id_jurusan', '=', 'mahasiswas.jurusan_id')
            ->leftJoin('jas', 'jas.id_jas', '=', 'mahasiswas.jas_id')
            ->get();

        return view('front.form', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fakultas = Fakultas::all();
        $jurusan = Jurusan::all();
        $jas = Jas::all();
        return view('front.form')
            ->with(compact('fakultas'))
            ->with(compact('jurusan'))
            ->with(compact('jas'));
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
            'nim' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'hp' => 'required',
            'alamat' => 'required',
            'fakultas' => 'required',
            'jurusan' => 'required',
            'size' => 'required'
        ]);

        $data = new Mahasiswa();
        $data->nim = $request->input('nim');
        $data->nama = $request->input('nama');
        $data->email = $request->input('email');
        $data->hp = $request->input('hp');
        $data->alamat = $request->input('alamat');
        $data->fakultas_id = $request->input('fakultas');
        $data->jurusan_id = $request->input('jurusan');
        $data->jas_id = $request->input('size');
        $data->save();

        return redirect()->to('/queue');
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
