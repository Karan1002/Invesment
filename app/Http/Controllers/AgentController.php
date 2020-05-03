<?php

namespace App\Http\Controllers;

use PDF;
use Image;
use File;
use Session;
use App\Client;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    public function index()
    {
        return view('agent.home');
    }
    public function details(Request $req)
    {
        $data = DB::table('clients')->paginate(10);
        return view('agent/details', compact('data'));
    }
    public function policyAdd(Request $req)
    {
        $data = new client;
        $data->policy_no = $req->Policy_no;
        $data->name = $req->Policy_name;
        $data->sum_assured = $req->Sum_Assured;
        $data->plan_term = $req->Plan_Term;
        $data->mode = $req->Mode;
        $data->premium = $req->Premium;
        $data->due_date = $req->Due_Date;
        $data->address = $req->Address;
        $data->risk_date = $req->Risk_Date;
        $data->phone_no = $req->Phone_no;
        $data->agent_id = Auth::user()->agent_id;
        $data->save();
        $req->session()->flash('insert', 'Policy has been added.');
        return redirect('agent/details');
    }
    public function policyEdit(Request $req)
    {
        $data = Client::findOrFail($req->input('id'));
        $data->name = $req->input('Policy_name');
        $data->address = $req->input('Address');
        $data->phone_no = $req->input('Phone_no');
        $data->save();

        $req->session()->flash('update', 'Policy has been updated.');
        return redirect('agent/details');
    }
    public function policyDestroy(Request $req)
    {
        $data = Client::findOrFail($req->id);
        $data->delete();
        $req->session()->flash('delete', 'Policy has been deleted.');
        return redirect('agent/details');
    }
    public function pdfGen(Request $req)
    {
        $data = Client::where('id', $req->btn)->get();
        $pdf = PDF::loadView('agent.pdf', ['data' => $data]);
        return $pdf->stream('policy.pdf'); //new page
        // //downloadr   eturn $pdf->stream('policy.pdf'); 
    }
    public function policySearch(Request $req)
    {
        $search = $req->get('search');
        $data  = DB::table('clients')->where('name', 'like', '%' . $search . '%')
            ->orWhere('policy_no', 'like', '%' . $search . '%')->paginate(5);
        return view('agent/details', ['data' => $data]);
        $req->session()->flash('search', 'Policy has been founded.');
    }
    public function userProfile(Request $req)
    {
        $count = DB::table('clients')->count('id');
        $data = User::where('agent_id', Auth::User()->agent_id)->get();
        return view('agent.profile', ['data' => $data], ['count' => $count]);
    }
    public function userEdit(Request $req)
    {
        $data = User::findOrFail($req->input('id'));
        $data->name = $req->input('name');
        $data->address = $req->input('Address');
        $data->phone_no = $req->input('Phone_no');
        $data->save();

        $req->session()->flash('update', 'Policy has been updated.');
        return redirect('/profile');
    }
}
