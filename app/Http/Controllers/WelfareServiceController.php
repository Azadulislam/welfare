<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePaymentRequirest;
use App\Http\Resources\TypesResoure;
use App\Models\ActivityLog;
use App\Models\AllMember;
use App\Models\CitizenshipCountry;
use App\Models\Genders;
use App\Models\HelpCategoriesType;
use App\Models\HelpCategory;
use App\Models\HelpTypes;
use App\Models\Homestatuses;
use App\Models\JobSectors;
use App\Models\MemberStatuses;
use App\Models\WelfareService;
use App\Http\Requests\StoreWelfareServiceRequest;
use App\Http\Requests\UpdateWelfareServiceRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class WelfareServiceController extends Controller
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
        $members = WelfareService::all();
        return view('welfare', compact('members'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member_statuses = MemberStatuses::all();
        $job_sectors = JobSectors::all();
        $home_types = Homestatuses::all();
        $help_categories = HelpCategory::all();
        return view('add-welfare', compact('member_statuses', 'job_sectors', 'home_types', 'help_categories'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function welfareCreate($category_id = null)
    {
        $member_statuses = MemberStatuses::all();
        $job_sectors = JobSectors::all();
        $home_types = Homestatuses::all();
        $help_categories = HelpCategory::all();
        return view('add-welfare', compact('member_statuses', 'job_sectors', 'home_types', 'help_categories', 'category_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WelfareService  $welfareService
     * @return \Illuminate\Http\Response
     */
    public function payment(WelfareService $welfare_service, $category = NULL)
    {

        $citizenshipCounties = CitizenshipCountry::all();
        $help_cats = HelpCategory::all();
        return view('payment', compact('welfare_service', 'citizenshipCounties', 'help_cats'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WelfareService  $welfareService
     * @return \Illuminate\Http\Response
     */
    public function welfare($category = null)
    {
        $category_id = HelpCategory::where('name', 'like', $category)->first()['id'];
        $members = WelfareService::where('help_cat_id', '=', $category_id)->get();

        return view('welfare', compact('members', 'category', 'category_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWelfareServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWelfareServiceRequest $request)
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

        $welfare->member_id = $request->member_id;
        $welfare->date_apply = $request->date_apply;
        $welfare->help_cat_id = $request->help_cat_id;
        $welfare->informer_name = $request->informer_name;
        $welfare->remarks = $request->summary;
        $welfare->zakat_years = json_encode($request->years);
        $welfare->last_edited_date = Carbon::today()->format('Y-m-d');

        $welfare->save();

        $member = AllMember::where('id', $request->member_id)->first();
        $member->current_job = $request->current_job;
        $member->unemployed_reason = $request->unemployed_reason;
        $member->current_job_sector_id  = $request->job_sector_id;
        $member->start_of_stay  = $request->start_of_stay;
        $member->home_status_id  = $request->home_status_id;

        $member->update();

        $details = 'New Welfare service Registered';

        addActivity($welfare->id, $details);

        return redirect()->route('welfare.index')->with('alert-success', 'Welfare help registered successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WelfareService  $welfareService
     * @return \Illuminate\Http\Response
     */
    public function show(WelfareService $welfare)
    {
        return view('welfare-member', compact('welfare'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WelfareService  $welfareService
     * @return \Illuminate\Http\Response
     */
    public function edit(WelfareService $welfare)
    {
        $member_statuses = MemberStatuses::all();
        $job_sectors = JobSectors::all();
        $home_types = Homestatuses::all();
        $help_categories = HelpCategory::all();
        return view('edit-welfare', compact('welfare', 'member_statuses', 'help_categories', 'job_sectors', 'home_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWelfareServiceRequest  $request
     * @param  \App\Models\WelfareService  $welfareService
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWelfareServiceRequest $request, WelfareService $welfare)
    {
        if(isset($request->images)){
            foreach ($request->images as $key => $image){
                $name = $image->getClientOriginalName();
                $oldFile = $request->oldImages[$key];
                if(!empty($name)){
                    $fileName = 'help-' . substr(md5(sha1(time())), 0, 10) . '-' . $name;
                    $image->move(public_path('uploads'), $fileName);
                    $welfare->{'attached_file' . ($key + 1)} = $fileName;
                    if (File::exists(public_path('uploads/' . $oldFile))) {
                        if ($oldFile != 'profile.png') {
                            File::delete(public_path('uploads/' . $oldFile));
                        }
                    }
                }else{
                    $oldFile->{'attache_file' . ($key+1)} = $oldFile;
                }
            }
        }

        $welfare->member_id = $request->member_id;
        $welfare->date_apply = $request->date_apply;
        $welfare->help_cat_id = $request->help_cat_id;
        $welfare->informer_name = $request->informer_name;
        $welfare->remarks = $request->summary;
        $welfare->zakat_years = json_encode($request->years);
        $welfare->last_edited_date = Carbon::today()->format('Y-m-d');

        $welfare->save();

        $member = AllMember::where('id', $request->member_id)->first();
        $member->current_job = $request->current_job;
        if($member->current_job == 'Job'){
            $request->unemployed_reason = '';
        }
        $member->unemployed_reason = $request->unemployed_reason;
        $member->current_job_sector_id  = $request->job_sector_id;
        $member->start_of_stay  = $request->start_of_stay;
        $member->home_status_id  = $request->home_status_id;

        $member->update();

        $details = 'Welfare service Updated';
        addActivity($welfare->id, $details);

        return redirect()->route('welfare.index')->with('alert-success', 'Welfare help registered successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WelfareService  $welfareService
     * @return \Illuminate\Http\Response
     */
    public function destroy(WelfareService $welfareService)
    {
        //
    }

    public function typeByCategory($category = null){
        $types = HelpCategoriesType::where('help_category_id', '=', $category)->get();

        return TypesResoure::collection($types);
    }

}
