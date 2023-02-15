<?php

namespace App\Http\Controllers;

use App\Exports\KhairatExport;
use App\Exports\WelfareExport;
use App\Imports\WelfareImport;
use App\Models\ActivityLog;
use App\Http\Requests\StoreActivityLogRequest;
use App\Http\Requests\UpdateActivityLogRequest;
use App\Models\KhairatMembers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = ActivityLog::all();
        return view('audit', compact('activities'));
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
     * @param  \App\Http\Requests\StoreActivityLogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActivityLogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActivityLog  $activityLog
     * @return \Illuminate\Http\Response
     */
    public function show(ActivityLog $activityLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActivityLog  $activityLog
     * @return \Illuminate\Http\Response
     */
    public function edit(ActivityLog $activityLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateActivityLogRequest  $request
     * @param  \App\Models\ActivityLog  $activityLog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActivityLogRequest $request, ActivityLog $activityLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActivityLog  $activityLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActivityLog $activityLog)
    {
        //
    }

    public function export(){
        $columns = fields();
        return view('export-welfare', compact('columns'));
    }

    public function exportTwo(){
        $columns = khairatFields();
        return view('export-welfare', compact('columns'));
    }
    public function exportWelfare(Request $request){
        $fields = $request->fields;
        $columns = array_filter(fields(), function ($item)use( $fields ){
            return in_array($item['id'], $fields);
        });
        return Excel::download(new WelfareExport($columns), 'welfare.xlsx');
    }
    public function exportKhairat(Request $request){
        $fields = $request->fields;
        $columns = array_filter(khairatFields(), function ($item)use( $fields ){
            return in_array($item['id'], $fields);
        });
        return Excel::download(new KhairatExport($columns), 'khairat.xlsx');
    }
}
