<?php

namespace App\Http\Controllers;

use App\Http\Resources\MemberDataResource;
use App\Models\AllMember;
use App\Http\Requests\StoreAllMemberRequest;
use App\Http\Requests\UpdateAllMemberRequest;
use App\Models\CitizenshipCountry;
use App\Models\Genders;
use App\Models\Homestatuses;
use App\Models\JobSectors;
use App\Models\MaritalStatuses;
use App\Models\MemberStatuses;
use App\Models\Races;
use App\Models\Relations;
use App\Models\RelationShip;
use App\Models\Religions;
use App\Models\State;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use function PHPUnit\Framework\isNull;

class AllMemberController extends Controller
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
        $members = AllMember::all();
        return view('home', compact('members'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function searchMember(Request $request)
    {
        $keyword = $request->search;
        $members = AllMember::where('name', 'like', "%$keyword%")->orWhere('ic_no', 'like', "%$keyword%")->get();
        return $members;
    }

    public function member(AllMember $member){
        $response = [
            'id' => $member->id,
            'name' => $member->name,
            'ic_no' => $member->ic_no,
            'home_address1' => $member->home_address1,
            'start_of_stay' => $member->start_of_stay,
            'city' => $member->home_city,
            'district' => $member->home_district,
            'state' => is_null($member->home_state)? '':$member->home_state->name,
            'birth_date' => $member->birth_date,
            'telephone' => $member->telephone_one,
            'name2' => $member->name2,
            'gender' => $member->gender,
            'member_status_ids' => $member->member_status_ids,
            'race' => $member->race,
            'religion' => $member->religion,
            'marital_status' => is_null($member->marital_status) ? '': $member->marital_status->name,
            'marital_status_id' => $member->marital_status_id,
            'citizenship' => is_null($member->citizenship)?'':$member->citizenship->name,
            'mobile_phone' => $member->mobile_phone,
        ];
        return response($response);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function deaths()
    {
        $members = AllMember::all();
        return view('deaths', compact('members'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function family(AllMember $member)
    {
        $memberStatus = MemberStatuses::all();
        $maritalStatus = MaritalStatuses::all();
        $members = AllMember::where('id', '<>', $member->id)->get();
        $relations = Relations::all();// RelationShip::where('member_id', '=', $member->id)->orWhere('related_to_id', '=', $member->id)->get();
        $relationships = $member->relation_ships;

        return view('family', compact('member', 'relationships', 'memberStatus', 'maritalStatus', 'members', 'relations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        $home_types = Homestatuses::all();
        $job_sectors = JobSectors::all();
        $member_statuses = MemberStatuses::all();
        $citizenshipCounties = CitizenshipCountry::all();
        $races = Races::all();
        $maritalStatuses = MaritalStatuses::all();
        $religions = Religions::all();
        $genders = Genders::all();
        return view('add-member', compact('home_types', 'job_sectors', 'member_statuses', 'citizenshipCounties', 'races', 'religions', 'maritalStatuses', 'genders', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAllMemberRequest  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(StoreAllMemberRequest $request)
    {
        $allMember = new AllMember();
        if(isset($request->images)){
            foreach ($request->images as $key => $image){
                $name = $image->getClientOriginalName();
                $fileName = substr(md5(sha1(time())), 0, 10). '-' . $name;
                $image->move(public_path('uploads') , $fileName);
                $allMember->{'attache_file' . ($key+1)} = $fileName;
            }
        }
        $allMember->name = $request->name;
        $allMember->ic_no = $request->ic_no;
        $allMember->member_status_ids = json_encode($request->member_status_ids);
        $allMember->birth_date = $request->birth_date;
//        $allMember->age = $request->age;
        $allMember->citizenship_id = $request->citizenship;
        $allMember->gender_id = $request->gender;
        $allMember->race_id = $request->race_id;
        $allMember->mobile_phone = $request->mobile_phone;
        $allMember->marital_status_id = $request->marital_status_id;
        $allMember->ic_address1 = $request->ic_address1;
        $allMember->ic_address2 = $request->ic_address2;
        $allMember->ic_address3 = $request->ic_address3;
        $allMember->ic_city = $request->ic_city;
        $allMember->ic_postcode = $request->ic_postcode;
        $allMember->ic_district = $request->ic_district;
        $allMember->ic_state_id = $request->ic_state_id;

        $allMember->home_address1 = $request->home_address1;
        $allMember->home_address2 = $request->home_address2;
        $allMember->home_address3 = $request->home_address3;
        $allMember->home_city = $request->home_city;
        $allMember->home_postcode = $request->home_postcode;
        $allMember->home_district = $request->home_district;
        $allMember->home_state_id = $request->home_state_id;

        $allMember->telephone_one = $request->telephone_one;
        $allMember->mobile_phone = $request->mobile_phone;
        $allMember->last_edited_date =Carbon::today()->format('Y-m-d');

        $allMember->save();

        return redirect()->route('member.index')->with('alert-success', 'Member added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AllMember  $allMember
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($allMember)
    {
        $member = AllMember::where('id', '=', $allMember)->first();
        return view('member', compact('member'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AllMember  $allMember
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function khairatMember(AllMember $member)
    {
        return view('khairat-single-member', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AllMember  $allMember
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($allMember)
    {
        $home_types = Homestatuses::all();
        $job_sectors = JobSectors::all();
        $member_statuses = MemberStatuses::all();
        $citizenshipCounties = CitizenshipCountry::all();
        $races = Races::all();
        $maritalStatuses = MaritalStatuses::all();
        $religions = Religions::all();
        $genders = Genders::all();
        $member = AllMember::where('id', '=', $allMember)->first();
        return view('edit-member', compact('home_types', 'member', 'job_sectors', 'member_statuses', 'citizenshipCounties', 'religions', 'races', 'maritalStatuses', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAllMemberRequest  $request
     * @param  \App\Models\AllMember  $allMember
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(UpdateAllMemberRequest $request, $allMember)
    {
        $allMember = AllMember::where('id', $allMember)->first();
        if(isset($request->images)){
            foreach ($request->images as $key => $image){
                $oldFile = $request->oldImages[$key];
                $name = $image->getClientOriginalName();
                if(!empty($name)){
                    $fileName = substr(md5(sha1(time())), 0, 10). '-' . $name;
                    $image->move(public_path('uploads') , $fileName);
                    if (File::exists(public_path('uploads/' . $oldFile))) {
                        if ($oldFile != 'profile.png') {
                            File::delete(public_path('uploads/' . $oldFile));
                        }
                    }
                    $allMember->{'attache_file' . ($key+1)} = $fileName;
                }else{
                    $allMember->{'attache_file' . ($key+1)} = $oldFile;
                }

            }
        }

        $allMember->name = $request->name;
        $allMember->ic_no = $request->ic_no;
        $allMember->member_status_ids = json_encode($request->member_status_ids);
        $allMember->birth_date = $request->birth_date;
//        $allMember->age = $request->age;
        $allMember->citizenship = $request->citizenship;
        $allMember->gender = $request->gender;
        $allMember->race_id = $request->race_id;
        $allMember->mobile_phone = $request->mobile_phone;
        $allMember->marital_status_id = $request->marital_status_id;
        $allMember->ic_address1 = $request->ic_address1;
        $allMember->ic_address2 = $request->ic_address2;
        $allMember->ic_address3 = $request->ic_address3;
        $allMember->ic_city = $request->ic_city;
        $allMember->ic_postcode = $request->ic_postcode;
        $allMember->ic_district = $request->ic_district;
        $allMember->ic_state = $request->ic_state;

        $allMember->home_address1 = $request->home_address1;
        $allMember->home_address2 = $request->home_address2;
        $allMember->home_address3 = $request->home_address3;
        $allMember->home_city = $request->home_city;
        $allMember->home_postcode = $request->home_postcode;
        $allMember->home_district = $request->home_district;
        $allMember->home_state = $request->home_state;

        $allMember->telephone_one = $request->telephone_one;
        $allMember->mobile_phone = $request->mobile_phone;
        $allMember->last_edited_date =Carbon::today()->format('Y-m-d');

        $allMember->update();

        return redirect()->route('member.index')->with('alert-success', 'Member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AllMember  $allMember
     * @return \Illuminate\Http\Response
     */
    public function destroy($allMember)
    {
        $member = AllMember::where('id', '=', $allMember)->first();
        $member->delete();

        return redirect()->route('member.index')->with('alert-warning', 'Member Deleted successfully');
    }
}