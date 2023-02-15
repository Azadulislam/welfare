<?php

namespace App\Http\Controllers;

use App\Models\Death;
use App\Models\HelpCategory;
use App\Models\KhairatMembers;
use App\Models\User;
use App\Models\WelfareService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function users(){
        $users = User::all();
        return view('users', compact('users'));
    }

    public function summaryData(Request $request){
        $cyear = Carbon::today()->format('Y');
        if($request->get == 'years'){
            $startY = $cyear - 6;
            $end = ($cyear);
        }elseif($request->get == 'months'){
            $startY = 1;
            $end = 12;
            if(isset($request->year)){
                $cyear = $request->year;
            }
        }
        $death = [];
        $asnaf = [];
        $khairat = [];
        $welfare = [];
        for($start = $startY; $start <= $end; $start++){
            if($request->get == 'years'){
                array_push($death, [$start => Death::whereYear('date_of_death', $start)->get()->count()]);
                array_push($asnaf, [$start => WelfareService::where('help_cat_id', '=', HelpCategory::where('name', 'like', 'Asnaf')->first()->id)->whereYear('date_apply', $start)->get()->count()]);
                array_push($khairat, [$start => KhairatMembers::whereYear('member_start_date', $start)->get()->count()]);
                array_push($welfare, [$start => WelfareService::whereYear('date_apply', $start)->get()->count()]);

            }elseif($request->get == 'months'){
                array_push($death, [Carbon::parse($start.'/01/'. $cyear)->format('F Y') => Death::whereMonth('date_of_death', $cyear)->whereYear('date_of_death', $cyear)->get()->count()]);
                array_push($asnaf, [Carbon::parse($start.'/01/'. $cyear)->format('F Y') => WelfareService::where('help_cat_id', '=', HelpCategory::where('name', 'like', 'Asnaf')->first()->id)->whereMonth('date_apply', $cyear)->whereYear('date_apply', $cyear)->get()->count()]);
                array_push($khairat, [Carbon::parse($start.'/01/'. $cyear)->format('F Y') => KhairatMembers::whereMonth('member_start_date', $cyear)->whereYear('member_start_date', $cyear)->get()->count()]);
                array_push($welfare, [Carbon::parse($start.'/01/'. $cyear)->format('F Y') => WelfareService::whereMonth('date_apply', $cyear)->whereYear('date_apply', $cyear)->get()->count()]);
            }
        }

        $response['death'] = $death;
        $response['asnaf'] = $asnaf;
        $response['khairat'] = $khairat;
        $response['welfare'] = $welfare;

        return response($response);
    }

    public function summary(){
        return view('summary');
    }

    public function setting(){
        $user = Auth::user();
        return view('settings', compact('user'));
    }

    public function updateUser(Request $request,User $user){
        $request->validate([
            'name' => 'required',
        ]);

        $user->name = $request->name;

        $user->update();
        return redirect('setting')->with('alert-success', 'User updated successfully');

    }

    public function changePassword(Request $request,User $user){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if(password_verify($request->old_password , $user->password)){
            $user->password = Hash::make($request->new_password);
            $user->update();
            return redirect('setting')->with('alert-success', 'Password Change successfully');
        }else{
            return redirect('setting')->with('alert-warning', 'Old password is wrong');
        }

    }
}
