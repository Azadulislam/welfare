<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitizenshipCountry extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    public function member(){
        return $this->belongsTo(AllMember::class);
    }
}
