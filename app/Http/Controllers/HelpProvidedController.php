<?php

namespace App\Http\Controllers;

use App\Models\AllMember;
use App\Models\HelpCategoriesType;
use App\Models\HelpCategory;
use App\Models\HelpProvided;
use App\Http\Requests\StoreHelpProvidedRequest;
use App\Http\Requests\UpdateHelpProvidedRequest;
use App\Models\HelpTypes;
use App\Models\WelfareService;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class HelpProvidedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreHelpProvidedRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHelpProvidedRequest $request)
    {
        $helpProvided = new HelpProvided();

        if(isset($request->images)){
            foreach ($request->images as $key => $image){
                $name = $image->getClientOriginalName();
                $fileName = 'help-payout-' . substr(md5(sha1(time())), 0, 10) . '-' . $name;
                $image->move(public_path('uploads'), $fileName);
                $helpProvided->{'attached_file' . ($key + 1)} = $fileName;
            }
        }

        $helpProvided->member_id = $request->member_id;
        $helpProvided->welfare_id = $request->welfare_id;
        $helpProvided->help_cat_id = $request->help_cat_id;
        $helpProvided->help_type_id = $request->help_type_id;
        $helpProvided->approved_by = $request->authorized_by;
        $helpProvided->approved_date = $request->authorized_date;
        $helpProvided->remarks = $request->summary;
        $helpProvided->service_cost = $request->service_cost;
        $helpProvided->date_payout = $request->date_payout;
        $helpProvided->payout_received_by = $request->payout_received_by;

        $helpProvided->last_edited_date = Carbon::today()->format('Y-m-d');

        $helpProvided->save();

        $details = 'New welfare help payment added';
        addActivity($helpProvided->id, $details);

        return redirect()->route('welfare.index')->with('alert-success', 'Welfare help payout successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HelpProvided  $helpProvided
     * @return \Illuminate\Http\Response
     */
    public function show(HelpProvided $helpProvided)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HelpProvided  $helpProvided
     * @return \Illuminate\Http\Response
     */
    public function edit(HelpProvided $helpProvided)
    {
        $help_cats = HelpCategory::all();
        return view('edit-payment', compact('helpProvided', 'help_cats' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHelpProvidedRequest  $request
     * @param  \App\Models\HelpProvided  $helpProvided
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHelpProvidedRequest $request, HelpProvided $helpProvided)
    {
        if(isset($request->images)){
            foreach ($request->images as $key => $image){
                $oldFile = $request->oldImages[$key];
                $name = $image->getClientOriginalName();
                if(!empty($name)){
                    $fileName = 'help-payout-' . substr(md5(sha1(time())), 0, 10) . '-' . $name;
                    $image->move(public_path('uploads'), $fileName);
                    $helpProvided->{'attached_file' . ($key + 1)} = $fileName;
                    if (File::exists(public_path('uploads/' . $oldFile))) {
                        if ($oldFile != 'profile.png') {
                            File::delete(public_path('uploads/' . $oldFile));
                        }
                    }
                }else{
                    $helpProvided->{'attache_file' . ($key+1)} = $oldFile;
                }
            }
        }


        $helpProvided->help_cat_id = $request->help_cat_id;
        $helpProvided->help_type_id = $request->help_type_id;
        $helpProvided->approved_by = $request->approved_by;
        $helpProvided->approved_date = $request->approved_date;
        $helpProvided->remarks = $request->summary;
        $helpProvided->service_cost = $request->service_cost;
        $helpProvided->date_payout = $request->date_payout;
        $helpProvided->payout_received_by = $request->payout_received_by;

        $helpProvided->last_edited_date = Carbon::today()->format('Y-m-d');

        $helpProvided->update();

        $details = 'One welfare help payment updated';
        addActivity($helpProvided->id, $details);

        return redirect()->route('welfare.index')->with('alert-success', 'Welfare help payout updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HelpProvided  $helpProvided
     * @return \Illuminate\Http\Response
     */
    public function destroy(HelpProvided $helpProvided)
    {
        //
    }
}
