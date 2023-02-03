<?php

use Carbon\Carbon;

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
    return Carbon::parse($date)->format('d M Y');
}
