<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelationShip extends Model
{
    use HasFactory;

    public function relatedTo(){
        return $this->hasOne(AllMember::class, 'id', 'related_to_id');
    }

    public function relationship(){
        return $this->hasOne(Relations::class, 'id', 'relation_id');
    }

}
