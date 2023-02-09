<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpProvided extends Model
{
    use HasFactory;

    public function category(){
        return $this->hasOne(HelpCategory::class, 'id', 'help_cat_id');
    }

    public function type(){
        return $this->hasOne(HelpTypes::class, 'id', 'help_type_id');
    }

    public function member(){
        return $this->hasOne(AllMember::class, 'id', 'member_id');
    }

    public function welfare(){
        return $this->hasOne(WelfareService::class, 'id', 'welfare_id');
    }

    public  function types(){
        return $this->hasMany(HelpCategoriesType::class, 'help_category_id', 'help_cat_id');
    }
}
