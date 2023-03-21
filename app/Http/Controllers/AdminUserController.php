<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Imports\UserImport;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class AdminUserController extends Controller
{
    public function userList()
    {
        $data = User::paginate(10);
        return view('admin.users', compact('data'));
    }

    public function userImport(Request $request)
    {
        Excel::import(new UserImport, $request->file('file'));
        Alert::success('success', 'Import data user berhasil');
        return redirect()->back();
    }

    // public function UserExport()
    // {
    //     return Excel::download(new UserExport, 'users.xlsx');
    // }

    public function search(Request $request)
    {
        $keyword = $request->cari;

        $data = User::where('name', 'like', "%" . $keyword . "%")->paginate(5);

        return view('admin.users', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function editConfirmJas(Request $request, $id)
    {
        $data = User::find($id);
        return view('admin.editUser', compact('data'));
    }


    public function updateConfirmJas($id)
    {
        $data = User::find($id)->update(['confirmJas' => false]);

        Alert::success('success', 'Edit data berhasil');
        return redirect('/admin/users');
    }

    public function deleteUser($id)
    {
        $data = User::find($id);
        $data->delete();

        Alert::success('success', 'Berhasil menghapus data');

        return redirect('/admin/users');
    }
}
