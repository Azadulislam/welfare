<?php

namespace App\Http\Controllers;


use App\Models\KhairatMembers;
use App\Http\Requests\StoreKhairatMembersRequest;
use App\Http\Requests\UpdateKhairatMembersRequest;
use App\Models\MaritalStatuses;
use App\Models\MemberStatuses;
use App\Models\Races;


class KhairatMembersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $members = KhairatMembers::all();

        return view('khairat-member', compact('members'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $member_statuses = MemberStatuses::all();
        $races = Races::all();
        $maritalStatuses = MaritalStatuses::all();
        return view('add-khairat', compact('member_statuses', 'maritalStatuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKhairatMembersRequest  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(StoreKhairatMembersRequest $request)
    {
        $khairat = new KhairatMembers();
        $khairat->member_id = $request->member_id;
        $khairat->membership_no = substr(md5(sha1(time())), 0, 10);
        $khairat->member_start_date = $request->member_start_date;
        $khairat->approval_date = $request->approval_date;
        $khairat->save();

        $details = 'New khairat member added';
        addActivity($khairat->id, $details);

        return redirect()->route('khairat.index')->with('alert-success', 'Khairat member added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KhairatMembers  $khairatMembers
     * @return \Illuminate\Http\Response
     */
    public function show(KhairatMembers $khairat)
    {
        return view('khairat-single-member', compact('khairat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KhairatMembers  $khairatMembers
     * @return \Illuminate\Http\Response
     */
    public function edit(KhairatMembers $khairat)
    {
        $maritalStatuses = MaritalStatuses::all();
        $member_statuses = MemberStatuses::all();
        return view('edit-khairat', compact('khairat', 'maritalStatuses', 'member_statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKhairatMembersRequest  $request
     * @param  \App\Models\KhairatMembers  $khairatMembers
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(UpdateKhairatMembersRequest $request, KhairatMembers $khairat)
    {
        $khairat->member_start_date = $request->member_start_date;
        $khairat->approval_date = $request->approval_date;
        $khairat->update();

        $details = 'One khairat member updated';
        addActivity($khairat->id, $details);

        return redirect()->route('member.index')->with('alert-success', 'Khairat member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KhairatMembers  $khairatMembers
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(KhairatMembers $khairat)
    {
        $details = 'One khairat member deleted';
        addActivity($khairat->id, $details);
        $khairat->delete();
        return redirect()->route('khairat.index')->with('alert-warning', 'Khairat member deleted successfully');
    }
}
