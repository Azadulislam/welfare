<?php

namespace App\Http\Controllers;


use App\Models\AllMember;
use App\Http\Requests\StoreAllMemberRequest;
use App\Http\Requests\UpdateAllMemberRequest;
use App\Models\CitizenshipCountry;
use App\Models\Death;
use App\Models\Genders;
use App\Models\HelpProvided;
use App\Models\Homestatuses;
use App\Models\JobSectors;
use App\Models\KhairatMembers;
use App\Models\MaritalStatuses;
use App\Models\MemberStatuses;
use App\Models\Races;
use App\Models\Relations;
use App\Models\RelationShip;
use App\Models\Religions;
use App\Models\State;
use App\Models\WelfareService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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
        $members = AllMember::where('name', 'like', "%$keyword%")->orWhere('ic_no', 'like', "%$keyword%")->orderBy('name', 'ASC')->get();
        return $members;
    }

    public function searchMemberUnique(Request $request)
    {
        $keyword = $request->search;
        $khairatIds = KhairatMembers::pluck('member_id')->toArray();
        $members = AllMember::whereNotIn( "id", $khairatIds);
        if(!empty($keyword)){
            $members = $members->where('name', 'like', "%$keyword%")->orWhere('ic_no', 'like', "%$keyword%");
        };
        $members = $members->orderBy('name', 'ASC')->get();
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
            'state' => getName($member->home_state),
            'birth_date' => $member->birth_date,
            'telephone' => $member->telephone_one,
            'name2' => $member->name2,
            'gender' => getName($member->gender),
            'member_status_ids' => $member->member_status_ids,
            'race' => getName($member->race),
            'religion' => getName($member->religion),
            'marital_status' => getName($member->marital_status),
            'marital_status_id' => $member->marital_status_id,
            'citizenship' => getName($member->citizenship),
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
        $relations = Relations::orderBy('name', 'ASC')->get();// RelationShip::where('member_id', '=', $member->id)->orWhere('related_to_id', '=', $member->id)->get();
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
        $allMember->religion_id = $request->religion_id;
        $allMember->mobile_phone = $request->mobile_phone;
        $allMember->marital_status_id = $request->marital_status_id;
        $allMember->ic_address1 = $request->ic_address1;
        $allMember->ic_address2 = $request->ic_address2;
        $allMember->ic_address3 = $request->ic_address3;
        $allMember->ic_city = $request->ic_city;
        $allMember->ic_postcode = $request->ic_postcode;
        $allMember->ic_district = $request->ic_district;
        $allMember->ic_state_id = $request->ic_state_id;
        $allMember->ic_section = $request->ic_section;

        $allMember->home_address1 = $request->home_address1;
        $allMember->home_address2 = $request->home_address2;
        $allMember->home_address3 = $request->home_address3;
        $allMember->home_city = $request->home_city;
        $allMember->home_postcode = $request->home_postcode;
        $allMember->home_district = $request->home_district;
        $allMember->home_state_id = $request->home_state_id;
        $allMember->home_section = $request->home_section;

        $allMember->telephone_one = $request->telephone_one;
        $allMember->mobile_phone = $request->mobile_phone;
        $allMember->beneficiary_name = $request->beneficiary_name;
        $allMember->beneficiary_ic = $request->beneficiary_ic;
        $allMember->email = $request->email;
        $allMember->last_edited_date =Carbon::today()->format('Y-m-d');

        $allMember->save();

        $details = 'New Member Added';
        addActivity($allMember->id, $details);
        $message = trans('lang.member_added_successfully_alert');
        return redirect()->route('member.index')->with('alert-success', $message);
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
        $relationships = $member->relation_ships;
        return view('member', compact('member', 'relationships'));
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
        $states = State::all();
        return view('edit-member', compact('home_types', 'member', 'job_sectors', 'member_statuses', 'citizenshipCounties', 'religions', 'races', 'maritalStatuses', 'genders', 'states'));
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
        $allMember->citizenship_id = $request->citizenship;
        $allMember->gender_id = $request->gender;
        $allMember->race_id = $request->race_id;
        $allMember->religion_id = $request->religion;
        $allMember->mobile_phone = $request->mobile_phone;
        $allMember->marital_status_id = $request->marital_status_id;
        $allMember->ic_address1 = $request->ic_address1;
        $allMember->ic_address2 = $request->ic_address2;
        $allMember->ic_address3 = $request->ic_address3;
        $allMember->ic_city = $request->ic_city;
        $allMember->ic_postcode = $request->ic_postcode;
        $allMember->ic_district = $request->ic_district;
        $allMember->ic_state_id = $request->ic_state;
        $allMember->ic_section = $request->ic_section;

        $allMember->home_address1 = $request->home_address1;
        $allMember->home_address2 = $request->home_address2;
        $allMember->home_address3 = $request->home_address3;
        $allMember->home_city = $request->home_city;
        $allMember->home_postcode = $request->home_postcode;
        $allMember->home_district = $request->home_district;
        $allMember->home_state_id = $request->home_state;
        $allMember->home_section = $request->home_section;

        $allMember->telephone_one = $request->telephone_one;
        $allMember->mobile_phone = $request->mobile_phone;
        $allMember->beneficiary_name = $request->beneficiary_name;
        $allMember->beneficiary_ic = $request->beneficiary_ic;
        $allMember->email = $request->email;
        $allMember->last_edited_date =Carbon::today()->format('Y-m-d');

        $allMember->update();

        $details = 'Member info Updated';
        addActivity($allMember->id, $details);

        $message = trans('lang.member_updated_successfully_alert');
        return redirect()->route('member.index')->with('alert-success',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AllMember  $allMember
     * @return \Illuminate\Http\Response
     */
    public function destroy($allMember)
    {
        $khairats = KhairatMembers::where('member_id', '=', $allMember)->get();
        $deaths = Death::where('all_member_id', '=', $allMember)->get();
        $welfares = WelfareService::where('member_id', '=', $allMember)->get();
        $member = AllMember::where('id', '=', $allMember)->first();
        $relationships = RelationShip::where('member_id', '=', $allMember)->get();
        $helpProvideds = HelpProvided::where('member_id', '=', $allMember)->get();


        if($member){
            $details = 'One member Deleted';
            addActivity($member->id, $details);
            $member->delete();
        }else{

            $message = trans('lang.member_not_found_alert');
            return redirect()->route('member.index')->with('alert-warning',$message);
        }
        foreach ($deaths as $death){
            $death->delete();
        }
        foreach ($khairats as $khairat){
            $khairat->delete();
        }
        foreach ($welfares as $welfare){
            $welfare->delete();
        }
        foreach ($relationships as $relationship){
            $relationship->delete();
        }
        foreach ($helpProvideds as $helpProvided){
            $helpProvided->delete();
        }


        $message = trans('lang.member_deleted_successfully_alert');
        return redirect()->route('member.index')->with('alert-warning', $message);
    }
}
