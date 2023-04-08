<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WelfareService extends Model
{
    use HasFactory;

    protected $fillable = ['member_id', 'help_cat_id', 'informer_name'];

    public function member(){
        return $this->hasOne(AllMember::class, 'id', 'member_id');
    }

    public function helps(){
        return $this->hasMany(HelpProvided::class, 'welfare_id', 'id');
    }

    public function category(){
        return $this->hasMany(HelpCategory::class, 'id', 'category_id');
    }
}
