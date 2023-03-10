<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhairatMembers extends Model
{
    use HasFactory;

    public function member(){
        return $this->hasOne( AllMember::class, 'id','member_id');
    }
}
