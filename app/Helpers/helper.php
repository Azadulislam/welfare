<?php

use App\Models\ActivityLog;
use App\Models\Relations;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

function address(){
    return 'okay';
}


function fields(){
    return [
        array('id'=>1,'label' => 'Full Name', 'name' => array('name', 'name2')),
        array('id'=>2,'label' => 'IC Num', 'name' => 'member', 'attr' => 'ic_no'),
        array('id'=>3,'label' => 'Address', 'name' => 'member', 'attr' => 'home_address1'),
        array('id'=>4,'label' => 'Member Status', 'name' => 'member', 'attr' => 'memberStatus'),
        array('id'=>5,'label' => 'Status Current Place', 'name' => 'memberGetName', 'attr' => 'home_status'),
        array('id'=>6,'label' => 'Help Category', 'name' => 'memberGetName', 'attr' => 'citizenship'),
        array('id'=>7,'label' => 'Total Amount Paid', 'name' => 'helps', 'attr' => 'service_cost'),
        array('id'=>8,'label' => 'Date Registered', 'name' => 'date_apply'),
    ];
}


function khairatFields()
{
    return [
        array('id' => 1, 'label' => 'Full Name', 'name' => array('name', 'name2')),
        array('id' => 2, 'label' => 'IC Num', 'name' => 'member', 'attr' => 'ic_no'),
        array('id' => 3, 'label' => 'Address', 'name' => 'member', 'attr' => 'home_address1'),
        array('id' => 4, 'label' => 'Member Type', 'name' => 'member', 'attr' => 'memberStatus'),
        array('id' => 5, 'label' => 'Date Of Birth', 'name' => 'member', 'attr' => 'birth_date'),
        array('id' => 6, 'label' => 'Citizenship', 'name' => 'memberGetName', 'attr' => 'citizenship'),
        array('id' => 7, 'label' => 'Gender', 'name' => 'memberGetName', 'attr' => 'gender'),
        array('id' => 8, 'label' => 'Race', 'name' => 'memberGetName', 'attr' => 'race'),
        array('id' => 9, 'label' => 'Religion', 'name' => 'memberGetName', 'attr', 'religion'),
        array('id' => 10, 'label' => 'Martial Status', 'name' => 'memberGetName', 'attr', 'marital_status'),
        array('id' => 11, 'label' => 'Address Home', 'name' => 'member', 'attr' => 'home_address'),
        array('id' => 12, 'label' => 'Address IC', 'name' => 'member', 'attr' => 'ic_address'),
        array('id' => 13, 'label' => 'Telephone Home', 'name' => 'member', 'attr' => 'ic_num'),
        array('id' => 14, 'label' => 'Telephone Hand phone', 'name' => 'member', 'attr' => 'ic_num'),
    ];
}


function check($item){
    return $item['id'] == 1;
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


function guardian($relationships){
    $guardian = $relationships->where('relation_id', '=', Relations::where('name', 'LIKE', 'Guardian')->first()->id);
    if($guardian->count() > 0){
        $relatedTo = $guardian->first()->relatedTo;
        if($relatedTo){
            return $relatedTo->name;
        }else{
            return '';
        }
    }else{
        return '';
    }
}
