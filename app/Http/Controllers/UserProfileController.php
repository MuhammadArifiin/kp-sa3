<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
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
            ->get();

        return view('front.profile', compact('data'));
    }

    public function changepw()
    {
        return view('front.changepw');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'jurusan' => 'required'
        ]);

        $data = new Mahasiswa();
        $data->nim = $request->input('nim');
        $data->nama = $request->input('nama');
        $data->email = $request->input('email');
        $data->hp = $request->input('hp');
        $data->alamat = $request->input('alamat');
        $data->fakultas_id = $request->input('fakultas');
        $data->jurusan_id = $request->input('jurusan');
        $data->save();

        return redirect()->to('/user/profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $data)
    {
        $data = User::findOrFail($data->id);
        return view('front.profile', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Mahasiswa::find($id);
        $fakultas = Fakultas::all();
        $jurusan = Jurusan::all();
        return view('front.edit')
            ->with(compact('data'))
            ->with(compact('fakultas'))
            ->with(compact('jurusan'));
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
        $data = Mahasiswa::find($id);

        $data->nim = $request->nim;
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->hp = $request->hp;
        $data->alamat = $request->alamat;
        $data->fakultas_id = $request->fakultas;
        $data->jurusan_id = $request->jurusan;

        $data->save();

        return redirect('/user/profile')->with('success', 'Berhasil melakukan update data');
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
