<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllMember extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at', 'last_edited_date'];

    public function citizenship(){
        return $this->hasOne(CitizenshipCountry::class, 'id', 'citizenship_id');
    }
    public function home_status(){
        return $this->hasOne(Homestatuses::class, 'id', 'home_status_id');
    }
    public function relation_ships(){
        return $this->hasMany(RelationShip::class, 'member_id', 'id');
    }
    public function gender(){
        return $this->hasOne(Genders::class, 'id', 'gender_id');
    }

    public function race(){
        return $this->hasOne(Races::class, 'id', 'race_id');
    }

    public function religion(){
        return $this->hasOne(Religions::class, 'id', 'religion_id');
    }

    public function khairatMember(){
        return $this->belongsTo(KhairatMembers::class);
    }

    public function home_state(){
        return $this->hasOne(State::class, 'id', 'home_state_id');
    }

    public function ic_state(){
        return $this->hasOne(State::class, 'id', 'ic_state_id');
    }

    public function marital_status(){
        return $this->hasOne(MaritalStatuses::class, 'id', 'marital_status_id');
    }

    public function relations(){
        return $this->hasManyThrough(Relations::class, RelationShip::class, 'member_id', 'id','id', 'relation_id');
    }
}
