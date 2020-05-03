<?php

namespace App\Http\Controllers;

use Session;
use App\Client;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $data = DB::table('users')->paginate(10);
        return view('admin.home', ['data1' => $data]);
    }
    public function userEdit(Request $req)
    {
        $data = User::findOrFail($req->input('id'));
        $data->name = $req->input('name');
        $data->address = $req->input('Address');
        $data->phone_no = $req->input('Phone_no');
        $data->save();

        $req->session()->flash('update', 'Policy has been updated.');
        return redirect('admin');
    }
    public function userDestroy(Request $req)
    {
        $data = User::findOrFail($req->id);
        $data->delete();
        $req->session()->flash('delete', 'Policy has been deleted.');
        return redirect('admin');
    }
}
