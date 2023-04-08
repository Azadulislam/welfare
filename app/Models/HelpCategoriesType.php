<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpCategoriesType extends Model
{
    use HasFactory;

    public function type(){
        return $this->hasOne(HelpTypes::class, 'id', 'help_type_id');
    }
}
