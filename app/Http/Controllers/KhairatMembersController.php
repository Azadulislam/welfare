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
        return redirect()->route('khairat-member.index')->with('alert-success', 'Khairat member added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KhairatMembers  $khairatMembers
     * @return \Illuminate\Http\Response
     */
    public function show(KhairatMembers $khairat_member)
    {


        return view('khairat-single-member', compact('khairat_member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KhairatMembers  $khairatMembers
     * @return \Illuminate\Http\Response
     */
    public function edit(KhairatMembers $khairat_member)
    {
        $maritalStatuses = MaritalStatuses::all();
        $member_statuses = MemberStatuses::all();
        return view('edit-khairat', compact('khairat_member', 'maritalStatuses', 'member_statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKhairatMembersRequest  $request
     * @param  \App\Models\KhairatMembers  $khairatMembers
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(UpdateKhairatMembersRequest $request, KhairatMembers $khairat_member)
    {
        $khairat_member->member_start_date = $request->member_start_date;
        $khairat_member->approval_date = $request->approval_date;
        $khairat_member->update();
        return redirect()->route('khairat-member.index')->with('alert-success', 'Khairat member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KhairatMembers  $khairatMembers
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(KhairatMembers $khairat_member)
    {
        dd($khairat_member);
        $khairat_member->delete();
        return redirect()->route('khairat-member.index')->with('alert-warning', 'Khairat member deleted successfully');
    }
}
