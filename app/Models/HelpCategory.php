<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpCategory extends Model
{
    use HasFactory;

    public function types(){
        return $this->hasMany(HelpCategoriesType::class, 'help_category_id', 'id');
    }
}
