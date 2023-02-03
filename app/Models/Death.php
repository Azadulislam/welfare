<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Death extends Model
{
    use HasFactory;
    protected $fillable = ['all_member_id', 'burial_contact_person', 'burial_contact_person_tel', 'date_of_death', 'cause_of_death', 'burial_place', 'done_by_mosque'];

    public function member(){
        return $this->hasOne( AllMember::class, 'id','all_member_id');
    }
}
