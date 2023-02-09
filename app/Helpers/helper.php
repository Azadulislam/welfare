<?php

use App\Models\ActivityLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

function address(){
    return 'okay';
}

function memberStatus($statuses){
    $response = '';
    if(!empty($statuses)){
        foreach (json_decode($statuses) as $key => $status){
            if($key != 0){
                $response .= ', ';
            }

            $response .= \App\Models\MemberStatuses::where('id', '=',$status)->first()->name;
        }
    }

    return $response;
}

function oldCheckBox($val, $array){
    if(!empty($array)){
        $array = json_decode($array);
        if(in_array($val,$array)) return "checked";
    }
    return '';
}


function age($birth_date){
    $diff = date_diff(Carbon::parse($birth_date), Carbon::today());
    return $diff->d;
}


function formatDate($date){
    return Carbon::parse($date)->format('Y-m-d');
}


function addActivity($action_id, $details){
    $activity = new ActivityLog();
    $activity->user_id = Auth::user()->id;
    $activity->action_id = $action_id;
    $activity->action_details = $details;

    $activity->save();
}


function getName($attr){
    return $attr ? $attr->name : '';
}
