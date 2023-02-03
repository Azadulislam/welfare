<?php

namespace App\Http\Controllers;

use App\Models\AllMember;
use App\Models\HelpProvided;
use App\Http\Requests\StoreHelpProvidedRequest;
use App\Http\Requests\UpdateHelpProvidedRequest;
use App\Models\WelfareService;
use Carbon\Carbon;

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
        $welfare = new WelfareService();

        if(isset($request->images)){
            foreach ($request->images as $key => $image){
                $name = $image->getClientOriginalName();
                $fileName = 'help-' . substr(md5(sha1(time())), 0, 10) . '-' . $name;
                $image->move(public_path('uploads'), $fileName);
                $welfare->{'attached_file' . ($key + 1)} = $fileName;
            }
        }

        $welfare->approved_by = $request->authorized_by;
        $welfare->approved_date = $request->authorized_date;
        $welfare->remarks = $request->summary;
        $welfare->service_cost = $request->service_cost;
        $welfare->last_edited_date = Carbon::today()->format('Y-m-d');

        $welfare->save();

        $member = AllMember::where('id', $request->member_id)->first();
        $member->current_job = $request->current_job;
        $member->unemployed_reason = $request->unemployed_reason;
        $member->current_job_sector_id  = $request->job_sector_id;
        $member->home_status_id  = $request->home_status_id;

        $member->update();

        return redirect()->route('welfare.index')->with('alert-success', 'Welfare help registered successfully');
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
        //
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
        //
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
