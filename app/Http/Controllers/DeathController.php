<?php

namespace App\Http\Controllers;

use App\Models\AllMember;
use App\Models\Death;
use App\Http\Requests\StoreDeathRequest;
use App\Http\Requests\UpdateDeathRequest;
use App\Models\MemorialServices;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DeathController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Death::all();
        return view('deaths', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-death');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDeathRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeathRequest $request)
    {
        $memorial_service = new Death();
        if(isset($request->images)){
            foreach ($request->images as $key => $image){
                $name = $image->getClientOriginalName();
                $fileName = 'death-'.substr(md5(sha1(time())), 0, 10). '-' . $name;
                $image->move(public_path('uploads') , $fileName);
                $memorial_service->{'attached_file' . ($key+1)} = $fileName;
            }
        }

        $memorial_service->all_member_id = $request->member_id;
        $memorial_service->burial_contact_person = $request->burial_contact_person;
        $memorial_service->burial_contact_person_tel = $request->burial_contact_person_tel;
        $memorial_service->date_of_death = $request->date_of_death;
        $memorial_service->cause_of_death = $request->cause_of_death;
        $memorial_service->burial_place = $request->burial_place;
        $memorial_service->done_by_mosque = $request->done_by_mosque;
        $memorial_service->last_edited_date = Carbon::today()->format('Y-m-d');

        $memorial_service->save();

        return redirect()->route('death.index')->with('alert-success', 'Died Member added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Death  $death
     * @return \Illuminate\Http\Response
     */
    public function show(Death $death)
    {
        return view('death-member', compact('death'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Death  $death
     * @return \Illuminate\Http\Response
     */
    public function edit(Death $death)
    {
        return view('edit-death', compact('death'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeathRequest  $request
     * @param  \App\Models\Death  $death
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeathRequest $request, Death $death)
    {
        if(isset($request->images)){
            foreach ($request->images as $key => $image){
                $oldFile = $request->oldImage[$key];
                $name = $image->getClientOriginalName();
                if(!empty($name)){
                    $fileName = 'death-'.substr(md5(sha1(time())), 0, 10). '-' . $name;
                    $image->move(public_path('uploads') , $fileName);
                    if (File::exists(public_path('uploads/' . $oldFile))) {
                        if ($oldFile != 'profile.png') {
                            File::delete(public_path('uploads/' . $oldFile));
                        }
                    }
                    $death->{'attached_file' . ($key+1)} = $fileName;
                }else{
                    $death->{'attached_file' . ($key+1)} = $oldFile;
                }

            }
        }

//        $death->all_member_id = $request->member_id;
        $death->burial_contact_person = $request->burial_contact_person;
        $death->burial_contact_person_tel = $request->burial_contact_person_tel;
        $death->date_of_death = $request->date_of_death;
        $death->cause_of_death = $request->cause_of_death;
        $death->burial_place = $request->burial_place;
        $death->done_by_mosque = $request->done_by_mosque;
        $death->last_edited_date = Carbon::today()->format('Y-m-d');

        $death->update();

        return redirect()->route('death.index')->with('alert-success', 'Died Member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Death  $death
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(Death $death)
    {
        foreach (array($death->attached_file1, $death->attached_file2, $death->attached_file3, $death->attached_file4) as $key => $image){
            $oldFile = $image;
            if(!empty($oldFile)){
                if (File::exists(public_path('uploads/' . $oldFile))) {
                    if ($oldFile != 'profile.png') {
                        File::delete(public_path('uploads/' . $oldFile));
                    }
                }
            }
        }
        $death->delete();
        return redirect()->route('death.index')->with('alert-warning', 'Died Member deleted successfully');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function burialPayments()
    {
        $deaths = Death::all();
        return view('burial-payments', compact('deaths'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function burialPaymentCreate(Death $death)
    {
        return view('edit-burial-payment', compact('death'));
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param Death $death
     * @return void
     */
    public function burialPaymentUpdate(Request $request, Death $death)
    {
        $request->validate([
            'pay_date' => 'required',
            'service_cost' => 'required|decimal:2',

        ]);
        $death->pay_date = $request->pay_date;
        $death->service_cost = $request->service_cost;
        $death->last_edited_date = Carbon::today()->format('Y-m-d');
        $death->update();

        return redirect()->route('burial.payment.index')->with('alert-success', 'Burial updated successfully');
    }
}
