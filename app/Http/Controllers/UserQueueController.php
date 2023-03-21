<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Fakultas;
use App\Models\Jas;
use App\Models\Jurusan;
use App\Models\limitConfirm;
use App\Models\Mahasiswa;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserQueueController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $limit = limitConfirm::get();
        $now = Carbon::now();
        $confirm = Auth()->user()->confirmJas;

        foreach ($limit as $batas) {
            if ($now < $batas->end && ($confirm == 1 || $confirm == 0)) {
                $email = auth()->user()->email;
                $data = DB::table('mahasiswas')
                    ->leftJoin('fakultas', 'fakultas.id_fakultas', '=', 'mahasiswas.fakultas_id')
                    ->leftJoin('jurusans', 'jurusans.id_jurusan', '=', 'mahasiswas.jurusan_id')
                    ->leftJoin('jas', 'jas.id_jas', '=', 'mahasiswas.jas_id')
                    ->where('email', $email)
                    ->get()[0];

                $id = $data->id;

                $dataAntrian = DB::table('antrians')
                    ->where('mahasiswa_id', $id)
                    ->get();
                
                $index = -1;
                $dataAntrian->index = $index;

                if (sizeof($dataAntrian) > 0) {

                    $dataAntrian = $dataAntrian[0];
                    $cekIndex = DB::table('antrians')
                        ->get();

                    foreach ($cekIndex as $key => $dt) {
                        if ($dt->id_antrian == $dataAntrian->id_antrian) {
                            $index = $key;
                        }
                    }
                    $dataAntrian->index = $index + 1;
                }
                return view('front.queue')->with('dataSend', ["data" => $data, "antrian" => $dataAntrian]);
            } elseif ($now > $batas->end && $confirm == 1) {

                $email = auth()->user()->email;
                $data = DB::table('mahasiswas')
                    ->leftJoin('fakultas', 'fakultas.id_fakultas', '=', 'mahasiswas.fakultas_id')
                    ->leftJoin('jurusans', 'jurusans.id_jurusan', '=', 'mahasiswas.jurusan_id')
                    ->leftJoin('jas', 'jas.id_jas', '=', 'mahasiswas.jas_id')
                    ->where('email', $email)
                    ->get()[0];

                $id = $data->id;

                $dataAntrian = DB::table('antrians')
                    ->where('mahasiswa_id', $id)
                    ->get();

                foreach ($dataAntrian as $dataQ) {
                    $pickupDate = Carbon::parse($dataQ->pickupDate);
                    if ($now->format('d') > $pickupDate->format('d')) {
                        DB::table('antrians')->where('mahasiswa_id', $id)->update(['pickupDate' => $pickupDate->addDays(7)]);
                    }
                }

                $index = -1;
                $dataAntrian->index = $index;

                if (sizeof($dataAntrian) > 0) {

                    $dataAntrian = $dataAntrian[0];
                    $cekIndex = DB::table('antrians')
                        ->get();

                    foreach ($cekIndex as $key => $dt) {
                        if ($dt->id_antrian == $dataAntrian->id_antrian) {
                            $index = $key;
                        }
                    }
                    $dataAntrian->index = $index + 1;
                }
                return view('front.queue')->with('dataSend', ["data" => $data, "antrian" => $dataAntrian]);
            } else {
                Alert::warning('warning', 'Masa konfirmasi telah ditutup');
                return redirect()->back();
            }
        }
    }

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
        $data = Mahasiswa::find($id);
        $fakultas = Fakultas::all();
        $jurusan = Jurusan::all();
        $jas = Jas::all();
        return view('front.edit')
            ->with(compact('data'))
            ->with(compact('fakultas'))
            ->with(compact('jurusan'))
            ->with(compact('jas'));
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
        $data->jas_id = $request->size;

        $data->save();
        Alert::success('success', 'Edit data berhasil');
        return redirect('/queue');
    }

    public function confirmJas()
    {
        $email = auth()->user()->email;
        User::where('email', $email)->update(['confirmJas' => true]);

        $data = DB::table('mahasiswas')
            ->leftJoin('fakultas', 'fakultas.id_fakultas', '=', 'mahasiswas.fakultas_id')
            ->leftJoin('jurusans', 'jurusans.id_jurusan', '=', 'mahasiswas.jurusan_id')
            ->leftJoin('jas', 'jas.id_jas', '=', 'mahasiswas.jas_id')
            ->where('email', $email)
            ->get()[0];

        $kodeAntrian = $data->kodeFakultas . ' - ' . $data->jurusan;
        $mahasiswa = $data->id;
        $status = 0;

        $jas_id =  $data->jas_id;
        $dataJas = Jas::where("id_jas", $jas_id)->first();
        Jas::where("id_jas", $jas_id)->update(['stok' => $dataJas->stok - 1]);

        $date = limitConfirm::get();
        foreach ($date as $date) {
            $monday = Carbon::parse($date->start)->addDays(7);
            $mondaysQueue = Antrian::where('pickupDate', '=', $monday)->count();
            $antre = new Antrian();
            $antre->kode = $kodeAntrian;
            $antre->mahasiswa_id = $mahasiswa;
            $antre->keterangan_id = $status;
            if ($mondaysQueue < 2) {
                $antre->pickupDate = Carbon::parse($date->start)->addDays(7);
                $antre->save();
                Alert::success('success', 'Konfirmasi data berhasil');
                return redirect('/queue');
            } else {
                $tuesday = Carbon::parse($date->start)->addDays(8);
                $tuesdaysQueue = Antrian::where('pickupDate', '=', $tuesday)->count();
                if ($tuesdaysQueue < 2) {
                    $antre->pickupDate = Carbon::parse($date->start)->addDays(8);
                    $antre->save();
                    Alert::success('success', 'Konfirmasi data berhasil');
                    return redirect('/queue');
                } else {
                    $wednesday = Carbon::parse($date->start)->addDays(9);
                    $wednesdaysQueue = Antrian::where('pickupDate', '=', $wednesday)->count();
                    if ($wednesdaysQueue < 2) {
                        $antre->pickupDate = Carbon::parse($date->start)->addDays(9);
                        $antre->save();
                        Alert::success('success', 'Konfirmasi data berhasil');
                        return redirect('/queue');
                    } else {
                        $thrusday = Carbon::parse($date->start)->addDays(10);
                        $thrusdaysQueue = Antrian::where('pickupDate', '=', $thrusday)->count();
                        if ($thrusdaysQueue < 2) {
                            $antre->pickupDate = Carbon::parse($date->start)->addDays(10);
                            $antre->save();
                            Alert::success('success', 'Konfirmasi data berhasil');
                            return redirect('/queue');
                        } else {
                            $friday = Carbon::parse($date->start)->addDays(11);
                            $fridaysQueue = Antrian::where('pickupDate', '=', $friday)->count();
                            if ($fridaysQueue < 2) {
                                $antre->pickupDate = Carbon::parse($date->start)->addDays(11);
                                $antre->save();
                                Alert::success('success', 'Konfirmasi data berhasil');
                                return redirect('/queue');
                            }
                        }
                    }
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteQ($id)
    {
        $data = Mahasiswa::find($id);
        $data->delete();
        return redirect('/queue')->with('success', 'Data berhasil dihapus');
    }
}
